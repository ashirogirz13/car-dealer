@extends('layouts.app')

@section('content')


    
     <!-- Main Content -->
     <div class="main-content">
        <section class="section">
            <div class="card text-left">
                <div class="card-body">
                    <div class="row">
                        <h4 class="card-title col-md-5">List Invoice</h4>
                        <div class="col-md-7 d-flex justify-content-end"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#add"><i class="fas fa-plus"></i> Buat Invoice</button></div>
                        
                    </div>
                <hr>
                    @if (session('success'))
                    <div class="alert alert-success" style="width: 100%;">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('success') }}
                    </div>
                    @endif
                <br>
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>Nama Pembeli</th>
                            <th>Email Pembeli</th>
                            <th>Nomor Telepon</th>
                            <th>Mobil</th>
                            <th>QTY</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($invoice as $key)
                            <tr>
                                <td>{{$key->nama_pembeli}}</td>
                                <td>{{$key->email}}</td>
                                <td>{{$key->nomor_telepon}}</td>
                                <td>{{$key->produk->nama}}</td>
                                <td>{{$key->qty}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
        </section>
    </div>

    <!-- Modal Input Mobil -->
        <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Buat Invoice</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('invoice.store')}}" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                            <label for="">Nama Pembeli</label>
                            <input type="text"
                                class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="">
                            </div>
                            
                            <div class="form-group">
                            <label for="">Email Pembeli</label>
                            <input type="text"
                                class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="">
                            </div>

                            <div class="form-group">
                            <label for="">Nomor Telepon</label>
                            <input type="text"
                                class="form-control" name="no_telp" id="no_telp" aria-describedby="helpId" placeholder="">
                            </div>

                            <div class="form-group">
                              <label for="">Mobil</label>
                              <select class="form-control" name="produk_id" id="produk_id">
                                  @foreach ($produk as $key)
                                      <option value="{{$key->id}}">{{$key->nama}}</option>
                                  @endforeach
                              </select>
                            </div>

                            <div class="form-group">
                            <label for="">Quantity</label>
                            <input type="number"
                                class="form-control" name="qty" id="qty" aria-describedby="helpId" placeholder="">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
@endsection

@section('script')
<script>
    $(document).ready(function(){
        $('#table_id').DataTable();
    } );
</script>
@endsection