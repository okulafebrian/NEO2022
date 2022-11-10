<x-app title="Invoice {{ str_pad($payment->id, 3, '0', STR_PAD_LEFT) }} | NEO 2022">
    <style>
        .container {
            padding: 3rem 0 3rem 3rem;
            font-family: 'Tahoma', sans-serif;
            color: #595959;
        }

        .border-text {
            padding: 10px;
            border: 1px solid #8FF3F1;
            position: absolute;
            top: 10.5rem;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        .table-invoice {
            text-align: center;
        }

        .table-invoice td,
        .table-invoice th {
            border-bottom: 1px solid #ffffff;
            padding: .5rem;
            font-size: 13px;
        }

        .table-invoice .tbody td:nth-child(odd),
        .table-invoice th:nth-child(odd) {
            background: #8FF3F1;
        }

        .table-invoice .tbody td:nth-child(even),
        .table-invoice th:nth-child(even) {
            background: #BAF8F7;
        }

        .table-bank td,
        .table-bank th {
            border-bottom: 1px solid #ffffff;
            padding: .5rem .2rem;
            font-size: 13px;
        }

        .table-bank td {
            background: #FBE4D5;
        }
    </style>

    <div class="container">
        <table>
            <tr>
                <td colspan="2">
                    <img src="C:\xampp\htdocs\NEO2022\public\storage\images\assets\BNEC.png" alt="BNEC" width="25%">
                </td>
            </tr>
            <tr>
                <td>
                    <h3 class="border-text">PAYMENT RECEIPT</h3>
                </td>
                <td style="font-size: 13px;">
                    <div style="margin-left: 8rem;">
                        <h1 style="font-size: 14px;">BINUS ENGLISH CLUB</h1>
                        <p>Jl. U Blok D No. 10</p>
                        <p>Kemanggisan, Palmerah-Jakarta</p>
                        <p>11480</p>
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="font-size: 13px;">
                    <div style="border-left: 4px solid #DFFBFB; padding-left: .75rem; margin: 2rem 0;">
                        <p>INVOICE TO:</p>
                        <p style="color: black">{{ strtoupper($payment->registration->user->name) }}</p>
                        <p style="color: black">{{ $payment->registration->user->email }}</p>
                        <p>Invoice ID – {{ str_pad($payment->id, 3, '0', STR_PAD_LEFT) }}</p>
                        <p>Time: {{ date('d-m-Y', strtotime($payment->created_at)) }}</p>
                    </div>
                </td>
            </tr>
        </table>

        <table class="table-invoice" style="margin-bottom: 2rem;">
            <tr>
                <th>NO</th>
                <th>DESCRIPTION</th>
                <th>PRICE</th>
                <th>QUANTITY</th>
                <th>TOTAL</th>
            </tr>

            @foreach ($competitions as $key => $competition)
                <tr class="tbody">
                    <td style="width: 5%">{{ $key + 1 }}</td>
                    <td style="width: 50%">
                        PENDAFTARAN LOMBA
                        {{ $competition->name == 'Speech' ? strtoupper($competition->name . ' ' . $competition->category) : strtoupper($competition->name) }}
                        ({{ $competition->type != 'Normal' ? strtoupper($competition->type) : 'NORMAL' }})
                    </td>
                    <td>Rp {{ number_format($competition->price, 0, '.', '.') }}</td>
                    <td>{{ $competition->registrations_count }}</td>
                    <td>
                        Rp {{ number_format($competition->registrations_count * $competition->price, 0, '.', '.') }}
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="4" style="background-color: #F4B083">TOTAL</td>
                <td style="background-color: #FFF2CC">
                    Rp {{ number_format($payment->amount, 0, '.', '.') }}
                </td>
            </tr>
        </table>

        <p style="font-size: 13px;">The payment will be transferred to our Bank Account</p>

        <table class="table-bank" style="margin-bottom: 3rem;">
            <tr>
                <td style="width: 22%">Bank Name</td>
                <td>: BCA</td>
            </tr>
            <tr>
                <td style="width: 22%">Bank Account Number</td>
                <td>: 6891065016</td>
            </tr>
            <tr>
                <td style="width: 22%">Bank Account Name</td>
                <td>: Monica Audrey</td>
            </tr>
            <tr>
                <td style="width: 22%">Bank Address</td>
                <td>: Jl. Jend. Sudirman No.38, Sumurpecung, Kec. Serang, Kota Serang, Banten 42118</td>
            </tr>
        </table>

        <div style="font-size: 13px; text-align: center;">
            <p>Approved By,</p>
            <img src="" alt="" >
            <p>Wisnu</p>
            <p>President of BINUS English Club</p>
        </div>
    </div>
</x-app>
