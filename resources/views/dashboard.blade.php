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

                                   <!-- Sortby Button -->
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
                                              

                                               {{-- Edit Modal --}}
                                               @include('components.dashboard.edit-project')

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
