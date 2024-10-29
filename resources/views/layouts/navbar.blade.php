<section class="main-page" id="main-page">
    <div class="container-fluid position-relative" style="z-index: 1;">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent border-bottom p-0">
            <div class="container">
                <span class="navbar-brand p-0 m-0">
                    <img src="{{ asset('images/logo_alamaya.png') }}" height="30" style="margin: 35px 0px;">
                </span>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <b><a class="nav-link" href="{{ url('homepage') }}">Client</a></b>
                        </li>
                        <li class="nav-item">
                            <b><a class="nav-link" href="{{ url('alamayaprojectpage') }}">Project</a></b>
                        </li>
                        <li class="nav-item">
                            <b><a class="nav-link" href="{{ url('domainpage') }}">Domain</a></b>
                        </li>
                        <li class="nav-item">
                            <b><a class="nav-link" href="{{ url('alamayateamspage') }}">Teams</a></b>
                        </li>
                    </ul>
                    <ul class="navbar-nav align-items-center" style="margin-left: -8%;">
                        <li class="nav-item bullet-none mx-2">
                            <i class="clock text-light" id="clock"></i>
                        </li>

                        <li class="nav-item bullet-none mx-3">
                            <div style="position: relative; display: inline-block;">
                                <a href="#" id="button_notif" style="font-size: 24px;"
                                    onclick="tampil_isi_notif(); return false;">
                                    <i class="fa-regular fa-bell text-light"></i>
                                </a>
                                <span id="notif_count" class="notif-badge"
                                    style="position: absolute; top: -5px; right: -20px; background-color: red; color: white; border: 1px solid white; border-radius: 50%; padding: 2px 4px; font-size: 10px;">
                                    18
                                </span>
                                <!-- Dropdown Menu untuk Notifikasi -->
                                <ul id="notifDropdown" class="dropdown-menu dropdown-menu-end"
                                    style="display: none; position: absolute; background: white; border: 1px solid #ccc; border-radius: 5px; padding: 10px; z-index: 1000;     top: 70px;
    right: 0px;">
                                    <li>
                                        <p class="text-muted" style="margin-left: 15px; font-size: small;">Notifikasi
                                        </p>
                                    </li>
                                    @foreach ($clients as $client)
                                        <li id="">
                                            {{ $client->client_name }}
                                        </li> <!-- Tempat untuk menampilkan isi notifikasi -->
                                    @endforeach
                                </ul>
                            </div>
                        </li>


                        <script>
                            function tampil_button_notif() {
                                // Data dummy untuk jumlah notifikasi
                                const data = {
                                    jumlah_total: 18
                                };

                                // Update jumlah notifikasi
                                $("#notif_count").text(data.jumlah_total);
                            }

                            function tampil_isi_notif() {
                                // Data dummy untuk isi notifikasi
                                const notifikasi = [
                                    'Notifikasi 1: Pesan baru diterima.',
                                    'Notifikasi 2: Tugas selesai.',
                                    'Notifikasi 3: Pembaruan tersedia.'
                                ];

                                // Mengisi isi notifikasi ke dalam dropdown
                                let html = '';
                                notifikasi.forEach(function(notif) {
                                    html += `<li>${notif}</li>`;
                                });

                                // Update dropdown dengan isi notifikasi
                                $('#notifList').html(html);

                                // Tampilkan atau sembunyikan dropdown
                                $('#notifDropdown').toggle(); // Menampilkan atau menyembunyikan dropdown
                            }

                            $(document).ready(function() {
                                tampil_button_notif();

                                // Menyembunyikan dropdown ketika mengklik di luar
                                $(document).click(function(e) {
                                    const target = $(e.target);
                                    if (!target.closest('#button_notif').length && !target.closest('#notifDropdown').length) {
                                        $('#notifDropdown').hide(); // Sembunyikan dropdown jika klik di luar
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
                                <img src="{{ asset('images/foto_Rena.jpg') }}" alt="User Image"
                                    class="user-photo img-fluid" style="cursor: pointer;">
                            </li>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                            style="top: 150%;">
                            <li class="user-info text-center">
                                <img src="{{ asset('images/foto_Rena.jpg') }}" alt="Profile Picture"
                                    class="profile-picture">
                                <h6>{{ Auth::user()->name }}</h6> {{-- Nama user --}}
                                <p class="email">{{ Auth::user()->email }}</p> {{-- Email user --}}
                                <span class="badge bg-secondary">{{ Auth::user()->role ?? 'User' }}</span>
                                {{-- Role
                                user --}}
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            @if (Auth::user()->role === 'admin')
                                <li><a class="dropdown-item" href="{{ route('account.management') }}"><i
                                            class="bi bi-person"></i>Account</a></li>
                                <li><a class="dropdown-item" href="{{ route('admin.add-account-form') }}"><i
                                            class="bi bi-person-plus"></i> Add Account</a></li>
                            @endif

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); sessionStorage.removeItem('hasAnimated'); document.getElementById('logout-form').submit();"></i>
                                        Log out
                                    </button>
                                </form>
                            </li>
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
