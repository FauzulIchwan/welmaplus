<x-layout.admin-layout>
  @php
  \Carbon\Carbon::setLocale('id');
  $formattedDate = \Carbon\Carbon::parse($obligasi->tanggal_jatuh_tempo)->translatedFormat('d M Y');
  @endphp
  <div class="container h-full flex flex-col" style="background-image: url('{{asset('assets/konfirmasi.png')}}') ; background-size: cover;">
    <div class="lg:min-h-10 min-h-12"></div>
    <div class="lg:min-h-12 min-h-12">
      <a href="{{route('obligasi.show', $obligasi->id)}}" class="block h-full w-full bg-transparent text-black text-center"></a>
    </div>
    <div class="lg:min-h-16 min-h-20 mb-4">
      <div class="px-4 py-2 rounded-t-2xl bg-gray-200">
        <div class="text-primary text-center font-bold">{{$obligasi->nama_obligasi}} Seri {{$obligasi->kode_obligasi}} ({{$obligasi->kupon}})</div>
        <div class="text-primary text-center font-bold">{{$formattedDate}} - JATUH TEMPO</div>
      </div>
    </div>
    <div class="flex-grow overflow-auto no-scrollbar">
      <div class="grid grid-cols-12">
        <div class="col-span-12">
          <div class="text-center">Nominal Total Transaksi</div>
        </div>
        <div class="col-span-12">
          <div class="text-black font-bold text-center"><span id="totalHarga" class="totalHarga"></span></div>
        </div>
      </div>
      <div class="divider"></div>
      <div class="grid grid-cols-12">
      <div class="col-span-12">
          <div class="text-center">Rekening Sumber Dana</div>
        </div>
        <div class="col-span-12">
          <div class="text-black font-bold text-center">123-456-7890</div>
        </div>
      </div>
      <div class="divider"></div>
      <div class="grid grid-cols-12 px-4">
        <div class="col-span-12">
          <div class="font-bold text-primary">Informasi</div>
        </div>
        <div class="col-span-12">
          <article class="prose">
            <ul class="list-disc text-xs">
              <li>Nominal Pemesanan yang sudah diinput tidak dapat diubah atau dibatalkan </li>
              <li>Nasabah dengan ini setuju untuk dilakukan pemblokiran dana sejumlah total transaksi yang akan didebet saat kuota berhasil diorder</li>
              <li>Pemesanan obligasi harian dapat dilakukan hingga pukul 14:00 WIB dan batas waktu konfirmasi kembali dari BCA ke Nasabah mengenai status transaksi berhasil atau tidak akan diinfokan paling lambat pukul 14:30 WIB setiap harinya</li>
              <li>Pemesanan obligasi yang dilakukan setelah pukul 14:00 WIB tidak dapat diproses</li>
              <li>Waktu yang digunakan mengacu pada Waktu Indonesia Barat (WIB)</li>
            </ul>
          </article>
        </div>
      </div>
      <div class="divider"></div>
    </div>
    <div class="grid grid-cols-12 gap-2 mb-4 px-4">
      <div class="col-span-6">
        <a href="{{route('obligasi.show', $obligasi->id)}}" id="batal" class="btn btn-outline btn-primary rounded-2xl text-white btn-block">
          Batal
        </a>
      </div>
      <div class="col-span-6">
        <a href="{{route('obligasi.verifikasi', $obligasi->id)}}" class="btn btn-primary rounded-2xl text-white btn-block">
          Lanjut
        </a>
      </div>
    </div>
    <div class="h-8"></div>
  </div>
  @push('down-scripts')
  <script>
    var inputValue = parseFloat(localStorage.getItem('inputValue').replace(/\./g, '').replace(',', '.'));
    var hargaBeli = {{ $obligasi->harga_beli }}

    var hasil = inputValue * hargaBeli / 100;
    console.log(hasil, document.getElementById('totalHarga'));
    // Simpan tiap 1 detik
    setInterval(function() {
      localStorage.setItem('totalNominal', hasil);
    }, 1000);

    document.getElementById('batal').addEventListener('click', function(event) {
      event.preventDefault();
      localStorage.removeItem('totalNominal');
      if (!localStorage.getItem('totalNominal')) {
          console.log('Item telah dihapus dari localStorage');
      } else {
          console.log('Gagal menghapus item dari localStorage');
      }
      setTimeout(() => {
          window.location.href = this.href;
      }, 500);
    });

    function formatNumber(value) {
        return new Intl.NumberFormat('id-ID', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }).format(value);
    }

    document.querySelector('.totalHarga').innerText ="IDR "+ formatNumber(hasil);
  </script>
  @endpush
</x-layout.admin-layout>