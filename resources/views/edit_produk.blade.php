@extends('layouts.app')

@section('content')
     <!-- Main Content -->
     <div class="main-content">
        <section class="section">
          <form action="{{ route('produk.update',$produk->id) }}" method="post">
            {{ csrf_field() }}
            <div class="card text-left">
              <img class="card-img-top" src="holder.js/100px180/" alt="">
              <div class="card-body">
                <h4 class="card-title">Edit Produk</h4>
                <hr>
                <div class="form-group">
                  <label for="">Nama Mobil</label>
                  <input type="text"
                  class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="" value="{{$produk->nama}}">
                </div>
                <div class="form-group">
                  <label for="">Harga</label>
                  <input type="number"
                  class="form-control" name="harga" id="harga" aria-describedby="helpId" placeholder="" value="{{$produk->harga}}">
                </div>
                <div class="d-flex justify-content-end">
                  <button type="button" onclick="window.history.back()" class="btn btn-secondary m-2">Cancel</button> 
                  <button type="submit" class="btn btn-primary m-2">Submit</button>
                </div>
              </div>
            </div>
          </form>
                 
                   
                </section>
            </div>
@endsection