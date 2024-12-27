<style>
    /* Responsif untuk Navbar pada ukuran layar iPad Air */
    @media (min-width: 768px) and (max-width: 1024px) {
        .navbar {
            padding: 10px 15px;
            /* Menambah jarak padding pada navbar */
        }

        .navbar-brand img {
            height: 25px;
            /* Menyesuaikan ukuran logo */
        }

        .navbar-toggler {
            margin-top: 10px;
            /* Menambahkan jarak antara toggler dan navbar */
        }

        .navbar-nav {
            margin-left: 0;
            /* Menghilangkan margin kiri pada navbar */
        }

        .navbar-nav .nav-item {
            margin-right: 10px;
            /* Memberi jarak antar item navbar */
        }

        .nav-link {
            font-size: 14px;
            /* Menyesuaikan ukuran font untuk tampilan di layar lebih kecil */
        }

        .user-icon {
            width: 35px;
            height: 35px;
        }

        .user-photo {
            width: 30px;
            height: 30px;
        }

        /* Menyesuaikan tampilan dropdown menu */
        .dropdown-menu {
            top: 50px;
            /* Sesuaikan dengan posisi dropdown pada perangkat */
        }

        .notif-badge {
            font-size: 9px;
            padding: 3px 5px;
        }

        .clock {
            font-size: 16px;
            /* Ukuran font jam pada navbar */
        }
    }
</style>

