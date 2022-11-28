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
        <div class="form-text">If you don't use the LINE app, fill in '-'</div>
    </div>
</div>

<div class="row g-4 mb-5">
    <h5 class="mb-0" style="font-size: 18px">Address Details</h5>

    <div class="col-md-6">
        <label class="form-label">Province</label>
        <select class="form-select" required id="province{{ $id }}{{ $j }}{{ $k }}"
            name="province[{{ $id }}][{{ $j }}][{{ $k }}]">
            <option selected disabled value="">Select province</option>
            @foreach ($provinces as $province)
                <option value="{{ $province->id }}">{{ $province->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-6">
        <label class="form-label">District/City</label>
        <select class="form-select" required
            name="district[{{ $id }}][{{ $j }}][{{ $k }}]"
            id="district{{ $id }}{{ $j }}{{ $k }}">
            <option selected disabled value="">Please select province first</option>
        </select>
    </div>

    <div class="col-12">
        <label class="form-label">Full Address</label>
        <textarea class="form-control" name="address[{{ $id }}][{{ $j }}][{{ $k }}]"
            rows="2" required></textarea>
    </div>
</div>

<div class="row g-4 mb-5">
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
        <hr style="border-style: dashed">
        <div class="row g-4">
            <div class="col-md-6">
                <label class="form-label">NIM</label>
                <input type="text" class="form-control" disabled required
                    name="nim[{{ $id }}][{{ $j }}][{{ $k }}]">
            </div>

            <div class="col-md-6">
                <label class="form-label">Campus Region</label>
                <select class="form-select" disabled required
                    name="region[{{ $id }}][{{ $j }}][{{ $k }}]"
                    id="region{{ $id }}{{ $j }}{{ $k }}">
                    <option selected disabled value="">Select campus region</option>
                    <option value="KMG">Kemanggisan</option>
                    <option value="AS">Alam Sutera</option>
                    <option value="BKS">Bekasi</option>
                    <option value="SNY">Senayan</option>
                    <option value="BDG">Bandung</option>
                    <option value="MLG">Malang</option>
                    <option value="BOL">BINUS Online Learning</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Faculty</label>
                <select class="form-select" disabled required
                    name="faculty[{{ $id }}][{{ $j }}][{{ $k }}]"
                    id="faculty{{ $id }}{{ $j }}{{ $k }}">
                    <option selected disabled value="">Please select campus region first</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Major</label>
                <select class="form-select" disabled required
                    name="major[{{ $id }}][{{ $j }}][{{ $k }}]"
                    id="major{{ $id }}{{ $j }}{{ $k }}">
                    <option selected disabled value="">Please select faculty first</option>
                </select>
            </div>
        </div>
    </div>
</div>

<div class="row g-4">
    <h5 class="mb-0" style="font-size: 18px">Additional Information</h5>

    <div class="col-12">
        <label class="form-label">COVID-19 Vaccination Certificate</label>
        <input class="form-control" type="file"
            name="vaccination[{{ $id }}][{{ $j }}][{{ $k }}]" required>
        <div class="form-text">Upload your second or booster dose vaccine certificate</div>
    </div>

    <div class="col-md-12">
        <label class="form-label">Have a Food Allergy?</label>
        <input type="text" class="form-control"
            name="allergy[{{ $id }}][{{ $j }}][{{ $k }}]"
            placeholder="E.g. Milk, eggs, fish, peanuts, vegetarian" required>
        <div class="form-text">If you don't have a food allergy, fill in '-'</div>
    </div>
</div>

<script>
    $('#grade{{ $id }}{{ $j }}{{ $k }}').on('change', function() {
        var binusian = $('#binusian{{ $id }}{{ $j }}{{ $k }}')
        var institution = $('#institution{{ $id }}{{ $j }}{{ $k }}')
        var binusianDetails = $(
            '#binusianDetails{{ $id }}{{ $j }}{{ $k }}')
        var $faculty = $('#faculty{{ $id }}{{ $j }}{{ $k }}')
        var $major = $('#major{{ $id }}{{ $j }}{{ $k }}')


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
            $faculty.html('<option disabled selected value="">Please select campus region first</option>');
            $major.html('<option disabled selected value="">Please select faculty first</option>');
        }
    })

    $('#binusian{{ $id }}{{ $j }}{{ $k }}').find('input').on('click', function() {
        var institution = $('#institution{{ $id }}{{ $j }}{{ $k }}')
        var binusianDetails = $(
            '#binusianDetails{{ $id }}{{ $j }}{{ $k }}')
        var $faculty = $('#faculty{{ $id }}{{ $j }}{{ $k }}')
        var $major = $('#major{{ $id }}{{ $j }}{{ $k }}')


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
            $faculty.html('<option disabled selected value="">Please select campus region first</option>');
            $major.html('<option disabled selected value="">Please select faculty first</option>');
        }
    })

    $('#province{{ $id }}{{ $j }}{{ $k }}').change(function() {
        var $district = $('#district{{ $id }}{{ $j }}{{ $k }}')

        $.ajax({
            url: "{{ route('districts.show') }}",
            data: {
                province_id: $(this).val()
            },
            success: function(data) {
                $district.html('<option value="" disabled selected>Select district/city</option>');
                $.each(data, function(id, value) {
                    $district.append('<option value="' + id + '">' + value + '</option>');
                });
            }
        });
    });

    $('#region{{ $id }}{{ $j }}{{ $k }}').change(function() {
        var $faculty = $('#faculty{{ $id }}{{ $j }}{{ $k }}')

        $.ajax({
            url: "{{ route('faculties.show') }}",
            data: {
                region: $(this).val()
            },
            success: function(data) {
                $faculty.html('<option value="" disabled selected>Select faculty</option>');
                $.each(data, function(id, value) {
                    $faculty.append('<option value="' + id + '">' + value + '</option>');
                });
            }
        });
    });

    $('#faculty{{ $id }}{{ $j }}{{ $k }}').change(function() {
        var $major = $('#major{{ $id }}{{ $j }}{{ $k }}')

        $.ajax({
            url: "{{ route('majors.show') }}",
            data: {
                faculty_id: $(this).val()
            },
            success: function(data) {
                $major.html('<option value="" disabled selected>Select major</option>');
                $.each(data, function(id, value) {
                    $major.append('<option value="' + id + '">' + value + '</option>');
                });
            }
        });
    });
</script>
