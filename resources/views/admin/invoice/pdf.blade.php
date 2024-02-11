<html>
<head>
    <style>
        body {
            font-size: 10px;
        }

        .invoice-table {
            border-collapse: collapse;
            width: 100%;
        }

        .bordered-table td {
            border-bottom: 1px solid #afafaf;
        }

        .invoice-table td, .invoice-table th {
            padding: 4px 3px 4px;
        }

        #total-table {
            margin-top: 30px;
        }

        .text-right {
            text-align: right !important;
        }

        .text-left {
            text-align: left !important;
        }

        .text-center {
            text-align: center !important;
        }

        .w-100 {
            width: 100% !important;
        }

        .w-65 {
            width: 65% !important;
        }

        .w-35 {
            width: 35% !important;
        }

        .w-50 {
            width: 50% !important;
        }

        .w-33 {
            width: 33.3% !important;
        }

        .w-30 {
            width: 30% !important;
        }

        .pt-10 {
            margin-top: 30px;
        }

        .row-title {
            font-weight: bold;
        }

        .row-value {
            color: #444;
        }

        .underline {
            text-decoration: underline;
        }

        .vertical-align-top {
            vertical-align: top;
        }

        .header-text-td {
            text-align: right;
            border-bottom: 1px solid #2798d2;
            font-size: 14pt; color: #494949;
        }

        .header-image-td {
            border-bottom: 1px solid #2798d2;
        }

        .table-top-title {
            background-color: #777;
            color: white;
            font-weight: bold;
        }

        .order-divider {
            background-color: #777;
            padding: 0;
            margin: 0;
        }

        .text-uppercase {
            text-transform: uppercase;
        }

        .text-danger {
            color: red;
        }
    </style>
</head>
<body>

<table class="invoice-table">
    <tbody>
    <tr>
        <td class="w-100 header-text-td">
            {{ $invoice->created_at }}
            <br/>
            {{ __('Reference') }}: <strong>{{ $invoice->reference }}</strong>
        </td>
    </tr>
    </tbody>
</table>

<table class="w-100">
    <tbody>
    <tr>
        <td class="w-33 vertical-align-top">
            <h3 class="text-center">{{ __('General Info') }}</h3>
            <table id="invoice-info-table" class="invoice-table">
                <tbody>
                <tr>
                    <td class="text-right w-50 row-title">{{ __('Invoice Date') }}:</td>
                    <td class="text-left w-50 row-value">{{ $invoice->created_at }}</td>
                </tr>
                <tr style="border-left: 1px solid #afafaf; border-top: 1px solid #afafaf; border-right: 1px solid #afafaf;">
                    <td class="text-right w-50 row-title">{{ __('Total') }}:</td>
                    <td class="text-left w-50 row-value">{{ number_format($invoice->getTotalPriceWithTax(), $invoice::PRICE_ROUNDING, '.', '') }}</td>
                </tr>
                <tr style="border-left: 1px solid #afafaf; border-bottom: 1px solid #afafaf; border-right: 1px solid #afafaf;">
                    <td class="text-right pt-10 w-50 row-title">{{ __('Payment Goal') }}:</td>
                    <td class="text-left w-50 row-value">{{ $invoice->reference }}</td>
                </tr>


                </tbody>
            </table>
        </td>


        <td class="w-33 vertical-align-top">
            <h3 class="text-center">PIEGĀDĀTĀJS</h3>
            <table id="company-table" class="invoice-table">
                <tbody>
                <tr>
                    <td class="text-right w-50 row-title">Uzņēmums:</td>
                    <td class="text-left w-50 row-value">{{ $invoice->provider_name }}</td>
                </tr>
                <tr>
                    <td class="text-right w-50 row-title">Reģ. Nr.:</td>
                    <td class="text-left w-50 row-value">{{ $invoice->provider_reg_number }}</td>
                </tr>
                <tr>
                    <td class="text-right w-50 row-title">PVN Nr.:</td>
                    <td class="text-left w-50 row-value">{{ $invoice->provider_vat_number }}</td>
                </tr>
                <tr>
                    <td class="text-right w-50 row-title">SWIFT:</td>
                    <td class="text-left w-50 row-value"></td>
                </tr>
                <tr>
                    <td class="text-right w-50 row-title">IBAN:</td>
                    <td class="text-left w-50 row-value"></td>
                </tr>
                </tbody>
            </table>
        </td>
        <td class="w-33 vertical-align-top">
            <h3 class="text-center">SAŅĒMĒJS</h3>
            <table id="company-table" class="invoice-table">
                <tbody>
                    <tr>
                        <td class="text-right row-title">Vārds, uzvārds:</td>
                        <td class="text-left row-value">{{ $invoice->client_name }}</td>
                    </tr>
                    <tr>
                        <td class="text-right row-title">E-pasts:</td>
                        <td class="text-left row-value">{{ $invoice->client_email }}</td>
                    </tr>
                    @if ($invoice->isLegalEntityInvoice())
                        <tr>
                            <td class="text-right row-title">Kompānija:</td>
                            <td class="text-left row-value">{{ $invoice->client_company }}</td>
                        </tr>
                        <tr>
                            <td class="text-right row-title">Reģistrācijas numurs:</td>
                            <td class="text-left row-value">{{ $invoice->client_reg_number }}</td>
                        </tr>

                        <tr>
                            <td class="text-right row-title">PVN numurs:</td>
                            <td class="text-left row-value">{{ $invoice->client_vat_number }}</td>
                        </tr>

                        <tr>
                            <td class="text-right row-title">SWIFT:</td>
                            <td class="text-left row-value">{{ $invoice->client_swift }}</td>
                        </tr>

                        <tr>
                            <td class="text-right row-title">IBAN:</td>
                            <td class="text-left row-value">{{ $invoice->client_iban }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </td>
    <tr>
    </tbody>
</table>


<table id="common-table" class="invoice-table bordered-table">
    <thead>
    <tr>
        <th class="table-top-title w-30">{{ __('Name') }}</th>
        <th class="table-top-title">{{ __('Price Tax Excl.') }}</th>
        <th class="table-top-title">{{ __('Tax Rate') }}</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($invoice->invoiceServices as $service)
            <tr>
                <td class="text-center">{{ $service->name }}</td>
                <td class="text-center">{{ number_format($service->price, $invoice::PRICE_ROUNDING, '.', '') }}</td>
                <td class="text-center">{{ $invoice->tax_rate }} %</td>
            </tr>
        @endforeach
    </tbody>
</table>

<table class="w-100">
    <tbody>
    <tr>
        <td class="w-65"></td>
        <td class="w-35">
            <table id="total-table" class="invoice-table bordered-table">
                <tbody>
                <tr>
                    <td class="w-50 text-left">Kopā bez PVN</td>
                    <td class="w-50 text-right">{{ number_format($invoice->getTotalPriceWithoutTax(), $invoice::PRICE_ROUNDING, '.', '') }}</td>
                </tr>
                <tr>
                    <td class="w-50 text-left">Kopā ar PVN</td>
                    <td class="w-50 text-right" style="background-color: #dddddd;"><strong>{{ number_format($invoice->getTotalPriceWithTax(), $invoice::PRICE_ROUNDING, '.', '') }}</strong></td>
                </tr>



                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>

</body>
</html>
