<x-payment>

    <x-slot:title>
      Payment
    </x-slot>
  
    <x-slot:pages>
      <div class="fw-semibold">Status</div>
      <div class="border bg-opacity-25 p-2" style="border-radius: 20px;color: #3A3A3CBF;"> <a href="/payments" class="text-decoration-none" style="color: #3A3A3CBF;">Waiting for Payment</a> </div>
      <div class="border p-2" style="border-radius: 20px;"> <a href="/payment-pending" class="text-decoration-none" style="color: #3A3A3CBF;">Pending</a> </div>
      <div class="border p-2" style="border-radius: 20px;"> <a href="/payment-completed" class="text-decoration-none" style="color: #3A3A3CBF;">Completed</a> </div>
      <div class="p-2" style="border-width: 1px;border-style: solid;border-radius: 20px;border-color: #EE8143;"> <a href="/payment-expired" class="text-decoration-none" style="color: #EE8143;">Expired</a> </div>
    </x-slot>
  
    <div class="p-4 rounded shadow col-11 col-sm-10 m-auto mt-5">
        <div class="">
          <p class="fw-semibold">Short Story Writing</p>
        </div>
        
        <div class="d-flex justify-content-between row">
            <div class="d-flex col-12 col-md-4 col-xl-8 mb-3 m-lg-0">
                <div class="rounded bg-dark" style="width: 80px; height: 80px;"></div>
                <div class="fw-semibold ms-3 mt-3">
                    <p class="p-0 m-0">Shan Havilah</p>
                    <p class="p-0 m-0">IDR 145.000</p>
                </div>
            </div>
            
            <div class="col-12 col-md-8 col-xl-4 overflow-auto mt-3">
              <table>
                <tr style="color: #3A3A3CBF;">
                    <td class="border-start ps-4 pe-4">Registration Date</td>
                    <td class="border-start ps-4 pe-4">Payment Expired</td>
                </tr>
                <tr class="fw-semibold">
                    <td class="border-start ps-4 pe-4">12 Sept 2022</td>
                    <td class="border-start ps-4 pe-4 text-danger">5 Aug 2022 23:59</td>
                </tr>
              </table>
            </div>
        </div>
    </div>
  
  </x-payment>
  
  
  
  
  
  