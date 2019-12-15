<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice : Print</title>

    @include('shared.panel.style')

    <style>
        @media print {
            #printPageButton {
                display: none;
            }
        }
    </style>

</head>
<body>

    <div class="mt-3"></div>

    <div class="container">

        <div class="row">
            <div class="col-md-8">
                <h2>V-tech</h2>
                <p>(vie technology)</p>
            </div>
            <div class="col-md-4">
                <h2>Order Form/Bill</h2>
                <p>Office Copy</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <span>H # 1,B-Block,Revenue Society,Lahore,Pakistan<br></span>
                <span >ph:038329899898</span>
                <span style="padding-left: 14px;">Fax:042878788682</span><br>
                <span>Email:irfan@vtech.com.pk</span>
                <span style="padding-left: 14px;">Website:www.vtech.com.pk</span>
            </div>
            <div class="col-md-4">
                <span>Ont Date: {{$invoice->onDate}}</span><br>
                <span>Irv Date:</span><br>
                <span>Due Date: {{$invoice->dueDate}}</span><br>
                <span>imc#: {{$invoice->incNumber}}</span><br>
                <span>CT-:89398</span><br>
            </div>
        </div>

        <!--  print button  -->

        <button id="printPageButton" onClick="window.print();" class="btn btn-success">
            Print
        </button>

        <!--  ends print button  -->


        <div class="row mt-4">
            <div class="col-md-8">
                <p style="font-size: 20px;font-weight: bold">Customer Name:
                    <span>{{ $invoice->customer->customerName }}</span>
                </p>
                <p style="font-size: 20px;font-weight: bold">Customer Address:
                    <span>{{ $invoice->customer->customerAddress }}</span>
                </p>
            </div>
            <div class="col-md-4">
                @inject('qrcode', 'App\Custom\Barcode\Qrcode')
                {{ $qrcode->setCompanyName($invoice->inventory->companyName) }}
                {{ $qrcode->setItemNumber($invoice->inventory->itemNumber) }}
                {{ $qrcode->setAddress($invoice->customer->customerAddress) }}
                {!! $qrcode->generate_qrCode(90) !!}
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <p>Remarks: -----</p>
            </div>
            <div class="col-md-4">
                <p>Dispatch by: ----</p>
            </div>
        </div>

        <div>
            <table class="table table-bordered">
                <tr>
                    <th scope="col">SR#</th>
                    <th scope="col">Product Code</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Batch#</th>
                    <th scope="col">QTY</th>
                    <th scope="col">Unit Price</th>
                    <th scope="col">Disc Rs</th>
                    <th scope="col">GST</th>
                    <th scope="col">Total Rs</th>
                </tr>
                <tr>
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->inventory->itemNumber }}</td>
                    <td>{{ $invoice->inventory->itemName }}</td>
                    <td>{{ $invoice->batchNumber }}</td>
                    <td>{{ $invoice->qty }}</td>
                    <td>{{ $invoice->unitPrice }}</td>
                    <td>{{ $invoice->discount }}</td>
                    <td>17</td>
                    <td>{{ $invoice->finalPrice }}</td>
                </tr>
            </table>
        </div>

        <div class="row" style="margin-top: 15%">
            <div class="col-md-4">
                <span><b>Note:</b>Invoice Goods Not Returnable</span>
                <br>
                <br>
                <span>1.Account Title:V-TECH</span>
                <br>
                <span>Account # 0025-2000616461</span>
                <br>
                <span>Bank Name:SILK Bank</span>
                <h5 style="padding-top: 40px;"><b>Customer Signature</b></h5>
            </div>
            <div class="col-md-4">
                <span>2.Account Title:IRFAN SATTAR</span>
                <br>
                <span>Account # 0025-200061646</span>
                <br>
                <span>Bank Name:FAISAL Bank</span>
                <br>
                <br>
                <span>3.Account Title:IRFAN SATTAR</span>
                <br>
                <span>Account # 0025-200061646</span>
                <br>
                <span>Bank Name:FAISAL Bank</span>
                <h5><b>Prepared BY</b></h5>
            </div>
            <div class="col-md-4">
                <h5 style="padding-top: 0px;">Signature:</h5>
                <br>
                <br>
                <br>
                <br>
                <h6><b>IRFAN SATTAR</b></h6>
                <h5><b>CEO</b></h5>
            </div>
        </div>

        <div style="margin-top: 10%"></div>


    </div>


    @include('shared.panel.script')
</body>
</html>
