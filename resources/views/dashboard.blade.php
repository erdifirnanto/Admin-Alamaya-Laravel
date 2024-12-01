   @include('layouts.animasi')
   @extends('layouts.master')
   @section('content')
       <section class="main-page" id="main-page">
           <section>
               <!-- Table Section Start -->
               <div class="container">
                   <div class="row">
                       <div class="col-12 col-md-12">
                           <div class="d-flex justify-content-center" style="margin-bottom: 50px;">
                               <h1>Alamaya Project</h1>
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
                               <input id="searchInput" style="width: 400px;" type="text" placeholder="Search">
                               <span class="icon-search"><i class="fas fa-search"></i></span>
                           </div>
                           <!-- Buttons Section -->
                           <div class="button-container">
                               <!-- Sort by Dropdown -->
                               <div class="dropdown">
                                   <button class="btn btn-dropdown srtby delete-btn delete-selected" type="button"
                                       aria-expanded="false">
                                       <a style="color: red;" href="#"><i class="fa fa-trash"
                                               aria-hidden="true"></i></a>
                                   </button>

                                   <script>
                                       document.querySelectorAll('.delete-btn').forEach(button => {
                                           button.addEventListener('click', function(event) {
                                               event.preventDefault();

                                               const projectId = this.getAttribute('data-id');

                                               // Langsung lakukan penghapusan tanpa konfirmasi
                                               fetch(`/project/${projectId}`, {
                                                       method: 'DELETE',
                                                       headers: {
                                                           'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                                               .getAttribute('content')
                                                       }
                                                   })
                                                   .then(response => response.json())
                                                   .then(data => {
                                                       if (data.success) {
                                                           alert("Project deleted successfully!");
                                                           location.reload(); // Refresh halaman atau update DOM
                                                       } else {
                                                           alert("Failed to delete project.");
                                                       }
                                                   })
                                           });
                                       });
                                   </script>


                                   @include('components.dashboard.add-project')

