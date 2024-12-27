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
                           {{-- Seacrh --}}
                           @include('components.onprogress.search-onprogress')
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

                                   <!-- Sortby Button -->
                                   <button class="btn btn-dropdown dropdown-toggle srtby" type="button"
                                       id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                       Sort by
                                   </button>
                                   <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                       <li><button class="dropdown-item sort-button" data-sort="id" data-order="asc"
                                               onclick="sortTable(1)">By
                                               No</button></li>
                                       <li><button class="dropdown-item sort-button" data-sort="client_name"
                                               data-order="asc" onclick="sortTable(2)">By Name</button></li>
                                   </ul>


                                   <!-- Add dropdown options here if needed -->
                               </div>
                           </div>
                       </div>

                        <div class="table-responsive">
                           <table class="table table-hover table-sm">
                               <table class="table table-hover table-sm">
                                   <thead>
                                       <div style="height: 40px;">
                                           <th scope="col" style="width: 50px">
                                           <input style="cursor: pointer" type="checkbox" id="select-all"
                                                       for="select-all">
                                           <label for="select-all">All</label>
                                           
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
                                           No.
                                           <span class="sort-icons sort-button" data-sort="id" data-order="asc"
                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
                                               <i class="fa fa-sort"></i>
                                           </span>
                                       </span>
                                   </th>
                                   <th>
                                       <span style="display: inline-flex; align-items: center;">
                                           Project Name
                                           <span class="sort-icons sort-button" data-sort="client-name" data-order="asc"
                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
                                               <i class="fa fa-sort"></i>
                                           </span>
                                       </span>
                                   </th>
                                   <th style="align-items: center;">Project Handler</th>
                                   <th>
                                       <span style="display: inline-flex; align-items: center;">
                                           Category
                                           <span class="sort-icons sort-button" data-sort="product-category"
                                               data-order="asc"
                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
                                               <i class="fa fa-sort"></i>
                                           </span>
                                       </span>
                                   </th>
                                   <th>
                                       <span style="display: inline-flex; align-items: center;">
                                           Status
                                           <span class="sort-icons sort-button" data-sort="status" data-order="asc"
                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
                                               <i class="fa fa-sort"></i>
                                           </span>
                                       </span>
                                   </th>

                                   <th>
                                       <span style="display: inline-flex; align-items: center;">
                                           Join Date
                                           <span class="sort-icons sort-button" data-sort="join_date" data-order="asc"
                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
                                               <i class="fa fa-sort"></i>

                                           </span>
                                       </span>
                                   </th>
                                   <th>
                                       <span style="display: inline-flex; align-items: center;">
                                           Deadline
                                           <span class="sort-icons sort-button" data-sort="deadline" data-order="asc"
                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
                                               <i class="fa fa-sort"></i>

                                           </span>
                                       </span>
                                   </th>
                                   <th>Action</th>
                                   </tr>
                                   </thead>

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
                           
                               <!-- Main Row -->
                            <tbody>
                               @forelse ($projects as $key => $project)
                                   <tr style="height: 80px;">
                                       <td style="align-content: center; cursor: pointer;"><input type="checkbox"
                                               class="client-checkbox" value="{{ $project->id }}">
                                       </td>
                                       <td style="align-content: center;">
                                           {{ ($projects->currentPage() - 1) * $projects->perPage() + $key + 1 }}
                                       </td>
                                       <td style="align-content: center;">
                                           {{ $project->project_name }}</td>
                                       <td style="align-content: center;">
                                           {{ $project->project_handler }}</td>
                                       {{-- <td style="align-content: center;">{{ $project->phone }}
                                           </td> --}}
                                       <td style="align-content: center;">
                                           @if ($project->category === 'new_project')
                                               New Project
                                           @else
                                               {{ $project->category }}
                                           @endif
                                       </td>
                                       <td style="align-content: center;">
                                           <div class="btn rounded-5 align-top d-flex justify-content-center align-items-center"
                                               style="height: 4vh; width: 100px; background-color: #f8e2f7; border: 2px solid #f8e2f7;">
                                               @if ($project->status == 'new_project')
                                                   <p style="margin: 0; color: rgb(25, 240, 255); font-size:14px;">New
                                                   </p>
                                               @elseif ($project->status == 'Mindmap')
                                                   <p style="margin: 0; color: rgb(6, 129, 167) ; font-size:14px;">
                                                       Mindmap
                                                   </p>
                                               @elseif ($project->status == 'Design')
                                                   <p style="margin: 0; color: rgb(255, 128, 25); font-size:14px;">
                                                       Design
                                                   </p>
                                               @elseif ($project->status == 'Slicing')
                                                   <p style="margin: 0; color: rgb(10, 100, 58); font-size:14px;">Slicing
                                                   </p>
                                               @elseif ($project->status == 'Maintenance')
                                                   <p style="margin: 0; color: rgb(250, 47, 47); font-size:14px;">
                                                       Maintenance
                                                   </p>
                                               @endif
                                           </div>
                                       </td>

                                       <td style="align-content: center;">{{ $project->tanggal_masuk_project }}
                                       </td>
                                       <td style="align-content: center;">{{ $project->deadline }}
                                       </td>
                                       <td style="align-content: center; text-align: start;">
                                           {{-- Edit Modal --}}
                                           @include('components.onprogress.edit-onprogress')</td>
                                   </tr>
                               @empty
                                   <tr>
                                       <td colspan="12" class="text-center"
                                           style="height: 80px; align-content: center;">Tidak
                                           ada data yang ditemukan</td>
                                   </tr>
                               @endforelse
                           </tbody>
                       </table>
                       </table>
                        </div>

                       {{-- Pagination --}}
                       @include('components.onprogress.pagination-onprogress')

                   </div>
               </div>
           </div>
       </section>
   @endsection
