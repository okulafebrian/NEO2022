<input type="hidden" name="competition_id[]" class="form-control" value="{{ $competition->id }}">

<div class="col-12">
    <label for="name" class="form-label">Full Name <span style="color: red">*</span></label>
    <input type="text" class="form-control" id="name"
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
        <optgroup label="High School">
            <option value="Grade 10">Grade 10</option>
            <option value="Grade 11">Grade 11</option>
            <option value="Grade 12">Grade 12</option>
            <option value="Gap Year">Gap Year</option>
        <optgroup label="University">
            <option value="Uni 1">Year 1</option>
            <option value="Uni 3">Year 2</option>
            <option value="Uni 2">Year 3</option>
            <option value="Uni 4">Year 4</option>
    </select>
</div>
<div class="col-12">
    <label for="address" class="form-label">Domicile
        Address <span style="color: red">*</span></label>
    <textarea class="form-control" id="address"
        name="address[{{ $competition->id }}][{{ $i }}][{{ $k }}]" rows="2" required></textarea>
</div>
<div class="col-12">
    <label for="email" class="form-label">Email <span style="color: red">*</span></label>
    <input type="email" class="form-control" id="email"
        name="email[{{ $competition->id }}][{{ $i }}][{{ $k }}]" required>
</div>
<div class="col-md-6">
    <label for="whatsapp_number" class="form-label">Whatsapp
        Number <span style="color: red">*</span></label>
    <input type="text" class="form-control" id="whatsapp_number"
        name="whatsapp_number[{{ $competition->id }}][{{ $i }}][{{ $k }}]"
        placeholder="081245567889" required>
</div>
<div class="col-md-6">
    <label for="line_id" class="form-label">LINE ID
        (optional)</label>
    <input type="text" class="form-control" id="line_id"
        name="line_id[{{ $competition->id }}][{{ $i }}][{{ $k }}]">
</div>
<div class="col-12">
    <label for="institute_name" class="form-label">School /
        University
        Name <span style="color: red">*</span></label>
    <input type="text" class="form-control" id="institute_name"
        name="institute_name[{{ $competition->id }}][{{ $i }}][{{ $k }}]" required>
</div>
<div class="col-12">
    <label for="institute_address" class="form-label">School /
        University Address <span style="color: red">*</span></label>
    <textarea class="form-control" id="institute_address"
        name="institute_address[{{ $competition->id }}][{{ $i }}][{{ $k }}]" rows="2"
        required></textarea>
</div>