<<<<<<< HEAD
                                   <!-- Add Client Modal -->
                                   <div class="modal fade" id="addClientModal" tabindex="-1"
                                       aria-labelledby="addClientModalLabel" aria-hidden="true">
                                       <div class="modal-dialog modal-lg">
                                           <div class="modal-content">
                                               <div class="modal-header" style="display: block;">
                                                   <h5 class="modal-title" id="addClientModalLabel">Add Client</h5>
                                                   <p style="margin-top: 2px;">Fill in some details to start adding clients
                                                   </p>
                                                   <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                       aria-label="Close"
                                                       style="position: absolute; right: 10px; top: 10px;"></button>
                                               </div>

                                               <div class="modal-body">
                                                   <form method="POST" action="{{ route('clients.store') }}"
                                                       id="AddClientForm">
                                                       @csrf

                                                       <!-- Client Name & Company Name -->
                                                       <div class="row mb-3">
                                                           <div class="col">
                                                               <label for="client_name" class="form-label"
                                                                   style="font-size: 0.7em;">CLIENT NAME</label>
                                                               <input type="text"
                                                                   class="form-control @error('client_name') is-invalid @enderror"
                                                                   id="client_name" name="client_name"
                                                                   placeholder="Enter the client name"
                                                                   value="{{ old('client_name') }}" required>
                                                               @error('client_name')
                                                                   <div class="invalid-feedback">{{ $message }}</div>
                                                               @enderror
                                                           </div>
                                                           <div class="col">
                                                               <label for="company_name" class="form-label"
                                                                   style="font-size: 0.7em;">COMPANY NAME</label>
                                                               <input type="text"
                                                                   class="form-control @error('company_name') is-invalid @enderror"
                                                                   id="company_name" name="company_name"
                                                                   placeholder="Enter the company name"
                                                                   value="{{ old('company_name') }}" required>
                                                               @error('company_name')
                                                                   <div class="invalid-feedback">{{ $message }}</div>
                                                               @enderror
                                                           </div>
                                                       </div>

                                                       <!-- PIC and Product Category -->
                                                       <div class="row mb-3">
                                                           <div class="col">
                                                               <label for="pic_name" class="form-label"
                                                                   style="font-size: 0.7em;">PIC</label>
                                                               <select
                                                                   class="form-select @error('pic_name') is-invalid @enderror"
                                                                   id="pic_name" name="pic_name" required>
                                                                   <option selected value="">Select the PIC name
                                                                   </option>
                                                                   <option value="Widia"
                                                                       {{ old('pic_name') == 'Widia' ? 'selected' : '' }}>Widia
                                                                   </option>
                                                                   <option value="Handika"
                                                                       {{ old('pic_name') == 'Handika' ? 'selected' : '' }}>Handika
                                                                   </option>
                                                               </select>
                                                               @error('pic_name')
                                                                   <div class="invalid-feedback">{{ $message }}</div>
                                                               @enderror
                                                           </div>
                                                           <div class="col">
                                                               <label for="product_category" class="form-label"
                                                                   style="font-size: 0.7em;">CATEGORY PRODUCT</label>
                                                               <select
                                                                   class="form-select @error('product_category') is-invalid @enderror"
                                                                   id="product_category" name="product_category" required>
                                                                   <option selected value="">Select a Product category
                                                                   </option>
                                                                   <option value="asdapro.com"
                                                                       {{ old('product_category') == 'asdapro.com' ? 'selected' : '' }}>
                                                                       asdapro.com</option>
                                                                   <option value="2"
                                                                       {{ old('product_category') == '2' ? 'selected' : '' }}>
                                                                       Category 2</option>
                                                               </select>
                                                               @error('product_category')
                                                                   <div class="invalid-feedback">{{ $message }}</div>
                                                               @enderror
                                                           </div>
                                                       </div>
                                                       <div class="mb-3">
                                                           <label for="email" class="form-label" style="font-size: 0.7em;">EMAIL</label>
                                                           <input type="email" name="email"
                                                               class="form-control @error('email') is-invalid @enderror"
                                                               id="email" name="email" for="email"
                                                               placeholder="Enter email" value="{{ old('email') }}"
                                                               required autofocus>
                                                           @error('email')
                                                               <div id="emailHelp" class="form-text text-danger">
                                                                   {{ $message }}</div>
                                                           @enderror
                                                       </div>
                                                       <!-- Email & Phone -->
                                                       <div class="row mb-3">
                                                           <div class="col">
                                                               <label for="phone" class="form-label"
                                                                   style="font-size: 0.7em;">PHONE</label>
                                                               <input type="text"
                                                                   class="form-control @error('phone') is-invalid @enderror"
                                                                   id="phone" name="phone"
                                                                   placeholder="Enter the client's phone number"
                                                                   value="{{ old('phone') }}" inputmode="numeric"
                                                                   pattern="\d+" required>
                                                               @error('phone')
                                                                   <div class="invalid-feedback">{{ $message }}</div>
                                                               @enderror
                                                           </div>
                                                       </div>
                                                       <script>
                                                           document.getElementById('phone').addEventListener('input', function(event) {
                                                               let phone = event.target;
                                                               // Mengganti semua karakter selain angka
                                                               phone.value = phone.value.replace(/\D/g, '');
                                                           });
                                                       </script>

                                                       <!-- Address -->
                                                       <div class="mb-3">
                                                           <label for="address" class="form-label"
                                                               style="font-size: 0.7em;">ADDRESS</label>
                                                           <input type="text"
                                                               class="form-control @error('address') is-invalid @enderror"
                                                               id="address" name="address"
                                                               placeholder="Enter the client's company address"
                                                               value="{{ old('address') }}" required>
                                                           @error('address')
                                                               <div class="invalid-feedback">{{ $message }}</div>
                                                           @enderror
                                                       </div>

                                                       <!-- Disclaimer -->
                                                       <div class="form-check mb-3">
                                                           <input type="checkbox"
                                                               class="form-check-input @error('termsCheck') is-invalid @enderror"
                                                               id="termsCheck" name="termsCheck"
                                                               {{ old('termsCheck') ? 'checked' : '' }} required>
                                                           <label class="form-check-label" for="termsCheck">
                                                               By registering, you agree to the terms and conditions that
                                                               apply. Check again and make sure the form is completely
                                                               filled out.
                                                           </label>
                                                           @error('termsCheck')
                                                               <div class="invalid-feedback">{{ $message }}</div>
                                                           @enderror
                                                       </div>

                                                       <button type="submit" class="btn btn-dark col-12">Submit</button>
                                                   </form>
                                                   <script>
                                                       function validateForm() {
                                                           // Mendapatkan referensi form
                                                           const form = document.getElementById('AddClientForm');
                                                           let isValid = true;
                                                           const category = document.getElementById('product_category');
                                                           if (category.value === '') {
                                                               category.classList.add('is-invalid');
                                                               isValid = false;
                                                           } else {
                                                               category.classList.remove('is-invalid');
                                                           }

                                                           // Memeriksa apakah PIC dipilih
                                                           const picName = document.getElementById('pic_name');
                                                           if (picName.value === '') {
                                                               picName.classList.add('is-invalid');
                                                               isValid = false;
                                                           } else {
                                                               picName.classList.remove('is-invalid');
                                                           }
                                                           return isValid;
                                                       }
                                                   </script>
                                               </div>
                                           </div>
                                       </div>
                                   </div>


                                   <!-- Edit Client Modal -->


                                   {{-- @if (session('success'))
                                       <div class="alert alert-success">
                                           {{ session('success') }}
                                       </div>
                                   @endif --}}

                                   <script>
                                       function showAlert() {
                                           alert('Data berhasil ditambahkan!');
                                       }
                                   </script>

                                   <!-- Dropdown Button -->
