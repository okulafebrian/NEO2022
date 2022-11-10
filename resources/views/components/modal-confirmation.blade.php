<div id="{{ $action }}{{ $model->id }}" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 28rem">
        <div class="modal-content border-0 shadow py-3">
            <div class="modal-header border-0">
                <h5 class="fw-semibold m-auto ">{{ $title }}</h5>
            </div>
            <div class="modal-body py-0 text-center">
                <p>{{ $slot }}</p>
            </div>
            <div class="modal-footer m-auto border-0">
                <button type="button" class="btn btn-outline-light py-2 px-5" data-bs-dismiss="modal">
                    Cancel
                </button>
                @if ($action == 'destroy')
                    <form method="POST" action="{{ route($name . '.' . $action, $model) }}">
                        @csrf
                        <input type="hidden" name="_method" value='DELETE'>
                        <button type="submit" class="btn btn-primary py-2 px-5">Continue</button>
                    </form>
                @else
                    <a href="{{ route($name . '.' . $action, $model) }}" class="btn btn-primary py-2 px-5">
                        Continue
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
