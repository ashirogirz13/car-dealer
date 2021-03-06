@extends('layouts.app')

@section('content')


    
     <!-- Main Content -->
     <div class="main-content">
        <section class="section">
            <div class="card text-left">
                <div class="card-body">
                    <div class="row">
                        <h4 class="card-title col-md-5">List Produk</h4>
                        <div class="col-md-7 d-flex justify-content-end"><button type="button" class="btn btn-success" data-toggle="modal" data-target="#add"><i class="fas fa-plus"></i> Tambah Produk</button></div>
                        
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
                            <th>Nama Mobil</th>
                            <th>Harga</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produk as $key)
                            <tr>
                                <td>{{$key->nama}}</td>
                                <td>Rp. {{number_format($key->harga)}}</td>
                                <td>{{$key->stock_sum_pemasukan->sum('stock') - $key->stock_sum_pengeluaran->sum('stock')}}</td>
                                <td>
                                    <a href="{{route('produk.delete',$key->id)}}" class="btn btn-danger mr-2"><i class="fas fa-trash"></i></a>
                                    <a href="{{route('produk.edit',$key->id)}}"class='btn btn-warning mr-2' data-toggle="tooltip" title="Edit">
                                        <i class="fa fa-edit"></i></a>
                                    <a href="{{route('produk.stok',$key->id)}}"class='btn btn-success mr-2' data-toggle="tooltip" title="Edit">
                                        <i class="fa fa-plus"></i></a>
                                </td>
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
                        <h5 class="modal-title" id="exampleModalLabel">Input Mobil</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{url('store_produk')}}" method="post">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="form-group">
                            <label for="">Nama Mobil</label>
                            <input type="text"
                                class="form-control" name="nama" id="nama" aria-describedby="helpId" placeholder="">
                            </div>
                            
                            <div class="form-group">
                            <label for="">Harga</label>
                            <input type="number"
                                class="form-control" name="harga" id="harga" aria-describedby="helpId" placeholder="">
                            </div>

                            <div class="form-group">
                            <label for="">Stock Awal</label>
                            <input type="number"
                                class="form-control" name="stock" id="stock" aria-describedby="helpId" placeholder="">
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