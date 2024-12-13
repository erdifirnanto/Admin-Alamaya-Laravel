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
                           {{-- Seacrh --}}
                           @include('components.dashboard.search')
                           <!-- Buttons Section -->
                           <div class="button-container">
                               <!-- Sort by Dropdown -->
                               <div class="dropdown">
                                   <button class="btn btn-dropdown srtby delete-btn delete-selected" type="button"
                                       aria-expanded="false">
                                       <a style="color: rgb(255, 0, 0);" href="#"><i class="fa fa-trash"
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
                                       <li><button class="dropdown-item sort-button" data-sort="id" data-order="asc"
                                               onclick="sortTable(1)">By
                                               No</button></li>
                                       <li><button class="dropdown-item sort-button" data-sort="client_name"
                                               data-order="asc" onclick="sortTable(2)">By Name</button></li>
                                   </ul>
                               </div>
                           </div>
                       </div>


                       <style>
                           .table-responsive {
                               overflow-x: auto;
                           }
                       </style>

                       <div class="table-responsive">
                           <table class="table table-hover table-sm">
                           <table class="table table-hover table-sm">
                               <thead>
                                   <tr style="height: 40px;">
                                       <th scope="col" style="width: 50px">
                                           <div>
                                               <input style="cursor: pointer" type="checkbox" id="select-all"
                                                   for="select-all">
                                               <label for="select-all">All</label>
                                           </div>
                                       </th>
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

                                           //    Sorting
                                           function sortTable(columnIndex) {
                                               const table = document.getElementById('table-body');
                                               const rows = Array.from(table.rows);
                                               const isAscending = table.getAttribute('data-sort-order') === 'asc';

                                               rows.sort((a, b) => {
                                                   const cellA = a.cells[columnIndex].innerText.toLowerCase();
                                                   const cellB = b.cells[columnIndex].innerText.toLowerCase();

                                                   if (!isNaN(cellA) && !isNaN(cellB)) {
                                                       return isAscending ? cellA - cellB : cellB - cellA;
                                                   } else {
                                                       return isAscending ? cellA.localeCompare(cellB) : cellB.localeCompare(cellA);
                                                   }
                                               });

                                               rows.forEach(row => table.appendChild(row));
                                               table.setAttribute('data-sort-order', isAscending ? 'desc' : 'asc');
                                           }
                                       </script>
                                       <th style="align-items: center; min-width:50px" data-sort="id"
                                           onclick="sortTable(1)"><span style="display: inline-flex; align-items: center;">
                                               No.
                                               <span class="sort-icons sort-button"
                                                   style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
                                                   <span class="fa fa-sort"></span>
                                               </span>
                                           </span></th>
                                       <th style="align-items: center;" data-sort="name" onclick="sortTable(2)">Name <i
                                               class="fa fa-sort"></i></th>
                                       <th style="align-items: center;">Project</th>
                                       <th style="align-items: center;">Email</th>
                                       {{-- <th style="align-items: center;">Phone</th> --}}
                                       <th style="align-items: center;">PIC</th>
                                       <th style="align-items: center;">Category</i>
                                       </th>
                                       <th style="align-items: center; width: 95px;" data-sort="projectmasuk"
                                           onclick="sortTable(4)">
                                           Join Date <i class="fa fa-sort"></i></th>
                                       <th style="align-items: center; width: 95px;">Deadline
                                       </th>
                                       <th style="align-items: center;">Action</th>
                                   </tr>
                               </thead>
                               <tbody id="table-body" style="text-transform: capitalize">
                                   <!-- Main Row -->
                                   @forelse ($projects as $key => $project)
                                       <tr style="height: 80px;">
                                           <td style="align-content: center; cursor: pointer;"><input type="checkbox"
                                                   class="client-checkbox" value="{{ $project->id }}">
                                           </td>
                                           <td style="align-content: center;">
                                               {{ ($projects->currentPage() - 1) * $projects->perPage() + $key + 1 }}
                                           </td>
                                           <td style="align-content: center;">
                                               {{ $project->client_name }}</td>
                                           <td style="align-content: center;">
                                               {{ $project->project_name }}</td>
                                           <td style="align-content: center;">
                                               <div class="accordion" id="accordionExample1">
                                                   <h2 class="accordion-header" id="headingOne1">
                                                       <button class="accordion-button collapsed" type="button"
                                                           data-bs-toggle="collapse" data-bs-target="#{{ $project->id }}"
                                                           aria-expanded="false" aria-controls="{{ $project->id }}">
                                                           <span>{{ $project->email }}</span>
                                                       </button>
                                                   </h2>
                                                   <div class="accordion-item">
                                                       <div id="{{ $project->id }}" class="accordion-collapse collapse"
                                                           aria-labelledby="headingOne1"
                                                           data-bs-parent="#accordionExample1">
                                                           <div class="accordion-body justify-content-between align-items-center">
                                                               <div>
                                                                   <span>{{ $project->company_name }}</span>
                                                                   <i style="cursor: pointer" class="fa-regular fa-copy"
                                                                       onclick="copyText('{{ $project->company_name }}')"></i>
                                                               </div>
                                                               <div>
                                                                   <span>{{ $project->address }}</span>
                                                                   <i style="cursor: pointer" class="fa-regular fa-copy"
                                                                       onclick="copyText('{{ $project->address }}')"></i>
                                                               </div>
                                                               <div>
                                                                   <span><b>Phone -
                                                                           {{ $project->phone }}
                                                                       </b></span>
                                                                   {{-- <i class="fa-regular fa-copy"
                                                                       onclick="copyText('{{ $project->tanggal_masuk_project }}')"></i> --}}
                                                               </div>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>
                                           </td>
                                           {{-- <td style="align-content: center;">{{ $project->phone }}
                                           </td> --}}
                                           <td style="align-content: center;">{{ $project->pic_name }}
                                           </td>
                                           <td style="align-content: center;">
                                               @if ($project->category === 'new_project')
                                                   New Project
                                               @else
                                                   {{ $project->category }}
                                               @endif
                                           </td>
                                           <td style="align-content: center;">{{ $project->tanggal_masuk_project }}
                                           </td>
                                           <td style="align-content: center;">{{ $project->deadline }}
                                           </td>
                                           <td style="align-content: center; text-align: end;">
                                               {{-- Edit Modal --}}
                                               @include('components.dashboard.edit-project')</td>
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
                       </div>

                       {{-- Pagination --}}
                       @include('components.dashboard.pagination')

                   </div>
               </div>
           </div>
       </section>
   @endsection
