<i class="fas fa-edit" style="cursor: pointer;" aria-expanded="false" data-bs-toggle="modal"
     data-bs-target="#editteamModal-{{ $team->id }}"></i>

{{-- Edit Data Team --}}
                                               <div class="modal fade" id="editTeamModal-{{ $team->id }}"
                                                   tabindex="-1" aria-labelledby="editTeamModalLabel"
                                                   aria-hidden="true">
                                                   <div class="modal-dialog modal-lg">
                                                       <div class="modal-content">
                                                           <div class="modal-header" style="display: block;">
                                                               <h5 class="modal-title" id="editTeamModalLabel">Edit
                                                                   Data
                                                                   Team</h5>
                                                               <p style="margin-top: 2px;"></p>
                                                               <button type="button" class="btn-close"
                                                                   data-bs-dismiss="modal" aria-label="Close"
                                                                   style="position: absolute; right: 10px; top: 10px;"></button>
                                                           </div>

                                                           <div class="modal-body">
                                                               <form method="POST" style="text-align: left;"
                                                                   action="{{ route('team.update', $team->id) }}">
                                                                   @csrf
                                                                   @method('PUT')
                                                                   <!-- Team Name & Company Name -->

                                                                   <div class="row mb-3">
                                                                       <div class="col">
                                                                           <label for="personil_name" class="form-label"
                                                                               style="font-size: 0.7em;">PERSONIL
                                                                               NAME</label>
                                                                           <input type="text" class="form-control"
                                                                               name="personil_name" id="personil_name"
                                                                               placeholder="Enter the Personil Name"
                                                                               required pattern="^[a-zA-Z\s]+$"
                                                                               value="{{ $team->personil_name }}">
                                                                           <div class="invalid-feedback">Please enter a
                                                                               valid name (only
                                                                               letters allowed).</div>
                                                                       </div>
                                                                   </div>

                                                                   <div class="row mb-3">
                                                                       <div class="col">
                                                                           <label for="division" class="form-label"
                                                                               style="font-size: 0.7em;">DIVISION</label>
                                                                           <input type="text" class="form-control"
                                                                               name="division" id="division"
                                                                               placeholder="Enter the Division" required
                                                                               pattern="^[a-zA-Z\s]+$"
                                                                               value="{{ $team->division }}">
                                                                           <div class="invalid-feedback">Please enter a
                                                                               valid division
                                                                               (only letters allowed)
                                                                               .</div>
                                                                       </div>
                                                                   </div>

                                                                   <div class="row mb-3">
                                                                       <div class="col">
                                                                           <label for="project_handle" class="form-label"
                                                                               style="font-size: 0.7em;">PROJECT
                                                                               HANDLE</label>
                                                                           <input type="text" class="form-control"
                                                                               name="project_handle" id="project_handle"
                                                                               placeholder="Enter the Project Handle"
                                                                               required
                                                                               value="{{ $team->project_handle }}">
                                                                       </div>
                                                                   </div>
                                                                   <!-- Submit Button -->
                                                                   <button type="submit"
                                                                       class="btn btn-dark w-100">Submit</button>
                                                               </form>
                                                           </div>
                                                       </div>
                                                   </div>
                                               </div>