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
                               <h1>Alamaya Teams</h1>
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

                                   @include('components.team.add-team')

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

                       <table class="table table-hover table-sm">
                           <thead>
                               <tr style="height: 50px;">
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

                                                   console.log("Selected Teams IDs:", selectedClients); // Debugging

                                                   if (selectedClients.length === 0) {
                                                       alert("No team selected.");
                                                       return;
                                                   }

                                                   if (confirm("Are you sure you want to delete the selected teams?")) {
                                                       fetch('/team/delete-multiple', {
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
                                                                   alert("Selected Teams deleted successfully!");
                                                                   location.reload(); // Refresh halaman atau update DOM
                                                               } else {
                                                                   alert("Failed to delete Teams.");
                                                               }
                                                           })
                                                           .catch(error => console.error("Error deleting Teams:", error));
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
                                               <span class="fa fa-sort"></span>
                                           </span>
                                       </span>
                                   </th>
                                   <th>
                                       <span style="display: inline-flex; align-items: center;">
                                           Personil Name
                                           <span class="sort-icons sort-button" data-sort="project-name" data-order="asc"
                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
                                               <span class="fa fa-sort"></span>
                                           </span>
                                       </span>
                                   </th>

                                   <th>
                                       <span style="display: inline-flex; align-items: center;">
                                           Division
                                           <span class="sort-icons sort-button" data-sort="domain" data-order="asc"
                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
                                               <span class="fa fa-sort"></span>
                                           </span>
                                       </span>
                                   </th>
                                   <th>
                                       <span style="display: inline-flex; align-items: center;">
                                           Project Handle
                                           <span class="sort-icons sort-button" data-sort="expired" data-order="asc"
                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
                                               <span class="fa fa-sort"></span>
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
                               @foreach ($teams as $team)
                                   <tr style="height: 80px;">
                                       <td style="align-content: center"><input type="checkbox" class="client-checkbox"
                                               value="{{ $team->id }}">
                                       </td>
                                       <td style="align-content: center">{{ $team->id }}</td>
                                       <td style="align-content: center" data-key="client-name">
                                           {{ $team->personil_name }}</td>
                                       <td style="align-content: center" data-key="product-team">
                                           {{ $team->division }}
                                           {{-- <span class="sort-icons toggle-chevron" aria-expanded="false"
                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
                                               <span class="fas fa-chevron-down" style="font-size: 10px;"></span>
                                           </span> --}}
                                       </td>
                                       <td style="align-content: center" data-key="project-handle">
                                           {{ $team->project_handle }}
                                       </td>
                                       <td style="align-content: center; text-align: start;">
                                           {{-- Edit Modal --}}
                                           @include('components.team.edit-team')</td>
                                   </tr>
                               @endforeach
                           </tbody>
                       </table>

                       {{-- Pagination --}}
                       @include('components.team.pagination-team')

                   </div>
               </div>
           </div>
       </section>
   @endsection
