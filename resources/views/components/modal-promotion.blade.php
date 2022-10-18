<div class="modal fade" id="cancel{{ $promotion->id }}" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 400px">
        <div class="modal-content rounded-4 border-0">
            <div class="modal-body text-center p-4">
                <h4>Cancel this promotion?</h4>
                <p class="my-4">
                    By canceling, the <b>{{ $promotion->name }}</b> promotion
                    will be
                    deleted and cannot be used.
                </p>
                <div class="d-grid gap-2">
                    <form method="POST" action="{{ route('promotions.destroy', $promotion) }}">
                        @csrf
                        <input type="hidden" name="_method" value='DELETE'>
                        <button class="btn btn-primary btn-lg" type="submit">Yes,
                            cancel</button>
                    </form>
                    <button class="btn btn-outline-primary btn-lg" type="button" data-bs-dismiss="modal">Back</button>
                </div>
            </div>
        </div>
    </div>
</div>
