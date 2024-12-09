 <i class="fas fa-edit" style="cursor: pointer;" aria-expanded="false" data-bs-toggle="modal"
     data-bs-target="#editProjectModal-{{ $project->id }}"></i>

 {{-- Edit Data Client --}}
 <div class="modal fade" style="text-align: left" id="editProjectModal-{{ $project->id }}" tabindex="-1"
     aria-labelledby="editProjectModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header" style="display: block;">
                 <h5 class="modal-title" id="editProjectModalLabel">Edit
                     Data
                     Project</h5>
                 <p style="margin-top: 2px;"></p>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                     style="position: absolute; right: 10px; top: 10px;"></button>
             </div>

             <div class="modal-body">
                 <form method="POST" action="{{ route('project.update', $project->id) }}">
                     @csrf
                     @method('PUT')
                     <div class="row mb-3">
                         <div class="col">
                             <label for="client_name" class="form-label"
                                 style="font-size: 0.7em; font-weight: bold;">CLIENT
                                 NAME</label>
                             <input type="text" class="form-control @error('client_name') is-invalid @enderror"
                                 id="client_name" name="client_name" placeholder="Enter the client name"
                                 value="{{ $project->client_name }}" required>
                             @error('client_name')
                                 <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                         </div>
                         <div class="col">
                             <label for="company_name" class="form-label"
                                 style="font-size: 0.7em; font-weight: bold;">COMPANY
                                 NAME</label>
                             <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                 id="company_name" name="company_name" placeholder="Enter the company name"
                                 value="{{ $project->company_name }}" required>
                             @error('company_name')
                                 <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                         </div>
                     </div>
                     {{-- Project Name & Tanggal Project Masuk --}}
                     <div class="row mb-3">
                         <div class="col">
                             <label for="project_name" class="form-label"
                                 style="font-size: 0.7em; font-weight: bold;">PROJECT
                                 NAME</label>
                             <input type="text" class="form-control @error('project_name') is-invalid @enderror"
                                 id="project_name" name="project_name" placeholder="Enter the project name"
                                 value="{{ $project->project_name }}" required>
                             @error('project_name')
                                 <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                         </div>
                         <div class="col">
                             <label for="tanggal_masuk_project" class="form-label"
                                 style="font-size: 0.7em; font-weight: bold;">TANGGAL
                                 PROJECT MASUK
                             </label>
                             <input type="date"
                                 class="form-control @error('tanggal_masuk_project') is-invalid @enderror"
                                 id="tanggal_masuk_project" name="tanggal_masuk_project" placeholder="Enter Date"
                                 value="{{ $project->tanggal_masuk_project }}" required>
                             @error('tanggal_masuk_project')
                                 <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                         </div>
                     </div>
                     <!-- PIC and Category -->
                     <div class="row mb-3">
                         <div class="col">
                             <label for="pic_name" class="form-label"
                                 style="font-size: 0.7em; font-weight: bold;">PIC</label>
                             <select class="form-select @error('pic_name') is-invalid @enderror" id="pic_name"
                                 name="pic_name" required>
                                 <option selected value="{{ $project->pic_name }}">{{ $project->pic_name }}
                                 </option>
                                 <option value="Handika Wicaksana"
                                     {{ old('pic_name') == 'Handika Wicaksana' ? 'selected' : '' }}>
                                     Handika Wicaksana</option>
                                 <option value="Widia Hadi Purwanti"
                                     {{ old('pic_name') == 'Widia Hadi Purwanti' ? 'selected' : '' }}>
                                     Widia Hadi Purwanti</option>
                             </select>
                             @error('pic_name')
                                 <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                         </div>
                         <div class="col">
                             <label for="category" class="form-label"
                                 style="font-size: 0.7em; font-weight: bold;">CATEGORY
                                 PRODUCT</label>
                             <select class="form-select @error('category') is-invalid @enderror" id="category"
                                 name="category" required>
                                 <option selected value="{{ $project->category }}">
                                     @if ($project->category === 'new_project')
                                         New Project
                                     @else
                                         {{ $project->category }}
                                     @endif
                                 </option>
                                 <option value="Maintenance" {{ old('category') == 'Maintenance' ? 'selected' : '' }}>
                                     Maintenance</option>
                                 <option value="Re-Design" {{ old('category') == 'Re-Design' ? 'selected' : '' }}>
                                     Re-Design</option>
                                 <option value="Hosting" {{ old('category') == 'Hosting' ? 'selected' : '' }}>
                                     Hosting</option>
                             </select>
                             @error('category')
                                 <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                         </div>
                     </div>
                     {{-- Email & Deadline --}}
                     <div class="row mb-3">
                         <div class="col">
                             <label for="email" class="form-label"
                                 style="font-size: 0.7em; font-weight: bold;">EMAIL</label>
                             <input type="email" name="email"
                                 class="form-control @error('email') is-invalid @enderror" id="email"
                                 name="email" for="email" placeholder="Enter email"
                                 value="{{ $project->email }}" required autofocus>
                             @error('email')
                                 <div id="emailHelp" class="form-text text-danger">
                                     {{ $message }}</div>
                             @enderror
                         </div>
                         <div class="col">
                             <label for="deadline" class="form-label"
                                 style="font-size: 0.7em; font-weight: bold;">DEADLINE</label>
                             <input type="date" name="deadline"
                                 class="form-control @error('deadline') is-invalid @enderror" id="deadline"
                                 name="deadline" for="deadline" placeholder="Enter deadline"
                                 value="{{ $project->deadline }}" required autofocus>
                             @error('deadline')
                                 <div id="emailHelp" class="form-text text-danger">
                                     {{ $message }}</div>
                             @enderror
                         </div>
                     </div>
                     <!-- Address & Phone & Hidden Status-->
                     <div class="row mb-3">
                         <div class="col">
                             <label for="phone" class="form-label"
                                 style="font-size: 0.7em; font-weight: bold;">PHONE</label>
                             <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                 id="phone" name="phone" placeholder="Enter the client's phone number"
                                 value="{{ $project->phone }}" inputmode="numeric" pattern="\d+" required>
                             @error('phone')
                                 <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                         </div>
                         <div class="col">
                             <label for="address" class="form-label"
                                 style="font-size: 0.7em; font-weight: bold;">ADDRESS</label>
                             <input type="text" class="form-control @error('address') is-invalid @enderror"
                                 id="address" name="address" placeholder="Enter the client's company address"
                                 value="{{ $project->address }}" required>
                             @error('address')
                                 <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                         </div>
                         {{-- STATUS HIDDEN INPUT --}}
                         <div hidden class="col">
                             <label for="status" class="form-label"
                                 style="font-size: 0.7em; font-weight: bold;">Status</label>
                             <input type="text" class="form-control @error('status') is-invalid @enderror"
                                 id="status" name="status" placeholder="Enter the client's company status"
                                 value="{{ $project->status }}" required>
                             @error('status')
                                 <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
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
                     <button type="submit" class="btn btn-dark w-100">Submit</button>
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
                                                           const productCategory = this.getAttribute('data-product-category');
                                                           const email = this.getAttribute('data-email');
                                                           const phone = this.getAttribute('data-phone');
                                                           const address = this.getAttribute('data-address');

                                                           // Populate the modal fields
                                                           document.getElementById('edit_client_id').value = clientId;
                                                           document.getElementById('edit_client_name').value = clientName;
                                                           document.getElementById('edit_company_name').value = companyName;
                                                           document.getElementById('edit_pic_name').value = picName;
                                                           document.getElementById('edit_category').value = productCategory;
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
