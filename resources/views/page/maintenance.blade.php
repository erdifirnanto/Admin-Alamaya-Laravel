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
                               <h1>Maintenance</h1>
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
                                   {{-- <th>Action</th> --}}
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
                               @foreach ($projects as $project)
                                   <tr style="height: 80px;">
                                       <td style="align-content: center"><input type="checkbox" class="client-checkbox"
                                               value="{{ $project->id }}">
                                       </td>
                                       <td style="align-content: center">{{ $project->id }}</td>
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
                                                   <p style="margin: 0; color: rgb(8, 230, 126); font-size:14px;">Slicing
                                                   </p>
                                               @elseif ($project->status == 'new_project')
                                                   <p style="margin: 0; color: rgb(167, 6, 6) ; font-size:14px;">New
                                                   </p>
                                               @elseif ($project->status == 'Maintenance')
                                                   <p style="margin: 0; color: rgb(250, 47, 47); font-size:14px;">
                                                       Maintenance
                                                   </p>
                                               @endif
                                           </div>
                                       </td>

                                       <td style="align-content: center">
                                           {{ $project->deadline }}
                                       </td>
                                       <td hidden style="align-content: center">
                                           <div class="dropdown text-center">
                                               <i class="bi bi-three-dots" data-bs-toggle="dropdown"
                                                   aria-expanded="false" style="cursor: pointer;"></i>
                                               <ul class="dropdown-menu">
                                                   <li><a class="dropdown-item" data-bs-toggle="modal"
                                                           data-bs-target="#editProjectModal-{{ $project->id }}">Ubah
                                                           Status</a>
                                                   </li>
                                               </ul>

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
                                                                   <!-- Project Name -->
                                                                   <div class="row mb-3" hidden>
                                                                       <div class="col">
                                                                           <label name="project_name" for="project_name"
                                                                               id="project_name"
                                                                               class="form-label">Project
                                                                               Name</label>
                                                                           <input type="text" class="form-control"
                                                                               name="project_name" for="project_name"
                                                                               id="project_name"
                                                                               value="{{ $project->project_name }}"
                                                                               placeholder="Enter the Project Name">
                                                                       </div>
                                                                   </div>

                                                                   <!-- PIC and Product Category -->
                                                                   <div class="row mb-3" hidden>
                                                                       <div class="col">
                                                                           <label name="category" for="category"
                                                                               id="category" class="form-label">Category
                                                                               Product</label>
                                                                           <select class="form-select" name="category"
                                                                               for="category" id="category">
                                                                               <option value="{{ $project->category }}"
                                                                                   selected>{{ $project->category }}
                                                                               </option>
                                                                               <option value="1">Category 1</option>
                                                                               <option value="2">Category 2</option>
                                                                           </select>
                                                                       </div>
                                                                       <div class="col">
                                                                           <label name="pic_name" for="pic_name"
                                                                               id="pic_name"
                                                                               class="form-label">PIC</label>
                                                                           <select class="form-select" name="pic_name"
                                                                               for="pic_name" id="pic_name">
                                                                               <option value="{{ $project->pic_name }}"
                                                                                   selected>{{ $project->pic_name }}
                                                                               </option>
                                                                               <option value="1">PIC 1</option>
                                                                               <option value="2">PIC 2</option>
                                                                           </select>
                                                                       </div>
                                                                   </div>
                                                                   <div class="row mb-3">
                                                                       <div class="col">
                                                                           <label name="status" for="status"
                                                                               id="status"
                                                                               class="form-label">Status</label>
                                                                           <select class="form-select" name="status"
                                                                               for="status" id="status">
                                                                               <option value="{{ $project->status }}"
                                                                                   selected>{{ $project->status }}
                                                                               </option>
                                                                               <option value="Mindmap">Mindmap</option>
                                                                               <option value="Design">Design</option>
                                                                               <option value="Slicing">Slicing</option>
                                                                               <option value="Maintenance">Maintenance
                                                                               </option>
                                                                           </select>
                                                                       </div>
                                                                   </div>

                                                                   <!-- Tanggal Project Masuk -->
                                                                   <div class="row mb-3" hidden>
                                                                       <div class="col">
                                                                           <label id="tanggal_masuk_project"
                                                                               name="tanggal_masuk_project"
                                                                               for="tanggal_masuk_project"
                                                                               class="form-label">Tanggal Project
                                                                               Masuk</label>
                                                                           <input name="tanggal_masuk_project"
                                                                               for="tanggal_masuk_project" type="date"
                                                                               class="form-control"
                                                                               id="tanggal_masuk_project"
                                                                               value="{{ $project->tanggal_masuk_project }}"
                                                                               placeholder="Tanggal project masuk">
                                                                       </div>
                                                                   </div>

                                                                   <!-- Deadline -->
                                                                   <div class="mb-3" hidden>
                                                                       <label name="deadline" for="deadline"
                                                                           id="deadline"
                                                                           class="form-label">Deadline</label>
                                                                       <input name="deadline" for="deadline"
                                                                           type="date" class="form-control"
                                                                           id="deadline"
                                                                           value="{{ $project->deadline }}"
                                                                           placeholder="Enter the project Deadline">
                                                                   </div>

                                                                   {{-- <!-- Disclaimer -->
                                                                   <div class="form-check mb-3">
                                                                       <input type="checkbox" class="form-check-input"
                                                                           id="termsCheck">
                                                                       <label class="form-check-label" for="termsCheck">
                                                                           By registering, you agree to the terms and
                                                                           conditions that apply.
                                                                       </label>
                                                                   </div>

                                                                   <div class="form-text mb-3">Check again and make
                                                                       sure the form is completely filled out</div> --}}

                                                                   <!-- Submit Button -->
                                                                   <button type="submit" class="btn btn-dark w-100"
                                                                       onclick="showAlertUpdate()">Update</button>
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
