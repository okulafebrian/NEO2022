$(document).ready(function() {
    // Input Spinner
    $('.input-spinner').inputSpinner({buttonsOnly: true, autoInterval: undefined})

    // Confirm Ticket
    $(document).on('click', '#confirmTicket', function() {
        var id =  $(this).closest('.modal').data('id');
        var ticketAmount = $(this).closest('.modal').find('#inputTicket').val()

        $('#compet' + id + 'TicketAmount').val(ticketAmount)
        $('#compet' + id + 'Title').css('color', 'green')
        $('#compet' + id + 'TicketAmountText').html(ticketAmount + 'x')
        updateTotalTicket()
    })

    // Cancel Ticket
    $(document).on('click', '#cancelTicket', function() {
        var id =  $(this).closest('.modal').data('id')

        $(this).closest('.modal').find("#inputTicket").val(1)
        $('#compet' + id + 'TicketAmount').val(0)
        $('#compet' + id + 'Title').css('color', '')
        $('#compet' + id + 'TicketAmountText').html(null)  // Badge
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

    // Disable Register Button
    (total > 0) ? $('.btn-register').prop("disabled", false) : $('.btn-register').prop("disabled", true)

    return total
}

function updateTotalTicket() {
    $('.total-ticket').html(getTotalTicket() + ' Tickets')
}