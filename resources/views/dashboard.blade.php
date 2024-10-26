   @extends('layouts.master')
   @section('content')
       <section class="main-page" id="main-page" style="margin-top: -100px">
           <!-- Banner -->
           <div class="container-fluid banner-image1 position-relative text-center"
               style="background-image: url('images/walpaper3.png'); background-size: cover; background-position: center;">
               <div class="container">
                   <div class="centered-title">
                       <div class="row align-items-center" style="min-height: 300px;">
                           <!-- Kolom untuk gambar -->
                           <div class="col-sm-2 col-lg-1 col-3" style="margin-top: 150px; z-index: 500;">
                               <img src="images/handwave.png" class="img-fluid" alt="Hand Wave">
                           </div>
                           <!-- Kolom untuk teks -->
                           <div class="col-9 col-sm-8 text-light text-start" style="margin-top: 150px; z-index: 500;">
                               <h3>Welcome Back, {{ Auth::user()->name }}</h3>
                               <h6>This is an update from Alamaya Company</h6>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <!-- Banner End -->
       </section>

       <section class="main-page" id="main-page">
           <section style="margin-bottom: 150px">
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

                                                           <span class="fas fa-chevron-up text-light"
                                                               style="font-size: 13px; margin-right: 5px;"></span>
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
                                                   <div class="fa-solid fa-layer-group text-light" aria-hidden="true">
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-md-6 col-6 d-flex justify-content-end align-items-center">

                                               <div class="btn-group dropup">
                                                   <button type="button"
                                                       class="border-white text-light btn rounded-5 align-top d-flex justify-content-center align-items-center mt-2"
                                                       style="height: 4vh; width: 60px; display: flex; align-items: center; justify-content: center;"
                                                       data-bs-toggle="dropdown">

                                                       <span class="fas fa-chevron-up text-light"
                                                           style="font-size: 13px; margin-right: 5px;"></span>
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
                       </div>
                   </div>
               </div>
           </section>
       </section>

       <section class="main-page" id="main-page">
           <section>
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
           </section>

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
                                       <a style="color: red;" href="#"><i class="fa fa-trash"
                                               aria-hidden="true"></i></a>
                                   </button>
                                   <!-- Add Client Button -->
                                   <button class="btn btn-add-client btn1hvr" data-bs-toggle="modal"
                                       data-bs-target="#addClientModal">Add
                                       Client <i class="fa fa-plus"></i>
                                   </button>

                                   <!-- Add Client Modal -->
                                   <div class="modal fade" id="addClientModal" tabindex="-1"
                                       aria-labelledby="addClientModalLabel" aria-hidden="true">
                                       <div class="modal-dialog modal-lg">
                                           <div class="modal-content">
                                               <div class="modal-header" style="display: block;">
                                                   <h5 class="modal-title" id="addClientModalLabel">Add Client</h5>
                                                   <p style="margin-top: 2px;">Fill in some details to start adding
                                                       clients</p>
                                                   <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                       aria-label="Close"
                                                       style="position: absolute; right: 10px; top: 10px;"></button>
                                               </div>

                                               <div class="modal-body">
                                                   <form method="POST" action="{{ route('clients.store') }}">
                                                       @csrf
                                                       <!-- Client Name & Company Name -->
                                                       <div class="row mb-3">
                                                           <div class="col">
                                                               <label for="client_name" class="form-label"
                                                                   style="font-size: 0.7em;">CLIENT NAME</label>
                                                               <input type="text" class="form-control"
                                                                   id="client_name" placeholder="Enter the client name">
                                                           </div>
                                                           <div class="col">
                                                               <label for="company_name" class="form-label"
                                                                   style="font-size: 0.7em;">COMPANY NAME</label>
                                                               <input type="text" class="form-control"
                                                                   id="company_name" placeholder="Enter the company name">
                                                           </div>
                                                       </div>

                                                       <!-- PIC and Product Category -->
                                                       <div class="row mb-3">
                                                           <div class="col">
                                                               <label for="pic_name" class="form-label"
                                                                   style="font-size: 0.7em;">PIC</label>
                                                               <select class="form-select" id="pic_name">
                                                                   <option selected>Select the PIC name</option>
                                                                   <option value="1">PIC 1</option>
                                                                   <option value="2">PIC 2</option>
                                                               </select>
                                                           </div>
                                                           <div class="col">
                                                               <label for="product_category" class="form-label"
                                                                   style="font-size: 0.7em;">CATEGORY
                                                                   PRODUCT</label>
                                                               <select class="form-select" id="product_category">
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
                                                               <label for="email" class="form-label"
                                                                   style="font-size: 0.7em;" style="font-size: 0.7em;">
                                                                   EMAIL</label>
                                                               <input type="text" class="form-control" id="email"
                                                                   placeholder="Enter email client">
                                                           </div>
                                                           <div class="col">
                                                               <label for="phone" class="form-label"
                                                                   style="font-size: 0.7em;">PHONE</label>
                                                               <input type="text" class="form-control" id="phone"
                                                                   placeholder="Enter the client's phone number">
                                                           </div>
                                                       </div>

                                                       <!-- Address -->
                                                       <div class="mb-3">
                                                           <label for="address" class="form-label"
                                                               style="font-size: 0.7em;">ADDRESS</label>
                                                           <input type="text" class="form-control" id="address"
                                                               placeholder="Enter the client's company address">
                                                       </div>

                                                       <!-- Disclaimer -->
                                                       <div class="form-check mb-3">
                                                           <input type="checkbox" class="form-check-input"
                                                               id="termsCheck">
                                                           <label class="form-check-label" for="termsCheck">
                                                               By registering, you agree to the terms and
                                                               conditions that apply. Check again and make
                                                               sure the form is completely filled out.
                                                           </label>
                                                       </div>

                                                       <!-- Submit Button -->
                                                       <button type="submit" class="btn btn-dark w-100" ">Add
                                                                  Client</button>
                                                           </form>
                                                       </div>
                                                   </div>
                                               </div>
                                           </div>

                                             @if (session('success'))
                                                           <div class="alert alert-success">
                                                               {{ session('success') }}
                                                           </div>
                                                           @endif

                                                           <script>
                                                               function showAlert() {
                                                                   alert('Data berhasil ditambahkan!');
                                                               }
                                                           </script>

                                                           <!-- Dropdown Button -->
                                                           <button class="btn btn-dropdown dropdown-toggle srtby"
                                                               type="button" id="dropdownMenuButton"
                                                               data-bs-toggle="dropdown" aria-expanded="false">
                                                               Sort by
                                                           </button>
                                                           <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                               <li><a class="dropdown-item" href="#">Edit</a></li>
                                                               <li><a class="dropdown-item" href="#">See Detail</a>
                                                               </li>
                                                               <li><a class="dropdown-item" href="#">Non Actived</a>
                                                               </li>
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
                                                           <label style="margin-left: 10px; margin-right: 0px;"
                                                               for="select-all">All</label>
                                                       </div>
                                                   </th> <!-- Checkbox Column -->
                                                   <th>
                                                       <span style="display: inline-flex; align-items: center;">
                                                           No. Id
                                                           <span class="sort-icons"
                                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px;">
                                                               <span class="fas fa-chevron-up"
                                                                   style="font-size: 5px;"></span>
                                                               <span class="fas fa-chevron-down"
                                                                   style="font-size: 5px;"></span>
                                                           </span>
                                                       </span>
                                                   </th>
                                                   <th>
                                                       <span style="display: inline-flex; align-items: center;">
                                                           Client Name
                                                           <span class="sort-icons"
                                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px;">
                                                               <span class="fas fa-chevron-up"
                                                                   style="font-size: 5px;"></span>
                                                               <span class="fas fa-chevron-down"
                                                                   style="font-size: 5px;"></span>
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
                                                               <span class="fas fa-chevron-up"
                                                                   style="font-size: 5px;"></span>
                                                               <span class="fas fa-chevron-down"
                                                                   style="font-size: 5px;"></span>
                                                           </span>
                                                       </span>
                                                   </th>
                                                   <th>
                                                       <span style="display: inline-flex; align-items: center;">
                                                           Category
                                                           <span class="sort-icons"
                                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px;">
                                                               <span class="fas fa-chevron-up"
                                                                   style="font-size: 5px;"></span>
                                                               <span class="fas fa-chevron-down"
                                                                   style="font-size: 5px;"></span>
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
                                                               <span class="fas fa-chevron-down"
                                                                   style="font-size: 10px;"></span>
                                                           </span>
                                                       </td>
                                                       <td>08807564735</td>
                                                       <td>Widia</td>
                                                       <td>asdapro.com</td>
                                                       <td>
                                                           <div class="dropdown text-center">
                                                               <i class="bi bi-three-dots" data-bs-toggle="dropdown"
                                                                   aria-expanded="false" style="cursor: pointer;"></i>
                                                               <ul class="dropdown-menu">
                                                                   <li><a class="dropdown-item" href="#">Edit</a>
                                                                   </li>
                                                                   <li><a class="dropdown-item" href="#">See
                                                                           Detail</a></li>
                                                                   <li><a class="dropdown-item" href="#">Non
                                                                           Actived</a></li>
                                                               </ul>
                                                           </div>
                                                       </td>
                                                   </tr>
                                                   <tr class="collapse-row" style="display: none;">
                                                       <td></td>
                                                       <td colspan="2">
                                                           <div class="collapse-content"
                                                               style="overflow: hidden; height: 0; transition: height 0.5s ease;">
                                                               <span>PT. RIS Tirta Indah</span>
                                                               <i class="fa-regular fa-copy" style="margin-left: 90px;"
                                                                   onclick="copyText('PT. RIS Tirta Indah')"></i>
                                                           </div>
                                                       </td>
                                                       <td colspan="6">
                                                           <div class="collapse-content1"
                                                               style="overflow: hidden; height: 0; transition: height 0.5s ease;">
                                                               <span>Jl. Prof. Dr. Ida Bagus Mantra Batubulan, Kec.
                                                                   Sukawati, Kabupaten
                                                                   Gianyar, Bali
                                                                   80582</span>
                                                               <i class="fa-regular fa-copy" style="margin-left: 90px;"
                                                                   onclick="copyText('Jl. Prof. Dr. Ida Bagus Mantra Batubulan, Kec. Sukawati, Kabupaten Gianyar, Bali 80582')"></i>
                                                           </div>
                                                       </td>
                                                   </tr>
                                                   <!-- End Row With Expand/Collapse -->

                                               </div>

                                           </tbody>
                                       </table>
                                       <!-- End Of Table Section -->

                                       <!-- Pagination -->
                                       <nav aria-label="Page navigation">
                                           <ul class="pagination justify-content-end" style="align-items: center;">
                                               <li class="page-item">
                                                   <span class="page-link"
                                                       style="background-color: #082F1B; border-radius: 5px;"><i
                                                           style="color: white;"
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
                                                   <a class="page-link"
                                                       style="background-color: #082F1B; border-radius: 5px;"
                                                       href="#"><i style="color: white;"
                                                           class="fa-solid fa-chevron-right white"></i></a>
                                               </li>
                                           </ul>
                                       </nav>
                                   </div>
                               </div>
                           </div>
       </section>
   @endsection
