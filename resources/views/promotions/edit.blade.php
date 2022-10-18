<x-app title="Edit Promotion | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <div class="d-flex mb-4">
            <a href="{{ route('promotions.index') }}" class="btn btn-light rounded-circle me-3">
                <i class="fa-solid fa-arrow-left"></i>
            </a>
            <h3 class="m-0">Edit Promotion</h3>
        </div>


        <form method="POST" action="{{ route('promotions.update', $promotion) }}">
            @csrf

            <div class="card card-custom mb-3">
                <div class="card-body">
                    <div class="row g-0 mb-3">
                        <label class="col-3 col-form-label">Name</label>
                        <input type="text" class="col form-control" name="name" value="{{ $promotion->name }}"
                            required>
                    </div>
                    <div class="row g-0 mb-3">
                        <label class="col-3 col-form-label">Start Date</label>
                        <input type="datetime-local" class="col form-control" name="start"
                            value="{{ $promotion->start }}" required>
                    </div>
                    <div class="row g-0">
                        <label class="col-3 col-form-label">End Date</label>
                        <input type="datetime-local" class="col form-control" name="end"
                            value="{{ $promotion->end }}" required>
                    </div>
                </div>
            </div>

            <div class="card card-custom mb-3">
                <div class="card-body">
                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th scope="col">Competition</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quota</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($competitions as $competition)
                                <tr>
                                    <td>
                                        {{ $competition->name == 'Speech' ? $competition->name . ' ' . $competition->category : $competition->name }}
                                    </td>
                                    <td>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp</span>
                                            <input class="form-control price-format" type="text"
                                                name="promo_price[{{ $competition->id }}]"
                                                value="{{ $competition->promo_price }}" required>
                                        </div>
                                    </td>
                                    <td>
                                        <input class="form-control" type="number"
                                            name="promo_quota[{{ $competition->id }}]"
                                            value="{{ $competition->promo_quota }}" required>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                </div>
            </div>

            <div class="text-end">
                @method('PUT')
                <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
        </form>
    </div>
</x-app>
