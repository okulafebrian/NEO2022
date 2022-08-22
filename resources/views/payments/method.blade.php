<x-user title="Payment Method">

    <div class="d-flex gap-2" style="margin-left: 8vw;margin-top: 12vh;">
        <p class="fw-semibold">Payment</p>
        <i class="bi bi-caret-right-fill"></i>
        <p class="fw-semibold" style="color: #EE8143;">Payment Confirmation</p>
    </div>

    <div class="d-sm-flex justify-content-between" style="margin: 0 8vw;">
        <div class="shadow rounded p-4 col-sm-4 h-50">
            <h3 class="fs-3 mb-3">Payment Method</h3>

            <form action="">
              <label for="paymentMethod" class="mb-2">Choose payment method</label>
              <br>

              <select name="paymentMethod" id="paymentMethod" class="mb-3 w-100">
                  <option value="selected">Select</option>
                  <option value="Bank Transfer">Bank Transfer</option>
                  <option value="Dana">DANA</option>
                  <option value="GoPay">GoPay</option>
                  <option value="OVO">OVO</option>
              </select>
              <br>

              <label for="accountName" class="mb-2">Account Name</label>
              <br>
              <input type="text" name="accountName" id="accountName" class="mb-3 w-100">
              <br>

              <label for="accountName" class="mb-2">Account Number</label>
              <br>
              <input type="text" name="accountNumber" id="accountNumber" class="mb-3 w-100">
              <br>

              <div class="d-grid">
                <a href="/payment-confirmation">
                  <button class="btn rounded text-light fw-bold w-100" style="background-color: #EE8143;">Continue</button>
                </a>
              </div>
            </form>
            
        </div>

        <div class="shadow rounded p-4 col-sm-7 mt-3 m-sm-0">
            <h3 class="fs-3">Payment Summary</h3>
            <div class="d-lg-flex justify-content-between mb-3">
                <div class="p-0 mb-3 m-lg-0">
                    <p class="mb-2">Invoice for</p>
                    <p class="fw-semibold p-0 m-0">Vincent Febrian</p>
                    <p class="p-0 m-0 mb-2">okulafebrian@gmail.com</p>
                </div>

                <div class="p-0 mb-3 m-lg-0">
                    <p class="mb-2">Payment Date</p>
                    <p class="fw-semibold">12 Sept 2022</p>
                </div>

                <div class="p-0 mb-3 m-lg-0">
                    <p class="mb-2">Invoice Number</p>
                    <p class="fw-semibold">087</p>
                </div>
            </div>

            <div class="overflow-auto">
              <table class="table table-striped">
                <thead>
                    <tr class="border-top">
                      <th scope="col">Name</th>
                      <th scope="col">Competition</th>
                      <th scope="col">Price(IDR)</th>
                    </tr>
                  </thead>

                  <tbody class="table-group-divider">
                    <tr>
                      <td>BINUS A</td>
                      <td>Debate</td>
                      <td>350.000</td>
                    </tr>
                    <tr>
                      <td>Shan Havilah</td>
                      <td>Short Story Writing</td>
                      <td>145.000</td>
                    </tr>
                    <tr>
                      <td>Michelle Angela</td>
                      <td>Podcast</td>
                      <td>145.000</td>
                    </tr>
                  </tbody>
              </table>
            </div>
          
            <div class="d-flex justify-content-between mt-3">
                <p class="fw-semibold">Total Payment</p>
                <h3 class="fs-5">IDR 640.000</h3>
            </div>
        </div>
    </div>

    <div class="h-25"></div>

</x-user>