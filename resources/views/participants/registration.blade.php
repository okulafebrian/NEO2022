<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body>
    <!-- nav -->
    <nav class="navbar navbar-expand-lg bg-light shadow p-1 bg-body position-fixed w-100 top-0" style="z-index: 1;">
      <div class="container-fluid m-auto row col-10 p-3">
        <div class="col-6 gx-0">
          <a class="navbar-brand" href="#">BNEC</a>
        </div>
        <div class="col-6 gx-0 d-flex justify-content-end ">
          <ul class="navbar-nav mb-lg-0 d-flex flex-row align-items-center gap-2">
            <li class="nav-item rounded-circle d-flex justify-content-center" style="background-color: #DEE2E6;width: 40px">
              <a class="nav-link active" aria-current="page" href="#">
                <div class="">
                  <i class="bi bi-bell-fill" style="color: black;"></i> 
                  <span class="position-absolute translate-middle-y rounded-circle bg-danger p-1 mb-1 ms-1 text-light" style="font-size: 7px;"><span class="visually-hidden">unread messages</span></span>
                </div>
              </a>
            </li>
            <li class="nav-item rounded-circle d-flex justify-content-center" style="background-color: #DEE2E6;width: 40px">
              <a class="nav-link"  href="#">
                <div class="">
                  <strong style="color: black;">PX</strong>
                </div>
              </a>
              <ul class="dropdown-menu position-absolute translate-middle-x border-0 shadow  bg-body rounded">
                <li class=""><a class="dropdown-item d-block pt-2 pb-2" href="#">Profile</a></li>
                <li><a class="dropdown-item d-flex justify-content-between d-block pt-2 pb-2" href="#"><p class="m-0 p-0">Sign Out</p ><i class="bi bi-box-arrow-in-right"></i></a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <main>
      <!-- pop up -->
      <section class=" container-fluid d-none">
        <div class="container-fluid col-12 col-sm-10">
          <div class="row">
            <div class="col-8 col-sm-6 col-md-5  col-xl-4 col-xxl-3 shadow p-3 mb-5 bg-body rounded text-center position-absolute top-50 start-50 translate-middle-x" style="z-index: 1000;">
              <img class="img-fluid" src="/img-svg/150px-x-150px_1.png" alt="">
              <h4>Checking Slot Availability</h4>
              <p>Please wait...</p>
            </div>
          </div>
        </div>
      </section>

      <!-- bagian-bagian -->
      <section class="container-fluid">
        <div style="min-height:10vh">
        </div>
        <div class="container-fluid position-relative col-12 col-sm-10 mt-5">
          <strong>Competition</strong>
          <!-- foreach -->
          <!-- <strong>Registration</strong> -->
        </div>
      </section>

      <section class="container-fluid mb-5" style="height: 100vh;">
        <div class=" container-fluid col-12 col-sm-10">
          <div class="row m-auto">
            <div class="col-12 col-xxl-7 p-0 mt-3">
              <h3>Participant Details</h3>
              <p class="mb-4">
                Make sure all participant data is valid and correct before submitting
              </p>
              <div class="shadow p-4 mt-4 mb-5 bg-body rounded gx-0">
                <form>
                  <div class="mb-5">
                    <label for="teamname" class="form-label"><strong>Team Name</strong>
                    </label>
                    <input type="text" class="form-control" id="teamname" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3 d-flex justify-content-between">
                    <h3>Speaker 1</h3>
                    <div class="d-flex">
                      <ul class="navbar-nav mb-lg-0 d-flex flex-row align-items-center justify-content-between gap-2">
                        <li class="nav-item rounded-circle d-flex justify-content-center w-100 p-1 ps-2 pe-2" style="background-color: #3A3A3C50;">
                          <a class="text-light"  href="#">
                            <i class="bi bi-caret-left-fill"></i>
                        </a>
                        </li>
                        <li class="nav-item rounded-circle d-flex justify-content-center w-100 p-1 ps-2 pe-2" style="background-color: #3A3A3C50;">
                          <a class="text-light"  href="#">
                              <i class="bi bi-caret-right-fill"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="teamname" class="form-label"><strong>Full Name</strong>
                    </label>
                    <input type="text" class="form-control" id="teamname" aria-describedby="emailHelp">
                  </div>
                  <div class="row">
                    <div class="mb-3 col-12 col-md-6">
                      <label for="teamname" class="form-label"><strong>Gender</strong>
                      </label>
                      <select class="form-select" aria-label="Default select example">
                        <option selected class="text-secondary">Select</option>
                        
                        <option value=""  class="text-black">Male</option>
                        <option value="" class="text-black">Female</option>
                      </select>
                    </div>
                    <div class="mb-3 col-12 col-md-6">
                      <label for="teamname" class="form-label"><strong>Grade / Year</strong>
                      </label>
                      <select class="form-select" aria-label="Default select example">
                        <option selected class="text-secondary">Select</option>

                        <option value="" class="text-black">Grade 10</option>
                        <option value="" class="text-black">Grade 11</option>
                        <option value="" class="text-black">Grade 12</option>
                        <option value="" class="text-black">Uni 1</option>
                        <option value="" class="text-black">Uni 2</option>
                        <option value="" class="text-black">Uni 3</option>
                        <option value="" class="text-black">Uni 4</option>
                        <option value="" class="text-black">Gap Year</option>
                      </select>
                    </div>
                  </div>
                  <div class="mb-3">
                      <label for="domicileAddress" class="form-label"><strong>Domicile Address</strong></label>
                      <textarea class="form-control" id="domicileAddress" rows="3"></textarea>
                  </div>
                  <div class="mb-3">
                    <label for="email" class="form-label"><strong>Email</strong>
                    </label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="whatsapp_no" class="form-label"><strong>WhatsApp Number</strong>
                    </label>
                    <input type="text" class="form-control" id="whatsapp_no" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="lineid" class="form-label"><strong>LINE ID (optional)</strong>
                    </label>
                    <input type="text" class="form-control" id="lineid" aria-describedby="emailHelp">
                  </div>
                  <div class="mb-3">
                    <label for="schoolname" class="form-label"><strong>School / University Name</strong>
                    </label>
                    <input type="text" class="form-control" id="schoolname" aria-describedby="emailHelp">
                  </div>
                  <div class="">
                    <label for="schooladdress" class="form-label"> <strong>School / University Address</strong></label>
                    <textarea class="form-control" id="schooladdress" rows="3"></textarea>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-12 col-xxl-3 ms-auto shadow p-5 mb-5 mt-3 bg-body rounded h-50">
              <h3 class="mb-4">
                Debate
              </h3>
              <p class="m-0">1 team</p>
              <div class="border-bottom pb-1 mb-4 d-flex justify-content-between">
                <p>Total Payment</p>
                <p><strong>IDR 350.000</strong></p>
              </div>
              <div class="d-flex gap-2">
                <i class="text-danger bi bi-x-circle-fill"></i>
                <p class="text-danger">Refundable</p>
              </div>
              <div class="d-grid">
                <button class="btn text-light" type="button" style="background-color: #6B6B6D;">Register</button>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>