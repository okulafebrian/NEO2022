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
      <div class="d-flex" style="max-width: 100vw;">
        <nav class="position-fixed h-100 border-end" style="width: 20vw;">
            <div class="ps-5 pt-3">
                <h1>BNEC</h1>
            </div>
    
            <div class="">
                <div class="pe-5 m-0 fw-semibold">
                    <a href="" class="text-decoration-none m-0"><p class="text-dark ps-5 pt-3 pb-3 m-0">Dashboard</p></a>
                    <a href="/users" class="text-decoration-none m-0"><p class="text-dark ps-5 pt-3 pb-3 m-0">User</p></a>
                    <a href="/participants" class="text-decoration-none m-0"><p class="text-dark ps-5 pt-3 pb-3 m-0">Participant</p></a>
                    <a href="" class="text-decoration-none m-0"><p class="text-dark ps-5 pt-3 pb-3 m-0">Payment</p></a>
                    <a href="/competitions" class="text-decoration-none m-0"><p class="text-light rounded-end ps-5 pt-3 pb-3 m-0" style="background-color: #3A3A3C;">Competition</p></a>
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
    
        <main class="w-100 p-3 mt-5" style="margin-left: 21vw;">
            <div class="d-flex justify-content-between">
                <h3 class="fw-bold">Competitions List</h3>
                <div class="pe-5">
                    <button class="text-decoration-none text-dark rounded ps-5 pe-5 pt-2 pb-2 fw-semibold" data-bs-toggle="modal" data-bs-target="#addCompetition" style="background-color: #F8F9FA;border-width: 1px;border-color: #DEE2E6;">Add new competition</button>
                </div>
            </div>

            <section>
                <div class="modal fade" id="addCompetition" tabindex="-1" aria-labelledby="addCompetitionModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content p-3">
                            <form method="POST" action="{{ route('competitions.store') }}" enctype="multipart/form-data">
                                <div class="modal-body">
                                    <h2 class="mt-3 mb-5 fw-bold">Add New Competition</h2>
                                    @csrf
                                    <div class="row mb-3">
                                        <label for="name" class="col-3 fw-semibold">Name</label>
                                        <input type="text" name="name" id="name" class="rounded col-8" style="border-width: 1px;">
                                    </div>
                                    <div class="row mb-3">
                                        <label for="category" class="col-3 fw-semibold">Category</label>
                                        <input type="text" name="category" id="category" class="rounded col-8" style="border-width: 1px;">
                                    </div>
                                    <div class="row mb-3">
                                        <label for="category_init" class="col-3 fw-semibold">Category Initial</label>
                                        <input type="text" name="category_init" id="category_init" class="rounded col-8" style="border-width: 1px;">
                                    </div>
                                    <div class="row mb-3">
                                        <label for="content" class="col-3 fw-semibold">About</label>
                                        <textarea name="content" id="content" cols="30" rows="8" class="rounded col-8" style="border-width: 1px;"></textarea>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="registrationFee" class="col-3 fw-semibold">Registration Fee</label>
                                        <div class="col-8 p-0 m-0">
                                            <p class="fw-semibold">Early Bird</p>
                                            <input type="text" name="early_price" id="early_price" class="rounded w-100 mb-3 ps-3" style="border-width: 1px;" placeholder="IDR">
                                            <p class="fw-semibold">Normal Price</p>
                                            <input type="text" name="normal_price" id="normal_price" class="rounded w-100 ps-3" style="border-width: 1px;" placeholder="IDR">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="registrationQuota" class="col-3 fw-semibold">Registration Quota</label>
                                        <div class="col-8 p-0 m-0">
                                            <p class="fw-semibold">Early Bird</p>
                                            <input type="text" name="early_quota" id="early_quota" class="rounded w-100 mb-3 ps-3" style="border-width: 1px;">
                                            <p class="fw-semibold">Normal Quota</p>
                                            <input type="text" name="normal_quota" id="normal_quota" class="rounded w-100 ps-3" style="border-width: 1px;">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="group" class="col-3 fw-semibold">Group Link</label>
                                        <input type="text" name="link_group" id="link_group" class="rounded col-8" style="border-width: 1px;">
                                    </div>
                                    <div class="row mb-3">
                                        <label for="rules" class="fw-semibold col-3">Rules</label>
                                        <div class="col-8 p-0 m-0">
                                            <a href="#addRules" style="color: #EE8143;" data-bs-toggle="modal">Click here to add rules</a>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="rounds" class="fw-semibold col-3">Rounds</label>
                                        <div class="col-8 p-0 m-0">
                                            <a href="#addRounds" style="color: #EE8143;" data-bs-toggle="modal">Click here to edit rounds</a>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="formFile" class="form-label fw-semibold col-3">E-Booklet</label>
                                        <div class="col-8 p-0 m-0">
                                            <input type="file" class="form-control" style="width: w-100;" for="ebooklet" name="ebooklet">
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between mt-5">
                                        <button href="" data-bs-dismiss="modal" type="button" class="btn text-light bg-dark rounded fw-semibold col-4 pt-2 pb-2">Cancel</button>
                                        <button type="submit" class="btn text-light rounded fw-semibold col-7 pt-2 pb-2" style="background-color: #EE8143;" data-bs-toggle="modal">Add Competition</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            
            <div class="modal fade" id="addRules" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content p-3">
                    <div class="modal-body">
                    <h2 class="fw-bold mt-5 mb-5">Edit Rules</h2>
                    <p class="fw-bold fs-5">General Rules</p>
                    <textarea name="generalRules" id="generalRules" cols="100" rows="10" class="rounded mb-3 w-100" style="border-width: 1px;"></textarea>

                    <p class="fw-bold fs-5">Technical Rules</p>
                    <textarea name="generalRules" id="generalRules" cols="100" rows="10" class="rounded mb-3 w-100" style="border-width: 1px;"></textarea>

                    <div class="d-flex justify-content-between mt-5">
                        <button href="#addCompetition" data-bs-toggle="modal" type="button" class="btn text-light bg-dark rounded fw-semibold col-4 pt-2 pb-2">Cancel</button>
                        <button href="#addCompetition" type="button" class="btn text-light rounded fw-semibold col-7 pt-2 pb-2" style="background-color: #EE8143;" data-bs-toggle="modal">Save Changes</button>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            <div class="modal fade" id="addRounds" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content p-3">
                    <div class="modal-body">
                    <h2 class="fw-bold mt-5 mb-5">Edit Rounds</h2>
                    <input type="text" name="rounds" id="rounds" class="rounded mb-3 w-100" style="border-width: 1px;">
                    <textarea name="roundDesc" id="roundDesc" cols="100" rows="8" class="rounded mb-3 w-100" style="border-width: 1px;"></textarea>

                    <input type="text" name="rounds" id="rounds" class="rounded mb-3 w-100" style="border-width: 1px;">
                    <textarea name="roundDesc" id="roundDesc" cols="100" rows="8" class="rounded mb-3 w-100" style="border-width: 1px;"></textarea>

                    <input type="text" name="rounds" id="rounds" class="rounded mb-3 w-100" style="border-width: 1px;">
                    <textarea name="roundDesc" id="roundDesc" cols="100" rows="8" class="rounded mb-3 w-100" style="border-width: 1px;"></textarea>

                    <div class="d-flex justify-content-between mt-5">
                        <button href="#addCompetition" data-bs-toggle="modal" type="button" class="btn text-light bg-dark rounded fw-semibold col-4 pt-2 pb-2">Cancel</button>
                        <button href="#addCompetition" type="button" class="btn text-light rounded fw-semibold col-7 pt-2 pb-2" style="background-color: #EE8143;" data-bs-toggle="modal">Save Changes</button>
                    </div>
                    </div>
                </div>
                </div>
            </div>

            <section>
                <div class="modal fade" id="addSuccess" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-sm">
                    <div class="modal-content p-3">
                        <div class="modal-body">
                            <div class="d-flex align-items-center justify-content-center">
                                <i class="bi bi-patch-check-fill" style="color: #EE8143;font-size: 100px;"></i>
                            </div>
                            <p class="fw-bold text-center mt-3">Competition has been added successfully!</p>
                            <button data-bs-dismiss="modal" type="button" class="btn text-light rounded fw-semibold col-12 pt-2 pb-2 mt-3" style="background-color: #EE8143;">Close</a>
                        </div>
                    </div>
                    </div>
                </div>
            </section>


            {{-- COMPETITION CARDS --}}
            <div class="d-flex justify-content-evenly mt-5">
                @foreach($competitions as $competition)
                    @if($competition->id <= 3)
                        <div class="rounded shadow" style="width: 15vw;height: 40vh;cursor: pointer;">
                            <div class="bg-dark rounded-top h-50"></div>
                            <div class="p-3" data-bs-toggle="modal" data-bs-target="#competitionDetails">
                                <div class="d-flex justify-content-between">
                                    <p class="fw-semibold">{{ $competition->name }}</p>
                                    <button class="text-decoration-none text-dark rounded ps-3 pe-3 fw-semibold" data-bs-toggle="modal" data-bs-target="#deleteCompetition{{ $competition->id }}" style="background-color: #F8F9FA;border-width: 1px;border-color: #DEE2E6;font-size: 12px;height: 3vh;">Delete</button>
                                </div> 

                                <div class="d-flex m-0 p-0">
                                    <i class="bi bi-people"></i>
                                    <p style="color: #7B7B7B;">
                                    @if($competition->id === 1)
                                        1 team
                                    @else
                                        1 person
                                    @endif
                                    </p>
                                </div>
                                
                                <div class="fs-5 fw-semibold mt-2">{{ $competition->early_price }}</div>
                            </div>

                            <section>
                                <div class="modal fade" id="deleteCompetition{{ $competition->id }}" tabindex="-1" aria-labelledby="deleteCompetitionModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-md">
                                    <div class="modal-content p-3">
                                        <form action="{{ route('competitions.destroy', $competition->id) }}" method="POST">
                                            <div class="modal-body">
                                                @csrf
                                                @method('DELETE')
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-exclamation-circle" style="color: #EE8143;font-size: 50px;"></i>
                                                </div>
                                                <p class="fw-bold text-center mt-3">Are you sure to delete this competition?</p>
                    
                                                <div class="d-flex justify-content-between gap-3 mt-5 me-3">
                                                    <button type="button" class="btn bg-dark text-light col-6 fw-semibold" data-bs-dismiss="modal">Cancel</button>    
                                                    <button type="submit" class="btn text-light fw-semibold col-6" style="background-color: #EE8143;" data-bs-dismiss="modal">Confirm</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </section>

                            <section>
                                <div class="modal fade" id="competitionDetails" tabindex="-1" aria-labelledby="competitionDetailsModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content p-3">
                                            <div class="modal-body">
                                                <h2 class="fw-bold">Competition Details</h2>
                                                <table class="mt-4">
                                                    <tr>
                                                        <td class="fw-semibold col-3 pb-3">Name</td>
                                                        <td class="col-7 pb-3">{{ $competition->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold align-top col-3 pb-3">About</td>
                                                        <td class="align-top col-7 pb-3">{{ $competition->content }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold col-3 pb-3">Registration Fee</td>
                                                        <td class="col-7 pb-3">{{ $competition->early_price }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold col-3 pb-3">Group Link</td>
                                                        <td class="col-7 pb-3"> <a href="">{{ $competition->link_group }}</a> </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold col-3 pb-3">Rules</td>
                                                        <td class="col-7 pb-3"> <a href="#rules" data-bs-toggle="modal" style="color: #EE8143;">Click here to see the rules</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold col-3 pb-3">Rounds</td>
                                                        <td class="col-7 pb-3"><a href="#competitionRounds" data-bs-toggle="modal" style="color: #EE8143;">Click here to see the rounds detail</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold col-3 pb-3">E-Booklet</td>
                                                        <td class="col-7 pb-3"><a href="" style="color: #EE8143;">{{ $competition->ebooklet }}</a></td>
                                                    </tr>
                                                </table>
                                                    
                                                <div class="d-flex justify-content-between mt-5">
                                                    <button type="button" class="btn text-light bg-dark rounded fw-semibold col-4 pt-2 pb-2" data-bs-dismiss="modal">Cancel</button>
                                                    <button href="#editCompetition" type="button" class="btn text-light rounded fw-semibold col-7 pt-2 pb-2" style="background-color: #EE8143;" data-bs-toggle="modal">Edit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            
                            <section>
                                <div class="modal fade" id="rules" tabindex="-1" aria-labelledby="rulesModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content p-3">
                                        <div class="modal-body">
                                        <h2 class="fw-bold mt-5 mb-5">Rules</h2>
                                        <p class="fw-bold fs-5">General Rules</p>
                                        <div class="mb-3 p-3">
                                            <p>1. A registered participant CANNOT be replaced.</p>
                                            <p>2. All competition rules are binding, absolute, and might be altered, added, or eliminated by the committees if necessary. Participants who don’t abide by the rules will be DISQUALIFIED.</p>
                                            <p>3. Competitions MUST be done in English. Competition content MUST NOT conduct discrimination against SARA nor contain graphic sexual content or any form of profanity.</p>
                                            <p>4. Every participant SHOULD be re-registered before the Opening Ceremony starts on day 1, before the competition starts on day 2, and before the finals begin on day 3. They are recommended to stand by in the Zoom meeting 30 minutes before the competition’s scheduled start.</p>
                                            <p>5. For live rounds, every participant SHOULD stand by in the chatroom 30 minutes before their performance. The participant’s performance will be recorded to avoid any misjudgment from a bad connection. All participants MUST consent that their activity is recorded during the event.</p>
                                            <p>6. Every participant or representative MUST attend the Technical Meeting on November XX, 2022.</p>
                                            <p>7. Participants are highly recommended to attend the Coaching Clinic as their privilege to learn some tips and tricks regarding the rounds that our judges will bring.</p>
                                            <p>8. Participants who don’t attend the Technical Meeting and Coaching Clinic WON’T BE GUARANTEED to get further information from the committee outside those sessions. If participants cannot attend, they MUST inform the committee regarding their absence and will receive written notes of the event after it is finished.</p>
                                            <p>9. The committee WILL call every participant 3 times when their turns come before it is considered a walkout.</p>
                                            <p>10. Judges MAY, at their discretion, deduct 3 points from the total score in one round for violation of rules (except for timing). Judges MAY also disqualify participants for gross misconduct or ineligibility.</p>
                                            <p>11. Participants are suggested to upload their work one day before the due date to avoid any sudden problems with the internet connection or other situations.</p>
                                            <p>12. The NEO 2022 committee is NOT RESPONSIBLE for any internet issues or other issues/disturbances suffered by the participants or judges throughout the competition.</p>
                                            <p>13. All participants SHOULD respect and appreciate every judgment from the judges.</p>
                                            <p>14. All judge’s decisions and results are considered FINAL.</p>
                                            <p>15. The registration fee will no longer be REFUNDABLE if the registrant has received an invoice and confirmation email. (If a registrant decides to walk out, the registration fee that has been paid cannot be returned).</p>
                                        </div>
            
                                        <p class="fw-bold fs-5">Technical Rules</p>
                                        <div class="mb-3 p-3">
                                            <p>1. The Zoom link for the competition will be sent to the participants via email and WhatsApp group one day before the D-Day of the competition round</p>
                                            <p>2. The Debate competition will use the British Parliamentary System. Each team will consist of 2 debaters</p>
                                            <p>3. Participants must use English during the competition. The speech must not conduct discrimination against SARA nor contain graphic sexual content. Participants must not include any form of profanity</p>
                                            <p>4. Participants must attend the Technical Meeting and highly recommend attending the Coaching Clinic to learn some tips and tricks from the debate adjudicator</p>
                                            <p>5. Participants who don’t attend the Technical Meeting and Coaching Clinic won't be guaranteed to receive further information from the committee after those sessions</p>
                                        </div>
            
                                        <div class="d-flex justify-content-center align-items-center">
                                            <button href="#competitionDetails" data-bs-toggle="modal" type="button" class="btn text-light bg-dark rounded fw-semibold col-4 pt-2 pb-2">Back</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </section>
                            
                            <section>
                                <div class="modal fade" id="competitionRounds" tabindex="-1" aria-labelledby="competitionRoundsModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content p-3">
                                            <div class="modal-body">
                                                <h2 class="fw-bold mt-5 mb-5">Rounds</h2>
                                                <p class="fw-bold fs-5 p-3">Pre-eliminary</p>
                                                <div class="mb-3 p-3">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sollicitudin massa ac enim porta tincidunt. Nunc ultricies venenatis ipsum, eu consequat ligula tristique id. Quisque ullamcorper vitae sapien sed blandit. Curabitur euismod arcu sit amet finibus pharetra. Fusce auctor metus sit amet nulla facilisis, et tincidunt est cursus. Nullam porttitor congue velit id fermentum. Quisque non sem dapibus metus</p>
                                                </div>
                
                                                <p class="fw-bold fs-5 p-3">Semifinal</p>
                                                <div class="mb-3 p-3">
                                                    <p>Donec laoreet, nisi sed mollis auctor, erat leo commodo mauris, at consequat turpis nisi et quam. In hac habitasse platea dictumst. In iaculis, massa eu fringilla laoreet, leo tellus interdum augue, tincidunt posuere nunc nulla vitae augue. Pellentesque laoreet urna et ligula hendrerit, sit amet ultrices orci commodo.</p>
                                                </div>
                
                                                <p class="fw-bold fs-5 p-3">Final</p>
                                                <div class="mb-3 p-3">
                                                    <p>Nulla vitae sagittis erat. Aliquam sollicitudin lobortis dolor at sagittis. Maecenas ultrices scelerisque tellus, at iaculis turpis ultricies sit amet. Ut a facilisis erat. Morbi tempus ultrices tortor. Cras fringilla quis ante nec cursus. Integer vel gravida neque. Nam sed felis massa. Integer in luctus ex.</p>
                                                </div>
                
                                                <div class="d-flex justify-content-center align-items-center">
                                                <button href="#competitionDetails" data-bs-toggle="modal" type="button" class="btn text-light bg-dark rounded fw-semibold col-4 pt-2 pb-2">Back</button>
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </section>
                                    
                            <section>
                                <div class="modal fade" id="editCompetition" tabindex="-1" aria-labelledby="editCompetitionModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content p-3">
                                        <form method="POST" action="{{ route('competitions.update', $competition->id) }}" enctype="multipart/form-data" class="overflow-auto">
                                        <div class="modal-body">
                                            <h2 class="mt-3 mb-5 fw-bold">Edit Competition</h2>
                                            <div class="row mb-3">
                                                <label for="name" class="col-3 fw-semibold">Name</label>
                                                <input type="text" name="name" id="name" class="rounded col-8" style="border-width: 1px;">
                                            </div>
                                            <div class="row mb-3">
                                                <label for="about" class="col-3 fw-semibold">About</label>
                                                <textarea name="content" id="content" cols="30" rows="8" class="rounded col-8" style="border-width: 1px;"></textarea>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="fee" class="col-3 fw-semibold">Registration Fee</label>
                                                <div class="col-8 p-0 m-0">
                                                    <p class="fw-semibold">Early Bird</p>
                                                    <input type="text" name="early_price" id="early_price" class="rounded w-100 mb-3 ps-3" style="border-width: 1px;" placeholder="IDR">
                                                    <p class="fw-semibold">Normal Price</p>
                                                    <input type="text" name="normal_price" id="normal_price" class="rounded w-100 ps-3" style="border-width: 1px;" placeholder="IDR">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="group" class="col-3 fw-semibold">Group Link</label>
                                                <input type="text" name="group_link" id="group_link" class="rounded col-8" style="border-width: 1px;">
                                            </div>
                                            <div class="row mb-3">
                                                <label for="formFile" class="form-label fw-semibold col-3">E-Booklet</label>
                                                <div class="col-8 p-0 m-0">
                                                    <input id="ebooklet" name="ebooklet" type="file" class="form-control" style="width: w-100;">
                                                </div>
                                            </div>
            
                                            <div class="d-flex justify-content-between mt-5">
                                                <button href="#competitionDetails" data-bs-toggle="modal" type="button" class="btn text-light bg-dark rounded fw-semibold col-4 pt-2 pb-2">Cancel</button>
                                                @method('PUT')
                                                <button href="#editConfirmation" type="submit" class="btn text-light rounded fw-semibold col-7 pt-2 pb-2" style="background-color: #EE8143;" data-bs-toggle="modal">Save Changes</button>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </section>
                            
                            <section>
                                <div class="modal fade" id="editConfirmation" tabindex="-1" aria-labelledby="editConfirmationModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-md">
                                    <div class="modal-content p-3">
                                        <div class="modal-body">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <i class="bi bi-patch-check-fill" style="color: #EE8143;font-size: 100px;"></i>
                                            </div>
                                            <p class="fw-bold text-center">Data has been saved successfully!</p>
                                            <button data-bs-dismiss="modal" type="button" class="btn text-light rounded fw-semibold col-12 pt-2 pb-2" style="background-color: #EE8143;">Close</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    @endif
                @endforeach
            </div>
            
            <div class="d-flex justify-content-evenly mt-5">
                @foreach($competitions as $competition)
                    @if($competition->id >= 4)
                        <div class="rounded shadow" style="width: 15vw;height: 40vh;cursor: pointer;">
                            <div class="bg-dark rounded-top h-50"></div>
                            <div class="p-3" data-bs-toggle="modal" data-bs-target="#competitionDetails">
                                <div class="d-flex justify-content-between">
                                    <p class="fw-semibold">{{ $competition->name }}</p>
                                    <button class="text-decoration-none text-dark rounded ps-3 pe-3 fw-semibold" data-bs-toggle="modal" data-bs-target="#deleteCompetition{{ $competition->id }}" style="background-color: #F8F9FA;border-width: 1px;border-color: #DEE2E6;font-size: 12px;height: 3vh;">Delete</button>
                                </div> 

                                <div class="d-flex m-0 p-0">
                                    <i class="bi bi-people"></i>
                                    <p style="color: #7B7B7B;">
                                    1 person
                                    </p>
                                </div>
                                
                                <div class="fs-5 fw-semibold mt-2">{{ $competition->early_price }}</div>
                            </div>

                            <section>
                                <div class="modal fade" id="deleteCompetition{{ $competition->id }}" tabindex="-1" aria-labelledby="deleteCompetitionModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-md">
                                    <div class="modal-content p-3">
                                        <form action="{{ route('competitions.destroy', $competition->id) }}" method="POST">
                                            <div class="modal-body">
                                                @csrf
                                                @method('DELETE')
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <i class="bi bi-exclamation-circle" style="color: #EE8143;font-size: 50px;"></i>
                                                </div>
                                                <p class="fw-bold text-center mt-3">Are you sure to delete this competition?</p>
                    
                                                <div class="d-flex justify-content-between gap-3 mt-5 me-3">
                                                    <button type="button" class="btn bg-dark text-light col-6 fw-semibold" data-bs-dismiss="modal">Cancel</button>    
                                                    <button type="submit" class="btn text-light fw-semibold col-6" style="background-color: #EE8143;" data-bs-dismiss="modal">Confirm</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                            </section>

                            <section>
                                <div class="modal fade" id="competitionDetails" tabindex="-1" aria-labelledby="competitionDetailsModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content p-3">
                                            <div class="modal-body">
                                                <h2 class="fw-bold">Competition Details</h2>
                                                <table class="mt-4">
                                                    <tr>
                                                        <td class="fw-semibold col-3 pb-3">Name</td>
                                                        <td class="col-7 pb-3">{{ $competition->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold align-top col-3 pb-3">About</td>
                                                        <td class="align-top col-7 pb-3">{{ $competition->content }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold col-3 pb-3">Registration Fee</td>
                                                        <td class="col-7 pb-3">{{ $competition->early_price }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold col-3 pb-3">Group Link</td>
                                                        <td class="col-7 pb-3"> <a href="">{{ $competition->link_group }}</a> </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold col-3 pb-3">Rules</td>
                                                        <td class="col-7 pb-3"> <a href="#rules" data-bs-toggle="modal" style="color: #EE8143;">Click here to see the rules</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold col-3 pb-3">Rounds</td>
                                                        <td class="col-7 pb-3"><a href="#competitionRounds" data-bs-toggle="modal" style="color: #EE8143;">Click here to see the rounds detail</a></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="fw-semibold col-3 pb-3">E-Booklet</td>
                                                        <td class="col-7 pb-3"><a href="" style="color: #EE8143;">{{ $competition->ebooklet }}</a></td>
                                                    </tr>
                                                </table>
                                                    
                                                <div class="d-flex justify-content-between mt-5">
                                                    <button type="button" class="btn text-light bg-dark rounded fw-semibold col-4 pt-2 pb-2" data-bs-dismiss="modal">Cancel</button>
                                                    <button href="#editCompetition" type="button" class="btn text-light rounded fw-semibold col-7 pt-2 pb-2" style="background-color: #EE8143;" data-bs-toggle="modal">Edit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            
                            <section>
                                <div class="modal fade" id="rules" tabindex="-1" aria-labelledby="rulesModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content p-3">
                                        <div class="modal-body">
                                        <h2 class="fw-bold mt-5 mb-5">Rules</h2>
                                        <p class="fw-bold fs-5">General Rules</p>
                                        <div class="mb-3 p-3">
                                            <p>1. A registered participant CANNOT be replaced.</p>
                                            <p>2. All competition rules are binding, absolute, and might be altered, added, or eliminated by the committees if necessary. Participants who don’t abide by the rules will be DISQUALIFIED.</p>
                                            <p>3. Competitions MUST be done in English. Competition content MUST NOT conduct discrimination against SARA nor contain graphic sexual content or any form of profanity.</p>
                                            <p>4. Every participant SHOULD be re-registered before the Opening Ceremony starts on day 1, before the competition starts on day 2, and before the finals begin on day 3. They are recommended to stand by in the Zoom meeting 30 minutes before the competition’s scheduled start.</p>
                                            <p>5. For live rounds, every participant SHOULD stand by in the chatroom 30 minutes before their performance. The participant’s performance will be recorded to avoid any misjudgment from a bad connection. All participants MUST consent that their activity is recorded during the event.</p>
                                            <p>6. Every participant or representative MUST attend the Technical Meeting on November XX, 2022.</p>
                                            <p>7. Participants are highly recommended to attend the Coaching Clinic as their privilege to learn some tips and tricks regarding the rounds that our judges will bring.</p>
                                            <p>8. Participants who don’t attend the Technical Meeting and Coaching Clinic WON’T BE GUARANTEED to get further information from the committee outside those sessions. If participants cannot attend, they MUST inform the committee regarding their absence and will receive written notes of the event after it is finished.</p>
                                            <p>9. The committee WILL call every participant 3 times when their turns come before it is considered a walkout.</p>
                                            <p>10. Judges MAY, at their discretion, deduct 3 points from the total score in one round for violation of rules (except for timing). Judges MAY also disqualify participants for gross misconduct or ineligibility.</p>
                                            <p>11. Participants are suggested to upload their work one day before the due date to avoid any sudden problems with the internet connection or other situations.</p>
                                            <p>12. The NEO 2022 committee is NOT RESPONSIBLE for any internet issues or other issues/disturbances suffered by the participants or judges throughout the competition.</p>
                                            <p>13. All participants SHOULD respect and appreciate every judgment from the judges.</p>
                                            <p>14. All judge’s decisions and results are considered FINAL.</p>
                                            <p>15. The registration fee will no longer be REFUNDABLE if the registrant has received an invoice and confirmation email. (If a registrant decides to walk out, the registration fee that has been paid cannot be returned).</p>
                                        </div>
            
                                        <p class="fw-bold fs-5">Technical Rules</p>
                                        <div class="mb-3 p-3">
                                            <p>1. The Zoom link for the competition will be sent to the participants via email and WhatsApp group one day before the D-Day of the competition round</p>
                                            <p>2. The Debate competition will use the British Parliamentary System. Each team will consist of 2 debaters</p>
                                            <p>3. Participants must use English during the competition. The speech must not conduct discrimination against SARA nor contain graphic sexual content. Participants must not include any form of profanity</p>
                                            <p>4. Participants must attend the Technical Meeting and highly recommend attending the Coaching Clinic to learn some tips and tricks from the debate adjudicator</p>
                                            <p>5. Participants who don’t attend the Technical Meeting and Coaching Clinic won't be guaranteed to receive further information from the committee after those sessions</p>
                                        </div>
            
                                        <div class="d-flex justify-content-center align-items-center">
                                            <button href="#competitionDetails" data-bs-toggle="modal" type="button" class="btn text-light bg-dark rounded fw-semibold col-4 pt-2 pb-2">Back</button>
                                        </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </section>
                            
                            <section>
                                <div class="modal fade" id="competitionRounds" tabindex="-1" aria-labelledby="competitionRoundsModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                        <div class="modal-content p-3">
                                            <div class="modal-body">
                                                <h2 class="fw-bold mt-5 mb-5">Rounds</h2>
                                                <p class="fw-bold fs-5 p-3">Pre-eliminary</p>
                                                <div class="mb-3 p-3">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin sollicitudin massa ac enim porta tincidunt. Nunc ultricies venenatis ipsum, eu consequat ligula tristique id. Quisque ullamcorper vitae sapien sed blandit. Curabitur euismod arcu sit amet finibus pharetra. Fusce auctor metus sit amet nulla facilisis, et tincidunt est cursus. Nullam porttitor congue velit id fermentum. Quisque non sem dapibus metus</p>
                                                </div>
                
                                                <p class="fw-bold fs-5 p-3">Semifinal</p>
                                                <div class="mb-3 p-3">
                                                    <p>Donec laoreet, nisi sed mollis auctor, erat leo commodo mauris, at consequat turpis nisi et quam. In hac habitasse platea dictumst. In iaculis, massa eu fringilla laoreet, leo tellus interdum augue, tincidunt posuere nunc nulla vitae augue. Pellentesque laoreet urna et ligula hendrerit, sit amet ultrices orci commodo.</p>
                                                </div>
                
                                                <p class="fw-bold fs-5 p-3">Final</p>
                                                <div class="mb-3 p-3">
                                                    <p>Nulla vitae sagittis erat. Aliquam sollicitudin lobortis dolor at sagittis. Maecenas ultrices scelerisque tellus, at iaculis turpis ultricies sit amet. Ut a facilisis erat. Morbi tempus ultrices tortor. Cras fringilla quis ante nec cursus. Integer vel gravida neque. Nam sed felis massa. Integer in luctus ex.</p>
                                                </div>
                
                                                <div class="d-flex justify-content-center align-items-center">
                                                <button href="#competitionDetails" data-bs-toggle="modal" type="button" class="btn text-light bg-dark rounded fw-semibold col-4 pt-2 pb-2">Back</button>
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                            </section>
                                    
                            <section>
                                <div class="modal fade" id="editCompetition" tabindex="-1" aria-labelledby="editCompetitionModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content p-3">
                                        <form method="POST" action="{{ route('competitions.update', $competition->id) }}" enctype="multipart/form-data" class="overflow-auto">
                                        <div class="modal-body">
                                            <h2 class="mt-3 mb-5 fw-bold">Edit Competition</h2>
                                            <div class="row mb-3">
                                                <label for="name" class="col-3 fw-semibold">Name</label>
                                                <input type="text" name="name" id="name" class="rounded col-8" style="border-width: 1px;">
                                            </div>
                                            <div class="row mb-3">
                                                <label for="about" class="col-3 fw-semibold">About</label>
                                                <textarea name="content" id="content" cols="30" rows="8" class="rounded col-8" style="border-width: 1px;"></textarea>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="fee" class="col-3 fw-semibold">Registration Fee</label>
                                                <div class="col-8 p-0 m-0">
                                                    <p class="fw-semibold">Early Bird</p>
                                                    <input type="text" name="early_price" id="early_price" class="rounded w-100 mb-3 ps-3" style="border-width: 1px;" placeholder="IDR">
                                                    <p class="fw-semibold">Normal Price</p>
                                                    <input type="text" name="normal_price" id="normal_price" class="rounded w-100 ps-3" style="border-width: 1px;" placeholder="IDR">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="group" class="col-3 fw-semibold">Group Link</label>
                                                <input type="text" name="group_link" id="group_link" class="rounded col-8" style="border-width: 1px;">
                                            </div>
                                            <div class="row mb-3">
                                                <label for="formFile" class="form-label fw-semibold col-3">E-Booklet</label>
                                                <div class="col-8 p-0 m-0">
                                                    <input id="ebooklet" name="ebooklet" type="file" class="form-control" style="width: w-100;">
                                                </div>
                                            </div>
            
                                            <div class="d-flex justify-content-between mt-5">
                                                <button href="#competitionDetails" data-bs-toggle="modal" type="button" class="btn text-light bg-dark rounded fw-semibold col-4 pt-2 pb-2">Cancel</button>
                                                @method('PUT')
                                                <button href="#editConfirmation" type="submit" class="btn text-light rounded fw-semibold col-7 pt-2 pb-2" style="background-color: #EE8143;" data-bs-toggle="modal">Save Changes</button>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </section>
                            
                            <section>
                                <div class="modal fade" id="editConfirmation" tabindex="-1" aria-labelledby="editConfirmationModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered modal-md">
                                    <div class="modal-content p-3">
                                        <div class="modal-body">
                                            <div class="d-flex align-items-center justify-content-center">
                                                <i class="bi bi-patch-check-fill" style="color: #EE8143;font-size: 100px;"></i>
                                            </div>
                                            <p class="fw-bold text-center">Data has been saved successfully!</p>
                                            <button data-bs-dismiss="modal" type="button" class="btn text-light rounded fw-semibold col-12 pt-2 pb-2" style="background-color: #EE8143;">Close</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    @endif
                @endforeach
            </div>
        </main>
      </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
