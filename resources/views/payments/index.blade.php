<<<<<<< HEAD
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payment</title>
    <link rel="stylesheet" href=
"https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity=
"sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
        crossorigin="anonymous">
  
    <!-- Import jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity=
"sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous">
    </script>
      
    <script src=
"https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity=
"sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous">
    </script>
</head>
<body>
    <x-admin title="Payment">
    
        <div class="d-flex" style="width: 100vw;">
            <nav class=" position-fixed h-100 border-end" style="width: 20vw; z-index: 1000; background-color: white;">
                <div class="ps-5 pt-3">
                    <!-- <img src="logobnec.png" alt="" style="width: 150px;" class="p-0 m-0"> -->
                    <h1>BNEC</h1>
                </div>
    
                <div class="">
                    <div class="pe-5 m-0 fw-semibold">
                        <a href="/dashboards" class="text-decoration-none m-0"><p class="text-dark ps-5 pt-3 pb-3 m-0">Dashboard</p></a>
                    <a href="/users" class="text-decoration-none m-0"><p class="text-dark ps-5 pt-3 pb-3 m-0">User</p></a>
                    <a href="/participant" class="text-decoration-none m-0"><p class="text-dark ps-5 pt-3 pb-3 m-0">Participant</p></a>
                    <a href="/payments" class="text-decoration-none m-0"><p class="text-light rounded-end ps-5 pt-3 pb-3 m-0" style="background-color: #3A3A3C;">Payment</p></a>
                    <a href="" class="text-decoration-none m-0"><p class="text-dark ps-5 pt-3 pb-3 m-0" >Competition</p></a>
                    <a href="/result" class="text-decoration-none m-0"><p class="text-dark ps-5 pt-3 pb-3 m-0">Result</p></a>
                    <a href="" class="text-decoration-none m-0"><p class="text-dark ps-5 pt-3 pb-3 m-0">FAQ</p></a>
                    <a href="/publication-announcement" class="text-decoration-none m-0"><p class="text-dark ps-5 pt-3 pb-3 m-0">Publication</p></a>
                    </div>
                </div>
            </nav>
            
        </div>
        <div class="container">
            <div class="row d-flex flex-column">
                <div class="col p-2 w-100" style="margin-left: 9vw;">
                    <section class="container-fluid mt-5 col-9 p-0 m-0 gx-0 position-absolute" style="min-height: 84vh; border:0px">
                        <div class="h-100 position-absolute start-0 overflow-scroll border-top" style="width: 80vw;">
                            <h1 style="margin-left: 20px; padding-top:20px; padding-bottom:20px">Payments</h1>
                            @foreach ($payments as $payment)
                            @if($payment->is_confirmed === 0 || $payment->is_confirmed === 1)
                            <div class="card" id="paymentList" type="button" style="margin-left: 20px; margin-right:20px; margin-top: 20px">
                                <div class="card-body" data-bs-toggle="modal" data-bs-target="#PaymentDetails{{$payment->id}}Modal">
                                    <div class="d-flex justify-content-between" style="margin-left: 20px; margin-right:20px; width:90%">
                                        <div class="text-wrap text-center">
                                            <b>No</b>
                                            <br>
                                            <br>
                                            <p class="text-center">{{$payment->id}}</p>
                                        </div>
                                        <div class="w-10"></div>
                                        <div class="text-wrap position-sticky">
                                            <b>Reg ID</b>
                                            <br>
                                            <br>
                                            <p class="text-start" id="regID">{{$payment->registration_id}}</p>
                                        </div>
                                        <div class="w-10"></div>
                                       <div class="text-wrap w-10">
                                        <b class="text-start">User</b>
                                        <br>
                                        <br>
                                        <p class="text-start" id="accName">{{$payment->account_name}}</p>
                                       </div>
                                       <div class="w-10"></div>
                                      <div class="text-wrap w-10">
                                        <b class="text-start">Amount</b>
                                        <br>
                                        <br>
                                        <p class="text-start" id="Amount">{{$payment->payment_amount}}</p>
                                    </div>
                                    <div class="w-10"></div>
                                    <div class="text-wrap w-10">
                                        <b class="text-start">Status</b>
                                        <br>
                                        <br>
                                        @if ($payment->is_confirmed === 0)
                                        <p class="text-start"  style="color: orange; width:4rem">Pending</p>
                                    @elseif ($payment->is_confirmed === 1)
                                        <p class="text-start" style="color: green">Confirmed</p>
                                    @endif
                                    </div>
                                    {{-- <div class="d-none d-lg-block">
                                        <button type="button" class="btn btn-primary btn-lg w-100" data-bs-toggle="modal"
                                            data-bs-target="#seePaymentDetails">
                                            More Details
                                        </button>
                                    </div> --}}
                                        {{-- <p>{{$payment->is_confirmed}}</p> --}}
                                       
                                    </div>
                                    
                                </div>
                            </div>
                            @endif

                            <div class="modal fade" id="PaymentDetails{{$payment->id}}Modal"  data-id="{{ $payment->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                    tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content rounded-4 shadow p-0">
                            <div class="modal-header border-bottom-0 text-center">
                                <h4 class="modal-title">Payment Details</h4>
                            </div>
                            <div class="modal-body py-0">
                                <div class="row border border-1 rounded-4 p-3">
                                    <div class="col">
                                        <p class="mb-1">
                                            Account Name: {{ $payment->account_name}}
                                        </p>
                                        <p class="mb-1">
                                            Account Number: {{ $payment->account_number}}
                                        </p>
                                        <p class="mb-1">
                                            Payment Type: {{ $payment->payment_type}}
                                        </p>
                                        <p class="mb-1">
                                            Provider Name: {{ $payment->provider_name}}
                                        </p>
                                        
                                        {{-- <h6 class="mb-1">Rp
                                            {{ number_format($competition->early_price, 0, '.', '.') }}</h6>
                                        <p class="text-muted m-0">{{ $competition->early_temp_quota }} tickets
                                            available</p> --}}
                                    </div>
                                    {{-- <div class="col-sm-5 my-sm-auto mt-3">
                                        <input type="number" id="inputTicket" class="input-spinner"
                                            min="1" max="{{ $competition->early_quota }}"
                                            value="1" />
                                    </div> --}}
                                </div>
                            </div>
                            <div class="modal-footer flex-row justify-content-center border-top-0 gap-2">
                                <button type="button" class="btn btn-lg btn-outline-dark w-30"
                                    data-bs-dismiss="modal">Cancel</button>
                                @if($payment->is_confirmed === -1)
                                <button type="submit" class="btn btn-lg btn-dark w-30" disabled>Verify Data</button>
                                @else
                                <button type="submit" onclick="myFunction()" id="verifyData" class="btn btn-lg btn-dark w-30">Verify Data</button>
                                
                                <script>
                                    function myFunction() {
                                      
                                }
                                </script>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                            
                        
                        @endforeach
                    </div>
                    </section>
                    
                
                    
                </div>
                  
    
                {{-- <div class="w-100"></div> --}}
                <div class="col p-6 w-100" style="margin-left: 9vw; margin-top: 40vw;">
                    <section class="container-fluid mt-5 col-9 p-0 m-0 gx-0 position-absolute" style="min-height: 84vh;">
                        <div class="h-100 position-absolute start-0 overflow-scroll border-top" style="width: 80vw;">
                            <h1 style="margin-left: 20px; padding-top:20px">Expired Payments</h1>
                            @foreach ($payments as $payment)
                            @if($payment->is_confirmed === -1)
                            <div class="card" id="paymentList" type="button" style="margin-left: 20px; margin-right:20px; margin-top: 20px">
                                <div class="card-body" data-bs-toggle="modal" data-bs-target="#PaymentDetails{{$payment->id}}Modal">
                                    <div class="d-flex justify-content-between" style="margin-left: 20px; margin-right:20px; width:90%">
                                        <div class="text-wrap">
                                            <b>No</b>
                                            <br>
                                            <br>
                                            <p class="text-center">{{$payment->id}}</p>
                                            
                                        </div>
                                        <div class="w-15"></div>
                                        <div class="text-wrap text-center">
                                            <b>Reg ID</b>
                                            <br>
                                            <br>
                                            <p class="text-center" id="regID">{{$payment->registration_id}}</p>
                                        </div>
                                        <div class="w-15"></div>
                                       <div class="text-wrap text-center">
                                        <b class="text-center">User</b>
                                        <br>
                                        <br>
                                        <p class="text-center" id="accName">{{$payment->account_name}}</p>
                                       </div>
                                       <div class="w-15"></div>
                                      <div class="text-wrap">
                                        <b>Amount</b>
                                        <br>
                                        <br>
                                        <p class="text-center" id="Amount">{{$payment->payment_amount}}</p>
                                    </div>
                                    <div class="w-15"></div>
                                    <div class="text-wrap w-10 text-center">
                                        <b class="text-center">Status</b>
                                        <br>
                                        <br>
                                        @if ($payment->is_confirmed === -1)
                                        <p class="text-center"  style="color: red; width:4rem">Expired</p>
                                    @endif
                                    </div>
                                    {{-- <div class="d-none d-lg-block">
                                        <button type="button" class="btn btn-primary btn-lg w-100" data-bs-toggle="modal"
                                            data-bs-target="#seePaymentDetails">
                                            More Details
                                        </button>
                                    </div> --}}
                                        {{-- <p>{{$payment->is_confirmed}}</p> --}}
                                       
                                    </div>
                                    
                                </div>
                            </div>
                            @endif
                            
                            
                        
                        @endforeach
                    </div>
                    </section>
                    
                </div>
                
            </div>
    
           
        </div>
       
        
    
       
        
       
        {{-- <script type="text/javascript">
           var seePaymentDetails = document.getElementById('seePaymentDetails')
            seePaymentDetails.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
            var button = event.relatedTarget
  // Extract info from data-bs-* attributes
            // var Amount = $(this).data('paymentAmount');
            var recipient = button.getAttribute('data-bs-whatever')
            // var paymentAmount = button.getElementById('#Amount')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modalTitle = seePaymentDetails.querySelector('.modal-body #recipient-name')
  var modalBodyInput = seePaymentDetails.querySelector('.modal-body input')


//   var paymentCost = seePaymentDetails.querySelector('.modal-body #paymentAmount')

  modalTitle.textContent = recipient
  modalBodyInput.value = recipient

}) --}}
        {{-- </script> --}}
    
    </x-admin>
