 <!-- Add Domain Button -->
 <button class="btn btn-add-project btn1hvr" data-bs-toggle="modal" data-bs-target="#addDomainModal"><i class="fa fa-plus" style="margin-right: 8px"></i>Add
     Domain 
 </button>

 <!-- Add Domain Modal -->
 <div class="modal fade" id="addDomainModal" tabindex="-1" aria-labelledby="addDomainModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="addDomainModalLabel">Add Domain</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form method="POST" action="{{ route('domain.store') }}" id="addDomainForm">
                     @csrf

                     <div class="row mb-3">
                         <div class="col">
                             <label for="project_name" class="form-label" style="font-size: 0.7em;">PROJECT NAME</label>
                             <input type="text" class="form-control" name="project_name" id="project_name"
                                 placeholder="Enter the Project Name" required>
                         </div>
                     </div>

                     <div class="row mb-3">
                         <div class="col">
                             <label for="domain" class="form-label" style="font-size: 0.7em;">DOMAIN</label>
                             <input type="text" class="form-control" name="domain" id="domain"
                                 placeholder="Enter the Domain (e.g., example.com)" required
                                 pattern="^[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$">
                             <div class="invalid-feedback">Please enter a valid domain
                                 (e.g., www.example.com).</div>
                         </div>
                     </div>
                     <div class="row mb-3">
                         <div class="col">
                             <label for="join_date" class="form-label" style="font-size: 0.7em;">JOIN DATE</label>
                             <input type="date" class="form-control" name="join_date" id="join_date" required>
                         </div>
                     </div>
                     <div class="row mb-3">
                         <div class="col">
                             <label name="status" for="status" id="status" class="form-label"
                                 style="font-size: 0.7em;">STATUS</label>
                             <select class="form-select" name="status" for="status" id="status">
                                 <option value="active" selected>Active</option>
                                 <option value="active">Active</option>
                                 <option value="in_active">In Active</option>
                                 <option value="expired">Expired</option>
                                 <option value="redemtion">Redemtion</option>
                             </select>
                         </div>
                     </div>
                     <div class="row mb-3">
                         <div class="col">
                             <label for="expired" class="form-label" style="font-size: 0.7em;">EXPIRED</label>
                             <input type="date" class="form-control" name="expired" id="expired" required>
                         </div>
                     </div>

                     <!-- Submit Button -->
                     <button type="submit" class="btn btn-dark w-100" onclick="return validateForm()">Submit</button>
                 </form>
             </div>
         </div>
     </div>
 </div>

 <script>
     function validateForm() {
         const domainInput = document.getElementById('domain');
         const domainPattern = /^[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

         // Check if domain format is valid
         if (!domainPattern.test(domainInput.value)) {
             domainInput.classList.add('is-invalid');
             return false;
         } else {
             domainInput.classList.remove('is-invalid');
         }

         return true; // Return true if all validations pass
     }
 </script>

 <script>
     function showAlert() {
         alert('Data berhasil ditambahkan!');
     }
 </script>
 {{-- End Add Domain Modal --}}
