<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
     
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
         
		<title><?php echo $__env->yieldContent('title'); ?> - <?php echo e($generalsetting->name); ?></title>
		
        <!-- App favicon -->

        <link rel="shortcut icon" href="<?php echo e(asset($generalsetting->favicon)); ?>" alt="<?php echo e($generalsetting->name); ?> Favicon" />
        <meta name="author" content="Uddoktar E-Sheba" />
        <link rel="canonical" href="https://uddoktaresheba.com.bd" />
        <?php echo $__env->yieldPushContent('seo'); ?> 
        <?php echo $__env->yieldPushContent('css'); ?>
        <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/bootstrap.min.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/animate.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/all.min.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/owl.carousel.min.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/owl.theme.default.min.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/mobile-menu.css')); ?>" />
        <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/select2.min.css')); ?>" />
        <!-- toastr css -->
        <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/assets/css/toastr.min.css" />
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
<link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.6.0/uicons-regular-straight/css/uicons-regular-straight.css'>
        <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/wsit-menu.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(url('/style.css')); ?>?v=<?php echo e(time()); ?>">
<link rel="stylesheet" href="<?php echo e(url('/responsive.css')); ?>?v=<?php echo e(time()); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/css/main.css')); ?>" />
        <!-- Uddoktar E-Sheba Fonts  -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
<link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet">
        
        

        <meta name="facebook-domain-verification" content="<?php echo e($generalsetting->facebook_verification); ?>" />
        <meta name="google-site-verification" content="<?php echo e($generalsetting->google_verification); ?>" />

        
        <script>
            window.dataLayer = window.dataLayer || [];
            window.dataLayer.push({
                pageType: '<?php echo e($pageType ?? (\Illuminate\Support\Facades\Route::currentRouteName() ?? "general")); ?>',
                pageTitle: '<?php echo e(addslashes($generalsetting->name ?? "")); ?>',
                siteName: '<?php echo e(addslashes($generalsetting->name ?? "")); ?>',
                currency: 'BDT',
                language: 'bn'
            });
            <?php echo $__env->yieldPushContent('dataLayer'); ?>
        </script>
		
		<style> 

</style> 
		

        <?php
            $pixels = $pixels ?? collect();
            $gtm_code = $gtm_code ?? collect();
            $tiktok_pixels = $tiktok_pixels ?? collect();
        ?>
        <?php $__currentLoopData = $pixels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pixel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- Facebook Pixel Code -->
        <script>
            !(function (f, b, e, v, n, t, s) {
                if (f.fbq) return;
                n = f.fbq = function () {
                    n.callMethod ? n.callMethod.apply(n, arguments) : n.queue.push(arguments);
                };
                if (!f._fbq) f._fbq = n;
                n.push = n;
                n.loaded = !0;
                n.version = "2.0";
                n.queue = [];
                t = b.createElement(e);
                t.async = !0;
                t.src = v;
                s = b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t, s);
            })(window, document, "script", "https://connect.facebook.net/en_US/fbevents.js");
            fbq("init", "<?php echo e($pixel->code); ?>");
            fbq("track", "PageView");
        </script>
        <noscript>
            <img height="1" width="1" style="display: none;" src="https://www.facebook.com/tr?id=<?php echo e($pixel->code); ?>&ev=PageView&noscript=1" />
        </noscript>
        <!-- End Facebook Pixel Code -->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <?php $__currentLoopData = $gtm_code; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gtm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','<?php echo e(str_starts_with($gtm->code, "GTM-") ? $gtm->code : "GTM-".$gtm->code); ?>');</script>
        <!-- End Google Tag Manager -->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php $__currentLoopData = $tiktok_pixels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!-- TikTok Pixel -->
        <script>
            !function (w, d, t) {
                w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var i="https://analytics.tiktok.com/i18n/pixel/events.js";ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=i,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};var o=document.createElement("script");o.type="text/javascript",o.async=!0,o.src=i+"?sdkid="+e+"&lib="+t;var a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(o,a)};
                ttq.load('<?php echo e($tp->code); ?>');
                ttq.page();
            }(window, document, 'ttq');
        </script>
        <!-- End TikTok Pixel -->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <style>
        
        
        body {
    font-family: 'Roboto', sans-serif;
}

/* Example to match the bold heading in your image */
.order-review-title {
    font-family: 'Roboto', sans-serif;
    font-weight: 500; /* Medium weight */
}
        /* Apply Hind Siliguri to the whole website */
a, span, div, button, input, select, textarea {
    font-family: 'Roboto', sans-serif !important;
    line-height: 1.6; /* Essential for Bangla text readability */
}

/* Specifically target all numbers/prices for Montserrat */
/* Use this class whenever you have prices (e.g., <p class="price-font">৳ 500</p>) */
.price-font, .number-font {
    font-family: 'Roboto', sans-serif !important;
    font-weight: 700;
}

/* Force Headers to be Bold Hind Siliguri */
h1, h3, h4, h5, h6 {
    font-family: 'Roboto', sans-serif !important;
    font-weight: 700;
}

.kalpurush-content, 
.kalpurush-content * {
    font-family: 'Kalpurush', Arial, sans-serif !important;
}

.side_cat_img {
    width: 40px;
    height: auto;
    margin-right: 5px;
}
 .cartlist img {
    height: 56px;
    width: 56px;
}

.slider-side-banner img {
    height: 100%;
    object-fit: cover;
    min-height: 400px; /* Adjust based on your slider height */
    border-radius: 8px;
}


/* Header and Link */
.see-all-link {
    color: #f39c12;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
}

/* Container for the single row look */
.brand-section .brand-item {
    display: block;
    background: #ffffff;
    border: 1px solid #eaeaea;
    border-radius: 10px;
    padding: 20px 15px;
    margin: 10px 5px; /* Adds breathing room between items */
    text-decoration: none;
    transition: all 0.3s ease;
    text-align: center;
}

.brand-section .brand-img img {
    max-height: 40px;
    max-width: 100%;
    object-fit: contain;

    /* IMPORTANT FOR CLEAR LOGO */
    filter: none !important;
    opacity: 1 !important;
    image-rendering: -webkit-optimize-contrast;
    image-rendering: crisp-edges;
}


.brand-section .brand-item:hover {
    box-shadow: 0 5px 15px rgba
    
}

/* অর্ডার বাটনের ডিজাইন */
    .product_item .order-btn,
    .product_item .order-btn-link{
        display:flex;
        justify-content:center;
        align-items:center;
        width:100%;
        height:40px;
        padding:8px 12px;
        background:#f48721;
        color: #f48721 !important;
        border-radius:4px;
        font-size:14px;
        font-weight:600;
        cursor:pointer;
        font-family:"Potro Sans Bangla",sans-serif;
        transition:all .2s ease;
        text-align:center;
    }
    .product_item .order-btn:hover,
    .product_item .order-btn-link:hover{
        background:#f48721;
        border-color:#f48721;
        color:#fff !important;
    }

    /* কার্ আইকন বাটন */
    .product_item .cart-icon-btn,
    .product_item .cart-icon-link{
        display:flex;
        justify-content:center;
        align-items:center;
        width:100%;
        height:40px;
        background:#573232;
        border-radius:4px;
        cursor:pointer;
        transition:all .2s ease;
    }
    .product_item .cart-icon-btn i,
    .product_item .cart-icon-link i{
        font-size:18px;
        color:#f48721;
    }
    .product_item .cart-icon-btn:hover,
    .product_item .cart-icon-link:hover{
        background:#f48721;
        border-color:#f48721;
    }
    .product_item .cart-icon-btn:hover i,
    .product_item .cart-icon-link:hover i{
        color:#fff;
    }

    /* আে গ্লোবাল ্র_btn বাটন স্টাইল সামানয ওভাররাইড */
    .product_item .pro_btn button{
        width:100%;
        border-radius:4px;
        background: #fff;
    }
    .product_item .pro_btn button {
    text-transform: none !important;
}
   .homeproduct {
    padding-bottom: 0px;
    padding-top: 0px;
    background: #FBF9F5;
    margin-bottom: 0px;
    padding: 10px 0;
} 


            .whatsapp-float {
                position: fixed;
                bottom: 20px; /* Adjust vertical position */
                left: 20px; /* Adjust horizontal position */
                z-index: 1000;
                background-color: #25D366;
                color: white;
                border-radius: 50%;
                padding: 15px;
                font-size: 24px; /* Icon size */
                box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
                display: flex;
                align-items: center;
                justify-content: center;
            }
        
            .whatsapp-float:hover {
                color: white;
                box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.5);
            }
            /* Hide the .whatsapp-float element on mobile devices */
            @media (max-width: 768px) {
                .whatsapp-float {
                    display: none;
                }
            }
            .stock-out-overlay {
                position: absolute;
                top: 50%;
                left: 0;
                transform: translateY(-50%);
                width: 100%;
                background-color: white;
                color: black;
                font-size: 1em;
                opacity:0.8;
                font-weight: bold;
                text-align: center;
                padding: 10px 0;
                overflow: hidden;
                white-space: nowrap;
            }
            /* Facebook icon */
            .social_list .fa-facebook-f {
                padding:5px 8px;
                color:white;
                background-color: #3b5998; 
                
            }
            
            .social_list .fa-facebook-f:hover {
                background-color: #2d4373;  /* Darker Facebook blue on hover */
            }
            
            /* Twitter icon */
            .social_list .fa-twitter {
                padding:5px 8px;
                color:white;
                background-color: #1da1f2;  /* Twitter blue */
            }
            
            .social_list .fa-twitter:hover {
                padding:5px 8px;
                color:white;
                background-color: #0c85d0;  /* Darker Twitter blue on hover */
            }
            
            /* Instagram icon */
            .social_list .fa-instagram {
                padding:5px 8px;
                color:white;
                background-color: #e4405f;  /* Instagram pink */
            }
            
            .social_list .fa-instagram:hover {
                padding:5px 8px;
                color:white;
                background-color: #bc2a8d;  /* Darker Instagram purple-pink on hover */
            }
            
            /* LinkedIn icon */
            .social_list .fa-linkedin {
                padding:5px 8px;
                color:white;
                background-color: #0077b5;  /* LinkedIn blue */
            }
            
            .social_list .fa-linkedin:hover {
                background-color: #005983;  /* Darker LinkedIn blue on hover */
            }
            
            /* WhatsApp icon */
            .social_list .fa-whatsapp {
                padding:5px 8px;
                color:white;
                background-color: #25d366;  /* WhatsApp green */
            }
            
            .social_list .fa-whatsapp:hover {
                background-color: #128c7e;  /* Darker WhatsApp green on hover */
            }
            
            /* YouTube icon */
            .social_list .fa-youtube {
                padding:5px 8px;
                color:white;
                background-color: #ff0000;  /* YouTube red */
            }
            
            .social_list .fa-youtube:hover {
                background-color: #cc0000;  /* Darker YouTube red on hover */
            }

            /* Footer Background Fix - Ensure footer always displays correctly on all pages */
            /* Note: Footer colors are set via inline styles and style.blade.php */
            footer {
                position: relative !important;
                z-index: 999 !important;
                clear: both !important;
                margin-top: 0 !important;
            }
            
            /* Ensure content doesn't overlap footer */
            #content {
                position: relative;
                z-index: 1;
                background: transparent !important;
                background-color: transparent !important;
            }
            
            /* Prevent body background from affecting footer */
            body {
                background: transparent !important;
                background-color: transparent !important;
            }

            /* App Store Badges Styles */
            .app-badges {
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: center;
                gap: 10px;
                margin-top: 15px;
            }
            
            .app-badge-btn {
                display: inline-block;
                transition: transform 0.3s ease, opacity 0.3s ease;
                text-decoration: none;
            }
            
            .app-badge-btn:hover {
                transform: scale(1.05);
                opacity: 0.9;
            }
            
            .app-badge-btn img {
                height: 35px !important;
                max-height: 35px !important;
                width: auto !important;
                max-width: 140px !important;
                display: block;
            }
            
            /* Responsive App Badges */
            @media (max-width: 768px) {
                .app-badges {
                    gap: 10px;
                }
                
                .app-badge-btn img {
                    height: 32px !important;
                    max-height: 32px !important;
                    max-width: 130px !important;
                }
            }
            
            @media (max-width: 576px) {
                .app-badge-btn img {
                    height: 30px !important;
                    max-height: 30px !important;
                    max-width: 120px !important;
                }
            }

            /* Newsletter Subscribe Styles */
            .footer-newsletter {
                margin: 15px 0 25px 0;
                padding: 15px;
                border-radius: 8px;
                border: none;
            }
            
            /* Newsletter Title Color - White */
            .footer-menu .title.stay_conn a {
                color: #ffffff !important;
            }
            
            .footer-menu ul + ul {
                margin-top: 20px;
            }

            .modern-subscribe {
                width: 100%;
            }

            .newsletter-input-group {
                display: flex;
                flex-direction: row;
                gap: 0;
                width: 100%;
                border-radius: 50px;
                overflow: hidden;
                padding: 2px;
            }

            .newsletter-input {
                flex: 1;
                padding: 12px 20px;
                border: none;
                border-radius: 50px 0 0 50px;
                color: #fff;
                font-size: 14px;
                transition: all 0.3s ease;
            }

            .newsletter-input::placeholder {
                color: rgba(255, 255, 255, 0.7);
            }

            .newsletter-input:focus {
                outline: none;
            }

            .newsletter-btn {
                padding: 12px 20px;
                border-radius: 50px;
                border: none;
                color: #fff;
                font-weight: 500;
                font-size: 16px;
                transition: all 0.3s ease;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                min-width: 50px;
            }

            .newsletter-btn:hover {
                transform: scale(1.05);
                color: #fff;
                opacity: 0.85;
            }

            .newsletter-btn i {
                font-size: 16px;
            }

            /* Responsive Styles for Newsletter */
            @media (max-width: 768px) {
                .footer-newsletter {
                    margin: 12px 0 15px 0;
                }

                .newsletter-input-group {
                    flex-direction: row;
                    border-radius: 50px;
                }

                .newsletter-input {
                    border-radius: 50px 0 0 50px;
                    padding: 10px 18px;
                    font-size: 13px;
                }

                .newsletter-btn {
                    border-radius: 50px;
                    padding: 10px 18px;
                    min-width: 50px;
                }
            }

            @media (max-width: 576px) {
                .newsletter-input {
                    padding: 10px 15px;
                    font-size: 13px;
                }

                .newsletter-btn {
                    padding: 10px 15px;
                    font-size: 14px;
                }
            }

            /* Top headline scrolling text - CSS animation */
            .headline-scroll-wrapper {
                display: flex;
                width: max-content;
                animation: headlineScroll 25s linear infinite;
                white-space: nowrap;
            }
            .headline-scroll-text {
                padding-right: 3em;
                flex-shrink: 0;
            }
            .headline-scroll-duplicate { padding-right: 3em; }
            @keyframes headlineScroll {
                0% { transform: translateX(0); }
                100% { transform: translateX(-50%); }
            }
            
            
           /* Applies ONLY to desktop screens */
@media (min-width: 992px) {
    /* 1. Turn the container into a flex container and wrap rows */
    .category-product.main_product_inner {
        display: flex !important;
        flex-wrap: wrap !important;
        gap: 15px !important; /* Space between items */
    }

    /* 2. Calculate exact width for 5 items per row considering the gaps */
    .category-product.main_product_inner .product_item.wist_item {
        flex: 0 0 calc(20% - 12px) !important;
        max-width: calc(20% - 12px) !important;
        margin-right: 0 !important; /* Resets any unexpected old margins */
    }
} 

.product-code p {
    display: inline-block;
    background: #f48721;
    color: #fff;
    padding: 0px 10px;
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent;
    border-right: 5px solid #fff;
    line-height: 0;
    margin-bottom: 1px;
}

.mb-3 {
    margin-bottom: 0rem !important;
}        
        </style>
        
        
        <style>
        
            .menu-area {
    background: #041F1E;
    border-top: px solid #ddd;
    border-bottom: px solid #ddd;
}
    li.cat_bar>a {
    padding: 13px 3px;
    display: flex;
    width: 100%;
    height: 50px;
    font-size: 15px;
    background-color: #041F1E;
    margin-left: 0 !important;
    justify-content: space-between;
    align-items: center;
    
    font-weight: 400;
    font-family: Open Sans, sans-serif;
}      

.main-search form button {
    height: 100%;
    outline: 0;
    background: #F5F5F5;
    width: 11%;
    float: left;
}
.main-search form button svg {
    height: 28px;
    width: 35px;
    color: #041F1E;
}