=======
                                   <!-- Sortby Button -->
>>>>>>> 97a980b1a6642aef7dc1e0d698092798fed04118
                                   <button class="btn btn-dropdown dropdown-toggle srtby" type="button"
                                       id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                       Sort by
                                   </button>
                                   <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                       <li><button class="dropdown-item sort-button" data-sort="id" data-order="asc">By
                                               ID</button></li>
                                       <li><button class="dropdown-item sort-button" data-sort="client_name"
                                               data-order="asc">By Name</button></li>
                                   </ul>
                               </div>
                           </div>
                       </div>

                       <table class="table table-hover mt-5 table-sm">
                           <thead>
                               <tr style="height: 70px;">
                                   <th>
                                       <input style="cursor: pointer" type="checkbox" id="select-all" for="select-all">
                                   </th>
                                   <th scope="col"> All
                                       <!-- Checkbox Select All -->
                                       <div>
                                           <script>
                                               // Pilih semua checkbox saat 'select-all' dicentang
                                               document.getElementById('select-all').addEventListener('change', function() {
                                                   const checkboxes = document.querySelectorAll('.client-checkbox');
                                                   checkboxes.forEach(checkbox => {
                                                       checkbox.checked = this.checked;
                                                   });
                                               });

                                               // Menghapus semua klien yang terpilih
                                               document.querySelector('.delete-selected').addEventListener('click', function() {
                                                   const selectedProject = [];
                                                   document.querySelectorAll('.client-checkbox:checked').forEach(checkbox => {
                                                       selectedProject.push(checkbox.value);
                                                   });

                                                   console.log("Selected Client IDs:", selectedProject); // Debugging

                                                   if (selectedProject.length === 0) {
                                                       alert("No Project selected.");
                                                       return;
                                                   }

                                                   if (confirm("Are you sure you want to delete the selected Project?")) {
                                                       fetch('/project/delete-multiple', {
                                                               method: 'POST',
                                                               headers: {
                                                                   'Content-Type': 'application/json',
                                                                   'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                                                       'content')
                                                               },
                                                               body: JSON.stringify({
                                                                   ids: selectedProject
                                                               })
                                                           })
                                                           .then(response => response.json())
                                                           .then(data => {
                                                               if (data.success) {
                                                                   alert("Selected Project deleted successfully!");
                                                                   location.reload(); // Refresh halaman atau update DOM
                                                               } else {
                                                                   alert("Failed to delete Project.");
                                                               }
                                                           })
                                                           .catch(error => console.error("Error deleting Project:", error));
                                                   }

                                               });
                                           </script>
                                       </div>
                                   </th>
                                   <th>
                                       <span style="display: inline-flex; align-items: center;">
                                           No.
                                           <span class="sort-icons sort-button" data-sort="id" data-order="asc"
                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
                                               <span class="fas fa-chevron-up" style="font-size: 10px;"></span>
                                               <span class="fas fa-chevron-down" style="font-size: 10px;"></span>
                                           </span>
                                       </span>
                                   </th>
                                   <th>
                                       <span style="display: inline-flex; align-items: center;">
                                           Name
                                           <span class="sort-icons sort-button" data-sort="client-name" data-order="asc"
                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
                                               <span class="fas fa-chevron-up" style="font-size: 10px;"></span>
                                               <span class="fas fa-chevron-down" style="font-size: 10px;"></span>
                                           </span>
                                       </span>
                                   </th>
                                   <th>Project</th>
                                   <th>Email</th>
                                   <th>Phone</th>
                                   <th>
                                       <span style="display: inline-flex; align-items: center;">
                                           PIC
                                           <span class="sort-icons sort-button" data-sort="pic-name" data-order="asc"
                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
                                               <span class="fas fa-chevron-up" style="font-size: 10px;"></span>
                                               <span class="fas fa-chevron-down" style="font-size: 10px;"></span>
                                           </span>
                                       </span>
                                   </th>
                                   <th>
                                       <span style="display: inline-flex; align-items: center;">
                                           Category
                                           <span class="sort-icons sort-button" data-sort="product-category"
                                               data-order="asc"
                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
                                               <span class="fas fa-chevron-up" style="font-size: 10px;"></span>
                                               <span class="fas fa-chevron-down" style="font-size: 10px;"></span>
                                           </span>
                                       </span>
                                   </th>
                                   {{-- <th>Status</th> --}}
                                   <th>Project Masuk</th>
                                   <th>Deadline</th>
                                   <th>Action</th>
                               </tr>

                               <script>
                                   document.querySelectorAll('.sort-button').forEach(button => {
                                       button.addEventListener('click', function() {
                                           const sortKey = this.getAttribute('data-sort');
                                           const order = this.getAttribute('data-order');

                                           // Toggle sort order
                                           const newOrder = order === 'asc' ? 'desc' : 'asc';
                                           this.setAttribute('data-order', newOrder);

                                           const table = document.querySelector('.table tbody');
                                           const rows = Array.from(table.rows);

                                           // Sort rows
                                           rows.sort((a, b) => {
                                               const aValue = a.querySelector(`td:nth-child(${sortKey === 'id' ? 2 : 3})`)
                                                   .textContent; // Ganti 2/3 dengan nomor kolom yang sesuai
                                               const bValue = b.querySelector(`td:nth-child(${sortKey === 'id' ? 2 : 3})`)
                                                   .textContent;

                                               return (order === 'asc' ? aValue.localeCompare(bValue) : bValue.localeCompare(
                                                   aValue));
                                           });

                                           // Clear and append sorted rows
                                           table.innerHTML = '';
                                           rows.forEach(row => table.appendChild(row));
                                       });
                                   });
                               </script>
                           </thead>
                           <tbody>
                               @foreach ($projects as $key => $project)
                                   <tr style="height: 80px;">
                                       <td style="align-content: center"><input type="checkbox" class="client-checkbox"
                                               value="{{ $project->id }}">
                                       </td>
                                       <td></td>
                                       <td style="align-content: center">
                                           {{ ($projects->currentPage() - 1) * $projects->perPage() + $key + 1 }}</td>
                                       <td style="align-content: center" data-key="client-name">
                                           {{ $project->client_name }}</td>
                                       <td style="align-content: center" data-key="client-name">
                                           {{ $project->project_name }}</td>
                                       <td style="align-content: center">
                                           {{ $project->email }}
                                           <span class="sort-icons toggle-chevron" aria-expanded="false"
                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
                                               <span class="fas fa-chevron-down" style="font-size: 10px;"></span>
                                           </span>
                                       </td>
                                       <td style="align-content: center">{{ $project->phone }}</td>
                                       <td style="align-content: center" data-key="pic-name">{{ $project->pic_name }}
                                       </td>
                                       <td style="align-content: center">{{ $project->category }}</td>
                                       {{-- <td style="align-content: center">{{ $project->status }}</td> --}}
                                       <td style="align-content: center">{{ $project->tanggal_masuk_project }}</td>
                                       <td style="align-content: center">{{ $project->deadline }}</td>
                                       <td style="align-content: center">
                                           <div class="dropdown text-center">
                                               <i class="bi bi-three-dots" data-bs-toggle="dropdown"
                                                   aria-expanded="false" style="cursor: pointer;"></i>
                                               <ul class="dropdown-menu">
                                                   <li><a class="dropdown-item" data-bs-toggle="modal"
                                                           data-bs-target="#editClientModal-{{ $project->id }}">Edit</a>
                                                   </li>
                                               </ul>

