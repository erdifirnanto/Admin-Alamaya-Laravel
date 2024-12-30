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
            <div class="search-add-sort-container d-flex flex-wrap justify-content-between align-items-center">
                {{-- Search --}}
                <div class="flex-grow-1 me-2">
                    @include('components.dashboard.search')
                </div>

                <!-- Buttons Section -->
                <div class="d-flex gap-2">
                    <!-- Delete Button -->
                    <button class="btn btn-dropdown srtby delete-btn delete-selected" type="button" aria-expanded="false">
                        <a style="color: rgb(255, 0, 0);" href="#">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </button>

                    {{-- Download --}}
                    @include('components.dashboard.download-project')

                    <!-- Add Project Button -->
                    @include('components.dashboard.add-project')

                    <!-- Sortby Dropdown -->
                    <div class="dropdown">
                        <button class="btn btn-dropdown dropdown-toggle srtby" type="button" id="dropdownMenuButton"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Sort by
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li><button class="dropdown-item sort-button" data-sort="id" data-order="asc"
                                    onclick="sortTable(1)">By No</button></li>
                            <li><button class="dropdown-item sort-button" data-sort="client_name" data-order="asc"
                                    onclick="sortTable(2)">By Name</button></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="table-responsive mt-3">
                <table class="table table-hover table-sm">
                    <thead>
                        <tr style="height: 40px;">
                            <th scope="col" style="width: 50px">
                                <div>
                                    <input style="cursor: pointer" type="checkbox" id="select-all" for="select-all">
                                    <label for="select-all">All</label>
                                </div>
                            </th>
                            <th style="align-items: center; min-width:50px" data-sort="id" onclick="sortTable(1)">
                                <span style="display: inline-flex; align-items: center;">
                                    No.
                                    <span class="sort-icons sort-button"
                                        style="display: flex; flex-direction: column; align-items: center; margin-left: 5px; cursor: pointer;">
                                        <span class="fa fa-sort"></span>
                                    </span>
                                </span>
                            </th>
                            <th style="align-items: center;" data-sort="name" onclick="sortTable(2)">Name
                                <i class="fa fa-sort"></i>
                            </th>
                            <th style="align-items: center;">Project</th>
                            <th style="align-items: center;">Email</th>
                            <th style="align-items: center;">Project Handler</th>
                            <th style="align-items: center;">Category</th>
                            <th style="align-items: center; width: 95px;">Join Date</th>
                            <th style="align-items: center; width: 95px;">Deadline</th>
                            <th style="align-items: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody id="table-body" style="text-transform: capitalize">
                        @forelse ($projects as $key => $project)
                            <tr style="height: 80px;">
                                <td style="align-content: center;">
                                    <input type="checkbox" class="client-checkbox" value="{{ $project->id }}">
                                </td>
                                <td style="align-content: center;">
                                    {{ ($projects->currentPage() - 1) * $projects->perPage() + $key + 1 }}
                                </td>
                                <td style="align-content: center;">
                                    {{ $project->client_name }}
                                </td>
                                <td style="align-content: center;">
                                    {{ $project->project_name }}
                                </td>
                                <td style="align-content: center;">
                                    {{ $project->email }}
                                </td>
                                <td style="align-content: center;">
                                    {{ $project->project_handler }}
                                </td>
                                <td style="align-content: center;">
                                    {{ $project->category }}
                                </td>
                                <td style="align-content: center;">
                                    {{ $project->tanggal_masuk_project }}
                                </td>
                                <td style="align-content: center;">
                                    {{ $project->deadline }}
                                </td>
                                <td style="align-content: center;">
                                    @include('components.dashboard.edit-project')
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="12" class="text-center" style="height: 80px; align-content: center;">
                                    Tidak ada data yang ditemukan
                                </td>
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
