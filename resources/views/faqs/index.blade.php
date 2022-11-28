<x-app title="FAQ | NEO 2022">

    <x-slot name="navbar"></x-slot>

    <section id="header2">
        <div class="mt-auto py-4">
            <x-section-title>
                <x-slot name="title">ABOUT NEO</x-slot>
                <x-slot name="headline">FREQUENTLY ASKED QUESTIONS</x-slot>
                <x-slot name="subtitle"></x-slot>
            </x-section-title>
        </div>
    </section>

    <div class="container px-lg-5 px-4" style="padding-top: 3rem; padding-bottom: 8rem;">
        <ul class="nav nav-pills mb-5 d-flex justify-content-center gap-2" id="faqTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#faqTab1" type="button"
                    role="tab">
                    General
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#faqTab2" type="button" role="tab">
                    Competition
                </button>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="faqTab1" role="tabpanel">
                <div class="accordion" id="generalAccordion">
                    @foreach ($generalFaqs as $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq{{ $faq->id }}">
                                    <div class="fw-medium">{{ $faq->title }}</div>
                                </button>
                            </h2>
                            <div id="faq{{ $faq->id }}" class="accordion-collapse collapse"
                                data-bs-parent="#generalAccordion">
                                <div class="accordion-body">{!! $faq->description !!}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="faqTab2" role="tabpanel">
                <section class="mb-5">
                    <h4 class="mb-3 text-primary fw-semibold">Debate</h4>

                    <div class="accordion" id="debateAccordion">
                        @foreach ($competitionFaqs as $faq)
                            @if ($faq->sub_category == 'debate')
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq{{ $faq->id }}">
                                            <div class="fw-medium">{{ $faq->title }}</div>
                                        </button>
                                    </h2>
                                    <div id="faq{{ $faq->id }}" class="accordion-collapse collapse"
                                        data-bs-parent="#debateAccordion">
                                        <div class="accordion-body">{!! $faq->description !!}</div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </section>

                <section class="mb-5">
                    <h4 class="mb-3 text-primary fw-semibold">Newscasting</h4>

                    <div class="accordion" id="newscastingAccordion">
                        @foreach ($competitionFaqs as $faq)
                            @if ($faq->sub_category == 'newscasting')
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq{{ $faq->id }}">
                                            <div class="fw-medium">{{ $faq->title }}</div>
                                        </button>
                                    </h2>
                                    <div id="faq{{ $faq->id }}" class="accordion-collapse collapse"
                                        data-bs-parent="#newscastingAccordion">
                                        <div class="accordion-body">{!! $faq->description !!}</div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </section>

                <section class="mb-5">
                    <h4 class="mb-3 text-primary fw-semibold">Short Story Writing</h4>

                    <div class="accordion" id="sswAccordion">
                        @foreach ($competitionFaqs as $faq)
                            @if ($faq->sub_category == 'short story writing')
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq{{ $faq->id }}">
                                            <div class="fw-medium">{{ $faq->title }}</div>
                                        </button>
                                    </h2>
                                    <div id="faq{{ $faq->id }}" class="accordion-collapse collapse"
                                        data-bs-parent="#sswAccordion">
                                        <div class="accordion-body">{!! $faq->description !!}</div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </section>

                <section>
                    <h4 class="mb-3 text-primary fw-semibold">Speech</h4>

                    <div class="accordion" id="speechAccordion">
                        @foreach ($competitionFaqs as $faq)
                            @if ($faq->sub_category == 'speech')
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq{{ $faq->id }}">
                                            <div class="fw-medium">{{ $faq->title }}</div>
                                        </button>
                                    </h2>
                                    <div id="faq{{ $faq->id }}" class="accordion-collapse collapse"
                                        data-bs-parent="#speechAccordion">
                                        <div class="accordion-body">{!! $faq->description !!}</div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app>
