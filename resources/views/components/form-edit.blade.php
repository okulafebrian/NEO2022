<div class="row g-3">
    <input type="hidden" name="id[]" value="{{ $participant->id }}">

    <div class="col-md-6">
        <label class="form-label">Full Name</label>
        <input type="text" class="form-control" name="name[{{ $participant->id }}]" value="{{ $participant->name }}"
            required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" name="email[{{ $participant->id }}]"
            value="{{ $participant->email }}" required>
    </div>

    <div class="col-12">
        <label class="form-label d-block">Gender</label>
        <fieldset>
            <input type="radio" class="btn-check" id="male{{ $participant->id }}"
                name="gender[{{ $participant->id }}]" value="male"
                {{ $participant->gender == 'male' ? 'checked' : '' }} required>
            <label for="male{{ $participant->id }}" class="btn btn-input rounded-pill">Male</label>

            <input type="radio" class="btn-check" id="female{{ $participant->id }}"
                name="gender[{{ $participant->id }}]" value="female"
                {{ $participant->gender == 'female' ? 'checked' : '' }}>
            <label for="female{{ $participant->id }}" class="btn btn-input rounded-pill">Female</label>

            <input type="radio" class="btn-check" id="unknown{{ $participant->id }}"
                name="gender[{{ $participant->id }}]" value="unknown"
                {{ $participant->gender == 'unknown' ? 'checked' : '' }}>
            <label for="unknown{{ $participant->id }}" class="btn btn-input rounded-pill">Prefer not to say</label>
        </fieldset>
        <div class="invalid-feedback">
            Please select gender
        </div>
    </div>

    <div class="col-12">
        <label class="form-label">Address</label>
        <textarea class="form-control" name="address[{{ $participant->id }}]" rows="2"
            value="{{ $participant->address }}" required>{{ $participant->address }}</textarea>
    </div>

    <div class="col-md-6">
        <label class="form-label">Phone Number</label>
        <input type="text" class="form-control" name="phone_num[{{ $participant->id }}]"
            value="{{ $participant->phone_num }}" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">LINE ID</label>
        <input type="text" class="form-control" name="line_id[{{ $participant->id }}]"
            value="{{ $participant->line_id }}" required>
    </div>

    <div class="col-12">
        <h5 class="mb-3 mt-4">Education Information</h5>

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Level</label>
                <select class="form-select" name="level[{{ $participant->id }}]" required>
                    <option disabled value="">Select education level</option>
                    @if ($registrationDetail->competition->category == 'Junior High School')
                        <optgroup label="Junior High School">
                            <option value="grade 7" {{ $participant->level == 'grade 7' ? 'selected' : '' }}>Grade 7
                            </option>
                            <option value="grade 8" {{ $participant->level == 'grade 8' ? 'selected' : '' }}>Grade 8
                            </option>
                            <option value="grade 9" {{ $participant->level == 'grade 9' ? 'selected' : '' }}>Grade 9
                            </option>
                        </optgroup>
                    @endif
                    @if ($registrationDetail->competition->category == 'Senior High School' ||
                        $registrationDetail->competition->category == 'Open Category')
                        <optgroup label="Senior High School">
                            <option value="grade 10" {{ $participant->level == 'grade 10' ? 'selected' : '' }}>Grade 10
                            </option>
                            <option value="grade 11" {{ $participant->level == 'grade 11' ? 'selected' : '' }}>Grade 11
                            </option>
                            <option value="grade 12" {{ $participant->level == 'grade 12' ? 'selected' : '' }}>Grade 12
                            </option>
                            <option value="gap year" {{ $participant->level == 'gap year' ? 'selected' : '' }}>Gap Year
                            </option>
                        </optgroup>
                    @endif
                    @if ($registrationDetail->competition->category == 'University' ||
                        $registrationDetail->competition->category == 'Open Category')
                        <optgroup label="University">
                            <option value="year 1" {{ $participant->level == 'year 1' ? 'selected' : '' }}>Year 1
                            </option>
                            <option value="year 2" {{ $participant->level == 'year 2' ? 'selected' : '' }}>Year 2
                            </option>
                            <option value="year 3" {{ $participant->level == 'year 3' ? 'selected' : '' }}>Year 3
                            </option>
                            <option value="year 4" {{ $participant->level == 'year 4' ? 'selected' : '' }}>Year 4
                            </option>
                        </optgroup>
                    @endif
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">School/College/University Name</label>
                <input type="text" class="form-control" name="institution[{{ $participant->id }}]"
                    value="{{ $participant->institution }}" required>
            </div>
        </div>
    </div>

    <script>
        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })
        ()
    </script>
</div>
