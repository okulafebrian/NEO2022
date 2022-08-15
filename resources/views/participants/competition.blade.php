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
        </div>
      </section>

      <section class="container-fluid mb-5" style="height: 100vh;">
        <div class="container-fluid col-12 col-sm-10 gx-0">
        <div class="row gap-5 m-auto mt-5">
          <div class="col-12 col-xl-3 overflow-hidden shadow mb-5 bg-body rounded" style="min-height: 300px;">
          </div>
          <div class="col-12 col-xl-8 shadow p-4 mb-5 bg-body rounded ms-auto" style="max-height: 300px;">
            <h3 class="m-2">Debate</h3>
            <p class="m-2">This field of competition aims to hone the participants’ skills in expressing their opinion, ideas, and solutions on certain topics or issues, relying on data while stating their arguments, and sharpen the participants’ negotiation skills.
            </p>
            <p class="pb-2 m-2 border-bottom">* 1 team: 2 persons</p>
            <div class="d-flex m-2">
              <div class="mt-2">
                <p>Price</p>
                <h4>IDR 350.000 / team</h4>
              </div>
              <div class="ms-auto mt-4">
                <button type="button" class="btn btn-primary" style="background-color: #EE8143;">Select</button>
              </div>
            </div>
          </div>
        </div>
        <div class="row gap-5 m-auto mt-5">
          <div class="col-12 shadow mb-5 bg-body rounded">
            <h3 class="m-2 mt-5 ps-4 ms-2">General Rules</h3>
            <p class="m-2">
              <ul class="list-group list-group-numbered p-4">
                <li class="list-group-item border-0">
                  The Zoom link for the competition will be sent to the participants via email and WhatsApp group one day before the D-Day of the competition round
                </li>
                <li class="list-group-item border-0">
                  The Debate competition will use the British Parliamentary System. Each team will consist of 2 debaters
                </li>
                <li class="list-group-item border-0">
                  Participants must use English during the competition. The speech must not conduct discrimination against SARA nor contain graphic sexual content.Participants must not include any form of profanity
                </li>
                <li class="list-group-item border-0">
                  Participants must attend the Technical Meeting and highly recommend attending the Coaching Clinic to learn some tips and tricks from the debate adjudicator
                </li>
                <li class="list-group-item border-0">
                  Participants who don’t attend the Technical Meeting and Coaching Clinic won't be guaranteed to receive further information from the committee after those sessions
                </li>
              </ul>
            </p>
          </div>
          <div class="col-12 shadow mb-5 bg-body rounded">
            <h3 class="m-2 mt-5 ps-4 ms-2">General Rules</h3>
            <p class="m-2">
              <ul class="list-group list-group-numbered p-4">
                <li class="list-group-item border-0">
                  The Zoom link for the competition will be sent to the participants via email and WhatsApp group one day before the D-Day of the competition round
                </li>
                <li class="list-group-item border-0">
                  The Debate competition will use the British Parliamentary System. Each team will consist of 2 debaters
                </li>
                <li class="list-group-item border-0">
                  Participants must use English during the competition. The speech must not conduct discrimination against SARA nor contain graphic sexual content. Participants must not include any form of profanity
                </li>
                <li class="list-group-item border-0">
                  Participants must attend the Technical Meeting and highly recommend attending the Coaching Clinic to learn some tips and tricks from the debate adjudicator
                </li>
                <li class="list-group-item border-0">
                  Participants who don’t attend the Technical Meeting and Coaching Clinic won't be guaranteed to receive further information from the committee after those sessions
                </li>
              </ul>
            </p>
          </div>
          </div>
        </div>
        </div>
      </section>
    </main>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>