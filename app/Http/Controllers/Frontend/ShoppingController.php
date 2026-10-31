<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productprice;
use App\Models\Product;
use App\Models\Coupon;
use App\Models\Color;
use App\Models\Size;
use App\Models\ProductVariantPrice;
use App\Models\ShippingCharge;
use Toastr;
use Cart;
use DB;
use Carbon\Carbon;
use Session;

class ShoppingController extends Controller
{
    /**
     * ЁЯФ╣ ржХрж╛рж░рзНржЯрзЗ ржерж╛ржХрж╛ рж╕ржм ржкрзНрж░рзЛржбрж╛ржХрзНржЯ ржерзЗржХрзЗ ржорзЛржЯ Advance Amount ржмрзЗрж░ ржХрж░ржмрзЗ
     */
    public static function getCartAdvanceAmount()
    {
        $advance = 0;

        $productIds = Cart::instance('shopping')->content()
            ->pluck('id')
            ->unique()
            ->toArray();

        if (empty($productIds)) {
            return $advance;
        }

        $products = Product::whereIn('id', $productIds)
            ->select('id', 'advance_amount')
            ->get()
            ->keyBy('id');

        foreach (Cart::instance('shopping')->content() as $item) {
            $product = $products->get($item->id);

            if ($product && $product->advance_amount > 0) {
                $advance += ($product->advance_amount * $item->qty);
            }
        }

        return $advance;
    }

    public static function hasDigitalProductInCart()
    {
        foreach (Cart::instance('shopping')->content() as $item) {
            if (!empty($item->options->is_digital) && $item->options->is_digital == 1) {
                return true;
            }
        }
        return false;
    }

    public static function hasAllFreeDeliveryProducts()
    {
        $productIds = Cart::instance('shopping')->content()
            ->pluck('id')
            ->unique()
            ->toArray();

        if (empty($productIds)) {
            return false;
        }

        $products = Product::whereIn('id', $productIds)
            ->select('id', 'free_delivery', 'is_digital')
            ->get()
            ->keyBy('id');

        foreach (Cart::instance('shopping')->content() as $item) {
            $product = $products->get($item->id);

            if ($product && $product->is_digital == 1) {
                continue;
            }

            if ($product && $product->free_delivery != 1) {
                return false;
            }
        }

        return true;
    }

    /**
     * কার্টে যেকোনো একটি free delivery প্রোডাক্ট থাকলে (অথবা সব ডিজিটাল হলে) ডেলিভারি চার্জ ০
     */
    public static function hasFreeDeliveryProduct(): bool
    {
        $productIds = Cart::instance('shopping')->content()->pluck('id')->unique();

        if ($productIds->isEmpty()) {
            return false;
        }

        $products = Product::whereIn('id', $productIds)->get(['id', 'free_delivery', 'is_digital']);

        return $products->contains(fn ($p) => $p->free_delivery == 1)
            || $products->every(fn ($p) => $p->is_digital == 1);
    }

    /**
     * বর্তমান কার্ট অনুযায়ী ডেলিভারি চার্জ — প্রতিবার নতুন করে হিসাব হয়।
     * Session-এ শুধু সিলেক্ট করা এরিয়া (shipping_id) ও তার আসল চার্জ থাকে, ০ বসানো হয় না,
     * তাই free প্রোডাক্ট আনসিলেক্ট করলে এরিয়ার চার্জ আবার ফিরে আসে।
     */
    public static function cartShippingCharge(): float
    {
        if (self::hasFreeDeliveryProduct()) {
            return 0;
        }

        $area = ShippingCharge::find(Session::get('shipping_id'));

        return (float) ($area->amount ?? Session::get('shipping', 0));
    }