<section class="main-page" id="main-page">
    <div class="container-fluid position-relative" style="z-index: 1;">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent border-bottom p-0">
            <div class="container">
                <span class="navbar-brand p-0 m-0">
                    <a href="/"><img src="{{ asset('images/logo_alamaya.png') }}" height="30"
                            style="margin: 35px 0px;"></a>
                </span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <b><a class="nav-link" href="/">Project</a></b>
                        </li>
                        {{-- <li class="nav-item">
                            <b><a class="nav-link" href="{{ route('project.view') }}">Project</a></b>
                        </li> --}}
                        <li class="nav-item">
                            <b><a class="nav-link" href="{{ route('domain.view') }}">Domain</a></b>
                        </li>
                        <li class="nav-item">
                            <b><a class="nav-link" href="{{ route('hosting.view') }}">Hosting</a></b>
                        </li>
                        <li class="nav-item">
                            <b><a class="nav-link" href="{{ route('team.view') }}">Teams</a></b>
                        </li>
                    </ul>
                    <ul class="navbar-nav align-items-center" style="margin-left: -8%;">
                        <li class="nav-item bullet-none mx-2">
                            <i class="clock text-light" id="clock"></i>
                        </li>
                        {{-- Notifikasi --}}
                        <li class="nav-item bullet-none mx-3">
                            <div style="position: relative; display: inline-block;">
                                <a href="#" id="button_notif" style="font-size: 24px;">
                                    <i class="fa-regular fa-bell text-light"></i>
                                </a>
                                <span id="notif_count" class="notif-badge"
                                    style="position: absolute; top: -5px; right: -20px; background-color: red; color: white; border: 1px solid white; border-radius: 50%; padding: 2px 4px; font-size: 10px;">
                                    0
                                </span>
                                <!-- Dropdown Menu untuk Notifikasi -->
                                <ul id="notifDropdown" class="dropdown-menu dropdown-menu-end"
                                    style="overflow: auto; max-height: 300px; display: none; position: absolute; background: white; border: 1px solid #ccc; border-radius: 5px; padding: 10px; z-index: 1000; top: 70px; right: 0px;">
                                    <li>
                                        <p class="text-muted" style="margin-left: 15px; font-size: medium;">Notifikasi
                                        </p>
                                    </li>
                                    <div id="notifList">
                                        <!-- Tempat untuk menampilkan isi notifikasi -->
                                    </div>
                                </ul>
                            </div>
                        </li>

                        {{-- NOtifikasi v2 --}}
                        <script>
                            // Simulasi data notifikasi dari controller
                            const notifications = @json($notifications ?? ['Domain A kedaluwarsa dalam 2 hari', 'Domain B kedaluwarsa besok']);

                            // Fungsi untuk menampilkan jumlah notifikasi di tombol
                            function tampil_button_notif(jumlahNotifikasi) {
                                $("#notif_count").text(jumlahNotifikasi);
                            }

                            // Fungsi untuk menampilkan isi daftar notifikasi
                            function tampil_isi_notif(notifikasi) {
                                let html = '';

                                if (notifikasi.length > 0) {
                                    notifikasi.forEach(notification => {
                                        html += `
                        <div class="alert alert-info" style=" font-size: small; padding: 5px 15px; margin: 5px 0px;">
                            <span class="glyphicon glyphicon-info-sign"></span>
                            ${notification}
                        </div>
                    `;
                                    });
                                } else {
                                    html = `
                    <div class="alert alert-success">
                        <span class="glyphicon glyphicon-ok-circle"></span>
                        Tidak ada notifikasi.
                    </div>
                `;
                                }

                                $('#notifList').html(html);
                                $('#notifDropdown').toggle(); // Menampilkan atau menyembunyikan dropdown
                            }

                            $(document).ready(function() {
                                // Tampilkan jumlah notifikasi di tombol
                                tampil_button_notif(notifications.length);

                                // Ketika tombol notifikasi diklik
                                $('#button_notif').on('click', function(e) {
                                    e.preventDefault(); // Mencegah default behavior dari <a>
                                    tampil_isi_notif(notifications);
                                });

                                // Klik di luar dropdown untuk menutup
                                $(document).on('click', function(e) {
                                    const target = $(e.target);
                                    if (!target.closest('#button_notif').length && !target.closest('#notifDropdown').length) {
                                        $('#notifDropdown').hide();
                                    }
                                });
                            });
                        </script>

                        <li class="nav-item bullet-none mx-3">
                            <a href="{{ route('profile.show') }}" class="text-light">
                                <i class="fa-solid fa-gear"></i>
                            </a>
                        </li>
                    </ul>

                    <!-- User Dropdown Option -->
                    <div class="dropdown">
                        <button class="user-icon" id="dropdownMenuButton" data-bs-toggle="dropdown"
                            aria-expanded="false" style="border: none; background: none; padding: 0;">
                            <li class="d-flex justify-content-center align-items-center user-icon"
                                style="width: 40px; height: 40px; border: solid 1px; color: white; list-style: none;">
                                <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}"
                                    alt="{{ Auth::user()->name }}" class="user-photo img-fluid"
                                    style="cursor: pointer;">
                            </li>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                            style="top: 150%;">
                            <li class="user-info text-center">
                                <img src="{{ asset('storage/' . Auth::user()->profile_photo_path) }}"
                                    alt="{{ Auth::user()->name }}" class="profile-picture">
                                <h6>{{ Auth::user()->name }}</h6> {{-- Nama user --}}
                                <p class="email">{{ Auth::user()->email }}</p> {{-- Email user --}}
                                <span class="badge bg-secondary">{{ Auth::user()->role ?? 'User' }}</span>
                                {{-- Role user --}}
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            @if (Auth::user()->role === 'admin')
                                <li><a class="dropdown-item" href="{{ route('account.management') }}"><i
                                            class="bi bi-person"></i>Account</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.add-account-form') }}"><i
                                            class="bi bi-person-plus"></i> Add Account</a></li>
                                <li><a class="dropdown-item" href="{{ route('export.excel') }}"><i
                                            class="bi bi-file-earmark-excel"></i> Download Excel</a></li>
                            @endif

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger"
                                        onclick="return confirmLogout(event);">
                                        <i class="bi bi-box-arrow-right"></i>
                                        Log out
                                    </button>
                                </form>
                            </li>
                            <script>
                                function confirmLogout(event) {
                                    event.preventDefault(); // Mencegah form langsung terkirim

                                    if (confirm("Apakah Anda yakin ingin meninggalkan halaman ini?")) {
                                        // Jika pilih "Ya"
                                        sessionStorage.removeItem('hasAnimated');
                                        document.getElementById('logout-form').submit();
                                    }
                                    // Jika pilih "Tidak", tidak melakukan apa-apa (tetap di halaman)
                                }
                            </script>
                        </ul>
                    </div>

                </div>
            </div>
        </nav>
    </div>
</section>

{{--
<script>
    function tampil_button_notif() {
        $.ajax({
            url: "{{ url('alamaya_client/untuk_buttonnya') }}",
            method: 'post',
            headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },
            dataType: 'json',
            success: function (data) {
                $("#button_notif").val(data.jumlah_total);
                console.log(data.jumlah_total);
            }
        });
    }

    function tampil_isi_notif() {
        $.ajax({
            url: "{{ url('alamaya_client/untuk_isinya') }}",
            method: 'get',
            success: function (html) {
                $('#button_isi').html(html);
            }
        });
    }
</script> --}}
