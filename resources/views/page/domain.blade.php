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
                               <form action="{{ route('domain.search') }}" method="GET">
                                   <input id="searchInput" style="width: 400px;" type="text" name="search"
                                       placeholder="Search">
                                   <span class="icon-search"><i class="fas fa-search"></i></span>
                               </form>
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

                                   {{-- Add Domain --}}
                                   @include('components.domain.add-domain')

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
                                           <span class="sort-icons sort-button" data-sort="Project-name" data-order="asc"
                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
                                           </span>
                                       </span>
                                   </th>

                                   <th>
                                       <span style="display: inline-flex; align-items: center;">
                                           Domain
                                           <span class="sort-icons sort-button" data-sort="domain" data-order="asc"
                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
                                           </span>
                                       </span>
                                   </th>
                                   <th>
                                       <span style="display: inline-flex; align-items: center;">
                                           Status
                                           <span class="sort-icons sort-button" data-sort="domain" data-order="asc"
                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
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
                                           Expired
                                           <span class="sort-icons sort-button" data-sort="expired" data-order="asc"
                                               style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
                                               <i class="fa fa-sort"></i>
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
                               @forelse ($domains as $key => $domain)
                                   <tr style="height: 80px;">
                                       <td style="align-content: center"><input type="checkbox" class="client-checkbox"
                                               value="{{ $domain->id }}">
                                       </td>
                                       <td style="align-content: center">{{ $key + 1 }}</td>
                                       <td style="align-content: center" data-key="project-name">
                                           {{ $domain->project_name }}</td>
                                       <td style="align-content: center" data-key="domain">
                                           {{ $domain->domain }}
                                       </td>
                                       <td style="align-content: center; text-transform: capitalize;" data-key="status">
                                           <div class="btn rounded-5 align-top d-flex justify-content-center align-items-center"
                                               style="height: 4vh; width: 100px; background-color: #f8e2f7; border: 2px solid #f8e2f7;">
                                               @if ($domain->status == 'active')
                                                   <p style="margin: 0; color: rgb(8, 160, 89) ; font-size:14px;">Active
                                                   </p>
                                               @elseif ($domain->status == 'in_active')
                                                   <p style="margin: 0; color: rgb(255, 213, 25); font-size:14px;">In Active
                                                   </p>
                                               @elseif ($domain->status == 'expired')
                                                   <p style="margin: 0; color: rgb(230, 34, 8); font-size:14px;">Expired
                                                   </p>
                                               @elseif ($domain->status == 'redemtion')
                                                   <p style="margin: 0; color: rgb(0, 102, 255) ; font-size:14px;">Redemtion
                                                   </p>
                                            
                                               @endif
                                           </div>
                                       </td>

                                       <td style="align-content: center" data-key="join_date">{{ $domain->join_date }}

                                       </td>
                                       <td style="align-content: center" data-key="Expired">{{ $domain->expired }}
                                       </td>
                                       <td style="align-content: center">
                                           <div class="dropdown text-center">

                                               @include('components.domain.edit-domain')

                                           </div>
                                       </td>
                                   </tr>
                               @empty
                                   <tr>
                                       <td colspan="12" class="text-center"
                                           style="height: 80px; align-content: center;">
                                           Tidak
                                           ada data yang ditemukan</td>
                                   </tr>
                               @endforelse
                           </tbody>
                       </table>

                       @include('components.domain.pagination-domain')


                   </div>
               </div>
           </div>
       </section>
   @endsection
