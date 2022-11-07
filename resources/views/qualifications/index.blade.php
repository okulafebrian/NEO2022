<x-app title="Qualifications | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>
    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <h4 class="mb-4 text-primary fw-semibold">Qualification List</h4>

        <div class="card card-custom p-0 px-4 mb-3">
            <ul class="nav nav-tabs border-0" id="participantTab" role="tablist">
                @foreach ($rounds as $round)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link {{ $loop->first ? 'active' : '' }}" data-bs-toggle="tab"
                            data-bs-target="#participantTab{{ $round->id }}" type="button" role="tab">
                            {{ $round->name }}
                        </button>
                    </li>
                @endforeach
        </div>

        <div class="tab-content">
            @foreach ($rounds as $round)
                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                    id="participantTab{{ $round->id }}" role="tabpanel" tabindex="0">

                    <div class="card card-custom">
                        <div class="card-body">
                            <ul class="nav nav-pills mb-3" id="competitionTab" role="tablist">
                                @foreach ($competitions as $competition)
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link {{ $loop->first ? 'active' : 'mx-1' }}"
                                            data-bs-toggle="pill"
                                            data-bs-target="#competitionTab{{ $competition->id }}{{ $round->id }}"
                                            type="button" role="tab">
                                            {{ $competition->name != 'Speech' ? $competition->name : $competition->name . ' - ' . $competition->category_init }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="tab-content">
                                @foreach ($competitions as $competition)
                                    <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                        id="competitionTab{{ $competition->id }}{{ $round->id }}" role="tabpanel"
                                        tabindex="0">
                                        @if (count($registrationDetails[$round->id][$competition->id]) > 0)
                                            <table class="table table-participant">
                                                <thead class="table-light">
                                                    <tr class="text-secondary">
                                                        <th>NAME</th>
                                                        <th>STATUS</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($registrationDetails[$round->id][$competition->id] as $registrationDetail)
                                                        <tr>
                                                            <td class="align-middle">
                                                                {{ $registrationDetail->participant->name }}
                                                            </td>
                                                            <td class="align-middle"></td>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        @else
                                            <div class="card border-0">
                                                <div class="text-center mb-4">
                                                    <img src="/storage/images/assets/empty_box.webp" alt="No Data"
                                                        width="20%">
                                                    <h4 class="mb-3 fw-semibold" style="font-size: 20px">
                                                        No Data Found
                                                    </h4>
                                                    <a href="{{ route('qualifications.create', [$round, $competition]) }}"
                                                        class="btn btn-primary py-2 px-5" type="button">
                                                        Add Data
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-app>
