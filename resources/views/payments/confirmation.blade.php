<x-user title="Payment Confirmation">

    <div class="d-flex gap-2 overflow-auto col-10" style="margin-left: 8vw;margin-top: 12vh;">
        <p class="fw-semibold">Payment</p>
        <i class="bi bi-caret-right-fill"></i>
        <p class="fw-semibold">Payment Confirmation</p>
        <i class="bi bi-caret-right-fill"></i>
        <p class="fw-semibold" style="color: #EE8143;">Upload Proof of Payment</p>
    </div>

    <div class="col-10 col-lg-5 shadow rounded p-4" style="margin-left: 8vw;">
        <h3 class="fs-3">Payment Destination</h3>
        <p>Transfer the payment amount to the account below</p>
        <hr>
        <div class="">
            <p>Bank Name</p>
            <p class="fw-bold">BCA</p>
        </div>

        <div class="d-sm-flex">
            <div class="me-sm-5">
                <p>Account Number</p>
                <p class="fw-bold">1234567890</p>
            </div>

            <div class="ms-sm-5">
                <p>Account Name</p>
                <p class="fw-bold">Tom Jerry</p>
            </div>
        </div>

        <div class="">
            <div class="">
              <p>Total Payment</p>
            </div>

            <div class="d-flex justify-content-between">
                <p class="fw-bold">IDR 640.000</p>
                <a data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;">
                  <p style="color: #EE8143;">View details</p> 
                </a>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-md me-0 mt-0">
                <div class="modal-content"  style="height: 100vh;">
                  <div class="modal-body p-5">
                    <div class="d-flex justify-content-between">
                      <div class="">
                        <h5>Payment Details</h5>
                        <p>Invoice 087</p>
                      </div>

                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between">
                      <div class="">
                        <p>BINUS A</p>
                        <p>Shan Havilah</p>
                        <p>Michelle Angela</p>
                      </div>

                      <div class="">
                        <p>350.000</p>
                        <p>145.000</p>
                        <p>145.000</p>
                      </div>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between">
                      <div class="fw-semibold">
                        <p>Total Payment</p>
                        <p>Payment Method</p>
                      </div>

                      <div class="fw-semibold text-end">
                        <p>IDR 640.000</p>
                        <p>{{ $method }}</p>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
        </div>

        <hr>

        <form action="save_payment" method="post">
          {{ csrf_field() }}
          <div class="mb-3">
              <label for="formFile" class="form-label fw-semibold">Upload Proof of Payment</label>
              <input type="file" class="form-control">
          </div>

          <div class="d-flex justify-content-between">
              <button class="btn fw-semibold col-7 fs-6 fs-md-5" style="border: 1px solid #EE8143;"> <a href="/payment-method" class="text-decoration-none" style="color: #EE8143;">Change Payment Method</a> </button>
              
              <button type="submit" class="btn fw-semibold text-light col-4" style="border: 1px solid #EE8143;background-color: #EE8143;">
                <i class="bi bi-shield-check"></i>
                Pay
              </button>
          </div>
        </form>
    </div>

    <div class="h-25"></div>

</x-user>