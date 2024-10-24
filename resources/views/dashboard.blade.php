<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="{{ asset('style/style.css') }}" />
  <title>Admin Alamaya</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css"
    rel="stylesheet" />
  <link
    rel="stylesheet"
    href="https://unpkg.com/boxicons@latest/css/boxicons.min.css" />
</head>

<body>

  <section>
    {{-- Section Animasi --}}
      <div style="position: absolute; z-index: 1002">
        <div
          id="bg-white"
          style="
              width: 100vw; /* 100% dari lebar viewport */
              height: 100vh; /* 100% dari tinggi viewport */
              background-color: white;
            "></div>
        <div class="content">
          <div id="title" class>
            <!-- Logo 1 (hitam, awal) -->
            <img
              id="logo-black"
              src="images/logo_alamaya.png"
              height="40"
              style="margin: 35px 0px" />

            <!-- Logo 2 (putih, untuk setelah animasi) -->
            <img
              id="logo-white"
              src="/images/logo_alamaya_putih.png"
              height="40"
              style="margin: 35px 0px; display: none" />
          </div>
        </div>
        <div class="circle-overlay"></div>
      </div>
        {{-- Animasi Style --}}
    <style>
      /* Atur konten untuk tetap di tengah */
      .content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 20;
        text-align: center;
      }

      #title {
        font-size: 3em;
        color: black;
        transition: color 0.5s ease-in-out;
      }

      .circle-overlay {
        position: absolute;
        width: 50px;
        height: 50px;
        background-color: #3498db;
        border-radius: 50%;
        top: -100px;
        left: 50%;
        transform: translate(-50%, 0);
        animation: dropBounce 2s ease-in-out forwards,
          circleExpand 1s ease-in-out forwards 2s;
        z-index: 10;
      }

      @keyframes dropBounce {
        0% {
          top: -100px;
        }

        50% {
          top: calc(50% - 25px);
        }

        100% {
          top: calc(50% + 50px);
        }
      }

      @keyframes circleExpand {
        0% {
          transform: translate(-50%, -50%) scale(1);
        }

        100% {
          transform: translate(-50%, -50%) scale(50);
        }
      }

      .main-page {
        display: none;
        /* text-align: center; */
      }

      .main-page h1 {
        font-size: 3em;
        color: #333;
      }

      .main-page p {
        font-size: 1.2em;
        color: #666;
      }
    </style>
    {{-- Animasi JS --}}
    <script>
      window.onload = function() {
        const overlay = document.querySelector(".circle-overlay");
        const mainPage = document.querySelectorAll(".main-page");
        const title = document.getElementById("title");
        const logoBlack = document.getElementById("logo-black"); // Logo hitam (awal)
        const logoWhite = document.getElementById("logo-white"); // Logo putih (setelah animasi)
        const bgWhite = document.getElementById("bg-white"); // Logo putih (setelah animasi)

        // Fungsi untuk mengganti logo
        const changeLogo = () => {
          logoBlack.style.display = "none"; // Sembunyikan logo hitam
          logoWhite.style.display = "block"; // Tampilkan logo putih
        };

        // Hentikan tampilan lingkaran dan halaman utama
        overlay.addEventListener("animationend", (event) => {
          if (event.animationName === "circleExpand") {
            overlay.style.display = "none"; // Sembunyikan lingkaran
            title.style.display = "none"; // Sembunyikan judul setelah lingkaran menutupi layar
            bgWhite.style.display = "none"; // Tampilkan logo putih
            // mainPage.style.display = "block"; // Tampilkan halaman utama
            mainPage.forEach(page => {
            page.style.display = "block"; // Tampilkan setiap elemen dengan class main-page
          });
          }
        });

        // Deteksi kapan animasi circleExpand dimulai
        overlay.addEventListener("animationstart", (event) => {
          if (event.animationName === "circleExpand") {
            changeLogo(); // Ubah logo saat lingkaran mulai membesar
          }
        });
      };
    </script>
  </section>

  <section class="main-page" id="main-page" >
      <!-- Banner Start -->
      <div class="container-fluid banner-image1 position-relative" style="background-image: url('{{ asset('images/walpaper3.png') }}');">
        <!-- Navbar Start -->
        <nav
          class="navbar navbar-expand-lg navbar-dark bg-transparent border-bottom p-0">
          <div class="container">
            <span class="navbar-brand p-0 m-0" href="#">
              <img src="images/logo_alamaya.png" height="30"
                style="margin: 35px 0px;"></span>
            <button class="navbar-toggler" type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <b><a class="nav-link" href="homepage.html">Client</a></b>
                </li>
                <li class="nav-item">
                  <b><a class="nav-link"
                      href="alamayaprojectpage.html">Project</a></b>
                </li>
                <li class="nav-item">
                  <b><a class="nav-link" href="domainpage.html">Domain</a></b>
                </li>
                <li class="nav-item">
                  <b><a class="nav-link"
                      href="alamayateamspage.html">Teams</a></b>
                </li>
              </ul>
              <ul class="navbar-nav align-items-center"
                style="margin-left: -8%;">
                <li class="nav-item bullet-none mx-2">
                  <i class="clock text-light" id="clock"></i>
                </li>
                <li class="nav-item bullet-none mx-3">
                  <div style="position: relative; display: inline-block;">
                    <a class="fa-regular fa-bell text-light"
                      style="font-size: 24px;"></a>
                    <span
                      style="position: absolute; top: -5px; right: -20px; background-color: red; color: white; border: 1px solid white; border-radius: 60%; padding: 2px 4px; font-size: 10px;">18</span>
                  </div>
                </li>
                <li class="nav-item bullet-none mx-3">
                  <a class="fa-solid fa-gear text-light"></a>
                </li>
              </ul>

              <!-- User Dropdown Option -->
              <div class="dropdown">
                <button class="user-icon" id="dropdownMenuButton"
                  data-bs-toggle="dropdown" aria-expanded="false"
                  style="border: none; background: none; padding: 0;">
                  <li
                    class="d-flex justify-content-center align-items-center user-icon"
                    style="width: 40px; height: 40px; border: solid 1px; color: white; list-style: none;">
                    <img src="images/foto_Rena.jpg" alt="User Image"
                      class="user-photo img-fluid"
                      style="cursor: pointer;">
                  </li>
                </button>
                <ul class="dropdown-menu dropdown-menu-end"
                  aria-labelledby="dropdownMenuButton">
                  <li class="user-info text-center">
                    <img src="images/foto_Rena.jpg" alt="Profile Picture"
                      class="profile-picture">
                    <h6>Hendri Kalijaga</h6>
                    <p class="email">hendrii.37@gmail.com</p>
                    <span class="badge bg-secondary">Admin</span>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <!-- Pastikan URL link benar -->
                  <li><a class="dropdown-item" href="login.html"><i
                        class="bi bi-person"></i> Account</a></li>
                  <li><a class="dropdown-item" href="add_account.html"><i
                        class="bi bi-person-plus"></i> Add Account</a>
                  </li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item text-danger" href="#"><i
                        class="bi bi-box-arrow-right"></i> Log out</a></li>
                </ul>
              </div>

              <style>
              .user-icon {
                border: none;
                background: none;
              }

              .user-info {
                padding: 10px;
              }

              .user-info .email {
                color: gray;
                font-size: 0.9em;
              }

              .dropdown-menu {
                width: 250px;
              }

              .dropdown-item {
                display: flex;
                align-items: center;
              }

              .dropdown-item i {
                margin-right: 10px;
              }
            </style>
             <!-- Clock Start-->
                <script>
                  function updateClock() {
                    var now = new Date();
                    var hours = now.getHours();
                    var minutes = now.getMinutes();
                    var seconds = now.getSeconds();

                    var period = hours < 12 ? 'AM' : 'PM';
                    hours = hours % 12;
                    hours = hours ? hours : 12; // Convert midnight (0 hours) to 12 AM

                    hours = hours < 10 ? '0' + hours : hours;
                    minutes = minutes < 10 ? '0' + minutes : minutes;
                    seconds = seconds < 10 ? '0' + seconds : seconds;

                    var currentTime = hours + ':' + minutes + ':' + seconds + ' ' + period;

                    document.getElementById('clock').innerText = currentTime;

                    setTimeout(updateClock, 1000);
                  }

                  updateClock();
                </script>
                <!-- End Of Clock -->
            </div>
          </div>
        </div>
  </section>
        <section class="banner-section">
    <!-- Banner -->
    <div class="container-fluid banner-image1 position-relative text-center"
      style="background-image: url('images/walpaper3.png'); background-size: cover; background-position: center;">
      <div class="container">
        <div class="centered-title">
          <div class="row align-items-center" style="min-height: 300px;">
            <!-- Kolom untuk gambar -->
            <div class="col-sm-2 col-lg-1 col-3" style="margin-top: -750px; z-index: 500;">
              <img src="images/handwave.png" class="img-fluid" alt="Hand Wave">
            </div>
            <!-- Kolom untuk teks -->
            <div class="col-9 col-sm-8 text-light text-start" style="margin-top: -750px; z-index: 500;">
              <h3>Welcome Back, Hendri</h3>
              <h6>This is an update from Alamaya Company</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner End -->
  </section>

  <section class="main-page" id="main-page" >
    <!-- Cards Section Start -->
    <div class="container-fluid bg-white rounded-top-5" style="top:430px; position: absolute;">
      <div class="container mt-5" style>
        <div class="row" style="margin-top: -120px;">
          <!-- Card 1 -->
          <div class="col-md-4 col-4">
            <div>
              <div class="card-home bg-transparent shadow-lg">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6 col-6 mt-2">
                      <div class="d-flex justify-content-center align-items-center user-icon1">
                        <div class="fa fa-user text-light" aria-hidden="true"></div>
                      </div>
                    </div>
                    <div class="col-md-6 col-6 d-flex justify-content-end align-items-center">
                      <div class="btn-group dropup">
                        <button type="button"
                          class="border-white text-light btn rounded-5 align-top d-flex justify-content-center align-items-center mt-2"
                          style="height: 4vh; width: 60px; display: flex; align-items: center; justify-content: center;"
                          data-bs-toggle="dropdown">

                          <span class="fas fa-chevron-up text-light" style="font-size: 13px; margin-right: 5px;"></span>
                          <p class="text-light" style="margin: 0;">+3</p>
                        </button>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="#">Action</a></li>
                          <li><a class="dropdown-item" href="#">Another
                              action</a></li>
                          <li><a class="dropdown-item" href="#">Something else
                              here</a></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="container">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="-home-body text-dark mt-2">
                        <div class="card-text text-dark mt-4  ">Total
                          Client<br>
                          <h2><strong>1.162</strong></h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <a href="homepage.html" class="text-dark" style="text-decoration: none;">
                <h6 class="d-flex justify-content-center" style="margin-top: -20px;">Detail
                  stats <i class="fa-solid fa-arrow-right" style="margin-left: 5px;"></i>
                </h6>
              </a>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="col-md-4 mb-5 col-4">
            <div class="card-home bg-transparent shadow-lg">
              <div class="container">
                <div class="row">
                  <div class="col-md-6 col-6 mt-2">
                    <div class="d-flex justify-content-center align-items-center user-icon1">
                      <div class="fa-solid fa-layer-group text-light" aria-hidden="true"></div>
                    </div>
                  </div>
                  <div class="col-md-6 col-6 d-flex justify-content-end align-items-center">

                    <div class="btn-group dropup">
                      <button type="button"
                        class="border-white text-light btn rounded-5 align-top d-flex justify-content-center align-items-center mt-2"
                        style="height: 4vh; width: 60px; display: flex; align-items: center; justify-content: center;"
                        data-bs-toggle="dropdown">

                        <span class="fas fa-chevron-up text-light" style="font-size: 13px; margin-right: 5px;"></span>
                        <p class="text-light" style="margin: 0;">+2</p>
                      </button>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another
                            action</a></li>
                        <li><a class="dropdown-item" href="#">Something else
                            here</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card-body text-dark mt-2">
                      <div class="card-text text-dark mt-4">Maintenance<br>
                        <h2><strong>20</strong></h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <a href="#" class="text-dark" style="text-decoration: none;">
              <h6 class="d-flex justify-content-center" style=" margin-top: -20px;">Detail
                stats <i class="fa-solid fa-arrow-right" style="margin-left: 5px;"></i>
              </h6>
            </a>
          </div>

          <!-- Card 3 -->
          <div class="col-md-4 mb-5 col-4">
            <div class="card-home bg-transparent shadow-lg">
              <div class="container">
                <div class="row">
                  <div class="col-md-6 col-6 mt-2">
                    <div class="d-flex justify-content-center align-items-center user-icon1">
                      <div class="bx bxs-traffic-cone text-light" aria-hidden="true"></div>
                    </div>
                  </div>
                  <div class="col-md-6 col-6 d-flex justify-content-end align-items-center">
                    <div class="btn-group dropup">
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another
                            action</a></li>
                        <li><a class="dropdown-item" href="#">Something else
                            here</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card-body text-dark mt-2">
                      <div class="card-text text-dark mt-4  ">Project on
                        Progress<br>
                        <h2><strong>3</strong></h2>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <a href="projectpage.html" class="text-dark" style="text-decoration: none;">
              <h6 class="d-flex justify-content-center" style=" margin-top: -20px;">Detail
                stats <i class="fa-solid fa-arrow-right" style="margin-left: 5px;"></i>
              </h6>
            </a>
          </div>
          <script>
            const cards = document.querySelectorAll('.card-home'); // Menargetkan semua kartu
            let hoverTimeouts = []; // Array untuk menyimpan timeout untuk setiap kartu

            cards.forEach((card, index) => {
              card.addEventListener('mouseover', function() {
                // Tambahkan kelas hover ketika mouse masuk
                card.classList.add('hovered');

                // Hapus timeout sebelumnya jika ada
                if (hoverTimeouts[index]) clearTimeout(hoverTimeouts[index]);

                // Set timeout untuk menghapus kelas setelah 1 menit (60000 ms)
                hoverTimeouts[index] = setTimeout(() => {
                  card.classList.remove('hovered');
                }, 1500);
              });
            });
          </script>

        </div>
      </div>
    </div>
  </section>

  <section class="main-page" id="main-page" >
    <!-- Table Section Start -->
    <div class="container">
      <div class="row">
        <div class="col-12 col-md-12">
          <div class="d-flex justify-content-center" style="margin-bottom: 50px;">
            <h1>Alamaya Client</h1>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="row">
        <div class="col-12 col-md-12">
          <div class="search-add-sort-container">
            <!-- Search Input -->
            <div class="search-box">
              <input style="width: 400px;" type="text" placeholder="Search">
              <span class="icon-search"><i class="fas fa-search"></i></span>
            </div>
            <!-- Buttons Section -->
            <div class="button-container">


              <!-- Sort by Dropdown -->
              <div class="dropdown">
                <button class="btn btn-dropdown srtby" type="button" aria-expanded="false">
                  <a style="color: red;" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </button>
                <!-- Add Client Button -->
                <button class="btn btn-add-client btn1hvr" data-bs-toggle="modal" data-bs-target="#addClientModal">Add
                  Client <i class="fa fa-plus"></i>
                </button>

                <!-- Add Client Modal -->
                <div class="modal fade" id="addClientModal" tabindex="-1" aria-labelledby="addClientModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <div class="modal-header" style="display: block;">
                        <h5 class="modal-title" id="addClientModalLabel">Add Client</h5>
                        <p style="margin-top: 2px;">Fill in some details to start adding clients</p>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                          style="position: absolute; right: 10px; top: 10px;"></button>
                      </div>

                      <div class="modal-body">
                        <form>
                          <!-- Client Name & Company Name -->
                          <div class="row mb-3">
                            <div class="col">
                              <label for="clientName" class="form-label" style="font-size: 0.7em;">CLIENT NAME</label>
                              <input type="text" class="form-control" id="clientName"
                                placeholder="Enter the client name">
                            </div>
                            <div class="col">
                              <label for="companyName" class="form-label" style="font-size: 0.7em;">COMPANY NAME</label>
                              <input type="text" class="form-control" id="companyName"
                                placeholder="Enter the company name">
                            </div>
                          </div>

                          <!-- PIC and Product Category -->
                          <div class="row mb-3">
                            <div class="col">
                              <label for="picName" class="form-label" style="font-size: 0.7em;">PIC</label>
                              <select class="form-select" id="picName">
                                <option selected>Select the PIC name</option>
                                <option value="1">PIC 1</option>
                                <option value="2">PIC 2</option>
                              </select>
                            </div>
                            <div class="col">
                              <label for="productCategory" class="form-label" style="font-size: 0.7em;">CATEGORY
                                PRODUCT</label>
                              <select class="form-select" id="productCategory">
                                <option selected>Select a Product
                                  category</option>
                                <option value="1">Category 1</option>
                                <option value="2">Category 2</option>
                              </select>
                            </div>
                          </div>

                          <!-- Email & Phone -->
                          <div class="row mb-3">
                            <div class="col">
                              <label for="email" class="form-label" style="font-size: 0.7em;" style="font-size: 0.7em;">
                                EMAIL</label>
                              <input type="text" class="form-control" id="email" placeholder="Enter email client">
                            </div>
                            <div class="col">
                              <label for="phone" class="form-label" style="font-size: 0.7em;">PHONE</label>
                              <input type="text" class="form-control" id="phone"
                                placeholder="Enter the client's phone number">
                            </div>
                          </div>

                          <!-- Address -->
                          <div class="mb-3">
                            <label for="address" class="form-label" style="font-size: 0.7em;">ADDRESS</label>
                            <input type="text" class="form-control" id="address"
                              placeholder="Enter the client's company address">
                          </div>

                          <!-- Disclaimer -->
                          <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="termsCheck">
                            <label class="form-check-label" for="termsCheck">
                              By registering, you agree to the terms and
                              conditions that apply. Check again and make
                              sure the form is completely filled out.
                            </label>
                          </div>

                          <!-- Submit Button -->
                          <button type="submit" class="btn btn-dark w-100" onclick="showAlert()">Add
                            Client</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

                <script>
                  function showAlert() {
                    // Menampilkan notifikasi bahwa data berhasil ditambahkan
                    alert('Data berhasil ditambahkan!');
                  }
                </script>

                <!-- Dropdown Button -->
                <button class="btn btn-dropdown dropdown-toggle srtby" type="button" id="dropdownMenuButton"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  Sort by
                </button>
                <style>
                  .srtby:hover {
                    background-color: rgb(114, 114, 113);
                    color: white;
                  }
                </style>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <li><a class="dropdown-item" href="#">Edit</a></li>
                  <li><a class="dropdown-item" href="#">See Detail</a></li>
                  <li><a class="dropdown-item" href="#">Non Actived</a></li>
                </ul>
                <!-- Add dropdown options here if needed -->
              </div>
            </div>
          </div>

          <table class="table table-hover mt-5 table-sm">
            <thead>
              <tr style="height: 70px;">
                <th scope="col">
                  <!-- Checkbox Select All -->
                  <div>
                    <input type="checkbox" id="select-all">
                    <label style="margin-left: 10px; margin-right: 0px;" for="select-all">All</label>
                  </div>
                </th> <!-- Checkbox Column -->
                <th>
                  <span style="display: inline-flex; align-items: center;">
                    No. Id
                    <span class="sort-icons"
                      style="display: flex; flex-direction: column; align-items: center; margin-left: 5px;">
                      <span class="fas fa-chevron-up" style="font-size: 5px;"></span>
                      <span class="fas fa-chevron-down" style="font-size: 5px;"></span>
                    </span>
                  </span>
                </th>
                <th>
                  <span style="display: inline-flex; align-items: center;">
                    Client Name
                    <span class="sort-icons"
                      style="display: flex; flex-direction: column; align-items: center; margin-left: 5px;">
                      <span class="fas fa-chevron-up" style="font-size: 5px;"></span>
                      <span class="fas fa-chevron-down" style="font-size: 5px;"></span>
                    </span>
                  </span>
                </th>
                <th>
                  Email
                </th>
                <th>
                  Phone
                </th>
                <th>
                  <span style="display: inline-flex; align-items: center;">
                    PIC
                    <span class="sort-icons"
                      style="display: flex; flex-direction: column; align-items: center; margin-left: 5px;">
                      <span class="fas fa-chevron-up" style="font-size: 5px;"></span>
                      <span class="fas fa-chevron-down" style="font-size: 5px;"></span>
                    </span>
                  </span>
                </th>
                <th>
                  <span style="display: inline-flex; align-items: center;">
                    Category
                    <span class="sort-icons"
                      style="display: flex; flex-direction: column; align-items: center; margin-left: 5px;">
                      <span class="fas fa-chevron-up" style="font-size: 5px;"></span>
                      <span class="fas fa-chevron-down" style="font-size: 5px;"></span>
                    </span>
                  </span>
                </th>
                <th>Action</th>
              </tr>
            </thead>
            <style>
              thead th {
                align-content: center;
              }

              tbody tr td {
                align-content: center;
              }
            </style>
            <!-- Data Table -->
            <tbody>
              <div class="bg-primary">
                <!-- Row with Expand/Collapse -->
                <tr style="height: 80px;">
                  <td><input type="checkbox" class="client-checkbox"></td>
                  <td>000121</td>
                  <td>Alexandra Mezila Azza</td>
                  <td>
                    dhitanatasha990@gmail.com
                    <span class="sort-icons toggle-chevron" aria-expanded="false"
                      style="display: flex; flex-direction: column; align-items: center; margin-left: 5px;">
                      <span class="fas fa-chevron-down" style="font-size: 10px;"></span>
                    </span>
                  </td>
                  <td>08807564735</td>
                  <td>Widia</td>
                  <td>asdapro.com</td>
                  <td>
                    <div class="dropdown text-center">
                      <i class="bi bi-three-dots" data-bs-toggle="dropdown" aria-expanded="false"
                        style="cursor: pointer;"></i>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Edit</a></li>
                        <li><a class="dropdown-item" href="#">See Detail</a></li>
                        <li><a class="dropdown-item" href="#">Non Actived</a></li>
                      </ul>
                    </div>
                  </td>
                </tr>
                <tr class="collapse-row" style="display: none;">
                  <td></td>
                  <td colspan="2">
                    <div class="collapse-content" style="overflow: hidden; height: 0; transition: height 0.5s ease;">
                      <span>PT. RIS Tirta Indah</span>
                      <i class="fa-regular fa-copy" style="margin-left: 90px;"
                        onclick="copyText('PT. RIS Tirta Indah')"></i>
                    </div>
                  </td>
                  <td colspan="6">
                    <div class="collapse-content1" style="overflow: hidden; height: 0; transition: height 0.5s ease;">
                      <span>Jl. Prof. Dr. Ida Bagus Mantra Batubulan, Kec. Sukawati, Kabupaten Gianyar, Bali
                        80582</span>
                      <i class="fa-regular fa-copy" style="margin-left: 90px;"
                        onclick="copyText('Jl. Prof. Dr. Ida Bagus Mantra Batubulan, Kec. Sukawati, Kabupaten Gianyar, Bali 80582')"></i>
                    </div>
                  </td>
                </tr>
                <!-- End Row With Expand/Collapse -->

                <script>
                  document.querySelectorAll('.toggle-chevron').forEach(function(chevron, index) {
                    chevron.addEventListener('click', function() {
                      const collapseRow = document.querySelectorAll('.collapse-row')[index];
                      const collapseContent = collapseRow.querySelector('.collapse-content');
                      const collapseContent1 = collapseRow.querySelector('.collapse-content1');

                      if (collapseRow.style.display === 'none') {
                        collapseRow.style.display = 'table-row'; // Tampilkan baris terlebih dahulu
                        const height = collapseContent.scrollHeight + 'px'; // Ambil tinggi asli konten
                        collapseContent.style.height = height; // Terapkan tinggi asli untuk animasi expand
                        collapseContent1.style.height = height; // Terapkan tinggi asli untuk animasi expand
                        this.querySelector('.fas').classList.remove('fa-chevron-down');
                        this.querySelector('.fas').classList.add('fa-chevron-up'); // Ubah ikon jadi chevron-up
                      } else {
                        collapseContent.style.height = '0'; // Set tinggi ke 0 untuk collapse
                        collapseContent1.style.height = '0'; // Set tinggi ke 0 untuk collapse
                        setTimeout(() => {
                          collapseRow.style.display = 'none'; // Sembunyikan baris setelah animasi collapse selesai
                        }, 500); // Sama dengan durasi animasi CSS
                        this.querySelector('.fas').classList.remove('fa-chevron-up');
                        this.querySelector('.fas').classList.add('fa-chevron-down'); // Ubah ikon jadi chevron-down
                      }
                    });
                  });

                  function copyText(text) {
                    // Membuat elemen input sementara untuk menyalin teks
                    var tempInput = document.createElement('input');
                    tempInput.value = text;
                    document.body.appendChild(tempInput);
                    tempInput.select();
                    document.execCommand('copy');
                    document.body.removeChild(tempInput);

                    // Menampilkan notifikasi atau perubahan ikon jika diperlukan
                    alert('Teks disalin: ' + text);
                  }
                </script>
              </div>

            </tbody>
          </table>
           <script>
                // JavaScript for "Select All" checkbox
                document.getElementById('select-all').addEventListener('change', function() {
                  var checkboxes = document.querySelectorAll('.client-checkbox');
                  checkboxes.forEach(function(checkbox) {
                    checkbox.checked = this.checked;
                  }, this);
                });
              </script>
          <!-- End Of Table Section -->
           
          <!-- Pagination -->
          <nav aria-label="Page navigation">
            <ul class="pagination justify-content-end" style="align-items: center;">
              <li class="page-item">
                <span class="page-link" style="background-color: #082F1B; border-radius: 5px;"><i style="color: white;"
                    class="fa-solid fa-chevron-left"></i></span>
              </li>
              <li class="page-item" aria-current="page">
                <span class="page-link1">1</span>
              </li>
              <li class="page-item">
                <a class="page-link1">...</a>
              </li>
              <li class="page-item">
                <a class="page-link1" href="#">2</a>
              </li>
              <li class="page-item">
                <a class="page-link1" href="#">3</a>
              </li>
              <li class="page-item">
                <a class="page-link1" href="#">4</a>
              </li>
              <li class="page-item">
                <a class="page-link1">...</a>
              </li>
              <li class="page-item">
                <a class="page-link1" href="#">999</a>
              </li>
              <li class="page-item">
                <a class="page-link" style="background-color: #082F1B; border-radius: 5px;" href="#"><i
                    style="color: white;" class="fa-solid fa-chevron-right white"></i></a>
              </li>
            </ul>
          </nav>

          <style>
            .page-link1 {
              text-decoration: none;
              color: black;
              margin: 0px 5px;
              padding: 5px;
              width: 40px;
            }

            .page-link1:hover {
              background-color: #8F939A;
              text-decoration: none;
              color: black;
              margin: 0px 5px;
              padding: 5px;
              width: 40px;
              border-radius: 5px;
            }

            .btn1hvr:hover {
              background-color: #175f28;
              color: white;
            }
          </style>
        </div>
      </div>
    </div>
  </section>

  <section class="main-page" id="main-page" >
    <div>
      <!-- Footer Start -->
      <footer class="d-flex justify-content-center" style="background-color: #e0e0e6; height: 100px;">
        <div style="font-size: 15px; text-align: center; align-content: center;">
          <a style="color: #8F939A; text-decoration: none; text-align: center; justify-content: center;"
            href="alamaya.com">Login as - Admin Hendri Kalijaga</a> <br>
          <a style="color: #8F939A; text-decoration: none; text-align: center; justify-content: center;"
            href="alamaya.com">Copyright © PT Indonesia Online Alamaya.
            All
            rights reserved.</a>
        </div>
      </footer>
      <!-- End Of Footer -->
    </div>

  </section>

  </div>
  <!-- JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/19ad68a1da.js" crossorigin="anonymous"></script>

</body>

</html>