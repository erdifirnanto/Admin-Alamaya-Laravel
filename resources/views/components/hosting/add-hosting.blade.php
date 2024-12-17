 <!-- Add Hosting Button -->
 <button class="btn btn-add-project btn1hvr" data-bs-toggle="modal" data-bs-target="#addHostingModal">Add
     Hosting <i class="fa fa-plus"></i>
 </button>

 <!-- Add Hosting Modal -->
 <div class="modal fade" id="addHostingModal" tabindex="-1" aria-labelledby="addHostingModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="addHostingModalLabel">Add Hosting</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
                 <form method="POST" action="{{ route('hosting.store') }}" id="addHostingForm">
                     @csrf

                     <div class="row mb-3">
                         <div class="col">
                             <label for="project_name" class="form-label" style="font-size: 0.7em;">PROJECT NAME</label>
                             <input type="text" class="form-control" name="project_name" id="project_name"
                                 placeholder="Enter the Project Name" required>
                         </div>
                     </div>

 <!-- PIC and Category -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="package" class="form-label"
                                style="font-size: 0.7em;">PACKAGE</label>
                            <select class="form-select @error('package') is-invalid @enderror" id="package"
                                name="package" required>
                                <option selected value="Widia Hadi Purwanti">Package 1
                                </option>
                                {{-- @foreach ($users as $user)
                                                                       <option value="{{ $user->name }}"
                                                                           {{ old('$user->name') == '$user->name' ? 'selected' : '' }}>
                                                                           {{ $user->name }}
                                                                       </option>
                                                                   @endforeach --}}
                                <option value="Package 1"
                                    {{ old('package') == 'Package 1' ? 'selected' : '' }}>
                                    Package 1</option>
                                <option value="Package 3"
                                    {{ old('package') == 'Package 3' ? 'selected' : '' }}>
                                    Package 3</option>
                                <option value="Package 5"
                                    {{ old('package') == 'Package 5' ? 'selected' : '' }}>
                                    Package 5</option>
                                <option value="Package 10"
                                    {{ old('package') == 'Package 10' ? 'selected' : '' }}>
                                    Package 10</option>
                                <option value="Package 20"
                                    {{ old('package') == 'Package 20' ? 'selected' : '' }}>
                                    Package 20</option>
                                <option value="Package 25"
                                    {{ old('package') == 'Package 25' ? 'selected' : '' }}>
                                    Package 25</option>
                            </select>
                            @error('package')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
 {{-- End Add Hosting Modal --}}
