<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo e($generalsetting->name); ?></title>
    <link rel="shortcut icon" href="<?php echo e(asset($generalsetting->favicon)); ?>" type="image/x-icon" />

    <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/campaign/css/all.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/campaign/css/bootstrap.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/campaign/css/animate.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/campaign/css/owl.theme.default.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/campaign/css/owl.carousel.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/campaign/css/select2.min.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/campaign/css/style.css')); ?>" />
    <link rel="stylesheet" href="<?php echo e(asset('public/frontEnd/campaign/css/responsive.css')); ?>" />

    
    <link href="https://fonts.maateen.me/kalpurush/font.css" rel="stylesheet">
    <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">

    <?php
        $camp_name      = strip_tags($campaign_data->name ?? '');
        $camp_slug      = $campaign_data->slug ?? '';
        $camp_id        = (string) $campaign_data->id;
        $_firstProd     = $products->first();
        $camp_value     = $_firstProd ? (float) $_firstProd->new_price : 0.0;
        $camp_products  = $products->map(function($p) {
            return [
                'id'        => (string) $p->id,
                'name'      => strip_tags($p->name ?? ''),
                'price'     => (float)  $p->new_price,
                'old_price' => (float)  $p->old_price,
            ];
        })->values();
        $_camp_idx      = 0;
        $camp_items_gtm = $products->map(function($p) use (&$_camp_idx) {
            return [
                'item_id'   => (string) $p->id,
                'item_name' => strip_tags($p->name ?? ''),
                'price'     => (float)  $p->new_price,
                'index'     => $_camp_idx++,
                'quantity'  => 1,
            ];
        })->values();
    ?>
    <script>
        window.dataLayer = window.dataLayer || [];
        window._campaignData = {
            id:          <?php echo e(json_encode($camp_id)); ?>,
            name:        <?php echo e(json_encode($camp_name)); ?>,
            slug:        <?php echo e(json_encode($camp_slug)); ?>,
            currency:    'BDT',
            fb_event_id: <?php echo e(json_encode($fb_view_content_event_id)); ?>

        };
        window._campaignProducts = <?php echo json_encode($camp_products); ?>;
        dataLayer.push({
            event:         'campaign_page_loaded',
            page_type:     'campaign_landing',
            campaign_id:   <?php echo e(json_encode($camp_id)); ?>,
            campaign_name: <?php echo e(json_encode($camp_name)); ?>,
            currency:      'BDT',
            value:         <?php echo e($camp_value); ?>,
            ecommerce: {
                currency: 'BDT',
                items:    <?php echo json_encode($camp_items_gtm); ?>

            }
        });
    </script>

    <?php $__currentLoopData = $gtm_code; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gtm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
        $gtm_container_id = preg_match('/^GTM-/i', trim($gtm->code)) ? trim($gtm->code) : 'GTM-' . trim($gtm->code);
    ?>
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','<?php echo e($gtm_container_id); ?>');</script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <meta name="app-url" content="<?php echo e(route('campaign',$campaign_data->slug)); ?>" />
    <meta name="robots" content="index, follow" />
    <meta name="description" content="<?php echo e($campaign_data->description); ?>" />
    <meta name="keywords" content="<?php echo e($campaign_data->slug); ?>" />

    <meta property="og:title" content="<?php echo e($campaign_data->name); ?>" />
    <meta property="og:type" content="product" />
    <meta property="og:url" content="<?php echo e(route('campaign',$campaign_data->slug)); ?>" />
    <meta property="og:image" content="<?php echo e(asset($campaign_data->image_one)); ?>" />
    <meta property="og:description" content="<?php echo e($campaign_data->description); ?>" />
    <meta property="og:site_name" content="<?php echo e($campaign_data->name); ?>" />

    <?php if($pixels->count() > 0): ?>
    <script>
        !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}
        (window,document,'script','https://connect.facebook.net/en_US/fbevents.js');
        <?php $__currentLoopData = $pixels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pixel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        fbq('init', '<?php echo e($pixel->code); ?>');
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        fbq('track', 'PageView', {}, {eventID: <?php echo e(json_encode('pv_camp'.$campaign_data->id.'_'.time())); ?>});
        fbq('track', 'ViewContent', {
            content_name: <?php echo e(json_encode($camp_name)); ?>,
            content_ids:  <?php echo json_encode($products->pluck('id')->map(fn($id) => (string)$id)->values()->toArray()); ?>,
            content_type: 'product',
            value:        <?php echo e($camp_value); ?>,
            currency:     'BDT',
            num_items:    <?php echo e($products->count()); ?>

        }, {eventID: <?php echo e(json_encode($fb_view_content_event_id)); ?>});
    </script>
    <?php endif; ?>

    <?php if($tiktok_pixels->count() > 0): ?>
    <script>
        !function (w, d, t) {
            w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];
            ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie"];
            ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};
            for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);
            ttq.load=function(e,n){var i="https://analytics.tiktok.com/i18n/pixel/events.js";
                var o=document.createElement("script");o.type="text/javascript",o.async=!0,o.src=i+"?sdkid="+e+"&lib="+t;
                var a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(o,a)};
        }(window, document, 'ttq');
        <?php $__currentLoopData = $tiktok_pixels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tiktok): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        ttq.load('<?php echo e($tiktok->code); ?>');
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        ttq.page();
    </script>
    <?php endif; ?>

    <style>
        /* =====================================================
           DESIGN TOKENS — universal, category-agnostic template
           Bangladeshi-friendly palette: deep forest green (trust)
           + flag red (action/urgency) + warm gold (premium accent)
           on a neutral warm-paper ground that won't clash with
           any product photography (honey, fashion, tech, kids...).
           ===================================================== */
        :root {
            --ink:        #1B231F;
            --forest-900: #063C22;
            --forest-700: #0E5C34;
            --forest-500: #16824A;
            --forest-100: #E7F5EC;
            --red-700:    #B31721;
            --red-600:    #D6202C;
            --gold-600:   #C98A1B;
            --gold-500:   #E8A33D;
            --paper:      #FAF7F1;
            --paper-2:    #F2ECDE;
            --line:       rgba(27, 35, 31, 0.12);
            --shadow-soft: 0 10px 28px rgba(20, 24, 22, 0.09);
            --shadow-lift: 0 16px 38px rgba(20, 24, 22, 0.15);
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; }

        body {
            font-family: 'SolaimanLipi', 'Kalpurush', Arial, sans-serif;
            background-color: var(--paper);
            color: var(--ink);
            font-size: 16px;
            line-height: 1.75;
        }

        h1, h2, h3, h4, h5, .heading-font {
            font-family: 'Kalpurush', 'SolaimanLipi', Arial, sans-serif;
            color: var(--ink);
        }

        a { text-decoration: none; }

        :focus-visible {
            outline: 3px solid var(--gold-500);
            outline-offset: 2px;
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }

        /* subtle premium texture — neutral dot grid, works on any dark section */
        .pattern-dark {
            background-image: radial-gradient(rgba(255,255,255,0.08) 1px, transparent 1.6px);
            background-size: 18px 18px;
        }

        /* ---------- Top announcement / countdown bar ---------- */
        .top-bar {
            background: linear-gradient(160deg, var(--forest-900) 0%, var(--forest-700) 60%, var(--forest-500) 100%);
        }
        .top-bar__msg { color: #fff; font-weight: 700; font-size: 1.03rem; line-height: 1.6; }
        .top-bar__msg .accent { color: var(--gold-500); }
        .counter-box {
            background: rgba(255,255,255,0.10);
            border: 1px solid rgba(255,255,255,0.25);
            border-radius: 10px;
            padding: 8px 10px;
            text-align: center;
            min-width: 56px;
        }
        .counter-box .num { font-family: 'Kalpurush', sans-serif; font-size: 1.35rem; font-weight: 700; color: #fff; line-height: 1; }
        .counter-box .text { font-size: 0.68rem; color: var(--gold-500); font-weight: 700; letter-spacing: .03em; }

        /* ---------- Hero ---------- */
        .hero { padding: 34px 0 26px; }
        .hero h1 { font-size: 1.5rem; font-weight: 700; line-height: 1.55; }
        @media (min-width: 768px) { .hero h1 { font-size: 2rem; } }
        .hero-underline {
            width: 72px; height: 5px; border-radius: 3px; margin: 14px auto 0;
            background: linear-gradient(90deg, var(--forest-700), var(--gold-500));
        }
        .hero-frame {
            border-radius: 16px; overflow: hidden; box-shadow: var(--shadow-lift);
            border: 1px solid var(--line); background: #fff;
        }
        .hero-frame img { display: block; width: 100%; height: auto; }

        /* Primary CTA — reserved solely for action, keeps its meaning clear */
        .cta-btn-primary {
            background: linear-gradient(160deg, var(--red-600), var(--red-700));
            color: #fff !important;
            border: none;
            border-radius: 50px;
            padding: 15px 34px;
            font-family: 'Kalpurush', sans-serif;
            font-size: 1.2rem;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            box-shadow: 0 10px 22px rgba(179, 23, 33, 0.32);
            transition: transform .2s ease, box-shadow .2s ease;
        }
        .cta-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 14px 26px rgba(179, 23, 33, 0.4);
            color: #fff;
        }

        /* ---------- Trust / feature cards ---------- */
        .feature-card {
            background: #fff;
            border-radius: 14px;
            border: 1px solid var(--line);
            box-shadow: var(--shadow-soft);
            padding: 22px 20px 22px 58px;
            position: relative;
            height: 100%;
        }
        .feature-card::before {
            content: '✓';
            position: absolute;
            top: 18px;
            left: 16px;
            width: 28px;
            height: 28px;
            border-radius: 8px;
            background: linear-gradient(160deg, var(--forest-500), var(--forest-900));
            color: #fff;
            font-weight: 700;
            font-size: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .feature-card h4 { font-size: 1rem; line-height: 1.7; }

        /* ---------- Emphasis strip (heading_2 / heading_3) ---------- */
        .emphasis-strip {
            background: var(--paper-2);
            border-top: 1px dashed var(--line);
            border-bottom: 1px dashed var(--line);
        }
        .emphasis-strip h2 { color: var(--red-600); font-size: 1.3rem; }
        .emphasis-strip h3 { color: var(--forest-700); font-size: 1.08rem; }

        /* ---------- Video section ---------- */
        .video-section { background: linear-gradient(180deg, var(--ink), #10140f); }
        .video-section h2 { color: var(--gold-500); }
        .video-frame {
            border-radius: 14px; overflow: hidden; box-shadow: var(--shadow-lift);
            border: 2px solid var(--forest-700);
        }

        /* ---------- Call / WhatsApp card ---------- */
        .contact-card {
            background: #fff; border-radius: 16px;
            border-top: 4px solid var(--forest-500);
            box-shadow: var(--shadow-soft);
        }
        .contact-card .phone-number { color: var(--red-600); font-family: 'Kalpurush', sans-serif; }
        .btn-call { background: var(--red-600); color: #fff; border-radius: 50px; font-weight: 700; }
        .btn-whatsapp { background: var(--forest-500); color: #fff; border-radius: 50px; font-weight: 700; }
        .btn-call:hover, .btn-whatsapp:hover { color: #fff; opacity: .92; }

        /* ---------- Description / benefits block ---------- */
        .details-card {
            border-radius: 14px; border: 1px solid var(--line);
            background: #fff; box-shadow: var(--shadow-soft);
        }
        .details-card h2 { color: var(--forest-700); border-bottom: 1px dashed var(--line); }

        /* =====================================================
           Product picker — plain checkbox LIST, not a click-card.
           The tick box is the obvious, literal "select this" control,
           which is what makes it readable for older / less web-savvy
           shoppers who don't intuit that a whole card is clickable.
           ===================================================== */
        .pp-hint {
            font-size: .85rem;
            color: var(--forest-700);
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 12px;
        }
        .pp-row {
            background: #fff;
            border: 1.5px solid var(--line);
            border-radius: 12px;
            padding: 12px 14px;
            margin-bottom: 10px;
            transition: border-color .15s ease, background-color .15s ease, box-shadow .15s ease;
        }
        .pp-row.checked {
            border-color: var(--forest-500);
            background-color: var(--forest-100);
            box-shadow: 0 0 0 3px rgba(22, 130, 74, 0.14);
        }
        .pp-row__main {
            display: flex;
            align-items: center;
            gap: 12px;
            cursor: pointer;
        }
        .pp-checkbox-wrap input[type="checkbox"] {
            position: absolute;
            opacity: 0;
            width: 1px; height: 1px;
        }
        .pp-check-visual {
            width: 28px; height: 28px;
            border-radius: 8px;
            border: 2px solid #c9c0af;
            background: #fff;
            display: flex; align-items: center; justify-content: center;
            flex-shrink: 0;
            transition: all .15s ease;
        }
        .pp-check-visual svg { width: 16px; height: 16px; opacity: 0; transform: scale(.6); transition: all .15s ease; }
        .pp-row.checked .pp-check-visual { background: var(--forest-500); border-color: var(--forest-500); }
        .pp-row.checked .pp-check-visual svg { opacity: 1; transform: scale(1); }

        .pp-thumb {
            width: 54px; height: 54px;
            border-radius: 9px;
            object-fit: cover;
            border: 1px solid var(--line);
            flex-shrink: 0;
            background: #fff;
        }
        .pp-info { flex: 1 1 auto; min-width: 0; }
        .pp-name {
            display: block;
            font-weight: 700;
            font-size: .95rem;
            color: var(--ink);
            margin-bottom: 2px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .pp-price .new { color: var(--red-600); font-weight: 700; }
        .pp-price .old { color: #9a9086; font-size: .85em; margin-left: 6px; }

        .pp-variants {
            margin-top: 10px;
            padding-top: 10px;
            padding-left: 40px;
            border-top: 1px dashed var(--line);
        }
        .pp-variant-group {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
            margin-bottom: 8px;
        }
        .pp-variant-group:last-child { margin-bottom: 0; }
        .pp-variant-label { font-size: .78rem; font-weight: 700; color: #7a6a56; min-width: 44px; }

        .pp-swatch input { position: absolute; opacity: 0; width: 1px; height: 1px; }
        .pp-swatch-btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 5px 12px 5px 6px;
            border-radius: 20px;
            border: 1.5px solid var(--line);
            font-size: .8rem;
            font-weight: 600;
            color: var(--ink);
            cursor: pointer;
            transition: all .15s ease;
        }
        .pp-swatch-dot {
            width: 18px; height: 18px;
            border-radius: 50%;
            border: 1px solid rgba(0,0,0,0.15);
            flex-shrink: 0;
        }
        .pp-swatch input:checked + .pp-swatch-btn {
            border-color: var(--forest-500);
            background: var(--forest-100);
            box-shadow: 0 0 0 2px rgba(22, 130, 74, 0.15);
        }

        .pp-pill input { position: absolute; opacity: 0; width: 1px; height: 1px; }
        .pp-pill span {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            border: 1.5px solid var(--line);
            font-size: .82rem;
            font-weight: 600;
            color: var(--ink);
            cursor: pointer;
            transition: all .15s ease;
        }
        .pp-pill input:checked + span { background: var(--forest-500); border-color: var(--forest-500); color: #fff; }

        .pp-variant-warning {
            color: var(--red-600);
            font-size: .78rem;
            font-weight: 700;
            margin-top: 4px;
            padding-left: 40px;
        }

        /* ---------- Cart table ---------- */
        .modern-cart-table th { background-color: var(--paper-2); color: var(--ink); font-size: 13px; }
        .modern-cart-table td { vertical-align: middle; }
        .qty-input-group { width: 104px; margin: 0 auto; }
        .qty-input-group button {
            background: var(--paper-2); border: 1px solid var(--line);
            padding: 3px 11px; font-weight: 700; color: var(--forest-700);
        }
        .qty-input-group input {
            text-align: center; border: 1px solid var(--line);
            border-left: none; border-right: none; font-weight: 700;
        }

        /* ---------- Checkout form ---------- */
        .checkout-wrapper {
            background: #fff; border-radius: 16px;
            box-shadow: var(--shadow-lift);
            border-top: 4px solid var(--forest-500);
            padding: 10px;
        }
        .checkout-wrapper h4 { color: var(--forest-700); }
        .form-control, .form-select {
            border-radius: 9px; padding: 12px 15px;
            border: 1px solid var(--line);
            font-family: 'SolaimanLipi', sans-serif;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--forest-500);
            box-shadow: 0 0 0 0.2rem rgba(22, 130, 74, 0.18);
        }

        .trust-badge {
            display: inline-flex; align-items: center;
            background: var(--forest-100); color: var(--forest-900);
            padding: 8px 16px; border-radius: 50px; font-weight: 700; margin-top: 14px;
        }
        .trust-badge i { font-size: 1.1rem; margin-right: 8px; }

        .rounded-custom { border-radius: 14px; }

        .order-ribbon {
            display: inline-block; background: #fff; color: var(--red-600);
            font-family: 'Kalpurush', sans-serif; font-weight: 700;
            padding: 10px 26px; border-radius: 50px; box-shadow: var(--shadow-soft);
            border: 1px solid rgba(179,23,33,0.15);
        }

        /* =====================================================
           STICKY MOBILE ORDER BAR
           Left: big red order-now button (thumb-reachable)
           Right: live cart total in a green trust pill
           ===================================================== */
        .sticky-mobile-cta {
            position: fixed; bottom: 0; left: 0; width: 100%;
            background: #fff;
            border-top: 1px solid var(--line);
            box-shadow: 0 -8px 22px rgba(20,24,22,0.14);
            z-index: 9999;
            padding: 10px 12px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
        }
        .sticky-mobile-cta .cta-btn-primary {
            padding: 11px 20px;
            font-size: .98rem;
            flex: 1 1 auto;
            justify-content: center;
        }
        .sticky-cart-amount {
            flex: 0 0 auto;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            justify-content: center;
            background: var(--forest-100);
            color: var(--forest-900);
            border-radius: 12px;
            padding: 6px 12px;
            line-height: 1.15;
            cursor: pointer;
        }
        .sticky-cart-amount small {
            font-size: .64rem; font-weight: 700; color: var(--forest-700);
        }
        .sticky-cart-amount strong {
            font-family: 'Kalpurush', sans-serif;
            font-size: 1.02rem;
        }

        @media (min-width: 992px) { .sticky-mobile-cta { display: none; } }

        /* extra bottom breathing room on mobile so sticky bar never covers content */
        @media (max-width: 991.98px) { body { padding-bottom: 64px; } }
    </style>

    <?php echo $generalsetting->header_code; ?>

</head>

<?php
    // Recompute directly from cart items so multi-product totals are always accurate.
    $grandSubtotal = 0;
    foreach (Cart::instance('shopping')->content() as $cartItem) {
        $grandSubtotal += $cartItem->price * $cartItem->qty;
    }
    $shipping = Session::get('shipping') ? Session::get('shipping') : 0;
    $grandTotal = $grandSubtotal + $shipping;
?>

<body>

    <section class="top-bar pattern-dark shadow-sm">
        <div class="container py-3">
            <div class="row align-items-center gy-3">
                <div class="col-12 col-md-7 text-center text-md-start">
                    <p class="top-bar__msg mb-0">
                        <?php echo $campaign_data->top_title_1; ?> <span class="accent"><?php echo $campaign_data->top_title_2; ?></span>
                    </p>
                </div>
                <div class="col-12 col-md-5">
                    <div id="countdown" class="d-flex justify-content-center justify-content-md-end gap-2">
                        <div class="counter-box"><div class="num" id="days">00</div><div class="text">Days</div></div>
                        <div class="counter-box"><div class="num" id="hours">00</div><div class="text">Hours</div></div>
                        <div class="counter-box"><div class="num" id="minutes">00</div><div class="text">Mins</div></div>
                        <div class="counter-box"><div class="num" id="seconds">00</div><div class="text">Secs</div></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="hero">
        <div class="container">
            <div class="text-center mb-4">
                <h1><?php echo $campaign_data->heading_1; ?></h1>
                <div class="hero-underline"></div>
            </div>

            <div class="row justify-content-center gy-3 align-items-center">
                <?php if($campaign_data->image_one): ?>
                <div class="col-12 col-md-6">
                    <div class="hero-frame"><img src="<?php echo e(asset($campaign_data->image_one)); ?>" alt="Campaign Image"></div>
                </div>
                <?php endif; ?>
                <?php if($campaign_data->image_two): ?>
                <div class="col-12 col-md-6">
                    <div class="hero-frame"><img src="<?php echo e(asset($campaign_data->image_two)); ?>" alt="Campaign Image"></div>
                </div>
                <?php endif; ?>
            </div>

            <div class="text-center mt-4">
                <a href="#order_form" class="cta-btn-primary">
                    <i class="fa-solid fa-cart-arrow-down"></i> এখনই অর্ডার করুন 
                </a>
            </div>
        </div>
    </section>

    <section class="py-4" style="background-color: var(--paper-2);">
        <div class="container">
            <div class="row justify-content-center gy-3">
                <?php if($campaign_data->feature_1): ?>
                <div class="col-12 col-md-6">
                    <div class="feature-card"><h4 class="mb-0 fw-bold"><?php echo $campaign_data->feature_1; ?></h4></div>
                </div>
                <?php endif; ?>
                <?php if($campaign_data->feature_2): ?>
                <div class="col-12 col-md-6">
                    <div class="feature-card"><h4 class="mb-0 fw-bold"><?php echo $campaign_data->feature_2; ?></h4></div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </section>

    <?php if($campaign_data->heading_2 || $campaign_data->heading_3): ?>
    <section class="emphasis-strip py-4">
        <div class="container text-center">
            <?php if($campaign_data->heading_2): ?><h2 class="fw-bold mb-2"><?php echo $campaign_data->heading_2; ?></h2><?php endif; ?>
            <?php if($campaign_data->heading_3): ?><h3 class="fw-bold"><?php echo $campaign_data->heading_3; ?></h3><?php endif; ?>
        </div>
    </section>
    <?php endif; ?>

    <?php if($campaign_data->video != null): ?>
    <section class="video-section pattern-dark py-5">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-12 col-lg-8">
                    <h2 class="fw-bold mb-4"><i class="fa-solid fa-circle-play me-2"></i>প্রোডাক্টের ভিডিও দেখুন</h2>
                    <div class="ratio ratio-16x9 video-frame">
                        <iframe src="https://www.youtube.com/embed/<?php echo e($campaign_data->video); ?>" title="<?php echo e($campaign_data->banner_title); ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="mt-4">
                        <a href="#order_form" class="cta-btn-primary">
                            <i class="fa-solid fa-hand-point-right"></i> অর্ডার করতে চাই
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    

    <?php if(optional($campaign_data)->short_description && strlen($campaign_data->short_description) > 15 || optional($campaign_data)->description && strlen($campaign_data->description) > 15): ?>
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10">
                    <div class="details-card p-4">
                        <h2 class="text-center fw-bold mb-4 pb-3">বিস্তারিত বিবরণ</h2>
                        <div class="fs-5 lh-lg">
                            <?php echo $campaign_data->short_description; ?>

                            <br><br>
                            <?php echo $campaign_data->description; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php endif; ?>

    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold mb-4"><?php echo e($campaign_data->name); ?></h2>
                <div class="campro_img_slider owl-carousel px-md-5">
                    <?php if($campaign_data->image_one): ?>
                    <div class="item px-2"><div class="hero-frame"><img class="img-fluid" src="<?php echo e(asset($campaign_data->image_one)); ?>" alt=""></div></div>
                    <?php endif; ?>
                    <?php if($campaign_data->image_two): ?>
                    <div class="item px-2"><div class="hero-frame"><img class="img-fluid" src="<?php echo e(asset($campaign_data->image_two)); ?>" alt=""></div></div>
                    <?php endif; ?>
                    <?php if($campaign_data->image_three): ?>
                    <div class="item px-2"><div class="hero-frame"><img class="img-fluid" src="<?php echo e(asset($campaign_data->image_three)); ?>" alt=""></div></div>
                    <?php endif; ?>
                </div>
            </div>

            <?php if($campaign_data->images && $campaign_data->images->count() > 0): ?>
            <div class="text-center mt-5">
                <h2 class="fw-bold mb-4" style="color: var(--forest-700);"><?php echo e($campaign_data->review); ?></h2>
                <div class="review_slider owl-carousel">
                    <?php $__currentLoopData = $campaign_data->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item px-2">
                        <img class="img-fluid rounded-custom border shadow-sm" src="<?php echo e(asset($value->image)); ?>" alt="Review">
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
            <?php endif; ?>

            <div class="text-center mt-4">
                <a href="#order_form" class="cta-btn-primary">
                    <i class="fa-solid fa-bag-shopping"></i> অর্ডার করতে ক্লিক করুন
                </a>
            </div>
        </div>
    </section>

    <section class="py-5" style="background-color: var(--paper-2);" id="order_form">
        <div class="container">
            <div class="text-center mb-4">
                <span class="order-ribbon">অফারটি সীমিত সময়ের জন্য</span>
                <?php if($campaign_data->note): ?><p class="mt-3 fw-bold fs-5"><?php echo $campaign_data->note; ?></p><?php endif; ?>
            </div>

            <div class="row gy-4 justify-content-center">

                <div class="col-12 col-lg-7">
                    <div class="checkout-wrapper">
                        <h4 class="fw-bold mb-4"><i class="fa-solid fa-box-open me-2"></i> আপনার অফার চেক করুন</h4>

                        <?php if($products->count() > 1): ?>
                        <div class="mb-4">
                            <p class="pp-hint">
                                <i class="fa-solid fa-hand-pointer"></i> নিচের বক্সে টিক (✓) দিয়ে পণ্য নির্বাচন করুন
                            </p>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    // Safe to lazy-load here even if the controller didn't eager-load it.
                                    $product->loadMissing(['variantPrices.color', 'variantPrices.size']);
                                    $productColors = $product->variantPrices->pluck('color')->unique('id')->filter()->values();
                                    $productSizes  = $product->variantPrices->pluck('size')->unique('id')->filter()->values();
                                    $hasVariant    = $productColors->count() > 0 || $productSizes->count() > 0;
                                    $existingRow   = Cart::instance('shopping')->content()->where('id', $product->id)->first();
                                    $isInCart      = (bool) $existingRow;
                                    $currentColor  = $existingRow->options->product_color ?? null;
                                    $currentSize   = $existingRow->options->product_size ?? null;
                                ?>
                                <div class="pp-row <?php echo e($isInCart ? 'checked' : ''); ?>" data-product-id="<?php echo e($product->id); ?>" data-has-variant="<?php echo e($hasVariant ? 1 : 0); ?>">
                                    <label class="pp-row__main" for="product_<?php echo e($product->id); ?>">
                                        <span class="pp-checkbox-wrap">
                                            <input type="checkbox" id="product_<?php echo e($product->id); ?>" class="pp-checkbox" data-id="<?php echo e($product->id); ?>" <?php echo e($isInCart ? 'checked' : ''); ?>>
                                            <span class="pp-check-visual">
                                                <svg viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                            </span>
                                        </span>
                                        <img src="<?php echo e(asset($product->image->image)); ?>" class="pp-thumb" alt="">
                                        <span class="pp-info">
                                            <span class="pp-name"><?php echo e($product->name); ?></span>
                                            <span class="pp-price">
                                                <span class="new">৳<?php echo e($product->new_price); ?></span>
                                                <?php if($product->old_price): ?><del class="old">৳<?php echo e($product->old_price); ?></del><?php endif; ?>
                                            </span>
                                        </span>
                                    </label>

                                    <?php if($hasVariant): ?>
                                    <div class="pp-variants">
                                        <?php if($productColors->count()): ?>
                                        <div class="pp-variant-group">
                                            <span class="pp-variant-label">কালার:</span>
                                            <?php $__currentLoopData = $productColors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $color): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label class="pp-swatch">
                                                <input type="radio" name="pp_color_<?php echo e($product->id); ?>" value="<?php echo e($color->id); ?>" class="pp-color-radio" data-product="<?php echo e($product->id); ?>" <?php echo e((string)$currentColor === (string)$color->id ? 'checked' : ''); ?>>
                                                <span class="pp-swatch-btn">
                                                    <span class="pp-swatch-dot" style="background: <?php echo e($color->color ?? '#ccc'); ?>;"></span>
                                                    <?php echo e($color->name ?? $color->colorName ?? 'কালার'); ?>

                                                </span>
                                            </label>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <?php endif; ?>
                                        <?php if($productSizes->count()): ?>
                                        <div class="pp-variant-group">
                                            <span class="pp-variant-label">সাইজ:</span>
                                            <?php $__currentLoopData = $productSizes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $size): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <label class="pp-pill">
                                                <input type="radio" name="pp_size_<?php echo e($product->id); ?>" value="<?php echo e($size->id); ?>" class="pp-size-radio" data-product="<?php echo e($product->id); ?>" <?php echo e((string)$currentSize === (string)$size->id ? 'checked' : ''); ?>>
                                                <span><?php echo e($size->sizeName ?? $size->name); ?></span>
                                            </label>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <?php endif; ?>
                                        <div class="pp-variant-warning d-none" id="ppWarning_<?php echo e($product->id); ?>">
                                            এই পণ্যটি যোগ করতে উপরের অপশন থেকে নির্বাচন করন
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <?php endif; ?>

                        <div class="cartlist table-responsive rounded-custom border">
                            <?php echo $__env->make('frontEnd.partials.cart_table', [
                                'grandSubtotal' => $grandSubtotal,
                                'shipping'      => $shipping,
                                'grandTotal'    => $grandTotal,
                            ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>

                        <div class="text-center mt-3">
                            <span class="trust-badge border-0">
                                <i class="fa-solid fa-money-bill-wave"></i> ১০০% ক্যাশ অন ডেলিভারি 
                            </span>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-lg-5">
                    <div class="checkout-wrapper">
                        <h4 class="fw-bold mb-4 border-bottom pb-2"><i class="fa-solid fa-map-location-dot me-2"></i> ডেলিভারির  জন্য ঠিকানা দিন</h4>

                        <form action="<?php echo e(route('customer.ordersave')); ?>" method="POST" data-parsley-validate="">
                            <?php echo csrf_field(); ?>
                            <div class="form-group mb-3">
                                <label for="name" class="fw-bold mb-1">আপনার নাম  <span class="text-danger">*</span></label>
                                <input type="text" id="name" class="form-control shadow-sm <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" placeholder="উদাঃ মোঃ রিম" required>
                                <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><strong><?php echo e($message); ?></strong></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group mb-3">
                                <label for="phone" class="fw-bold mb-1">মোবাইল নাম্বার <span class="text-danger">*</span></label>
                                <div class="input-group shadow-sm">
                                    <span class="input-group-text bg-light text-muted">+88</span>
                                    <input type="number" minlength="11" maxlength="11" pattern="0[0-9]+" id="phone" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="phone" value="<?php echo e(old('phone')); ?>" placeholder="01XXXXXXXXX" required>
                                </div>
                                <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="text-danger small mt-1 d-block"><strong><?php echo e($message); ?></strong></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group mb-3">
                                <label for="area" class="fw-bold mb-1">এরিয়া নির্বাচন করুন <span class="text-danger">*</span></label>
                                <select id="area" class="form-select shadow-sm <?php $__errorArgs = ['area'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="area" required>
                                    <option value="" disabled selected>-- আপার এরিয়া সিলেক্ট করুন --</option>
                                    <?php $__currentLoopData = $shippingcharge; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php $__errorArgs = ['area'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><strong><?php echo e($message); ?></strong></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group mb-4">
                                <label for="address" class="fw-bold mb-1"> সম্পূর্ণ ঠিকানা <span class="text-danger">*</span></label>
                                <textarea id="address" class="form-control shadow-sm <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" placeholder="বাসা  নং, রাস্তা নং, গ্রাম/মহল্লা , থানা" name="address" rows="2" required><?php echo e(old('address')); ?></textarea>
                                <?php $__errorArgs = ['address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><span class="invalid-feedback"><strong><?php echo e($message); ?></strong></span><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <button class="btn cta-btn-primary w-100 justify-content-center py-3 shadow border-0" type="submit" style="font-size: 1.2rem;">
                                    <i class="fa-solid fa-check-circle"></i> অর্ডার কনফার্ম করুন
                                </button>
                            </div>
                        </form>

                        <?php if($campaign_data->billing_details): ?>
                        <div class="mt-4 text-center small text-muted bg-light p-2 rounded-custom">
                            <?php echo $campaign_data->billing_details; ?>

                        </div>
                        <?php endif; ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 text-center">
                    <div class="contact-card p-4">
                        <h3 class="fw-bold mb-3">তথ্যের জন্য যোগাযোগ করুন</h3>
                        <h2 class="phone-number fw-bold mb-4"><?php echo e($contact->phone); ?></h2>
                        <div class="row justify-content-center gy-3">
                            <div class="col-12 col-md-6">
                                <a href="tel:<?php echo e($contact->phone); ?>" class="btn btn-call w-100 py-3 fs-5 shadow-sm">
                                    <i class="fa-solid fa-phone-volume me-2"></i> সরাসরি কল করুন 
                                </a>
                            </div>
                            <div class="col-12 col-md-6">
                                <a href="https://wa.me/<?php echo e($contact->whatsapp); ?>" class="btn btn-whatsapp w-100 py-3 fs-5 shadow-sm">
                                    <i class="fa-brands fa-whatsapp me-2"></i> হোয়াটস্যাপে ম্যাসেজ দিন
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php if($campaign_data->heading_4): ?>
                    <div class="mt-4 p-3 bg-white rounded-custom shadow-sm">
                        <h4 class="fw-bold m-0"><?php echo $campaign_data->heading_4; ?></h4>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    
    <div class="sticky-mobile-cta d-flex d-lg-none">
        <a href="#order_form" class="cta-btn-primary">
            <i class="fa-solid fa-cart-shopping"></i> অর্ডার করুন
        </a>
        <div class="sticky-cart-amount" onclick="document.getElementById('order_form').scrollIntoView({behavior:'smooth'});">
            <small id="stickyCartCount"><?php echo e(Cart::instance('shopping')->count()); ?> পণ্য</small>
            <strong id="stickyCartTotal">৳ <?php echo e($grandTotal); ?></strong>
        </div>
    </div>

    <script src="<?php echo e(asset('public/frontEnd/campaign/js')); ?>/jquery-2.1.4.min.js"></script>
    <script src="<?php echo e(asset('public/frontEnd/campaign/js')); ?>/all.js"></script>
    <script src="<?php echo e(asset('public/frontEnd/campaign/js')); ?>/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('public/frontEnd/campaign/js')); ?>/owl.carousel.min.js"></script>
    <script src="<?php echo e(asset('public/frontEnd/campaign/js')); ?>/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            $('.select2').select2();

            $('.review_slider').owlCarousel({
                dots: true, arrow: false, autoplay: true, loop: true, margin: 15,
                smartSpeed: 800, mouseDrag: true, touchDrag: true,
                responsive: { 0: { items: 2 }, 576: { items: 3 }, 768: { items: 4 }, 992: { items: 5 } }
            });

            $('.campro_img_slider').owlCarousel({
                dots: true, arrow: false, autoplay: true, loop: true, margin: 15,
                smartSpeed: 800, mouseDrag: true, touchDrag: true,
                responsive: { 0: { items: 1 }, 576: { items: 2 }, 992: { items: 3 } }
            });

            syncStickyCart();
        });

        // Keep the sticky bottom bar's total + item count in sync with
        // whatever the cart partial just rendered.
        function syncStickyCart() {
            var totalText = $('.cartlist #grand_total strong').first().text().trim();
            var qty = 0;
            $('.cartlist .qty-input-group input').each(function () {
                qty += parseInt($(this).val(), 10) || 0;
            });
            if (totalText) { $('#stickyCartTotal').text('৳ ' + totalText); }
            $('#stickyCartCount').text(qty + ' পণ্য');
        }

        /* =========================================================
           RACE-CONDITION GUARD
           Every action that mutates the cart (checkbox toggle, variant
           change, qty +/-, remove, shipping change) goes through this
           ONE function. Each call gets a rising sequence number; if a
           newer call has already been fired by the time an older one's
           response comes back, that stale response is discarded instead
           of overwriting the table. This is what was causing "I selected
           a second product but it never showed up" — two quick clicks
           fired two requests, and the slower-arriving (older) response
           was winning and blanking out the newer selection.
           ========================================================= */
        /* =========================================================
           CART REQUEST QUEUE
           Every action that mutates the cart (checkbox toggle, variant
           change, qty +/-, remove, shipping) goes through this ONE
           function. Instead of firing requests in parallel and guessing
           which response is "newest" (which can still pick the wrong
           one if requests finish out of order), each call now WAITS
           for the previous one to fully complete before it is sent.
           This guarantees requests execute in the exact order the
           customer clicked, and every render is the true, complete
           cart state — fixing "I selected 3 products but only 1 shows,
           and the price doesn't update."
           ========================================================= */
        var __cartQueue = [];
        var __cartBusy  = false;
        function cartAjax(url, data) {
            __cartQueue.push({ url: url, data: data });
            __cartProcessQueue();
        }
        function __cartProcessQueue() {
            if (__cartBusy || __cartQueue.length === 0) return;
            __cartBusy = true;
            var next = __cartQueue.shift();
            $.ajax({
                type: "GET", data: next.data, url: next.url,
                success: function (response) {
                    if (response) {
                        $(".cartlist").html(response);
                        syncStickyCart();
                    }
                },
                complete: function () {
                    __cartBusy = false;
                    __cartProcessQueue();
                }
            });
        }

        // AJAX - Shipping Charge Calculation
        $("#area").on("change", function () {
            cartAjax("<?php echo e(route('shipping.charge')); ?>", { id: $(this).val() });
        });

        /* =========================================================
           All cart AJAX handlers bound EXACTLY ONCE via
           window.__cartHandlersBound to prevent duplicate clicks.
           ========================================================= */
        if (!window.__cartHandlersBound) {
            window.__cartHandlersBound = true;

            $(document).on("click", ".cart_remove", function (e) {
                e.preventDefault();
                var id = $(this).data("id");
                if (!id) return;
                cartAjax("<?php echo e(route('cart.remove')); ?>", { id: id });
            });

            $(document).on("click", ".cart_increment", function (e) {
                e.preventDefault();
                var id = $(this).data("id");
                if (!id) return;
                cartAjax("<?php echo e(route('cart.increment')); ?>", { id: id });
            });

            $(document).on("click", ".cart_decrement", function (e) {
                e.preventDefault();
                var id = $(this).data("id");
                if (!id) return;
                cartAjax("<?php echo e(route('cart.decrement')); ?>", { id: id });
            });

            $(document).on('change', '.cart-size-selector', function () {
                var rowId = $(this).data('id');
                if (!rowId) return;
                cartAjax("<?php echo e(route('cart.update')); ?>", { id: rowId, product_size: $(this).val() });
            });

            $(document).on('change', '.cart-color-selector', function () {
                var rowId = $(this).data('id');
                if (!rowId) return;
                cartAjax("<?php echo e(route('cart.update')); ?>", { id: rowId, product_color: $(this).val() });
            });
        }

        // ---------- Product picker: checkbox list + optional variants ----------
        function ppGetSelection(productId) {
            return {
                color: $("input[name='pp_color_" + productId + "']:checked").val() || '',
                size:  $("input[name='pp_size_" + productId + "']:checked").val() || ''
            };
        }

        function ppSendChange(productId, action) {
            var sel = ppGetSelection(productId);
            cartAjax("<?php echo e(route('cart.changeProduct')); ?>", {
                id: productId, action: action,
                product_color: sel.color, product_size: sel.size
            });
        }

        $(document).on('change', '.pp-checkbox', function () {
            var $checkbox  = $(this);
            var productId  = $checkbox.data('id');
            var $row       = $checkbox.closest('.pp-row');
            var isChecked  = $checkbox.is(':checked');
            var hasVariant = $row.data('has-variant') == 1;

            if (isChecked && hasVariant) {
                var sel = ppGetSelection(productId);
                var needsColor = $row.find('.pp-color-radio').length > 0;
                var needsSize  = $row.find('.pp-size-radio').length > 0;
                if ((needsColor && !sel.color) || (needsSize && !sel.size)) {
                    $checkbox.prop('checked', false);
                    $('#ppWarning_' + productId).removeClass('d-none');
                    return;
                }
            }

            $('#ppWarning_' + productId).addClass('d-none');
            $row.toggleClass('checked', isChecked);
            ppSendChange(productId, isChecked ? 'add' : 'remove');
        });

        // Changing color/size after the box is already checked updates
        // the price/options on the row already in the cart.
        $(document).on('change', '.pp-color-radio, .pp-size-radio', function () {
            var productId = $(this).data('product');
            var $row = $(this).closest('.pp-row');
            $('#ppWarning_' + productId).addClass('d-none');
            if ($row.find('.pp-checkbox').is(':checked')) {
                ppSendChange(productId, 'add');
            }
        });

        // Countdown Logic
        const deadline = new Date("<?php echo e($campaign_data->deadline); ?>").getTime();
        const x = setInterval(function () {
            const now = new Date().getTime();
            const distance = deadline - now;

            if (distance > 0) {
                document.getElementById("days").innerHTML = Math.floor(distance / (1000 * 60 * 60 * 24)).toString().padStart(2, '0');
                document.getElementById("hours").innerHTML = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60)).toString().padStart(2, '0');
                document.getElementById("minutes").innerHTML = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60)).toString().padStart(2, '0');
                document.getElementById("seconds").innerHTML = Math.floor((distance % (1000 * 60)) / 1000).toString().padStart(2, '0');
            } else {
                clearInterval(x);
                document.getElementById("countdown").innerHTML = "<h5 class='text-warning m-0'>অফার শেষ!</h5>";
            }
        }, 1000);

        // GTM DataLayer
        window.dataLayer = window.dataLayer || [];
        dataLayer.push({
            'event': 'landingPageView',
            'url': '<?php echo e(request()->fullUrl()); ?>'
        });
    </script>
</body>
</html>
<?php /**PATH /home/martmama.com/public_html/resources/views/frontEnd/layouts/pages/campaign/campaign.blade.php ENDPATH**/ ?>