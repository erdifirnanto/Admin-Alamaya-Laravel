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
                               <h1>Alamaya Projects on Progress</h1>
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

                                               const clientId = this.getAttribute('data-id');

                                               // Langsung lakukan penghapusan tanpa konfirmasi
                                               fetch(`/clients/${clientId}`, {
                                                       method: 'DELETE',
                                                       headers: {
                                                           'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                                               .getAttribute('content')
                                                       }
                                                   })
                                                   .then(response => response.json())
                                                   .then(data => {
                                                       if (data.success) {
                                                           alert("Client deleted successfully!");
                                                           location.reload(); // Refresh halaman atau update DOM
                                                       } else {
                                                           alert("Failed to delete client.");
                                                       }
                                                   })
                                           });
                                       });
                                   </script>

                                   {{-- End Add Project Modal --}}

                                   {{-- @if (session('success'))
                                       <div class="alert alert-success">
                                           {{ session('success') }}
                           </div>
                           @endif --}}

                                   <script>
                                       function showAlert() {
                                           alert('Data berhasil ditambahkan!');
                                       }

                                       function showAlertUpdate() {
                                           alert('Data berhasil diupdate!');
                                       }
                                   </script>

                                   <!-- Dropdown Button -->
                                   <button class="btn btn-dropdown dropdown-toggle srtby" type="button"
                                       id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                       Sort by
                                   </button>
                                   <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                       <li><button class="dropdown-item sort-button" data-sort="id" data-order="asc">By
                                               ID</button></li>
                                       <li><button class="dropdown-item sort-button" data-sort="project_name"
                                               data-order="asc">By Name</button></li>
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
                                                   const selectedClients = [];
                                                   document.querySelectorAll('.client-checkbox:checked').forEach(checkbox => {
                                                       selectedClients.push(checkbox.value);
                                                   });

                                                   console.log("Selected Projects IDs:", selectedClients); // Debugging

                                                   if (selectedClients.length === 0) {
                                                       alert("No project selected.");
                                                       return;
                                                   }

                                                   if (confirm("Are you sure you want to delete the selected project?")) {
                                                       fetch('/project/delete-multiple', {
                                                               method: 'POST',
                                                               headers: {
                                                                   'Content-Type': 'application/json',
                                                                   'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                                                       'content')
                                                               },
                                                               body: JSON.stringify({
                                                                   ids: selectedClients
                                                               })
                                                           })
                                                           .then(response => response.json())
                                                           .then(data => {
                                                               if (data.success) {
                                                                   alert("Selected projects deleted successfully!");
                                                                   location.reload(); // Refresh halaman atau update DOM
                                                               } else {
                                                                   alert("Failed to delete projects.");
                                                               }
                                                           })
                                                           .catch(error => console.error("Error deleting projects:", error));
                                                   }

                                               });
                                           </script>
                                       </div>
                                   </th>
                                   <th>
                                       <span style="display: inline-flex; align-items: center;">
                                           Project Id
                                           <span class="sort-icons sort-button" data-sort="id" data-order="asc"
                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
                                               <span class="fas fa-chevron-up" style="font-size: 10px;"></span>
                                               <span class="fas fa-chevron-down" style="font-size: 10px;"></span>
                                           </span>
                                       </span>
                                   </th>
                                   <th>
                                       <span style="display: inline-flex; align-items: center;">
                                           Project Name
                                           <span class="sort-icons sort-button" data-sort="client-name" data-order="asc"
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
                                           Status
                                           <span class="sort-icons sort-button" data-sort="status" data-order="asc"
                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
                                               <span class="fas fa-chevron-up" style="font-size: 10px;"></span>
                                               <span class="fas fa-chevron-down" style="font-size: 10px;"></span>
                                           </span>
                                       </span>
                                   </th>
                                   <th>
                                       <span style="display: inline-flex; align-items: center;">
                                           Deadline
                                           <span class="sort-icons sort-button" data-sort="deadline" data-order="asc"
                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
                                               <span class="fas fa-chevron-up" style="font-size: 10px;"></span>
                                               <span class="fas fa-chevron-down" style="font-size: 10px;"></span>
                                           </span>
                                       </span>
                                   </th>
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
                                       <td style="align-content: center">
                                           {{ ($projects->currentPage() - 1) * $projects->perPage() + $key + 1 }}</td>
                                       {{-- <td style="align-content: center">{{ $project->id }}</td> --}}
                                       <td style="align-content: center" data-key="client-name">
                                           {{ $project->project_name }}
                                       </td>
                                       <td style="align-content: center" data-key="product-category">
                                           {{ $project->category }}
                                           {{-- <span class="sort-icons toggle-chevron" aria-expanded="false"
                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
                                               <span class="fas fa-chevron-down" style="font-size: 10px;"></span>
                                           </span> --}}
                                       </td>
                                       <td style="align-content: center" data-key="pic-name">{{ $project->pic_name }}
                                       </td>
                                       <td style="align-content: center;">
                                           <div class="btn rounded-5 align-top d-flex justify-content-center align-items-center"
                                               style="height: 4vh; width: 100px; background-color: #f8e2f7; border: 2px solid #f8e2f7;">
                                               @if ($project->status == 'Mindmap')
                                                   <p style="margin: 0; color: rgb(144, 25, 255); font-size:14px;">Mindmap
                                                   </p>
                                               @elseif ($project->status == 'Design')
                                                   <p style="margin: 0; color: rgb(255, 128, 25); font-size:14px;">Design
                                                   </p>
                                               @elseif ($project->status == 'Slicing')
                                                   <p style="margin: 0; color: rgb(8, 41, 230); font-size:14px;">Slicing
                                                   </p>
                                               @elseif ($project->status == 'Selesai')
                                                   <p style="margin: 0; color: rgb(8, 160, 89) ; font-size:14px;">Selesai
                                                   </p>
                                               @elseif ($project->status == 'new_project')
                                                   <p style="margin: 0; color: rgb(167, 6, 6) ; font-size:14px;">New
                                                   </p>
                                               @endif
                                           </div>
                                       </td>

                                       <td style="align-content: center">
                                           {{ $project->deadline }}
                                       </td>
                                       <td style="align-content: center">
                                           <div class="dropdown text-center">
                                               <i class="fas fa-edit" style="cursor: pointer;" aria-expanded="false"
                                                   data-bs-toggle="modal"
                                                   data-bs-target="#editProjectModal-{{ $project->id }}"></i>

                                               {{-- Edit Data Project --}}
                                               <div style="text-align: left" class="modal fade"
                                                   id="editProjectModal-{{ $project->id }}" tabindex="-1"
                                                   aria-labelledby="editProjectModalLabel" aria-hidden="true">
                                                   <div class="modal-dialog modal-lg">
                                                       <div class="modal-content">
                                                           <div class="modal-header" style="display: block;">
                                                               <h5 class="modal-title" id="editProjectModalLabel">Ubah
                                                                   Status Project</h5>
                                                               <p style="margin-top: 2px;"></p>
                                                               <button type="button" class="btn-close"
                                                                   data-bs-dismiss="modal" aria-label="Close"
                                                                   style="position: absolute; right: 10px; top: 10px;"></button>
                                                           </div>

                                                           <div class="modal-body">
                                                               <form method="POST"
                                                                   action="{{ route('project.update', [$project->id, 'from' => 'onprogress']) }}">
                                                                   @csrf
                                                                   @method('PUT')
                                                                   <div hidden class="row mb-3">
                                                                       <div hidden class="col">
                                                                           <label for="client_name" class="form-label"
                                                                               style="font-size: 0.7em; font-weight: bold;">CLIENT
                                                                               NAME</label>
                                                                           <input type="text"
                                                                               class="form-control @error('client_name') is-invalid @enderror"
                                                                               id="client_name" name="client_name"
                                                                               placeholder="Enter the client name"
                                                                               value="{{ $project->client_name }}"
                                                                               required>
                                                                           @error('client_name')
                                                                               <div class="invalid-feedback">
                                                                                   {{ $message }}</div>
                                                                           @enderror
                                                                       </div>
                                                                       <div hidden class="col">
                                                                           <label for="company_name" class="form-label"
                                                                               style="font-size: 0.7em; font-weight: bold;">COMPANY
                                                                               NAME</label>
                                                                           <input type="text"
                                                                               class="form-control @error('company_name') is-invalid @enderror"
                                                                               id="company_name" name="company_name"
                                                                               placeholder="Enter the company name"
                                                                               value="{{ $project->company_name }}"
                                                                               required>
                                                                           @error('company_name')
                                                                               <div class="invalid-feedback">
                                                                                   {{ $message }}</div>
                                                                           @enderror
                                                                       </div>
                                                                   </div>
                                                                   {{-- Project Name & Tanggal Project Masuk --}}
                                                                   <div hidden class="row mb-3">
                                                                       <div class="col">
                                                                           <label for="project_name" class="form-label"
                                                                               style="font-size: 0.7em; font-weight: bold;">PROJECT
                                                                               NAME</label>
                                                                           <input type="text"
                                                                               class="form-control @error('project_name') is-invalid @enderror"
                                                                               id="project_name" name="project_name"
                                                                               placeholder="Enter the project name"
                                                                               value="{{ $project->project_name }}"
                                                                               required>
                                                                           @error('project_name')
                                                                               <div class="invalid-feedback">
                                                                                   {{ $message }}</div>
                                                                           @enderror
                                                                       </div>
                                                                       <div hidden class="col">
                                                                           <label for="tanggal_masuk_project"
                                                                               class="form-label"
                                                                               style="font-size: 0.7em; font-weight: bold;">TANGGAL
                                                                               PROJECT MASUK
                                                                           </label>
                                                                           <input type="date"
                                                                               class="form-control @error('tanggal_masuk_project') is-invalid @enderror"
                                                                               id="tanggal_masuk_project"
                                                                               name="tanggal_masuk_project"
                                                                               placeholder="Enter Date"
                                                                               value="{{ $project->tanggal_masuk_project }}"
                                                                               required>
                                                                           @error('tanggal_masuk_project')
                                                                               <div class="invalid-feedback">
                                                                                   {{ $message }}</div>
                                                                           @enderror
                                                                       </div>
                                                                   </div>
                                                                   <!-- PIC and Category -->
                                                                   <div hidden class="row mb-3">
                                                                       <div class="col">
                                                                           <label for="pic_name" class="form-label"
                                                                               style="font-size: 0.7em; font-weight: bold;">PIC</label>
                                                                           <select
                                                                               class="form-select @error('pic_name') is-invalid @enderror"
                                                                               id="pic_name" name="pic_name" required>
                                                                               <option selected
                                                                                   value="{{ $project->pic_name }}">
                                                                                   {{ $project->pic_name }}
                                                                               </option>
                                                                               {{-- @foreach ($users as $user)
                                                                       <option value="{{ $user->name }}"
                                                                           {{ old('$user->name') == '$user->name' ? 'selected' : '' }}>
                                                                           {{ $user->name }}
                                                                       </option>
                                                                   @endforeach --}}
                                                                               <option value="Handika Wicaksana"
                                                                                   {{ old('pic_name') == 'Handika Wicaksana' ? 'selected' : '' }}>
                                                                                   Handika Wicaksana</option>
                                                                               <option value="Widia Hadi Purwanti"
                                                                                   {{ old('pic_name') == 'Widia Hadi Purwanti' ? 'selected' : '' }}>
                                                                                   Widia Hadi Purwanti</option>
                                                                           </select>
                                                                           @error('pic_name')
                                                                               <div class="invalid-feedback">
                                                                                   {{ $message }}</div>
                                                                           @enderror
                                                                       </div>
                                                                       <div hidden class="col">
                                                                           <label for="category" class="form-label"
                                                                               style="font-size: 0.7em; font-weight: bold;">CATEGORY
                                                                               PRODUCT</label>
                                                                           <select
                                                                               class="form-select @error('category') is-invalid @enderror"
                                                                               id="category" name="category" required>
                                                                               <option selected
                                                                                   value="{{ $project->category }}">
                                                                                   {{ $project->category }}
                                                                               </option>
                                                                               <option value="Maintenance"
                                                                                   {{ old('category') == 'Maintenance' ? 'selected' : '' }}>
                                                                                   Maintenance</option>
                                                                               <option value="Hosting"
                                                                                   {{ old('category') == 'Hosting' ? 'selected' : '' }}>
                                                                                   Hosting</option>
                                                                                   <option value="Re-Design"
                                                                                   {{ old('category') == 'Re-Design' ? 'selected' : '' }}>
                                                                                   Re-Design</option>
                                                                           </select>
                                                                           @error('category')
                                                                               <div class="invalid-feedback">
                                                                                   {{ $message }}</div>
                                                                           @enderror
                                                                       </div>
                                                                   </div>
                                                                   {{-- Email & Deadline --}}
                                                                   <div hidden class="row mb-3">
                                                                       <div class="col">
                                                                           <label for="email" class="form-label"
                                                                               style="font-size: 0.7em; font-weight: bold;">EMAIL</label>
                                                                           <input type="email" name="email"
                                                                               class="form-control @error('email') is-invalid @enderror"
                                                                               id="email" name="email"
                                                                               for="email" placeholder="Enter email"
                                                                               value="{{ $project->email }}" required
                                                                               autofocus>
                                                                           @error('email')
                                                                               <div id="emailHelp"
                                                                                   class="form-text text-danger">
                                                                                   {{ $message }}</div>
                                                                           @enderror
                                                                       </div>
                                                                       <div hidden class="col">
                                                                           <label for="deadline" class="form-label"
                                                                               style="font-size: 0.7em; font-weight: bold;">DEADLINE</label>
                                                                           <input type="date" name="deadline"
                                                                               class="form-control @error('deadline') is-invalid @enderror"
                                                                               id="deadline" name="deadline"
                                                                               for="deadline" placeholder="Enter deadline"
                                                                               value="{{ $project->deadline }}" required
                                                                               autofocus>
                                                                           @error('deadline')
                                                                               <div id="emailHelp"
                                                                                   class="form-text text-danger">
                                                                                   {{ $message }}</div>
                                                                           @enderror
                                                                       </div>
                                                                   </div>
                                                                   <!-- Address & Phone & Hidden Status-->
                                                                   <div hidden class="row mb-3">
                                                                       <div class="col">
                                                                           <label for="phone" class="form-label"
                                                                               style="font-size: 0.7em; font-weight: bold;">PHONE</label>
                                                                           <input type="text"
                                                                               class="form-control @error('phone') is-invalid @enderror"
                                                                               id="phone" name="phone"
                                                                               placeholder="Enter the client's phone number"
                                                                               value="{{ $project->phone }}"
                                                                               inputmode="numeric" pattern="\d+"
                                                                               required>
                                                                           @error('phone')
                                                                               <div class="invalid-feedback">
                                                                                   {{ $message }}</div>
                                                                           @enderror
                                                                       </div>
                                                                       <div hidden class="col">
                                                                           <label for="address" class="form-label"
                                                                               style="font-size: 0.7em; font-weight: bold;">ADDRESS</label>
                                                                           <input type="text"
                                                                               class="form-control @error('address') is-invalid @enderror"
                                                                               id="address" name="address"
                                                                               placeholder="Enter the client's company address"
                                                                               value="{{ $project->address }}" required>
                                                                           @error('address')
                                                                               <div class="invalid-feedback">
                                                                                   {{ $message }}</div>
                                                                           @enderror
                                                                       </div>

                                                                   </div>
                                                                   {{-- STATUS HIDDEN INPUT --}}
                                                                   <div class="row mb-3">
                                                                       <div class="col">
                                                                           <label name="status" for="status"
                                                                               id="status"
                                                                               class="form-label">Status</label>
                                                                           <select class="form-select" name="status"
                                                                               for="status" id="status">
                                                                               @if ($project->status == 'new_project')
                                                                                   <option value="new_project" selected>New
                                                                                   </option>
                                                                               @else
                                                                                   <option value="{{ $project->status }}"
                                                                                       selected>{{ $project->status }}
                                                                                   </option>
                                                                               @endif
                                                                               <option value="Mindmap">Mindmap</option>
                                                                               <option value="Design">Design</option>
                                                                               <option value="Slicing">Slicing</option>
                                                                               <option value="Maintenance">Maintenance
                                                                               </option>
                                                                               <option value="Selesai">Selesai</option>
                                                                           </select>
                                                                       </div>
                                                                   </div>

                                                                   <script>
                                                                       document.getElementById('phone').addEventListener('input', function(event) {
                                                                           let phone = event.target;
                                                                           // Mengganti semua karakter selain angka
                                                                           phone.value = phone.value.replace(/\D/g, '');
                                                                       });
                                                                   </script>

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
                                                           const pic_name = this.getAttribute('data-pic-name');
                                                           const category = this.getAttribute('data-product-category');
                                                           const email = this.getAttribute('data-email');
                                                           const phone = this.getAttribute('data-phone');
                                                           const address = this.getAttribute('data-address');

                                                           // Populate the modal fields
                                                           document.getElementById('edit_client_id').value = clientId;
                                                           document.getElementById('edit_project_name').value = clientName;
                                                           document.getElementById('edit_company_name').value = companyName;
                                                           document.getElementById('edit_pic_name').value = pic_name;
                                                           document.getElementById('edit_product_category').value = category;
                                                           document.getElementById('edit_email').value = email;
                                                           document.getElementById('edit_phone').value = phone;
                                                           document.getElementById('edit_address').value = address;

                                                           // Update the form action to point to the correct client update route
                                                           const formAction = document.getElementById('editClientForm').action.replace(':id',
                                                               clientId);
                                                           document.getElementById('editClientForm').action = formAction;

                                                           // Show the modal
                                                           $('#editProjectModal').modal('show');
                                                       });
                                                   });
                                               </script> --}}

                                           </div>
                                       </td>
                                   </tr>
                                   {{-- <tr class="collapse-row" style="display: none;">
                                       <td></td>
                                       <td colspan="2">
                                           <div class="collapse-content"
                                               style="overflow: hidden; height: 0; transition: height 0.5s ease;">
                                               <span>{{ $client->company_name }}</span>
                       <i class="fa-regular fa-copy" style="margin-left: 90px;"
                           onclick="copyText('{{ $client->company_name }}')"></i>
           </div>
           </td>
           <td colspan="6">
               <div class="collapse-content1"
                   style="overflow: hidden; height: 0; transition: height 0.5s ease;">
                   <span>{{ $client->address }}</span>
                   <i class="fa-regular fa-copy" style="margin-left: 90px;"
                       onclick="copyText('{{ $client->address }}')"></i>
               </div>
           </td>
           </tr> --}}
                               @endforeach
                           </tbody>
                       </table>


                       <!-- Custom Pagination -->
                       <nav aria-label="Page navigation">
                           <ul class="pagination justify-content-end" style="align-items: center;">
                               <!-- Tombol Previous -->
                               @if ($projects->onFirstPage())
                                   <li class="page-item disabled">
                                       <span class="page-link" style="background-color: #082F1B; border-radius: 5px;">
                                           <i style="color: white;" class="fa-solid fa-chevron-left"></i>
                                       </span>
                                   </li>
                               @else
                                   <li class="page-item">
                                       <a class="page-link" href="{{ $projects->previousPageUrl() }}"
                                           style="background-color: #082F1B; border-radius: 5px;">
                                           <i style="color: white;" class="fa-solid fa-chevron-left"></i>
                                       </a>
                                   </li>
                               @endif

                               <!-- Tombol Angka Halaman dengan Batas 10 -->
                               @if ($projects->lastPage() > 10)
                                   <!-- Tampilkan halaman pertama -->
                                   <li class="page-item {{ $projects->currentPage() == 1 ? 'active' : '' }}">
                                       <a class="page-link1" href="{{ $projects->url(1) }}">1</a>
                                   </li>

                                   @if ($projects->currentPage() > 5)
                                       <!-- Tambahkan titik tiga jika halaman saat ini lebih dari 5 -->
                                       <li class="page-item disabled"><span class="page-link1">...</span></li>
                                   @endif

                                   <!-- Loop untuk menampilkan 5 halaman di sekitar halaman saat ini -->
                                   @for ($i = max(2, $projects->currentPage() - 2); $i <= min($projects->lastPage() - 1, $projects->currentPage() + 2); $i++)
                                       <li class="page-item {{ $projects->currentPage() == $i ? 'active' : '' }}">
                                           <a class="page-link1" href="{{ $projects->url($i) }}">{{ $i }}</a>
                                       </li>
                                   @endfor

                                   @if ($projects->currentPage() < $projects->lastPage() - 4)
                                       <!-- Tambahkan titik tiga jika halaman saat ini kurang dari halaman terakhir - 4 -->
                                       <li class="page-item disabled"><span class="page-link1">...</span></li>
                                   @endif

                                   <!-- Tampilkan halaman terakhir -->
                                   <li
                                       class="page-item {{ $projects->currentPage() == $projects->lastPage() ? 'active' : '' }}">
                                       <a class="page-link1"
                                           href="{{ $projects->url($projects->lastPage()) }}">{{ $projects->lastPage() }}</a>
                                   </li>
                               @else
                                   <!-- Jika halaman kurang dari atau sama dengan 10, tampilkan semua halaman -->
                                   @for ($i = 1; $i <= $projects->lastPage(); $i++)
                                       <li class="page-item {{ $projects->currentPage() == $i ? 'active' : '' }}">
                                           <a class="page-link1" href="{{ $projects->url($i) }}">{{ $i }}</a>
                                       </li>
                                   @endfor
                               @endif

                               <!-- Tombol Next -->
                               @if ($projects->hasMorePages())
                                   <li class="page-item">
                                       <a class="page-link" href="{{ $projects->nextPageUrl() }}"
                                           style="background-color: #082F1B; border-radius: 5px;">
                                           <i style="color: white;" class="fa-solid fa-chevron-right"></i>
                                       </a>
                                   </li>
                               @else
                                   <li class="page-item disabled">
                                       <span class="page-link" style="background-color: #082F1B; border-radius: 5px;">
                                           <i style="color: white;" class="fa-solid fa-chevron-right"></i>
                                       </span>
                                   </li>
                               @endif
                           </ul>
                       </nav>

                   </div>
               </div>
           </div>
       </section>
   @endsection
