{{-- resources/views/frontEnd/partials/cart_table.blade.php
     IMPORTANT: this file must live at resources/views/frontEnd/partials/cart_table.blade.php
     (capital F, capital E in "frontEnd" — matching every other view folder in this project).

     This is the SINGLE partial used by:
       - the campaign page on initial load (@include)
       - cart.increment, cart.decrement, cart.remove, cart.update, cart.changeProduct, cart.setShipping (AJAX)
     Every one of those now returns THIS same partial, so the table never
     changes layout between page load and an AJAX click.

     No functional changes from your uploaded version — confirmed compatible
     with the new campaign_blade.php's checkbox picker and area-shipping AJAX. --}}

@php
    $grandSubtotal = 0;
    foreach (Cart::instance('shopping')->content() as $cartItem) {
        $grandSubtotal += $cartItem->price * $cartItem->qty;
    }
    $shipping = Session::get('shipping') ? Session::get('shipping') : 0;
    $grandTotal = $grandSubtotal + $shipping;
@endphp

<table class="table modern-cart-table text-center mb-0 align-middle">
    <thead>
        <tr>
            <th class="text-start ps-3" style="width: 50%;">প্রোডাক্ট</th>
            <th style="width: 25%;">পরিমাণ</th>
            <th style="width: 25%;">মূল্য</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        @forelse(Cart::instance('shopping')->content() as $value)
            @php
                $lineTotal = $value->price * $value->qty;
                // Eager-load with the SAME relation names your FrontendController uses
                // (prosizes / procolors), not sizes/colors, to avoid an undefined-relationship error.
                $product = App\Models\Product::with(['prosizes', 'procolors'])->find($value->id);
            @endphp
            <tr data-row="{{ $value->rowId }}">
                <td class="text-start ps-3">
                    <div class="d-flex align-items-center">
                        <img src="{{asset($value->options->image)}}" class="rounded me-2 shadow-sm" height="50" width="50" style="object-fit:cover;">
                        <div>
                            <a class="text-dark text-decoration-none fw-bold" style="font-size: 14px;" href="{{route('product',$value->options->slug)}}">
                                {{Str::limit($value->name,25)}}
                            </a>

                            @if($product && ($product->prosizes->isNotEmpty() || $product->procolors->isNotEmpty()))
                            <div class="d-flex gap-2 mt-2">
                                @if($product->prosizes->isNotEmpty())
                                <select id="size-selector-{{ $value->rowId }}" class="form-select form-select-sm cart-size-selector shadow-none" data-id="{{ $value->rowId }}" style="font-size: 12px; padding: 2px 5px;">
                                    <option value="">Size</option>
                                    @foreach($product->prosizes as $size)
                                    <option value="{{ $size->sizeName ?? $size->size_name ?? $size->name }}" {{ ($size->sizeName ?? $size->size_name ?? $size->name) == $value->options->product_size ? 'selected' : '' }}>{{ $size->sizeName ?? $size->size_name ?? $size->name }}</option>
                                    @endforeach
                                </select>
                                @endif
                                @if($product->procolors->isNotEmpty())
                                <select id="color-selector-{{ $value->rowId }}" class="form-select form-select-sm cart-color-selector shadow-none" data-id="{{ $value->rowId }}" style="font-size: 12px; padding: 2px 5px;">
                                    <option value="">Color</option>
                                    @foreach($product->procolors as $color)
                                    <option value="{{ $color->colorName ?? $color->color_name ?? $color->name }}" {{ ($color->colorName ?? $color->color_name ?? $color->name) == $value->options->product_color ? 'selected' : '' }}>{{ $color->colorName ?? $color->color_name ?? $color->name }}</option>
                                    @endforeach
                                </select>
                                @endif
                            </div>
                            @endif
                        </div>
                    </div>
                </td>
                <td class="cart_qty">
                    <div class="qty-input-group d-flex">
                        <button type="button" class="btn btn-sm cart_decrement" data-id="{{$value->rowId}}"><i class="fa-solid fa-minus"></i></button>
                        <input type="text" class="form-control form-control-sm px-0" value="{{$value->qty}}" readonly />
                        <button type="button" class="btn btn-sm cart_increment" data-id="{{$value->rowId}}"><i class="fa-solid fa-plus"></i></button>
                    </div>
                </td>
                <td class="fw-bold text-dark fs-6">৳{{ $lineTotal }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="3" class="py-4 text-muted">আপনার কার্টে কোনো পণ্য নেই</td>
            </tr>
        @endforelse
    </tbody>
    <tfoot class="bg-light">
        <tr>
            <th colspan="2" class="text-end pe-3 text-muted">পণ্য মূল্য:</th>
            <td class="fw-bold text-dark fs-6">
                <span id="net_total">৳ <strong>{{ $grandSubtotal }}</strong></span>
            </td>
        </tr>
        <tr>
            <th colspan="2" class="text-end pe-3 text-muted">ডেলিভারি চার্জ:</th>
            <td class="fw-bold text-danger fs-6">
                <span id="cart_shipping_cost">+ ৳ <strong>{{ $shipping }}</strong></span>
            </td>
        </tr>
        <tr class="table-success">
            <th colspan="2" class="text-end pe-3 fs-5">সর্বমোট মূল্য:</th>
            <td class="fs-5 fw-bolder text-success">
                <span id="grand_total">৳ <strong>{{ $grandTotal }}</strong></span>
            </td>
        </tr>
    </tfoot>
</table>