    /**
     * Campaign/landing পেজের কার্ট আইটেম — variant (color/size) সহ।
     * color_id / size_id / variant_price_id কী-গুলো OrderHelper::saveOrderDetails পড়ে,
     * তাই সব ইনভয়েসে সাইজ ও কালার দেখায়।
     */
    public static function campaignCartItem(Product $product, $colorId = null, $sizeId = null, int $qty = 1): array
    {
        // কালার/সাইজ অপশন মাত্র একটা থাকলে সেটাই অটো সিলেক্ট
        $variants = ProductVariantPrice::where('product_id', $product->id)->get(['color_id', 'size_id']);
        $onlyColor = $variants->pluck('color_id')->filter()->unique();
        $onlySize  = $variants->pluck('size_id')->filter()->unique();

        $colorId = $colorId ?: ($onlyColor->count() === 1 ? $onlyColor->first() : null);
        $sizeId  = $sizeId ?: ($onlySize->count() === 1 ? $onlySize->first() : null);

        $variant = ($colorId || $sizeId)
            ? ProductVariantPrice::where('product_id', $product->id)
                ->where('color_id', $colorId)
                ->where('size_id', $sizeId)
                ->first()
            : null;

        $price = ($variant && $variant->price > 0)
            ? $variant->price
            : ($product->new_price ?: $product->old_price ?: 1);

        return [
            'id'    => $product->id,
            'name'  => $product->name,
            'qty'   => $qty,
            'price' => (float) $price,
            'options' => [
                'slug'             => $product->slug,
                'image'            => optional($product->image)->image ?? 'public/uploads/default.webp',
                'old_price'        => (float) ($product->old_price ?? 0),
                'purchase_price'   => (float) ($product->purchase_price ?? 0),
                'advance_amount'   => (float) ($product->advance_amount ?? 0),
                'is_digital'       => (int) ($product->is_digital ?? 0),
                'free_delivery'    => (int) ($product->free_delivery ?? 0),
                'color_id'         => $colorId,
                'size_id'          => $sizeId,
                'product_color'    => $colorId ? optional(Color::find($colorId))->getDisplayName() : null,
                'product_size'     => $sizeId ? optional(Size::find($sizeId))->sizeName : null,
                'variant_price_id' => $variant->id ?? null,
            ],
        ];
    }

    //ЁЯЯв Add to cart (GET)
    public function addTocartGet($id, Request $request)
    {
        $qty = 1;
        $productInfo = Product::find($id);

        if (!$productInfo) {
            return response()->json(['error' => 'Product not found']);
        }

        $productImage = DB::table('productimages')
            ->where('product_id', $id)
            ->value('image') ?? 'public/uploads/default.webp';

        $cartinfo = Cart::instance('shopping')->add([
            'id'   => $productInfo->id,
            'name' => $productInfo->name,
            'qty'  => $qty,
            'price'=> (float) ($productInfo->new_price ?? $productInfo->old_price ?? 1),
            'options' => [
                'image'          => $productImage,
                'old_price'      => (float) ($productInfo->old_price ?? 0),
                'slug'           => $productInfo->slug,
                'purchase_price' => (float) ($productInfo->purchase_price ?? 0),
                'advance_amount' => (float) ($productInfo->advance_amount ?? 0),
                'is_digital'     => (int) ($productInfo->is_digital ?? 0),
                'free_delivery'  => (int) ($productInfo->free_delivery ?? 0),
            ],
        ]);

        return response()->json($cartinfo);
    }

    // ЁЯЯв Apply coupon
    public function applyCoupon(Request $request)
    {
        $request->validate(['coupon_code' => 'required']);

        $coupon = Coupon::where('code', $request->coupon_code)
            ->where('status', 1)
            ->first();

        if (!$coupon) {
            Toastr::error('Invalid Coupon Code', 'Error');
            return redirect()->back();
        }

        $today = Carbon::now()->format('Y-m-d');

        if (($coupon->valid_from && $today < $coupon->valid_from) ||
            ($coupon->valid_to && $today > $coupon->valid_to)) {
            Toastr::error('Coupon expired or not valid yet', 'Error');
            return redirect()->back();
        }

        $subtotal = floatval(
            preg_replace('/[^\d.]/', '', Cart::instance('shopping')->subtotal())
        );

        if ($coupon->min_purchase && $subtotal < $coupon->min_purchase) {
            Toastr::error("Minimum purchase рз│{$coupon->min_purchase} required", 'Error');
            return redirect()->back();
        }

        $discount = $coupon->type == 'percent'
            ? ($subtotal * ($coupon->value / 100))
            : $coupon->value;

        Session::put('coupon_code', $coupon->code);
        Session::put('discount', round($discount, 2));

        Toastr::success("Coupon Applied! You saved рз│" . round($discount, 2), 'Success');
        return redirect()->back();
    }

