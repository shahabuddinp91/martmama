<?php $__env->startSection('title', $details->name); ?>
<?php
    $pageType = 'product';
?>
<?php $__env->startPush('dataLayer'); ?>
window.dataLayer = window.dataLayer || [];
window.dataLayer.push({
    event: 'view_item',
    ecommerce: {
        currency: 'BDT',
        value: <?php echo e($details->new_price ?? 0); ?>,
        items: [{
            item_id: '<?php echo e($details->id); ?>',
            item_name: '<?php echo e(addslashes($details->name)); ?>',
            price: <?php echo e($details->new_price ?? 0); ?>,
            item_category: '<?php echo e(addslashes(optional($details->category)->name ?? '')); ?>',
            quantity: 1
        }]
    }
});
if (typeof fbq === 'function') {
    fbq('track', 'ViewContent', {
        content_ids: ['<?php echo e($details->id); ?>'],
        content_name: '<?php echo e(addslashes($details->name)); ?>',
        content_type: 'product',
        value: <?php echo e($details->new_price ?? 0); ?>,
        currency: 'BDT'
    }, { eventID: '<?php echo e($vc_event_id ?? "vc_prod_".$details->id."_".time()); ?>' });
}
if (typeof ttq !== 'undefined') {
    ttq.track('ViewContent', {
        content_type: 'product',
        content_id: '<?php echo e($details->id); ?>',
        content_name: '<?php echo e(addslashes($details->name)); ?>',
        value: <?php echo e($details->new_price ?? 0); ?>,
        currency: 'BDT'
    });
}
<?php $__env->stopPush(); ?>
<?php $__env->startPush('seo'); ?>
<?php
    $metaTitle = $details->meta_title ?? $details->name;
    $metaDescription = $details->meta_description ?? Str::limit(strip_tags($details->description), 160);
    $metaKeywords = $details->meta_keywords ?? $details->name;
    $metaImage = $details->meta_image ? asset($details->meta_image) : asset(optional($details->image)->image);
?>

<meta name="app-url" content="<?php echo e(route('product', $details->slug)); ?>" />
<meta name="robots" content="index, follow" />

<meta name="title" content="<?php echo e($metaTitle); ?>" />
<meta name="description" content="<?php echo e($metaDescription); ?>" />
<meta name="keywords" content="<?php echo e($metaKeywords); ?>" />

<!-- Twitter Card data -->
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="@gomobd" />
<meta name="twitter:title" content="<?php echo e($metaTitle); ?>" />
<meta name="twitter:description" content="<?php echo e($metaDescription); ?>" />
<meta name="twitter:image" content="<?php echo e($metaImage); ?>" />

<!-- Open Graph data -->
<meta property="og:title" content="<?php echo e($metaTitle); ?>" />
<meta property="og:type" content="product" />
<meta property="og:url" content="<?php echo e(route('product', $details->slug)); ?>" />
<meta property="og:image" content="<?php echo e($metaImage); ?>" />
<meta property="og:description" content="<?php echo e($metaDescription); ?>" />
<meta property="og:site_name" content="gomobd.com" />
<?php $__env->stopPush(); ?>


<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/zoomsl.css')); ?>">

<style>
    /* Prevents horizontal overflow across the page while keeping vertical scrolling active */
    html, body {
        overflow-x: hidden !important;
        max-width: 100% !important;
    }

    /* Target the main page container to prevent element overflow */
    .homeproduct.main-details-page {
        overflow: hidden;
    }
</style>
<style>
/*  Scoped Review Section */
.gomobd-review-section {
    font-family: 'Poppins', sans-serif;
}

/* Title */
.gomobd-review-section .gomobd-review-title {
    font-size: 20px;
    color: #222;
}

/* Review Card */
.gomobd-review-section .gomobd-review-card {
    background: #fff;
    border: 1px solid #e6e6e6;
    border-radius: 10px;
    padding: 16px 20px;
    transition: all 0.3s ease-in-out;
}
.gomobd-review-section .gomobd-review-card:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

/* Header */
.gomobd-review-section .gomobd-review-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
}

/* Avatar */
.gomobd-review-section .gomobd-review-avatar {
    width: 45px;
    height: 45px;
    border-radius: 50%;
    background: #198754;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    font-weight: 600;
    margin-right: 12px;
}

/* Name + Date */
.gomobd-review-section .gomobd-review-meta {
    flex-grow: 1;
}
.gomobd-review-section .gomobd-review-name {
    font-size: 16px;
    margin: 0;
    color: #222;
}
.gomobd-review-section .gomobd-review-date {
    font-size: 13px;
    color: #888;
}

/* Stars */
.gomobd-review-section .gomobd-review-stars {
    color: #f8b400;
    font-size: 15px;
}

/* Review Text */
.gomobd-review-section .gomobd-review-body {
    margin-top: 10px;
    color: #555;
    font-size: 15px;
    line-height: 1.6;
}

/* Empty state */
.gomobd-review-section .gomobd-review-empty {
    background: #f9f9f9;
    border-radius: 10px;
    color: #777;
}

/* ✅ Simple Wholesale Pricing Styles */
.wholesale-tier-row:hover {
    background: #f0f8f0 !important;
}

.wholesale-tier-row.active-tier {
    background: #d4edda !important;
    border-left: 3px solid #28a745 !important;
}

/* Review Modal: z-index fix যাত ব্যাকড্রপর প না প়ে এবং ্লি/টাইপ া কে */
#exampleModal {
    z-index: 10055 !important;
}
#exampleModal .modal-dialog {
    z-index: 10056 !important;
}

.product-details-discount-badge
/* 1. Ensure the main product card is the anchor point */
.product_item_inner {
    position: relative !important;
}

/* 2. Position the parent container perfectly in the top right corner */
.sale-badge {
    position: absolute !important;
    top: 12px !important;    /* Small gap from the very top border */
    right: 12px !important;  /* Small gap from the very right border */
    z-index: 10 !important;
    width: max-content !important;
    height: auto !important;
}

/* 3. Reset the inner wrapper so it doesn't add accidental spacing */
.sale-badge-inner {
    position: static !important; /* Disables double-positioning bugs */
    width: auto !important;
    height: auto !important;
}

/* 4. Beautifully style the badge box */
.product_item_inner .sale-badge-box {
    background-color: #34BE82 !important; 
    color: #ffffff !important;
    font-family: Arial, sans-serif !important;
    font-size: 11px !important; 
    font-weight: bold !important;
    
    /* Perfect padding and tight corners matching your goal image */
    padding: 4px 8px !important; 
    border-radius: 4px !important; 
    
    display: inline-flex !important;
    justify-content: center !important;
    align-items: center !important;
    
    /* Prevents shrinking or text-wrapping */
    width: max-content !important;
    white-space: nowrap !important;
    box-sizing: border-box !important;
    height: auto !important; 
}
/* --- Desktop View: Stack thumbnails vertically --- */
@media (min-width: 768px) {
    /* Targets the wrapper when Owl Carousel is NOT active */
    #indicator_thumb_wrapper:not(.owl-carousel) {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    
    /* Ensure thumbnail images fit nicely */
    .indicator-item img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }
}

/* --- Mobile View: Align thumbnails horizontally below main image --- */
@media (max-width: 767px) {
    .thumbnail-wrapper {
        width: 100% !important; /* Force full width on mobile */
        margin-top: 0px; 
    }
    
    #indicator_thumb_wrapper:not(.owl-carousel) {
        display: flex;
        flex-direction: row;
        gap: 10px;
        overflow-x: auto; /* Allows swiping if there are many thumbnails */
        padding-bottom: 5px;
    }
    
    /* Control thumbnail size on mobile */
    .indicator-item {
        width: 60px; 
        flex-shrink: 0;
    }
}

