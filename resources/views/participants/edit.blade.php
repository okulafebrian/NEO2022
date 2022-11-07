<x-app title="Edit Participant | NEO 2022">

    <x-slot name="navbarAdmin"></x-slot>

    <div class="container" style="padding: 6rem 0; max-width: 60rem">
        <h3 class="mb-4 text-primary">Edit Participant</h3>

        <form method="POST" action="{{ route('participants.update', $participant) }}">
            @csrf

            <div class="card card-custom mb-3">
                <div class="card-body">
                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Full Name</label>
                        <div class="col">
                            <input type="text" class="form-control" name="name" value="{{ $participant->name }}"
                                required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Gender</label>
                        <div class="col">
                            <fieldset>
                                <input type="radio" class="btn-check" id="male" name="gender" value="Male"
                                    {{ $participant->gender == 'Male' ? 'checked' : '' }} required>
                                <label for="male" class="btn btn-input rounded-pill">Male</label>

                                <input type="radio" class="btn-check" id="female" name="gender" value="Female"
                                    {{ $participant->gender == 'Female' ? 'checked' : '' }}>
                                <label for="female" class="btn btn-input rounded-pill">Female</label>

                                <input type="radio" class="btn-check" id="unknown" name="gender"
                                    {{ $participant->gender == 'Prefer not to say' ? 'checked' : '' }}
                                    value="Prefer not to say">
                                <label for="unknown" class="btn btn-input rounded-pill">Prefer not to say</label>
                            </fieldset>
                        </div>
                        <div class="invalid-feedback">
                            Please select gender
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Email</label>
                        <div class="col">
                            <input type="email" class="form-control" name="email" value="{{ $participant->email }}"
                                required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Phone Number</label>
                        <div class="col">
                            <input type="text" class="form-control" name="phone_number"
                                value="{{ $participant->phone_number }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">LINE ID</label>
                        <div class="col">
                            <input type="text" class="form-control" name="line_id"
                                value="{{ $participant->line_id }}" required>
                        </div>
                    </div>

                    <hr class="border-0">
                    <h5 class="mb-3">Address Details</h5>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Province</label>
                        <div class="col">
                            <input type="text" class="form-control" name="province"
                                value="{{ $participant->province }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">District/City</label>
                        <div class="col">
                            <input type="text" class="form-control" name="district"
                                value="{{ $participant->district }}" required>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Address</label>
                        <div class="col">
                            <textarea class="form-control" name="address" rows="2" value="{{ $participant->address }}" required>{{ $participant->address }}</textarea>
                        </div>
                    </div>

                    <hr class="border-0">
                    <h5 class="mb-3">Education Details</h5>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Level</label>
                        <div class="col">
                            <select class="form-select" name="grade" required>
                                <option disabled value="">Select education level</option>
                                @if ($participant->competitionTeam->competition->category == 'Junior High School')
                                    <optgroup label="Junior High School">
                                        <option value="Grade 7"
                                            {{ $participant->grade == 'Grade 7' ? 'selected' : '' }}>Grade 7
                                        </option>
                                        <option value="Grade 8"
                                            {{ $participant->grade == 'Grade 8' ? 'selected' : '' }}>Grade 8
                                        </option>
                                        <option value="Grade 9"
                                            {{ $participant->grade == 'Grade 9' ? 'selected' : '' }}>Grade 9
                                        </option>
                                    </optgroup>
                                @endif
                                @if ($participant->competitionTeam->competition->category == 'Senior High School' ||
                                    $participant->competitionTeam->competition->category == 'Open Category')
                                    <optgroup label="Senior High School">
                                        <option value="Grade 10"
                                            {{ $participant->grade == 'Grade 10' ? 'selected' : '' }}>Grade 10
                                        </option>
                                        <option value="Grade 11"
                                            {{ $participant->grade == 'Grade 11' ? 'selected' : '' }}>Grade 11
                                        </option>
                                        <option value="Grade 12"
                                            {{ $participant->grade == 'Grade 12' ? 'selected' : '' }}>Grade 12
                                        </option>
                                        <option value="Gap Year"
                                            {{ $participant->grade == 'Gap Year' ? 'selected' : '' }}>Gap Year
                                        </option>
                                    </optgroup>
                                @endif
                                @if ($participant->competitionTeam->competition->category == 'University' ||
                                    $participant->competitionTeam->competition->category == 'Open Category')
                                    <optgroup label="University">
                                        <option value="Year 1"
                                            {{ $participant->grade == 'Year 1' ? 'selected' : '' }}>
                                            Year 1
                                        </option>
                                        <option value="Year 2"
                                            {{ $participant->grade == 'Year 2' ? 'selected' : '' }}>
                                            Year 2
                                        </option>
                                        <option value="Year 3"
                                            {{ $participant->grade == 'Year 3' ? 'selected' : '' }}>
                                            Year 3
                                        </option>
                                        <option value="Year 4"
                                            {{ $participant->grade == 'Year 4' ? 'selected' : '' }}>
                                            Year 4
                                        </option>
                                    </optgroup>
                                @endif
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-3 col-form-label">Institution</label>
                        <div class="col">
                            <input type="text" class="form-control" name="institution"
                                value="{{ $participant->institution }}" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-grid gap-2 d-flex justify-content-end">
                <a href="{{ route('participants.index') }}" type="button" class="btn btn-outline-primary px-5">
                    Cancel
                </a>
                @method('PUT')
                <button type="submit" class="btn btn-primary px-5">Save Changes</button>
            </div>
        </form>
    </div>
</x-app>
