<!-- Add Project Button -->
<button class="btn btn-add-client btn1hvr" data-bs-toggle="modal" data-bs-target="#addProjectModal">Add Project&nbsp;<i
        class="fa fa-plus"></i>
</button>

<!-- Add Project Modal -->
<div class="modal fade" id="addProjectModal" tabindex="-1" aria-labelledby="addProjectModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header" style="display: block;">
                <h5 class="modal-title" id="addProjectModalLabel">Add Project</h5>
                <p style="margin-top: 2px;">Fill in some details to start adding projects
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="position: absolute; right: 10px; top: 10px;"></button>
            </div>

            <div class="modal-body">
                <form method="POST" action="{{ route('project.store') }}" id="AddClientForm">
                    @csrf

                    <!-- Client Name & Company Name -->
                    <div class="row mb-3">
                        <div class="col">
                            <label for="client_name" class="form-label"
                                style="font-size: 0.7em; font-weight: bold;">CLIENT
                                NAME</label>
                            <input type="text" class="form-control @error('client_name') is-invalid @enderror"
                                id="client_name" name="client_name" placeholder="Enter the client name"
                                value="{{ old('client_name') }}" required>
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
                                value="{{ old('company_name') }}" required>
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
                                value="{{ old('project_name') }}" required>
                            @error('project_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="tanggal_masuk_project" class="form-label"
                                style="font-size: 0.7em; font-weight: bold;">
                                JOIN DATE
                            </label>
                            <input type="date"
                                class="form-control @error('tanggal_masuk_project') is-invalid @enderror"
                                id="tanggal_masuk_project" name="tanggal_masuk_project" placeholder="Enter Date"
                                value="{{ old('tanggal_masuk_project', date('Y-m-d')) }}" required>
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
                                <option selected value="Widia Hadi Purwanti">Widia Hadi Purwanti
                                </option>
                                {{-- @foreach ($users as $user)
                                                                       <option value="{{ $user->name }}"
                                                                           {{ old('$user->name') == '$user->name' ? 'selected' : '' }}>
                                                                           {{ $user->name }}
                                                                       </option>
                                                                   @endforeach --}}
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
                                style="font-size: 0.7em; font-weight: bold;">CATEGORY PROJECT
                            </label>
                            <select class="form-select @error('category') is-invalid @enderror" id="category"
                                name="category" required>
                                <option selected value="new_project">New Project
                                </option>
                                <option value="new_project" {{ old('category') == 'new_project' ? 'selected' : '' }}>
                                    New Project</option>
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
                                name="email" for="email" placeholder="Enter email" value="{{ old('email') }}"
                                required autofocus>
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
                                value="{{ old('deadline') }}" required autofocus>
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
                                value="{{ old('phone') }}" inputmode="numeric" pattern="\d+" required>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col">
                            <label for="address" class="form-label"
                                style="font-size: 0.7em; font-weight: bold;">ADDRESS</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror"
                                id="address" name="address" placeholder="Enter the client's company address"
                                value="{{ old('address') }}" required>
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
                                value="new_project" required>
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

                    <!-- Disclaimer -->
                    <div class="form-check mb-3">
                        <input type="checkbox" class="form-check-input @error('termsCheck') is-invalid @enderror"
                            id="termsCheck" name="termsCheck" {{ old('termsCheck') ? 'checked' : '' }} required>
                        <label class="form-check-label" for="termsCheck">
                            By registering, you agree to the terms and conditions that
                            apply. Check again and make sure the form is completely
                            filled out.
                        </label>
                        @error('termsCheck')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-dark col-12">Submit</button>
                </form>
                <script>
                    function validateForm() {
                        // Mendapatkan referensi form
                        const form = document.getElementById('AddClientForm');
                        let isValid = true;
                        const category = document.getElementById('category');
                        if (category.value === '') {
                            category.classList.add('is-invalid');
                            isValid = false;
                        } else {
                            category.classList.remove('is-invalid');
                        }

                        // Memeriksa apakah PIC dipilih
                        const picName = document.getElementById('pic_name');
                        if (picName.value === '') {
                            picName.classList.add('is-invalid');
                            isValid = false;
                        } else {
                            picName.classList.remove('is-invalid');
                        }
                        return isValid;
                    }
                </script>
            </div>
        </div>
    </div>
</div>
<script>
    function showAlert() {
        alert('Data berhasil ditambahkan!');
    }
</script>
