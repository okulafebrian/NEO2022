<x-app title="Participants | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <h3 class="mb-4">Participant List</h3>

        <div class="card border-0 shadow-sm rounded-3 mb-4">
            <ul class="nav nav-tabs px-4 pt-2" id="myTab" role="tablist">
                @foreach ($competitions as $competition)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link-custom {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                            data-bs-target="#tab{{ $competition->id }}" type="button" role="tab">
                            {{ $competition->name != 'Speech' ? $competition->name : $competition->name . ' ' . $competition->category_init }}
                        </button>
                    </li>
                @endforeach
            </ul>

            <div class="card-body px-4">
                <div class="tab-content" id="nav-tabContent">
                    @foreach ($competitions as $competition)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                            id="tab{{ $competition->id }}" role="tabpanel" tabindex="0">
                            <div class="text-center mb-4">
                                <img src="/storage/images/assets/empty-cart.png" alt="" width="20%">
                                <h4>No Registration Yet</h4>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app>
