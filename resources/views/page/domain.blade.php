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
                               <h1>Domain</h1>
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


                                   <!-- Add Domain Button -->
                                   <button class="btn btn-add-project btn1hvr" data-bs-toggle="modal"
                                       data-bs-target="#addDomainModal">Add
                                       Domain <i class="fa fa-plus"></i>
                                   </button>

                                   <!-- Add Domain Modal -->
                                   <!-- Add Domain Modal -->
                                   <div class="modal fade" id="addDomainModal" tabindex="-1"
                                       aria-labelledby="addDomainModalLabel" aria-hidden="true">
                                       <div class="modal-dialog">
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <h5 class="modal-title" id="addDomainModalLabel">Add Domain</h5>
                                                   <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                       aria-label="Close"></button>
                                               </div>
                                               <div class="modal-body">
                                                   <form method="POST" action="{{ route('domain.store') }}"
                                                       id="addDomainForm">
                                                       @csrf

                                                       <div class="row mb-3">
                                                           <div class="col">
                                                               <label for="project_name" class="form-label">Project
                                                                   Name</label>
                                                               <input type="text" class="form-control"
                                                                   name="project_name" id="project_name"
                                                                   placeholder="Enter the Project Name" required>
                                                           </div>
                                                       </div>

                                                       <div class="row mb-3">
                                                           <div class="col">
                                                               <label for="domain" class="form-label">Domain</label>
                                                               <input type="text" class="form-control" name="domain"
                                                                   id="domain"
                                                                   placeholder="Enter the Domain (e.g., example.com)"
                                                                   required pattern="^[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
                                                               <div class="invalid-feedback">Please enter a valid domain
                                                                   (e.g., example.com).</div>
                                                           </div>
                                                       </div>

                                                       <div class="row mb-3">
                                                           <div class="col">
                                                               <label for="expired" class="form-label">Expired</label>
                                                               <input type="date" class="form-control" name="expired"
                                                                   id="expired" required>
                                                           </div>
                                                       </div>

                                                       <!-- Submit Button -->
                                                       <button type="submit" class="btn btn-dark w-100"
                                                           onclick="return validateForm()">Add Domain</button>
                                                   </form>
                                               </div>
                                           </div>
                                       </div>
                                   </div>

                                   <script>
                                       function validateForm() {
                                           const domainInput = document.getElementById('domain');
                                           const domainPattern = /^[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

                                           // Check if domain format is valid
                                           if (!domainPattern.test(domainInput.value)) {
                                               domainInput.classList.add('is-invalid');
                                               return false;
                                           } else {
                                               domainInput.classList.remove('is-invalid');
                                           }

                                           return true; // Return true if all validations pass
                                       }
                                   </script>


                                   {{-- End Add Domain Modal --}}

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

                                                   console.log("Selected Domains IDs:", selectedClients); // Debugging

                                                   if (selectedClients.length === 0) {
                                                       alert("No domain selected.");
                                                       return;
                                                   }

                                                   if (confirm("Are you sure you want to delete the selected domains?")) {
                                                       fetch('/domain/delete-multiple', {
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
                                                                   alert("Selected Domains deleted successfully!");
                                                                   location.reload(); // Refresh halaman atau update DOM
                                                               } else {
                                                                   alert("Failed to delete Domains.");
                                                               }
                                                           })
                                                           .catch(error => console.error("Error deleting Domains:", error));
                                                   }

                                               });
                                           </script>
                                       </div>
                                   </th>
                                   <th>
                                       <span style="display: inline-flex; align-items: center;">
                                           No. Id
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
                                           <span class="sort-icons sort-button" data-sort="Domain-name" data-order="asc"
                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
                                               <span class="fas fa-chevron-up" style="font-size: 10px;"></span>
                                               <span class="fas fa-chevron-down" style="font-size: 10px;"></span>
                                           </span>
                                       </span>
                                   </th>

                                   <th>
                                       <span style="display: inline-flex; align-items: center;">
                                           Domain
                                           <span class="sort-icons sort-button" data-sort="domain" data-order="asc"
                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
                                               <span class="fas fa-chevron-up" style="font-size: 10px;"></span>
                                               <span class="fas fa-chevron-down" style="font-size: 10px;"></span>
                                           </span>
                                       </span>
                                   </th>
                                   <th>
                                       <span style="display: inline-flex; align-items: center;">
                                           Expired
                                           <span class="sort-icons sort-button" data-sort="expired" data-order="asc"
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
                               @foreach ($domains as $domain)
                                   <tr style="height: 80px;">
                                       <td style="align-content: center"><input type="checkbox" class="client-checkbox"
                                               value="{{ $domain->id }}">
                                       </td>
                                       <td style="align-content: center">{{ $domain->id }}</td>
                                       <td style="align-content: center" data-key="client-name">
                                           {{ $domain->project_name }}</td>
                                       <td style="align-content: center" data-key="product-domain">
                                           {{ $domain->domain }}
                                           {{-- <span class="sort-icons toggle-chevron" aria-expanded="false"
                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
                                               <span class="fas fa-chevron-down" style="font-size: 10px;"></span>
                                           </span> --}}
                                       </td>
                                       <td style="align-content: center" data-key="pic-name">{{ $domain->expired }}
                                       </td>
                                       <td style="align-content: center">
                                           <div class="dropdown text-center">
                                               <i class="bi bi-three-dots" data-bs-toggle="dropdown"
                                                   aria-expanded="false" style="cursor: pointer;"></i>
                                               <ul class="dropdown-menu">
                                                   <li><a class="dropdown-item" data-bs-toggle="modal"
                                                           data-bs-target="#editDomainModal-{{ $domain->id }}">Edit</a>
                                                   </li>
                                               </ul>
                                               {{-- Edit Data Domain --}}
                                               <div class="modal fade" id="editDomainModal-{{ $domain->id }}"
                                                   tabindex="-1" aria-labelledby="editDomainModalLabel"
                                                   aria-hidden="true">
                                                   <div class="modal-dialog modal-lg">
                                                       <div class="modal-content">
                                                           <div class="modal-header" style="display: block;">
                                                               <h5 class="modal-title" id="editDomainModalLabel">Edit
                                                                   Data
                                                                   Domain</h5>
                                                               <p style="margin-top: 2px;"></p>
                                                               <button type="button" class="btn-close"
                                                                   data-bs-dismiss="modal" aria-label="Close"
                                                                   style="position: absolute; right: 10px; top: 10px;"></button>
                                                           </div>

                                                           <div class="modal-body">
                                                               <form method="POST"
                                                                   action="{{ route('domain.update', $domain->id) }}">
                                                                   @csrf
                                                                   @method('PUT')
                                                                   <!-- Domain Name & Company Name -->

                                                                   <div class="row mb-3">
                                                                       <div class="col">
                                                                           <label name="project_name" for="project_name"
                                                                               id="project_name"
                                                                               class="form-label">Project
                                                                               Name</label>
                                                                           <input type="text" class="form-control"
                                                                               name="project_name" for="project_name"
                                                                               id="project_name"
                                                                               value="{{ $domain->project_name }}"
                                                                               placeholder="Enter the Project Name">
                                                                       </div>
                                                                   </div>

                                                                   <div class="row mb-3">
                                                                       <div class="col">
                                                                           <label name="domain" for="domain"
                                                                               id="domain"
                                                                               class="form-label">Domain</label>
                                                                           <input type="text" class="form-control"
                                                                               name="domain" for="domain"
                                                                               id="domain"
                                                                               value="{{ $domain->domain }}"
                                                                               placeholder="Enter the Domain">
                                                                       </div>
                                                                   </div>
                                                                   <div class="row mb-3">
                                                                       <div class="col">
                                                                           <label name="expired" for="expired"
                                                                               id="expired"
                                                                               class="form-label">Expired</label>
                                                                           <input type="date" class="form-control"
                                                                               name="expired" for="expired"
                                                                               id="expired"
                                                                               value="{{ $domain->expired }}"
                                                                               placeholder="Enter the Expired">
                                                                       </div>
                                                                   </div>
                                                                   <!-- Submit Button -->
                                                                   <button type="submit"
                                                                       class="btn btn-dark w-100">Update
                                                                       Domain</button>
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
                                                           const productdomain = this.getAttribute('data-product-domain');
                                                           const email = this.getAttribute('data-email');
                                                           const phone = this.getAttribute('data-phone');
                                                           const address = this.getAttribute('data-address');

                                                           // Populate the modal fields
                                                           document.getElementById('edit_client_id').value = clientId;
                                                           document.getElementById('edit_project_name').value = clientName;
                                                           document.getElementById('edit_domain').value = companyName;
                                                           document.getElementById('edit_expired').value = picName;
                                                           document.getElementById('edit_product_domain').value = productdomain;
                                                           document.getElementById('edit_email').value = email;
                                                           document.getElementById('edit_phone').value = phone;
                                                           document.getElementById('edit_address').value = address;

                                                           // Update the form action to point to the correct client update route
                                                           const formAction = document.getElementById('editClientForm').action.replace(':id',
                                                               clientId);
                                                           document.getElementById('editClientForm').action = formAction;

                                                           // Show the modal
                                                           $('#editDomainModal').modal('show');
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
                                               <span>{{ $client->domain }}</span>
                                               <i class="fa-regular fa-copy" style="margin-left: 90px;"
                                                   onclick="copyText('{{ $client->domain }}')"></i>
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
                               @if ($domains->onFirstPage())
                                   <li class="page-item disabled">
                                       <span class="page-link" style="background-color: #082F1B; border-radius: 5px;">
                                           <i style="color: white;" class="fa-solid fa-chevron-left"></i>
                                       </span>
                                   </li>
                               @else
                                   <li class="page-item">
                                       <a class="page-link" href="{{ $domains->previousPageUrl() }}"
                                           style="background-color: #082F1B; border-radius: 5px;">
                                           <i style="color: white;" class="fa-solid fa-chevron-left"></i>
                                       </a>
                                   </li>
                               @endif

                               <!-- Tombol Angka Halaman dengan Batas 10 -->
                               @if ($domains->lastPage() > 10)
                                   <!-- Tampilkan halaman pertama -->
                                   <li class="page-item {{ $domains->currentPage() == 1 ? 'active' : '' }}">
                                       <a class="page-link1" href="{{ $domains->url(1) }}">1</a>
                                   </li>

                                   @if ($domains->currentPage() > 5)
                                       <!-- Tambahkan titik tiga jika halaman saat ini lebih dari 5 -->
                                       <li class="page-item disabled"><span class="page-link1">...</span></li>
                                   @endif

                                   <!-- Loop untuk menampilkan 5 halaman di sekitar halaman saat ini -->
                                   @for ($i = max(2, $domains->currentPage() - 2); $i <= min($domains->lastPage() - 1, $domains->currentPage() + 2); $i++)
                                       <li class="page-item {{ $domains->currentPage() == $i ? 'active' : '' }}">
                                           <a class="page-link1" href="{{ $domains->url($i) }}">{{ $i }}</a>
                                       </li>
                                   @endfor

                                   @if ($domains->currentPage() < $domains->lastPage() - 4)
                                       <!-- Tambahkan titik tiga jika halaman saat ini kurang dari halaman terakhir - 4 -->
                                       <li class="page-item disabled"><span class="page-link1">...</span></li>
                                   @endif

                                   <!-- Tampilkan halaman terakhir -->
                                   <li
                                       class="page-item {{ $domains->currentPage() == $domains->lastPage() ? 'active' : '' }}">
                                       <a class="page-link1"
                                           href="{{ $domains->url($domains->lastPage()) }}">{{ $domains->lastPage() }}</a>
                                   </li>
                               @else
                                   <!-- Jika halaman kurang dari atau sama dengan 10, tampilkan semua halaman -->
                                   @for ($i = 1; $i <= $domains->lastPage(); $i++)
                                       <li class="page-item {{ $domains->currentPage() == $i ? 'active' : '' }}">
                                           <a class="page-link1" href="{{ $domains->url($i) }}">{{ $i }}</a>
                                       </li>
                                   @endfor
                               @endif

                               <!-- Tombol Next -->
                               @if ($domains->hasMorePages())
                                   <li class="page-item">
                                       <a class="page-link" href="{{ $domains->nextPageUrl() }}"
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
