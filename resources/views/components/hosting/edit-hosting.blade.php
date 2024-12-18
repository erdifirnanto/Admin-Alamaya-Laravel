<i class="fas fa-edit" style="cursor: pointer;" aria-expanded="false" data-bs-toggle="modal"
    data-bs-target="#editDomainModal-{{ $domain->id }}"></i>

{{-- Edit Data Hosting --}}
<div class="modal fade" id="editHostingModal-{{ $hosting->id }}" tabindex="-1" aria-labelledby="editHostingModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="display: block;">
                <h5 class="modal-title" id="editHostingModalLabel">Edit
                    Data
                    Hosting</h5>
                <p style="margin-top: 2px;"></p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="position: absolute; right: 10px; top: 10px;"></button>
            </div>

            <div class="modal-body" style="text-align: left;">
                <form method="POST" action="{{ route('hosting.update', $hosting->id) }}">
                    @csrf
                    @method('PUT')
                    <!-- Domain Name & Company Name -->

                    <div class="row mb-3">
                        <div class="col">
                            <label name="project_name" for="project_name" id="project_name" class="form-label"
                                style="font-size: 0.7em;">PROJECT
                                NAME</label>
                            <input type="text" class="form-control" name="project_name" for="project_name"
                                id="project_name" value="{{ $hosting->project_name }}"
                                placeholder="Enter the Project Name">
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

                    <div class="row mb-3">
                        <div class="col">
                            <label name="domain" for="domain" id="domain" class="form-label"
                                style="font-size: 0.7em;">DOMAIN</label>
                            <input type="text" class="form-control" name="domain" for="domain" id="domain"
                                value="{{ $hosting->domain }}" placeholder="Enter the Domain">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label name="expired" for="expired" id="expired" class="form-label"
                                style="font-size: 0.7em;">EXPIRED</label>
                            <input type="date" class="form-control" name="expired" for="expired" id="expired"
                                value="{{ $hosting->expired }}" placeholder="Enter the Expired">
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-dark w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