<<<<<<< HEAD
                                                           <div class="modal-body">
                                                               <form method="POST"
                                                                   action="{{ route('clients.update', $client->id) }}">
                                                                   @csrf
                                                                   @method('PUT')
                                                                   <!-- Client Name & Company Name -->
                                                                   <div class="row mb-3">
                                                                       <div class="col">
                                                                           <label for="client_name" class="form-label"
                                                                               style="font-size: 0.7em;">CLIENT
                                                                               NAME</label>
                                                                           <input type="text" class="form-control"
                                                                               id="client_name" name="client_name"
                                                                               value="{{ $client->client_name }}"
                                                                               placeholder="Enter the client name">
                                                                       </div>
                                                                       <div class="col">
                                                                           <label for="company_name" class="form-label"
                                                                               style="font-size: 0.7em;">COMPANY
                                                                               NAME</label>
                                                                           <input type="text" class="form-control"
                                                                               id="company_name" name="company_name"
                                                                               value="{{ $client->company_name }}"
                                                                               placeholder="Enter the company name">
                                                                       </div>
                                                                   </div>

                                                                   <!-- PIC and Product Category -->
                                                                   <div class="row mb-3">
                                                                       <div class="col">
                                                                           <label for="pic_name" class="form-label"
                                                                               style="font-size: 0.7em;">PIC</label>
                                                                           <select class="form-select" id="pic_name"
                                                                               name="pic_name">
                                                                               <option value="{{ $client->pic_name }}"
                                                                                   selected>{{ $client->pic_name }}
                                                                               </option>
                                                                               <option value="1">PIC 1</option>
                                                                               <option value="2">PIC 2</option>
                                                                           </select>
                                                                       </div>
                                                                       <div class="col">
                                                                           <label for="product_category"
                                                                               class="form-label"
                                                                               style="font-size: 0.7em;">CATEGORY
                                                                               PRODUCT</label>
                                                                           <select class="form-select"
                                                                               id="product_category"
                                                                               name="product_category">
                                                                               <option
                                                                                   value="{{ $client->product_category }}"
                                                                                   selected>
                                                                                   {{ $client->product_category }}
                                                                               </option>
                                                                               <option value="1">Category 1
                                                                               </option>
                                                                               <option value="2">Category 2
                                                                               </option>
                                                                           </select>
                                                                       </div>
                                                                   </div>

                                                                   <!-- Email & Phone -->
                                                                   <div class="row mb-3">
                                                                       <div class="col">
                                                                           <label for="email" class="form-label"
                                                                               style="font-size: 0.7em;">EMAIL</label>
                                                                           <input type="email" name="email"
                                                                               class="form-control @error('email') is-invalid @enderror"
                                                                               id="email" name="email"
                                                                               placeholder="Enter email"
                                                                               value="{{ $client->email }}" required
                                                                               autofocus>
                                                                           @error('email')
                                                                               <div id="emailHelp"
                                                                                   class="form-text text-danger">
                                                                                   {{ $message }}
                                                                               </div>
                                                                           @enderror

                                                                       </div>
                                                                       <div class="col">
                                                                           <label for="phone" class="form-label"
                                                                               style="font-size: 0.7em;">PHONE</label>
                                                                           <input type="text" class="form-control"
                                                                               id="phone" name="phone"
                                                                               value="{{ $client->phone }}"
                                                                               placeholder="Enter the client's phone number">
                                                                       </div>
                                                                   </div>

                                                                   <!-- Address -->
                                                                   <div class="mb-3">
                                                                       <label for="address" class="form-label"
                                                                           style="font-size: 0.7em;">ADDRESS</label>
                                                                       <input type="text" class="form-control"
                                                                           id="address" name="address"
                                                                           value="{{ $client->address }}"
                                                                           placeholder="Enter the client's company address">
                                                                   </div>

                                                                   <!-- Submit Button -->
                                                                   <button type="submit"
                                                                       class="btn btn-dark w-100">Submit</button>
                                                               </form>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>

                                               {{-- <script>
                                                   // Assuming you have edit buttons with class "edit-btn" and data attributes for the client
                                                   document.querySelectorAll('.edit-btn').forEach(button => {
                                                       button.addEventListener('click', function() {
                                                           const clientId = this.getAttribute('data-id');
                                                           const clientName = this.getAttribute('data-client-name');
                                                           const companyName = this.getAttribute('data-company-name');
                                                           const picName = this.getAttribute('data-pic-name');
                                                           const productCategory = this.getAttribute('data-product-category');
                                                           const email = this.getAttribute('data-email');
                                                           const phone = this.getAttribute('data-phone');
                                                           const address = this.getAttribute('data-address');

                                                           // Populate the modal fields
                                                           document.getElementById('edit_client_id').value = clientId;
                                                           document.getElementById('edit_client_name').value = clientName;
                                                           document.getElementById('edit_company_name').value = companyName;
                                                           document.getElementById('edit_pic_name').value = picName;
                                                           document.getElementById('edit_product_category').value = productCategory;
                                                           document.getElementById('edit_email').value = email;
                                                           document.getElementById('edit_phone').value = phone;
                                                           document.getElementById('edit_address').value = address;

                                                           // Update the form action to point to the correct client update route
                                                           const formAction = document.getElementById('editClientForm').action.replace(':id',
                                                               clientId);
                                                           document.getElementById('editClientForm').action = formAction;

                                                           // Show the modal
                                                           $('#editClientModal').modal('show');
                                                       });
                                                   });
                                               </script> --}}
