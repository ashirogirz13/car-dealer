@extends('layouts.app')

@section('content')
     <!-- Main Content -->
     <div class="main-content">
        <section class="section">
                   
            <div class="card text-left">
              <img class="card-img-top" src="holder.js/100px180/" alt="">
              <div class="card-body">
                <h4 class="card-title">Welcome</h4>
                <hr>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <td colspan="2" align="center"><b>Penjualan Hari Ini</b></td>
                    </tr>
                    @php
                        $date = date('Y-m-d');
                        // $query = DB::select("SELECT i.produk_id, produks.nama, SUM(qty) FROM `invoices` i LEFT JOIN produks p on i.produk_id=p.id WHERE date(i.created_at)='".$date."' GROUP BY produk_id ORDER BY SUM(qty) DESC");
                        $query_terbanyak = DB::select("SELECT i.produk_id, p.nama, SUM(qty) FROM `invoices` as i LEFT JOIN produks as p on i.produk_id=p.id WHERE date(i.created_at)='".$date."' GROUP BY produk_id,p.nama ORDER BY SUM(qty) DESC");
                        $query_penjualan = DB::select("SELECT SUM(qty) as total FROM invoices where date(created_at)='".$date."'"); 
                        $query_total = DB::select("SELECT SUM(qty * harga) as total FROM invoices i LEFT JOIN produks p ON i.produk_id=p.id where date(i.created_at)='".$date."'"); 

                        // $query_terbanyak = DB::select("SELECT SUM(i.qty * p.harga) as total FROM `invoices` as i LEFT JOIN produks as p on i.produk_id=p.id WHERE date(i.created_at)='".$date."'");
                      
                    @endphp
                    <tr>
                      <td width="50%">Mobil Yang Paling Banyak Dijual</td>
                      <td width="50%">{{ $query_terbanyak[0]->nama }}</td>
                    </tr>
                    <tr>
                      <td width="50%">Penjualan Hari ini</td>
                      <td>{{ $query_penjualan[0]->total }}</td>
                    </tr>
                    <tr>
                      <td width="50%">Total Penjualan Hari ini</td>
                      <td>Rp. {{ number_format($query_total[0]->total) }}</td>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
                 
                   
                </section>
            </div>
@endsection