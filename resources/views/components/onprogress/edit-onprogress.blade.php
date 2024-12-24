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

                                                                   {{-- STATUS INPUT --}}
                                                                   <div class="row mb-3">
                                                                       <div class="col">
                                                                           <label name="status" for="status"
                                                                               id="status" class="form-label"
                                                                               style="font-size: 0.7em;">STATUS</label>
                                                                           <select class="form-select" name="status"
                                                                               for="status" id="status">
                                                                               @if ($project->status == 'new_project')
                                                                                   <option value="new_project" selected>
                                                                                       New
                                                                                   </option>
                                                                               @else
                                                                                   <option
                                                                                       value="{{ $project->status }}"
                                                                                       selected>
                                                                                       {{ $project->status }}
                                                                                   </option>
                                                                               @endif
                                                                               <option value="Mindmap">Step 1 -
                                                                                   Mindmap</option>
                                                                               <option value="Design">Step 2 -
                                                                                   Design</option>
                                                                               <option value="Slicing">Step 3 -
                                                                                   Slicing</option>
                                                                               <option value="Maintenance">
                                                                                   Maintenance
                                                                               </option>
                                                                               <option value="Selesai">Project Done
                                                                               </option>
                                                                           </select>
                                                                       </div>
                                                                   </div>

                                                                   {{-- Hidden --}}
                                                                   <div hidden>
                                                                       <div class="row mb-3">
                                                                           <div class="col">
                                                                               <label for="client_name"
                                                                                   class="form-label"
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
                                                                           <div class="col">
                                                                               <label for="company_name"
                                                                                   class="form-label"
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
                                                                       <div class="row mb-3">
                                                                           <div class="col">
                                                                               <label for="project_name"
                                                                                   class="form-label"
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
                                                                           <div class="col">
                                                                               <label for="tanggal_masuk_project"
                                                                                   class="form-label"
                                                                                   style="font-size: 0.7em; font-weight: bold;">Join
                                                                                   Date</label>
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
                                                                       <!-- Project Handler and Category -->
                                                                       <div class="row mb-3">
                                                                           <div class="col">
                                                                               <label for="project_handler"
                                                                                   class="form-label"
                                                                                   style="font-size: 0.7em; font-weight: bold;">Project
                                                                                   Handler</label>
                                                                               <select
                                                                                   class="form-select @error('project_handler') is-invalid @enderror"
                                                                                   id="project_handler"
                                                                                   name="project_handler" required>
                                                                                   <option selected
                                                                                       value="{{ $project->project_handler }}">
                                                                                       {{ $project->project_handler }}
                                                                                   </option>

                                                                                   @foreach ($teams as $team)
                                                                                       <option
                                                                                           value="{{ $team->personil_name }}"
                                                                                           {{ old('project_handler') == $team->personil_name ? 'selected' : '' }}>
                                                                                           {{ $team->personil_name }}
                                                                                       </option>
                                                                                   @endforeach
                                                                               </select>
                                                                               @error('project_handler')
                                                                                   <div class="invalid-feedback">
                                                                                       {{ $message }}</div>
                                                                               @enderror
                                                                           </div>
                                                                           <div class="col">
                                                                               <label for="category"
                                                                                   class="form-label"
                                                                                   style="font-size: 0.7em; font-weight: bold;">CATEGORY
                                                                                   PROJECT</label>
                                                                               <select
                                                                                   class="form-select @error('category') is-invalid @enderror"
                                                                                   id="category" name="category"
                                                                                   required>
                                                                                   <option selected
                                                                                       value="{{ $project->category }}">
                                                                                       @if ($project->category === 'new_project')
                                                                                           New Project
                                                                                       @else
                                                                                           {{ $project->category }}
                                                                                       @endif
                                                                                   </option>
                                                                                   <option value="Maintenance"
                                                                                       {{ old('category') == 'Maintenance' ? 'selected' : '' }}>
                                                                                       Maintenance</option>
                                                                                   <option value="Re-Design"
                                                                                       {{ old('category') == 'Re-Design' ? 'selected' : '' }}>
                                                                                       Re-Design</option>
                                                                                   <option value="Hosting"
                                                                                       {{ old('category') == 'Hosting' ? 'selected' : '' }}>
                                                                                       Hosting</option>
                                                                               </select>
                                                                               @error('category')
                                                                                   <div class="invalid-feedback">
                                                                                       {{ $message }}</div>
                                                                               @enderror
                                                                           </div>
                                                                       </div>
                                                                       {{-- Email & Deadline --}}
                                                                       <div class="row mb-3">
                                                                           <div class="col">
                                                                               <label for="email"
                                                                                   class="form-label"
                                                                                   style="font-size: 0.7em; font-weight: bold;">EMAIL</label>
                                                                               <input type="email" name="email"
                                                                                   class="form-control @error('email') is-invalid @enderror"
                                                                                   id="email" name="email"
                                                                                   for="email"
                                                                                   placeholder="Enter email"
                                                                                   value="{{ $project->email }}"
                                                                                   required autofocus>
                                                                               @error('email')
                                                                                   <div id="emailHelp"
                                                                                       class="form-text text-danger">
                                                                                       {{ $message }}</div>
                                                                               @enderror
                                                                           </div>
                                                                           <div class="col">
                                                                               <label for="deadline"
                                                                                   class="form-label"
                                                                                   style="font-size: 0.7em; font-weight: bold;">DEADLINE</label>
                                                                               <input type="date" name="deadline"
                                                                                   class="form-control @error('deadline') is-invalid @enderror"
                                                                                   id="deadline" name="deadline"
                                                                                   for="deadline"
                                                                                   placeholder="Enter deadline"
                                                                                   value="{{ $project->deadline }}"
                                                                                   required autofocus>
                                                                               @error('deadline')
                                                                                   <div id="emailHelp"
                                                                                       class="form-text text-danger">
                                                                                       {{ $message }}</div>
                                                                               @enderror
                                                                           </div>
                                                                       </div>
                                                                       <!-- Address & Phone & Hidden Status-->
                                                                       <div class="row mb-3">
                                                                           <div class="col">
                                                                               <label for="phone"
                                                                                   class="form-label"
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
                                                                           <div class="col">
                                                                               <label for="address"
                                                                                   class="form-label"
                                                                                   style="font-size: 0.7em; font-weight: bold;">ADDRESS</label>
                                                                               <input type="text"
                                                                                   class="form-control @error('address') is-invalid @enderror"
                                                                                   id="address" name="address"
                                                                                   placeholder="Enter the client's company address"
                                                                                   value="{{ $project->address }}"
                                                                                   required>
                                                                               @error('address')
                                                                                   <div class="invalid-feedback">
                                                                                       {{ $message }}</div>
                                                                               @enderror
                                                                           </div>
                                                                       </div>
                                                                   </div>



                                                                   <script>
                                                                       document.getElementById('phone').addEventListener('input', function(event) {
                                                                           let phone = event.target;
                                                                           // Mengganti semua karakter selain angka
                                                                           phone.value = phone.value.replace(/\D/g, '');
                                                                       });
                                                                   </script>


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
                                                                       onclick="showAlertUpdate()">Submit</button>
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