=======
                                               {{-- Edit Modal --}}
                                               @include('components.dashboard.edit-project')
>>>>>>> 97a980b1a6642aef7dc1e0d698092798fed04118

                                           </div>
                                       </td>
                                   </tr>
                                   <tr class="collapse-row" style="display: none;">
                                       <td></td>
                                       <td colspan="3">
                                           <div class="collapse-content"
                                               style="overflow: hidden; height: 0; transition: height 0.5s ease;">
                                               <span>{{ $project->company_name }}</span>
                                               <i class="fa-regular fa-copy" style="margin-left: 20px; cursor: pointer;"
                                                   onclick="copyText('{{ $project->company_name }}')"></i>
                                           </div>
                                       </td>
                                       <td colspan="8">
                                           <div class="collapse-content1"
                                               style="overflow: hidden; height: 0; transition: height 0.5s ease;">
                                               <span>{{ $project->address }}</span>
                                               <i class="fa-regular fa-copy" style="margin-left: 20px; cursor: pointer;"
                                                   onclick="copyText('{{ $project->address }}')"></i>
                                           </div>
                                       </td>
                                   </tr>
                               @endforeach
                           </tbody>
                       </table>

                       {{-- Pagination --}}
                       @include('components.dashboard.pagination')

                   </div>
               </div>
           </div>
       </section>
   @endsection
