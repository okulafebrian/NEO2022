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

  <div class="p-5 m-auto mt-5 rounded shadow container-fluid col-10 align-items-center">
    <p class="fw-semibold fs-3 text-center p-0 m-0">Great!</p>
    <p class="text-center">You don't have any payments</p>
  </div>

</x-payment>





