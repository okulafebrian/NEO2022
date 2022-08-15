<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>

  <body>
    <div class="d-flex" style="width: 100vw;">
        <nav class="position-fixed h-100 border-end" style="width: 20vw;">
            <div class="ps-5 pt-3">
                <!-- <img src="logobnec.png" alt="" style="width: 150px;" class="p-0 m-0"> -->
                <h1>BNEC</h1>
            </div>

            <div class="">
                <div class="pe-5 m-0 fw-semibold">
                    <a href="" class="text-decoration-none m-0"><p class="text-dark ps-5 pt-3 pb-3 m-0">Dashboard</p></a>
                    <a href="" class="text-decoration-none m-0"><p class="text-dark ps-5 pt-3 pb-3 m-0">User</p></a>
                    <a href="" class="text-decoration-none m-0"><p class="text-dark ps-5 pt-3 pb-3 m-0">Participant</p></a>
                    <a href="" class="text-decoration-none m-0"><p class="text-dark ps-5 pt-3 pb-3 m-0">Payment</p></a>
                    <a href="" class="text-decoration-none m-0"><p class="text-light rounded-end ps-5 pt-3 pb-3 m-0" style="background-color: #3A3A3C;">Competition</p></a>
                    <a href="" class="text-decoration-none m-0"><p class="text-dark ps-5 pt-3 pb-3 m-0">Result</p></a>
                    <a href="" class="text-decoration-none m-0"><p class="text-dark ps-5 pt-3 pb-3 m-0">FAQ</p></a>
                    <a href="" class="text-decoration-none m-0"><p class="text-dark ps-5 pt-3 pb-3 m-0">Publication</p></a>
                </div>
            </div>

            <div class="ps-5 pe-5 mt-5">
                <a href="">
                    <button class="btn text-light fw-bold w-100 pt-2 pb-2 mt-5" style="background-color: #EE8143;">
                        <i class="bi bi-box-arrow-right"></i>
                        Logout
                    </button>
                </a>
            </div>
        </nav>
    
        <main class="w-100 p-3 pb-0 mt-2" style="margin-left: 21vw;">
            <section class="container-fluid d-flex row col-12 pe-4 ">
                <div class="col-6 gx-0 d-flex justify-content-start">
                    <h3> <strong>Welcome, Vincent</strong> </h3>
                </div>
                
                <div class="col-6 d-flex justify-content-end">
                    <div class="navbar-nav mb-lg-0 d-flex flex-row align-items-center">
                      <li class="nav-item rounded-circle d-flex justify-content-center p-0 m-0 gx-0" style="background-color: #DEE2E6;width: 40px">
                        <a class="nav-link active" aria-current="page" href="#">
                          <div class="">
                            <i class="bi bi-person-fill"></i>
                            <span class="position-absolute translate-middle-y rounded-circle bg-danger p-1 mb-1 ms-1 text-light" style="font-size: 7px;"><span class="visually-hidden">unread messages</span></span>
                          </div>
                        </a>
                      </li>
                    </div>
                </div>
            </section>

            <section class="container-fluid mt-4 col-12 p-0 pe-5">
                <div class="container-fluid shadow p-3 bg-body rounded">
                    <div class="row d-flex text-center">
                        <div class="col pt-0 pb-0">
                            <h3>Registered Account</h3>
                            <h1 style="color:#28B4A6;" type="button" data-bs-toggle="modal" data-bs-target="#registeracc">123</h1>
                            <p>Amount of accounts that <br> have been registered</p>
                        </div>
                        <div class="col pt-0 pb-0 border-end border-start ">
                            <h3>Idle Accounts</h3>
                            <h1 style="color: #EE8143;" type="button" data-bs-toggle="modal" data-bs-target="#idleacc">123</h1>
                            <p>Amount of accounts that <br> have incomplete data</p>
                        </div>
                        <div class="col pt-0 pb-0 ">
                            <h3>Unpaid</h3>
                            <h1 style="color: #DC3545;" type="button" data-bs-toggle="modal" data-bs-target="#unpaidacc">123</h1>
                            <p>Amount of accounts that <br> haven't done payment process</p>
                        </div>
                    </div>
                </div>     
            </section>

            <section class="container-fluid mt-4 col-12 p-0">
                <h3>Participant Details</h3>
            </section>

            <section class="container-fluid mt-3 col-12 p-0 ">
                <div class="container-fluid">
                    <div class="row d-flex">
                        <div class="col-3 shadow p-5 pt-3 pb-3 bg-body rounded me-5">
                            <div class="d-flex justify-content-between pt-2">
                                <div class="p-0 m-0 gx-0">
                                    <h5>Payment </h5>
                                    <p style="color: #EE8143;
                                    ;">Pending</p>
                                </div>
                                <div>
                                    <h1><strong>44</strong></h1>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between mt-3">
                                <div>
                                    <strong>Speech</strong>
                                </div>
                                <div>
                                    <p>10</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>Debate</strong>
                                </div>
                                <div>
                                    <p>10</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>Newscasting</strong>
                                </div>
                                <div>
                                    <p>10</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>SSW</strong>
                                </div>
                                <div>
                                    <p>10</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <strong>Podcast</strong>
                                </div>
                                <div>
                                    <p>10</p>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-7 shadow p-5 pt-3 pb-3 bg-body rounded pe-5 border-end d-flex ">
                            <div class=" col-7 pe-5 me-5 border-end">
                                <div class="d-flex justify-content-between pt-2">
                                    <div class="p-0 m-0 gx-0">
                                        <h5>Payment</h5>
                                        <p style="color: #1FBAA2;">Verified</p>
                                    </div>
                                    <div>
                                        <h1><strong>44</strong></h1>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between mt-3">
                                    <div>
                                        <strong>Speech</strong>
                                    </div>
                                    <div>
                                        <p>10</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <strong>Debate</strong>
                                    </div>
                                    <div>
                                        <p>10</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <strong>Newscasting</strong>
                                    </div>
                                    <div>
                                        <p>10</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <strong>SSW</strong>
                                    </div>
                                    <div>
                                        <p>10</p>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <strong>Podcast</strong>
                                    </div>
                                    <div>
                                        <p>10</p>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-5  pe-5 me-5">
                                <div class="d-flex flex-column justify-content-center mt-2  gx-0 text-center">
                                    <div class="p-0 m-0 gx-0">
                                        <h5 class="text-center">Slots Left</h5>
                                        <p class="opacity-0" style="color: #EE8143;">Pending</p>
                                    </div>
                                </div>
                                <div class="d-flex flex-column justify-content-center mt-3  gx-0 text-center">
                                    <div>
                                        <p>10</p>
                                    </div>
                                    <div>
                                        <p>10</p>
                                    </div>
                                    <div>
                                        <p>10</p>
                                    </div>
                                    <div>
                                        <p>10</p>
                                    </div>
                                    <div>
                                        <p>10</p>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </div>
                </div>     
            </section>

            <!-- pop up modal -->
            <section>
                <div class="modal fade" id="registeracc" tabindex="-1" aria-labelledby="registeraccLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered" style="min-height: 50vh;">
                        <div class="modal-content p-3">
                            <div class="modal-header border-0 w-100">
                                <i class="bi bi-chevron-left d-flex justify-content-start fs-3" type="button" data-bs-dismiss="modal" aria-label="Close"></i> 
                            </div>
                            <strong class="d-flex justify-content-center fs-2">Registered Accounts</strong>
                            <div class="modal-body" style="min-height: 70vh;">
                                <section class="container-fluid mt-3 col-9 p-0 m-0 gx-0 position-absolute" style="min-height: 65vh;">
                                    <div class="h-100 position-absolute start-0 overflow-scroll border-top" style="width: 70vw;">
                                        <table class="table">
                                            <thead class="sticky-top table-light" style="z-index: 1; background-color: white;">
                                                <tr>
                                                    <th class="ps-5 text-center">No.</th>
                                                    <th class="ps-5">Name</th>
                                                    <th class="ps-5">Role</th>
                                                    <th class="ps-5">Email</th>
                                                    <th class="ps-5">WA_Number</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr> 
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5">pria.com</td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                </div>
                                </section>
                            </div>
                          </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="modal fade" id="idleacc" tabindex="-1" aria-labelledby="idleaccLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered" style="min-height: 50vh;">
                        <div class="modal-content p-3">
                            <div class="modal-header border-0 w-100">
                                <i class="bi bi-chevron-left d-flex justify-content-start fs-3" type="button" data-bs-dismiss="modal" aria-label="Close"></i> 
                            </div>
                            <strong class="d-flex justify-content-center fs-2">Idle Accounts</strong>
                            <div class="modal-body" style="min-height: 70vh;">
                                <section class="container-fluid mt-3 col-9 p-0 m-0 gx-0 position-absolute" style="min-height: 65vh;">
                                    <div class="h-100 position-absolute start-0 overflow-scroll border-top" style="width: 70vw;">
                                        <table class="table">
                                            <thead class="sticky-top table-light" style="z-index: 1; background-color: white;">
                                                <tr>
                                                    <th class="ps-5 text-center">No.</th>
                                                    <th class="ps-5">Name</th>
                                                    <th class="ps-5">Role</th>
                                                    <th class="ps-5">Email</th>
                                                    <th class="ps-5">WA_Number</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">teacher</td>
                                                    <td class="ps-5"></td>
                                                    <td class="ps-5">232325536222</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                </div>
                                </section>
                            </div>
                          </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="modal fade" id="unpaidacc" tabindex="-1" aria-labelledby="unpaidaccLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered" style="min-height: 50vh;">
                        <div class="modal-content p-3">
                            <div class="modal-header border-0 w-100">
                                <i class="bi bi-chevron-left d-flex justify-content-start fs-3" type="button" data-bs-dismiss="modal" aria-label="Close"></i> 
                            </div>
                            <strong class="d-flex justify-content-center fs-2">Waiting for Payment</strong>
                            <div class="modal-body" style="min-height: 70vh;">
                                <section class="container-fluid mt-3 col-9 p-0 m-0 gx-0 position-absolute" style="min-height: 65vh;">
                                    <div class="h-100 position-absolute start-0 overflow-scroll border-top" style="width: 70vw;">
                                        <table class="table">
                                            <thead class="sticky-top table-light" style="z-index: 1; background-color: white;">
                                                <tr>
                                                    <th class="ps-5 text-center">No.</th>
                                                    <th class="ps-5">Name</th>
                                                    <th class="ps-5">Price</th>
                                                    <th class="ps-5">Deadline</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="ps-5 text-center">1</td>
                                                    <td class="ps-5">wen</td>
                                                    <td class="ps-5">105.000</td>
                                                    <td class="ps-5 text-danger">10/09/2022 - 23.59</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                </div>
                                </section>
                            </div>
                          </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>