</body>
</html>
=======
<form class="form-horizontal">
    <div class="control-group">
        <p>Create a promo code</p>

    </div>
    <div class="control-group">
        <div> Promo description * </div>
        <div class="controls">
            <textarea rows="3"></textarea>
        </div>
    </div>
    <div class="control-group">
        <div>Promo Type</div>
        <div class="controls">
            <label class="radio inline">
                <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                Instant Discount
            </label>
            <label class="radio inline">
                <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2"></input>
                Cash back
            </label>
            <label class="radio inline">
                <input type="radio" name="optionsRadios" id="optionRadios3" value="option3">
                Other Gratification
            </label>
        </div>
    </div>

    <div class="control-group">
        <div> Promo Value * </div>
        <div class="controls">
            <label class="radio inline" id="label1">
                <input type="radio" name="optionsRadios1" id="optionsRadios4" value="option1" checked>
                Percentage
            </label>
            <label for="hello" class="inline" id="label2">Upper Limit
                <input id="hello" type="text" class="inline" placeholder="Text input">
            </label>

            <label class="radio inline" id="label3">

                <input type="radio" name="optionsRadios1" id="optionRadios6" value="option3">
                Fixed Amount
            </label>
        </div>
    </div>
    <div class="control-group">
        <div> Promo-code usage count *
        </div>
        <div class="controls">
            <label class="radio inline">
                <input type="radio" name="optionsRadios2" id="optionsRadios5" value="option1" checked>
                Unlimited
                <label for="hello1" class="inline">Limited
                    <input id="hello" type="radio" class="radio inline">
                </label>
                <input id="hello" type="text" class="inline">

        </div>
    </div>
</form>
>>>>>>> e068489fc303570b0d8c62e9b961d1ca1035f99a
