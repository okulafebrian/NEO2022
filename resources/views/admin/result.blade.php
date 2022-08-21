<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Competition</title>
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
                    <a href="" class="text-decoration-none m-0"><p class="text-dark ps-5 pt-3 pb-3 m-0">Competition</p></a>
                    <a href="" class="text-decoration-none m-0"><p class="text-light rounded-end ps-5 pt-3 pb-3 m-0" style="background-color: #3A3A3C;">Result</p></a>
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
            <section class="container-fluid d-flex row col-12 pe-4">
                <div class="col-4 gx-0 d-flex justify-content-start ps-5 ">
                    <h3><strong>Results</strong> </h3>
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

            <section class="container-fluid mt-5 col-12 p-0 m-0 gx-0 d-flex gap-5 ps-5">
                <button type="button" class="btn btn-outline-warning" style="border-radius: 20px;border-color: #7B7B7B;"><strong style="color: #7B7B7B;">Speech</strong></button>
                <button type="button" class="btn btn-outline-warning" style="border-radius: 20px;border-color: #7B7B7B;"><strong style="color: #7B7B7B;">Podcast</strong></button>
                <button type="button" class="btn btn-outline-warning" style="border-radius: 20px;border-color: #7B7B7B;"><strong style="color: #7B7B7B;">Newscasting</strong></button>
                <button type="button" class="btn btn-outline-warning" style="border-radius: 20px;border-color: #7B7B7B;"><strong style="color: #7B7B7B;">Short Story Writting</strong></button>
                <button type="button" class="btn btn-outline-warning" style="border-radius: 20px;border-color: #7B7B7B;"><strong style="color: #7B7B7B;">Debate</strong></button>
            </section>

            <section class="container-fluid mt-5 mb-1 col-12 p-0 m-0 gx-0 d-flex gap-5 ps-5">
                <button type="button" class="btn btn-outline-warning" style="border-radius: 20px;border-color: #7B7B7B;"><strong style="color: #7B7B7B;">Preliminary</strong></button>
                <button type="button" class="btn btn-outline-warning" style="border-radius: 20px;border-color: #7B7B7B;"><strong style="color: #7B7B7B;">Semi-Final</strong></button>
                <button type="button" class="btn btn-outline-warning" style="border-radius: 20px;border-color: #7B7B7B;"><strong style="color: #7B7B7B;">Final</strong></button>
            </section>           
            
            <section class="container-fluid mt-5 col-9 p-0 m-0 gx-0 position-absolute" style="min-height: 47vh;">
                <div class="h-100 position-absolute start-0 overflow-scroll border-top" style="width: 80vw;">
                    <table class="table table-striped">
                        <thead class="sticky-top" style="z-index: 1; background-color: white;">
                            <tr>
                                <th class="ps-5 text-center">Rank</th>  
                                <th class="ps-5">Participant</th>
                                <th class="ps-5">Institution</th>
                                <th class="ps-5 text-center">Score</th>
                                <th class="ps-5 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="ps-5 text-center">1</td>
                                <td class="ps-5">wen sen tan wen sen tan</td>
                                <td class="ps-5">St.Louis 1 Surabaya</td>
                                <td class="ps-5 text-center">88.00</td>
                                <td class="ps-5 text-center">
                                    <div class="dropdown dropstart">
                                        <a class="text-decoration-none text-dark" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="">
                                          ...
                                        </a>
                                      
                                        <ul class="dropdown-menu position-absolute p-0 translate-middle top-50 end-50" style="min-width: 1vw; z-index: 50;">
                                          <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleEdit" href="#">Edit</a></li>
                                          <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleDelete" href="#">Delete</a></li>
                                        </ul>
                                      </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
            </div>
            </section>

            <section class="position-absolute bottom-0 end-0 mb-4 me-4">
                <button  class="btn" style="background-color: #28B4A6;"><i class="bi bi-plus text-light" type="button" data-bs-toggle="modal" data-bs-target="#exampleAdd"></i></button>
            </section>
            
            <!-- pop up modal -->
            <section>
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content p-5">
                            <div class="modal-header border-0">
                              <h5 class="modal-title" id="exampleModalLabel">Create Announcement</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form>
                                <div class="mb-3 d-flex">
                                  <label for="recipient-name" class="col-form-label col-2">Title</label>
                                  <input type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="mb-3 d-flex">
                                  <label for="message-text" class="col-form-label col-2" style="min-height: 30vh;">Description</label>
                                  <textarea class="form-control" id="message-text"></textarea>
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer d-flex justify-content-start border-0">
                              
                              <button type="button" class="btn text-light" data-bs-toggle="modal" data-bs-target="#exampleCreated" style="background-color: #28B4A6; min-width: 100px;">Send</button>
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
                              <h3 class="modal-title" id="exampleEditLabel">Edit Result</h3>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form>
                                <div class="mb-3 d-flex">
                                    <label for="rank" class="col-form-label col-2">Rank</label>
                                    <input type="text" class="form-control" id="rank">
                                </div>
                                <div class="mb-3 d-flex">
                                    <label for="name" class="col-form-label col-2">Name</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="mb-3 d-flex">
                                    <label for="institution" class="col-form-label col-2">Institution</label>
                                    <input type="text" class="form-control" id="institution">
                                </div>
                                <div class="mb-3 d-flex">
                                    <label for="score" class="col-form-label col-2">Score</label>
                                    <input type="text" class="form-control" id="score">
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer mt-3 gap-4 row border-0 d-flex justify-content-center">
                              
                                <button type="button" class="btn text-light col-4" style="background-color: #3A3A3C;" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                <button type="button" class="btn text-light col-6" data-bs-toggle="modal" data-bs-target="#exampleConfirmEdit" style="background-color: #EE8143;">Save Changes</button>
                              </div>
                          </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="modal fade " id="exampleDelete" tabindex="-1" aria-labelledby="exampleDeleteLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content p-5">
                            <div class="modal-header border-0">
                                <i class="bi bi-exclamation-circle w-100 fs-1 text-center" style="color: #EE8143;"></i>
                            </div>
                            <div class="modal-body col-12">
                                <strong class="d-flex justify-content-center">Are you sure want to delete this data?</strong>
                                <div class=" col-6 container-fluid mt-4">
                                    <div class="row col-12 mt-3">
                                        <div class="col-5"><strong>Rank</strong></div>
                                        <div class="col-7"><p>1</p></div>
                                    </div>
                                    <div class="row col-12 mt-3">
                                        <div class="col-5"><strong>Name</strong></div>
                                        <div class="col-7"><p>Billy Samosir</p></div>
                                    </div>
                                    <div class="row col-12 mt-3">
                                        <div class="col-5"><strong>Institution</strong></div>
                                        <div class="col-7"><p>St.Louis 1 Surabaya</p></div>
                                    </div>
                                    <div class="row col-12 mt-3">
                                        <div class="col-5"><strong>Score</strong></div>
                                        <div class="col-7"><p>88.00</p></div>
                                    </div>
                                    
                                </div>
                                <div class=" mb-3 mt-4 container-fluid col-11">
                                    <div class=" border-0 d-flex justify-content-center">
                                      <input class=" mt-1 bg-light me-3" type="checkbox" value="" >
                                      <div class="">By checking this box, I am aware that i have checked in the correct data</div>
                                    </div>
                                    
                                </div>
                                
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
                <div class="modal fade" id="exampleAdd" tabindex="-1" aria-labelledby="exampleAddLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content p-5">
                            <div class="modal-header border-0">
                              <h3 class="modal-title" id="exampleEditLabel">Add Result</h3>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <form>
                                <div class="mb-3 d-flex">
                                    <label for="rank" class="col-form-label col-2">Rank</label>
                                    <input type="text" class="form-control" id="rank">
                                </div>
                                <div class="mb-3 d-flex">
                                    <label for="name" class="col-form-label col-2">Name</label>
                                    <input type="text" class="form-control" id="name">
                                </div>
                                <div class="mb-3 d-flex">
                                    <label for="institution" class="col-form-label col-2">Institution</label>
                                    <input type="text" class="form-control" id="institution">
                                </div>
                                <div class="mb-3 d-flex">
                                    <label for="score" class="col-form-label col-2">Score</label>
                                    <input type="text" class="form-control" id="score">
                                </div>
                              </form>
                            </div>
                            <div class="modal-footer mt-3 gap-4 row border-0 d-flex justify-content-center">
                              
                                <button type="button" class="btn text-light col-4" style="background-color: #3A3A3C;" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
                                <button type="button" class="btn text-light col-6" data-bs-toggle="modal" data-bs-target="#exampleConfirmAdd" style="background-color: #EE8143;">Add Result</button>
                              </div>
                          </div>
                    </div>
                </div>
            </section>

            <section>
                <div class="modal fade text-center" id="exampleConfirmAdd" tabindex="-1" aria-labelledby="exampleConfirmAddLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content p-3">
                            <div class="modal-header border-0">
                                <i class="bi bi-patch-check-fill fs-1 w-100" style="color: #EE8143;"></i>
                            </div>
                            <div class="modal-body text-center">
                                <h3>Data has been added<br>successfully!</h3>
                            </div>
                            <div class="modal-footer row border-0 d-flex justify-content-center">
                              <button type="button" class="btn text-light col-9" style="background-color: #EE8143;" data-bs-dismiss="modal" aria-label="Close">Close</button>
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
                                <h3>Result has been edited<br>successfully!</h3>
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
