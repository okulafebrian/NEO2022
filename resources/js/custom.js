$(document).ready(function() {

    // Input Spinner
    $('.input-spinner').inputSpinner({buttonsOnly: true, autoInterval: undefined})

    // Confirm Ticket
    $(document).on('click', '#confirmTicket', function() {
        var id =  $(this).closest('.modal').data('id');
        var ticketAmount = $(this).closest('.modal').find('#inputTicket').val()

        $('#ticket' + id + 'Amount').val(ticketAmount)
        $('#ticket' + id + 'Badge').html(ticketAmount)
        updateTotalTicket()
    })

    // Cancel Ticket
    $(document).on('click', '#cancelTicket', function() {
        var id =  $(this).closest('.modal').data('id')

        $(this).closest('.modal').find("#inputTicket").val(1)
        $('#ticket' + id + 'Amount').val(0)
        $('#ticket' + id + 'Badge').html(null)
        updateTotalTicket()
    })
        
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

    // Disable Register Button
    (total > 0) ? $('.btn-register').prop("disabled", false) : $('.btn-register').prop("disabled", true)

    return total
}

function updateTotalTicket() {
    $('.total-ticket').html(getTotalTicket() + ' Tickets')
}