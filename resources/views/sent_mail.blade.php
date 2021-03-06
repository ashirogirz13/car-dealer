<!DOCTYPE html>
<!-- saved from url=(0057)https://w3hubs.com/Simple-Invoice-Template-In-Bootstrap4/ -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Simple Invoice Template In Bootstrap 4</title>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css'>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js'></script>
<style type="text/css">
      @import url('https://fonts.googleapis.com/css?family=Raleway:300i,400,500,700&display=swap');
      body{
      padding:0;
      margin: 0;
      overflow-x: hidden;
      font-family: 'Raleway', sans-serif;
      }
      h5,h3{
      text-transform: capitalize;
      }
      img{
      max-width: 20%;
      }
      .b-t{
      border-top: 1px solid #ddd;
      }
      @media(max-width: 768px){
      .text-right{
      text-align: center !important;
      }
      .pull-right{
      float: none;
      text-align: center;
      }
      .center{
      text-align: center;
      }
      .bg-light.p-5:nth-child(1){
      padding: 1rem !important;
      }
      img{
      max-width: 30%;
      margin: 0 auto;
      display: block;
      }
      .p-5{
      padding: 1rem !important;
      }
      .text-right h5:nth-child(3){
      padding-top: 15px !important;
      }
      .pt-5{
      padding-top: 1rem!important
      }
      }
    </style>
</head>
<body>
    <div class="container">
        <h3 class="text-center p-4">Car Dealer Invoice</h3>
        <div class="bg-light p-5">
            <h1 class="text-center m-0"></h1>
            <div class="row pt-3 mb-2">
                <div class="col-md-6 text-right">
                    <h5 class="pt-4">Invoice#{{$invoice->id}}</h5>
                    <p class="text-muted mb-0"><i>Due to: {{date("F j, Y, g:i a") }}</i></p>
                </div>
            </div>
            <div class="row b-t pt-5">
                <div class="col-md-6 pt-3 center">
                    <h5>Informasi Pembeli</h5>
                    <p>Nama : {{$invoice->nama_pembeli}}</p>
                    <p>Nomor Telepon : {{$invoice->nomor_telepon}}</p>
                    <p>Email : {{$invoice->email}}</p>
                </div>
                <div class="col-md-6 text-right">
                    <h5>Payment Details</h5>
                    <p>Produk : {{$invoice->produk->nama}}</p>
                    <p>Quantity : {{$invoice->qty}}</p>
                    <p>Satuan : Rp. {{number_format($invoice->produk->harga)}}</p>
                </div>
            </div>
            <table class="table">
           
        </div>
        <div class="bg-dark text-white p-5">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-3 text-right">
                    <h6>Grand Total</h6>
                    <h3>Rp. {{number_format($invoice->qty * $invoice->produk->harga)}}</h3>
                </div>
            </div>
        </div>
    </div>

</body>
</html>