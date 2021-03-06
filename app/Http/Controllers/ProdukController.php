<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produk;
use App\Stock;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $produk = Produk::get();
        return view('produk', [
            'produk' => $produk
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $produk = new Produk;
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->save();
        $id = $produk->id;

        $stok = new Stock;
        $stok->produk_id = $id;
        $stok->stock = $request->stock;
        $stok->save();

        return redirect('/produk')->with('success', 'Produk Berhasil Ditambahkan');
        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $produk = Produk::findOrfail($id);
        // return $produk;
        return view('edit_produk', [
            'produk' => $produk
        ]);
    }
    public function stok($id)
    {
        //
        $produk = Produk::findOrfail($id);
        // return $produk;
        return view('edit_stock', [
            'produk' => $produk
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $produk = Produk::find($id);
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->save();
        return redirect('/produk')->with('success', 'Produk Berhasil Ditambahkan');
    }
    public function update_stok(Request $request, $id)
    {
        //
        $stock = new Stock;
        $stock->produk_id = $id;
        $stock->stock = $request->stock;
        $stock->save();
        return redirect('/produk')->with('success', 'Stock Berhasil Ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Produk::find($id)->delete();
        Stock::where('produk_id', $id)->delete();
        return redirect()->back()->with('success', 'Produk Berhasil Dihapus');
    }
}
