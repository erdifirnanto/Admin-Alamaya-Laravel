<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body style="background-color: #f8f9fa;">

    <!-- Navbar -->
    <div class="container-fluid bg-white shadow-sm">
        <div class="container">
            <div class="row">
                <nav class="navbar navbar-light p-3">
                    <a class="navbar-brand d-flex align-items-center" href="#">
                        <img src="images/logo_alamaya.png" alt="Logo"
                            style="width: 90px; height: 30px; margin-right: 10px;">
                        <span style="margin-left: 35px; font-size: 15px;">Dashboard</span>
                    </a>
                    <span class="navbar-text dropdown-toggle" id="profileDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">ini isi nama admin</span>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li>
                            <p class="text-muted" style="margin-left: 15px; font-size: small;">Manage Account</p>
                        </li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </nav>

                <!-- Garis pemisah antara Update Password dan Two Factor Authentication -->
                <hr>

                <header>
                    <div style="margin: 20px 5px;">
                        <h4>Profile</h4>
                    </div>
                </header>
            </div>
        </div>
    </div>

    <!-- Profile Section -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <h5 class="fw-bold">Profile Information</h5>
                <p class="text-muted">Update your account's profile information and email address.</p>
            </div>
            <div class="col-md-8">
                <div class="card shadow-sm mt-3 p-4">
                    <!-- Profile Information -->
                    <div class="mb-4">
                        <form>
                            <div class="col-md-12 mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" value="ini isi nama admin">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" value="admin@alamaya.com">
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-dark">SAVE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Garis pemisah antara Update Password dan Two Factor Authentication -->
    <hr class="my-5">

    <!-- Update Password -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <h5 class="fw-bold">Update Password</h5>
                <p class="text-muted">Ensure your account is using a long, random password to stay
                    secure.
                </p>
            </div>
            <div class="col-md-8">
                <div class="card shadow-sm mt-3 p-4">
                    <div class="mb-4">
                        <form>
                            <div class="col-md-12 mb-3">
                                <label for="current-password" class="form-label">Current Password</label>
                                <input type="password" class="form-control" id="current-password">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="new-password" class="form-label">New Password</label>
                                <input type="password" class="form-control" id="new-password">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="confirm-password" class="form-label">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm-password">
                            </div>
                            <div class="text-end">
                                <button type="submit" class="btn btn-dark">SAVE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Garis pemisah antara Update Password dan Two Factor Authentication -->
    <hr class="my-5">

    <!-- Two Factor Authentication -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <h5 class="fw-bold">Two Factor Authentication</h5>
                <p class="text-muted">Add additional security to your account using two factor authentication.
                </p>
            </div>
            <div class="col-md-8">
                <div class="card shadow-sm mt-3 p-4">
                    <div class="mb-4">
                        <form>
                            <h5 class="fw-bold">You have not enabled two factor authentication.</h5>
                            <p class="text-muted" style="text-align: justify;">When two factor authentication is
                                enabled, you will be prompted for a
                                secure, random token during authentication. You may retrieve this token your phone's
                                Google Authentication application.
                            <div class="text-start">
                                <button type="submit" class="btn btn-dark">ENABLE</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Garis pemisah antara Update Password dan Two Factor Authentication -->
    <hr class="my-5">

    <!-- Browser Sessions -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <h5 class="fw-bold">Browser Sessions</h5>
                <p class="text-muted">Manage and log out your active sessions on other browsers and devices.
                </p>
            </div>
            <div class="col-md-8">
                <div class="card shadow-sm mt-3 p-4">
                    <div class="mb-4">
                        <form>
                            <p class="text-muted" style="text-align: justify;">
                                If necessary, you may log out all of your other browser sessions across all of your
                                devices. Some of your recent
                                sessions are listed below; however, this list may not be exhaustive. If you feel your
                                account has been
                                compromised, you should also update your password.
                            </p>

                            <div style="display: flex; align-items: center; margin-bottom: 5px;">
                                <i class="fa fa-desktop text-dark" style="margin-right: 15px; font-size: 30px;"></i>
                                <!-- Ikon komputer -->
                                <div>
                                    Windows-Chrome
                                    <div>
                                        <span class="text-muted">127.0.0.1</span>, <span style="color: green;">This
                                            device</span>
                                    </div>
                                </div>
                            </div>



                            <div class="text-start mt-4">
                                <button type="submit" class="btn btn-dark">LOG OUT OTHER BROWSER SESSIONS</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Garis pemisah antara Update Password dan Two Factor Authentication -->
    <hr class="my-5">

    <!-- Delete Account -->
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-4">
                <h5 class="fw-bold">Delete Account</h5>
                <p class="text-muted">Permanently delete your account.
                </p>
            </div>
            <div class="col-md-8">
                <div class="card shadow-sm mt-3 p-4">
                    <div class="mb-4">
                        <form>
                            <p class="text-muted" style="text-align: justify;">Once your account is deleted, all of
                                its
                                resources and data will be permanently deleted. Before deleting your account, please
                                download any data or information that you wish to retain.
                            <div class="text-start mt-4">
                                <button type="submit" class="btn btn-danger">DELETE ACCOUNT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
