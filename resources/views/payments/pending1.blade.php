<x-payment>

    <x-slot:title>
      Payment
    </x-slot>
  
    <x-slot:pages>
      <div class="fw-semibold">Status</div>
      <div class="border bg-opacity-25 p-2" style="border-radius: 20px;color: #3A3A3CBF;"> <a href="/payments" class="text-decoration-none" style="color: #3A3A3CBF;">Waiting for Payment</a> </div>
      <div class="p-2" style="border-width: 1px;border-style: solid;border-radius: 20px;border-color: #EE8143;"> <a href="/payment-pending" class="text-decoration-none" style="color: #EE8143;">Pending</a> </div>
      <div class="border p-2" style="border-radius: 20px;"> <a href="/payment-completed" class="text-decoration-none" style="color: #3A3A3CBF;">Completed</a> </div>
      <div class="border p-2" style="border-radius: 20px;"> <a href="/payment-expired" class="text-decoration-none" style="color: #3A3A3CBF;">Expired</a> </div>
    </x-slot>
  
    <div class="p-4 rounded shadow col-11 col-sm-10 m-auto mt-5">
        <div class="d-flex justify-content-between">
          <p class="fw-semibold">Podcast</p>
          <a data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;">
            <p style="color: #EE8143;">View details</p> 
          </a>

          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-body p-5">
                  <div class="d-flex justify-content-between mb-3">
                    <h4 class="modal-title" id="exampleModalLabel">Registration Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  
                  <div class="d-sm-flex align-items-center justify-content-between">
                    <div class="d-sm-flex gap-3">
                      <div class="bg-dark rounded mb-3 m-sm-0" style="width: 80px;height: 80px;"></div>
                      <div class="">
                        <p>Michelle Angela</p>
                        <p class="fw-semibold">Podcast</p>
                      </div>
                    </div>

                    <div class="">
                      <p>Registration Date</p>
                      <p class="fw-semibold">12 Sept 2022</p>
                    </div>
                  </div>

                  <hr>

                  <div class="d-lg-flex">
                    <div class="d-flex overflow-auto">
                      <div class="fw-semibold me-5">
                        <p>Gender</p>
                        <p>Grade/Year</p>
                        <p>Email</p>
                        <p>Whatsapp Number</p>
                        <p>LINE ID</p>
                      </div>

                      <div class="border-end col-12 col-lg-7" style="padding-right: 10vw;">
                        <p>Female</p>
                        <p>uni 1</p>
                        <p>michelle.angela@gmail.com</p>
                        <p>0812 1212 2323</p>
                        <p>-</p>
                      </div>
                    </div>
                    
                    <div class="ps-lg-5 col-12 col-lg-5">
                      <p class="fw-semibold">Domicile Address</p>
                      <p class="mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, incidunt sapiente ipsa maiores iure dicta illum consequatur eligendi magni quis.</p>
                      <p class="fw-semibold">School / University Name</p>
                      <p class="mb-3">BINUS University</p>
                      <p class="fw-semibold">School / University Address</p>
                      <p class="mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus, incidunt sapiente ipsa maiores iure dicta illum consequatur eligendi magni quis.</p>
                    </div>
                  </div>
                </div>

                <div class="modal-footer pe-4 mb-3 justify-content-start justify-content-sm-end">
                  <a data-bs-toggle="modal" href="#exampleModal2" type="button" class="btn bg-dark text-light me-3">Request Edit Data</a>
                  <button type="button" class="btn text-light" style="background-color: #EE8143;"> <i class="bi bi-download"></i> Invoice</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="exampleModal2" aria-hidden="true" aria-labelledby="exampleModalLabel2" tabindex="-1">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-body p-4">
                <div class="d-flex justify-content-between">
                  <h4>Request Edit Data</h4>
                  <button class="btn border border-0" data-bs-toggle="modal" data-bs-target="#exampleModal" aria-label="Back"><i class="bi bi-arrow-left-circle-fill"></i></button>
                </div>

                <div class="">
                  <p>If there is a mistake in data input and want to change it, please contact the committee via the contact below.</p>
                </div>

                <button type="button" class="btn m-auto mb-3 rounded text-light d-flex justify-content-between align-items-center w-100" style="background-color: #EE8143;">
                  <div class="d-flex gap-3 align-items-center">
                    <img src="wa.png" alt="" style="width: 40px; height: 40px;">
                    <div class="text-start">
                      <p class="fw-semibold p-0 m-0">NEO Official Whatsapp</p>
                      <p class="p-0 m-0">0812 4567 0389</p>
                    </div>
                  </div>
                  <i class="bi bi-chevron-right"></i>
                </button>

                <button type="button" class="btn m-auto rounded text-light d-flex justify-content-between align-items-center w-100" style="background-color: #EE8143;">
                  <div class="d-flex gap-3 align-items-center">
                    <img src="line.png" alt="" style="width: 40px; height: 40px;">
                    <div class="text-start">
                      <p class="fw-semibold p-0 m-0">NEO Official LINE</p>
                      <p class="p-0 m-0">@re9i0212</p>
                    </div>
                  </div>
                  <i class="bi bi-chevron-right"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      
          <div class="d-flex justify-content-between row">
              <div class="d-flex col-12 col-md-4 col-lg-6 mb-3 m-lg-0">
                  <div class="rounded bg-dark" style="width: 80px; height: 80px;"></div>
                  <div class="fw-semibold ms-3 mt-3">
                      <p class="p-0 m-0">Michelle Angela</p>
                      <p class="p-0 m-0">IDR 145.000</p>
                  </div>
              </div>
              
              <div class="col-12 col-md-8 col-lg-6 overflow-auto mt-3 m-sm-0">
                <table class="">
                  <tr style="color: #3A3A3CBF;">
                      <td class="border-start ps-4 pe-4">Registration Date</td>
                      <td class="border-start ps-4 pe-4">Invoice Number</td>
                      <td class="border-start ps-4 pe-4">Payment Verification</td>
                  </tr>
                  <tr class="fw-semibold">
                      <td class="border-start ps-4 pe-4">12 Sept 2022</td>
                      <td class="border-start ps-4 pe-4">087</td>
                      <td class="border-start ps-4 pe-4">
                          <i class="bi bi-clock"></i>
                          In Progress
                      </td>
                  </tr>
                </table>
              </div>
          </div>
      </div>
  
  </x-payment>
  
  
  