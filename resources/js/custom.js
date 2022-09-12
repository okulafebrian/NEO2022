$(document).ready(function() {

    // Validate Registration Form Before Popup Modal
    $(document).on('click', '#confirmRegisterBtn', function() {
        // Disable Submit Process
        $("form").submit(function(e) {
            e.preventDefault();
        });

        var formInvalid = false;

        $('#registrationForm input').each(function() {
            if ($(this).val() === '')
                formInvalid = true;
        });

        $('#registrationForm textarea').each(function() {
            if ($(this).val().length < 1)
                formInvalid = true;
        });

        $('#registrationForm select').each(function() {
            if (!$(this).val())
                formInvalid = true;
        });

        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        $('#registrationForm input[type="email"]').each(function() {
            var inputEmail = $(this).val()
            if (!emailReg.test(inputEmail))
                formInvalid = true;
        });
        
        if (!formInvalid)
            $('#confirmRegisterModal').modal('show')
    })

    // Activate Submit Process
    $(document).on('click', '#submitRegisterBtn', function() {
        $("#registrationForm").unbind('submit');
    })
    
    // Validate Payment Method
    $(document).on('click', '#submitPayment', function() {
        if( !$('input[name="provider_list"]:checked').val() ) {
            $('#invalid-1').show()
        } else {
            $('.invalid-message').hide()
        }
    })

    // Payment Method
    $(document).on('click', '#savePaymentMethod', function() {

        if( !$('input[name="provider_list"]:checked').val() ) {
            $('#invalid-2').show()
            return
        }

        var provider = $('input[name="provider_list"]:checked').val();
        var paymentType = provider.split(' ')[0]
        var providerName = provider.split(' ')[1]

        if(providerName == "Other") {
            var otherBankName = $('input[id="otherBANKProvider"]').val()
            var otherEwalletName = $('input[id="otherEWALLETProvider"]').val()

            if (paymentType == "BANK" && !otherBankName) {
                $('#invalid-3').show()
                $('#invalid-4').hide()
                return
            }

            if (paymentType == "EWALLET" && !otherEwalletName) {
                $('#invalid-4').show()
                $('#invalid-3').hide()
                return
            }

            if (paymentType == "BANK" && otherBankName) {
                $('#paymentProviderName').html(otherBankName)
                $('input[name="provider_name').val(otherBankName)
            } else {
                $('#paymentProviderName').html(otherEwalletName)
                $('input[name="provider_name').val(otherEwalletName)
            }
        } else {
            $('#paymentProviderName').html(providerName)
            $('input[name="provider_name').val(providerName)
        }

        $('input[name="payment_type').val(paymentType)
        $('#paymentMethodModal').modal('toggle')
        $('.invalid-message').hide()
    })

    // Input Spinner
    $('.input-spinner').inputSpinner({buttonsOnly: true, autoInterval: undefined})

    // Confirm Ticket
    $(document).on('click', '#confirmTicket', function() {
        var id =  $(this).closest('.modal').data('id');
        var ticketAmount = $(this).closest('.modal').find('#ticketAmount').val()

        $('input[name="ticketAmount[' + id + ']').val(ticketAmount)
        $('#' + id + 'title').css('color', 'green')
        $('#' + id + 'badge').show().html(ticketAmount + 'x')
        updateTotalTicket()
    })

    // Cancel Ticket
    $(document).on('click', '#cancelTicket', function() {
        var id =  $(this).closest('.modal').data('id')

        $('input[name="ticketAmount[' + id + ']').val(0)
        $('#' + id + 'title').css('color', '')
        $('#' + id + 'badge').hide()
        updateTotalTicket()
    })

    //  Show Modal
    var myModal = new bootstrap.Modal(document.getElementById('alert'));
    myModal.show();
});

function getTotalTicket() {
    var competitions = $('.card-competition')
    var total = 0

    for (let i = 0; i < competitions.length; i++) {
        var competition = competitions[i]
        var quantityElement = competition.getElementsByClassName('ticket-amount')[0]
        var quantity = parseInt(quantityElement.value) 
        total = total + quantity
    }
  
    return total
}

function updateTotalTicket() {
    var total = getTotalTicket()
    
    total > 0 ? $('.btn-register').prop("disabled", false) : $('.btn-register').prop("disabled", true)
    total > 1 ? $('.total-ticket').html(total + ' tickets') : $('.total-ticket').html(total + ' ticket')
}

function ValidateForm() {
  var formInvalid = false;
  $('#registrationForm input').each(function() {
    if ($(this).val() === '') {
      formInvalid = true;
    }
  });

  if (formInvalid)
    alert('One or Two fields are empty. Please fill up all fields');
}