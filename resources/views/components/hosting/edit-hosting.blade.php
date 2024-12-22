<i class="fas fa-edit" style="cursor: pointer;" aria-expanded="false" data-bs-toggle="modal"
    data-bs-target="#editHostingModal-{{ $hosting->id }}"></i>

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
                            <label name="package" for="package" id="package" class="form-label"
                                style="font-size: 0.7em;">Package</label>
                            <select class="form-select" name="package" for="package" id="package">
                                <option value="{{ $hosting->package }}" selected>
                                    {{ $hosting->package }}
                                </option>
                                <option value="1">1</option>
                                <option value="3">3</option>
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label name="status" for="status" id="status" class="form-label"
                                style="font-size: 0.7em;">STATUS</label>
                            <select class="form-select" name="status" for="status" id="status">
                                <option value="{{ $hosting->status }}" selected>
                                    {{ $hosting->status }}
                                </option>
                                <option value="active">Active</option>
                                <option value="in_active">In Active</option>
                                <option value="expired">Expired</option>
                            </select>
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
