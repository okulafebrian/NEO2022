<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Participant</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>

  <body>
    <div class="d-flex" style="width: 100vw;">
        <nav class=" position-fixed h-100 border-end" style="width: 20vw; z-index: 1000; background-color: white;">
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
    
        <main class="w-100 mt-4" style="margin-left: 20vw;">
            <section class="container-fluid d-flex row col-12 pe-4 mt-5">
                <div class="col-4 gx-0 d-flex justify-content-center ps-2 pe-5">
                    <h3><strong>Registered Participants</strong> </h3>
                </div>
                
                <div class="col-8 d-flex justify-content-end">
                    <form action="">
                        <div class="position-relative">
                            <input type="text" class="ps-5 p-2 rounded border" placeholder="Search">
                            <span class="position-absolute top-50 translate-middle start-0 ms-4"><i class="bi bi-search"></i></span>
                        </div>
                    </form>
                </div>
            </section>

            <section class="container-fluid mt-5 col-12 p-0 m-0 gx-0">
                <table class="table border-top">
                      <tbody>
                        <tr>
                            <td class="ps-5 text-black-50" scope="row">Speech : 2/20</td>
                            <td class="ps-5 text-black-50">Podcast : 10/20</td>
                            <td class="ps-5 text-black-50">Newscasting : 10/20</td>
                            <td class="ps-5 text-black-50">Short Story Writting : 10/20</td>
                            <td class="ps-5 text-black-50">Debate : 10/20</td>
                        </tr>
                      </tbody>
                </table>
            </section>

            <section class="container-fluid mt-5 col-12 p-0 m-0 gx-0 d-flex gap-5 ps-5">
                <button type="button" class="btn btn-outline-warning" style="border-radius: 20px;border-color: #7B7B7B;"><strong style="color: #7B7B7B;">Speech</strong></button>
                <button type="button" class="btn btn-outline-warning" style="border-radius: 20px;border-color: #7B7B7B;"><strong style="color: #7B7B7B;">Podcast</strong></button>
                <button type="button" class="btn btn-outline-warning" style="border-radius: 20px;border-color: #7B7B7B;"><strong style="color: #7B7B7B;">Newscasting</strong></button>
                <button type="button" class="btn btn-outline-warning" style="border-radius: 20px;border-color: #7B7B7B;"><strong style="color: #7B7B7B;">Short Story Writting</strong></button>
                <button type="button" class="btn btn-outline-warning" style="border-radius: 20px;border-color: #7B7B7B;"><strong style="color: #7B7B7B;">Debate</strong></button>
            </section>           
            
            <section class="container-fluid mt-5 col-9 p-0 m-0 gx-0 position-absolute" style="min-height: 52.5vh;">
                <div class="h-100 position-absolute start-0 overflow-scroll border-top" style="width: 80vw;">
                    <table class="table table-striped">
                        <thead class="sticky-top" style="z-index: 1; background-color: white;">
                            <tr>
                                <th class="ps-5 text-center">Action</th>  
                                <th class="ps-5 text-center">No.</th>
                                <th class="ps-5">Full Name</th>
                                <th class="ps-5">Competition</th>
                                <th class="ps-5">Gender</th>
                                <th class="ps-5">Grade</th>
                                <th class="ps-5">Email</th>
                                <th class="ps-5">LINE_ID</th>
                                <th class="ps-5">WA_Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-5 text-center">
                                    <div class="dropdown dropend">
                                        <a class="text-decoration-none text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="">
                                          ...
                                        </a>
                                      
                                        <ul class="dropdown-menu position-absolute p-0" style="min-width: 1vw; z-index: 50; ">
                                          <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleEdit" href="#">Edit</a></li>
                                          <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleDelete" href="#">Delete</a></li>
                                        </ul>
                                      </div>
                                </td>
                                <td class="ps-5 text-center">1</td>
                                <td class="ps-5">wen sen tan wen sen tan wen sen tan</td>
                                <td class="ps-5">listening</td>
                                <td class="ps-5">pria</td>
                                <td class="ps-5">uni 1</td>
                                <td class="ps-5">pria.com</td>
                                <td class="ps-5">uni_pria</td>
                                <td class="ps-5">232325536222</td>
                            </tr>
                        </tbody>
                    </table>
            </div>
            </section>

            <!-- pop up modal -->
            <section>
                <div class="modal fade text-center" id="exampleDelete" tabindex="-1" aria-labelledby="exampleDeleteLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content p-5">
                            <div class="modal-header border-0">
                                <i class="bi bi-exclamation-circle w-100 fs-1" style="color: #EE8143;"></i>
                            </div>
                            <div class="modal-body">
                                <strong>Are you sure to delete this partisipant's data?</strong>
                            </div>
                            <div class="modal-footer row border-0 d-flex justify-content-center">
                              
                              <button type="button" class="btn text-light col-5" style="background-color: #3A3A3C;" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                              <button type="button" class="btn text-light col-5" data-bs-toggle="modal" data-bs-target="#exampleConfirmDel" style="background-color: #EE8143;">Confirm</button>
                            </div>
                          </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="modal fade text-center" id="exampleConfirmDel" tabindex="-1" aria-labelledby="exampleConfirmDelLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content p-3">
                            <div class="modal-header border-0">
                                <i class="bi bi-patch-check-fill fs-1 w-100" style="color: #EE8143;"></i>
                            </div>
                            <div class="modal-body text-center">
                                <h3>Data has been deleted<br>successfully!</h3>
                            </div>
                            <div class="modal-footer row border-0 d-flex justify-content-center">
                              <button type="button" class="btn text-light col-9" style="background-color: #EE8143;" data-bs-dismiss="modal" aria-label="Close">Close</button>
                            </div>
                          </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="modal fade" id="exampleEdit" tabindex="-1" aria-labelledby="exampleEditLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content p-5">
                            <div class="modal-header border-0">
                              <h5 class="modal-title" id="exampleEditLabel">Edit Participants</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form>
                                <div class="mb-3 d-flex">
                                    <label for="fullName" class="col-form-label col-2">Full Name</label>
                                    <input type="text" class="form-control" id="fullName">
                                </div>
                                <div class="mb-3 d-flex">
                                    <label for="competition" class="col-form-label col-2">Competition</label>
                                    <input type="text" class="form-control" id="competition">
                                </div>
                                <div class="mb-3 d-flex">
                                    <label for="gender" class="col-form-label col-2">Gender</label>
                                    <input type="text" class="form-control" id="gender">
                                </div>
                                <div class="mb-3 d-flex">
                                    <label for="grade" class="col-form-label col-2">Grade</label>
                                    <input type="text" class="form-control" id="grade">
                                </div>
                                <div class="mb-3 d-flex">
                                    <label for="email" class="col-form-label col-2">Email</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="mb-3 d-flex">
                                    <label for="lineID" class="col-form-label col-2">LINE ID</label>
                                    <input type="text" class="form-control" id="lineID">
                                </div>
                                <div class="mb-3 d-flex">
                                    <label for="waNumber" class="col-form-label col-2">WA Number</label>
                                    <input type="text" class="form-control" id="waNumber">
                                </div>
                                <div class="mb-3 d-flex">
                                    <label for="address" class="col-form-label col-2">Address</label>
                                    <textarea class="form-control" id="address"></textarea>
                                </div>
                                <div class="mb-3 d-flex">
                                    <label for="nameInstitute" class="col-form-label col-2">Name of Institute</label>
                                    <input type="text" class="form-control" id="nameInstitute">
                                </div>
                                <div class="mb-3 d-flex">
                                    <label for="instituteAddress" class="col-form-label col-2">Institute Address</label>
                                    <textarea class="form-control" id="instituteAddress"></textarea>
                                  </div>
                              </form>
                            </div>
                            <div class="modal-footer mt-3 gap-4 row border-0 d-flex justify-content-center">
                              
                                <button type="button" class="btn text-light col-4" style="background-color: #3A3A3C;" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                <button type="button" class="btn text-light col-6" data-bs-toggle="modal" data-bs-target="#exampleConfirmEdit" style="background-color: #EE8143;">SaveChanges</button>
                              </div>
                          </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="modal fade text-center" id="exampleConfirmEdit" tabindex="-1" aria-labelledby="exampleConfirmEditLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content p-3">
                            <div class="modal-header border-0">
                                <i class="bi bi-patch-check-fill fs-1 w-100" style="color: #EE8143;"></i>
                            </div>
                            <div class="modal-body text-center">
                                <h3>Data has been edited<br>successfully!</h3>
                            </div>
                            <div class="modal-footer row border-0 d-flex justify-content-center">
                              <button type="button" class="btn text-light col-9" style="background-color: #EE8143;" data-bs-dismiss="modal" aria-label="Close">Close</button>
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
