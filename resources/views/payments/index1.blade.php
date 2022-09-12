<x-payment>

    <x-slot:title>
      Payment
    </x-slot>
  
    <x-slot:pages>
      <div class="fs-6 fw-semibold">Status</div>
      <div class="fs-6 bg-opacity-25 p-2" style="border-width: 1px;border-style: solid;border-radius: 20px;color: #EE8143;background-color: #EE81431A;border-color: #EE8143;">Waiting for Payment</div>
      <div class=" fs-6 border p-2" style="border-radius: 20px;"> <a href="/payment-pending" class="text-decoration-none" style="color: #3A3A3CBF;">Pending</a> </div>
      <div class="fs-6 border p-2" style="border-radius: 20px;"> <a href="/payment-completed" class="text-decoration-none" style="color: #3A3A3CBF;">Completed</a> </div>
      <div class="fs-6 border p-2" style="border-radius: 20px;"> <a href="/payment-expired" class="text-decoration-none" style="color: #3A3A3CBF;">Expired</a> </div>
    </x-slot>
  
    <div class="row container-fluid m-auto gap-xxl-0 col-11 col-sm-10 mt-5 p-0">
        <div class="p-4 rounded shadow col-12 col-lg-7 align-items-center me-auto">
            <div class="">
                <input type="checkbox" name="Select All" id="selectAll">
                <label class="ps-2 fw-semibold" for="selectAll">Select All</label>
            </div>
  
            <hr>
  
            <div class="d-sm-flex justify-content-between">
                <p class="fw-semibold">Debate</p>
                <div class="d-flex gap-1">
                  <p>Payment due</p>
                  <p class="text-danger">5 August 2022 23:59</p>
                </div>
            </div>
  
            <div class="d-flex justify-content-between">
                  <div class="d-flex gap-3">
                      <div class="d-flex gap-3">
                        <input type="checkbox" name="" id="item1">
                        <div class="bg-dark rounded" style="width: 80px;height: 80px;"></div>
                      </div>
                      <div class="pt-sm-3">
                          <p class="p-0 m-0">BINUS A</p>
                          <p class="fw-semibold p-0 m-0">IDR 350.000</p>
                      </div>
                  </div>
  
                  <i class="bi bi-trash-fill pt-5"></i>
            </div>
  
            <hr>
  
            <div class="d-sm-flex justify-content-between">
                <p class="fw-semibold">Short Story Writing</p>
                <div class="d-flex gap-1">
                  <p>Payment due</p>
                  <p class="text-danger">5 August 2022 23:59</p>
                </div>
            </div>
  
            <div class="d-flex justify-content-between">
                  <div class="d-flex gap-3">
                      <div class="d-flex gap-3">
                        <input type="checkbox" name="" id="item1">
                        <div class="bg-dark rounded" style="width: 80px;height: 80px;"></div>
                      </div>
                      <div class="pt-sm-3">
                          <p class="p-0 m-0">Shan Havilah</p>
                          <p class="fw-semibold p-0 m-0">IDR 145.000</p>
                      </div>
                  </div>
  
                  <i class="bi bi-trash-fill pt-5"></i>
            </div>
  
            <hr>
  
            <div class="d-sm-flex justify-content-between">
                <p class="fw-semibold">Podcast</p>
                <div class="d-flex gap-1">
                  <p>Payment due</p>
                  <p class="text-danger">5 August 2022 23:59</p>
                </div>
            </div>
  
            <div class="d-flex justify-content-between">
                  <div class="d-flex gap-3">
                      <div class="d-flex gap-3">
                        <input type="checkbox" name="" id="item1">
                        <div class="bg-dark rounded" style="width: 80px;height: 80px;"></div>
                      </div>
                      <div class="pt-sm-3">
                          <p class="p-0 m-0">Michelle Angela</p>
                          <p class="fw-semibold p-0 m-0">IDR 145.000</p>
                      </div>
                  </div>
  
                  <i class="bi bi-trash-fill pt-5"></i>
            </div>
  
        </div>

        <div class="p-4 rounded shadow col-12 col-lg-4 h-25 mt-5 m-auto m-lg-0">
            <p class="fw-semibold fs-3">Registration Summary</p>
            <div class="d-flex justify-content-between">
                <p>Total price</p>
                <p>IDR 640.000</p>
            </div>
            
            <div class="d-grid">
              <a href="payment-method.html">
                <button class="btn rounded text-light fw-bold w-100" style="background-color: #EE8143;">Pay(3)</button>
              </a>
            </div>
        </div>
    </div>
  
  </x-payment>