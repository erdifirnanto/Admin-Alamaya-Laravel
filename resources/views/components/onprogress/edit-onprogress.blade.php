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
                                                                               <select class="form-select"
                                                                                   name="status" for="status"
                                                                                   id="status">
                                                                                   @if ($project->status == 'new_project')
                                                                                       <option value="new_project"
                                                                                           selected>New
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
                                                                                   <option value="Selesai">Selesai
                                                                                   </option>
                                                                               </select>
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
                                                                       <button type="submit"
                                                                           class="btn btn-dark w-100"
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
