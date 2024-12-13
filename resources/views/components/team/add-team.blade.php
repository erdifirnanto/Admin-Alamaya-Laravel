<!-- Add Team Button -->
                                   <button class="btn btn-add-project btn1hvr" data-bs-toggle="modal"
                                       data-bs-target="#addTeamModal">Add
                                       Team <i class="fa fa-plus"></i>
                                   </button>

                                   <!-- Add Team Modal -->
                                   <div class="modal fade" id="addTeamModal" tabindex="-1"
                                       aria-labelledby="addTeamModalLabel" aria-hidden="true">
                                       <div class="modal-dialog">
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <h5 class="modal-title" id="addTeamModalLabel">Add
                                                       Team</h5>
                                                   <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                       aria-label="Close"></button>
                                               </div>
                                               <div class="modal-body">
                                                   <form method="POST" action="{{ route('team.store') }}" id="addTeamForm">
                                                       @csrf

                                                       <div class="row mb-3">
                                                           <div class="col">
                                                               <label for="personil_name" class="form-label"
                                                                   style="font-size: 0.7em;">PERSONIL NAME</label>
                                                               <input type="text" class="form-control"
                                                                   name="personil_name" id="personil_name"
                                                                   placeholder="Enter the Personil Name" required
                                                                   pattern="^[a-zA-Z\s]+$">
                                                               <div class="invalid-feedback">Please enter a valid name (only
                                                                   letters allowed).</div>
                                                           </div>
                                                       </div>

                                                       <div class="row mb-3">
                                                           <div class="col">
                                                               <label for="division" class="form-label"
                                                                   style="font-size: 0.7em;">DIVISION</label>
                                                               <input type="text" class="form-control" name="division"
                                                                   id="division" placeholder="Enter the Division" required
                                                                   pattern="^[a-zA-Z\s]+$">
                                                               <div class="invalid-feedback">Please enter a valid division
                                                                   (only letters allowed).</div>
                                                           </div>
                                                       </div>

                                                       <div class="row mb-3">
                                                           <div class="col">
                                                               <label for="project_handle" class="form-label"
                                                                   style="font-size: 0.7em;">PROJECT HANDLE</label>
                                                               <input type="text" class="form-control"
                                                                   name="project_handle" id="project_handle"
                                                                   placeholder="Enter the Project Handle" required>
                                                           </div>
                                                       </div>

                                                       <!-- Submit Button -->
                                                       <button type="submit" class="btn btn-dark w-100"
                                                           onclick="return validateForm()">Submit</button>
                                                   </form>
                                               </div>
                                           </div>
                                       </div>
                                   </div>

                                   <script>
                                       function validateForm() {
                                           // Trigger built-in HTML validation before allowing form submission
                                           const form = document.getElementById('addTeamForm');

                                           // Check if the form is valid
                                           if (form.checkValidity()) {
                                               return true; // Proceed to submit if valid
                                           } else {
                                               form.reportValidity(); // Show validation messages if invalid
                                               return false; // Prevent form submission
                                           }
                                       }
                                   </script>

                                   {{-- End Add Team Modal --}}

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