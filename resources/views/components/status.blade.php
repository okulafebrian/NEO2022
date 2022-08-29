<div class="card mb-3 border-0 shadow-sm">
    <div class="row p-4">
        <div class="col-2">
            <img src="/storage/images/assets/icon.png" class="img-fluid rounded w-100" alt="icon">
        </div>
        <div class="col">
            <div class="card-body">
                <h4 class="card-title">
                    @foreach ($registration->competitions->unique() as $competition)
                        {{ $loop->first ? $competition->name : '- ' . $competition->name }}
                    @endforeach
                </h4>
                <p class="card-text mb-2">
                    @switch($status)
                        @case('waiting')
                            Waiting for payment <span id="paymentDue{{ $registration->id }}" class="badge bg-danger"></span>
                        @break

                        @case('unconfirmed')
                            Payment is being confirmed
                        @break

                        @case('confirmed')
                            Payment confirmed
                        @break

                        @case('expired')
                            Registration expired
                        @break
                    @endswitch
                </p>
                <p class="card-text m-0">{{ date('j F, H:m', strtotime($registration->created_at)) }}</p>
            </div>
        </div>
        <div class="col-3 d-flex flex-column justify-content-between align-items-end">
            <div class="dropdown">
                <button class="btn btn-primary" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu">
                    @if ($status == 'waiting')
                        <li><a class="dropdown-item" href="#">Cancel Registration</a></li>
                    @endif
                    <li><a class="dropdown-item" href="#">Registration Details</a></li>
                    <li><a class="dropdown-item" href="#">Help</a></li>
                </ul>
            </div>
            @if ($status == 'waiting')
                <button type="submit" class="btn btn-primary btn-lg">Pay Now</button>
            @elseif ($status == 'confirmed')
                <a href="" type="button" class="btn btn-primary btn-lg">Join Group</a>
            @endif

        </div>
    </div>
</div>
