<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label">Full Name</label>
        <input type="text" class="form-control"
            name="name[{{ $id }}][{{ $j }}][{{ $k }}]" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input type="email" class="form-control"
            name="email[{{ $id }}][{{ $j }}][{{ $k }}]" required>
    </div>

    <div class="col-12">
        <label class="form-label d-block">Gender</label>
        <fieldset>
            <input type="radio" class="btn-check" id="male{{ $id }}{{ $j }}{{ $k }}"
                name="gender[{{ $id }}][{{ $j }}][{{ $k }}]" value="male" required>
            <label for="male{{ $id }}{{ $j }}{{ $k }}"
                class="btn btn-input rounded-pill">Male</label>

            <input type="radio" class="btn-check"
                id="female{{ $id }}{{ $j }}{{ $k }}"
                name="gender[{{ $id }}][{{ $j }}][{{ $k }}]" value="female">
            <label for="female{{ $id }}{{ $j }}{{ $k }}"
                class="btn btn-input rounded-pill">Female</label>

            <input type="radio" class="btn-check"
                id="unknown{{ $id }}{{ $j }}{{ $k }}"
                name="gender[{{ $id }}][{{ $j }}][{{ $k }}]" value="unknown">
            <label for="unknown{{ $id }}{{ $j }}{{ $k }}"
                class="btn btn-input rounded-pill">Prefer not to say</label>
        </fieldset>
        <div class="invalid-feedback">
            Please select gender
        </div>
    </div>

    <div class="col-12">
        <label class="form-label">Address</label>
        <textarea class="form-control" name="address[{{ $id }}][{{ $j }}][{{ $k }}]"
            rows="2" required></textarea>
    </div>

    <div class="col-md-6">
        <label class="form-label">Phone Number</label>
        <input type="text" class="form-control"
            name="phone_num[{{ $id }}][{{ $j }}][{{ $k }}]" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">LINE ID</label>
        <input type="text" class="form-control"
            name="line_id[{{ $id }}][{{ $j }}][{{ $k }}]" required>
    </div>

    <div class="col-12">
        <h5 class="mb-3 mt-4">Education Information</h5>

        <div class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Level</label>
                <select class="form-select"
                    name="level[{{ $id }}][{{ $j }}][{{ $k }}]" required>
                    <option selected disabled value="">Select education level</option>
                    @if ($category == 'Junior High School')
                        <optgroup label="Junior High School">
                            <option value="Grade 7">Grade 7</option>
                            <option value="Grade 8">Grade 8</option>
                            <option value="Grade 9">Grade 9</option>
                        </optgroup>
                    @endif
                    @if ($category == 'Senior High School' || $category == 'Open Category')
                        <optgroup label="Senior High School">
                            <option value="Grade 10">Grade 10</option>
                            <option value="Grade 11">Grade 11</option>
                            <option value="Grade 12">Grade 12</option>
                            <option value="Gap Year">Gap Year</option>
                        </optgroup>
                    @endif
                    @if ($category == 'University' || $category == 'Open Category')
                        <optgroup label="University">
                            <option value="Year 1">Year 1</option>
                            <option value="Year 2">Year 2</option>
                            <option value="Year 3">Year 3</option>
                            <option value="Year 4">Year 4</option>
                        </optgroup>
                    @endif
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">School/College/University Name</label>
                <input type="text" class="form-control"
                    name="institution[{{ $id }}][{{ $j }}][{{ $k }}]" required>
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
        })()
    </script>
</div>
