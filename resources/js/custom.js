$(document).ready(function () {
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

    // Check All
    $(".check-all").change(function(){
        $('.check-item').prop('checked', this.checked)
    })

    $(".check-item").change(function(){
        if (!$(this).prop('checked')) {
            $('.check-all').prop('checked', false)
        }

        if ($('.check-item:checked').length == $('.check-item').length) {
            $('.check-all').prop('checked', true)
        }
    })

    // Tooltip
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

    // Toggle Chevron
    $('#headMenu').click(function() {
        $(this).children('.bi').toggleClass('bi-chevron-up bi-chevron-down')
    })

    // DataTables
    $('.table-participant').DataTable({
        "autoWidth": false,
    })

    // Input Spinner
    $('.input-spinner').inputSpinner({
        template: '<div class="input-group ${groupClass}">' +
            '<button style="min-width: ${buttonsWidth}" class="btn btn-decrement btn-outline-primary btn-minus rounded-5" type="button">${decrementButton}</button>' +
            '<input type="text" inputmode="decimal" style="text-align: ${textAlign}; border: 0" class="form-control form-control-text-input">' +
            '<button style="min-width: ${buttonsWidth}" class="btn btn-increment btn-outline-primary btn-plus rounded-5" type="button">${incrementButton}</button>' +
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
                "visibility": "visible",
                "border": "1.5px solid #ced4da", 
                "border-radius": "1em"
            })
        }

        reader.readAsDataURL(input.files[0])
    }
}