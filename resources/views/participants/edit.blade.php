<x-app title="Edit Participant | NEO 2022">

    <x-slot name="sidebarAdmin"></x-slot>

    <div class="container p-5">
        <h3 class="mb-4">Edit Participant</h3>

        <form method="POST" action="{{ route('participants.update', $participant) }}">
            @csrf
            <div class="card border-0 shadow-sm rounded-3 mb-3">
                <div class="card-body-custom">
                    <div class="row mb-3">
                        <label for="name" class="col-3 col-form-label">Full Name</label>
                        <div class="col">
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $participant->name }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="gender" class="col-3 col-form-label">Gender</label>
                        <div class="col">
                            <select id="gender" class="form-select" name="gender" required>
                                <option selected disabled value="">Select</option>
                                <option {{ $participant->gender == 'Male' ? 'selected' : null }}>Male</option>
                                <option {{ $participant->gender == 'Female' ? 'selected' : null }}>Female
                                </option>
                                <option {{ $participant->gender == 'Rather not say' ? 'selected' : null }}>
                                    Rather
                                    not
                                    say
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="grade" class="col-3 col-form-label">Grade / Year</label>
                        <div class="col">
                            <select id="grade" class="form-select" name="grade" required>
                                <option selected disabled value="">Select</option>
                                @if ($participant->registrationDetail->competition->name == 'Junior High School')
                                    <optgroup label="Junior High School">
                                        <option {{ $participant->grade == 'Grade 7' ? 'selected' : null }}>Grade
                                            7
                                        </option>
                                        <option {{ $participant->grade == 'Grade 8' ? 'selected' : null }}>Grade
                                            8
                                        </option>
                                        <option {{ $participant->grade == 'Grade 9' ? 'selected' : null }}>Grade
                                            9
                                        </option>
                                    @else
                                    <optgroup label="Senior High School">
                                        <option {{ $participant->grade == 'Grade 10' ? 'selected' : null }}>
                                            Grade 10
                                        </option>
                                        <option {{ $participant->grade == 'Grade 11' ? 'selected' : null }}>
                                            Grade 11
                                        </option>
                                        <option {{ $participant->grade == 'Grade 12' ? 'selected' : null }}>
                                            Grade
                                            12
                                        </option>
                                        <option {{ $participant->grade == 'Gap Year' ? 'selected' : null }}>Gap
                                            Year
                                        </option>
                                    <optgroup label="University">
                                        <option {{ $participant->grade == 'Year 1' ? 'selected' : null }}>
                                            Year 1
                                        </option>
                                        <option {{ $participant->grade == 'Year 2' ? 'selected' : null }}>Year
                                            2
                                        </option>
                                        <option {{ $participant->grade == 'Year 3' ? 'selected' : null }}>Year
                                            3
                                        </option>
                                        <option {{ $participant->grade == 'Year 4' ? 'selected' : null }}>Year
                                            4
                                        </option>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="address" class="col-3 col-form-label">Address</label>
                        <div class="col">
                            <textarea class="form-control check-form" id="address" name="address" rows="2"
                                value="{{ $participant->address }}" required>{{ $participant->address }}</textarea>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-3 col-form-label">Email</label>
                        <div class="col">
                            <input type="email" class="form-control check-form" id="email" name="email"
                                value="{{ $participant->email }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="whatsapp_number" class="col-3 col-form-label">Phone Number</label>
                        <div class="col">
                            <div class="input-group">
                                <span class="input-group-text">+62</span>
                                <input type="text" class="form-control check-form" id="whatsapp_number"
                                    name="whatsapp_number" placeholder="e.g 812345678"
                                    value="{{ $participant->whatsapp_number }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="line_id" class="col-3 col-form-label">LINE ID</label>
                        <div class="col">
                            <input type="text" class="form-control check-form" id="line_id" name="line_id"
                                value="{{ $participant->line_id }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="institute_name" class="col-3 col-form-label">School / University
                            Name</label>
                        <div class="col">
                            <input type="text" class="form-control check-form" id="institute_name"
                                name="institute_name" value="{{ $participant->institute_name }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="institute_address" class="col-3 col-form-label">School / University
                            Address</label>
                        <div class="col">
                            <textarea class="form-control check-form" id="institute_address" name="institute_address" rows="2"
                                value="{{ $participant->institute_address }}" required>{{ $participant->institute_address }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 d-flex justify-content-end">
                <a href="{{ route('participants.index') }}" type="button" class="btn btn-outline-primary w-25">
                    Cancel
                </a>
                @method('PUT')
                <button type="submit" class="btn btn-primary w-25">Save Changes</button>
            </div>
        </form>
    </div>
</x-app>
