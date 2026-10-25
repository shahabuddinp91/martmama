

<?php
    $grandSubtotal = 0;
    foreach (Cart::instance('shopping')->content() as $cartItem) {
        $grandSubtotal += $cartItem->price * $cartItem->qty;
    }
    $shipping = Session::get('shipping') ? Session::get('shipping') : 0;
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
                // Eager-load with the SAME relation names your FrontendController uses
                // (prosizes / procolors), not sizes/colors, to avoid an undefined-relationship error.
                $product = App\Models\Product::with(['prosizes', 'procolors'])->find($value->id);
            ?>
            <tr data-row="<?php echo e($value->rowId); ?>">
                <td class="text-start ps-3">
                    <div class="d-flex align-items-center">
                        <img src="<?php echo e(asset($value->options->image)); ?>" class="rounded me-2 shadow-sm" height="50" width="50" style="object-fit:cover;">
                        <div>
                            <a class="text-dark text-decoration-none fw-bold" style="font-size: 14px;" href="<?php echo e(route('product',$value->options->slug)); ?>">
                                <?php echo e(Str::limit($value->name,25)); ?>

                            </a>

                            <?php if($product && ($product->prosizes->isNotEmpty() || $product->procolors->isNotEmpty())): ?>
                            <div class="d-flex gap-2 mt-2">
                                <?php if($product->prosizes->isNotEmpty()): ?>
                                <select id="size-selector-<?php echo e($value->rowId); ?>" class="form-select form-select-sm cart-size-selector shadow-none" data-id="<?php echo e($value->rowId); ?>" style="font-size: 12px; padding: 2px 5px;">
                                    <option value="">Size</option>
                                    <?php $__currentLoopData = $product->prosizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($size->sizeName ?? $size->size_name ?? $size->name); ?>" <?php echo e(($size->sizeName ?? $size->size_name ?? $size->name) == $value->options->product_size ? 'selected' : ''); ?>><?php echo e($size->sizeName ?? $size->size_name ?? $size->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php endif; ?>
                                <?php if($product->procolors->isNotEmpty()): ?>
                                <select id="color-selector-<?php echo e($value->rowId); ?>" class="form-select form-select-sm cart-color-selector shadow-none" data-id="<?php echo e($value->rowId); ?>" style="font-size: 12px; padding: 2px 5px;">
                                    <option value="">Color</option>
                                    <?php $__currentLoopData = $product->procolors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($color->colorName ?? $color->color_name ?? $color->name); ?>" <?php echo e(($color->colorName ?? $color->color_name ?? $color->name) == $value->options->product_color ? 'selected' : ''); ?>><?php echo e($color->colorName ?? $color->color_name ?? $color->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php endif; ?>
                            </div>
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