/* Base styles for all thumbnails */
.product-thumbnail {
    cursor: pointer;
    border: 2px solid transparent; /* Transparent border by default to prevent layout shift */
    opacity: 0.6;
    transition: all 0.3s ease-in-out;
    border-radius: 4px; /* Optional: rounds the corners slightly */
}

/* Hover effect */
.product-thumbnail:hover {
    opacity: 1;
}

/* Active state indicator (Desktop & Mobile) */
.product-thumbnail.active-thumb {
    border: 2px solid #e87b1e; /* Adjust this hex to perfectly match your theme's orange */
    opacity: 1;
}

/* Mobile View Fixes */
@media (max-width: 768px) {
    .thumbnail-container {
        display: flex;
        flex-direction: row;
        justify-content: center; /* Centers the thumbnails */
        gap: 10px; /* Space between thumbnails */
        margin-top: 0.5px;
        overflow-x: auto; /* Allows scrolling if there are many thumbnails */
        padding-bottom: 5px; /* Prevents scrollbar from clipping */
    }
    
    .thumbnail-container .product-thumbnail {
        width: 70px; /* Fixed width for mobile thumbnails */
        height: auto;
        flex-shrink: 0; /* Prevents them from squishing */
    }
}

.pro_unig label {
    font-weight: 600;
    margin-bottom: 0px;
}

.product-code p {
    display: inline-block;
    background: #f48721;
    color: #fff;
    padding: 0px 10px;
    border-top: 0px solid transparent;
    border-bottom: 0px solid transparent;
    border-right: 5px solid #fff;
    line-height: 0;
    margin-bottom: 1.5px;
}

/* Apply the animation to your button class */
.order_now_btn {
    animation: button-pulse 1.5s infinite ease-in-out;
}

/* The scaling animation keyframes */
@keyframes button-pulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.06); /* Scales up by 6% */
    }
    100% {
        transform: scale(1);
    }
}


@media (max-width: 767px) {
    /* 1. Force the parent container to stay side-by-side */
    .gallery-wrapper {
        flex-direction: row !important;
        align-items: flex-start;
    }

    /* 2. Adjust thumbnail container width and allow vertical scrolling */
    .mobile-thumb-fix {
        width: 65px !important; 
        max-height: 350px; /* Adjust this to match your main image height */
        overflow-y: auto; /* Makes it a scrollable list if there are many thumbs */
        overflow-x: hidden;
        scrollbar-width: none; /* Hides scrollbar in Firefox */
    }
    
    /* Hides scrollbar in Chrome/Safari/Edge for a clean look */
    .mobile-thumb-fix::-webkit-scrollbar {
        display: none; 
    }

    /* 3. Force Owl Carousel to stack vertically instead of horizontally */
    #indicator_thumb_wrapper.owl-carousel .owl-stage {
        display: flex !important;
        flex-direction: column !important;
        width: 100% !important;
        transform: none !important; /* Disables the horizontal sliding track */
    }

    #indicator_thumb_wrapper.owl-carousel .owl-item {
        width: 100% !important;
        margin-bottom: 0px; /* Adds gap between vertical thumbnails */
    }

    /* 4. Ensure the main image takes up exactly the rest of the screen space */
    .main-image-wrapper {
        max-width: calc(100% - 75px) !important; 
    }
}

@media (max-width: 767px) {
    /* ... your existing mobile code ... */

    /* 1. Force the main wrapper and Owl Carousel to hug the image tightly */
    .main-image-wrapper, 
    .main-image-wrapper .owl-carousel,
    .main-image-wrapper .owl-stage-outer,
    .main-image-wrapper .owl-stage,
    .main-image-wrapper .owl-item {
        height: auto !important;
        min-height: auto !important;
    }

    /* 2. Constrain the main image so it doesn't expand indefinitely */
    .main-image-wrapper .dimage_item img {
        max-height: 350px; /* Keeps the image at a sensible mobile height */
        object-fit: contain;
        margin: 0 auto;
        display: block;
    }
    
    /* 3. Ensure the parent container doesn't stretch artificially */
    .gallery-wrapper {
        align-items: flex-start !important;
        height: auto !important;
    }
}

    .main-image-wrapper .owl-nav.disabled {
        display: none !important;
        height: 0 !important;
        margin: 0 !important;
        padding: 0 !important;
    }
}
@media (max-width: 767px) {
    /* 1. Force remove borders and gaps from the main product image area */
    .owl-carousel,
    .owl-carousel .owl-stage-outer,
    .owl-stage-outer,
    .product-gallery,
    .woocommerce-product-gallery,
    .image-column,
    .product-image-wrap {
        border: none !important;
        background: transparent !important;
        box-shadow: none !important;
        margin-bottom: 0 !important;
        padding-bottom: 0 !important;
        height: auto !important;
    }

    /* 2. Tighten the space above the Product Title */
    .summary,
    .product-details,
    .entry-summary {
        margin-top: 5px !important;
        padding-top: 0 !important;
    }

    /* 3. Fix the bottom gap on the Product Grid Cards (from your first image) */
    .product,
    .product-card,
    .product-wrap,
    .product-inner {
        padding-bottom: 10px !important; /* Pulls the bottom edge up closer to the button */
    }
    
    .add_to_cart_button,
    .single_add_to_cart_button {
        margin-bottom: 0 !important;
    }
}
@media (max-width: 767px) {
    /* Force hide the disabled navigation and dots taking up empty space */
    #details_slider_main .owl-nav.disabled,
    #details_slider_main .owl-dots.disabled,
    .main-image-wrapper .owl-nav.disabled {
        display: none !important;
        height: 0 !important;
        margin: 0 !important;
        padding: 0 !important;
    }
}

/* ==========================================================================
   PRODUCT IMAGE GALLERY PLATFORM OPTIMIZATIONS
   ========================================================================== */

/* Force a strict 1:1 Aspect Ratio on the main image viewport container */
#details_slider_main .dimage_item {
    width: 100%;
    aspect-ratio: 1 / 1 !important; /* Forces it to be a perfect square */
    background-color: #ffffff;
    display: flex !important;
    align-items: center;
    justify-content: center;
    border: 0px solid #eaeaea !important; /* Single clean outer border */
    border-radius: 8px;
    overflow: hidden;
    position: relative;
}

/* Strip inner borders from the image tags to eliminate double borders */
#details_slider_main .dimage_item img {
    max-height: 100%;
    width: auto !important;
    max-width: 100%;
    object-fit: contain !important;
    border: none !important; /* Remove inner border */
    padding: 10px;
}

/* --- Thumbnail Layout Adjustments --- */
.indicator_thumb .thumb-item {
    width: 100%;
    aspect-ratio: 1 / 1 !important; /* Perfect square thumbnails */
    background: #fff;
    border: 1px solid #e2e8f0 !important; /* Clean baseline border */
    border-radius: 6px;
    overflow: hidden;
    padding: 2px;
    cursor: pointer;
    transition: all 0.2s ease-in-out;
}

.mb-4 {
    margin-bottom: 0rem !important;
}
.indicator_thumb .thumb-item img {
    width: 100% !important;
    height: 100% !important;
    object-fit: contain !important;
    border: none !important; /* Prevent double borders on thumb images */
}

/* --- Active Synchronization & Orange Border States --- */
/* Target active classes dynamically assigned by your JS click handler or Carousel script */
.indicator_thumb .thumb-item.active,
.indicator_thumb .owl-item.current .thumb-item,
.indicator_thumb .thumb-item.synced-active {
    border: 2px solid #ff9800 !important; /* Highlight with reference color */
    box-shadow: 0 0 4px rgba(255, 152, 0, 0.2);
}

/* Optional: Add a subtle checkmark style using pure CSS on active items if desired */
.indicator_thumb .thumb-item.active::after {
    content: "✓";
    position: absolute;
    top: 2px;
    right: 4px;
    background: #ff9800;
    color: white;
    font-size: 8px;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}

