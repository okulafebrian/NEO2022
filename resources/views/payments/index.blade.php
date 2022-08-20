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

  <div class="p-5 m-auto mt-5 rounded shadow container-fluid col-11 col-sm-10 align-items-center">
    @if($is_confirmed===0)
      <p>Hello</p>
    @else
      <p>Bye</p>
    @endif
    {{-- <p class="fw-semibold fs-3 text-center p-0 m-0">Great!</p>
    <p class="text-center">You don't have any payments</p> --}}
  </div>

</x-payment>