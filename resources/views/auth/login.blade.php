<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <title>Alamaya Project - Login Page</title>
</head>

<body>
    <section class="vh-100">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="row w-100">
                <div class="col-sm-5 d-flex flex-column justify-content-center align-items-center">
                    <div class="px-5 ms-xl-4">
                        <span class="h1 fw-bold mb-0 d-flex justify-content-center">
                            <img src="{{ asset('images/logo_alamaya.png') }}" alt="logo" height="40px">
                        </span>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <form method="POST" action="{{ route('login') }}" style="width: 21rem;">
                            @csrf
                            <div class="mb-3">
                                <label for="email" class="form-label"><strong>Email</strong></label>
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter email" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                <div id="emailHelp" class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 position-relative">
                                <label for="password" class="form-label"><strong>Password</strong></label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required>
                                <i class="fas fa-eye position-absolute" id="togglePassword" style="top: 70%; right: 10px; cursor: pointer;"></i>
                                @error('password')
                                <div id="passwordHelp" class="form-text text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 d-flex justify-content-end">
                                <a href="{{ route('password.request') }}" class="text-decoration-none"><strong>Forgot Password?</strong></a>
                            </div>

                            <button type="submit" class="btn btn-dark col-12" style="height: 50px;">Login</button>
                        </form>
                    </div>
                </div>

                <div class="col-sm-7 px-0 d-none d-sm-block">
                    <img src="{{ asset('images/login_image1.png') }}" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>

    <script src="https://kit.fontawesome.com/19ad68a1da.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#togglePassword').click(function() {
                const passwordField = $('#password');
                if (passwordField.attr('type') === 'password') {
                    passwordField.attr('type', 'text');
                    $(this).removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    passwordField.attr('type', 'password');
                    $(this).removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });
        });
    </script>
</body>

</html>