/* --- Carousel Navigation Arrow Customization --- */
#details_slider_main.owl-carousel .owl-nav {
    display: block !important; /* Force layout activation */
}

#details_slider_main.owl-carousel .owl-nav button.owl-prev,
#details_slider_main.owl-carousel .owl-nav button.owl-next {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(255, 255, 255, 0.8) !important;
    color: #ff9800 !important; /* Matching accent color navigation components */
    width: 30px;
    height: 30px;
    border-radius: 50%;
    box-shadow: 0 2px 5px rgba(0,0,0,0.15);
    font-size: 18px !important;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.2s ease;
    z-index: 10;
}

#details_slider_main.owl-carousel .owl-nav button.owl-prev { left: 10px; }
#details_slider_main.owl-carousel .owl-nav button.owl-next { right: 10px; }

#details_slider_main.owl-carousel .owl-nav button:hover {
    background: #ff9800 !important;
    color: #fff !important;
}

.product-section {
    padding: 0px 0;
    
}
.homeproduct.main-details-page {
    margin-top: 0px;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
<div class="homeproduct main-details-page">
    <div class="container">
        <div class="breadcrumb" style="margin-bottom: 0px; width: 100%;">
                            <ul>
                                <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                                <li><span>/</span></li>
                                <li><a href="<?php echo e(url('/category/' . $details->category->slug)); ?>"><?php echo e($details->category->name); ?></a></li>
                                <?php if($details->subcategory): ?>
                                    <li><span>/</span></li>
                                    <li><a href="#"><?php echo e($details->subcategory ? $details->subcategory->subcategoryName : ''); ?></a></li>
                                <?php endif; ?> 
                                <?php if($details->childcategory): ?>
                                    <li><span>/</span></li>
                                    <li><a href="#"><?php echo e($details->childcategory->childcategoryName); ?></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
        <div class="row">
            <div class="col-sm-12">
                <section class="product-section">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 position-relative">
    <?php if($details->old_price): ?>
    <div class="product-details-discount-badge">
        
    </div>
    <?php endif; ?>

<div class="gallery-wrapper d-flex flex-row gap-2 gap-md-3 mb-3">
        
    <div class="thumbnail-wrapper mobile-thumb-fix" style="width: 70px; flex-shrink: 0;">
        <div class="indicator_thumb d-flex flex-column gap-2 <?php if($details->images->count() > 4): ?> thumb_slider owl-carousel <?php endif; ?>" id="indicator_thumb_wrapper">
            <?php $__currentLoopData = $details->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="indicator-item thumb-item" data-id="<?php echo e($key); ?>" data-color-id="<?php echo e($image->color_id ?? ''); ?>">
                    <img src="<?php echo e(asset($image->image)); ?>" class="img-fluid border rounded" style="cursor: pointer; width: 100%; object-fit: contain; padding: 2px;" />
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

    <div class="main-image-wrapper flex-grow-1 overflow-hidden">
        <div class="details_slider owl-carousel" id="details_slider_main">
            <?php $__currentLoopData = $details->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="dimage_item" data-color-id="<?php echo e($value->color_id ?? ''); ?>">
                    <img src="<?php echo e(asset($value->image)); ?>" class="block__pic w-100 rounded border" style="object-fit: contain;" />
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>

</div>
</div>

                            <div class="col-sm-6">
                                <div class="details_right">
                                    
                                    <div class="product">
                                        <div class="product-cart">
                                            <h2 class="name" style="font-size: 18px; font-weight: 600; color: #333; margin-bottom: -05px;"><?php echo e($details->name); ?></h2>
                                            
<?php if($details->vendor): ?>
<div class="gomobd-vendor-widget">
    <div class="gomobd-vendor-logo">
        <?php if($details->vendor->logo): ?>
            <img src="<?php echo e(asset($details->vendor->logo)); ?>" alt="<?php echo e($details->vendor->shop_name); ?>">
        <?php else: ?>
            <div class="gomobd-vendor-logo-initial">
                <?php echo e(strtoupper(substr($details->vendor->shop_name, 0, 1))); ?>

            </div>
        <?php endif; ?>
    </div>
    <div class="gomobd-vendor-info">
        <div class="gomobd-vendor-name-row">
            <span class="gomobd-vendor-name"><?php echo e($details->vendor->shop_name); ?></span>
            <?php if($details->vendor->verification_status == 'approved'): ?>
                <i class="fas fa-check-circle gomobd-vendor-verified" title="Verified Seller"></i>
            <?php endif; ?>
        </div>
        <div class="gomobd-vendor-sub-row">
            <a href="<?php echo e(route('vendor.shop', $details->vendor->slug)); ?>" class="gomobd-vendor-visit-link">
                Visit Store
            </a>
            <span class="gomobd-vendor-divider">•</span>
            <div class="gomobd-vendor-rating">
                <?php $vRating = $details->vendor->average_rating ?? 0; ?>
                <?php for($i = 1; $i <= 5; $i++): ?>
                    <?php if($i <= floor($vRating)): ?>
                        <i class="fas fa-star"></i>
                    <?php elseif($i - 0.5 <= $vRating): ?>
                        <i class="fas fa-star-half-alt"></i>
                    <?php else: ?>
                        <i class="far fa-star"></i>
                    <?php endif; ?>
                <?php endfor; ?>
                <span class="gomobd-vendor-rating-text">
                    <?php echo e(number_format($vRating, 1)); ?> (<?php echo e($details->vendor->total_reviews ?? 0); ?>)
                </span>
            </div>
        </div>
    </div>
</div>

<style>
/* Tight Base Layout */
.gomobd-vendor-widget {
    display: flex;
    align-items: center;
    gap: 8px;
    background: #fff;
    border: 1px solid #e2e8f0;
    border-radius: 6px;
    padding: 6px 8px;
    margin: 6px 0;
    box-sizing: border-box;
    width: 100%;
}
.gomobd-vendor-logo {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    overflow: hidden;
    flex-shrink: 0;
    border: 1px solid #edf2f7;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #f7fafc;
}
.gomobd-vendor-logo img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.gomobd-vendor-logo-initial {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 14px;
    font-weight: 700;
    color: #fff;
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}
.gomobd-vendor-info {
    flex: 1;
    min-width: 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
    line-height: 1.2;
}
.gomobd-vendor-name-row {
    display: flex;
    align-items: center;
    gap: 4px;
    min-width: 0;
}
.gomobd-vendor-name {
    font-weight: 700;
    font-size: 13px;
    color: #1a202c;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
.gomobd-vendor-verified {
    color: #0d6efd;
    font-size: 11px;
    flex-shrink: 0;
}
.gomobd-vendor-sub-row {
    display: flex;
    align-items: center;
    gap: 6px;
    margin-top: 2px;
    flex-wrap: nowrap;
    min-width: 0;
}
.gomobd-vendor-visit-link {
    font-size: 11px;
    color: #0d6efd;
    text-decoration: none;
    white-space: nowrap;
    font-weight: 500;
}
.gomobd-vendor-visit-link:hover {
    text-decoration: underline;
}
.gomobd-vendor-divider {
    font-size: 10px;
    color: #a0aec0;
}
.gomobd-vendor-rating {
    font-size: 10px;
    color: #f6ad55;
    display: flex;
    align-items: center;
    white-space: nowrap;
}
.gomobd-vendor-rating-text {
    color: #718096;
    margin-left: 3px;
    font-size: 10px;
}

/* Extra Small Screens Adjustments */
@media (max-width: 360px) {
    .gomobd-vendor-widget {
        padding: 5px 6px;
        gap: 6px;
    }
    .gomobd-vendor-logo {
        width: 30px;
        height: 30px;
    }
    .gomobd-vendor-name {
        font-size: 12px;
    }
    .gomobd-vendor-visit-link,
    .gomobd-vendor-rating,
    .gomobd-vendor-rating-text {
        font-size: 10px;
    }
}
</style>
<?php endif; ?>

                                            
                                            <p class="details-price" style="font-size: 18px; font-weight: bold; color: #ff9800; margin-bottom: 1px;">
                                                
                                                <span id="newPrice">৳<?php echo e($details->new_price); ?></span>
                                                <?php if($details->old_price): ?>
                                                    <del style="color: #a0a0a0; font-size: 16px; margin-right: 10px;">৳<?php echo e($details->old_price); ?></del>
                                                <?php endif; ?> 
                                                <?php if($details->old_price && $details->new_price): ?>
                                                    <?php 
                                                        $discount = round((($details->old_price - $details->new_price) / $details->old_price) * 100);
                                                    ?>
                                                    <span class="badge bg-success" style="font-size: 12px; vertical-align: middle; margin-left: 10px;">Save <?php echo e($discount); ?>%</span>
                                                <?php endif; ?>
                                                
                                            </p>

                                            

                                            <div class="product-code" style="margin-bottom: 1px;">
                                                <p style="margin-bottom: 0px;"><span>Code:</span><strong><?php echo e($details->product_code); ?></strong></p>
                                            </div>

                                            <?php
                                                $productTypeText = $details->is_digital ? 'Digital' : 'Physical';
                                            ?>
                                            

                                            
                                            <?php if($details->is_wholesale && $details->wholesalePrices && $details->wholesalePrices->count() > 0): ?>
                                            <div class="wholesale-pricing-section" style="margin: 20px 0;">
                                                <h5 style="margin-bottom: 15px; font-size: 16px; font-weight: 600; color: #333;">
                                                    <i class="fa fa-tag me-2"></i> Wholesale Pricing
                                                </h5>
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-hover mb-0" style="background: #fff;">
                                                        <thead style="background: #f8f9fa;">
                                                            <tr>
                                                                <th style="padding: 12px; font-size: 14px; font-weight: 600;">Quantity</th>
                                                                <th style="padding: 12px; font-size: 14px; font-weight: 600;">Price</th>
                                                                <th style="padding: 12px; font-size: 14px; font-weight: 600;">Stock</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $__currentLoopData = $details->wholesalePrices->sortBy('min_quantity'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr class="wholesale-tier-row" 
                                                                data-min-qty="<?php echo e($tier->min_quantity); ?>" 
                                                                data-max-qty="<?php echo e($tier->max_quantity ?? 999999); ?>" 
                                                                data-price="<?php echo e($tier->wholesale_price); ?>"
                                                                style="cursor: pointer; transition: background 0.2s;">
                                                                <td style="padding: 12px; font-size: 14px;">
                                                                    <?php echo e($tier->min_quantity); ?><?php echo e($tier->max_quantity ? ' - ' . $tier->max_quantity : '+'); ?> pcs
                                                                </td>
                                                                <td style="padding: 12px; font-size: 14px; font-weight: 600; color: #28a745;">
                                                                    ৳<?php echo e(number_format($tier->wholesale_price, 2)); ?>

                                                                </td>
                                                                <td style="padding: 12px; font-size: 14px; color: <?php echo e(($tier->stock ?? 0) > 0 ? '#28a745' : '#dc3545'); ?>;">
                                                                    <?php echo e($tier->stock ?? 0); ?> pcs
                                                                </td>
                                                            </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <p class="text-muted mt-2 mb-0" style="font-size: 12px;">
                                                    <i class="fa fa-info-circle me-1"></i> Quantity select করল wholesale price automatically apply হে
                                                </p>
                                            </div>
                                            <?php endif; ?>

                                            <form action="<?php echo e(route('cart.store')); ?>" method="POST" name="formName" class="ajax-cart-form" id="productDetailsCartForm" onsubmit="return handleDetailsCartSubmit(event)">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="id" value="<?php echo e($details->id); ?>" />

                                                
                                                <?php if($details->variantPrices->count() > 0): ?>
                                                    <?php
                                                        $productcolors = $details->variantPrices->pluck('color')->unique('id')->filter();
                                                        $productsizes = $details->variantPrices->pluck('size')->unique('id')->filter();
                                                    ?>

                                                    
                                                    <?php if($productcolors->count() > 0): ?>
                                                        <div class="pro-color mb-3" style="width: 100%;">
                                                            <div class="color_inner">
                                                                <p class="mb-2" style="font-weight: 600;">Color -</p>
                                                                <div class="size-container">
                                                                    <div class="selector d-flex flex-wrap gap-2">
                                                                        <?php $__currentLoopData = $productcolors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $procolor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <div class="selector-item">
                                                                                <input type="radio" id="fc-option<?php echo e($procolor->id); ?>" value="<?php echo e($procolor->id); ?>" name="product_color" class="selector-item_radio emptyalert" required />
                                                                                <label for="fc-option<?php echo e($procolor->id); ?>" style="background-color: <?php echo e($procolor->color ?? '#ccc'); ?>; width: 35px; height: 35px; border-radius: 50%; display: block; cursor: pointer; border: 2px solid #fff; box-shadow: 0 0 5px rgba(0,0,0,0.2);" class="selector-item_label">
                                                                                    <span class="d-none">Checked</span>
                                                                                </label>
                                                                            </div>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>

                                                    
                                                    <?php if($productsizes->count() > 0): ?>
                                                        <div class="pro-size mb-3" style="width: 100%;">
                                                            <div class="size_inner">
                                                                <p class="mb-2" style="font-weight: 600;">Variant: <span class="attibute-name"></span></p>
                                                                <div class="size-container">
                                                                    <div class="selector d-flex flex-wrap gap-2">
                                                                        <?php $__currentLoopData = $productsizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prosize): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <div class="selector-item">
                                                                                <input type="radio" id="f-option<?php echo e($prosize->id); ?>" value="<?php echo e($prosize->id); ?>" name="product_size" class="selector-item_radio emptyalert" required />
                                                                                <label for="f-option<?php echo e($prosize->id); ?>" class="btn btn-outline-secondary btn-sm selector-item_label">
                                                                                    <?php echo e($prosize->sizeName ?? $prosize->name); ?>

                                                                                </label>
                                                                            </div>
                                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if($details->pro_unit): ?>
                                                    
                                                <?php endif; ?>

                                                <div class="d-flex align-items-center mb-4">
                                                    <span style="font-weight: 600; margin-right: 15px;">Quantity:</span>
                                                    <div class="input-group" style="width: 130px; border: 1px solid #ddd; border-radius: 4px;">
                                                        <button class="btn btn-light minus" type="button" style="border: none;">-</button>
                                                        <input type="text" name="qty" class="form-control text-center" value="1" style="border: none; background: transparent; font-weight: bold;" />
                                                        <button class="btn btn-light plus" type="button" style="border: none;">+</button>
                                                    </div>
                                                </div>

                                                <div class="row g-2 mb-3">
    <div class="col-6">
        <button type="submit" onclick="return sendSuccess();" name="add_cart" class="btn w-100 py-2 add_cart_btn text-white" style="background-color: #f28b24; font-weight: 600; font-size: 16px; border: none; border-radius: 4px;">
            <i class="fi-rr-shopping-cart" style="margin-right: 6px; vertical-align: middle;"></i> 
            
            <span>ADD TO CART</span>
        </button>
    </div>
    <div class="col-6">
        <button type="submit" onclick="return sendSuccess();" name="add_cart" class="btn w-100 py-2 add_cart_btn text-white" style="background-color: #f28b24; font-weight: 600; font-size: 16px; border: none; border-radius: 4px;">
            
            <span>BUY NOW</span>
        </button>
    </div>
    <div class="col-6">
        <a class="btn w-100 py-2 text-white" href="https://api.whatsapp.com/send?phone=<?php echo e($contact->whatsapp); ?>&text=হযালো, আমি এ পণ্যটির ্যারে জানতে া: <?php echo e(urlencode(Request::url())); ?>" target="_blank" style="background-color: #25d366; font-weight: 600; font-size: 15px; border-radius: 4px; display: flex; align-items: center; justify-content: center;">
            <i class="fab fa-whatsapp me-1"></i> <span>Order On WhatsApp</span>
        </a>
    </div>
    <div class="col-6">
        <a class="btn w-100 py-2 text-white" href="tel:<?php echo e($contact->hotline); ?>" style="background-color: #1a3a8a; font-weight: 600; font-size: 15px; border-radius: 4px; display: flex; align-items: center; justify-content: center;">
            <i class="fa fa-phone me-1"></i> <span>Call For Order</span>
        </a>
    </div>
</div>
                                                
                                                 
                                            </form> </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<div class="description-nav-wrapper">
    <div class="container">
        <div class="row">

            <div class="col-sm-12">
                <div class="description-nav">
                    <ul class="desc-nav-ul">
                        
                        <li>
                            <a href="#description" target="_self">Description</a>
                        </li>
                        
                        <li>
                            <a href="#writeReview" target="_self">Reviews (<?php echo e($reviews->count()); ?>) </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="pro_details_area">
    <div class="container">
        <div class="row">
            <div class="col-sm-8">
                <div class="description tab-content details-action-box" id="description">
                    <h2 style="font-family: 'Kalpurush', Arial, sans-serif;"  >বস্ারি</h2>
                    <div class="kalpurush-content">
    <?php echo $details->description; ?>

</div>
                </div>
                <div class="tab-content details-action-box" id="writeReview">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                
							  
							  
							  
							<section class="gomobd-review-section mt-5" id="reviewsList">
    <div class="gomobd-review-header d-flex justify-content-between align-items-center mb-3 flex-wrap">
        <h3 class="gomobd-review-title fw-bold mb-2 mb-md-0">
            Customer Reviews (<?php echo e($reviews->count()); ?>)
        </h3>
        <button type="button" class="gomobd-review-btn btn btn-success btn-sm"
            data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="fa fa-edit me-1"></i> Write a Review
        </button>
    </div>

    <?php if($reviews->count() > 0): ?>
    <div class="gomobd-review-list row g-3">
        <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-12">
            <div class="gomobd-review-card shadow-sm">
                <div class="gomobd-review-card-header d-flex justify-content-between align-items-start flex-wrap">
                    <div class="d-flex align-items-center">
                        <div class="gomobd-review-avatar">
                            <?php echo e(strtoupper(substr($review->name, 0, 1))); ?>

                        </div>
                        <div class="gomobd-review-meta">
                            <h6 class="gomobd-review-name"><?php echo e($review->name); ?></h6>
                            <small class="gomobd-review-date"><?php echo e($review->created_at->format('d M Y')); ?></small>
                        </div>
                    </div>
                    <div class="gomobd-review-stars">
                        <?php for($i = 1; $i <= 5; $i++): ?>
                            <?php if($i <= $review->ratting): ?>
                                <i class="fa-solid fa-star"></i>
                            <?php else: ?>
                                <i class="fa-regular fa-star"></i>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
                <div class="gomobd-review-body mt-2">
                    <p><i class="fa-regular fa-comment-dots text-success me-1"></i> <?php echo e($review->review); ?></p>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php else: ?>
    <div class="gomobd-review-empty text-center py-5">
        <i class="fa fa-clipboard-list fs-1 text-muted mb-3"></i>
        <p>This product has no reviews yet.<br><strong>Be the first one to write a review.</strong></p>
    </div>
    <?php endif; ?>
</section>

                            </div>
                        </div>
                    </div>
                </div>
            <?php
                $videoType = $details->pro_video_type ?? ($details->pro_video ? 'youtube' : null);
                $hasVideo = ($videoType === 'youtube' && $details->pro_video) || ($videoType === 'upload' && $details->pro_video_path);
            ?>
            <?php if($hasVideo): ?>
            <div class="col-sm-4">
                <div class="pro_vide">
                    <h2>িডি</h2>
                    <?php if($videoType === 'youtube' && $details->pro_video): ?>
                    <iframe width="100%" height="315"
                        src="https://www.youtube.com/embed/<?php echo e($details->pro_video); ?>" title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen></iframe>
                    <?php elseif($videoType === 'upload' && $details->pro_video_path): ?>
                    <video width="100%" height="315" controls style="border-radius:8px;background:#000;">
                        <source src="<?php echo e(asset($details->pro_video_path)); ?>" type="video/mp4">
                        <source src="<?php echo e(asset($details->pro_video_path)); ?>" type="video/webm">
                        <source src="<?php echo e(asset($details->pro_video_path)); ?>" type="video/ogg">
                        আপনা ব্রাজার ভডি সাপর্ট র ন।
                    </video>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="related-product-section">
    <div class="container">
        <div class="row">
            <div class="related-title">
                <h5>Related Product</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="product-inner owl-carousel related_slider">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="product_item wist_item wow zoomIn" data-wow-duration="1.5s"
                        data-wow-delay="0.<?php echo e($key); ?>s">

                        <div class="product_item_inner">
                            <?php if($details->old_price && $details->new_price): ?>
                                                    <?php 
                                                        $discount = round((($details->old_price - $details->new_price) / $details->old_price) * 100);
                                                    ?>
                                                    <span class="badge bg-success" style="font-size: 12px; vertical-align: middle; margin-left: 10px;">Save <?php echo e($discount); ?>%</span>
                                                <?php endif; ?>

                            <div class="pro_img">
                                <a href="<?php echo e(route('product', $value->slug)); ?>">
                                    <img src="<?php echo e(asset($value->image ? $value->image->image : '')); ?>"
                                        alt="<?php echo e($value->name); ?>" />
                                </a>
                            </div>
                           
                            <div class="pro_des">
                                <div class="pro_name">
                                    <a href="<?php echo e(route('product', $value->slug)); ?>"><?php echo e(Str::limit($value->name, 35)); ?></a>
                                </div>
                            </div>
                        </div>

                         <?php
    $averageRating = number_format($value->reviews->avg('ratting'), 1); 
    $filledStars = floor($averageRating);
    $hasHalfStar = ($averageRating - $filledStars) >= 0.5;
    $emptyStars = 5 - $filledStars - ($hasHalfStar ? 1 : 0);
    $totalReviewsCount = $value->reviews->count();
?>

<style>
    /* Desktop Defaults */
    .rating-container {
        display: inline-flex; 
        align-items: center; 
        flex-wrap: wrap;       /* Allows wrapping if space runs out */
        justify-content: flex-start; /* Aligns everything left */
        gap: 5px; 
        font-family: sans-serif;
        width: 100%;          /* Ensures it respects parent card boundaries */
    }
    .rating-number {
        font-weight: bold; 
        color: #004B87; 
        font-size: 16px;
    }
    .rating-stars {
        color: #FF6600; 
        font-size: 16px; 
        display: inline-flex; 
        gap: 2px;
    }
    .rating-count {
        color: #0066c0; 
        font-size: 15px;
    }

    /* Mobile Optimization (Screens smaller than 576px) */
    @media (max-width: 576px) {
        .rating-container {
            gap: 3px;         /* Tighter spacing on mobile */
        }
        .rating-number {
            font-size: 13px;  /* Smaller text */
        }
        .rating-stars {
            font-size: 12px;  /* Smaller stars */
            gap: 1px;
        }
        .rating-count {
            font-size: 12px;  /* Smaller count text */
        }
    }
</style>

<div class="rating-container">
    <span class="rating-number">
        <?php echo e($averageRating); ?>

    </span>

    <div class="rating-stars">
        
        <?php for($i = 0; $i < $filledStars; $i++): ?>
            <i class="fas fa-star"></i>
        <?php endfor; ?>
        
        
        <?php if($hasHalfStar): ?>
            <i class="fas fa-star-half-alt"></i>
        <?php endif; ?>
        
        
        <?php for($i = 0; $i < $emptyStars; $i++): ?>
            <i class="far fa-star"></i>
        <?php endfor; ?>
    </div>

    <span class="rating-count">
        (<?php echo e(number_format($totalReviewsCount)); ?>)
    </span>
</div>
                        <div class="pro_price">
                            <p>
                                 <?php echo e($value->new_price); ?>

                                <del> <?php echo e($value->old_price); ?></del>
                            </p>
                        </div>

                        
                        <?php if(!$value->prosizes->isEmpty() || !$value->procolors->isEmpty()): ?>
                        
                        <div class="pro_btn">

                            <a href="<?php echo e(route('product', $value->slug)); ?>" 
                                class="order-btn-link order-btn">
                                Add To Cart
                            </a>

                            <a href="<?php echo e(route('product', $value->slug)); ?>" 
                                class="cart-icon-link cart-icon-btn">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </a>

                        </div>

                        <?php else: ?>
                        
                        <div class="pro_btn">

                            
                            <form action="<?php echo e(route('cart.store')); ?>" method="POST" class="ajax-cart-form hd-isolated-form">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="id" value="<?php echo e($value->id); ?>" />
                                                <input type="hidden" name="qty" value="1" />
                                                <button type="submit" class="hd-cart-btn">
                                                    <i class="fi-rr-shopping-cart" style="margin-right: 6px; vertical-align: middle;"></i> Add To Cart
                                                </button>
                                            </form>

                            
                            <form action="<?php echo e(route('cart.store')); ?>" method="POST" class="ajax-cart-form">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="id" value="<?php echo e($value->id); ?>">
                                <input type="hidden" name="qty" value="1">

                                <button type="submit" class="cart-icon-btn">
                                    <i class="fa-solid fa-cart-shopping"></i>
                                </button>
                            </form>

                        </div>
                        <?php endif; ?>

                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Your review</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="insert-review">
                    <?php if(Auth::guard('customer')->user()): ?>
                        <form action="<?php echo e(route('customer.review')); ?>" id="review-form" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" name="product_id" value="<?php echo e($details->id); ?>">
                            <div class="fz-12 mb-2">
                                <div class="rating">
                                    <label title="Excelent">☆ <input required type="radio" name="ratting" value="5" /></label>
                                    <label title="Best">☆ <input required type="radio" name="ratting" value="4" /></label>
                                    <label title="Better">☆ <input required type="radio" name="ratting" value="3" /></label>
                                    <label title="Very Good">☆ <input required type="radio" name="ratting" value="2" /></label>
                                    <label title="Good"> <input required type="radio" name="ratting" value="1" /></label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">Message:</label>
                                <textarea required class="form-control radius-lg" name="review" id="message-text"></textarea>
                                <span id="validation-message" style="color: red;"></span>
                            </div>
                            <div class="form-group">
                                <button class="details-review-button" type="submit">Submit Review</button>
                            </div>
                        </form>
                    <?php else: ?>
                        <a class="customer-login-redirect" href="<?php echo e(route('customer.login')); ?>">Login to Post Your Review</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?> <?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('public/frontEnd/js/owl.carousel.min.js')); ?>"></script>

<script src="<?php echo e(asset('public/frontEnd/js/zoomsl.min.js')); ?>"></script>
<script>
    // Review modal ক body ে সরিযে দয় - #content এ z-index:1 এ জন্ modal backdrop এ পিে পড়িল
    document.addEventListener('DOMContentLoaded', function() {
        var m = document.getElementById('exampleModal');
        if (m && document.body) document.body.appendChild(m);
    });
</script>
<script>
    const variants = <?php echo json_encode($details->variantPrices, 15, 512) ?>;

    <?php if($details->is_wholesale && $details->wholesalePrices && $details->wholesalePrices->count() > 0): ?>
    var wholesaleTiers = [
        <?php $__currentLoopData = $details->wholesalePrices->sortBy('min_quantity'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        {
            min_quantity: <?php echo e($tier->min_quantity); ?>,
            max_quantity: <?php echo e($tier->max_quantity ?? 999999); ?>,
            price: <?php echo e($tier->wholesale_price); ?>

        }<?php if(!$loop->last): ?>,<?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    ];
    var regularPrice = <?php echo e($details->new_price); ?>;

    function getWholesalePrice(qty) {
        for (var i = 0; i < wholesaleTiers.length; i++) {
            if (qty >= wholesaleTiers[i].min_quantity && qty <= wholesaleTiers[i].max_quantity) {
                return wholesaleTiers[i].price;
            }
        }
        return null;
    }
    <?php endif; ?>

    function updateVariantPrice() {
        let color = $("input[name='product_color']:checked").val() || null;
        let size  = $("input[name='product_size']:checked").val() || null;

        let match = null;

        //  color + size (both selected)
        if (color && size) {
            match = variants.find(v => {
                let vColorId = v.color_id ?? v.color;
                let vSizeId = v.size_id ?? v.size;
                return String(vColorId) == String(color) && String(vSizeId) == String(size);
            });
        }

        //  only color (no size selected)
        if (!match && color && !size) {
            match = variants.find(v => {
                let vColorId = v.color_id ?? v.color;
                let vSizeId = v.size_id ?? v.size;
                return String(vColorId) == String(color) && (vSizeId === null || vSizeId === '');
            });
        }

        // ✅ only size (no color selected)
        if (!match && size && !color) {
            match = variants.find(v => {
                let vColorId = v.color_id ?? v.color;
                let vSizeId = v.size_id ?? v.size;
                return String(vSizeId) == String(size) && (vColorId === null || vColorId === '');
            });
        }

        // ✅ update UI
        let basePrice = parseFloat(<?php echo e($details->new_price); ?>);
        if (match && match.price !== undefined && match.price !== null) {
            // Variant price is the actual price for this color/size combination
            basePrice = parseFloat(match.price);
        }

        // Apply wholesale price if applicable (wholesale price overrides variant price)
        <?php if($details->is_wholesale && $details->wholesalePrices && $details->wholesalePrices->count() > 0): ?>
        let qty = parseInt($("input[name='qty']").val()) || 1;
        let wholesalePrice = getWholesalePrice(qty);
        if (wholesalePrice !== null) {
            basePrice = parseFloat(wholesalePrice);
        }
        <?php endif; ?>

        $('#newPrice').text('৳' + basePrice.toFixed(2));
    }
    
    // Call on page load if color/size is already selected
    $(document).ready(function() {
        updateVariantPrice();
    });

    $(document).on(
        'change',
        "input[name='product_color'], input[name='product_size']",
        updateVariantPrice
    );

    // কালর সিকট করল ঐ লারে ইমেজ খাবে
    var productImages = <?php echo json_encode($details->images->map(function($img) {
        return ['src' => asset($img->image), 'color_id' => $img->color_id];
    }), 512) ?>;

    function updateImagesByColor(colorId) {
        var colorIdStr = colorId ? String(colorId) : null;
        var filteredImages = [];

        if (colorIdStr) {
            var colorSpecific = productImages.filter(function(img) {
                return img.color_id && String(img.color_id) === colorIdStr;
            });
            var defaultImages = productImages.filter(function(img) { return !img.color_id; });
            filteredImages = colorSpecific.length > 0 ? colorSpecific : defaultImages;
        } else {
            filteredImages = productImages.filter(function(img) { return !img.color_id; });
            if (filteredImages.length === 0) filteredImages = productImages;
        }
        if (filteredImages.length === 0) filteredImages = productImages;

        var $slider = $(".details_slider");
        var owl = $slider.data("owl.carousel");
        if (owl) owl.destroy();

        var sliderHtml = filteredImages.map(function(img, i) {
            return '<div class="dimage_item"><img src="' + img.src + '" class="block__pic" /></div>';
        }).join('');
        $slider.html(sliderHtml);

        var thumbHtml = filteredImages.map(function(img, i) {
            return '<div class="indicator-item" data-id="' + i + '"><img src="' + img.src + '" /></div>';
        }).join('');
        var $thumbWrapper = $("#indicator_thumb_wrapper");
        var thumbOwl = $thumbWrapper.data("owl.carousel");
        if (thumbOwl) thumbOwl.destroy();
        $thumbWrapper.removeClass("thumb_slider owl-carousel").html(thumbHtml);
        if (filteredImages.length > 4) {
            $thumbWrapper.addClass("thumb_slider owl-carousel");
            $thumbWrapper.owlCarousel({ margin: 15, items: 4, loop: true, dots: false, nav: true, autoplayTimeout: 6000, autoplayHoverPause: true });
        }

        $slider.owlCarousel({
            margin: 15,
            items: 1,
            loop: filteredImages.length > 1,
            dots: false,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
        });

        $(".indicator-item").off("click").on("click", function() {
            var slideIndex = parseInt($(this).data("id"), 10);
            $slider.trigger("to.owl.carousel", slideIndex);
        });

        if ($(".block__pic").length && typeof $(".block__pic").imagezoomsl === "function") {
            $(".block__pic").imagezoomsl({ zoomrange: [3, 3] });
        }
    }

    $(document).on("change", "input[name='product_color']", function() {
        updateImagesByColor($(this).val() || null);
    });
</script>



<script>
    $(document).ready(function() {
        $(".details_slider").owlCarousel({
            margin: 15,
            items: 1,
            loop: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
        });
        $(".indicator-item").on("click", function() {
            var slideIndex = $(this).data("id");
            $(".details_slider").trigger("to.owl.carousel", slideIndex);
        });
    });
</script>
<!--Data Layer Start-->
<script type="text/javascript">
    window.dataLayer = window.dataLayer || [];
    dataLayer.push({
        ecommerce: null
    });
    dataLayer.push({
        event: "view_item",
        ecommerce: {
            items: [{
                item_name: "<?php echo e($details->name); ?>",
                item_id: "<?php echo e($details->id); ?>",
                price: "<?php echo e($details->new_price); ?>",
                item_brand: "<?php echo e($details->brand?$details->brand->name:''); ?>",
                item_category: "<?php echo e($details->category->name); ?>",
                item_variant: "<?php echo e($details->pro_unit); ?>",
                currency: "BDT",
                quantity: <?php echo e($details->stock ?? 0); ?>

            }],
            impression: [
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    {
                        item_name: "<?php echo e($value->name); ?>",
                        item_id: "<?php echo e($value->id); ?>",
                        price: "<?php echo e($value->new_price); ?>",
                        item_brand: "<?php echo e($details->brand?$details->brand->name:''); ?>",
                        item_category: "<?php echo e($value->category ? $value->category->name : ''); ?>",
                        item_variant: "<?php echo e($value->pro_unit); ?>",
                        currency: "BDT",
                        quantity: <?php echo e($value->stock ?? 0); ?>

                    },
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            ]
        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#add_to_cart').click(function() {
            gtag("event", "add_to_cart", {
                currency: "BDT",
                value: "1.5",
                items: [
                    <?php $__currentLoopData = Cart::instance('shopping')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        {
                            item_id: "<?php echo e($details->id); ?>",
                            item_name: "<?php echo e($details->name); ?>",
                            price: "<?php echo e($details->new_price); ?>",
                            currency: "BDT",
                            quantity: <?php echo e($cartInfo->qty ?? 0); ?>

                        },
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ]
            });
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#order_now').click(function() {
            gtag("event", "add_to_cart", {
                currency: "BDT",
                value: "1.5",
                items: [
                    <?php $__currentLoopData = Cart::instance('shopping')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cartInfo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        {
                            item_id: "<?php echo e($details->id); ?>",
                            item_name: "<?php echo e($details->name); ?>",
                            price: "<?php echo e($details->new_price); ?>",
                            currency: "BDT",
                            quantity: <?php echo e($cartInfo->qty ?? 0); ?>

                        },
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                ]
            });
        });
    });
</script>

<!-- Data Layer End-->


<script type="text/javascript">
    window.dataLayer = window.dataLayer || [];

    (function () {

        var productItem = {
            item_id: "<?php echo e($details->id); ?>",
            item_name: <?php echo json_encode($details->name, 15, 512) ?>,
            price: <?php echo e((float) $details->new_price); ?>,
            item_brand: <?php echo json_encode(optional($details->brand)->name, 15, 512) ?>,
            item_category: <?php echo json_encode(optional($details->category)->name, 15, 512) ?>,
            item_variant: <?php echo json_encode($details->pro_unit, 15, 512) ?>,
            currency: "BDT",
            quantity: <?php echo e($details->stock ?? 0); ?>

        };

        var relatedItems = [
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            {
                item_id: "<?php echo e($value->id); ?>",
                item_name: <?php echo json_encode($value->name, 15, 512) ?>,
                price: <?php echo e((float) $value->new_price); ?>,
                item_brand: <?php echo json_encode(optional($value->brand)->name, 15, 512) ?>,
                item_category: <?php echo json_encode(optional($value->category)->name, 15, 512) ?>,
                item_variant: <?php echo json_encode($value->pro_unit, 15, 512) ?>,
                currency: "BDT",
                quantity: <?php echo e($value->stock ?? 0); ?>

            }<?php if(!$loop->last): ?>,<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ];

        // view_item_list (Related products)
        if (relatedItems.length) {
            window.dataLayer.push({
                event: "view_item_list",
                ecommerce: {
                    item_list_name: "Related Products",
                    currency: "BDT",
                    items: relatedItems
                }
            });
        }

        // Facebook Pixel: ViewContent
        if (typeof fbq === "function") {
            fbq("track", "ViewContent", {
                content_ids: [productItem.item_id],
                content_name: productItem.item_name,
                content_category: productItem.item_category,
                value: productItem.price,
                currency: "BDT"
            });
        }

        // Helper: qty সহ item তৈি
        function buildCurrentItem() {
            var qtyInput = document.querySelector("input[name='qty']");
            var qty = parseInt(qtyInput ? qtyInput.value : "1", 10);
            if (isNaN(qty) || qty < 1) qty = 1;

            return {
                item_id: productItem.item_id,
                item_name: productItem.item_name,
                price: productItem.price,
                item_brand: productItem.item_brand,
                item_category: productItem.item_category,
                item_variant: productItem.item_variant,
                currency: "BDT",
                quantity: qty
            };
        }

        // "া্টে োগ কুন" -> add_to_cart + FB AddToCart
        $(document).on("click", ".add_cart_btn", function () {
            var item  = buildCurrentItem();
            var value = item.price * item.quantity;

            window.dataLayer.push({ ecommerce: null });
            window.dataLayer.push({
                event: "add_to_cart",
                ecommerce: {
                    currency: "BDT",
                    value: value,
                    items: [item]
                }
            });

            if (typeof fbq === "function") {
                fbq("track", "AddToCart", {
                    content_ids: [item.item_id],
                    content_name: item.item_name,
                    value: value,
                    currency: "BDT",
                    contents: [
                        { id: item.item_id, quantity: item.quantity }
                    ]
                });
            }
        });

        // "অডার কুন" -> add_to_cart + begin_checkout + FB InitiateCheckout
        $(document).on("click", ".order_now_btn", function () {
            var item  = buildCurrentItem();
            var value = item.price * item.quantity;

            // GA4 add_to_cart
            window.dataLayer.push({ ecommerce: null });
            window.dataLayer.push({
                event: "add_to_cart",
                ecommerce: {
                    currency: "BDT",
                    value: value,
                    items: [item]
                }
            });

            // GA4 begin_checkout
            window.dataLayer.push({
                event: "begin_checkout",
                ecommerce: {
                    currency: "BDT",
                    value: value,
                    items: [item]
                }
            });

            // FB Pixel
            if (typeof fbq === "function") {
                fbq("track", "AddToCart", {
                    content_ids: [item.item_id],
                    content_name: item.item_name,
                    value: value,
                    currency: "BDT",
                    contents: [
                        { id: item.item_id, quantity: item.quantity }
                    ]
                });

                fbq("track", "InitiateCheckout", {
                    value: value,
                    currency: "BDT",
                    num_items: item.quantity
                });
            }
        });

    })();
</script>

<script>
    $(document).ready(function() {
        $(".related_slider").owlCarousel({
            margin: 10,
            items: 6,
            loop: true,
            dots: true,
            nav: true,
            autoplay: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                    nav: true,
                },
                600: {
                    items: 3,
                    nav: false,
                },
                1000: {
                    items: 5,
                    nav: true,
                    loop: true,
                },
            },
        });
        // $('.owl-nav').remove();
    });
