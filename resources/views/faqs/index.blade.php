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

    <div class="container px-lg-5 px-4 my-5">
        <ul class="nav nav-pills mb-5 d-flex justify-content-center" id="faqTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" data-bs-toggle="pill" data-bs-target="#faqTab1" type="button"
                    role="tab">
                    General
                </button>
            </li>
            <li class="nav-item mx-2" role="presentation">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#faqTab2" type="button" role="tab">
                    Accomodation
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#faqTab3" type="button" role="tab">
                    Competition
                </button>
            </li>
            <li class="nav-item mx-2" role="presentation">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#faqTab4" type="button" role="tab">
                    Technical Problems
                </button>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="faqTab1" role="tabpanel" tabindex="0">
                <div class="accordion" id="faqAccordion1">
                    @foreach ($faqs as $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $faq->id }}">
                                    {{ $faq->title }}
                                </button>
                            </h2>
                            <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse"
                                data-bs-parent="#faqAccordion1">
                                <div class="accordion-body">
                                    {{ $faq->description }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="tab-pane fade" id="faqTab2" role="tabpanel" tabindex="0">

            </div>
            <div class="tab-pane fade" id="faqTab3" role="tabpanel" tabindex="0">

            </div>
            <div class="tab-pane fade" id="faqTab4" role="tabpanel" tabindex="0">

            </div>
        </div>
    </div>
</x-app>
