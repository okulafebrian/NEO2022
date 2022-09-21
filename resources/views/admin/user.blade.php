<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User</title>
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
                    <a href="/dashboard" class="text-decoration-none m-0"><p class="text-dark ps-5 pt-3 pb-3 m-0">Dashboard</p></a>
                    <a href="/user" class="text-decoration-none m-0"><p class="text-light rounded-end ps-5 pt-3 pb-3 m-0" style="background-color: #3A3A3C;">User</p></a>
                    <a href="/participants" class="text-decoration-none m-0"><p class="text-dark ps-5 pt-3 pb-3 m-0">Participant</p></a>
                    <a href="" class="text-decoration-none m-0"><p class="text-dark ps-5 pt-3 pb-3 m-0">Payment</p></a>
                    <a href="/competitions" class="text-decoration-none m-0"><p class="text-dark ps-5 pt-3 pb-3 m-0">Competition</p></a>
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
            <section class="container-fluid d-flex row col-12 pe-4">
                <div class="col-3 gx-0 d-flex justify-content-center pe-4">
                    <h3><strong>Registered Users</strong></h3>
                </div>
                
                <div class="col-9 d-flex justify-content-end">
                    <form action="">
                        <div class="position-relative">
                            <input type="text" class="ps-5 p-2 rounded border" placeholder="Search">
                            <span class="position-absolute top-50 translate-middle start-0 ms-4"><i class="bi bi-search"></i></span>
                        </div>
                    </form>
                </div>
            </section>

            <section class="container-fluid mt-5 col-9 p-0 m-0 gx-0 position-absolute" style="min-height: 84vh;">
                <div class="h-100 position-absolute start-0 overflow-scroll border-top" style="width: 80vw;">
                    <table class="table table-striped">
                        <thead class="sticky-top" style="z-index: 1; background-color: white;">
                            <tr>
                                <th class="ps-5 text-center">No.</th>
                                <th class="ps-5">Name</th>
                                <th class="ps-5">Role</th>
                                <th class="ps-5">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admins as $admin)
                            <tr>
                                <td class="ps-5 text-center">{{ $admin->id }}</td>
                                <td class="ps-5">{{ $admin->name }}</td>
                                <td class="ps-5">{{ $admin->role }}</td>
                                <td class="ps-5">{{ $admin->email }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </main>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
