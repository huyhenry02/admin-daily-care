<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Admin Daily Care - Đăng nhập</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .card {
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .card-body {
            padding: 2rem;
        }

        .form-control {
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
        }

        .form-control:focus {
            border-color: #80bdff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 0.375rem;
        }

        .btn-primary:hover {
            background-color: #0069d9;
        }

        .input-group-text {
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            background-color: #e9ecef;
        }

        .logo {
            max-width: 306px;
            margin-left: 108px;
            margin-bottom: 1rem;
        }

        .login-header {
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .login-header h1 {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .login-header p {
            font-size: 1rem;
            color: #6c757d;
        }
    </style>
</head>

<body>
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main" class="main">
    <div class="container py-5 py-sm-7">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <!-- Card -->
                <div class="card card-lg mb-5">
                    <div class="card-body">
                        <!-- Login Header -->
                        <div class="login-header">
                            <img src="/assets/img/kaiadmin/logo-v2.png" alt="Logo" class="logo">
                            <h1>Chào mừng đến với Admin Daily Care</h1>
                            <p>Vui lòng đăng nhập để tiếp tục quản lý hệ thống.</p>
                        </div>
                        <!-- End Login Header -->

                        <!-- Form -->
                        <form class="js-validate" action="{{ route('auth.post_login') }}" method="post">
                            @csrf
                            <div class="js-form-message form-group">
                                <label class="input-label" for="signinSrEmail">Email</label>
                                <input type="text" class="form-control form-control-lg" name="email" id="signinSrEmail" tabindex="1" placeholder="Nhập địa chỉ email">
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <label class="input-label" for="signupSrPassword" tabindex="0">
                                        <span class="d-flex justify-content-between align-items-center">
                                            Mật khẩu
                                        </span>
                                </label>

                                <div class="input-group input-group-merge">
                                    <input type="password" class="js-toggle-password form-control form-control-lg" name="password" id="signupSrPassword" placeholder="Nhập mật khẩu">
                                    <div id="changePassTarget" class="input-group-append">
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <button type="submit" class="btn btn-lg btn-block btn-primary">Đăng nhập</button>
                        </form>
                        <!-- End Form -->
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>
</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- Bootstrap JS and dependencies -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>

</html>
