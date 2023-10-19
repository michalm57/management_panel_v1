<div class="modal fade" id="companyFilterModal" tabindex="-1" role="dialog" aria-labelledby="companyFilterModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="companyFilterModalLabel">Filter by Company</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="companyFilterForm">
                    @foreach($companies as $company)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="companies[]" value="{{ $company->id }}" id="company{{ $company->id }}">
                            <label class="form-check-label" for="company{{ $company->id }}">
                                {{ $company->name }}
                            </label>
                        </div>
                    @endforeach
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary apply-filter">Apply Filter</button>
            </div>
        </div>
    </div>
</div>