<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MenuObligasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obligasi = DB::table('daftar_obligasi')->get();
        $data = [
            'obligasi' => $obligasi,
        ];
        // dd($data);
        return view('pages.menuobligasi', $data);
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
        $obligasi = DB::table('daftar_obligasi')->where('id', $id)->first();
        $nasabah = Auth::user();
        // Kurangi saldo nasabah
        $nasabah = DB::table('nasabah')->where('username', $nasabah->username)->select('saldo')->first();
        $data = [
            'obligasi' => $obligasi,
            'nasabah' => $nasabah,
        ];
        // dd($data);
        return view('pages.detailobligasi', $data);
    }

    public function konfirmasi(string $id)
    {
        $obligasi = DB::table('daftar_obligasi')->where('id', $id)->first();
        $data = [
            'obligasi' => $obligasi,
        ];
        // dd($data);
        return view('pages.konfirmasi', $data);
    }

    public function verifikasi(string $id)
    {
        $obligasi = DB::table('daftar_obligasi')->where('id', $id)->first();
        $data = [
            'obligasi' => $obligasi,
        ];
        // dd($data);
        return view('pages.verifikasi', $data);
    }

    public function detailorder(string $id)
    {
        $porto = DB::table('portofolio')
        ->where('portofolio.id', $id)
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
            'status_order.nama_status',
            'status_order.id as id_status'
        )
        ->first();
        $data = [
            'porto' => $porto,
        ];
        // dd($data);
        return view('pages.detailorder', $data);
    }

    public function checkPin(Request $request)
    {
        // Menggabungkan semua karakter PIN menjadi satu string
        $inputPin = implode('', $request->input('pin'));

        // Asumsikan Anda memiliki tabel `nasabah` dengan kolom `pin`
        $storedPin = DB::table('nasabah')->where('username', auth()->user()->username)->value('pin');

        \Log::info('Input PIN: ' . $inputPin);
        \Log::info('Input PIN: ' . $inputPin);
        \Log::info('Nominal: ' . $request->input('nominal'));
        // Membandingkan PIN yang diinput dengan yang ada di database
        if ($inputPin === $storedPin) {
            DB::beginTransaction();
            try {
                // Ambil nominal dari input hidden
                $nominal = floatval($request->input('nominal'));
                $biayaAdmin = 27750;
                $nominalAkhir = $nominal + $biayaAdmin;
                $kuponberjalan = number_format(floatval($request->input('kupon')), 0, '', '') * $request->input('pembelian');
                $nasabah = Auth::user();
                // Kurangi saldo nasabah
                DB::table('nasabah')->where('username', $nasabah->username)->decrement('saldo', $nominalAkhir);

                // Simpan data ke tabel riwayat_informasi_order
                $idPortofolio = DB::table('portofolio')->insertGetId([
                    'id_nasabah' => $nasabah->id,
                    'id_obligasi' => $request->input('idObligasi'),
                    'order_kuota' => $request->input('pembelian'),
                    'nominal_transaksi' => $nominal,
                    'nominal_akhir' => $nominalAkhir,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'id_status' => 1,
                    'biaya_admin' => $biayaAdmin,
                    'tipe' => 'online',
                    'kupon_berjalan' =>$kuponberjalan,
                ]);
                DB::commit();

                return redirect()->route('detailorder', $idPortofolio);
            } catch (\Throwable $th) {
                DB::rollBack();
                // dd($th);
                throw $th;
            }
            // Redirect ke halaman berikutnya jika PIN cocok
        } else {
            // Redirect kembali dengan pesan kesalahan jika PIN salah
            return redirect()->back()->withErrors(['pin' => 'PIN yang Anda masukkan salah.']);
        }
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