    // ЁЯЯв Remove coupon
    public function removeCoupon()
    {
        Session::forget(['coupon_code', 'discount']);
        Toastr::success('Coupon removed successfully', 'Success');
        return redirect()->back();
    }

    /**
     * ЁЯЯв Area/zone select on the campaign page (#area) calls this via
     * GET route('shipping.charge', ['id' => zoneId]). Looks up that
     * zone's delivery charge, stores it in session, and returns the
     * same cart_table partial so totals update instantly.
     *
     * IMPORTANT: adjust the model name (`Shippingcharge`) and the field
     * name (`charge`) below to match your actual table/columns тАФ I'm
     * inferring these from how your blade renders the <option> list
     * ({{$value->id}} / {{$value->name}}), but I don't have the model
     * or migration, so the charge/amount column name is a guess with
     * fallbacks. Check php artisan tinker or your migration file to
     * confirm the real column, then trim the ?? fallbacks down to it.
     */
    public function shippingCharge(Request $request)
    {
        $id = $request->input('id');
        $charge = 0;

        if ($id) {
            $zone = \App\Models\Shippingcharge::find($id);

            if ($zone) {
                $charge = (float) (
                    $zone->charge
                    ?? $zone->amount
                    ?? $zone->cost
                    ?? $zone->shipping_cost
                    ?? 0
                );
            }
        }

        Session::put('shipping', $charge);

        return view('frontEnd.partials.cart_table');
    }

    // ЁЯЯв Add to cart (POST) with variant support
    public function cart_store(Request $request)
    {
        $product = Product::with('image')->find($request->id);

        if (!$product) {
            Toastr::error('Product not found', 'Error!');
            return redirect()->back();
        }

        $price = 0;

        if ($request->filled('product_color') && $request->filled('product_size')) {
            $variant = Productprice::where('product_id', $product->id)
                ->where('color', $request->product_color)
                ->where('size', $request->product_size)
                ->first();

            if ($variant) {
                $price = (float) $variant->price;
            }
        } elseif ($request->filled('product_color')) {
            $variant = Productprice::where('product_id', $product->id)
                ->where('color', $request->product_color)
                ->whereNull('size')
                ->first();

            if ($variant) {
                $price = (float) $variant->price;
            }
        } elseif ($request->filled('product_size')) {
            $variant = Productprice::where('product_id', $product->id)
                ->where('size', $request->product_size)
                ->whereNull('color')
                ->first();

            if ($variant) {
                $price = (float) $variant->price;
            }
        }

        if ($price <= 0) {
            $price = (float) ($product->new_price ?? $product->old_price ?? 1);
        }

        $image = optional($product->image)->image
            ?? DB::table('productimages')->where('product_id', $product->id)->value('image')
            ?? 'public/uploads/default.webp';

        Cart::instance('shopping')->add([
            'id'   => $product->id,
            'name' => $product->name,
            'qty'  => $request->qty ?? 1,
            'price'=> $price,
            'options' => [
                'slug'           => $product->slug,
                'image'          => $image,
                'old_price'      => (float) ($product->old_price ?? 0),
                'purchase_price' => (float) ($product->purchase_price ?? 0),
                'product_size'   => $request->product_size ?? null,
                'product_color'  => $request->product_color ?? null,
                'pro_unit'       => $request->pro_unit ?? null,
                'advance_amount' => (float) ($product->advance_amount ?? 0),
                'is_digital'     => (int) ($product->is_digital ?? 0),
                'free_delivery'  => (int) ($product->free_delivery ?? 0),
            ],
        ]);

        Toastr::success('Product added to cart successfully!', 'Success');

        if ($request->has('order_now')) {
            return redirect()->route('customer.checkout');
        }

        return redirect()->back();
    }

