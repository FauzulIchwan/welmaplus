<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MenuPortofolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_porto = DB::table('portofolio')
        ->join('daftar_obligasi', 'portofolio.id_obligasi', '=', 'daftar_obligasi.id')
        ->join('status_order', 'portofolio.id_status', '=', 'status_order.id')
        ->select(
            'portofolio.id',
            'daftar_obligasi.nama_obligasi',
            'daftar_obligasi.kode_obligasi',
            'portofolio.nominal_transaksi',
            'portofolio.nominal_akhir',
            'portofolio.biaya_admin',
            'portofolio.kupon_berjalan',
            'portofolio.order_kuota',
            'portofolio.created_at',
            'portofolio.tipe',
            'status_order.nama_status',
            'status_order.id as id_status'
        )
        ->get();
        $data = [
            'portofolio' => $list_porto,
        ];
        // dd($data);
        return view('pages.portofolio', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
