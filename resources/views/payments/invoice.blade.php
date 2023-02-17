<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <style>
        * {
            font-family: "Segoe UI", Arial, sans-serif;
        }

        .container {
            padding: 2rem;
            color: #595959;
        }

        .border-text {
            padding: 1rem;
            border: 1px solid #8FF3F1;
            display: inline;
            position: absolute;
            bottom: 0;
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
        }

        .table-bank td {
            background: #FBE4D5;
            padding-left: .5rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <table style="margin-bottom: 1rem;">
            <tbody>
                <tr>
                    <td colspan="2">
                        <img src="{{ public_path().'/storage/images/assets/BNEC_color.png' }}" width="25%">
                    </td>
                </tr>
                <tr>
                    <td style="position: relative;">
                        <h2 class="border-text">PAYMENT RECEIPT</h2>
                    </td>
                    <td style="width: 30%">
                        <h3>BINUS ENGLISH CLUB</h3>
                        <p>Jl. U Blok D No. 10</p>
                        <p>Kemanggisan, Palmerah-Jakarta</p>
                        <p>11480</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div style="border-left: 4px solid #DFFBFB; padding-left: .75rem;">
                            <p>INVOICE TO:</p>
                            <p style="color: black;"><b>{{ strtoupper($payment->registration->user->name) }}</b></p>
                            <p style="color: black;"><b>{{ $payment->registration->user->email }}</b></p>
                            <p>Invoice ID – {{ str_pad($payment->id, 3, '0', STR_PAD_LEFT) }}</p>
                            <p>Time: {{ date('d-m-Y', strtotime($payment->created_at)) }}</p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="table-invoice" style="margin-bottom: 2rem;">
            <thead>
                <tr>
                    <th>NO</th>
                    <th>DESCRIPTION</th>
                    <th>PRICE</th>
                    <th>QUANTITY</th>
                    <th>TOTAL</th>
                </tr>
            </thead>
            <tbody>
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
                            Rp
                            {{ number_format($competition->registrations_count * $competition->price, 0, '.', '.') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" style="background-color: #F4B083">TOTAL</td>
                    <td style="background-color: #FFF2CC">
                        Rp {{ number_format($payment->amount, 0, '.', '.') }}
                    </td>
                </tr>
            </tfoot>
        </table>

        <p>The payment will be transferred to our Bank Account</p>

        <table class="table-bank" style="margin-bottom: 3rem;">
            <tbody>
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
            </tbody>
        </table>

        <div style="text-align: center;">
            <p>Approved By,</p>
            <img src="{{ public_path().'/storage/images/assets/ttd_wisnu.png' }}" width="20%">
            <p>Wisnu</p>
            <p>President of BINUS English Club</p>
        </div>
    </div>

</body>

</html>
