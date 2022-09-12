<div class="row g-3">
    <div class="col-12">
        <label for="name" class="form-label">Full Name <span style="color: red">*</span></label>
        <input type="text" class="form-control check-form" id="name"
            name="name[{{ $competition->id }}][{{ $i }}][{{ $k }}]" required>
    </div>

    <div class="col-md-6">
        <label for="gender" class="form-label">Gender <span style="color: red">*</span></label>
        <select id="gender" class="form-select"
            name="gender[{{ $competition->id }}][{{ $i }}][{{ $k }}]" required>
            <option selected disabled value="">Select</option>
            <option>Male</option>
            <option>Female</option>
        </select>
    </div>

    <div class="col-md-6">
        <label for="grade" class="form-label">Grade / Year <span style="color: red">*</span></label>
        <select id="grade" class="form-select"
            name="grade[{{ $competition->id }}][{{ $i }}][{{ $k }}]" required>
            <option selected disabled value="">Select</option>
            @if ($competition->category == 'Junior High School')
                <optgroup label="Junior High School">
                    <option value="Grade 7">Grade 7</option>
                    <option value="Grade 8">Grade 8</option>
                    <option value="Grade 9">Grade 9</option>
                @else
                <optgroup label="Senior High School">
                    <option value="Grade 10">Grade 10</option>
                    <option value="Grade 11">Grade 11</option>
                    <option value="Grade 12">Grade 12</option>
                    <option value="Gap Year">Gap Year</option>
                <optgroup label="University">
                    <option value="Uni 1">Year 1</option>
                    <option value="Uni 3">Year 2</option>
                    <option value="Uni 2">Year 3</option>
                    <option value="Uni 4">Year 4</option>
            @endif
        </select>
    </div>

    <div class="col-12">
        <label for="address" class="form-label">Address <span style="color: red">*</span></label>
        <textarea class="form-control check-form" id="address"
            name="address[{{ $competition->id }}][{{ $i }}][{{ $k }}]" rows="2" required></textarea>
    </div>

    <div class="col-12">
        <label for="email" class="form-label">Email <span style="color: red">*</span></label>
        <input type="email" class="form-control check-form" id="email"
            name="email[{{ $competition->id }}][{{ $i }}][{{ $k }}]" required>
    </div>

    <div class="col-md-6">
        <label for="whatsapp_number" class="form-label">Phone Number <span style="color: red">*</span></label>
        <div class="input-group">
            <span class="input-group-text">+62</span>
            <input type="text" class="form-control check-form" id="whatsapp_number"
                name="whatsapp_number[{{ $competition->id }}][{{ $i }}][{{ $k }}]"
                placeholder="e.g 812345678" required>
        </div>

    </div>

    <div class="col-md-6">
        <label for="line_id" class="form-label">LINE ID <span style="color: red">*</span></label>
        <input type="text" class="form-control check-form" id="line_id"
            name="line_id[{{ $competition->id }}][{{ $i }}][{{ $k }}]" required>
    </div>

    <div class="col-12">
        <label for="institute_name" class="form-label">School / University Name <span
                style="color: red">*</span></label>
        <input type="text" class="form-control check-form" id="institute_name"
            name="institute_name[{{ $competition->id }}][{{ $i }}][{{ $k }}]" required>
    </div>

    <div class="col-12">
        <label for="institute_address" class="form-label">School / University Address <span
                style="color: red">*</span></label>
        <textarea class="form-control check-form" id="institute_address"
            name="institute_address[{{ $competition->id }}][{{ $i }}][{{ $k }}]" rows="2"
            required></textarea>
    </div>
</div>
