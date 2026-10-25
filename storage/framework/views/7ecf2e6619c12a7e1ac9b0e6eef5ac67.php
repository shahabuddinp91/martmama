<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <link rel="shortcut icon" href="<?php echo e(asset($generalsetting->favicon)); ?>" />
    <title>Admin Login | <?php echo e($generalsetting->name); ?></title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/assets_login/css/vendors.css">
    <link rel="stylesheet" href="<?php echo e(asset('public/backEnd/')); ?>/assets_login/css/aiz-core.css">

    <style>
        body, html { height: 100%; margin: 0; font-family: 'Inter', sans-serif; }
        
        .login-page-container {
            background: linear-gradient(rgba(0, 77, 57, 0.85), rgba(0, 50, 40, 0.9)), 
                        url('<?php echo e(asset("public/backEnd/assets_login/img/background.jpg")); ?>');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
        }

        .login-card {
            background: #ffffff;
            width: 100%;
            max-width: 400px; /* Limits width so it doesn't look weird on desktop */
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            padding: 40px 30px;
            border: none;
        }

        .logo-section img { max-height: 60px; margin-bottom: 20px; }
        
        .form-group label { font-weight: 600; font-size: 13px; color: #4b5563; }
        
        .custom-input {
            background: #f9fafb !important;
            border: 1.5px solid #e5e7eb !important;
            border-radius: 12px !important;
            height: 50px !important;
            padding-left: 45px !important;
            transition: 0.2s;
        }

        .custom-input:focus {
            border-color: #006a4e !important;
            background: #fff !important;
            box-shadow: 0 0 0 4px rgba(0, 106, 78, 0.1) !important;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 18px;
        }

        .btn-access {
            background: #006a4e;
            color: white;
            border: none;
            height: 55px;
            border-radius: 12px;
            font-weight: 700;
            width: 100%;
            margin-top: 10px;
            box-shadow: 0 10px 15px -3px rgba(0, 106, 78, 0.3);
        }

        .btn-access:hover { background: #004d39; transform: translateY(-1px); }

        .demo-box {
            background: #fff5f5;
            border: 1px dashed #f42a41;
            border-radius: 16px;
            padding: 15px;
            margin-top: 30px;
        }

        /* Fix for AIZ checkbox colors */
        .aiz-checkbox [type="checkbox"]:checked + span + .aiz-square-check { background-color: #006a4e !important; }
    </style>
</head>
<body>

<div class="login-page-container">
    <div class="login-card">
        <div class="logo-section text-center">
            <img src="<?php echo e(asset($generalsetting->dark_logo)); ?>" alt="Logo">
            <h2 class="h5 fw-700 text-dark">Portal Dashboard</h2>
            <p class="text-muted small">Access management console</p>
        </div>

        <form method="POST" action="<?php echo e(route('login')); ?>" class="mt-4">
            <?php echo csrf_field(); ?>
            <div class="form-group mb-3 position-relative">
                <i class="bi bi-envelope-at input-icon"></i>
                <input type="email" name="email" id="email" class="form-control custom-input" placeholder="Email Address" required>
            </div>

            <div class="form-group mb-3 position-relative">
                <i class="bi bi-lock input-icon"></i>
                <input type="password" name="password" id="password" class="form-control custom-input" placeholder="Password" required>
            </div>

            <div class="d-flex justify-content-between mb-4">
                <label class="aiz-checkbox">
                    <input type="checkbox" name="remember">
                    <span class="fs-12 text-muted">Remember</span>
                    <span class="aiz-square-check"></span>
                </label>
                <a href="<?php echo e(route('admin.password.request')); ?>" class="fs-12 fw-600 text-danger text-decoration-none">Reset Password</a>
            </div>

            <button type="submit" class="btn btn-access">LOG IN</button>
        </form>

        <?php if(isset($demoMode) && $demoMode): ?>
        <div class="demo-box d-flex align-items-center justify-content-between">
            <div>
                <span class="d-block fw-700 fs-11 text-danger">DEMO ACCESS</span>
                <span class="text-muted fs-10">info@uddoktaresheba.com.bd</span>
            </div>
            <button onclick="fillDemo()" class="btn btn-sm btn-danger px-3 fw-700 rounded-pill">FILL</button>
        </div>
        <?php endif; ?>
    </div>
</div>

<script>
    function fillDemo() {
        document.getElementById('email').value = "info@uddoktaresheba.com.bd";
        document.getElementById('password').value = "12345678";
    }
</script>

</body>
</html><?php /**PATH /home/martmama.com/public_html/resources/views/backEnd/auth/login.blade.php ENDPATH**/ ?>