</script>
<script>
    $(document).ready(function() {
        $(".minus").click(function() {
            var $input = $(this).parent().find("input");
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 1 : count;
            $input.val(count);
            $input.change();
            return false;
        });
        $(".plus").click(function() {
            var $input = $(this).parent().find("input");
            $input.val(parseInt($input.val()) + 1);
            $input.change();
            return false;
        });

        // Wholesale Price Update on Quantity Change - Modern Card Design
        <?php if($details->is_wholesale && $details->wholesalePrices && $details->wholesalePrices->count() > 0): ?>
        var wholesaleTiers = [
            <?php $__currentLoopData = $details->wholesalePrices->sortBy('min_quantity'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            {
                min_quantity: <?php echo e($tier->min_quantity); ?>,
                max_quantity: <?php echo e($tier->max_quantity ?? 999999); ?>,
                price: <?php echo e($tier->wholesale_price); ?>

            }<?php if(!$loop->last): ?>,<?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ];
        var regularPrice = <?php echo e($details->new_price); ?>;

        function updatePriceBasedOnQuantity() {
            var qty = parseInt($("input[name='qty']").val()) || 1;
            var selectedPrice = regularPrice;
            var matchedTier = null;

            // Find matching wholesale tier
            for (var i = 0; i < wholesaleTiers.length; i++) {
                if (qty >= wholesaleTiers[i].min_quantity && qty <= wholesaleTiers[i].max_quantity) {
                    selectedPrice = wholesaleTiers[i].price;
                    matchedTier = wholesaleTiers[i];
                    break;
                }
            }

            // Update price display
            $('#newPrice').text('৳' + selectedPrice.toFixed(2));

            // Highlight matching tier row
            $('.wholesale-tier-row').removeClass('active-tier');
            if (matchedTier) {
                $('.wholesale-tier-row').each(function() {
                    var minQty = parseInt($(this).data('min-qty'));
                    var maxQty = parseInt($(this).data('max-qty'));
                    if (qty >= minQty && qty <= maxQty) {
                        $(this).addClass('active-tier');
                    }
                });
            }
        }

        // Update price when quantity changes
        $("input[name='qty']").on('change keyup', function() {
            updatePriceBasedOnQuantity();
        });

        // Click on tier row to set quantity to minimum
        $('.wholesale-tier-row').on('click', function() {
            var minQty = parseInt($(this).data('min-qty'));
            $("input[name='qty']").val(minQty).trigger('change');
        });

        // Initial price update
        updatePriceBasedOnQuantity();
        <?php endif; ?>
    });
</script>

<script>
    function sendSuccess() {
        var form = document.forms["formName"];
        if (!form) return true;
        var sizeEl = form["product_size"];
        var colorEl = form["product_color"];
        if (sizeEl) {
            var size = sizeEl.value || "";
            if (size === "") {
                toastr.warning("Please select any size");
                return false;
            }
        }
        if (colorEl) {
            var color = colorEl.value || "";
            if (color === "") {
                toastr.error("Please select any color");
                return false;
            }
        }
        return true;
    }
    function handleDetailsCartSubmit(event) {
        if (!sendSuccess()) return false;
        event.preventDefault();
        var form = document.getElementById("productDetailsCartForm");
        if (!form || form.classList.contains("cart-ajax-submit")) return false;
        var isOrderNow = event.submitter && event.submitter.name === "order_now";
        form.classList.add("cart-ajax-submit");
        var formData = new FormData(form);
        if (isOrderNow) formData.append("order_now", "1");
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "<?php echo e(route('cart.store')); ?>");
        xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        xhr.setRequestHeader("X-CSRF-TOKEN", document.querySelector('meta[name="csrf-token"]').content);
        xhr.setRequestHeader("Accept", "application/json");
        xhr.onload = function() {
            form.classList.remove("cart-ajax-submit");
            try {
                var data = JSON.parse(xhr.responseText);
                if (data && data.success) {
                    if (typeof toastr !== "undefined") toastr.success("র্টে যোগ হয়ে!", "ফল");
                    if (typeof cart_count === "function") cart_count();
                    if (typeof mobile_cart === "function") mobile_cart();
                    if (typeof sidebarCartRefresh === "function") sidebarCartRefresh();
                    if (isOrderNow) {
                        window.location.href = "<?php echo e(route('customer.checkout')); ?>";
                    } else {
                        if (typeof runFlyToCart === "function") runFlyToCart($(form), function() {
                            if (typeof openSidebarCart === "function") openSidebarCart();
                        });
                        else if (typeof openSidebarCart === "function") openSidebarCart();
                    }
                } else {
                    form.submit();
                }
            } catch (e) {
                form.submit();
            }
        };
        xhr.onerror = function() {
            form.classList.remove("cart-ajax-submit");
            form.submit();
        };
        var params = new URLSearchParams(formData).toString();
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send(params);
        return false;
    }