    // ЁЯЯв Update cart (color/size change)
    // Returns the SAME partial the campaign page renders on load,
    // so the table never swaps to a different layout after an AJAX call.
    public function cart_update(Request $request)
    {
        $rowId    = $request->id;
        $cartItem = Cart::instance('shopping')->get($rowId);

        if ($cartItem) {
            Cart::instance('shopping')->update($rowId, [
                'options' => [
                    'product_size'   => $request->product_size ?: $cartItem->options->product_size,
                    'product_color'  => $request->product_color ?: $cartItem->options->product_color,
                    'slug'           => $cartItem->options->slug,
                    'image'          => $cartItem->options->image,
                    'old_price'      => $cartItem->options->old_price,
                    'purchase_price' => $cartItem->options->purchase_price,
                    'pro_unit'       => $cartItem->options->pro_unit,
                    'advance_amount' => $cartItem->options->advance_amount ?? 0,
                    'is_digital'     => $cartItem->options->is_digital ?? 0,
                    'free_delivery'  => $cartItem->options->free_delivery ?? 0,
                ],
            ]);
        }

        return view('frontEnd.partials.cart_table');
    }

    // ЁЯЯв Remove from cart
    public function cart_remove(Request $request)
    {
        Cart::instance('shopping')->update($request->id, 0);

        return view('frontEnd.partials.cart_table');
    }

    // ЁЯЯв Increment quantity тАФ always reads current qty from the cart itself
    public function cart_increment(Request $request)
    {
        $item = Cart::instance('shopping')->get($request->id);

        if ($item) {
            Cart::instance('shopping')->update($request->id, $item->qty + 1);
        }

        return view('frontEnd.partials.cart_table');
    }

    // ЁЯЯв Decrement quantity тАФ floor of 1
    public function cart_decrement(Request $request)
    {
        $item = Cart::instance('shopping')->get($request->id);

        if ($item && $item->qty > 1) {
            Cart::instance('shopping')->update($request->id, $item->qty - 1);
        }

        return view('frontEnd.partials.cart_table');
    }

    // ЁЯЯв Cart count (header)
    public function cart_count(Request $request)
    {
        $data = Cart::instance('shopping')->count();
        return view('frontEnd.layouts.ajax.cart_count', compact('data'));
    }

    // ЁЯЯв Mobile cart count
    public function mobilecart_qty(Request $request)
    {
        $data = Cart::instance('shopping')->count();
        return view('frontEnd.layouts.ajax.mobilecart_qty', compact('data'));
    }

    /**
     * Sidebar cart тАУ ржбрж╛ржи ржжрж┐ржХ ржерзЗржХрзЗ рж╕рзНрж▓рж╛ржЗржб ржЖржЙржЯ рж╣ржУржпрж╝рж╛ ржХрж╛рж░рзНржЯ (AJAX)
     */
    public function cartSidebar(Request $request)
    {
        $cartContent   = Cart::instance('shopping')->content();
        $subtotal      = (float) str_replace(',', '', Cart::instance('shopping')->subtotal());
        $generalsetting = \App\Models\GeneralSetting::first();
        return view('frontEnd.layouts.ajax.cart_sidebar', compact('cartContent', 'subtotal', 'generalsetting'));
    }

    // ЁЯЯв Add or remove ONE product from the multi-select checkbox picker,
    // WITHOUT touching any other product already in the cart.
    // FIX: previously called Cart::instance('shopping')->destroy() here,
    // which wiped every other selected product on every click тАФ that was
    // the root cause of "multi-product total not calculating."
    public function changeProduct(Request $request)
    {
        $productId = $request->input('id');
        $action    = $request->input('action'); // 'add' or 'remove'
        $product   = Product::with('image')->find($productId);

        if (!$product) {
            // FIX: this used to return JSON, but your campaign page's AJAX
            // handler does $('.cartlist').html(data) expecting HTML тАФ JSON
            // here would have dumped raw text into the cart table. Returning
            // the same partial keeps behavior consistent (cart just stays
            // as-is since nothing changed).
            Toastr::error('Product not found.', 'Error');
            return view('frontEnd.partials.cart_table');
        }

        // Picker-এ প্রতি প্রোডাক্টের একটাই row থাকে — আগেরটা সরিয়ে নতুন variant দিয়ে বসাই (qty ঠিক রেখে)
        $existingRow = Cart::instance('shopping')->content()->where('id', $product->id)->first();
        $qty = $existingRow->qty ?? 1;

        if ($existingRow) {
            Cart::instance('shopping')->remove($existingRow->rowId);
        }

        if ($action !== 'remove') {
            Cart::instance('shopping')->add(
                self::campaignCartItem($product, $request->product_color, $request->product_size, $qty)
            );
        }

        return view('frontEnd.partials.cart_table');
    }
}