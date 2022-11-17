<x-app title="NEO 2022">

    <x-slot name="navbar"></x-slot>

    <section id="header1">
        <div class="container">
            <x-section-title>
                <x-slot name="title">THE 2022 NATIONAL ENGLISH OLYMPICS</x-slot>
                <x-slot name="headline">
                    MARSHAL UP FOR THE <br>
                    FUTURE PARADE
                </x-slot>
                <x-slot name="subtitle">
                    Online Hybrid | BINUS University @Alam Sutera Campus <br>
                    Dec 4 and 16 - 17, 2022
                </x-slot>
            </x-section-title>

            <div class="text-center">
                <a href="{{ route('dashboard') }}" class="btn btn-primary-neon rounded-pill py-3 px-4 me-2">
                    Register Now
                </a>
                <button class="btn btn-outline-purple-100 rounded-pill py-3 px-4">
                    <i class="bi bi-download me-1"></i>E-booklet
                </button>

            </div>
        </div>
    </section>

    <section id="about">
        <div class="container px-lg-5 px-4">
            {{-- <div class="text-center" style="margin-bottom: 5rem">
                <img src="/storage/images/assets/NEO_2.png" width="40%" alt="NEO">
            </div> --}}

            <x-section-title>
                <x-slot name="title">ABOUT NATIONAL ENGLISH OLYMPICS</x-slot>
                <x-slot name="headline">OUR SPECTRUM</x-slot>
                <x-slot name="subtitle"></x-slot>
            </x-section-title>

            <p class="text-purple-100 mb-5 px-lg-5" style="line-height: 200%">
                National English Olympics, commonly known as <b> NEO</b>, is an English competition where
                the potential of young generations from all over Indonesia is improved and developed through various
                competition fields. We are inviting talented individuals from <b>December 1 to 5</b> to compete in
                <b>4 fields of competition</b>, including <b>debate, newscasting, short story writing, and speech</b>.
                This year’s speech competition will also have <b>2 categories</b>: junior high and open (senior high and
                university).
            </p>

            <p class="text-purple-100 px-lg-5" style="line-height: 200%">
                The 2022 NEO brings up the theme <b>“Back to the Future”</b>with the title <b>“Future Parade” </b>
                because it is aligned with the value and purpose of the National English Olympics itself, where we learn
                that things that seem <b>small</b> actually have a <b>long-term effect</b> on our lives. So when it
                seems hard for us to fight for our aim, we will know that when we do it <b>step by step</b>, we will
                <b>be there</b> eventually.
            </p>
        </div>
    </section>

    <section id="competitions">
        <div class="container px-lg-5 px-4">
            <x-section-title>
                <x-slot name="title">COMPETITIONS</x-slot>
                <x-slot name="headline">IGNITE YOUR TALENT</x-slot>
                <x-slot name="subtitle">Click the icon to view competition details</x-slot>
            </x-section-title>

            <div class="row row-cols-5 px-lg-5">
                @foreach ($competitions as $competition)
                    <div class="col">
                        <div class="card card-competition bg-transparent border-0" data-bs-toggle="modal"
                            data-bs-target="#show{{ $competition->id }}" type="button">
                            <img src="/storage/images/logos/{{ $competition->logo }}" class="rounded-4"
                                alt="{{ $competition->name }}">
                            <h5 class="text-purple-100 text-center mt-3">
                                {{ $competition->name == 'Speech' ? $competition->name . ' ' . $competition->category : $competition->name }}
                            </h5>
                        </div>
                    </div>

                    {{-- MODAL --}}
                    <div class="modal fade" id="show{{ $competition->id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content border-0 shadow p-2">
                                <div class="modal-header pb-0 border-0">
                                    <h6 class="m-0">COMPETITION FIELDS</h6>
                                    <i class="bi bi-x fa-2xl" role="button" data-bs-dismiss="modal"></i>
                                </div>
                                <div class="modal-body">
                                    <h3 class="text-primary fw-semibold">
                                        {{ $competition->name != 'Speech' ? $competition->name : $competition->name . ' ' . $competition->category }}
                                    </h3>
                                    {!! $competition->description !!}

                                    <hr class="my-4">

                                    <h5 class="mb-3 text-primary">PRICES</h5>
                                    <div class="row">
                                        <div class="col">
                                            <div class="card bg-purple-100 border-0">
                                                <div class="card-body">
                                                    <h6 class="mb-1">Early Bird</h6>
                                                    <p class="m-0">
                                                        Rp {{ number_format($competition->early_price, 0, '.', '.') }} /
                                                        {{ $competition->name == 'Debate' ? 'team' : 'person' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card bg-purple-100 border-0">
                                                <div class="card-body">
                                                    <h6 class="mb-1">Normal Registration</h6>
                                                    <p class="m-0">
                                                        Rp {{ number_format($competition->normal_price, 0, '.', '.') }}
                                                        / {{ $competition->name == 'Debate' ? 'team' : 'person' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    {!! $competition->rules !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="timeline">
        <div>
            <div class="container px-lg-5 px-4">
                <x-section-title>
                    <x-slot name="title">TIMELINE</x-slot>
                    <x-slot name="headline">PREPARE THE PARADE</x-slot>
                    <x-slot name="subtitle">Mark your calendars so you don’t miss the dates!</x-slot>
                </x-section-title>
            </div>

            <img src="/storage/images/assets/timeline.svg" width="100%" alt="Timeline">
        </div>
    </section>

    <section id="details">
        <div class="container px-lg-5 px-4">
            <x-section-title>
                <x-slot name="title">DETAILS</x-slot>
                <x-slot name="headline">NEO STARTER PACK</x-slot>
                <x-slot name="subtitle">Things you need to know about The NEO 2022!</x-slot>
            </x-section-title>

            <div class="row row-cols-4 pt-5">
                <div class="col">
                    <div class="card card-pack rounded-5 h-100">
                        <img src="/storage/images/assets/how_to_register.png" width="35%" class="img-pack rounded-4"
                            alt="How to Register">
                        <div class="card-body d-flex flex-column">
                            <h5 class="fw-bold mb-3 mt-5">How to Register</h5>
                            <p>
                                Ready to register? Follow the steps provided by clicking the button below!
                            </p>
                            <button class="btn btn-dark btn-linear rounded-pill me-auto mt-auto" data-bs-toggle="modal"
                                data-bs-target="#showRegisterStep">See More</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-pack rounded-5 h-100">
                        <img src="/storage/images/assets/terms_and_condition.png" width="35%"
                            class="img-pack rounded-4" alt="Terms & Condition">
                        <div class="card-body d-flex flex-column">
                            <h5 class="fw-bold mb-3 mt-5">Terms & Condition</h5>
                            <p>
                                Find out whether you are eligible and the things you might need to prepare in this
                                section!
                            </p>
                            <button class="btn btn-dark btn-linear rounded-pill me-auto mt-auto" data-bs-toggle="modal"
                                data-bs-target="#showTermsCondition">See More</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-pack rounded-5 h-100">
                        <img src="/storage/images/assets/tips_and_tricks.png" width="35%" class="img-pack rounded-4"
                            alt="Tips and Tricks">
                        <div class="card-body d-flex flex-column">
                            <h5 class="fw-bold mb-3 mt-5">Tips and Tricks</h5>
                            <p>Your first time in a competition? Worry nothing for we are here to give you off a
                                headstart with some awesome tips!</p>
                            <button class="btn btn-dark btn-linear rounded-pill me-auto mt-auto"
                                data-bs-toggle="modal" data-bs-target="#showTips">See More</button>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card card-pack rounded-5 h-100">
                        <img src="/storage/images/assets/benefits.png" width="35%" class="img-pack rounded-4"
                            alt="Benefits">
                        <div class="card-body d-flex flex-column">
                            <h5 class="fw-bold mb-3 mt-5">Benefits</h5>
                            <p>not only will you get a national competing experience, you will also gain even more
                                awesome benefits from joining NEO 2022!</p>
                            <button class="btn btn-dark btn-linear rounded-pill me-auto mt-auto"
                                data-bs-toggle="modal" data-bs-target="#showBenefits">See More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- HOW TO REGISTER MODAL --}}
        <div class="modal fade" id="showRegisterStep" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content border-0 shadow p-3">
                    <div class="modal-header pb-0 border-0">
                        <h6 class="m-0">NEO STARTER PACK</h6>
                        <i class="bi bi-x fa-2xl" role="button" data-bs-dismiss="modal"></i>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-primary fw-semibold mb-4">
                            How to Register
                        </h3>

                        <ol class="li-custom">
                            <li>Open <a href="{{ route('home') }}">https://neo.mybnec.org/</a>.</li>
                            <li>Sign up first by creating new account.</li>
                            <li>After logged in, select available competitions that you want to register.</li>
                            <li>Fill in the registration form and review</li>
                            <li>Complete your payment and upload your transaction proof before payment due</li>
                            <li>You will receive invoice email from committee after your payment succesfully verified
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        {{-- TERMS AND CONDITION MODAL --}}
        <div class="modal fade" id="showTermsCondition" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content border-0 shadow p-3">
                    <div class="modal-header pb-0 border-0">
                        <h6 class="m-0">NEO STARTER PACK</h6>
                        <i class="bi bi-x fa-2xl" role="button" data-bs-dismiss="modal"></i>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-primary fw-semibold mb-4">
                            Terms and Condition
                        </h3>

                        <div class="accordion accordion-flush" id="accordionTerms">
                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#generalRules">
                                        <b>General Rules and Regulations</b>
                                    </button>
                                </h2>
                                <div id="generalRules" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionTerms">
                                    <div class="accordion-body">
                                        <ol class="li-custom ps-3">
                                            <li>A registered participant <b>cannot</b> be replaced.</li>
                                            <li>
                                                All competition rules are binding, absolute, and might be altered,
                                                added, or eliminated by the committees if necessary. Participants
                                                who don’t abide by the rules will be <b>disqualified</b>.
                                            </li>
                                            <li>
                                                Competitions <b>must</b> be done in English. Competition
                                                content (speech and scripts) <b>must not</b> conduct
                                                discrimination against SARA nor contain graphic sexual content or
                                                any form of profanity.
                                            </li>
                                            <li>
                                                For preliminary rounds, every participant <b>shoukd</b>
                                                stand by 30 minutes before their performance. The participant’s
                                                performance will be recorded to avoid any misjudgment, such as bad
                                                connection. All participants <b>must</b> consent that
                                                their activity is recorded during the event.
                                            </li>
                                            <li>
                                                Junior High School and High School participants
                                                <b>must</b> wear their school uniform and for the open
                                                category must wear a formal t-shirt. All participants must wear
                                                shoes (or flat shoes) for the competition on onsite days.
                                            </li>
                                            <li>
                                                The participant’s performance will be recorded to avoid any
                                                misjudgment such as bad connection. All participants
                                                <b>must</b> consent that their activity is recorded during
                                                the event.
                                            </li>
                                            <li>
                                                Every participant or representative <b>must</b> attend the
                                                Technical Meeting and Coaching Clinic on <b>December 3rd, 2022</b>.
                                            </li>
                                            <li>
                                                Participants who don’t attend the Technical Meeting and Coaching
                                                Clinic <b>won't be guranteed</b> to get further information from the
                                                committee outside those sessions. If participants <b>cannot</b>
                                                participate, they <b>must</b> inform the committee regarding their
                                                absence and will receive written notes of the event after it is
                                                finished.
                                            </li>
                                            <li>
                                                The committee <b>will</b> call every participant <b>3
                                                    times</b> before their turns come. If the participant is
                                                not present, this action will be considered a walkout.
                                            </li>
                                            <li>
                                                Judges <b>may</b>, at their discretion, deduct points from
                                                the total score in one round for violation of rules (except for
                                                timing). Judges may also disqualify participants for gross
                                                misconduct or ineligibility.
                                            </li>
                                            <li>
                                                The NEO 2022 committee is <b>not responsible</b> for any
                                                internet issues or other issues/disturbances suffered by the
                                                participants or judges throughout the competition.
                                            </li>
                                            <li>
                                                All participants <b>should</b> respect and appreciate
                                                every judgment from the judges.
                                            </li>
                                            <li>All judge’s decisions and results are considered <b>final</b>.</li>
                                            <li>
                                                There won’t be any refunds. However, if the time given to upload payment
                                                proof has already <b>expired</b> and the competition slots are
                                                already <b>full</b>, refund will be given. Had there be any technical
                                                issue, participants can contact the contact person.
                                            </li>
                                            <li>
                                                If a registrant decides to walk out, the registration fee that has
                                                been paid <b>cannot</b> be returned.
                                            </li>
                                            <li>
                                                All participants who pass to the semifinal round should re-register
                                                themselves <b>maximum D-7</b> before the competition
                                                starts on day 2. After the announcement of the semi-finalists,
                                                participants <b>will receive</b> an email with steps to
                                                re-register themselves on the website.
                                            </li>
                                            <li>
                                                Participants outside Jabodetabek who passed into the semi-final
                                                round are <b>obliged</b> to use the accommodation provided
                                                by the committees. For detailed rules and regulation for
                                                accommodation provided, please check the accommodation guideline.
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#eligibility">
                                        <b>Eligibility</b>
                                    </button>
                                </h2>
                                <div id="eligibility" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionTerms">
                                    <div class="accordion-body">
                                        <ol class="li-custom ps-3">
                                            <li>
                                                Participants must be a <b>Junior High School</b> or <b>Senior
                                                    High School</b> or <b>University</b> student located in Indonesia.
                                            </li>
                                            <li>
                                                Participants must be at least 12 years old and at
                                                most 22 years old by 2022.
                                            </li>
                                            <li>
                                                Participants must have completed the COVID-19 vaccination course (first
                                                and second doses).
                                            </li>
                                            <li>
                                                Participants who are still a junior high school student are only
                                                allowed to join the Speech Junior High competition.
                                            </li>
                                            <li>
                                                Participants are allowed to join more than one competition field.
                                            </li>
                                            <li>
                                                Participants who are previous winners of NEO are allowed to join the
                                                same competition field.
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#payment">
                                        <b>Payment</b>
                                    </button>
                                </h2>
                                <div id="payment" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionTerms">
                                    <div class="accordion-body">
                                        <ol class="li-custom ps-3">
                                            <li>
                                                Payment can be done through <b>Bank Transfers</b> or
                                                <b>E-Wallets</b>.
                                            </li>
                                            <li>Payment <b>cannot</b> be refunded.</li>
                                            <li>
                                                Payment <b>must</b> be done in full, which means installment payments
                                                are not accepted.
                                            </li>
                                            <li>Payment <b>must</b> be done within the given time at the
                                                website when doing the registration process.
                                            </li>
                                            <li>
                                                After payment is done, participants <b>will</b> receive
                                                the payment confirmation in the period of <b>1x24 hours</b>.
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#accomodation">
                                        <b>Accomodation</b>
                                    </button>
                                </h2>
                                <div id="accomodation" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionTerms">
                                    <div class="accordion-body">
                                        <ol class="li-custom ps-3">
                                            <li>
                                                Accommodations will be provided only for participants
                                                <b>outside</b> Jabodetabek that pass the preliminary round.
                                            </li>
                                            <li>
                                                Participants outside Jabodetabek <b>must</b> arrive in
                                                Tangerang a maximum of one day before Day 2 of the Competition
                                                (December 15, 2022), or it will be considered a walkout.
                                            </li>
                                            <li>
                                                On the day before Day 2 of the competition, participants
                                                <b>should</b> go straight to the hotel the committees have
                                                prepared for them. Committees will wait at the hotel to help assist
                                                with the check-in process.
                                            </li>
                                            <li>The committee <b>will provide</b> a hotel for 4D3N (four
                                                days and three nights), starting from the day before Day 2 of the
                                                competition, as well as transportation (bus) which route will be
                                                from BINUS Alam Sutera Campus to Hotel and Hotel to BINUS Alam
                                                Sutera Campus.
                                            </li>
                                            <li>
                                                Regarding Guide #4, since the committee only provides accommodation
                                                for 4D3N, had any of the participants arrived before the time
                                                assigned/earlier than expected (e.g. December 12, December 14), it
                                                is <b>not</b> the committee’s responsibility to provide any
                                                accommodation or services.
                                            </li>
                                            <li>
                                                The participants who arrive earlier than assigned can stay at the
                                                recommended place. However, the accommodation, consumption, and
                                                hotel price will be the <b>participant’s responsibility</b> until the
                                                appointed time. For the reason that the accommodation price which
                                                participants pay only applies at the appointed time.
                                            </li>
                                            <li>
                                                There <b>won’t</b> be any accommodation provided for the participant’s
                                                companion/guide.
                                            </li>
                                            <li>
                                                The roommate will be a participant of the <b>same</b> gender, but the
                                                committee <b>can’t</b> make sure who the participant is. This can be a
                                                chance for you to bond and make new friends.
                                            </li>
                                            <li>
                                                Participants are <b>prohibited</b> from going home before
                                                the closing ceremony since the bus operation to send the participant
                                                to the hotel is started again only after the closing ceremony.
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#technicalMeeting">
                                        <b>Technical Meeting</b>
                                    </button>
                                </h2>
                                <div id="technicalMeeting" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionTerms">
                                    <div class="accordion-body">
                                        <ol class="li-custom ps-3">
                                            <li>Represented by the <b>chairperson/one</b> of the group members.</li>
                                            <li>
                                                Participants <b>must</b> attend the Technical Meeting from the beginning
                                                until the end.
                                            </li>
                                            <li>
                                                Participants are <b>highly requested</b> to join the Zoom meeting 30
                                                minutes before the Technical Meeting starts.
                                            </li>
                                            <li>
                                                Participants <b>have to</b> wear appropriate clothing while attending
                                                the Technical Meeting.
                                            </li>
                                            <li>
                                                Participants are <b>prohibited</b> from wearing clothing/attributes that
                                                indicate their origin of institution.
                                            </li>
                                            <li>
                                                Participants are <b>prohibited</b> from using the name format indicating
                                                their origin of the institution.
                                            </li>
                                            <li>
                                                Participants <b>must</b> pay attention and not make noise during the
                                                Technical Meeting.
                                            </li>
                                            <li>
                                                Participants are <b>expected</b> to use the virtual background: [LINK]
                                            </li>
                                            <li>
                                                Participants are <b>expected</b> to turn on their cameras during the
                                                event.
                                            </li>
                                            <li>
                                                Participants <b>have to</b> mute their microphones during the event.
                                            </li>
                                            <li>
                                                Participants are <b>allowed</b> to ask through the chatbox or unmute
                                                their mic after using the "raise hand" feature in the QnA session.
                                            </li>
                                            <li>
                                                Participants are <b>not allowed</b> to leave the Zoom meeting without
                                                the committee's permission.
                                            </li>
                                            <li>
                                                Participants who do not attend <b>must</b> accept the results of the
                                                Technical Meeting.
                                            </li>
                                            <li>
                                                There is <b>no re-explanation</b> of information during the Technical
                                                Meeting to participants/groups who were not present.
                                            </li>
                                            <li>
                                                It is <b>prohibited</b> to display or show videos and/or images related
                                                to pornography, smoking, liquor, and others that violate the ITE Law of
                                                the Republic of Indonesia.
                                            </li>
                                            <li>
                                                Participants <b>must</b> obey all the rules that have been made by the
                                                committee.
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item">
                                <h2 class="accordion-header">
                                    <button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#coachingClinic">
                                        <b>Coaching Clinic</b>
                                    </button>
                                </h2>
                                <div id="coachingClinic" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionTerms">
                                    <div class="accordion-body">
                                        <ol class="li-custom ps-3">
                                            <li>Represented by the <b>chairperson/one</b> of the group members.</li>
                                            <li>
                                                Participants <b>must</b> attend the Coaching Clinic from the beginning
                                                until the end.
                                            </li>
                                            <li>
                                                Participants are <b>highly requested</b> to join the Zoom meeting 30
                                                minutes before the Coaching Clinic starts.
                                            </li>
                                            <li>
                                                Participants <b>have to</b> wear appropriate clothing while attending
                                                the Coaching Clinic.
                                            </li>
                                            <li>
                                                Participants are <b>prohibited</b> from wearing clothing/attributes that
                                                indicate their origin of institution.
                                            </li>
                                            <li>
                                                Participants are <b>prohibited</b> from using the name format indicating
                                                their origin of the institution.
                                            </li>
                                            <li>
                                                Participants <b>must</b> pay attention and not make noise during the
                                                Coaching Clinic.
                                            </li>
                                            <li>
                                                Participants are <b>expected</b> to use the virtual background: [LINK]
                                            </li>
                                            <li>
                                                Participants are <b>expected</b> to turn on their cameras during the
                                                event.
                                            </li>
                                            <li>
                                                Participants <b>have to</b> mute their microphones during the event.
                                            </li>
                                            <li>
                                                Participants are <b>allowed</b> to ask through the chatbox or unmute
                                                their mic after using the "raise hand" feature in the QnA session.
                                            </li>
                                            <li>
                                                Participants are <b>not allowed</b> to leave the Zoom meeting without
                                                the committee's permission.
                                            </li>
                                            <li>
                                                There is <b>no re-explanation</b> of information during the Coaching
                                                Clinic to participants/groups who were not present.
                                            </li>
                                            <li>
                                                It is <b>prohibited</b> to display or show videos and/or images related
                                                to pornography, smoking, liquor, and others that violate the ITE Law of
                                                the Republic of Indonesia.
                                            </li>
                                            <li>
                                                Participants <b>must</b> obey all the rules that have been made by the
                                                committee.
                                            </li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- TIPS AND TRICKS MODAL --}}
        <div class="modal fade" id="showTips" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content border-0 shadow p-3">
                    <div class="modal-header pb-0 border-0">
                        <h6 class="m-0">NEO STARTER PACK</h6>
                        <i class="bi bi-x fa-2xl" role="button" data-bs-dismiss="modal"></i>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-primary fw-semibold mb-4">
                            Tips and Tricks
                        </h3>

                        <ul class="list-group list-custom list-group-flush">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="/storage/images/assets/know_material.png" width="100%"
                                            class="rounded-4">
                                    </div>
                                    <div class="col">
                                        <h5>Know Your Material</h5>
                                        <p>Whether it is debate, newscasting, speech, or short story writing, make sure
                                            to know your material thoroughly to master your performance and have
                                            confidence in it in front of the judges.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="/storage/images/assets/rest.png" width="100%" class="rounded-4">
                                    </div>
                                    <div class="col">
                                        <h5>Rest Well</h5>
                                        <p>The night before the competition surely is thrilling, but that is when you
                                            need to have enough time to rest, both your body and mind—tiring yourself by
                                            practicing until late at night will have an inverse result on your
                                            performance.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="/storage/images/assets/practice.png" width="100%"
                                            class="rounded-4">
                                    </div>
                                    <div class="col">
                                        <h5>Practice Makes Perfect</h5>
                                        <p>As we all know, practice makes perfect. Make time and effort for your
                                            practice weeks until days before the competitions, even minutes before, to
                                            polish it to perfection. The result will pay off your hard work.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="/storage/images/assets/full.png" width="100%" class="rounded-4">
                                    </div>
                                    <div class="col">
                                        <h5>Arrive Early and Full</h5>
                                        <p>It would be best if you had enough time to prepare yourself, especially the
                                            mind, before your competition starts. That way, you will also have time to
                                            re-do the overall performance and pay attention to the tiny details. Oh!
                                            Don’t forget to have breakfast before your performance because hunger will
                                            certainly disturb your performance on stage.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="/storage/images/assets/optimistic.png" width="100%"
                                            class="rounded-4">
                                    </div>
                                    <div class="col">
                                        <h5>Be Optimistic</h5>
                                        <p>Negativity will be in the way between you and the winner’s podium if you keep
                                            thinking about it. Positively picture yourself and go through the stages of
                                            the competitions with confidence. Believe in your practice and your work.
                                            Therefore, the stage will be waiting for you.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="/storage/images/assets/listen_to_feedback.png" width="100%"
                                            class="rounded-4">
                                    </div>
                                    <div class="col">
                                        <h5>Listen to the Feedback</h5>
                                        <p>One way of improving yourself is by listening to others, especially to the
                                            judges who are experienced in the same field of competition you are
                                            competing in. Take notes in your head while they are speaking, both the good
                                            and the bad, so you can improve yourselves in the future.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="/storage/images/assets/have_fun.png" width="100%"
                                            class="rounded-4">
                                    </div>
                                    <div class="col">
                                        <h5>Have Fun!</h5>
                                        <p>Last but not least, don’t forget to have fun! Competing is an experience you
                                            won’t be able to repeat, whether it is your first time or not. To compete in
                                            the NEO 2022 is to have a unique experience you won’t get anywhere or
                                            anytime else. So don’t forget to enjoy yourselves while doing the
                                            competitions!
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- BENEFITS MODAL --}}
        <div class="modal fade" id="showBenefits" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content border-0 shadow p-3">
                    <div class="modal-header pb-0 border-0">
                        <h6 class="m-0">NEO STARTER PACK</h6>
                        <i class="bi bi-x fa-2xl" role="button" data-bs-dismiss="modal"></i>
                    </div>
                    <div class="modal-body">
                        <h3 class="text-primary fw-semibold mb-4">
                            Benefits
                        </h3>

                        <ul class="list-group list-custom list-group-flush">
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="/storage/images/assets/aeo_ticket.png" width="100%"
                                            class="rounded-4">
                                    </div>
                                    <div class="col">
                                        <h5>Free Tickets to Asian English Olympics (AEO)
                                            <span class="text-danger">*</span>
                                        </h5>
                                        <p class="mb-2">The winners of The NEO 2022 will receive free passes to enter
                                            the most awaited English olympics across Asia, The Asian English Olympics
                                            2023.</p>
                                        <small class="text-danger">* except for Junior High students</small>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="/storage/images/assets/money.png" width="100%" class="rounded-4">
                                    </div>
                                    <div class="col">
                                        <h5>Prize Money</h5>
                                        <p>Not only free tickets to The AEO, the winners of NEO 2022 will also receive
                                            prize money up to Rp. 15.000.000++ in total!</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="/storage/images/assets/trophy.png" width="100%"
                                            class="rounded-4">
                                    </div>
                                    <div class="col">
                                        <h5>Trophy</h5>
                                        <p>The NEO 2022 will also provide trophies for the champions as a congrtulary
                                            prize which can be kept by the winners as an object of precious memories.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="/storage/images/assets/experience.png" width="100%"
                                            class="rounded-4">
                                    </div>
                                    <div class="col">
                                        <h5>National Experience</h5>
                                        <p>By joining The NEO 2022, all of you will receive an experience competing in a
                                            national scale, which surely is another attractive point to add to your CV!
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="/storage/images/assets/networking.png" width="100%"
                                            class="rounded-4">
                                    </div>
                                    <div class="col">
                                        <h5>Networking</h5>
                                        <p>Participants from all over Indonesia will gather in The NEO 2022 and it will
                                            surely be a great chance for you to expand your networking, meeting up with
                                            extraordinaries comrades!</p>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-2">
                                        <img src="/storage/images/assets/sat.png" width="100%" class="rounded-4">
                                    </div>
                                    <div class="col">
                                        <h5>SAT Points for Binusian</h5>
                                        <p>Last but not least, only for BINUSIANS, you will also receive SAT Points for
                                            your participations in The NEO 2022!</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="judges">
        <div class="container px-lg-5 px-4">
            <x-section-title>
                <x-slot name="title">PROFILES</x-slot>
                <x-slot name="headline">MEET THE JUDGES</x-slot>
                <x-slot name="subtitle">Take a look at the amazing individuals that will be the judges of the
                    competitions!</x-slot>
            </x-section-title>


            <div class="d-flex justify-content-between">
                <div style="width: 15%; margin-top: 6rem;">
                    <img src="/storage/images/assets/spider.png" width="100%" alt="Spider">
                </div>
                <div class="d-flex gap-4 ms-auto h-100" style="width: 70%">
                    <div class="card card-judge border-0 rounded-4 h-100 align-self-center">
                        <div class="card-body text-center text-light">
                            <img src="/storage/images/assets/Square.png" class="mb-3 rounded-4" width="100%"
                                alt="">
                            <p class="mb-1">Newscasting Judges</->
                            <h5 class="fw-semibold m-0">Vincent Febrien</h5>
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-4">
                        <div class="my-5"></div>
                        <div class="card card-judge border-0 rounded-4">
                            <div class="card-body text-center text-light">
                                <img src="/storage/images/assets/Square.png" class="mb-3 rounded-4" width="100%"
                                    alt="">
                                <p class="mb-1">Newscasting Judges</->
                                <h5 class="fw-semibold m-0">Vincent Febrien</h5>
                            </div>
                        </div>
                        <div class="card card-judge border-0 rounded-4">
                            <div class="card-body text-center text-light">
                                <img src="/storage/images/assets/Square.png" class="mb-3 rounded-4" width="100%"
                                    alt="">
                                <p class="mb-1">Newscasting Judges</->
                                <h5 class="fw-semibold m-0">Vincent Febrien</h5>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex flex-column gap-4">
                        <div class="card card-judge border-0 rounded-4">
                            <div class="card-body text-center text-light">
                                <img src="/storage/images/assets/Square.png" class="mb-3 rounded-4" width="100%"
                                    alt="">
                                <p class="mb-1">Newscasting Judges</->
                                <h5 class="fw-semibold m-0">Vincent Febrien</h5>
                            </div>
                        </div>
                        <div class="card card-judge border-0 rounded-4">
                            <div class="card-body text-center text-light">
                                <img src="/storage/images/assets/Square.png" class="mb-3 rounded-4" width="100%"
                                    alt="">
                                <p class="mb-1">Newscasting Judges</->
                                <h5 class="fw-semibold m-0">Vincent Febrien</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="testimony">
        <div class="container px-lg-5 px-4">
            <x-section-title>
                <x-slot name="title">TESTIMONY</x-slot>
                <x-slot name="headline">EXTRAORDINARY CHAMPS</x-slot>
                <x-slot name="subtitle">A few words from the previous winners of NEO</x-slot>
            </x-section-title>

            <div id="testimonyCarousel" class="carousel carousel-fade px-5">
                <div class="carousel-inner rounded-4" style="box-shadow: 20px 24px 24px rgba(0, 0, 0, 0.3);">
                    @foreach ($testimonies as $testimony)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}" data-bs-interval="10000">
                            <div class="card card-testimony rounded-4">
                                <div class="card-body text-light">
                                    <div class="row g-5">
                                        <div class="col-md-3">
                                            <img src="/storage/images/testimonies/{{ $testimony->photo }}"
                                                class="rounded-circle" width="100%">
                                        </div>
                                        <div class="col">
                                            <p class="mb-5">
                                                <sup><i class="fa-solid fa-quote-left fa-xl me-1"></i></sup>
                                                {{ $testimony->description }}
                                                <sup><i class="fa-solid fa-quote-right ms-1 fa-xl"></i></sup>
                                            </p>
                                            <h6 class="fw-semibold mb-1">{{ $testimony->name }}</h6>
                                            <small>{{ $testimony->role }}</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="d-flex justify-content-center mt-5">
                    @foreach ($testimonies as $index => $testimony)
                        <img src="/storage/images/testimonies/{{ $testimony->photo }}" type="button"
                            class="tab-profile {{ $loop->first ? 'active' : '' }}"
                            data-bs-target="#testimonyCarousel" data-bs-slide-to="{{ $index }}"
                            width="8%" data-id="{{ $index }}">
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="teaser">
        <div class="w-100">
            <div class="container px-lg-5 px-4">
                <x-section-title>
                    <x-slot name="title">TEASER</x-slot>
                    <x-slot name="headline">A GLIMPSE OF NEO 2022</x-slot>
                    <x-slot name="subtitle">Peek into this video as your first step into the future parade!</x-slot>
                </x-section-title>
            </div>

            <div class="ratio ratio-16x9">
                <iframe class="embed-responsive-item rounded-20" src="https://www.youtube.com/embed/9RPEtrO6-oo"
                    allowfullscreen></iframe>
            </div>
        </div>
    </section>

    <section id="merchandise">
        <div class="container px-lg-5 px-4">
            <x-section-title>
                <x-slot name="title">MERCHANDISE</x-slot>
                <x-slot name="headline">HOT STUFF</x-slot>
                <x-slot name="subtitle">Get yourselves our coolest merchandise and celebrate the future parade now!
                </x-slot>
            </x-section-title>
        </div>
    </section>

    <section id="merchandise">
        <div class="container px-lg-5 px-4">
            <x-section-title>
                <x-slot name="title">FAQ</x-slot>
                <x-slot name="headline">ANY QUESTIONS</x-slot>
                <x-slot name="subtitle">These are some more extra details you might need</x-slot>
            </x-section-title>
        </div>
    </section>

    <div class="background-custom">
        <section id="supports">
            <div class="container px-lg-5 px-4">
                <x-section-title>
                    <x-slot name="title">CALLING OUT</x-slot>
                    <x-slot name="headline">SUPPORTING PARTNERS</x-slot>
                    <x-slot name="subtitle">
                        Contact us below to join the biggest national English competition of the year!
                    </x-slot>
                </x-section-title>

                <div class="card-support mb-5">
                    <h5 class="text-purple-100" style="background-color: #1F204C;">SPONSORS</h5>
                    <div class="row g-4">
                        <div class="col-md">
                            <div class="card-cp">
                                <h4 class="mb-4">Cherish Rachel Priscilla</h4>
                                <p class="mb-2"><i class="bi bi-line fa-lg me-2"></i>cherishpriscilla</p>
                                <p class="mb-2"><i class="bi bi-whatsapp fa-lg me-2"></i>0877 0305 8905</p>
                                <p class="mb-2"><i
                                        class="bi bi-envelope-fill fa-lg me-2"></i>cherishrachelpriscilla@gmail.com
                                </p>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="card-cp">
                                <h4 class="mb-4">Liu Fen Phaw</h4>
                                <p class="mb-2"><i class="bi bi-line fa-lg me-2"></i>aphaw85</p>
                                <p class="mb-2"><i class="bi bi-whatsapp fa-lg me-2"></i>0811 2111 2308</p>
                                <p class="mb-2"><i
                                        class="bi bi-envelope-fill fa-lg me-2"></i>phawliufen9508@gmail.com
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-support">
                    <h5 class="text-purple-100" style="background-color: #2D2A57;">MEDIA PARTNERS</h5>
                    <div class="row g-4">
                        <div class="col-md">
                            <div class="card-cp">
                                <h4 class="mb-4">Jovanna Melissa</h4>
                                <p class="mb-2"><i class="bi bi-line fa-lg me-2"></i>jovjus1002</p>
                                <p class="mb-2"><i class="bi bi-whatsapp fa-lg me-2"></i>0812 1975 0363</p>
                                <p class="mb-2"><i
                                        class="bi bi-envelope-fill fa-lg me-2"></i>jovanna.melissa@binus.ac.id
                                </p>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="card-cp">
                                <h4 class="mb-4">Felicia Josevine</h4>
                                <p class="mb-2"><i class="bi bi-line fa-lg me-2"></i>vine2526</p>
                                <p class="mb-2"><i class="bi bi-whatsapp fa-lg me-2"></i>0851 0982 7800</p>
                                <p class="mb-2"><i class="bi bi-envelope-fill fa-lg me-2"></i>fjosevine@gmail.com
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <x-footer></x-footer>
    </div>

    <div id="showRequestLetter" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 28rem">
            <div class="modal-content border-0 shadow py-3">
                <div class="modal-header">
                    <h5 class="fw-semibold m-auto ">Request Invitation Letter</h5>
                </div>
                <form method="POST" action="{{ route('request-invitations.store') }}">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Your Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Your Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div>
                            <label class="form-label">Your Institution Name</label>
                            <input type="text" class="form-control" name="institution" required>
                        </div>
                    </div>
                    <div class="row g-3 p-3">
                        <div class="col-6">
                            <button type="button" class="btn btn-outline-light py-2 w-100"
                                data-bs-dismiss="modal">Cancel</button>
                        </div>
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary py-2 w-100">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app>
