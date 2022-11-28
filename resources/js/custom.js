$(document).ready(function () {
    
    // Alert Timer
    setTimeout(function() {
            $('#alert').modal('hide');
    }, 4000);
    
    // Copy Button
    $(document).on('click', '#copy', function() {
        var copyText = $('#destAccountNumber').text()
        navigator.clipboard.writeText(copyText);
    })

    // Input img custom
    $("#logo").change(function() {
        readURL(this)
    })
    
    // Price Formatter
    $('.price-format').mask('000.000.000.000.000', {
        reverse: true
    })

    // Tooltip
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

    // Toggle Chevron
    $('.toggleChevron').click(function () {
        console.log($(this).children('.fa-solid'))
        $(this).find('.fa-solid').toggleClass('fa-chevron-up fa-chevron-down')
    })

    // DataTables
    $('.table-general').DataTable({
        "autoWidth": false,
        columnDefs: [
            { orderable: false, targets: -1 }
        ]
    })

    $('.table-debate').DataTable({
        "autoWidth": false,
        "order": [[1, 'asc']],
        columns: [
            {
                className: 'dt-control',
                orderable: false,
                defaultContent: '',
            },
            { data: 'team_name' },
            { data: 'speakers' },
            { data: 'grade' },
            { data: 'line_id' },
            {
                className: 'action',
                orderable: false,
                defaultContent: ''
            }
        ]
    })

    var table = $('.table-participant').DataTable({
        "autoWidth": false,
        "order": [[1, 'asc']],
        columns: [
            {
                className: 'dt-control',
                orderable: false,
                defaultContent: '',
            },
            { data: 'name' },
            { data: 'grade' },
            { data: 'line_id' },
            { data: 'institution' },
            {
                className: 'action',
                orderable: false,
                defaultContent: ''
            },
            { data: 'gender' },
            { data: 'phone' },
            { data: 'email' },
            { data: 'province' },
            { data: 'district' },
            { data: 'address' },
            { data: 'vaccination' },
            { data: 'allergy' },
            { data: 'nim' },
            { data: 'region' },
            { data: 'major' },
        ]
    })

    $('.table-participant tbody').on('click', 'td.dt-control', function() {
        var tr = $(this).closest('tr');
        var row = table.row(tr);
        
        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open this row
            row.child(format(row.data())).show();
            tr.addClass('shown');
        }
    });

    // Input Spinner
    $('.input-spinner').inputSpinner({
        template: '<div class="input-group ${groupClass}">' +
            '<button style="min-width: 2.4rem; font-size: 14px;" class="btn btn-decrement btn-outline-primary btn-minus rounded-5" type="button">${decrementButton}</button>' +
            '<input type="text" inputmode="decimal" style="text-align: ${textAlign}; border: 0; background: transparent; padding: 0; max-width: 3rem" class="form-control form-control-text-input">' +
            '<button style="min-width: 2.4rem; font-size: 14px;" class="btn btn-increment btn-outline-primary btn-plus rounded-5" type="button">${incrementButton}</button>' +
            '</div>'
    })

    //  Show Modal
    var myModal = new bootstrap.Modal(document.getElementById('alert'))
    myModal.show()
})

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader()

        reader.onload = function(e) {
            $('.input-img').css("border", "none")
            $('.input-img-label').hide()
            $('.img-preview').attr('src', e.target.result).css({
                "border": "1.5px solid #ced4da", 
                "border-radius": "1em"
            }).removeAttr('hidden')
        }

        reader.readAsDataURL(input.files[0])
    }
}

function format(d) {
    var table =
    '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px; font-size:small">' +
    '<tr>' +
    '<td class="text-muted">Gender</td>' +
    '<td class="text-muted">:</td>' +
    '<td>' + d.gender + '</td>' +
    '</tr>' +
    '<tr>' +
    '<td class="text-muted">Phone</td>' +
    '<td class="text-muted">:</td>' +
    '<td>' + d.phone + '</td>' +
    '</tr>' +
    '<tr>' +
    '<td class="text-muted">Email</td>' +
    '<td class="text-muted">:</td>' +
    '<td>' + d.email + '</td>' +
    '</tr>' +
    '<tr>' +
    '<td class="text-muted">Province</td>' +
    '<td class="text-muted">:</td>' +
    '<td>' + d.province + '</td>' +
    '</tr>' +
    '<tr>' +
    '<td class="text-muted">District/City</td>' +
    '<td class="text-muted">:</td>' +
    '<td>' + d.district + '</td>' +
    '</tr>' +
    '<tr>' +
    '<td class="text-muted">Address</td>' +
    '<td class="text-muted">:</td>' +
    '<td>' + d.address + '</td>' +
    '</tr>' +
    '<tr>' +
    '<td class="text-muted">Vaccination</td>' +
    '<td class="text-muted">:</td>' +
    '<td>' +
    '<a href="/storage/images/vaccinations/' + d.vaccination + '" target="_blank">' +
    'View Here' +
    '</a>' +
    '</td>' +
    '</tr>' +
    '<tr>' +
    '<td class="text-muted">Allergy</td>' +
    '<td class="text-muted">:</td>' +
    '<td>' + d.allergy + '</td>' +
    '</tr>'
    
    if (d.nim != '') {
        table +=
        '<tr>' +
        '<td class="text-muted">NIM</td>' +
        '<td class="text-muted">:</td>' +
        '<td>' + d.nim + '</td>' +
        '</tr>' +
        '<tr>' +
        '<td class="text-muted">Region</td>' +
        '<td class="text-muted">:</td>' +
        '<td>' + d.region + '</td>' +
        '</tr>' +
        '<tr>' +
        '<td class="text-muted">Major</td>' +
        '<td class="text-muted">:</td>' +
        '<td>' + d.major + '</td>' +
        '</tr>'
    }

    table += '</table>'

    return table
}