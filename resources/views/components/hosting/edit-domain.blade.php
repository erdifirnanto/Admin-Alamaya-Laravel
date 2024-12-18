<i class="fas fa-edit" style="cursor: pointer;" aria-expanded="false" data-bs-toggle="modal"
    data-bs-target="#editHostingModal-{{ $hosting->id }}"></i>

{{-- Edit Data Domain --}}
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
                <form method="POST" action="{{ route('domain.update', $domain->id) }}">
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
                                value="{{ $domain->domain }}" placeholder="Enter the Domain">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label name="expired" for="expired" id="expired" class="form-label"
                                style="font-size: 0.7em;">EXPIRED</label>
                            <input type="date" class="form-control" name="expired" for="expired" id="expired"
                                value="{{ $domain->expired }}" placeholder="Enter the Expired">
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-dark w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
