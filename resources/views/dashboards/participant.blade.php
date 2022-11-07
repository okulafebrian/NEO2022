<x-app title="Dashboard | NEO 2022">

    <x-slot name="navbarParticipant"></x-slot>

    <div class="container my-5" style="width:50rem">
        <div class="card card-custom bg-blue-100 rounded-4 mb-4">
            <div class="card-body">
                <div class="mb-5">
                    <h3 class="text-blue">Vaccination Proof</h3>
                    <p style="color: #6B8896">You haven’t uploaded your vaccination ceritificate</p>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-blue text-white btn-lg text-center">Upload</button>
                </div>
            </div>
        </div>

        <div class="card card-custom bg-purple-100 rounded-4">
            <div class="card-body">
                <div class="mb-5">
                    <h3 class="text-primary">Semifinal Re-Registration</h3>
                    <p style="color: #856C94">You haven't re-registered for the semifinal</p>
                </div>
                <div class="text-end">
                    <button type="button" class="btn btn-primary btn-lg text-center">Re-Register</button>
                </div>
            </div>
        </div>
    </div>
</x-app>
