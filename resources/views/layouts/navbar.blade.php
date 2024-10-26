  <section class="main-page" id="main-page">
      <div class="container-fluid position-relative" style="z-index: 1;">
          <!-- Navbar Start -->
          <nav class="navbar navbar-expand-lg navbar-dark bg-transparent border-bottom p-0">
              <div class="container">
                  <span class="navbar-brand p-0 m-0" href="#">
                      <img src="images/logo_alamaya.png" height="30" style="margin: 35px 0px;"></span>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                      data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                      aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                          <li class="nav-item">
                              <b><a class="nav-link" href="homepage.html">Client</a></b>
                          </li>
                          <li class="nav-item">
                              <b><a class="nav-link" href="alamayaprojectpage.html">Project</a></b>
                          </li>
                          <li class="nav-item">
                              <b><a class="nav-link" href="domainpage.html">Domain</a></b>
                          </li>
                          <li class="nav-item">
                              <b><a class="nav-link" href="alamayateamspage.html">Teams</a></b>
                          </li>
                      </ul>
                      <ul class="navbar-nav align-items-center" style="margin-left: -8%;">
                          <li class="nav-item bullet-none mx-2">
                              <i class="clock text-light" id="clock"></i>
                          </li>
                          <li class="nav-item bullet-none mx-3">
                              <div style="position: relative; display: inline-block;">
                                  <a class="fa-regular fa-bell text-light" style="font-size: 24px;"></a>
                                  <span
                                      style="position: absolute; top: -5px; right: -20px; background-color: red; color: white; border: 1px solid white; border-radius: 60%; padding: 2px 4px; font-size: 10px;">18</span>
                              </div>
                          </li>
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
                                  <img src="images/foto_Rena.jpg" alt="User Image" class="user-photo img-fluid"
                                      style="cursor: pointer;">
                              </li>
                          </button>
                          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                              style="top: 150%;">
                              <li class="user-info text-center">
                                  <img src="{{ asset('images/foto_Rena.jpg') }}" alt="Profile Picture"
                                      class="profile-picture">
                                  <h6>{{ Auth::user()->name }}</h6> {{-- -Nama user --}}
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
                              @endif

                              <li>
                                  <hr class="dropdown-divider">
                              </li>

                              <li>
                                  <form method="POST" action="{{ route('logout') }}">
                                      @csrf
                                      <button type="submit" class="dropdown-item text-danger">
                                          <i class="bi bi-box-arrow-right"></i> Log out
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

  <script>
    function tampil_button_notif() {
        $.ajax({
            url:"<?php echo base_url() ?>index.php/alamaya_client/untuk_buttonnya",
            method:'post',
            dataType: 'json',
            success: function(data)
            {
                $("#button_notif").val(data.jumlah_total);
                console.log(data.jumlah_total)
            }
        });
    }
    function tampil_isi_notif() {
        $.ajax({
            url:"<?php echo base_url() ?>index.php/alamaya_client/untuk_isinya",
            success: function(html)
            {
                $('#button_isi').(html);
            }
        });
    }
</script>