</script>
<script>
    $(document).ready(function() {
        $(".rating label").click(function() {
            $(".rating label").removeClass("active");
            $(this).addClass("active");
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(".thumb_slider").owlCarousel({
            margin: 15,
            items: 4,
            loop: true,
            dots: false,
            nav: true,
            autoplayTimeout: 6000,
            autoplayHoverPause: true,
        });
    });
</script>
<script>
    
    // Function triggered when a thumbnail is clicked
function changeMainImage(element, imageUrl) {
    // 1. Change the main image source
    document.getElementById('main-product-image').src = imageUrl;

    // 2. Remove the 'active-thumb' class from ALL thumbnails
    let allThumbs = document.querySelectorAll('.product-thumbnail');
    allThumbs.forEach(function(thumb) {
        thumb.classList.remove('active-thumb');
    });

    // 3. Add the 'active-thumb' class ONLY to the clicked element
    element.classList.add('active-thumb');
}
    
</script>
<script>
    
    $(document).ready(function() {
    // When any thumbnail is clicked
    $('#indicator_thumb_wrapper').on('click', '.indicator-item', function() {
        // Remove active class from all thumbnails
        $('#indicator_thumb_wrapper .indicator-item').removeClass('active');
        
        // Add active class only to the clicked thumbnail
        $(this).addClass('active');
    });
});
    
</script>
<script type="text/javascript">
    $(".block__pic").imagezoomsl({
        zoomrange: [3, 3]
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('frontEnd.layouts.master', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/martmama.com/public_html/resources/views/frontEnd/layouts/pages/details.blade.php ENDPATH**/ ?>