

<?php
    $grandSubtotal = 0;
    foreach (Cart::instance('shopping')->content() as $cartItem) {
        $grandSubtotal += $cartItem->price * $cartItem->qty;
    }
    // প্রতিবার কার্ট দেখে নতুন করে হিসাব — যেকোনো একটি free delivery প্রোডাক্ট থাকলে ০
    $shipping = \App\Http\Controllers\Frontend\ShoppingController::cartShippingCharge();
    $grandTotal = $grandSubtotal + $shipping;
?>

<table class="table modern-cart-table text-center mb-0 align-middle">
    <thead>
        <tr>
            <th class="text-start ps-3" style="width: 50%;">প্রোডাক্ট</th>
            <th style="width: 25%;">পরিমাণ</th>
            <th style="width: 25%;">মূল্য</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <?php $__empty_1 = true; $__currentLoopData = Cart::instance('shopping')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <?php
                $lineTotal = $value->price * $value->qty;
            ?>
            <tr data-row="<?php echo e($value->rowId); ?>">
                <td class="text-start ps-3">
                    <div class="d-flex align-items-center">
                        <img src="<?php echo e(asset($value->options->image)); ?>" class="rounded me-2 shadow-sm" height="50" width="50" style="object-fit:cover;">
                        <div>
                            <a class="text-dark text-decoration-none fw-bold" style="font-size: 14px;" href="<?php echo e(route('product',$value->options->slug)); ?>">
                                <?php echo e(Str::limit($value->name,25)); ?>

                            </a>

                            
                            <?php if($value->options->product_size || $value->options->product_color): ?>
                            <div class="small text-muted mt-1">
                                <?php if($value->options->product_size): ?> সাইজ: <strong><?php echo e($value->options->product_size); ?></strong> <?php endif; ?>
                                <?php if($value->options->product_size && $value->options->product_color): ?> | <?php endif; ?>
                                <?php if($value->options->product_color): ?> কালার: <strong><?php echo e($value->options->product_color); ?></strong> <?php endif; ?>
                            </div>
                            <?php endif; ?>
                            <?php if($value->options->free_delivery): ?>
                            <div class="small text-success fw-bold">ফ্রি ডেলিভারি</div>
                            <?php endif; ?>
                        </div>
                    </div>
                </td>
                <td class="cart_qty">
                    <div class="qty-input-group d-flex">
                        <button type="button" class="btn btn-sm cart_decrement" data-id="<?php echo e($value->rowId); ?>"><i class="fa-solid fa-minus"></i></button>
                        <input type="text" class="form-control form-control-sm px-0" value="<?php echo e($value->qty); ?>" readonly />
                        <button type="button" class="btn btn-sm cart_increment" data-id="<?php echo e($value->rowId); ?>"><i class="fa-solid fa-plus"></i></button>
                    </div>
                </td>
                <td class="fw-bold text-dark fs-6">৳<?php echo e($lineTotal); ?></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="3" class="py-4 text-muted">আপনার কার্টে কোনো পণ্য নেই</td>
            </tr>
        <?php endif; ?>
    </tbody>
    <tfoot class="bg-light">
        <tr>
            <th colspan="2" class="text-end pe-3 text-muted">পণ্য মূল্য:</th>
            <td class="fw-bold text-dark fs-6">
                <span id="net_total">৳ <strong><?php echo e($grandSubtotal); ?></strong></span>
            </td>
        </tr>
        <tr>
            <th colspan="2" class="text-end pe-3 text-muted">ডেলিভারি চার্জ:</th>
            <td class="fw-bold text-danger fs-6">
                <span id="cart_shipping_cost">+ ৳ <strong><?php echo e($shipping); ?></strong></span>
            </td>
        </tr>
        <tr class="table-success">
            <th colspan="2" class="text-end pe-3 fs-5">সর্বমোট মূল্য:</th>
            <td class="fs-5 fw-bolder text-success">
                <span id="grand_total">৳ <strong><?php echo e($grandTotal); ?></strong></span>
            </td>
        </tr>
    </tfoot>
</table><?php /**PATH G:\xampp822\htdocs\laravel\martmama\resources\views/frontEnd/partials/cart_table.blade.php ENDPATH**/ ?>