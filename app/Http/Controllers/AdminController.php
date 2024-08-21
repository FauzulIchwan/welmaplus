<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_porto_process = DB::table('portofolio')
        ->where('id_status','=', '1')
        ->join('daftar_obligasi', 'portofolio.id_obligasi', '=', 'daftar_obligasi.id')
        ->join('status_order', 'portofolio.id_status', '=', 'status_order.id')
        ->join('nasabah', 'portofolio.id_nasabah', '=', 'nasabah.id')
        ->select(
            'portofolio.id',
            'nasabah.username',
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

        $list_porto_done = DB::table('portofolio')
        ->where('id_status','!=', '1')
        ->join('daftar_obligasi', 'portofolio.id_obligasi', '=', 'daftar_obligasi.id')
        ->join('status_order', 'portofolio.id_status', '=', 'status_order.id')
        ->join('nasabah', 'portofolio.id_nasabah', '=', 'nasabah.id')
        ->select(
            'portofolio.id',
            'nasabah.username',
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
            'portofolio_proses' => $list_porto_process,
            'portofolio_selesai' => $list_porto_done,
        ];
        // dd($data);
        return view('pages.admin.index', $data);
    }

    public function changestatus(string $id, string $status)
    {
        DB::beginTransaction();
            try {
                $porto = DB::table('portofolio')->where('id', $id)->first();
                if($status == 3) {
                    DB::table('nasabah')->where('id', $porto->id_nasabah)->increment('saldo', $porto->nominal_akhir);
                }

                // Simpan data ke tabel riwayat_informasi_order
                DB::table('portofolio')->where('id', $id)->update([
                    'id_status' => $status,
                ]);
                DB::commit();
                return redirect()->route('admin.index');

            } catch (\Throwable $th) {
                DB::rollBack();
                throw $th;
            }
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
