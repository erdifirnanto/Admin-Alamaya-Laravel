<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Forgot Password</title>
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
                        <form method="POST" action="{{ route('password.email') }}" style="width: 21rem;">
                            @csrf

                            <!-- Teks pengantar -->
                            <div class="mb-3" style="text-align: left;">
                                <h4><strong>Forgot your Password?</strong></h4>
                                <p>Enter your email and we will send you a link to get your password back.</p>
                            </div>

                            <!-- Input email -->
                            <div class="mb-3">
                                <label for="email" class="form-label"><strong>Email</strong></label>
                                <input style="height: 55px; font-weight: bold;" type="email" name="email" class="form-control"
                                    id="email" aria-describedby="emailHelp" placeholder="Email" required>
                                <div id="emailHelp" class="form-text"></div>
                            </div>

                            <!-- Bagian untuk pesan kesalahan dan status -->
                            @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                            @endif

                            @if ($errors->any())
                            <div class="mb-4 font-medium text-sm text-red-600" style="color: red;">
                                <ul class="list-none text-red-600">
                                    @foreach ($errors->all() as $error)
                                    <span>{{ $error }}</span>
                                    @endforeach
                                </ul>
                            </div>

                            @endif

                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ url()->previous() }}" style="width: 45%; height: 20%;" class="btn btn-outline-dark">Back</a>
                                <button type="submit" style="width: 45%; height: 20%;" class="btn btn-dark">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-sm-7 px-0 d-none d-sm-block">
                    <img src="{{ asset('images/forgotpassword_image2.jpeg') }}" alt="Forgot Password image" class="w-100 vh-100"
                        style="object-fit: cover; object-position: right;">
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>