.main-search form {
    border: 1px solid;
    height: 50px;
    background: #F5F5F5;
    border-color: #F5F5F5;
    width: 100%;
    margin: 0 auto;
    border-radius: 8px;
    overflow: hidden;
    display: flex;
    
}
.main-search form:focus-within {
    border-color: #F48721 !important;
    

        </style>
        <style>
            /* Container Spacing */
.category-sliger {
    padding: 20px 10px;
    position: relative;
}

/* The White Box */
.category-card {
    display: flex !important;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    background: #fff;
    border-radius: 20px; /* Rounded corners */
    padding: 15px;
    aspect-ratio: 1 / 1; /* Keeps it square */
    text-decoration: none !important;
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    transition: transform 0.3s ease;
    margin: 5px; /* Space for the shadow */
}

.category-card:hover {
    transform: translateY(-5px);
}

/* Icon Styling - Overriding your inline 50% radius */
.cat-icon {
    width: 60%;
    margin-bottom: 8px;
}

.cat-icon img {
    width: 100% !important;
    height: auto !important;
    border: none !important; /* Removes the green border */
    border-radius: 0 !important; /* Removes the circle shape */
    object-fit: contain;
}

/* Category Name Styling */
.category-name {
    display: block;
    width: 100%;
    font-size: 13px;
    font-weight: 600;
    color: #333;
    text-align: center;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Orange Navigation Arrows */
.category-sliger .owl-nav button {
    position: absolute;
    top: 40%;
    transform: translateY(-50%);
    background: #f28b27 !important; /* Orange */
    color: #fff !important;
    width: 35px;
    height: 35px;
    border-radius: 50% !important;
    font-size: 20px !important;
    box-shadow: 0 4px 10px rgba(242, 139, 39, 0.3);
    z-index: 10;
}

.category-sliger .owl-nav .owl-prev {
    left: -15px;
}

.category-sliger .owl-nav .owl-next {
    right: -15px;
}

/* Responsive adjustment for Mobile */
@media (max-width: 768px) {
    .category-card {
        padding: 10px;
    }
    .category-name {
        font-size: 11px;
    }
}


/* Base styles for desktop/larger screens */
section.slider-section {
    margin-top: 10px;
    margin-bottom: 10px;
    margin-left: 0px;  
    margin-right: 0px; 
}

/* Mobile view styles (Screens 768px wide and smaller) */
@media (max-width: 768px) {
    section.slider-section {
        margin-left: 0;
        margin-right: 0;
        /* Optional: Add a little padding if you don't want the content 
           touching the absolute edge of the screen */
        padding-left: 5px;
        padding-right: 5px;
    }
}

.product_item .pro_btn > form:last-child, 
.product_item .pro_btn > a.cart-icon-link {
    display: none !important;
}            
        </style>
        <style>
            
            .track_btn a i {
    font-size: 22px !important;
}
.for_order a i {
    font-size: 22px !important;
}
        </style> 
        
        <style>
/* Container & Wrapper */
.category-sliger {
    padding: 20px 0;
    position: relative;
}

.cat-item-wrapper {
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* The White Box - Perfect Square */
.cat-white-box {
    background: #fff;
    border-radius: 20px;
    width: 100%;
    aspect-ratio: 1 / 1;
    display: flex !important;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    margin-bottom: 12px;
    transition: transform 0.3s ease;
    border: none !important;
    padding: 10px; /* Space between icon and box edges */
}

/* THE ICON - This makes it Large */
.cat-white-box img {
    width: 90% !important; /* Increase this to 95% if you want it even bigger */
    height: 90% !important;
    object-fit: contain;
    border-radius: 0 !important; /* Removes your old circle style */
    border: none !important;     /* Removes your old green border */
}

.cat-white-box:hover {
    transform: translateY(-5px);
}

/* Category Label */
.cat-label a {
    font-size: 15px;
    font-weight: 500;
    color: #333;
    text-decoration: none;
    text-align: center;
    display: block;
}

/* --- ORANGE NAVIGATION ARROWS --- */
.category-sliger.owl-theme .owl-nav {
    margin: 0;
}

.category-sliger.owl-theme .owl-nav [class*='owl-'] {
    position: absolute;
    top: 40%; /* Centers arrow relative to the white box */
    transform: translateY(-50%);
    background: #f28b27 !important; /* Signature Orange */
    color: #fff !important;
    width: 38px;
    height: 38px;
    border-radius: 50% !important;
    font-size: 24px !important;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0 !important;
    z-index: 100;
    opacity: 1 !important;
}

.category-sliger.owl-theme .owl-nav .owl-prev {
    left: -15px;
}

.category-sliger.owl-theme .owl-nav .owl-next {
    right: -15px;
}

/* Hide arrows if disabled */
.category-sliger.owl-theme .owl-nav .disabled {
    opacity: 0.3 !important;
    cursor: default;
}
/* Mobile Arrows visibility */
@media (max-width: 768px) {
    .category-sliger .owl-nav .owl-prev { left: 0; }
    .category-sliger .owl-nav .owl-next { right: 0; }
}
       




/* --- 1. Center Title & Remove Line --- */
.sec_title {
    text-align: left; /* Centers the text */
    margin-bottom: 30px;
    border-bottom: 10px !important; /* Removes the horizontal line */
}

.section-title-header {
    border-bottom: none !important; /* Ensures no line under heading */
}

.section-title-name {
    font-size: 24px;
    font-weight: 700;
    color: #000;
}

/* --- 2. Make Icon Even Larger --- */
.cat-white-box {
    background: #fff;
    border-radius: 20px;
    width: 100%;
    aspect-ratio: 1 / 1;
    display: flex !important;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    margin-bottom: 12px;
    padding: 5px; /* Reduced padding to make icon look bigger */
    border: none !important;
}

.cat-white-box img {
    width: 95% !important; /* Maximum size */
    height: 95% !important;
    object-fit: contain;
    border: none !important;
    border-radius: 0 !important;
}

/* --- 3. Fix Invisible Arrows --- */
.category-sliger.owl-theme {
    position: relative;
    padding: 0 20px; /* Gives space for arrows inside the container */
}

.category-sliger.owl-theme .owl-nav [class*='owl-'] {
    position: absolute;
    top: 40%; 
    transform: translateY(-50%);
    background: #f28b27 !important; /* Orange */
    color: #fff !important;
    width: 40px;
    height: 40px;
    border-radius: 50% !important;
    display: flex !important;
    align-items: center;
    justify-content: center;
    z-index: 999 !important; /* Ensures it stays on top */
    opacity: 1 !important;
    margin: 0 !important;
}

/* Moved arrows to 0 so they don't hide outside the screen */
.category-sliger.owl-theme .owl-nav .owl-prev {
    left: 0 !important;
}

.category-sliger.owl-theme .owl-nav .owl-next {
    right: 0 !important;
}

/* Ensure arrows are clickable */
.owl-carousel .owl-nav.disabled {
    display: block !important; 
}     




.timer_inner {
    display: flex;
    justify-content: left; /* Horizontal centering */
    align-items: left;     /* Vertical centering */
    width: 100%;
}


/* Container to handle the "View All" alignment */
.section-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    border-bottom: 2px solid #e0e0e0; /* The light gray full-width line */
    padding-bottom: 10px;
    margin-bottom: 20px;
    position: relative;
}

/* The Title Styling */
.section-title-name {
    font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
    font-weight: 700;
    font-size: 1.25rem;
    color: #003366; /* Dark professional blue */
    position: relative;
    padding-bottom: 10px;
}

/* The Orange Accent Line */
.section-title-name::after {
    content: "";
    position: absolute;
    left: 0;
    bottom: -12px; /* Positioned exactly over the gray border */
    width: 60px;    /* Adjust width of the orange segment */
    height: 4px;    /* Thickness of the orange line */
    background-color: #ff8000; /* Vibrant orange */
}

/* "View All" Link Styling */
.view-all {
    font-family: sans-serif;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    color: #ff8000;
    text-decoration: none;
    letter-spacing: 1px;
    border-bottom: 1px solid #ff8000;
    padding-bottom: 2px;
    margin-bottom: 2px;
}

.view-all:hover {
    opacity: 0.8;
}
        </style>
        
        
    <style>
    
  /* This forces the border to stay gray (#ddd) even when the mouse is over it */
.product_item:hover {
    border: 1px solid #ddd !important;
    border-color: #ddd !important;
    background: #fff !important;
    box-shadow: none !important; /* Removes any shadow that might look like a border */
    transform: none !important;  /* Stops the card from moving/scaling */
}

/* Also target the inner container just in case your theme uses it */
.product_item:hover .product_item_inner {
    border-color: #ddd !important;
    box-shadow: none !important;
}      

/* 3. Product Image Styling */
.pro_img {
    margin-bottom: 10px;
    display: flex;
    justify-content: center;
}


/* 4. Text & Price Styling */
.pro_name a {
    font-family: 'Montserrat', sans-serif;
    font-size: 14px;
    color: #333;
    font-weight: 500;
    text-decoration: none;
    display: block;
    margin-bottom: 0px;
    text-align: left;
}

.pro_price p {
    font-family: 'Montserrat', sans-serif;
    font-size: 15px;
    text-align: left;
    font-weight: 700;
    color: #f39232; /* Keeping price orange as per image */
    margin: 0;
}

.pro_price del {
    color: #999;
    font-weight: 400;
    text-align: left;
    font-size: 12px;
    margin-left: 5px;
}

/* 5. Button Style - Static Design */
.order-btn, .order-btn-link, .cart-icon-btn, .cart-icon-link {
    width: 100%;
    background: #ffffff;
    border: 1px solid #f39232;
    color: #f39232;
    padding: 7px 10px;
    border-radius: 4px;
    font-family: 'Montserrat', sans-serif;
    font-weight: 600;
    font-size: 13px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    margin-top: auto; /* Keeps button at the bottom */
}

/* 6. REMOVED HOVER COLOR - Keeps it white/orange border on hover */
.order-btn:hover, .order-btn-link:hover, .cart-icon-btn:hover {
    background: #ffffff; /* Stays white */
    color: #f39232;      /* Stays orange text */
    border-color: #f39232;
}

.featured-title {
  text-align: center; /* Centers the text */
  color: #222831;     /* Changes the font color */
  font-size: 22px;    /* Increases the font size */
  font-weight: bold;  /* Optional: makes it stand out more */
}


@media (max-width: 768px) {
  .featured-title {
    font-size: 18px; /* Slightly smaller for mobile */
  }
}

@media (max-width: 768px) {
  .slider-side-banner {
    display: none;
  }
}

.homeproduct.main-details-page {
    margin-top: -15.5px;
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
    margin-bottom: 1px;
}
.selector-item_label {
    position: relative;
    height: 100%;
    width: 100%;
    text-align: center;
    border-radius: 5px;
    line-height: 25px;
    font-weight: 400;
    transition-duration: .5s;
    transition-property: transform, color, box-shadow;
    transform: none;
    margin: 0;
    padding: 0px 1.5px;
    color: #000000;
}


/* Sleek, professional action button adjustments exclusively for mobile */
@media (max-width: 767px) {
    .row.g-2.mb-3 .col-6 button,
    .row.g-2.mb-3 .col-6 a.btn {
        padding-top: 6px !important;
        padding-bottom: 6px !important;
        font-size: 13px !important; /* Slightly smaller, clean readable typography */
        display: flex !important;
        align-items: center;
        justify-content: center;
        height: 38px !important; /* Locks a uniform, professional height */
        line-height: 1 !important;
        white-space: nowrap;
    }

    /* Fix spacing for icons inside mobile buttons */
    .row.g-2.mb-3 .col-6 button i,
    .row.g-2.mb-3 .col-6 a.btn i {
        font-size: 14px !important;
        margin-right: 4px !important;
    }
}
    </style>
    
   
    <style>
/* to show five product at a time in dekstop */      
/* Slider Grid Spacing */
/* ==========================================================================
   1. GLOBAL CONTAINER AND CARD SYSTEM BINDINGS
   ========================================================================== */

.hotdeal-column-grid {
    display: flex !important;
    flex-direction: column !important;
    gap: 12px !important;
    padding: 4px !important;
    box-sizing: border-box !important;
}

.premium-hotdeal-card {
    position: relative !important; /* Serves as the anchor base for badge pinning */
    background: #ffffff !important;
    border: 1px solid #e2e8f0 !important;
    border-radius: 8px !important;
    overflow: hidden !important;
    width: 100% !important;
    box-sizing: border-box !important;
}

/* UNIVERSAL BADGE CORNER FIX: Pinned to absolute top-right of outer card border */
.best-selling-badge {
    position: absolute !important;
    top: 0px !important;
    right: 0px !important; 
    left: auto !important;  
    background-color: #dc2626 !important; /* Premium Clean Red */
    color: #ffffff !important;
    font-size: 10px !important;
    font-weight: 700 !important;
    padding: 4px 10px !important;
    border-top-right-radius: 8px !important; /* Matches top right border profile radius */
    border-bottom-left-radius: 8px !important;
    border-top-left-radius: 0px !important;
    border-bottom-right-radius: 0px !important;
    z-index: 99 !important; 
    white-space: nowrap !important;
}

/* ==========================================================================
   2. DESKTOP VIEWPORT LAYOUT TRACKS (992px and up)
   ========================================================================== */
@media (min-width: 992px) {
    .hotdeals-section-wrapper .product_item_inner {
        display: flex !important;
        flex-direction: row !important;
        align-items: stretch !important;
        justify-content: space-between !important;
        padding: 10px !important; /* Compact interior space formatting */
        gap: 12px !important;
        width: 100% !important;
        box-sizing: border-box !important;
    }

    /* Left Side: Image canvas */
    .hotdeal-left-block {
        flex: 0 0 46% !important;
        max-width: 46% !important;
        width: 46% !important;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
        background: #ffffff !important;
        border-radius: 6px !important;
        padding: 4px !important;
        box-sizing: border-box !important;
    }

    .hotdeals-section-wrapper .pro_img img {
        width: 100% !important;
        height: 230px !important;
        object-fit: contain !important;
    }

    /* Right Side: Information Content Box */
    .hotdeal-right-block {
        flex: 0 0 54% !important;
        max-width: 54% !important;
        width: 54% !important;
        display: flex !important;
        flex-direction: column !important;
        justify-content: space-between !important;
        align-items: flex-start !important; /* Hard Left-Alignment */
        text-align: left !important;
        box-sizing: border-box !important;
        padding: 4px 0px 2px 4px !important;
    }

    /* TIGHT EXTRA SPACER RE-ADJUSTMENTS */
    .hotdeals-section-wrapper .pro_des {
        width: 100% !important;
        margin-bottom: auto !important;
        display: flex !important;
        flex-direction: column !important;
        align-items: flex-start !important;
        gap: 2px !important; /* Minimizes gap down to raw text thresholds */
    }

    .hotdeals-section-wrapper .pro_name {
        width: 100% !important;
        text-align: left !important;
    }

    .hotdeals-section-wrapper .pro_name a {
        display: block !important;
        font-size: 15px !important;
        font-weight: 600 !important;
        color: #0f172a !important;
        line-height: 1.25 !important;
        text-align: left !important;
        text-decoration: none !important;
    }

    .hotdeals-section-wrapper .pro_price {
        width: 100% !important;
        text-align: left !important;
    }

    .hotdeals-section-wrapper .pro_price p {
        margin: 0 !important;
        padding: 0 !important;
        display: flex !important;
        justify-content: flex-start !important;
        align-items: center !important;
        gap: 6px !important;
    }

    .new-price-tag {
        font-size: 16px !important;
        font-weight: 700 !important;
        color: #f28729 !important;
    }

    .old-price-tag {
        font-size: 12px !important;
        color: #94a3b8 !important;
        text-decoration: line-through !important;
    }

    /* Save Pill Badge under price with background value #bfdb38 */
    .premium-save-tag {
        display: inline-block !important;
        background-color: #bfdb38 !important; 
        color: #1e293b !important; 
        font-size: 10px !important;
        font-weight: 700 !important;
        padding: 2px 8px !important;
        border-radius: 4px !important;
        margin-top: 1px !important;
        text-transform: uppercase !important;
    }

    /* Action Buttons Group Row */
    .hd-custom-btn-wrapper {
        display: flex !important;
        flex-direction: row !important;
        justify-content: flex-start !important;
        gap: 6px !important;
        width: 85% !important;
        margin-top: 4px !important; /* Reduced layout spacing gap */
    }

    .hd-isolated-form {
        display: block !important;
        flex: 1 !important;
        width: 50% !important;
    }

    .hd-cart-btn, .hd-buy-btn, .hd-single-btn {
        display: flex !important;
        width: 100% !important;
        height: 34px !important;
        font-size: 11px !important;
        font-weight: 700 !important;
        align-items: center !important;
        justify-content: center !important;
        border-radius: 4px !important;
        cursor: pointer !important;
       
        text-decoration: none !important;
        transition: all 0.2s ease-in-out !important;
    }

    .hd-cart-btn {
        background-color: #ffffff !important;
        color: #f28729 !important;
        border: 1.5px solid #f28729 !important;
    }
    .hd-cart-btn:hover { background-color: #f28729 !important; color: #ffffff !important; }

    .hd-buy-btn, .hd-single-btn {
        background-color: #f28729 !important;
        color: #ffffff !important;
        border: 1.5px solid #f28729 !important;
    }
    .hd-buy-btn:hover, .hd-single-btn:hover { background-color: #000000 !important; border-color: #000000 !important; }
}

/* ==========================================================================
   3. VERITICAL MOBILE STACK LAYOUT RULES (991px and down)
   ========================================================================== */
@media (max-width: 991px) {
    /* FIXED: Return to the original vertical structural layout */
    .hotdeals-section-wrapper .product_item_inner {
        display: flex !important;
        flex-direction: column !important; /* Image on top, info content below */
        align-items: flex-start !important;
        justify-content: flex-start !important;
        padding: 10px !important;
        gap: 8px !important;
        width: 100% !important;
        box-sizing: border-box !important;
    }

    /* Top Image block sizes */
    .hotdeal-left-block {
        display: block !important;
        width: 100% !important;
        background: #ffffff !important;
        border-radius: 6px !important;
        padding: 8px !important;
        box-sizing: border-box !important;
    }

    .hotdeals-section-wrapper .pro_img {
        width: 100% !important;
        margin: 0 !important;
        display: flex !important;
        justify-content: center !important;
    }

    .hotdeals-section-wrapper .pro_img img {
        width: 100% !important;
        height: 140px !important; /* Increased image display scale height */
        max-height: 140px !important;
        object-fit: contain !important;
    }

    /* Bottom Info Content Block Layout details */
    .hotdeal-right-block {
        display: flex !important;
        flex-direction: column !important;
        width: 100% !important;
        align-items: flex-start !important; /* Lock alignments to the left edge */
        text-align: left !important;
        box-sizing: border-box !important;
        padding: 4px 0 0 0 !important;
    }

    .hotdeals-section-wrapper .pro_des {
        display: flex !important;
        flex-direction: column !important;
        align-items: flex-start !important;
        gap: 3px !important; /* Tiny, clean gap spacing */
        width: 100% !important;
    }

    .hotdeals-section-wrapper .pro_name {
        text-align: left !important;
        width: 100% !important;
    }

    .hotdeals-section-wrapper .pro_name a {
        font-size: 14px !important;
        line-height: 1.3 !important;
        text-align: left !important;
        display: block !important;
        color: #0f172a !important;
        font-weight: 600 !important;
        text-decoration: none !important;
    }

    .hotdeals-section-wrapper .pro_price {
        text-align: left !important;
        width: 100% !important;
    }

    .hotdeals-section-wrapper .pro_price p {
        display: flex !important;
        justify-content: flex-start !important; /* Pin prices directly to the left */
        align-items: center !important;
        gap: 6px !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    .new-price-tag { font-size: 15px !important; font-weight: 700; color: #f28729 !important; }
    .old-price-tag { font-size: 12px !important; color: #94a3b8 !important; text-decoration: line-through !important; }

    /* Custom color backplate implementation for save text label */
    .premium-save-tag {
        display: inline-block !important;
        background-color: #bfdb38 !important; /* Custom theme color code */
        color: #1e293b !important;
        font-size: 10px !important;
        font-weight: 700 !important;
        padding: 2px 8px !important;
        border-radius: 4px !important;
        margin-top: 2px !important;
        text-transform: uppercase !important;
    }

    /* Bottom Action Button alignment settings */
    .hd-custom-btn-wrapper {
        display: flex !important;
        width: 100% !important;
        margin-top: 8px !important; /* Tight spacing between info text elements and button */
    }

    /* MOBILE REQUIREMENT: Hides the Buy Now code container entirely on phone screens */
    .hd-buy-btn, 
    form[action*="order_now"] {
        display: none !important;
        visibility: hidden !important;
        opacity: 0 !important;
        width: 0 !important;
        height: 0 !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    /* Force remaining Add to Cart element form wrapper to expand fully wide */
    .hd-isolated-form {
        display: block !important;
        width: 100% !important;
        flex: 0 0 100% !important;
    }

    .hd-cart-btn, .hd-single-btn {
        display: flex !important;
        width: 100% !important;
        height: 34px !important; /* Clear, tap-friendly height setting */
        font-size: 12px !important;
        font-weight: 700 !important;
        background-color: #ffffff !important;
        color: #f28729 !important;
        border: 1.5px solid #f28729 !important;
        align-items: center !important;
        justify-content: center !important;
        border-radius: 4px !important;
        text-transform: uppercase !important;
    }
}

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

/* Target mobile screens up to tablet size */
@media (max-width: 767px) {
    .copyright-text {
        text-align: center !important;
        display: block !important;
        width: 100% !important;
    }
    
    /* Ensures the image and link inline elements don't force a left-align behavior */
    .copyright-text * {
        display: inline-block;
        vertical-align: middle;
    }
    
    /* Optional: If the image has a harsh left float or margin, reset it for mobile */
    .copyright-text img {
        float: none !important;
        margin: 0 5px !important; 
    }
}

.footer-menu ul li a
 {
    color: #666666;
    margin: 8px 0 !important;
    display: block;
}

/* Card Container */
.checkout-card-custom {
    background: #ffffff;
    border-radius: 20px; /* Gives that smooth curved card edge */
    padding: 20px;
    border: 1px solid #e5e7eb;
    margin-bottom: 15px;
}

/* Header Text with Orange Accent Line */
.checkout-header-custom h6 {
    font-size: 18px;
    font-weight: 700;
    color: #0c2a4a;
    margin-bottom: 20px;
    display: flex;
    align-items: center;
}

.checkout-header-custom h6::before {
    content: "";
    display: inline-block;
    width: 4px;
    height: 20px;
    background-color: #f27a1a; /* Exact Orange color */
    margin-right: 10px;
    border-radius: 4px;
}

/* Form Inputs - Exactly matching the screenshot */
/* 1. Base State (When not typing) */
.form-control-custom {
    width: 100%;
    padding: 14px 16px;
    font-size: 15px;
    border: 0.5px solid #b0b8c1;
    border-radius: 12px;
    color: #4b5563;
    background-color: #fff;
    transition: border-color 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    outline: none !important;
    box-sizing: border-box;
}

/* 2. Active Typing State (Fixes the vanishing border) */
.form-control-custom:focus,
input.form-control-custom:focus,
textarea.form-control-custom:focus,
select.form-control-custom:focus {
    border: 1.5px solid #ff7300 !important; /* Forces the orange border to stay visible */
    box-shadow: 0 0 0 4px rgba(255, 115, 0, 0.15) !important; /* Adds a clean matching orange glow */
    outline: none !important; /* Firmly blocks Bootstrap or Chrome from hiding the border */
    background-color: #fff !important;
}

.form-control-custom::placeholder {
    color: #9ca3af;
}

.form-control-custom:focus {
    border-color: #000; /* Focus changes to theme orange */
}

/* Phone Input Group Container */
.phone-input-group {
    display: flex;
    align-items: center;
    border: 1.5px solid #b0b8c1;
    border-radius: 12px;
    background-color: #fff;
    overflow: hidden;
    width: 100%;
    box-sizing: border-box;
}

.phone-input-group:focus-within {
    border-color: #f27a1a;
}

/* "88" Prefix Box - Exactly matching image appearance */
.phone-prefix {
    background-color: #f3f4f6;
    color: #1f2937;
    font-weight: 600;
    font-size: 16px;
    padding: 14px 20px;
    border-right: 1.5px solid #b0b8c1;
    user-select: none;
    white-space: nowrap;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* Inner input field reset for phone prefix combo */
.phone-input {
    border: none !important;
    border-radius: 0 !important;
    box-shadow: none !important;
    padding-left: 14px;
    flex-grow: 1;
    height: 100%;
}

.checkout-section {
    background-color: var(--bg-color);
    padding: 05px 0;
    font-family: 'Poppins', sans-serif;
}
@media (max-width: 767px) { 
    .checkout-section
    .background-color: var(--bg-color);
    .padding: 0px 0;
    .font-family: 'Roboto', sans-serif;

}


/* ==========================================================================
   Payment Method Section - Two Column Grid Layout for Mobile Viewport
   ========================================================================== */
@media (max-width: 767px) {
    
    /* 1. Target the card container body holding your payment choices */
    .checkout-card .card-body,
    .checkout-card-custom .card-body-custom,
    .payment-grid-layout,
    .payment-options-list {
        display: grid !important;
        grid-template-columns: repeat(2, 1fr) !important; /* Spits buttons into 2 equal columns */
        gap: 10px !important; /* Balanced gap between the grid blocks */
        padding: 5px 0 !important;
    }

    /* 2. Style the individual layout wrappers to stay robust within the grid */
    .payment-option-label,
    .payment-option-modern {
        display: block !important;
        width: 100% !important;
        margin-bottom: 0 !important; /* Clear any legacy bottom margin */
    }

    /* 3. Re-structure the contents inside the clickable card items */
    .payment-content,
    .payment-option-card-body {
        display: flex !important;
        flex-direction: row !important; /* Keeps icon and text side-by-side */
        align-items: center !important;
        justify-content: flex-start !important;
        padding: 10px 8px !important; /* Compact internal cell margins */
        height: 100% !important; /* Uniform matching heights */
        border: 1px solid #cbd5e1 !important;
        border-radius: 10px !important;
        background-color: #ffffff !important;
        box-sizing: border-box !important;
    }

    /* 4. Tweak logo image/icon properties inside the columns */
    .payment-icon-wrapper,
    .pay-logo,
    .pay-logo-img {
        width: 24px !important;
        height: 24px !important;
        max-height: 24px !important;
        object-fit: contain !important;
        flex-shrink: 0 !important;
        margin: 0 6px 0 0 !important; /* Clean right-margin spacing to separate text */
        display: inline-flex !important;
        justify-content: center !important;
        align-items: center !important;
    }

    /* 5. Clean up text styling within the grid cells */
    .pay-title-stack,
    .pay-info {
        margin-left: 0 !important;
        text-align: left !important;
        line-height: 1.2 !important;
        overflow: hidden !important;
    }

    .pay-title-stack strong,
    .pay-info strong {
        font-size: 12px !important; /* Compact readability sizing for typography layout */
        font-weight: 600 !important;
        color: #1e293b !important;
        display: block !important;
        white-space: nowrap !important; /* Prevents long labels from wrapping awkwardly */
    }

    /* Hide the small description texts on mobile so options stay neatly arranged */
    .pay-title-stack small,
    .pay-info small {
        display: none !important; 
    }

    /* 6. Positioning the Checkmark/Circle Graphic */
    .selection-indicator,
    .check-circle {
        position: absolute !important;
        right: 6px !important;
        top: 50% !important;
        transform: translateY(-50%) !important;
        width: 14px !important;
        height: 14px !important;
    }

    /* 7. Selected State Border & Soft Background Highlight Color matching your theme */
    .payment-option-label input[type="radio"]:checked + .payment-content,
    .payment-option-modern input[type="radio"]:checked + .payment-option-card-body {
        border-color: #f27a1a !important; /* Your signature brand color orange */
        background-color: #edf2f7 !important; /* Soft premium active highlight backdrop color */
    }
}

.payment-content, .payment-option-card-body
 {
        
        padding: 10px 8px !important;
    
        border: 0px solid #cbd5e1 !important;
       
    }
}

/* Modern Header Style with Orange Vertical Bar Indicator Accent */
.checkout-header-custom-modern {
    margin-bottom: 10px;
    padding-top: 10px;
}

.checkout-header-custom-modern h6 {
    font-size: 18px;
    font-weight: 600;
    color: #0c2a4a; /* Dark brand blue text */
    margin: 0;
    display: flex;
    align-items: center;
}

/* The Orange Bar Accent Generator */
.checkout-header-custom-modern h6::before {
    content: "";
    display: inline-block;
    width: 4px;         /* Thickness of the orange line */
    height: 20px;       /* Height matching the typography text bounds */
    background-color: #f27a1a; /* Your signature orange brand color */
    margin-right: 10px; /* Space between the bar and the text */
    border-radius: 4px; /* Smooth rounded corners for the accent bar */
    
    
}

/* Mobile Responsive adjustment tweak */
@media (max-width: 767px) {
    .checkout-header-custom-modern h6 {
        font-size: 16px; /* Slightly more compact text bounds on phones */
    }
    .checkout-header-custom-modern h6::before {
        height: 18px;
    }
}

.checkout-header-custom-modern {
    margin-bottom: 10px;
    padding-top: 10px;
}

/* ==========================================================================
   Mobile Checkout Fields Spacing Fix (Max-width: 767px)
   ========================================================================== */
@media (max-width: 767px) {
    
    /* 1. Reset standard container paddings */
    .checkout-card, 
    .checkout-card-custom,
    .card-body,
    .card-body-custom {
        padding: 12px 14px !important;
    }

    /* 2. Tighten vertical gap between input fields */
    .form-group,
    .form-group-custom,
    .phone-input-group,
    .mb-3,
    .mb-4 {
        margin-top: 0 !important;
        margin-bottom: 10px !important; /* Forces a crisp 10px spacing between elements */
    }

    /* 3. Drop down layout specific overrides (District / Thana selectors) */
    .row.g-3, 
    .row.g-4 {
        --bs-gutter-y: 10px !important; /* For Bootstrap 5 layouts */
        row-gap: 10px !important;       /* Standard flex/grid layouts fallback */
    }

    /* 4. Ensure inputs maintain correct dynamic heights */
    .form-control,
    .form-control-custom,
    .phone-input-group {
        height: 46px !important; /* Unified standardized mobile interactive touch target */
        box-sizing: border-box !important;
    }

    /* 5. Clean up textarea note box spacing */
    textarea.form-control-custom,
    textarea.form-control {
        height: auto !important;
        margin-top: 0 !important;
        margin-bottom: 5px !important;
    }
}

.checkout-card, .checkout-card-custom, .card-body, .card-body-custom {
        padding: 1px 6px !important;
    }
}

.checkout-card
 {
    margin-bottom: 3px;
    
}

.checkout-item
 {
    display: flex;
    gap: 15px;
    padding: 2px 0;
    border-bottom: 1px dashed var(--border-color);
    position: relative;
    align-items: center;
}

/* Hide default browser summary marker arrow */
.coupon-accordion-wrapper summary::-webkit-details-marker {
    display: none !important;
}
.coupon-accordion-wrapper summary {
    display: flex !important;
    justify-content: space-between;
    align-items: center;
}

/* Base Arrow styling */
.coupon-arrow-css {
    transition: transform 0.2s ease-in-out;
}

/* When the HTML details block is open, rotate the arrow instantly */
details[open] .coupon-arrow-css {
    transform: rotate(180deg);
}

/* Core form button elements style */
.coupon-input-group-custom-modern {
    display: flex;
    align-items: center;
    border: 1px solid #cbd5e1;
    border-radius: 10px;
    overflow: hidden;
    background-color: #ffffff;
    padding: 4px;
    width: 100%;
    box-sizing: border-box;
}
.coupon-field-input-modern {
    border: none !important;
    outline: none !important;
    padding: 10px 14px;
    font-size: 14px;
    flex-grow: 1;
}
.coupon-apply-btn-modern {
    border: none;
    background-color: #f27a1a;
    color: #ffffff;
    font-weight: 500;
    font-size: 14px;
    padding: 10px 24px;
    border-radius: 8px;
    cursor: pointer;
    white-space: nowrap;
}

/* ==========================================================================
   Order Summary Calculation Card Style (Matches Mockup)
   ========================================================================== */
.summary-totals-modern-box {
    background-color: #ffffff;
    border-radius: 12px;
    font-family: system-ui, -apple-system, sans-serif;
}

/* Base horizontal layout row setup */
.total-row-modern {
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
    padding: 6px 0 !important;
}

/* Left side text labels properties */
.total-row-modern .label {
    font-size: 15px;
    color: #475569; /* Slate grey color for primary labels */
    font-weight: 400;
}

/* Right side data values properties */
.total-row-modern .value {
    font-size: 15px;
    color: #1e293b; /* Strong slate dark tone */
    font-weight: 500;
    text-align: right;
}

/* Green Highlight Row styling rules explicitly for Coupon values */
.total-row-modern.discount-highlight .label,
.total-row-modern.discount-highlight .value {
    color: #16a34a !important;
}

/* The Grand Total Row Block at the bottom */
.total-row-modern.final-bold-row {
    border-top: 1px solid #f1f5f9; /* Subtle divider accent line layout */
}

.total-row-modern.final-bold-row .label,
.total-row-modern.final-bold-row .value {
    font-size: 16px !important;
    font-weight: 700 !important; /* Bold font weight to make total stand out */
    color: #0f172a !important;
}

/* ==========================================================================
   Mobile Display Fine-Tuning Viewports
   ========================================================================== */
@media (max-width: 767px) {
    .summary-totals-modern-box {
        padding: 12px 8px !important; /* Maximizes layout viewable area constraints on phone screens */
    }
    
    .total-row-modern .label,
    .total-row-modern .value {
        font-size: 14px; /* Crisp and slightly more compact readability for mobile devices */
    }

    .total-row-modern.final-bold-row .label,
    .total-row-modern.final-bold-row .value {
        font-size: 15px !important;
    }
}

/* ==========================================================================
   Special Notes Modern Components Layout Card
   ========================================================================== */
.style-box-card {
    background: #ffffff;
    border: 0px solid #cbd5e1;
    border-radius: 12px;
}

/* Header style containing custom brand vertical marker line */
.checkout-header-custom-modern h6 {
    font-size: 16px;
    font-weight: 600;
    color: #1e293b;
    margin: 0;
    display: flex;
    align-items: center;
}

.checkout-header-custom-modern h6::before {
    content: "";
    display: inline-block;
    width: 3px;
    height: 16px;
    background-color: #f27a1a; /* Orange theme color accent */
    margin-right: 8px;
    border-radius: 2px;
}

/* Custom Text Area Fields Focus Properties */
.form-control-custom-note {
    width: 100% !important;
    border: 1px solid #cbd5e1 !important;
    border-radius: 10px !important;
    padding: 12px 14px !important;
    font-size: 14px !important;
    color: #334155 !important;
    background-color: #ffffff !important;
    resize: none !important;
    outline: none !important;
    box-shadow: none !important;
    box-sizing: border-box !important;
    transition: border-color 0.2s ease-in-out;
}

.form-control-custom-note:focus {
    border-color: #f27a1a !important; /* Highlights to theme orange on focus */
}

.form-control-custom-note::placeholder {
    color: #94a3b8;
    font-weight: 400;
}

/* Muted character string counter text row */
.char-counter-text {
    font-size: 12px;
    color: #64748b;
    font-weight: 400;
    padding-left: 2px;
}
    </style>
    
    <style>
    .order_now_btn:hover, .order_now_btn:active {
    
    background-color: #000 !important;
    border-color: #000 !important;
    box-shadow: 0 4px 8px rgba(220, 53, 69, 0.4);
   
}

/* Change Slider Section Background Color */
.slider-section {
    background-color: #FBF9F5 !important; /* Soft premium off-white/gray */
}

.main-logo
 {
    height: 55px;
    text-align: left;
    padding-top: 10px !important; /* Adds 10px spacing ONLY to the top on desktop screens */
    padding-bottom: 0 !important;
    padding-left: 0 !important;
    padding-right: 0 !important;
    
}
       /* ==========================================================================
   Payment Method Section - TWO COLUMN GRID FOR DESKTOP ONLY (768px and up)
   ========================================================================== */
@media (min-width: 768px) {
    
    /* 1. Target the card container body holding your payment choices */
    .checkout-card .card-body,
    .checkout-card-custom .card-body-custom,
    .payment-grid-layout,
    .payment-options-list {
        display: grid !important;
        grid-template-columns: repeat(2, 1fr) !important; /* Forces exactly 2 equal columns on desktop */
        gap: 14px !important; /* Roomy gap separating the two blocks */
        padding: 10px 0 !important;
    }

    /* 2. Style the individual layout wrappers to stay robust within the grid */
    .payment-option-label,
    .payment-option-modern {
        display: block !important;
        width: 100% !important;
        margin-bottom: 0 !important;
        position: relative !important; /* Anchor point for selected checkmark overlays */
    }

    /* 3. Re-structure the contents inside the clickable card items */
    .payment-content,
    .payment-option-card-body {
        display: flex !important;
        flex-direction: row !important; /* Places item logo and titles side-by-side */
        align-items: center !important;
        justify-content: flex-start !important;
        padding: 14px 16px !important; /* Premium wide padding for desktop resolutions */
        height: 100% !important;
        border: 0px solid #cbd5e1 !important;
        border-radius: 12px !important; /* Smooth clean corners matching the mockups */
        background-color: #ffffff !important;
        box-sizing: border-box !important;
        cursor: pointer !important;
        transition: all 0.2s ease-in-out !important;
    }

    /* Desktop Hover Indication Interaction */
    .payment-content:hover,
    .payment-option-card-body:hover {
        border-color: #b4c6ef !important;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.04) !important;
    }

    /* 4. Tweak logo image/icon properties inside the columns */
    .payment-icon-wrapper,
    .pay-logo,
    .pay-logo-img {
        width: 32px !important; /* Distinctly scaled up for clear view on computer screens */
        height: 32px !important;
        max-height: 32px !important;
        object-fit: contain !important;
        flex-shrink: 0 !important;
        margin: 0 12px 0 0 !important; /* Perfect spacing gap separating brand logo from textual label */
        display: inline-flex !important;
        justify-content: center !important;
        align-items: center !important;
    }

    /* 5. Clean up text styling within the grid cells */
    .pay-title-stack,
    .pay-info {
        margin-left: 0 !important;
        text-align: left !important;
        line-height: 1.3 !important;
        overflow: hidden !important;
        padding-right: 24px !important; /* Buffer zone preventing title text from overlapping checkmark */
    }

    .pay-title-stack strong,
    .pay-info strong {
        font-size: 14px !important; /* Clean font size for enhanced readable hierarchy */
        font-weight: 500 !important;
        color: #1e293b !important;
        display: block !important;
        white-space: nowrap !important;
    }

    /* Keep secondary helper texts cleanly formatted under desktop viewport rules */
    .pay-title-stack small,
    .pay-info small {
        font-size: 12px !important;
        color: #64748b !important;
        display: block !important;
        margin-top: 2px !important;
    }

    /* 6. Positioning the Checkmark/Circle Graphic */
    .selection-indicator,
    .check-circle {
        position: absolute !important;
        right: 14px !important;
        top: 50% !important;
        transform: translateY(-50%) !important;
        width: 18px !important;
        height: 18px !important;
    }

    /* 7. Selected State Border & Soft Background Highlight Color matching your theme */
    .payment-option-label input[type="radio"]:checked + .payment-content,
    .payment-option-modern input[type="radio"]:checked + .payment-option-card-body {
        border-color: #f27a1a !important; /* Orange accent theme border */
        background-color: #f8fafc !important; /* Crisp, premium off-white active background state */
    }
} 
        
    </style>
        <?php echo $generalsetting->header_code; ?>

    </head>
    <body class="gotop">
       
        <?php $subtotal = Cart::instance('shopping')->subtotal(); ?>
        <div class="mobile-menu">
                <div class="mobile-menu-logo">
                    <div class="logo-image">
                        <img src="<?php echo e(asset($generalsetting->dark_logo)); ?>" alt="" />
                        
                    </div>
                    <div class="mobile-lang-switcher">
            <i class="fa-solid fa-globe"></i>
            <select id="mobileLangSelect" onchange="changeLanguage(this.value)">
                <option value="en">English</option>
                <option value="bn">বা</option>
            </select>
        </div>
        
<style>
    /* মোাইল ্া্ ইচ িজই */
.mobile-menu-logo {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
}

.mobile-lang-switcher {
    display: flex;
    align-items: center;
    background: #f5f5f5;
    padding: 5px 8px;
    border-radius: 4px;
    border: 1px solid #ddd;
}

.mobile-lang-switcher i {
    color: #555;
    margin-right: 5px;
    font-size: 14px;
}

.mobile-lang-switcher select {
    border: none;
    background: transparent;
    font-size: 13px;
    font-weight: 600;
    color: #333;
    outline: none;
    cursor: pointer;
}

/* আকন পটশ রল (আোই ল থবে) */
body.lang-bn i, 
body.lang-bn [class^="fa-"], 
body.lang-bn [class*=" fa-"],
body.lang-bn .fa,
body.lang-bn .fa-regular,
body.lang-bn .fa-solid {
    font-family: "Font Awesome 6 Free", "Font Awesome 5 Free", "FontAwesome" !important;
}
</style>

<script>
    // জ োড ওর র কপ  মবইল উ রডউন ক া
document.addEventListener("DOMContentLoaded", function() {
    var savedLang = localStorage.getItem('siteLang') || 'en';
    
    var langSelect = document.getElementById('langSelect');
    var mobileLangSelect = document.getElementById('mobileLangSelect');
    
    // েসক ্রউন চে
    if (langSelect) {
        langSelect.value = savedLang;
    }
    
    // মোবই পডন চেক
    if (mobileLangSelect) {
        mobileLangSelect.value = savedLang;
    }

    if (savedLang === 'bn') {
        document.body.classList.add('lang-bn');
    } else {
        document.body.classList.remove('lang-bn');
    }
});
</script>
                    <div class="mobile-menu-close">
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <ul class="first-nav">
                    <?php $__currentLoopData = $menucategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="parent-category">
                        <a href="<?php echo e(url('category/'.$scategory->slug)); ?>" class="menu-category-name">
                            <img src="<?php echo e(asset($scategory->image)); ?>" alt="" class="side_cat_img" />
                            <?php echo e($scategory->name); ?>

                        </a>
                        <?php if($scategory->subcategories->count() > 0): ?>
                        <span class="menu-category-toggle">
                            <i class="fa fa-chevron-down"></i>
                        </span>
                        <?php endif; ?>
                        <ul class="second-nav" style="display: none;">
                            <?php $__currentLoopData = $scategory->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="parent-subcategory">
                                <a href="<?php echo e(url('subcategory/'.$subcategory->slug)); ?>" class="menu-subcategory-name"><?php echo e($subcategory->subcategoryName); ?></a>
                                <?php if($subcategory->childcategories->count() > 0): ?>
                                <span class="menu-subcategory-toggle"><i class="fa fa-chevron-down"></i></span>
                                <?php endif; ?>
                                <ul class="third-nav" style="display: none;">
                                    <?php $__currentLoopData = $subcategory->childcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="childcategory"><a href="<?php echo e(url('products/'.$childcat->slug)); ?>" class="menu-childcategory-name"><?php echo e($childcat->childcategoryName); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <header id="navbar_top">
            
                        
                        <!-- Marquee headline - CSS animation (marquee deprecated) -->
                        <div class="d-flex align-items-center flex-grow-1 overflow-hidden">
                            <div class="headline-scroll-wrapper">
                                <span class="headline-scroll-text text-light fs-6"><?php echo e($generalsetting->top_headline); ?></span>
                                <span class="headline-scroll-text headline-scroll-duplicate text-light fs-6" aria-hidden="true"><?php echo e($generalsetting->top_headline); ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="mobile-header sticky">
                <div class="mobile-logo">
                    <div class="menu-bar">
                        <a class="toggle">
                            <i class="fi fi-rr-bars-staggered"></i>
                        </a>
                    </div>
                    <div class="menu-logo">
                        <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset($generalsetting->dark_logo)); ?>" alt="" /></a>
                    </div>
    <div class="menu-bag">
    <a href="<?php echo e(route('customer.checkout')); ?>" class="margin-shopping">
        <i class="fi-rr-shopping-cart" style="font-size: 24px; vertical-align: middle;" ></i>
        <span class="mobilecart-qty"><?php echo e(Cart::instance('shopping')->count()); ?></span>
    </a>
</div>

                </div>
            </div>

            <div class="mobile-search">
                <form action="<?php echo e(route('search')); ?>">
                    <input type="text" placeholder="Search in... " value="" class="msearch_keyword msearch_click" name="keyword" />
                    <button><i data-feather="search"></i></button>
                </form>
                <div class="search_result"></div>
            </div>

            

            <div class="main-header">
                
            

                <div class="logo-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="logo-header">
                                    <div class="main-logo">
                                        <a href="<?php echo e(route('home')); ?>"><img src="<?php echo e(asset($generalsetting->dark_logo)); ?>" alt="" /></a>
                                    </div>
                                    <div class="main-search">
                                        <form action="<?php echo e(route('search')); ?>">
                                            <input type="text" placeholder="Search..." class="search_keyword search_click" name="keyword" />
                                            <button>
                                                <i data-feather="search"></i>
                                            </button>
                                        </form>
                                        <div class="search_result"></div>
                                    </div>
                                    <div class="header-list-items">
                                        <ul>
                                            <li class="track_btn">
                                                <a href="<?php echo e(route('customer.order_track')); ?>"> 
                                                <i class="fi fi-rs-map-marker" style="font-size: 50px;;"></i>
                                                <br>Track Order</a>
                                            </li>
                                            <?php if(Auth::guard('customer')->user()): ?>
                                            <li class="for_order">
                                                <p>
                                                    <a href="<?php echo e(route('customer.account')); ?>">
                                                        <i class="fa-regular fa-user"></i>

                                                        <?php echo e(Str::limit(Auth::guard('customer')->user()->name,14)); ?>

                                                    </a>
                                                </p>
                                            </li>
                                            <?php else: ?>
                                            <li class="for_order">
                                                <p>
                                                    <a href="<?php echo e(route('customer.login')); ?>"> 
                                                        <i class="fa-regular fa-user"></i><br>
                                                        Sign In
                                                    </a>
                                                </p>
                                            </li>
                                            <?php endif; ?>
                                            <li class="lang_switcher">
    <p>
        <i class="fa-solid fa-globe"></i><br>
        <select id="langSelect" onchange="changeLanguage(this.value)">
            <option value="en">English</option>
            <option value="bn">বলা</option>
        </select>
    </p>
</li>

<div id="google_translate_element" style="display:none;"></div>

<style>
    /* পফশনল ্রপডন াল */
.lang_switcher select {
    background: transparent;
    border: none;
    color: inherit;
    font-family: inherit;
    font-size: 14px;
    cursor: pointer;
    outline: none;
}
.lang_switcher select option {
    background: #fff;
    color: #333;
}

/* ১. আগর ি পরি্ ক ট া */
body.lang-bn, body.lang-bn p, body.lang-bn a, body.lang-bn span, body.lang-bn div, body.lang-bn li, body.lang-bn h1, body.lang-bn h2, body.lang-bn h3, body.lang-bn h4, body.lang-bn h5, body.lang-bn h6 {
    font-family: 'SolaimanLipi', 'Kalpurush', sans-serif !important;
}

/* . ট সাম া ন্য নো আন সকে াা ্ েে ুকত খন */
body.lang-bn i, 
body.lang-bn [class^="fa-"], 
body.lang-bn [class*=" fa-"],
body.lang-bn .fa,
body.lang-bn .fa-regular,
body.lang-bn .fa-solid {
    font-family: "Font Awesome 6 Free", "Font Awesome 5 Free", "FontAwesome" !important;
}
/* গল সেটর প্জ া ও পআ া র জ */
.goog-te-banner-frame, .goog-te-balloon-frame, .goog-text-highlight {
    display: none !important;
}
body {
    top: 0 !important;
}
.skiptranslate {
    display: none !important;
}

</style>

<script>
// . লাগুয়জ বরত এব কল যক্ ক িক
function changeLanguage(lang) {
    if (lang === 'bn') {
        try { localStorage.setItem('siteLang', 'bn'); } catch (e) {}
        
        // দ র ে কক স  (সচে িপ ি)
        document.cookie = "googtrans=/en/bn; path=/;";
        document.cookie = "googtrans=/en/bn; domain=" + window.location.hostname + "; path=/;";
        
        // দি ইে গ www থাকে া ন াআ ক
        document.cookie = "googtrans=/en/bn; domain=." + window.location.hostname + "; path=/;";
        
        document.body.classList.add('lang-bn');
    } else {
        try { localStorage.setItem('siteLang', 'en'); } catch (e) {}
        
        // কি ম্ূণ িলি া
        document.cookie = "googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; domain=" + window.location.hostname + "; path=/;";
        document.cookie = "googtrans=; expires=Thu, 01 Jan 1970 00:00:00 UTC; domain=." + window.location.hostname + "; path=/;";
        
        document.body.classList.remove('lang-bn');
    }
    
    // েজ  ার আগ সাম্য ২০ মল-সন্ ময়  া কক ঠত র তে পারে
    setTimeout(function() {
        location.reload();
    }, 20);
}

// . গ টরনসট শিলাই
function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'en',
        includedLanguages: 'bn,en', // ইং  বাংলা টি ু খু
        autoDisplay: false
    }, 'google_translate_element');
}

// . প ল হওর  ড্পডউ  ফন্ট েট 
document.addEventListener("DOMContentLoaded", function() {
    var savedLang = localStorage.getItem('siteLang') || 'en';
    var langSelect = document.getElementById('langSelect');
    
    if (langSelect) {
        langSelect.value = savedLang;
    }

    if (savedLang === 'bn') {
        document.body.classList.add('lang-bn');
    } else {
        document.body.classList.remove('lang-bn');
    }
});
</script>
<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
                                            
                                           
                                            
                                            <li class="cart-dialog" id="cart-qty">
                                                <a href="<?php echo e(route('customer.checkout')); ?>">
                                                    <p class="margin-shopping">
                                                       <i class="fi-rr-shopping-cart"></i> <br>Cart
                                                        <span><?php echo e(Cart::instance('shopping')->count()); ?></span>
                                                    </p>
                                                </a>
                                                <div class="cshort-summary">
                                                    <ul>
                                                        <?php $__currentLoopData = Cart::instance('shopping')->content(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li>
                                                            <a href=""><img src="<?php echo e(asset($value->options->image)); ?>" alt="" /></a>
                                                        </li>
                                                        <li><a href=""><?php echo e(Str::limit($value->name, 30)); ?></a></li>
                                                        <li>Qty: <?php echo e($value->qty); ?></li>
                                                        <li>
                                                            <p><?php echo e($value->price); ?></p>
                                                            <button class="remove-cart cart_remove" data-id="<?php echo e($value->rowId); ?>"><i data-feather="x"></i></button>
                                                        </li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </ul>
                                                    <p><strong>সরমট : <?php echo e($subtotal); ?></strong></p>
                                                    <a href="<?php echo e(route('customer.checkout')); ?>" class="go_cart"> ্ড র </a>
                                                </div>
                                            </li>
                                             <li class="more-dropdown-container">
                                    <a href="javascript:void(0);" class="more-trigger">
                                        <i class="fi fi-rr-bars-sort"></i> <br>
                                      More
                                    </a>

                                </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<div class="menu-area">
    <div class="container-fluid custom-nav-container">
        
        <div class="nav-slider-outer-wrapper">
            <button class="nav-slide-btn left" id="slideLeftBtn" onclick="scrollMenu('left')">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            
            <div class="catagory_menu_wrapper" id="navSliderWrapper">
                <nav class="catagory_menu">
                    <ul>
                        <?php $__currentLoopData = $menucategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $scategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="cat_bar">
                            <a href="<?php echo e(url('category/' . $scategory->slug)); ?>" class="cat_link"> 
                                <span class="cat_head"><?php echo e($scategory->name); ?></span>
                                <?php if($scategory->subcategories->count() > 0): ?>
                                <i class="fa-solid fa-angle-down cat_down"></i>
                                <?php endif; ?>
                            </a>
                            
                            <?php if($scategory->subcategories->count() > 0): ?>
                            <ul class="Cat_menu">
                                <?php $__currentLoopData = $scategory->subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="Cat_list">
                                    <a href="<?php echo e(url('subcategory/' . $subcat->slug)); ?>">
                                        <span><?php echo e(Str::limit($subcat->subcategoryName, 25)); ?></span>
                                        <?php if($subcat->childcategories->count() > 0): ?>
                                        <i class="fa-solid fa-chevron-right child_arrow"></i>
                                        <?php endif; ?>
                                    </a>
                                    
                                    <?php if($subcat->childcategories->count() > 0): ?>
                                    <ul class="child_menu">
                                        <?php $__currentLoopData = $subcat->childcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childcat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="child_main">
                                            <a href="<?php echo e(url('products/'.$childcat->slug)); ?>"><?php echo e($childcat->childcategoryName); ?></a>
                                        </li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                    <?php endif; ?>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <?php endif; ?>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </nav>
            </div>

            <button class="nav-slide-btn right" id="slideRightBtn" onclick="scrollMenu('right')">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>

    </div>
</div>

<style>
/* ==========================================================================
   1. OUTER SLIDER STRUCTURAL FRAMEWORK
   ========================================================================== */
.menu-area {
    background: #041F1E;
    position: relative;
    z-index: 99999; 
    border-bottom: 1px solid rgba(255, 255, 255, 0.1);
}

.custom-nav-container {
    padding-left: 15px;
    padding-right: 15px;
    max-width: 1400px; 
    margin: 0 auto;
}

.nav-slider-outer-wrapper {
    position: relative;
    width: 100%;
    display: flex;
    align-items: center;
}

/* ==========================================================================
   2. HORIZONTAL TRACK CONTROLLER (THE MAGIC FIX)
   ========================================================================== */
.catagory_menu_wrapper {
    width: 100%;
    overflow-x: auto;
    overflow-y: hidden;
    scroll-behavior: smooth;
    scrollbar-width: none; /* Firefox */
    -ms-overflow-style: none; /* IE/Edge */

    /* PADDING HACK: Create vertical space for dropdowns to exist without being clipped */
    padding-bottom: 500px; 
    margin-bottom: -500px; /* Pull the content beneath back up */
    pointer-events: none;  /* Allows clicks to pass through the invisible padded area to the banner below */
}

.catagory_menu_wrapper::-webkit-scrollbar {
    display: none; /* Chrome, Safari */
}

.catagory_menu {
    width: max-content;
    min-width: 100%;
    pointer-events: auto; /* Re-enables clicking on the actual navigation items */
}

.catagory_menu > ul {
    display: flex;
    flex-wrap: nowrap;
    align-items: center;
    padding: 0;
    margin: 0;
    list-style: none;
}

/* ==========================================================================
   3. SLIDER BUTTON CONTROLS
   ========================================================================== */
.nav-slide-btn {
    position: absolute;
    top: 24px; /* Centers to the text, ignoring the padding trick */
    transform: translateY(-50%);
    background: #f1b434; 
    color: #041F1E;
    border: none;
    width: 28px;
    height: 28px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    z-index: 100002;
    box-shadow: 0 2px 8px rgba(0,0,0,0.3);
    transition: background 0.2s, opacity 0.2s;
}

.nav-slide-btn:hover { background: #ffffff; }
.nav-slide-btn.left { left: -10px; }
.nav-slide-btn.right { right: -10px; }

/* ==========================================================================
   4. FIXED TOP-LEVEL NAVIGATION LINKS
   ========================================================================== */
li.cat_bar {
    flex: 0 0 auto;
    position: relative; 
}

li.cat_bar > a.cat_link {
    padding: 0 14px; 
    display: grid;
    grid-template-columns: auto max-content;
    align-items: center;
    gap: 6px;
    height: 48px;
    font-size: 14px;
    color: #ffffff;
    background-color: #041F1E;
    text-decoration: none;
    font-weight: 500;
    font-family: 'Open Sans', sans-serif;
}

li.cat_bar:hover > a.cat_link { background-color: #06312f; }

/* ==========================================================================
   5. DROPDOWN OVERLAYS 
   ========================================================================== */
.Cat_menu {
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background: #ffffff;
    min-width: 240px;
    z-index: 100000 !important;
    margin: 0;
    padding: 4px 0 !important;
    list-style: none;
    border: 1px solid rgba(0, 0, 0, 0.1) !important;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15) !important;
}

li.cat_bar:hover .Cat_menu { display: block !important; }

li.Cat_list { position: relative; }

li.Cat_list a {
    display: flex !important;
    justify-content: space-between !important;
    align-items: center !important;
    padding: 7px 16px !important; 
    color: #222222 !important;
    text-decoration: none !important;
    font-size: 14px !important;
    font-weight: 500 !important;
    white-space: nowrap !important;
}

li.Cat_list a:hover {
    background-color: #041F1E !important;
    color: #ffffff !important;
}

/* ==========================================================================
   6. CHILD CATEGORIES (Flyout Layout)
   ========================================================================== */
.child_menu {
    display: none;
    position: absolute;
    left: 100%;
    top: 0;
    background: #ffffff;
    min-width: 230px;
    z-index: 100005 !important;
    margin: 0;
    padding: 4px 0;
    list-style: none;
    border: 1px solid rgba(0, 0, 0, 0.1);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}

li.Cat_list:hover .child_menu { display: block !important; }

.child_menu li a {
    padding: 6px 16px !important;
    color: #333333 !important;
    font-size: 13.5px !important;
}

/* ==========================================================================
   7. COLLISION PREVENTION (Fixing right-side cutoffs)
   ========================================================================== */
/* Makes the last 3 elements open to the LEFT so they aren't hidden by the scroll wrapper */
li.cat_bar:nth-last-child(-n+3) .Cat_menu {
    left: auto;
    right: 0;
}
li.cat_bar:nth-last-child(-n+3) .child_menu {
    left: auto;
    right: 100%; /* Fly out to the left */
}
li.cat_bar:nth-last-child(-n+3) .child_arrow {
    transform: rotate(180deg); /* Flip the arrow visually */
}

/* ==========================================================================
   8. MOBILE RESPONSIVENESS
   ========================================================================== */
@media (max-width: 1199px) {
    li.cat_bar:hover .Cat_menu {
        display: none !important; /* Prevents unwanted hover triggers on touch */
    }
}
</style>

<script>
function scrollMenu(direction) {
    const container = document.getElementById('navSliderWrapper');
    if (!container) return;
    
    const scrollAmount = 250; // Distance to scroll per click
    
    if (direction === 'left') {
        container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
    } else {
        container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
    }
}

document.addEventListener("DOMContentLoaded", function() {
    const container = document.getElementById('navSliderWrapper');
    const leftBtn = document.getElementById('slideLeftBtn');
    const rightBtn = document.getElementById('slideRightBtn');
    
    if(!container || !leftBtn || !rightBtn) return;

    function toggleButtons() {
        // Show left button only if scrolled out
        leftBtn.style.opacity = container.scrollLeft > 5 ? "1" : "0";
        leftBtn.style.pointerEvents = container.scrollLeft > 5 ? "auto" : "none";
        
        // Show right button only if there is more content to scroll
        const maxScroll = container.scrollWidth - container.clientWidth;
        rightBtn.style.opacity = container.scrollLeft < maxScroll - 5 ? "1" : "0";
        rightBtn.style.pointerEvents = container.scrollLeft < maxScroll - 5 ? "auto" : "none";
    }

    container.addEventListener('scroll', toggleButtons);
    window.addEventListener('resize', toggleButtons);
    setTimeout(toggleButtons, 500); // Initial load calculation delay
});
</script>

              </style>
            <!-- main-header end -->
        </header>
        <div id="content">
            <?php echo $__env->yieldContent('content'); ?>
        </div>
            <!-- content end -->
<footer class="custom-site-footer" style="background: <?php echo e($generalsetting->footer_color ?? '#ffffff'); ?> !important;">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                
                <!-- Brand & About Section -->
                <div class="col-12 col-md-6 mb-4 mb-md-0">
                    <div class="footer-about-col">
                        <a href="<?php echo e(route('home')); ?>" class="footer-logo-link">
                            <img src="<?php echo e(asset($generalsetting->dark_logo)); ?>" alt="<?php echo e($generalsetting->name ?? 'Logo'); ?>" class="footer-brand-logo" />
                        </a>
                        
                        <p class="footer-about-text">
                            <?php echo e(optional($generalsetting)->footer_about_text ?? 'Ghorer Bazar is an e-commerce platform dedicated to providing safe and reliable food to every home.'); ?>

                        </p>
                        
                        <div class="footer-contact-info">
                            <div class="footer-contact-item">
                                <i class="fas fa-map-marker-alt"></i>
                                <span><?php echo e($contact->address ?? 'Rampura, Dhaka, Bangladesh'); ?></span>
                            </div>
                            <div class="footer-contact-item">
                                <i class="fas fa-phone-alt"></i>
                                <a href="tel:<?php echo e($contact->hotline ?? '09642922922'); ?>"><?php echo e($contact->hotline ?? '09642922922'); ?></a>
                            </div>
                            <div class="footer-contact-item">
                                <i class="far fa-envelope"></i>
                                <a href="mailto:<?php echo e($contact->email ?? 'contact@ghorerbazar.com'); ?>"><?php echo e($contact->email ?? 'contact@ghorerbazar.com'); ?></a>
                            </div>
                        </div>

                        <ul class="footer-social-links">
                            <?php $__currentLoopData = $socialicons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li>
                                    <a class="footer-social-icon" href="<?php echo e($value->link); ?>"><i class="<?php echo e($value->icon); ?>"></i></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if($socialicons->isEmpty()): ?>
                                <li><a class="footer-social-icon" href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a class="footer-social-icon" href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a class="footer-social-icon" href="#"><i class="fab fa-instagram"></i></a></li>
                            <?php endif; ?>
                        </ul>

                        <div class="download-app-section">
                            <p class="download-app-title">Download App on Mobile :</p>
                            <div class="footer-app-badges">
                                <a href="<?php echo e(optional($generalsetting)->google_play_link ?? '#'); ?>" target="_blank" rel="noopener">
                                    <img src="/public/uploads/play.svg" alt="Get it on Google Play">
                                </a>
                                <a href="<?php echo e(optional($generalsetting)->app_store_link ?? '#'); ?>" target="_blank" rel="noopener">
                                    <img src="/public/uploads/app.png" alt="Download on the App Store">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Information Column -->
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <div class="footer-menu">
                        <h5 class="footer-menu-title">Information</h5>
                        <ul class="footer-menu-links">
                            <li><a href="<?php echo e(route('sellers')); ?>">All Sellers</a></li>
                            <li><a href="<?php echo e(route('complaint')); ?>">Complaints</a></li>
                            <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(route('page', ['slug' => $page->slug])); ?>"><?php echo e($page->name); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>

                <!-- Shop By Column -->
                <div class="col-6 col-md-3 mb-4 mb-md-0">
                    <div class="footer-menu">
                        <h5 class="footer-menu-title">Shop By</h5>
                        <ul class="footer-menu-links">
                            <li><a href="<?php echo e(route('shop')); ?>">All Products</a></li>
                            <?php $__currentLoopData = $pagesright; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><a href="<?php echo e(route('page', ['slug' => $value->slug])); ?>"><?php echo e($value->name); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom-bar" style="background: <?php echo e($generalsetting->copyright_color ?? '#ffffff'); ?> !important;">
        <div class="container">
            <div class="row align-items-center reverse-mobile">
                <div class="col-md-5 text-center text-md-start">
                    <p class="copyright-text">
                        Copyright  <?php echo e(date('Y')); ?> <?php echo e($generalsetting->name); ?>.
                        <span class="divider-pipe">|</span>
                        <span>Developed by:</span>
                        <a href="https://www.uddoktaresheba.com.bd" target="_blank" rel="noopener" class="developer-credit-link">
                            <img src="/public/uploads/uddoktaresheba.png" alt="Uddoktar E-Sheba">Uddoktar E-Sheba
                        </a>
                    </p>
                </div>
                <div class="col-md-7">
                    <div class="payment-gateway-container">
                        <img src="/public/uploads/sslcommerz.png" alt="Payment Gateways" class="payment-gateway-img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<nav class="mobile_bottom_nav">
    <div class="nav_container">
        <a href="<?php echo e(route('shop')); ?>" class="nav_item">
            <div class="icon_box">
                <i class="fas fa-th-large"></i>
            </div>
            <span class="nav_text">MENU</span>
        </a>

        <a href="#" class="nav_item">
            <div class="icon_box">
                <i class="fas fa-search"></i>
            </div>
            <span class="nav_text">SEARCH</span>
        </a>

        <div class="home_wrapper">
            <a href="<?php echo e(route('home')); ?>" class="home_fab" style="background: <?php echo e($generalsetting->primary_color ?? '#FF6600'); ?>; box-shadow: 0 8px 15px <?php echo e($generalsetting->primary_color ?? '#FF6600'); ?>66;">
                <i class="fas fa-home"></i>
            </a>
        </div>

        <a href="#" class="nav_item">
            <div class="icon_box">
                <i class="fas fa-shopping-basket"></i>
                <span class="cart_badge"><?php echo e($cart_count ?? 0); ?></span>
            </div>
            <span class="nav_text">CART</span>
        </a>

        <a href="#" class="nav_item">
            <div class="icon_box">
                <i class="fas fa-user"></i>
            </div>
            <span class="nav_text">ACCOUNT</span>
        </a>
    </div>
</nav>



        


<a href="javascript:void(0)" class="floating-cart-widget" id="floatingCartBtn" title="কাট ু">
    <div class="floating-cart-header">
        <i class="fa-solid fa-bag-shopping"></i>
        <span class="floating-item-count mobilecart-qty"><?php echo e(Cart::instance('shopping')->count()); ?> Items</span>
    </div>
    <div class="floating-cart-price">
         ৳ <?php echo e(Cart::instance('shopping')->subtotal()); ?>

    </div>
</a>


<div id="sidebarCartOverlay" class="sidebar-cart-overlay" onclick="closeSidebarCart()"></div>
<div id="sidebarCartDrawer" class="sidebar-cart-drawer">
    <div id="sidebarCartContent">
        
    </div>
</div>

<script>
function openSidebarCart() {
    document.getElementById("sidebarCartOverlay").classList.add("active");
    document.getElementById("sidebarCartDrawer").classList.add("active");
    document.body.style.overflow = "hidden";
    if (typeof sidebarCartRefresh === "function") sidebarCartRefresh();
}

function closeSidebarCart() {
    document.getElementById("sidebarCartOverlay").classList.remove("active");
    document.getElementById("sidebarCartDrawer").classList.remove("active");
    document.body.style.overflow = "";
}

function sidebarCartRefresh() {
    $.get("<?php echo e(route('cart.sidebar')); ?>", function(html) {
        $("#sidebarCartContent").html(html);
        if (typeof feather !== "undefined") feather.replace();
    });
}

function syncFloatingCartFromSidebar() {
    // . ইডবর  ো আ সংখ্া ো
    var latestCount = $('.sidebar-cart-item').length;
    
    // ২. সা েে লটসট োট ্য ুজে  
    var priceText = '';
    if ($('.sidebar-cart-total-amount').length) {
        priceText = $('.sidebar-cart-total-amount').text();
    } else {
        $('*').filter(function() {
            return $(this).text().indexOf('সোট') !== -1;
        }).each(function() {
            priceText = $(this).text();
        });
    }

    // টট থেে শধ সযাট আাদা 
    var cleanPrice = "0";
    if (priceText) {
        var match = priceText.match(/[\d,.]+/);
        if (match) {
            cleanPrice = match[0];
        }
    }

    // 💥 ৩. নন: আেম ংখয ০ ল া দ ০.০ হলে ি "0" এসই ক
    if (latestCount === 0 || parseFloat(cleanPrice.replace(/,/g, '')) === 0) {
        cleanPrice = "0.00";
    }

    // ৪. া ন্ াস (floating-cart-price) মূয বসনো
    $('.floating-cart-price').html(' ' + cleanPrice);
    
    // . পনার রদি্ সে (mobilecart-qty) আে সং্ স
    $('.mobilecart-qty').each(function() {
        if ($(this).hasClass('cart_badge')) {
            $(this).text(latestCount); 
        } else {
            $(this).text(latestCount + ' Items'); 
        }
    });
}

// ভে্ িস ও শন অবার ু্ত ক
document.addEventListener("DOMContentLoaded", function() {
    var floatBtn = document.getElementById("floatingCartBtn");
    if(floatBtn) {
        floatBtn.addEventListener("click", function(e) {
            e.preventDefault();
            openSidebarCart();
        });
    }

    // ্রথার  ো স্ কর
    syncFloatingCartFromSidebar();

    // াার ের লা/া/লট হল ন্ট্ ট্ািং
    var targetNode = document.getElementById('sidebarCartContent');
    if (targetNode) {
        var observer = new MutationObserver(function(mutations) {
            syncFloatingCartFromSidebar();
        });
        observer.observe(targetNode, { attributes: true, childList: true, subtree: true, characterData: true });
    }
});

// অয যকো AJAX োেসট (যে Add to Cart)  হল যাপ স্ক
$(document).ajaxComplete(function(event, xhr, settings) {
    setTimeout(function() {
        syncFloatingCartFromSidebar();
    }, 400); 
});
</script>

<style>
.product-section {
    padding: 0px 0;
    border-radius: 12px;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.11);
.mb-4 {
    margin-bottom: 0rem !important;
}
    
}
.details_right {
    border: 0px solid #ddd;
    padding: 2px 10px;
    height: 100%;
    border-radius: 5px;
}
/* Smoothly collapse and hide the logo area on scroll */
.main-header.scrolled .logo-area {
    display: none;
}

/* Ensure the header/menu stays fixed or sticky at the top when scrolling */
.main-header {
    position: sticky;
    top: 0;
    z-index: 1000;
    background-color: #ffffff; /* Adjust to match your design if needed */
    transition: all 0.3s ease; /* Optional: adds a smooth transition effect */
}

/* Center the button wrapper */
.show_more_btn {
    text-align: center;
    margin-bottom: 12px;
}

/* Base style for the Load More button to match the picture */
.show_more_btn a, 
.show_more_btn button {
    display: inline-block !important;
    padding: 12px 40px !important; /* Adjusts width and height of the button */
    color: #f27a21 !important; /* Theme Orange text */
    background-color: transparent !important;
    border: 2px solid #f27a21 !important; /* Orange outline */
    border-radius: 50px !important; /* This creates the fully rounded 'pill' shape */
    font-size: 15px !important;
    font-weight: 600 !important;
    text-transform: uppercase !important; /* Forces text to be LOAD MORE */
    text-decoration: none !important;
    cursor: pointer !important;
    transition: all 0.3s ease-in-out !important; /* Makes the hover effect smooth */
}

/* Hover Effect: Black background, White text */
.show_more_btn a:hover, 
.show_more_btn button:hover {
    background-color: #000000 !important; /* Black background */
    color: #ffffff !important; /* White text */
    border-color: #000000 !important; /* Changes border to black to match */
}

/* Footer Layout Context Configuration */
.custom-site-footer {
    color: #555555;
    font-family: 'Open Sans', sans-serif;
    padding-top: 50px;
    border-top: 1px solid #ededed;
}

/* First Column Left Alignment Directives */
.footer-about-col {
    text-align: left !important;
}

.footer-logo-link {
    display: inline-block;
    margin-bottom: 18px;
}

.footer-brand-logo {
    max-height: 55px;
    width: auto;
    display: block;
}

.footer-about-text {
    color: #666666;
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 22px;
    text-align: left;
}

/* Contact Block Layout */
.footer-contact-info {
    font-size: 14px;
    color: #555555;
    line-height: 2.2;
    text-align: left;
    margin-bottom: 20px;
}

.footer-contact-item {
    display: flex;
    align-items: center;
    justify-content: flex-start;
    gap: 12px;
    margin-bottom: 6px;
}

.footer-contact-item i {
    color: #888888;
    width: 16px;
    text-align: left;
}

.footer-contact-item a {
    color: #555555;
    text-decoration: none;
    transition: color 0.2s ease;
}

.footer-contact-item a:hover {
    color: #f27a21;
}

/* Social Media Row Configurations */
.footer-social-links {
    display: flex;
    justify-content: flex-start;
    list-style: none;
    padding-left: 0;
    gap: 16px;
    margin: 0 0 25px 0;
}

.footer-social-icon {
    color: #f27a21;
    font-size: 18px;
    transition: transform 0.2s ease;
}

.footer-social-icon:hover {
    transform: translateY(-2px);
}

/* App Badges System Configuration */
.download-app-title {
    font-weight: 600;
    font-size: 14px;
    margin-bottom: 12px;
    color: #333333;
    text-align: left;
}

.footer-app-badges {
    display: flex;
    justify-content: flex-start;
    gap: 10px;
}

.footer-app-badges img {
    height: 38px !important;
    width: auto !important;
}

/* Standard Navigation Menu Target Adjustments */
.footer-menu-title {
    color: #333333;
    font-weight: 600;
    font-size: 16px;
    margin-bottom: 20px;
    text-align: left;
}

.footer-menu-links {
    list-style: none;
    padding-left: 0;
    line-height: 2.4;
    font-size: 14px;
    text-align: left;
}

.footer-menu-links a {
    color: #666666;
    text-decoration: none;
    transition: color 0.2s ease;
}

.footer-menu-links a:hover {
    color: #f27a21;
}

/* Bottom Bar Infrastructure */
.footer-bottom-bar {
    margin-top: 50px;
    padding: 18px 0;
    border-top: 1px solid #ededed;
}

.copyright-text {
    margin: 0;
    color: #666666;
    font-size: 13px;
    display: flex;
    align-items: left;
    flex-wrap: wrap;
    gap: 6px;
    justify-content: flex-start;
}

.divider-pipe {
    margin: 0 4px;
    color: #cccccc;
}

.developer-credit-link {
    text-decoration: none;
    color: #666666;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 4px;
}

.developer-credit-link img {
    height: 16px;
    width: auto;
    object-fit: contain;
}

/* Payment Badges Alignment CSS */
.payment-gateway-container {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 12px;
}

.pay-with-label {
    font-size: 13px;
    color: #777777;
    white-space: nowrap;
}



/* Responsive Overrides ensuring left-align rules remain stable on mobile */
@media (max-width: 767px) {
    .copyright-text {
        justify-content: flex-start !important;
    }
    .payment-gateway-container {
        justify-content: flex-start !important;
        margin-top: 5px;
    }
}
.footer-menu {
        text-align: left !important;
    }
    
    .footer-menu-title {
        text-align: left !important;
        margin-bottom: 12px !important;
    }
    
    .footer-menu-links {
        text-align: left !important;
        padding-left: 0 !important;
    }
    
    .footer-menu-links li {
        text-align: left !important;
    }
    
    .footer-menu-links a {
        display: block !important;
        text-align: left !important;
    }
}
/* Responsive adjustments to maintain left-align on mobile */
@media (max-width: 767px) {
    .copyright-text {
        text-align: left !important;
        margin-bottom: 10px;
    }
    .payment-gateway-container {
        justify-content: flex-start !important; /* Forces payments to left align on small screens too */
    }
}

/* Footer Layout Base Configuration */
.custom-site-footer {
    color: #555555;
    font-family: 'Open Sans', sans-serif;
    padding-top: 5px;
    padding-bottom: 10px; /* Space for the mobile sticky bar */
    border-top: 1px solid #ededed;
}

.footer-about-col {
    text-align: left !important;
}

.footer-logo-link {
    display: inline-block;
    margin-bottom: 18px;
}

.footer-brand-logo {
    max-height: 55px;
    width: auto;
    display: block;
}

.footer-about-text {
    color: #666666;
    font-size: 14px;
    line-height: 1.6;
    margin-bottom: 22px;
    text-align: left !important;
}

/* Contact Block Layout */
.footer-contact-info {
    font-size: 14px;
    color: #555555;
    line-height: 2.2;
    text-align: left !important;
    margin-bottom: 20px;
}

.footer-contact-item {
    display: flex;
    align-items: center;
    justify-content: flex-start !important;
    gap: 12px;
    margin-bottom: 6px;
}

.footer-contact-item i {
    color: #888888;
    width: 16px;
    text-align: left !important;
}

.footer-contact-item a {
    color: #555555;
    text-decoration: none;
}

/* Social Media Row Configurations */
.footer-social-links {
    display: flex;
    justify-content: flex-start !important;
    list-style: none;
    padding-left: 0;
    gap: 16px;
    margin: 0 0 25px 0;
}

.footer-social-icon {
    color: #f27a21;
    font-size: 18px;
}

/* App Badges System Configuration */
.download-app-title {
    font-weight: 600;
    font-size: 14px;
    margin-bottom: 12px;
    color: #333333;
    text-align: left !important;
}

.footer-app-badges {
    display: flex;
    justify-content: flex-start !important;
    gap: 10px;
}

.footer-app-badges img {
    height: 38px !important;
    width: auto !important;
}

/* Standard Navigation Menu Adjustments */
.footer-menu-title {
    color: #222831;
    font-weight: 600;
    font-size: 16px;
    margin-bottom: 20px;
    text-align: left !important;
}

.footer-menu-links {
    list-style: none;
    padding-left: 0;
    line-height: 2.4;
    font-size: 14px;
    text-align: left !important;
}

.footer-menu-links a {
    color: #666666;
    text-decoration: none;
}

/* Bottom Bar Infrastructure */
.footer-bottom-bar {
    margin-top: 50px;
    padding: 18px 0;
    border-top: 1px solid #ededed;
}

.copyright-text {
    font-family: 'Roboto', sans-serif !important;
    font-weight: 500;
    margin: 0;
    color: #666666;
    font-size: 13px;
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 6px;
    justify-content: flex-start !important;
    text-align: center !important;
}

.divider-pipe {
    margin: 0 4px;
    color: #cccccc;
}

.developer-credit-link {
    text-decoration: none;
    color: #666666;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    gap: 4px;
    font-family: 'Roboto', sans-serif !important;
}

.developer-credit-link img {
    height: 16px;
    width: auto;
}

/* Payment Badges Alignment & Responsive Fix */
.payment-gateway-container {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 12px;
    width: 100%;
}

.pay-with-label {
    font-size: 13px;
    color: #777777;
    white-space: nowrap;
}

.payment-gateway-img {
    max-height: 80px;
    max-width: 100%;
    object-fit: contain;
}

/* STICKY BOTTOM NAVIGATION BAR FOR MOBILE */
.mobile-bottom-nav {
    display: none; /* Hidden on Desktop */
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    height: 60px;
    background-color: #f27a21; /* Matches orange theme theme */
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
    z-index: 9999;
    justify-content: space-around;
    align-items: center;
    padding: 5px 0;
}

.mobile-bottom-nav .nav-item {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    color: #ffffff;
    text-decoration: none;
    font-size: 11px;
    font-weight: 600;
    flex: 1;
    opacity: 0.85;
    transition: opacity 0.2s;
}

.mobile-bottom-nav .nav-item i {
    font-size: 20px;
    margin-bottom: 3px;
}

.mobile-bottom-nav .nav-item.active,
.mobile-bottom-nav .nav-item:hover {
    opacity: 1;
}

/* Cart Badge Element Inside Navigation */
.cart-icon-wrapper {
    position: relative;
    display: inline-block;
}

.cart-badge {
    position: absolute;
    top: -6px;
    right: -10px;
    background-color: #333333;
    color: #ffffff;
    font-size: 10px;
    font-weight: bold;
    border-radius: 50%;
    width: 16px;
    height: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* RESPONSIVE RESPONSIVENESS OVERRIDES */
@media (max-width: 767px) {
    /* Show mobile navigation bar */
    .mobile-bottom-nav {
        display: flex;
    }
    
    /* Extra padding at bottom to prevent cutoff by sticky bar */
    .custom-site-footer {
        padding-bottom: 80px;
    }

    /* Force all menus and titles to Left Align on mobile */
    .footer-menu {
        text-align: left !important;
    }
    .footer-menu-title {
        text-align: left !important;
        margin-top: 15px;
        margin-bottom: 10px !important;
    }
    .footer-menu-links {
        text-align: left !important;
    }
    .footer-menu-links li {
        text-align: left !important;
    }

    /* Reverse order so payment gateway shows above copyright text */
    .reverse-mobile {
        display: flex;
        flex-direction: column-reverse;
    }

    /* Fix Payment Image scaling on small mobile screens */
    .payment-gateway-container {
        justify-content: flex-start !important;
        flex-direction: column;
        align-items: flex-start;
        gap: 8px;
        margin-bottom: 20px;
    }
    .payment-gateway-img {
        max-height: unset;
        width: 100%; /* Spans across nicely */
        height: auto;
    }
    .copyright-text {
        justify-content: flex-start !important;
    }
}







    .floating-cart-widget {
        position: fixed;
        top: 50%;
        margin-top: -30px;
        right: 0 !important;
        transform: translateY(-50%) !important;
        width: 75px !important; /* Fixed mid-size width matching your ideal layout scale */
        
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;
        justify-content: center !important;
        border-radius: 6px 0 0 6px !important;
        
        z-index: 99999 !important;
        text-decoration: none !important;
        transition: all 0.2s ease-in-out !important;
       
        overflow: hidden !important;
        
        box-shadow: 0px 12px 24px rgba(34, 87, 122, 0.24);
  
    text-align: center;
    display: block;
    border: none;
    font-size: 20px;
    }
    
    .floating-cart-widget:hover {
        transform: translateY(-50%) translateX(-2px) !important;
    }

    /* Top Orange Section for Item Count */
    .floating-cart-header {
        background: <?php echo e($generalsetting->primary_color ?? '#f28729'); ?> !important;
        width: 100% !important;
        padding: 10px 2px 8px 2px !important;
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;
        justify-content: center !important;
        color: #ffffff !important;
        gap: 1px !important;
    }

    .floating-cart-header i {
        font-size: 20px !important; /* Balanced outline bag icon sizing */
        color: #ffffff !important;
    }

    .floating-item-count {
        font-size: 12px !important;
        font-weight: 600 !important;
        white-space: nowrap !important;
        text-align: center !important;
        color: #ffffff !important;
    }

    /* Bottom Section for Price Text */
    .floating-cart-price {
        width: 100% !important;
        padding: 5px 2px !important;
        font-size: 14px !important;
        font-weight: 600 !important;
        background: #ffffff;
        color: <?php echo e($generalsetting->primary_color ?? '#f28729'); ?> !important; /* Clean colored text style */
        
    }

    /* Mobile Responsive Scale Adjustments */
    @media (max-width: 768px) {
        .floating-cart-widget {
            top: 65% !important;
            width: 58px !important;
        }
        .floating-cart-header {
            padding: 8px 2px 6px 2px !important;
        }
        .floating-cart-header i {
            font-size: 16px !important;
        }
        .floating-item-count {
            font-size: 9px !important;
        }
        .floating-cart-price {
            padding: 6px 2px !important;
            font-size: 11px !important;
        }
    }
</style>
            <style>
            .sidebar-cart-overlay {
                position: fixed;
                inset: 0;
                background: rgba(0,0,0,0.4);
                z-index: 10010;
                opacity: 0;
                visibility: hidden;
                transition: opacity 0.3s, visibility 0.3s;
            }
            .sidebar-cart-overlay.active {
                opacity: 1;
                visibility: visible;
            }
            .sidebar-cart-drawer {
                position: fixed;
                top: 0;
                right: 0;
                width: 380px;
                max-width: 95vw;
                height: 100%;
                height: 100dvh;
                background: #fff;
                z-index: 10011;
                transform: translateX(100%);
                transition: transform 0.35s ease;
                box-shadow: -5px 0 25px rgba(0,0,0,0.15);
                display: flex;
                flex-direction: column;
                overflow: hidden;
            }
            .sidebar-cart-drawer.active {
                transform: translateX(0);
            }
            #sidebarCartContent {
                height: 100%;
                overflow-y: auto;
                overflow-x: hidden;
            }
            .sidebar-cart-header {
                color: #fff;
                padding: 16px 20px;
                display: flex;
                align-items: center;
                gap: 12px;
                flex-shrink: 0;
            }
            .sidebar-cart-close {
                background: transparent;
                border: none;
                color: #fff;
                font-size: 22px;
                cursor: pointer;
                padding: 4px;
                line-height: 1;
            }
            .sidebar-cart-close:hover { opacity: 0.9; }
            .sidebar-cart-title {
                font-size: 20px;
                font-weight: 700;
                margin: 0;
                flex: 1;
            }
            .sidebar-cart-body {
                flex: 0 0 auto;
                padding: 16px;
                background: #f8f9fa;
            }
            .sidebar-cart-item {
                display: flex;
                gap: 12px;
                padding: 12px;
                background: #fff;
                border-radius: 8px;
                margin-bottom: 10px;
                box-shadow: 0 1px 3px rgba(0,0,0,0.06);
            }
            .sidebar-cart-item-img {
                width: 70px;
                height: 85px;
                flex-shrink: 0;
                border-radius: 6px;
                overflow: hidden;
            }
            .sidebar-cart-item-img img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
            .sidebar-cart-item-details {
                flex: 1;
                min-width: 0;
                position: relative;
            }
            .sidebar-cart-item-title {
                font-weight: 600;
                color: #222;
                text-decoration: none;
                display: block;
                margin-bottom: 4px;
                font-size: 14px;
                line-height: 1.3;
            }
            .sidebar-cart-item-title:hover { color: <?php echo e($generalsetting->primary_color ?? '#007bff'); ?>; }
            .sidebar-cart-item-price {
                font-size: 13px;
                color: #444;
                margin: 0 0 4px 0;
            }
            .sidebar-cart-item-savings {
                font-size: 12px;
                color: #28a745;
                font-weight: 500;
                margin: 0 0 8px 0;
            }
            .sidebar-cart-item-remove {
                position: absolute;
                bottom: 0;
                right: 0;
                background: none;
                border: none;
                color: <?php echo e($generalsetting->primary_color ?? '#007bff'); ?>;
                cursor: pointer;
                padding: 4px;
                font-size: 14px;
            }
            .sidebar-cart-item-remove:hover { opacity: 0.85; }
            .sidebar-cart-qty {
                display: flex;
                align-items: center;
                width: fit-content;
                border: 1px solid #ddd;
                border-radius: 6px;
                overflow: hidden;
                margin: 8px 0 6px 0;
            }
            .sidebar-qty-btn {
                width: 28px;
                height: 28px;
                border: none;
                background: #f0f0f0;
                color: #333;
                font-size: 18px;
                font-weight: bold;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                transition: background 0.2s;
            }
            .sidebar-qty-btn:hover {
                background: <?php echo e($generalsetting->primary_color ?? '#007bff'); ?>;
                color: #fff;
            }
            .sidebar-qty-num {
                min-width: 28px;
                height: 28px;
                display: flex;
                align-items: center;
                justify-content: center;
                font-weight: 600;
                font-size: 14px;
                background: #fff;
            }
            .sidebar-cart-empty {
                text-align: center;
                padding: 40px 20px;
                color: #888;
            }
            .sidebar-cart-empty i {
                font-size: 48px;
                margin-bottom: 12px;
                opacity: 0.5;
            }
            .sidebar-cart-footer {
                padding: 16px 20px;
                border-top: 1px solid #eee;
                background: #fff;
            }
            .sidebar-cart-total {
                display: flex;
                justify-content: space-between;
                align-items: baseline;
                margin-bottom: 12px;
            }
            .sidebar-cart-total-label {
                font-size: 14px;
                color: #666;
            }
            .sidebar-cart-total-amount {
                font-size: 20px;
                font-weight: 700;
                color: #222;
            }
            .sidebar-cart-checkout-btn {
                display: block;
                width: 100%;
                padding: 14px 24px;
                color: #fff !important;
                text-align: center;
                font-weight: 600;
                font-size: 16px;
                border-radius: 6px;
                text-decoration: none;
                transition: opacity 0.2s;
            }
            .sidebar-cart-checkout-btn:hover {
                opacity: 0.9;
                color: #fff !important;
            }
            @media (max-width: 768px) {
                .sidebar-cart-drawer {
                    width: 100%;
                    max-width: 100%;
                }
                .sidebar-cart-header { padding: 14px 16px; }
                .sidebar-cart-body { padding: 12px; }
                .sidebar-cart-item { padding: 10px; }
                .sidebar-cart-item-img { width: 60px; height: 72px; }
                .sidebar-qty-btn { width: 36px; height: 36px; }
                .sidebar-qty-num { min-width: 36px; height: 36px; }
            }
            /* Fly to cart animation */
            .fly-to-cart-img {
                position: fixed;
                z-index: 99999;
                pointer-events: none;
                border-radius: 8px;
                box-shadow: 0 8px 30px rgba(0,0,0,0.35);
                object-fit: cover;
                border: 2px solid #fff;
            }
            @keyframes cartBump {
                0% { transform: scale(1); }
                40% { transform: scale(1.25); }
                70% { transform: scale(0.95); }
                100% { transform: scale(1); }
            }
            .cart-bump-animate {
                animation: cartBump 0.45s ease-out;
            }
            .floating-cart-widget, .menu-bag a, .mobile_bottom_nav .nav_item .icon_box {
                transform-origin: center center;
            }
        </style>

        <script>
        function openSidebarCart() {
            document.getElementById("sidebarCartOverlay").classList.add("active");
            document.getElementById("sidebarCartDrawer").classList.add("active");
            document.body.style.overflow = "hidden";
            if (typeof sidebarCartRefresh === "function") sidebarCartRefresh();
        }
        function closeSidebarCart() {
            document.getElementById("sidebarCartOverlay").classList.remove("active");
            document.getElementById("sidebarCartDrawer").classList.remove("active");
            document.body.style.overflow = "";
        }
        function sidebarCartRefresh() {
            $.get("<?php echo e(route('cart.sidebar')); ?>", function(html) {
                $("#sidebarCartContent").html(html);
                if (typeof feather !== "undefined") feather.replace();
            });
        }
        document.getElementById("floatingCartBtn") && document.getElementById("floatingCartBtn").addEventListener("click", function(e) {
            e.preventDefault();
            openSidebarCart();
        });
        document.getElementById("sidebarCartOverlay") && document.getElementById("sidebarCartOverlay").addEventListener("click", closeSidebarCart);
        </script>

       <div class="mobile_bottom_nav">
    <div class="nav_container">
        
        
        <a href="<?php echo e(route('home')); ?>" class="nav_item <?php echo e(Route::is('home') ? 'active' : ''); ?>">
            <div class="icon_box">
                <i class="fa-solid fa-house"></i>
            </div>
            <span class="nav_text">HOME</span>
        </a>

        
        <a href="javascript:void(0)" class="nav_item toggle">
            <div class="icon_box">
                <i class="fi fi-rr-apps"></i> 
            </div>
            <span class="nav_text">MENU</span>
        </a>

        
        <a href="<?php echo e(route('customer.checkout')); ?>" class="nav_item <?php echo e(Route::is('customer.checkout') ? 'active' : ''); ?>">
            <div class="icon_box">
                <i class="fi-rr-shopping-bag"></i> 
                <span style="margin-bottom: -6px; vertical-align: middle;" class="cart_badge mobilecart-qty"><?php echo e(Cart::instance('shopping')->count()); ?></span>
            </div>
            <span class="nav_text">CART</span>
        </a>

        
        <a href="<?php echo e(route('customer.order_track')); ?>" class="nav_item <?php echo e(Route::is('customer.order_track') ? 'active' : ''); ?>">
            <div class="icon_box">
                <i class="fa-solid fa-magnifying-glass"></i> 
            </div>
            <span class="nav_text">SEARCH</span>
        </a>

        
        <?php if(Auth::guard('customer')->user()): ?>
            <a href="<?php echo e(route('customer.account')); ?>" class="nav_item <?php echo e(Route::is('customer.account') ? 'active' : ''); ?>">
                <div class="icon_box">
                    <i class="fa-regular fa-user"></i>
                </div>
                <span class="nav_text">LOGIN</span>
            </a>
        <?php elseif(Auth::guard('admin')->check() && Auth::guard('admin')->user()->hasRole('vendor')): ?>
            <a href="<?php echo e(route('vendor.dashboard')); ?>" class="nav_item">
                <div class="icon_box">
                    <i class="fa-solid fa-store"></i>
                </div>
                <span class="nav_text">VENDOR</span>
            </a>
        <?php elseif(Auth::guard('admin')->check() && (Auth::guard('admin')->user()->hasRole('reseller') || (isset(Auth::guard('admin')->user()->role) && strtolower(Auth::guard('admin')->user()->role) === 'reseller'))): ?>
            <a href="<?php echo e(route('reseller.dashboard')); ?>" class="nav_item">
                <div class="icon_box">
                    <i class="fa-solid fa-handshake"></i>
                </div>
                <span class="nav_text">RESELLER</span>
            </a>
        <?php else: ?>
            <a href="<?php echo e(route('customer.login')); ?>" class="nav_item <?php echo e(Route::is('customer.login') ? 'active' : ''); ?>">
                <div class="icon_box">
                    <i class="fa-regular fa-user"></i> 
                </div>
                <span class="nav_text">ACCOUNT</span>
            </a>
        <?php endif; ?>

    </div>
</div>
<style>


/* Container styling */
/* Container styling - Adjusted height and padding */
.mobile_bottom_nav {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background-color: #F78E20; /* Your theme orange */
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
    z-index: 999;
    display: none; /* Controlled via your media query */
}

/* Reduced vertical padding here makes the whole bar thinner */
.mobile_bottom_nav .nav_container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 6px px; /* Decreased from 10px to 6px */
}

/* Individual Item Styling */
.mobile_bottom_nav .nav_item {
    flex: 1;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    color: #ffffff;
    position: relative;
    padding: 2px 0; /* Kept tight to prevent stretching */
}

/* Icon Styling - Set to a clean, crisp size */
.mobile_bottom_nav .icon_box {
    position: relative;
    font-size: 18px; /* Slightly reduced for a sleeker look */
    margin-bottom: 2px; /* Reduced gap between icon and text */
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

/* Text Styling */
.mobile_bottom_nav .nav_text {
    font-size: 11px;               /* Slightly larger but thin to match image */
    font-weight: 400;              /* 400 makes the text thin, not bold */
    text-transform: capitalize;    /* Changes it from ALL CAPS to Capitalize Like This */
    font-family: Arial, Helvetica, sans-serif;
    letter-spacing: 0.2px;
    
    display: block;
    width: 100%;
    text-align: center;
    line-height: 1.2;
    margin-top: 5px;               /* Clean, uniform gap from the icon */
}
/* Cart Badge Styling (The dark circle) */
.mobile_bottom_nav .cart_badge {
    position: absolute;
    top: -6px;
    right: -8px;
    background-color: #2D3748;
    color: #ffffff;
    font-size: 9px;
    font-weight: bold;
    height: 14px;
    width: 14px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #F78E20;
}

/* Mobile Media Query Display rule */
@media (max-width: 767px) {
    .mobile_bottom_nav {
        display: block;
    }
}
/* --- Floating Chat Widget Styles --- */
.chat-widget {
    position: fixed;
    bottom: 95px; /* মবল টম ্ার কছট উপ ে */
    right: 20px;
    width: 60px;
    height: 60px;
    background-color: #f27a21; /* পার র্নডর কমলা র */
    border-radius: 28px 28px 4px 28px; /* সক্নর ম িে ডা োন িুা োখা ও  নলো  */
    display: flex;
    justify-content: center;
    align-items: center;
    color: #ffffff !important;
    box-shadow: 0 4px 15px rgba(242, 122, 33, 0.4);
    z-index: 99999;
    transition: transform 0.3s ease, background-color 0.3s ease;
    text-decoration: none;
}

/* ্ জটের রে SVG আইন */
.chat-widget svg {
    width: 28px;
    height: 28px;
    fill: #ffffff;
}

/*  ইেক্ (েকের য) */
.chat-widget:hover {
    transform: scale(1.08);
    background-color: #e06916; /* র র সয া্ক ব */
}

/* েপ্ি যাসটমে্ (্কটপ ব াপপ ) */
@media (min-width: 768px) {
    .chat-widget {
        bottom: 30px; /* ্টে ম ্যর কে া, া ু নিে না হয়েছে */
        right: 30px;
    }
}

</style>
        
<!-- ЁЯМР Floating Chat Widget -->
<div class="chat-widget">
  <!-- Main Toggle Button -->
  <div class="chat-toggle" id="chatToggle">
    <i class="fas fa-comment-dots"></i>
  </div>

  <!-- Chat Options -->
  <div class="chat-options" id="chatOptions">
          <a href="https://m.me/<?php echo e($generalsetting->facebook_page_username); ?>" target="_blank" class="chat-btn messenger" title="Messenger">
      <i class="fab fa-facebook-messenger"></i>
    </a>
          <a href="https://wa.me/<?php echo e($contact->whatsapp); ?>" target="_blank" class="chat-btn whatsapp" title="WhatsApp">
      <i class="fab fa-whatsapp"></i>
    </a>
    <a href="tel:<?php echo e($contact->hotline); ?>" class="chat-btn hotline" title="Hotline">
      <i class="fas fa-phone"></i>
    </a>


  </div>
</div>

<!-- Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
/* Floating Container */
.chat-widget {
  position: fixed;
  bottom: 60px; /*  Chat icon এখন 55px উর */
  right: 25px;
  z-index: 9999;
  display: flex;
  flex-direction: column;
  align-items: flex-end;
}

/* Main Toggle Button */
.chat-toggle {
  background:#D46315;
  color: #fff;
  width: 60px;
  height: 60px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
  cursor: pointer;
  transition: transform 0.3s ease;
  font-size: 26px;
}
.chat-toggle:hover {
  transform: scale(1.1);
}

/* Chat Options Hidden by Default */
.chat-options {
  display: none;
  flex-direction: column;
  gap: 10px;
  margin-bottom: 10px;
  align-items: flex-end;
}

/* Each Chat Button */
.chat-btn {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  color: white;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 22px;
  text-decoration: none;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  transition: all 0.3s ease;
}
.chat-btn:hover {
  transform: translateY(-3px);
}

/* Button Colors */
.chat-btn.whatsapp { background: #25D366; }
.chat-btn.messenger { background: #0084FF; }
.chat-btn.instagram { background: #E1306C; }
.chat-btn.hotline { background: #FF3B30; }

/* Animation */
.chat-options.show {
  display: flex;
  animation: fadeInUp 0.3s ease;
}
@keyframes fadeInUp {
  from { opacity: 0; transform: translateY(20px); }
  to { opacity: 1; transform: translateY(0); }
}

/* Tooltip */
.chat-btn[title]:hover::after {
  content: attr(title);
  position: absolute;
  right: 65px;
  background: #222;
  color: #fff;
  padding: 5px 10px;
  font-size: 13px;
  border-radius: 6px;
  white-space: nowrap;
  opacity: 0.9;
}

</style>
<?php
    $popup = App\Models\Popup::where('status', 1)->latest()->first();
    // ুু ই দাবে ন া ও লিং খা  btn_text ইনোর (ট "Shop Now" থকল)
    $popupImageOnly = $popup && !trim($popup->description ?? '') && !trim($popup->link ?? '');
?>
<?php if($popup): ?>
<div class="modal fade pop-banner-modal" id="popShopModal" tabindex="-1" aria-hidden="true" data-bs-backdrop="true" style="z-index: 10000;">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable <?php echo e($popupImageOnly ? 'pop-banner-dialog' : 'modal-lg'); ?>">
        <div class="modal-content ps-content <?php echo e($popupImageOnly ? 'ps-content-image-only' : ''); ?>">
            <button type="button" class="ps-close pop-banner-close" data-bs-dismiss="modal" aria-label="ধ ু">
                <span aria-hidden="true">&times;</span>
            </button>
            
            <?php if($popupImageOnly): ?>
            
            <div class="ps-image-only-wrap">
                <?php if(trim($popup->link ?? '')): ?>
                <a href="<?php echo e($popup->link); ?>" target="_blank" class="d-block">
                    <img src="<?php echo e(url('public/'.$popup->image)); ?>" alt="<?php echo e($popup->title ?? 'Fabrilife and bkash promotion'); ?>" class="img-fluid w-100">
                </a>
                <?php else: ?>
                <img src="<?php echo e(url('public/'.$popup->image)); ?>" alt="<?php echo e($popup->title ?? 'Promotional offer'); ?>" class="img-fluid w-100">
                <?php endif; ?>
            </div>
            <?php else: ?>
            
            <div class="ps-layout">
                <div class="ps-text-section">
                    <h3 class="ps-brand"><?php echo e($popup->title ?? 'Offer'); ?></h3>
                    
                    <div class="ps-headline">
                        <p><?php echo nl2br(e($popup->description ?? '')); ?></p>
                    </div>

                    <?php if($popup->offer_end_text): ?>
                    <p class="ps-deadline"><?php echo e($popup->offer_end_text); ?></p>
                    <?php endif; ?>

                    <a href="<?php echo e($popup->link ?? '#'); ?>" class="ps-btn">
                        <?php echo e($popup->btn_text ?? 'Shop the Sale'); ?>

                    </a>

                    <div class="ps-footer">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                          <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2l-2.218-.887zm3.564 1.426L5.596 5 8 5.961 14.154 3.5l-2.404-.961zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923l6.5 2.6zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464L7.443.184z"/>
                        </svg>
                        <span>POWERED BY <strong><?php echo e($generalsetting->name ?? ''); ?></strong></span>
                    </div>
                </div>

                <div class="ps-image-section">
                    <img src="<?php echo e(url('public/'.$popup->image)); ?>" alt="<?php echo e($popup->title ?? 'Offer'); ?>">
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
    /* Modal Container */
    .ps-content {
        border: none;
        border-radius: 0px; /* Sharp corners like the image */
        overflow: hidden;
        background-color: #fff;
        box-shadow: 0 15px 50px rgba(0,0,0,0.3);
        max-width: 850px; /* Width matching the reference */
        margin: 0 auto;
    }

    /* Flex Layout */
    .ps-layout {
        display: flex;
        flex-direction: row;
        min-height: 450px;
    }

    /* === Left Side Styling === */
    .ps-text-section {
        width: 50%;
        padding: 50px 40px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        text-align: left;
        position: relative;
    }

    /* Brand: Serif, Reddish-Brown */
    .ps-brand {
        color: #b93a3a; /* Exact color from image */
        font-family: 'Georgia', 'Times New Roman', serif;
        font-weight: 700;
        font-size: 38px;
        margin-bottom: 15px;
        line-height: 1;
    }

    /* Headline: Bold, Sans-Serif */
    .ps-headline {
        color: #222;
        font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-size: 20px;
        font-weight: 700;
        line-height: 1.4;
        margin-bottom: 15px;
    }
    
    /* Description text style if multiple lines */
    .ps-headline span, .ps-headline p {
        font-weight: 400;
        font-size: 16px;
        color: #555;
        margin-top: 10px;
    }

    /* Deadline Text: Small, Gray */
    .ps-deadline {
        color: #888;
        font-size: 14px;
        margin-bottom: 30px;
    }

    /* Button: Dark, Rectangular */
    .ps-btn {
        background-color: #2c3e50; /* Dark Charcoal */
        color: #fff !important;
        text-decoration: none;
        padding: 15px 30px;
        text-align: center;
        font-weight: 600;
        font-size: 16px;
        border-radius: 2px; /* Slight radius but mostly sharp */
        display: block;
        width: 100%;
        transition: 0.3s;
    }
    .ps-btn:hover {
        background-color: #000;
    }

    /* Footer / Powered By */
    .ps-footer {
        margin-top: 40px;
        font-size: 10px;
        color: #aaa;
        display: flex;
        align-items: center;
        gap: 8px;
        text-transform: uppercase;
    }
    .ps-footer strong { color: #333; }

    /* === Right Side Styling === */
    .ps-image-section {
        width: 50%;
        position: relative;
        background: #f0f0f0;
    }
    .ps-image-section img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ensures image covers full height */
        display: block;
    }

    /* Close Button */
    .ps-close {
        position: absolute;
        top: 15px;
        right: 15px;
        background: #fff;
        border: none;
        border-radius: 50%;
        width: 32px;
        height: 32px;
        font-size: 24px;
        line-height: 32px;
        color: #333;
        cursor: pointer;
        z-index: 1050;
        box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        transition: 0.2s;
    }
    .ps-close:hover {
        color: #b93a3a;
        transform: scale(1.1);
    }

    /* === Fabrilife-style promo popup (ইজ-অল) === */
    body:has(#popShopModal.show) .modal-backdrop {
        opacity: 0.72 !important;
        background-color: #0d0d0d !important;
        backdrop-filter: blur(6px);
        -webkit-backdrop-filter: blur(6px);
    }

    .pop-banner-modal .modal-dialog.pop-banner-dialog {
        max-width: min(560px, 95vw);
        width: 100%;
        margin: 1rem auto;
    }

    .ps-content-image-only {
        max-width: 100% !important;
        border-radius: 16px !important;
        overflow: visible !important;
        background: #fff !important;
        box-shadow: 0 24px 64px rgba(0, 0, 0, 0.45), 0 0 0 1px rgba(255, 255, 255, 0.08) !important;
        position: relative;
        padding: 10px;
    }

    .ps-content-image-only .ps-image-only-wrap {
        padding: 0;
        line-height: 0;
        border-radius: 12px;
        overflow: hidden;
        background: #fff;
    }

    .ps-content-image-only .ps-image-only-wrap img {
        width: 100%;
        height: auto;
        max-height: min(90vh, 920px);
        object-fit: contain;
        display: block;
        vertical-align: top;
    }

    .ps-content-image-only .ps-image-only-wrap a {
        display: block;
        line-height: 0;
    }

    .ps-content-image-only .ps-image-only-wrap a:hover img {
        opacity: 0.97;
    }

    /* জ ন  রে নে, ো X, া ব্ত (রেনস টল) */
    .pop-banner-close,
    .ps-content-image-only .pop-banner-close {
        position: absolute;
        top: 6px;
        right: 6px;
        z-index: 1060;
        width: 36px;
        height: 36px;
        padding: 0;
        margin: 0;
        border: none;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.96) !important;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.18);
        color: #111 !important;
        font-size: 26px;
        line-height: 1;
        font-weight: 300;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: transform 0.2s, background 0.2s;
    }

    .pop-banner-close:hover,
    .ps-content-image-only .pop-banner-close:hover {
        background: #fff !important;
        color: #000 !important;
        transform: scale(1.06);
    }

    .pop-banner-close span {
        line-height: 0.85;
        margin-top: -2px;
    }

    /* টে্ট+জ েআট ্ো বা জিন */
    .ps-content:not(.ps-content-image-only) .pop-banner-close {
        top: 15px;
        right: 15px;
        width: 34px;
        height: 34px;
        font-size: 22px;
    }

    /* ্্ি আট পও ো া */
    .pop-banner-modal .ps-content:not(.ps-content-image-only) {
        border-radius: 12px;
        overflow: hidden;
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .ps-layout {
            flex-direction: column-reverse; /* Image Top, Text Bottom */
        }
        .ps-text-section { width: 100%; padding: 30px; }
        .ps-image-section { width: 100%; height: 250px; }
        .ps-brand { font-size: 30px; }
        .pop-banner-modal .modal-dialog.pop-banner-dialog {
            max-width: 96vw;
            margin: 0.5rem auto;
        }
        .ps-content-image-only .ps-image-only-wrap img {
            max-height: 88vh;
        }
    }
</style>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        //  ঘা পর  েখাে
        const hoursToWait = 3;  
        // সইটে ঢর ২ ্ড র েখে
        const delayInSeconds = 2; 

        const timeLimit = hoursToWait * 60 * 60 * 1000;
        const lastShown = localStorage.getItem('popupLastShown');
        const now = new Date().getTime();

        if (!lastShown || (now - lastShown > timeLimit)) {
            setTimeout(function() {
                // Try opening with jQuery (Standard for Laravel themes)
                if (typeof jQuery != 'undefined') {
                    $('#popShopModal').modal('show');
                } 
                // Try opening with Bootstrap 5
                else if (typeof bootstrap != 'undefined') {
                    var myModal = new bootstrap.Modal(document.getElementById('popShopModal'));
                    myModal.show();
                }

                localStorage.setItem('popupLastShown', now);
            }, delayInSeconds * 1000);
        }
    });
</script>
<?php endif; ?>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php if(session('show_order_limit_modal')): ?>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // ডাািক সঅপ ন্া (ডটব ে)
        var whatsappNumber = "<?php echo e($contact->whatsapp ?? $contact->hotline ?? '8801700000000'); ?>"; 
        
        Swal.fire({
            title: '', 
            html: `
                <div class="custom-modal-content">
                    <div class="modal-header-custom">
                        <div class="header-left">
                            <i class="fas fa-exclamation-triangle header-icon"></i>
                            <span>Duplicate Order Detective Alert</span>
                        </div>
                        <i class="fas fa-times close-icon" onclick="Swal.close()"></i>
                    </div>

                    <div class="modal-body-custom">
                        <p>
                            <img src="https://img.icons8.com/emoji/48/000000/warning-emoji.png" style="width: 20px; vertical-align: text-bottom;"> 
                            <b>্তা!</b> আ ইিম্ এই পির নয ্র দযেছে। িদিষট সমর মধযে কই ণযের প ্ডার দওয অমিত য় 
                             আন দ সয আবর ্ার কে , তাে ন েও় WhatsApp বরে যা কু:
                        </p>
                    </div>

                    <div class="modal-footer-custom">
                        <a href="https://wa.me/${whatsappNumber}?text=মি এক ণ্য নর অর্ রত , অ্ র সহ্ কর" target="_blank" class="btn-whatsapp-custom">
                            <i class="fab fa-whatsapp"></i> CONTACT ON WHATSAPP
                        </a>
                        <button onclick="Swal.close()" class="btn-close-custom">Close</button>
                    </div>
                </div>
            `,
            showConfirmButton: false, // িফ্ট ান ব্  য়েছে
            background: 'transparent', // ডি্ট গউন্ড রিু
            customClass: {
                popup: 'swal-no-padding'
            },
            allowOutsideClick: false
        });
    });
</script>

<style>
    /* পপ-প ন্ই রসেট */
    .swal-no-padding {
        padding: 0 !important;
        background: none !important;
        box-shadow: none !important;
        overflow: visible !important;
    }

    /* মেই বক ন */
    .custom-modal-content {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        font-family: 'Arial', sans-serif;
        box-shadow: 0 10px 25px rgba(0,0,0,0.5);
        max-width: 500px;
        margin: 0 auto;
    }

    /* া েডর (ি  হব) */
    .modal-header-custom {
        background-color: #b91c1c; /* গা ল */
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: white;
        font-size: 18px;
        font-weight: bold;
    }

    .header-left {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .header-icon {
        color: #facc15; /* হ ক */
        font-size: 20px;
    }

    .close-icon {
        cursor: pointer;
        opacity: 0.8;
        font-size: 20px;
        transition: 0.2s;
    }
    .close-icon:hover {
        opacity: 1;
    }

    /* ি টকসট */
    .modal-body-custom {
        padding: 30px 25px;
        text-align: left;
        font-size: 15px;
        line-height: 1.6;
        color: #4b5563;
    }

    /* ুট এবং  */
    .modal-footer-custom {
        padding: 0 25px 30px 25px;
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    /* োসঅ্য  (ুজ) */
    .btn-whatsapp-custom {
        background-color: #10b981;
        color: white !important;
        text-decoration: none;
        padding: 10px 20px;
        border-radius: 50px;
        font-weight: bold;
        font-size: 13px;
        display: flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        transition: background 0.3s;
        border: none;
    }
    .btn-whatsapp-custom:hover {
        background-color: #059669;
    }

    /* জ বটন (ল) */
    .btn-close-custom {
        background-color: #dc2626;
        color: white;
        padding: 10px 30px;
        border-radius: 50px;
        font-weight: bold;
        font-size: 14px;
        border: none;
        cursor: pointer;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        transition: background 0.3s;
    }
    .btn-close-custom:hover {
        background-color: #b91c1c;
    }

    /* পনিভ জই */
    @media (max-width: 450px) {
        .modal-footer-custom {
            flex-direction: column;
        }
        .btn-whatsapp-custom, .btn-close-custom {
            width: 100%;
            justify-content: center;
        }
    }
</style>
<?php endif; ?>


<script>
/* ЁФ╣ Toggle Open/Close */
document.getElementById("chatToggle").addEventListener("click", function() {
  document.getElementById("chatOptions").classList.toggle("show");
});
</script>


        <!-- /. fixed sidebar -->

        <div id="custom-modal"></div>
        <div id="page-overlay"></div>
        <div id="loading"><div class="custom-loader"></div></div>

        <script src="<?php echo e(asset('public/frontEnd/js/jquery-3.6.3.min.js')); ?>"></script>
        <script src="<?php echo e(asset('public/frontEnd/js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('public/frontEnd/js/owl.carousel.min.js')); ?>"></script>
        <script src="<?php echo e(asset('public/frontEnd/js/mobile-menu.js')); ?>"></script>
        <script src="<?php echo e(asset('public/frontEnd/js/wsit-menu.js')); ?>"></script>
        <script src="<?php echo e(asset('public/frontEnd/js/mobile-menu-init.js')); ?>"></script>
        <script src="<?php echo e(asset('public/frontEnd/js/wow.min.js')); ?>"></script>
        <script>
            new WOW().init();
        </script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

        <!-- feather icon -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.29.0/feather.min.js"></script>
        <script>
            feather.replace();
        </script>
        <script src="<?php echo e(asset('public/backEnd/')); ?>/assets/js/toastr.min.js"></script>
        <?php echo Toastr::message(); ?> <?php echo $__env->yieldPushContent('script'); ?>
        <script>
            $(".quick_view").on("click", function () {
                var id = $(this).data("id");
                $("#loading").show();
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id },
                        url: "<?php echo e(route('quickview')); ?>",
                        success: function (data) {
                            if (data) {
                                $("#custom-modal").html(data);
                                $("#custom-modal").show();
                                $("#loading").hide();
                                $("#page-overlay").show();
                            }
                        },
                    });
                }
            });
        </script>
        <!-- quick view end -->
        <!-- cart js start -->
        <script>
            function runFlyToCart($sourceEl, onComplete) {
                var $flyImg;
                if ($sourceEl && $sourceEl.closest && $sourceEl.closest('.variant-modal-content').length)
                    $flyImg = $sourceEl.closest('.variant-modal-content').find('.variant-modal-img img').first();
                if (!$flyImg || !$flyImg.length)
                    $flyImg = ($sourceEl && $sourceEl.closest) ? $sourceEl.closest('.product_item, .wist_item, .search-item, .quick-product, .product-section, .main-details-page, .details-action-box, .block__single, form').find('.pro_img img, .quick-product-img img, .details_slider img, .block__pic, .dimage_item img').first() : null;
                if (!$flyImg || !$flyImg.length) $flyImg = $('.product_item .pro_img img, .wist_item .pro_img img').first();
                if (!$flyImg || !$flyImg.length) $flyImg = $('.details_slider img, .block__pic, .dimage_item img, #details_slider_main img').first();
                if (!$flyImg.length) { if (typeof onComplete === 'function') onComplete(); return; }
                var rect = $flyImg[0].getBoundingClientRect();
                var $clone = $flyImg.clone().addClass('fly-to-cart-img').css({
                    position: 'fixed', width: 90, height: 110,
                    left: rect.left, top: rect.top, margin: 0, padding: 0, zIndex: 99999
                }).appendTo('body');
                var $target = $('#floatingCartBtn, .floating-cart-widget').first();
                if (!$target.length || !$target.is(':visible')) $target = $('.mobile_bottom_nav .cart_badge').closest('a').first();
                if (!$target.length) $target = $('.menu-bag a').first();
                var destRect = $target.length && $target.is(':visible') ? $target[0].getBoundingClientRect() : { left: $(window).width() - 60, top: $(window).height() / 2 - 40 };
                var endW = 36, endH = 44;
                var endLeft = destRect.left + ($target.length ? (destRect.width || 0) / 2 - endW / 2 : 0);
                var endTop = destRect.top + ($target.length ? (destRect.height || 0) / 2 - endH / 2 : 0);
                var midLeft = (rect.left + endLeft) / 2 - 20;
                var midTop = Math.min(rect.top, endTop) - 100;
                $clone.animate({ left: midLeft, top: midTop, width: 70, height: 85, opacity: 1 }, 300, 'swing', function() {
                    $(this).animate({ left: endLeft, top: endTop, width: endW, height: endH, opacity: 0.6 }, 350, 'swing', function() {
                        $clone.remove();
                        if ($target && $target.length) { $target.addClass('cart-bump-animate'); setTimeout(function() { $target.removeClass('cart-bump-animate'); }, 450); }
                        if (typeof onComplete === 'function') onComplete();
                    });
                });
            }
            function fireAddToCartEvent(el, id, qty, name, price, category) {
                qty = parseInt(qty) || 1;
                price = parseFloat(price) || 0;
                var item = { item_id: String(id), item_name: name || '', price: price, quantity: qty, item_category: category || '' };
                window.dataLayer = window.dataLayer || [];
                window.dataLayer.push({ event: 'add_to_cart', ecommerce: { currency: 'BDT', value: price * qty, items: [item] } });
                if (typeof fbq === 'function') fbq('track', 'AddToCart', { content_ids: [String(id)], content_name: name, content_type: 'product', value: price * qty, currency: 'BDT', num_items: qty });
                if (typeof ttq !== 'undefined') ttq.track('AddToCart', { content_type: 'product', content_id: String(id), content_name: name, value: price * qty, currency: 'BDT', quantity: qty });
            }
            $(document).on("click", ".addcartbutton", function (e) {
                e.preventDefault();
                var $btn = $(this);
                var id = $btn.data("id");
                var qty = 1;
                var name = $btn.data("name") || $btn.closest('.product_item, .wist_item, .search-item').find('.pro_name a, .product-name a').first().text().trim();
                var price = parseFloat($btn.data("price")) || parseFloat($btn.closest('.product_item, .wist_item, .search-item').find('.pro_price span, .pro_price p, .price').first().text().replace(/[^\d.]/g, '')) || 0;
                var category = $btn.data("category") || '';
                if (id) {
                    $.ajax({
                        cache: "false",
                        type: "GET",
                        url: "<?php echo e(url('add-to-cart')); ?>/" + id + "/" + qty,
                        dataType: "json",
                        success: function (data) {
                            if (data) {
                                fireAddToCartEvent(null, id, qty, name, price, category);
                                toastr.success('কাটে ো ছে!', 'সফ');
                                cart_count();
                                mobile_cart();
                                if (typeof sidebarCartRefresh === "function") sidebarCartRefresh();
                                runFlyToCart($btn, function() { if (typeof openSidebarCart === "function") openSidebarCart(); });
                            }
                        },
                    });
                }
            });
            /* Form submit interceptor - কর ফর াবমিট ে AJAX দ াাে, েজ িো ব া */
            $(document).on("submit", "form.ajax-cart-form, form[action*='cart/store']", function (e) {
                var $form = $(this);
                if ($form.hasClass('cart-ajax-submit')) return;
                e.preventDefault();
                var id = $form.find("input[name=id]").val();
                var qty = $form.find("input[name=qty]").val() || 1;
                var hasOrderNow = false;
                if (e.originalEvent && e.originalEvent.submitter && e.originalEvent.submitter.name === 'order_now') {
                    hasOrderNow = true;
                } else {
                    hasOrderNow = !!$form.find("input[name=order_now]").val();
                }
                var name = $form.closest('.product_item, .wist_item, .search-item').find('.pro_name a, .product-name a').first().text().trim();
                if (!name) name = $form.closest('.details-action-box, .product-details-area, .block__single').find('h1, h2, .product-title').first().text().trim() || '';
                var priceText = $form.closest('.product_item, .wist_item').find('.pro_price p, .pro_price span').first().text();
                if (!priceText) priceText = $form.closest('.details-action-box, .block__single').find('.details-price, .block__price, .price').first().text() || '';
                var price = parseFloat(String(priceText).replace(/[^\d.]/g, '')) || 0;
                var category = $form.closest('.product_item, .wist_item').find('[data-category]').data('category') || '';
                $form.addClass('cart-ajax-submit');
                $.ajax({
                    type: "POST",
                    data: $form.serialize(),
                    url: $form.attr('action'),
                    headers: { 'X-Requested-With': 'XMLHttpRequest' },
                    success: function (data) {
                        if (data && data.success) {
                            fireAddToCartEvent(null, id, qty, name, price, category);
                            toastr.success('কারট য য়ছ!', '');
                            cart_count();
                            mobile_cart();
                            if (typeof sidebarCartRefresh === "function") sidebarCartRefresh();
                            if (hasOrderNow) {
                                window.location.href = "<?php echo e(route('customer.checkout')); ?>";
                            } else {
                                runFlyToCart($form, function() { if (typeof openSidebarCart === "function") openSidebarCart(); });
                            }
                        } else {
                            $form[0].submit();
                        }
                    },
                    error: function() {
                        $form[0].submit();
                    },
                    complete: function() { $form.removeClass('cart-ajax-submit'); }
                });
                return false;
            });
            $(document).on("click", ".cart_store", function (e) {
                var $btn = $(this);
                var $form = $btn.closest('form');
                if ($form.length && $form.attr('action') && !$form.hasClass('cart-ajax-submit')) {
                    var id = $btn.data("id") || $form.find("input[name=id]").val();
                    var qty = $form.find("input[name=qty]").val() || 1;
                    var name = $btn.data("name") || $form.closest('.product_item, .wist_item, .product-cart, .quick-view-content, .quick-product').find('.name, .pro_name a').first().text().trim();
                    var priceText = $form.closest('.product_item, .wist_item, .product-cart, .quick-view-content, .quick-product').find('.details-price, .pro_price span').first().text();
                    var price = parseFloat($btn.data("price")) || parseFloat(String(priceText).replace(/[^\d.]/g, '')) || 0;
                    var category = $btn.data("category") || $form.closest('.quick-product').find('.delivery_details td').first().text().replace('Category:','').trim() || '';
                    if (id) {
                        e.preventDefault();
                        $form.addClass('cart-ajax-submit');
                        $.ajax({
                            type: "POST",
                            data: $form.serialize(),
                            url: $form.attr('action'),
                            headers: { 'X-Requested-With': 'XMLHttpRequest' },
                            success: function (data) {
                                if (data && data.success) {
                                    fireAddToCartEvent(null, id, qty, name, price, category);
                                    toastr.success('াে গ হেে!', 'স');
                                    cart_count();
                                    mobile_cart();
                                    if (typeof sidebarCartRefresh === "function") sidebarCartRefresh();
                                    runFlyToCart($btn, function() { if (typeof openSidebarCart === "function") openSidebarCart(); });
                                } else {
                                    $form[0].submit();
                                }
                            },
                            error: function() {
                                $form[0].submit();
                            },
                            complete: function() { $form.removeClass('cart-ajax-submit'); }
                        });
                    }
                }
            });

            $(document).on("click", ".cart_remove", function () {
                var id = $(this).data("id");
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id },
                        url: "<?php echo e(route('cart.remove')); ?>",
                        success: function (data) {
                            if (data) {
                                $(".cartlist").html(data);
                                cart_count();
                                mobile_cart();
                                cart_summary();
                                if (typeof sidebarCartRefresh === "function") sidebarCartRefresh();
                            }
                        },
                    });
                }
            });

            $(document).on("click", ".cart_increment", function () {
                var id = $(this).data("id");
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id },
                        url: "<?php echo e(route('cart.increment')); ?>",
                        success: function (data) {
                            if (data) {
                                $(".cartlist").html(data);
                                cart_count();
                                mobile_cart();
                                if (typeof sidebarCartRefresh === "function") sidebarCartRefresh();
                            }
                        },
                    });
                }
            });

            $(document).on("click", ".cart_decrement", function () {
                var id = $(this).data("id");
                if (id) {
                    $.ajax({
                        type: "GET",
                        data: { id: id },
                        url: "<?php echo e(route('cart.decrement')); ?>",
                        success: function (data) {
                            if (data) {
                                $(".cartlist").html(data);
                                cart_count();
                                mobile_cart();
                                if (typeof sidebarCartRefresh === "function") sidebarCartRefresh();
                            }
                        },
                    });
                }
            });

            function cart_count() {
                $.ajax({
                    type: "GET",
                    url: "<?php echo e(route('cart.count')); ?>",
                    success: function (data) {
                        if (data) {
                            $("#cart-qty").html(data);
                        } else {
                            $("#cart-qty").empty();
                        }
                    },
                });
            }
            function mobile_cart() {
                $.ajax({
                    type: "GET",
                    url: "<?php echo e(route('mobile.cart.count')); ?>",
                    success: function (data) {
                        if (data) {
                            $(".mobilecart-qty").html(data);
                        } else {
                            $(".mobilecart-qty").empty();
                        }
                    },
                });
            }
            function cart_summary() {
                $.ajax({
                    type: "GET",
                    url: "<?php echo e(route('shipping.charge')); ?>",
                    dataType: "html",
                    success: function (response) {
                        $(".cart-summary").html(response);
                    },
                });
            }
        </script>
        <!-- cart js end -->
        <script>
            $(".search_click").on("keyup change", function () {
                var keyword = $(".search_keyword").val();
                $.ajax({
                    type: "GET",
                    data: { keyword: keyword },
                    url: "<?php echo e(route('livesearch')); ?>",
                    success: function (products) {
                        if (products) {
                            $(".search_result").html(products);
                        } else {
                            $(".search_result").empty();
                        }
                    },
                });
            });
            $(".msearch_click").on("keyup change", function () {
                var keyword = $(".msearch_keyword").val();
                $.ajax({
                    type: "GET",
                    data: { keyword: keyword },
                    url: "<?php echo e(route('livesearch')); ?>",
                    success: function (products) {
                        if (products) {
                            $("#loading").hide();
                            $(".search_result").html(products);
                        } else {
                            $(".search_result").empty();
                        }
                    },
                });
            });
        </script>
        <!-- search js start -->
        <script></script>
        <script></script>
        <script>
            $(".district").on("change", function () {
                var id = $(this).val();
                $.ajax({
                    type: "GET",
                    data: { id: id },
                    url: "<?php echo e(route('districts')); ?>",
                    success: function (res) {
                        if (res) {
                            $(".area").empty();
                            $(".area").append('<option value="">Select..</option>');
                            $.each(res, function (key, value) {
                                $(".area").append('<option value="' + key + '" >' + value + "</option>");
                            });
                        } else {
                            $(".area").empty();
                        }
                    },
                });
            });
        </script>
        <script>
            $(".toggle").on("click", function () {
                $("#page-overlay").show();
                $(".mobile-menu").addClass("active");
            });

            $("#page-overlay").on("click", function () {
                $("#page-overlay").hide();
                $(".mobile-menu").removeClass("active");
                $(".feature-products").removeClass("active");
            });

            $(".mobile-menu-close").on("click", function () {
                $("#page-overlay").hide();
                $(".mobile-menu").removeClass("active");
            });

            $(".mobile-filter-toggle").on("click", function () {
                $("#page-overlay").show();
                $(".feature-products").addClass("active");
            });
        </script>
        <script>
            $(document).ready(function () {
                $(".parent-category").each(function () {
                    const menuCatToggle = $(this).find(".menu-category-toggle");
                    const secondNav = $(this).find(".second-nav");

                    menuCatToggle.on("click", function () {
                        menuCatToggle.toggleClass("active");
                        secondNav.slideToggle("fast");
                        $(this).closest(".parent-category").toggleClass("active");
                    });
                });
                $(".parent-subcategory").each(function () {
                    const menuSubcatToggle = $(this).find(".menu-subcategory-toggle");
                    const thirdNav = $(this).find(".third-nav");

                    menuSubcatToggle.on("click", function () {
                        menuSubcatToggle.toggleClass("active");
                        thirdNav.slideToggle("fast");
                        $(this).closest(".parent-subcategory").toggleClass("active");
                    });
                });
            });
        </script>

        <script>
            // MmenuLight ুুত চাা ন #menu element ক (null check)
            var menuEl = document.querySelector("#menu");
            var menuLink = document.querySelector('a[href="#menu"]');
            if (menuEl && menuLink) {
                var menu = new MmenuLight(menuEl, "all");
                var navigator = menu.navigation({
                    selectedClass: "Selected",
                    slidingSubmenus: true,
                    title: "াগ",
                });
                var drawer = menu.offcanvas({});
                menuLink.addEventListener("click", function(evnt) {
                    evnt.preventDefault();
                    drawer.open();
                });
            }
        </script>

        <script>
            // document.addEventListener("DOMContentLoaded", function () {
            //     window.addEventListener("scroll", function () {
            //         if (window.scrollY > 200) {
            //             document.getElementById("navbar_top").classList.add("fixed-top");
            //         } else {
            //             document.getElementById("navbar_top").classList.remove("fixed-top");
            //             document.body.style.paddingTop = "0";
            //         }
            //     });
            // });
            /*=== Main Menu Fixed === */
            // document.addEventListener("DOMContentLoaded", function () {
            //     window.addEventListener("scroll", function () {
            //         if (window.scrollY > 0) {
            //             document.getElementById("m_navbar_top").classList.add("fixed-top");
            //             // add padding top to show content behind navbar
            //             navbar_height = document.querySelector(".navbar").offsetHeight;
            //             document.body.style.paddingTop = navbar_height + "px";
            //         } else {
            //             document.getElementById("m_navbar_top").classList.remove("fixed-top");
            //             // remove padding top from body
            //             document.body.style.paddingTop = "0";
            //         }
            //     });
            // });
            /*=== Main Menu Fixed === */

            $(window).scroll(function () {
                if ($(this).scrollTop() > 50) {
                    $(".scrolltop:hidden").stop(true, true).fadeIn();
                } else {
                    $(".scrolltop").stop(true, true).fadeOut();
                }
            });
            $(function () {
                $(".scroll").click(function () {
                    $("html,body").animate({ scrollTop: $(".gotop").offset().top }, "1000");
                    return false;
                });
            });
        </script>
        <script>
            $(".filter_btn").click(function(){
               $(".filter_sidebar").addClass('active');
               $("body").css("overflow-y", "hidden");
            })
            $(".filter_close").click(function(){
               $(".filter_sidebar").removeClass('active');
               $("body").css("overflow-y", "auto");
            })
        </script>
        <!--search ANIMAtion end-->
        <!-- Google Tag Manager (noscript) -->
        <?php $__currentLoopData = $gtm_code; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gtm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $gtmId = str_starts_with($gtm->code, 'GTM-') ? $gtm->code : 'GTM-'.$gtm->code; ?>
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=<?php echo e($gtmId); ?>"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <!-- End Google Tag Manager (noscript) -->
		
		
		<script>
		    $(document).ready(function() {
    $(".category-sliger").owlCarousel({
        loop: true,
        margin: 15,
        nav: true,          // Shows manual arrows
        dots: false,
        autoplay: true,     // Moves automatically
        autoplayTimeout: 3000, 
        autoplayHoverPause: true,
        navText: ["‹", "›"], 
        responsive: {
            0: {
                items: 3,    // 3 items for mobile
                nav: true
            },
            600: {
                items: 5
            },
            1000: {
                items: 8     // 8 items for desktop
            }
        }
    });
});
		    
		</script>
	<script>
	    $(document).ready(function() {
    $(".category-sliger").owlCarousel({
        loop: true,
        margin: 15,
        nav: true, 
        dots: false,
        autoplay: true,
        autoplayTimeout: 3000,
        navText: ["<span style='font-size:30px;'></span>", "<span style='font-size:30px;'></span>"],
        responsive: {
            0: { items: 3 },
            600: { items: 5 },
            1000: { items: 8 }
        }
    });
});
	</script>
	
	<script>
$(document).ready(function() {
    // Destroy any old stuck instances first to clear theme locks
    var $carousel = $('.brand-carousel-wrapper');
    if ($carousel.hasClass('owl-loaded')) {
        $carousel.trigger('destroy.owl.carousel');
    }

    // Initialize with exact responsive screen limits
    $carousel.owlCarousel({
        loop: true,
        margin: 15,
        nav: false,
        dots: true,
        autoplay: true,
        autoplayTimeout: 3000,
        responsive:{
            0:{
                items: 2 // Strictly forces 2 items per row on mobile screens
            },
            576:{
                items: 2 // Keeps 2 items on small tablets
            },
            768:{
                items: 3 // Shows 3 items on medium tablets
            },
            1000:{
                items: 4 // Strictly forces 4 items per row on desktop monitors
            }
        }
    });
});
</script>
    </body>
</html>
<?php /**PATH G:\xampp822\htdocs\laravel\martmama\resources\views/frontEnd/layouts/master.blade.php ENDPATH**/ ?>