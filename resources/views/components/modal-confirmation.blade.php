<div id="{{ $action }}" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 25rem">
        <div class="modal-content border-0 shadow p-4">
            <div class="modal-header p-0 border-0">
                <h5 class="m-auto">{{ $title }}</h5>
            </div>
            <div class="modal-body text-center">
                <p class="text-muted">{{ $slot }}</p>
            </div>
            <div class="modal-footer row g-0 p-0 border-0">
                <div class="col">
                    <button type="button" class="btn btn-outline-light py-2 w-100"
                        data-bs-dismiss="modal">Cancel</button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-primary py-2 w-100">Continue</button>
                </div>
            </div>
        </div>
    </div>
</div>
