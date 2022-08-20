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
    <nav class="navbar navbar-expand-lg  bg-light shadow p-1 bg-body  position-fixed w-100 top-0" style="z-index: 1;">
      <div class="container-fluid m-auto row col-10 p-3">
        <div class="col-6 gx-0">
          <a class="navbar-brand" href="#">BNEC</a>
        </div>
        <div class="col-6 gx-0 d-flex justify-content-end ">
          <ul class="navbar-nav mb-lg-0 d-flex flex-row align-items-center gap-2">
            <li class="nav-item rounded-circle d-flex justify-content-center" style="background-color: #DEE2E6;width: 40px">
              <a class="nav-link active position-relative" aria-current="page" href="#">
                <div class="">
                  
                    <i class="bi bi-bell-fill" style="color: black;"></i> <span class="position-absolute translate-middle-y rounded-circle bg-danger p-1 mb-1 ms-1 text-light" style="font-size: 7px;"><span class="visually-hidden">unread messages</span></span>
                  
                </div>
              </a>
            </li>
            <li class="nav-item rounded-circle d-flex justify-content-center dropdown" style="background-color: #DEE2E6; width: 40px;">
              <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="">
                  <strong style="color: black;">PX</strong>
                </div>
              </a>
              <ul class="dropdown-menu position-absolute translate-middle-x border-0 shadow  bg-body rounded">
                <li class=""><a class="dropdown-item d-block pt-2 pb-2" href="#">Profile</a></li>
                <li><a class="dropdown-item d-flex justify-content-between d-block pt-2 pb-2" href="#"><p class="m-0 p-0">Sign Out</p ><i class="bi bi-box-arrow-in-right"></i></a></li>
              </ul>
            </li>
            </div>
          </ul>
        </div>
      </div>
    </nav>

    <main>
      <!-- pop up -->
      <section class="container-fluid d-none">
        <div class="container-fluid col-12 col-sm-10">
          <div class="row">
            <div class="col-8 shadow p-5 mb-5 bg-body rounded position-absolute top-50 start-50 translate-middle " style="z-index: 1000;">
              <h3 class="text-center">Announcements</h3>
              <!-- foreach with border down -->
              <div class="pb-3 pt-5" style="min-height:50vh">
                <p class="border-bottom pb-4">laboriosam</p>
                <p class="border-bottom pb-4">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veniam officia earum minima</p>
              </div>
              <div class="d-flex justify-content-center">
                <button class="btn text-light mt-3" type="button" style="background-color: #EE8143;">Close</button>
              </div>
              
            </div>
          </div>
        </div>
      </section>

      <!-- bagian-bagian -->
      <section class="container-fluid position-relative mb-5" style="background-color: #D6DDDF; height: 50vh;">
        <div class="p-4 m-auto bg-body rounded row d-flex container-fluid col-11 col-sm-10 mb-xl-0 shadow align-items-center position-absolute top-100 start-50 translate-middle">
          <div class="d-flex gap-4 justify-content-center justify-content-xl-start align-items-center col-12 col-xl-6 text-center text-xl-start">
            <h2 class="fw-semibold fs-5 text-center text-sm-start" style="color: #3A3A3C;"><em>National English Olympics 2022</em></h2>
          </div>
    
          <div class="d-flex gap-4 justify-content-center justify-content-xl-end align-items-center col-12 col-xl-6 text-center text-xl-start">
            <div>
              <i class="bi bi-trophy-fill" style="color: #EE8143;"></i>
              <a href="" class="text-decoration-none"><strong style="color: #EE8143;">Competitions</strong></a>
            </div>
            
            <div>
              <i class="bi bi-clipboard2-pulse-fill" style="color: #3A3A3CBF;"></i>
              <a href=""class="text-decoration-none"><strong style="color: #3A3A3CBF;">My Registration</strong></a>
            </div>
          </div>
        </div>
      </section>

      <section class="container-fluid mb-5">
        <div class="container-fluid col-10 gx-0">
          <div class="row pb-5 pt-5 m-auto gx-0 gap-4 ">
            <div class="col d-flex justify-content-center">
                <div class="card overflow-hidden" style="width: 14rem;">
                  <a href="/Debate" class="text-decoration-none" style="height:10rem;width:300px;border:1px solid black; background-color: black;"><img src="/img-svg/hitam-removebg-preview.png" class="m-auto img-fluid text-decoration-none" alt="..." ></a>
                  <a href="/Debate" class="text-decoration-none text-dark">
                    <div class="card-body d-flex flex-column">
                      <h5 class="card-title">Debate</h5>
                      <p class="card-text fs-6">1 team</p>
                      <br><br>
                      <strong class="card-text fs-5">IDR 350.000</strong>
                    </div>
                  </a>
                </div>
            </div>
            <div class="col d-flex justify-content-center">
              <div class="card overflow-hidden" style="width: 14rem;">
                <a href="/Newscasting" class="text-decoration-none" style="height:10rem;width:300px;border:1px solid black; background-color: black;"><img src="/img-svg/hitam-removebg-preview.png" class="m-auto img-fluid text-decoration-none" alt="..." ></a>
                <a href="/Newscasting" class="text-decoration-none text-dark">
                  <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Newscasting</h5>
                    <p class="card-text fs-6">1 person</p>
                    <br><br>
                    <strong class="card-text fs-5">IDR 145.000</strong>
                  </div>
                </a>
              </div>
            </div>
            <div class="col d-flex justify-content-center">
              <div class="card overflow-hidden" style="width: 14rem;">
                <a href="/Podcast" class="text-decoration-none" style="height:10rem;width:300px;border:1px solid black; background-color: black;"><img src="/img-svg/hitam-removebg-preview.png" class="m-auto img-fluid text-decoration-none" alt="..." ></a>
                <a href="/Podcast" class="text-decoration-none text-dark">
                  <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Podcast</h5>
                    <p class="card-text fs-6">1 person</p>
                    <br><br>
                    <strong class="card-text fs-5">IDR 145.000</strong>
                  </div>
                </a>
              </div>
            </div>  
            <div class="col d-flex justify-content-center">
              <div class="card overflow-hidden" style="width: 14rem;">
                <a href="/Short_Story_Writing" class="text-decoration-none" style="height:10rem;width:300px;border:1px solid black; background-color: black;"><img src="/img-svg/hitam-removebg-preview.png" class="m-auto img-fluid text-decoration-none" alt="..." ></a>
                <a href="/Short_Story_Writing" class="text-decoration-none text-dark">
                  <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Short Story Writing</h5>
                    <p class="card-text fs-6">1 person</p>
                    <br><br>
                    <strong class="card-text fs-5">IDR 145.000</strong>
                  </div>
                </a>
              </div>
            </div>
            <div class="col d-flex justify-content-center">
              <div class="card overflow-hidden" style="width: 14rem;">
                <a href="/Speech" class="text-decoration-none" style="height:10rem;width:300px;border:1px solid black; background-color: black;"><img src="/img-svg/hitam-removebg-preview.png" class="m-auto img-fluid text-decoration-none" alt="..." ></a>
                <a href="/Speech" class="text-decoration-none text-dark">
                  <div class="card-body d-flex flex-column">
                    <h5 class="card-title">Speech</h5>
                    <p class="card-text fs-6">1 person</p>
                    <br><br>
                    <strong class="card-text fs-5">IDR 145.000</strong>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section> 
    </main>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>