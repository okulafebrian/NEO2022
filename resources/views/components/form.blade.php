<div class="row g-4 mb-5">
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
        <label class="form-label">Gender</label>
        <fieldset>
            <input type="radio" class="btn-check" id="male{{ $id }}{{ $j }}{{ $k }}"
                name="gender[{{ $id }}][{{ $j }}][{{ $k }}]" value="Male" required>
            <label for="male{{ $id }}{{ $j }}{{ $k }}"
                class="btn btn-selection rounded-pill">Male</label>

            <input type="radio" class="btn-check"
                id="female{{ $id }}{{ $j }}{{ $k }}"
                name="gender[{{ $id }}][{{ $j }}][{{ $k }}]" value="Female">
            <label for="female{{ $id }}{{ $j }}{{ $k }}"
                class="btn btn-selection rounded-pill">Female</label>

            <input type="radio" class="btn-check"
                id="unknown{{ $id }}{{ $j }}{{ $k }}"
                name="gender[{{ $id }}][{{ $j }}][{{ $k }}]"
                value="Prefer not to say">
            <label for="unknown{{ $id }}{{ $j }}{{ $k }}"
                class="btn btn-selection rounded-pill">Prefer not to say</label>
        </fieldset>
    </div>

    <div class="col-md-6">
        <label class="form-label">Phone Number</label>
        <input type="text" class="form-control"
            name="phone_number[{{ $id }}][{{ $j }}][{{ $k }}]" required>
        <div class="form-text">E.g. 081367889900</div>
    </div>

    <div class="col-md-6">
        <label class="form-label">LINE ID</label>
        <input type="text" class="form-control"
            name="line_id[{{ $id }}][{{ $j }}][{{ $k }}]" required>
        <div class="form-text">If you don't use the LINE app, fill it with '-'</div>
    </div>
</div>

<div class="row g-4 mb-5">
    <h5 class="mb-0" style="font-size: 18px">Address Details</h5>

    <div class="col-md-6">
        <label class="form-label">Province</label>
        <input type="text" class="form-control"
            name="province[{{ $id }}][{{ $j }}][{{ $k }}]" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">District/City</label>
        <input type="text" class="form-control"
            name="district[{{ $id }}][{{ $j }}][{{ $k }}]" required>
    </div>

    <div class="col-12">
        <label class="form-label">Full Address</label>
        <textarea class="form-control" name="address[{{ $id }}][{{ $j }}][{{ $k }}]"
            rows="2" required></textarea>
    </div>
</div>

<div class="row g-4">
    <h5 class="mb-0" style="font-size: 18px">Education Details</h5>

    <div class="col-md-6">
        <label class="form-label">Grade</label>
        <select class="form-select" id="grade{{ $id }}{{ $j }}{{ $k }}"
            name="grade[{{ $id }}][{{ $j }}][{{ $k }}]" required>
            <option selected disabled value="">Select education level</option>
            @if ($category == 'Junior High')
                <optgroup label="Junior High">
                    <option value="Grade 7">Grade 7</option>
                    <option value="Grade 8">Grade 8</option>
                    <option value="Grade 9">Grade 9</option>
                </optgroup>
            @endif
            @if ($category == 'Senior High' || $category == 'Open Category')
                <optgroup label="Senior High">
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
        <div id="binusian{{ $id }}{{ $j }}{{ $k }}" class="d-none">
            <label class="form-label">Student of BINUS University</label>
            <fieldset>
                <input type="radio" class="btn-check"
                    id="yes{{ $id }}{{ $j }}{{ $k }}"
                    name="binusian[{{ $id }}][{{ $j }}][{{ $k }}]" value="1"
                    disabled required>
                <label for="yes{{ $id }}{{ $j }}{{ $k }}"
                    class="btn btn-selection rounded-pill">Yes</label>

                <input type="radio" class="btn-check"
                    id="no{{ $id }}{{ $j }}{{ $k }}"
                    name="binusian[{{ $id }}][{{ $j }}][{{ $k }}]" value="0"
                    disabled>
                <label for="no{{ $id }}{{ $j }}{{ $k }}"
                    class="btn btn-selection rounded-pill">No</label>
            </fieldset>
        </div>
    </div>

    <div class="col-12">
        <label class="form-label">School/College/University Name</label>
        <input type="text" class="form-control"
            id="institution{{ $id }}{{ $j }}{{ $k }}"
            name="institution[{{ $id }}][{{ $j }}][{{ $k }}]" required>
    </div>

    <div id="binusianDetails{{ $id }}{{ $j }}{{ $k }}" class="col d-none">
        <hr class="mt-0" style="border-style: dashed">
        <div class="row g-4">
            <div class="col-md-6">
                <label class="form-label">NIM</label>
                <input type="text" class="form-control" disabled required
                    name="nim[{{ $id }}][{{ $j }}][{{ $k }}]">
            </div>

            <div class="col-md-6">
                <label class="form-label">Campus Region</label>
                <select class="form-select" disabled required
                    name="region[{{ $id }}][{{ $j }}][{{ $k }}]">
                    <option selected disabled value="">Select campus region</option>
                    <option value="Kemanggisan">Kemanggisan</option>
                    <option value="Alam Sutera">Alam Sutera</option>
                    <option value="Bekasi">Bekasi</option>
                    <option value="Senayan">Senayan</option>
                    <option value="Bandung">Bandung</option>
                    <option value="Malang">Malang</option>
                    <option value="Semarang">Semarang</option>
                </select>
            </div>
        </div>
    </div>
</div>

<script>
    $('#grade{{ $id }}{{ $j }}{{ $k }}').on('change', function() {
        var binusian = $('#binusian{{ $id }}{{ $j }}{{ $k }}')
        var institution = $('#institution{{ $id }}{{ $j }}{{ $k }}')
        var binusianDetails = $(
            '#binusianDetails{{ $id }}{{ $j }}{{ $k }}')

        if ($(this).find(':selected').val().indexOf('Year ') >= 0) {
            binusian.removeClass('d-none')
            binusian.find('input').prop('disabled', false)
        } else {
            binusian.find('input').prop('disabled', true).prop('checked', false)
            binusian.addClass('d-none')

            binusianDetails.addClass('d-none')
            binusianDetails.find('input').prop('disabled', true).val('')
            binusianDetails.find('select').prop('disabled', true).prop('selectedIndex', 0)
            institution.val('').prop('readonly', false)
        }
    })

    $('#binusian{{ $id }}{{ $j }}{{ $k }}').find('input').on('click', function() {
        var institution = $('#institution{{ $id }}{{ $j }}{{ $k }}')
        var binusianDetails = $(
            '#binusianDetails{{ $id }}{{ $j }}{{ $k }}')

        if ($(this).val() == true) {
            binusianDetails.removeClass('d-none')
            binusianDetails.find('input').prop('disabled', false)
            binusianDetails.find('select').prop('disabled', false)
            institution.val('BINUS University').prop('readonly', true)
        } else {
            binusianDetails.addClass('d-none')
            binusianDetails.find('input').prop('disabled', true).val('')
            binusianDetails.find('select').prop('disabled', true).prop('selectedIndex', 0)
            institution.val('').prop('readonly', false)
        }
    })
</script>
