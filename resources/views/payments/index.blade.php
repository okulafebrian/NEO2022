{{-- <x-payment>

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
    <p class="fw-semibold fs-3 text-center p-0 m-0">Great!</p>
    <p class="text-center">You don't have any payments</p>
  </div>

</x-payment> --}}

<x-user title="Payment">

  <section class="container-fluid position-relative mb-5" style="background-color: #D6DDDF; height: 50vh;">
    <div class="p-4 m-auto bg-body rounded row d-flex container-fluid col-11 col-sm-10 mb-xl-0 shadow align-items-center position-absolute top-100 start-50 translate-middle">
      <div class="d-flex gap-4 justify-content-center justify-content-xl-start align-items-center col-12 col-xl-6 text-center text-xl-start">
        <h2 class="fw-semibold fs-3 text-center text-sm-start" style="color: #3A3A3C;"><em>National English Olympics 2022</em></h2>
      </div>

      <div class="d-flex gap-4 justify-content-center justify-content-xl-end align-items-center col-12 col-xl-6 text-center text-xl-start">
        <div>
          <i class="bi bi-trophy-fill"></i>
          <a href="" class="text-decoration-none"><strong style="color: #3A3A3CBF;">Competitions</strong></a>
        </div>
        
        <div>
          <i class="bi bi-clipboard2-pulse-fill" style="color: #EE8143;"></i>
          <a href=""class="text-decoration-none"><strong style="color: #EE8143;">My Registration</strong></a>
        </div>
      </div>
    </div>
  </section>

  
  <section class="mb-5">
    <div style="min-height:5vh"></div>
    <div class="ps-5 pb-3 pt-3 pe-5 m-auto mt-5 mt-sm-0 rounded shadow container-fluid col-11 col-sm-10 d-flex gap-4 align-items-center overflow-auto">
      <div class="fs-6 fw-semibold">Status</div>
      <div class="fs-6 bg-opacity-25 p-2" style="border-width: 1px;border-style: solid;border-radius: 20px;color: #EE8143;background-color: #EE81431A;border-color: #EE8143;">Waiting for Payment</div>
      <div class=" fs-6 border p-2" style="border-radius: 20px;"> <a href="pending.html" class="text-decoration-none" style="color: #3A3A3CBF;">Pending</a> </div>
      <div class="fs-6 border p-2" style="border-radius: 20px;"> <a href="completed.html" class="text-decoration-none" style="color: #3A3A3CBF;">Completed</a> </div>
      <div class="fs-6 border p-2" style="border-radius: 20px;"> <a href="expired.html" class="text-decoration-none" style="color: #3A3A3CBF;">Expired</a> </div>
    </div>

    <div class="p-5 m-auto mt-5 rounded shadow container-fluid col-11 col-sm-10 align-items-center">
      <p class="fw-semibold fs-3 text-center p-0 m-0">Great!</p>
      <p class="text-center">You don't have any payments</p>
    </div>
  </section>

  <div class="h-25"></div>

</x-user>