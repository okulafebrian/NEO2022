<x-app title="Promotion | NEO 2022">
    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <h3 class="mb-4">Promotion</h3>

        @if ($promotion)
            <div class="row">
                <div class="col">
                    <div class="card card-custom mb-3">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5>{{ $promotion->name }}</h5>
                                    <p class="m-0">
                                        {{ date('j M Y', strtotime($promotion->start)) }}
                                        <span class="px-1">-</span>
                                        {{ date('j M Y', strtotime($promotion->end)) }}
                                    </p>
                                </div>
                                <div class="col text-end my-auto">
                                    <h5>
                                        @if (strtotime($promotion->start) > time())
                                            <span class="text-warning">Upcoming</span>
                                        @elseif (strtotime($promotion->start) <= time() && strtotime($promotion->end) >= time())
                                            <span class="text-success">Ongoing</span>
                                        @else
                                            <span class="text-secondary">Completed</span>
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-flex justify-content-end">
                        <a href="{{ route('promotions.edit', $promotion) }}" type="button"
                            class="btn btn-outline-primary px-4">
                            Edit
                        </a>
                        @if (strtotime($promotion->start) <= time() && strtotime($promotion->end) >= time())
                            <form action="{{ route('promotions.terminate', $promotion) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <button type="submit" class="btn btn-primary px-4">End Now</button>
                            </form>
                        @endif
                    </div>
                </div>
                <div class="col-4">
                    <div class="card card-custom">
                        <div class="card-body">
                            <h5 class="mb-3">Quota Summary</h5>
                            <ul class="list-group">
                                @foreach ($competitions as $competition)
                                    <li class="list-group-item">
                                        <b>{{ $competition->name }}</b> : {{ $competition->promo_registrations_count }}
                                        /
                                        {{ $competition->promo_quota }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="card card-custom">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <img src="/storage/images/assets/empty-cart.png" alt="" width="20%">
                        <h4 class="mb-3">You haven't created a promotion yet</h4>
                        <a href="{{ route('promotions.create') }}" class="btn btn-primary px-4">Create</a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-app>
