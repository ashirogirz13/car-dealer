<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Invoice;
use App\Produk;
use App\Stock;
use App\Mail\SendInvoice;
use Illuminate\Support\Facades\Mail;

class InvoiceController extends Controller
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
        $invoice = Invoice::get();
        return view('invoice', [
            'produk' => $produk,
            'invoice' => $invoice
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
        // Store Invoice
        $invoice = new Invoice;
        $invoice->nama_pembeli = $request->nama;
        $invoice->email = $request->email;
        $invoice->nomor_telepon = $request->no_telp;
        $invoice->produk_id = $request->produk_id;
        $invoice->qty = $request->qty;
        $invoice->save();
        $id = $invoice->id;
        // Store Stock Keluar
        $stok = new Stock;
        $stok->produk_id = $request->produk_id;
        $stok->stock = $request->qty;
        $stok->status = 'keluar';
        $stok->save();

        Mail::to($request->email)->send(new SendInvoice($id));

        return redirect('/invoices')->with('success', 'Invoice Berhasil Dibuat');
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
    }
}
