<x-layout.admin-layout>
  @php
  \Carbon\Carbon::setLocale('id');
  $formattedDate = \Carbon\Carbon::parse($obligasi->tanggal_jatuh_tempo)->translatedFormat('d M Y');
  @endphp
  <div class="container h-full flex flex-col" style="background-image: url('{{asset('assets/detail.png')}}') ; background-size: cover;">
    <div class=" min-h-12"></div>
    <div class=" min-h-12">
      <a href="{{route('obligasi.index')}}" class="block h-full w-full bg-transparent text-black text-center"></a>
    </div>
    <div class="min-h-24"></div>
    <div class="flex-grow overflow-auto no-scrollbar">
      <div class="grid grid-cols-12 px-4">
        <div class="col-span-8">
          <div class="text-primary font-bold">{{$obligasi->nama_obligasi}} Seri {{$obligasi->kode_obligasi}}</div>
          <div class="text-primary font-bold">({{$obligasi->kupon}})</div>
        </div>
        <div class="col-span-4">
          <div class="text-primary text-xs">Jatuh Tempo</div>
          <div class="text-cyan-500 font-bold">{{$formattedDate}}</div>
        </div>
      </div>
      <div class="divider"></div>
      <div class="grid grid-cols-12 px-4">
        <div class="col-span-4">
          <div class="text-primary">Harga Beli</div>
        </div>
        <div class="col-span-8">
          <div class="text-primary font-bold">{{$obligasi->harga_beli}}%</div>
        </div>
      </div>
      <div class="divider"></div>
      <div class="grid grid-cols-12 px-4">
        <div class="col-span-4">
          <div class="text-primary">Minimum Transaksi</div>
        </div>
        <div class="col-span-8">
          <div class="text-primary font-bold">IDR 1,000,000.00</div>
        </div>
      </div>
      <div class="divider"></div>
      <div class="grid grid-cols-12 px-4">
        <div class="col-span-4">
          <div class="text-primary">Maksimum Transaksi</div>
        </div>
        <div class="col-span-8">
          <div class="text-primary font-bold">IDR 999,999,999,999.00</div>
        </div>
      </div>
      <div class="divider"></div>
      <div class="grid grid-cols-12 px-4">
        <div class="col-span-4">
          <div class="text-primary">Kelipatan Transaksi</div>
        </div>
        <div class="col-span-8">
          <div class="text-primary font-bold">IDR 1,000,000.00</div>
        </div>
      </div>
      <div class="divider"></div>
      <div class="grid grid-cols-12 px-4 mb-5">
        <div class="col-span-12 mb-2">
          <div class="text-primary font-bold">Rekening Sumber Dana</div>
        </div>
        <div class="col-span-12">
          <div class="p-4 rounded-lg border border-cyan-500 flex gap-2">
            <img src="{{asset('assets/logo rp.png')}}" alt="" width="36px" srcset="">
            <div class="text-cyan-500 font-bold">025-999-6456 - TAHAPAN</div>
          </div>
        </div>
      </div>
      <div class="grid grid-cols-12 px-4 mb-10">
        <div class="col-span-12 grid grid-cols-12">
          <div class="col-span-9 flex flex-col align-bottom">
            <div class="mb-1 text-primary font-bold">Nilai Nominal</div>
            <label class="input input-bordered flex items-center gap-2 h-full">
            IDR
            <input type="text" class="currency-input grow" id="currencyInput" value="{{ number_format(1000000, 2, ',', '.') }}" />
            </label>
          </div>
          <div class="col-span-3">
            <div class="text-right mb-1">Kelipatan</div>
            <div class="join float-end">
              <button class="btn btn-sm btn-outline btn-primary join-item decrease" id="decrease">-</button>
              <button class="btn btn-sm btn-outline btn-primary join-item increase" id="increase">+</button>
            </div>
          </div>
        </div>
      </div>
      <div class="divider"></div>
      <div class="grid grid-cols-12 px-4 mb-5">
        <div class="col-span-12 mb-5">
          <div class="text-primary font-bold text-xs mb-2">Biaya Transaksi*</div>
          <div class="">IDR 27,750.00</div>
          <div class="text-cyan-700 text-xs">*) Biaya Transaksi akan didebet dari Rekening Sumber Dana yang Anda pilih. </div>
        </div>
        <div class="col-span-12 mb-5 align-middle">
          <div class="text-primary font-bold">Promo</div>
          <div class="p-4 rounded-lg border border-cyan-500 flex gap-2">
            <img src="{{asset('assets/discount.png')}}" alt="" width="20px" height="20px" srcset="">
            <div class="font-bold">Gunakan Promo, jadi lebih hemat!</div>
            <div class="font-bold text-primary">&rsaquo;</div>
          </div>
        </div>
      </div>
      <div class="grid grid-cols-12 mb-5">
        <div class="col-span-12 bg-blue-200 py-3">
          <div class="px-4">
            <div class="text-primary font-bold">Informasi Tambahan</div>
          </div>
        </div>
      </div>
      <div class="grid grid-cols-12 mb-5">
        <div class="col-span-12">
          <div class="text-cyan-500 font-bold text-center">RINGKASAN INFORMASI PRODUK</div>
        </div>
        <div class="divider col-span-12"></div>
        <div class="col-span-12">
          <div class="text-cyan-500 font-bold text-center">KETENTUAN PEMBELIAN</div>
        </div>
        <div class="divider col-span-12"></div>
        <div class="col-span-12 px-4">
          <div class="text-cyan-500 text-center">Pastikan Anda telah membaca Ringkasan Informasi Produk dan Ketentuan Pembelian</div>
        </div>
      </div>
      <div class="grid grid-cols-12 px-4 mb-8">
        <div class="col-span-12">
          <a href="{{ route('obligasi.konfirmasi', $obligasi->id) }}" id="submitButton" class="btn btn-primary rounded-3xl text-white btn-block">
            Lanjut
          </a>
        </div>
      </div>
    </div>
    <div class="h-8"></div>
  </div>
  @push('down-scripts')
  <script>
    // const currencyInput = document.getElementById('currencyInput');
    const currencyInput = document.querySelector('.currency-input');
    // const increaseButton = document.getElementById('increase');
    // const decreaseButton = document.getElementById('decrease');
    const increaseButton = document.querySelector('.increase');
    const decreaseButton = document.querySelector('.decrease');
    const cancelButton = document.getElementById('batal');
    const MIN_VALUE = 1000000; // Batas nilai minimum
    const saldo_nasabah = {{$nasabah->saldo}};

    if (saldo_nasabah < 1027750) {
      alert('Maaf, Saldo anda kurang untuk membeli obligasi ini');
      document.getElementById('submitButton').disabled = true;
      history.back();
    } else {
      document.getElementById('submitButton').disabled = false;
    }

    function roundDownToMillion(value) {
      return Math.floor(value / 1000000) * 1000000;
    }

    let MAX_VALUE = roundDownToMillion(saldo_nasabah);

    if (MAX_VALUE == saldo_nasabah) {
      MAX_VALUE = MAX_VALUE - 1000000;
    }

    function formatNumber(value) {
        return new Intl.NumberFormat('id-ID', {
            minimumFractionDigits: 2,
            maximumFractionDigits: 2
        }).format(value);
    }

    function parseNumber(value) {
        return parseFloat(value.replace(/[^\d,-]/g, '').replace(',', '.')) || 0;
    }

    function updateInputValue(value) {
        currencyInput.value = formatNumber(value);
    }

    function changeValue(amount) {
        let currentValue = parseNumber(currencyInput.value);
        let newValue = currentValue + amount;

        // Batasi nilai agar tidak kurang dari MIN_VALUE
        if (newValue < MIN_VALUE) {
            newValue = MIN_VALUE;
        } else if (newValue > MAX_VALUE) {
            newValue = MAX_VALUE;
        }
        updateInputValue(newValue);
    }

    currencyInput.addEventListener('input', function(e) {
        let value = e.target.value;
        
        // Hapus semua karakter yang bukan angka
        value = value.replace(/[^0-9]/g, '');
        
        // Format angka menjadi format Rupiah
        value = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(value);
        
        // Hapus simbol 'Rp' dan spasi untuk mengembalikan hanya angka
        e.target.value = value.replace(/Rp|\s/g, '');
    });

    currencyInput.addEventListener('blur', function(e) {
        let value = e.target.value;
        
        // Hapus semua karakter yang bukan angka
        value = value.replace(/[^0-9]/g, '');
        
        // Jalankan fungsi roundDownToMillion
        value = roundDownToMillion(value);

        if (value < MIN_VALUE) {
          value = MIN_VALUE;
        }else if(value > MAX_VALUE) {
          value = MAX_VALUE;
        }

        // Format angka menjadi format Rupiah
        value = new Intl.NumberFormat('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 0
        }).format(value);
        
        // Tetap tampilkan dengan simbol 'Rp'
        e.target.value = value.replace(/Rp|\s/g, '');
    });

    increaseButton.addEventListener('click', function() {
        changeValue(1000000);
        console.log('clicked +');
    });

    decreaseButton.addEventListener('click', function() {
        changeValue(-1000000);
        console.log('clicked -');
    });

    // Set nilai dari localStorage saat halaman di-refresh atau dikunjungi kembali
    window.onload = function() {
        if (localStorage.getItem('inputValue')) {
            currencyInput.value = localStorage.getItem('inputValue');
        }
    };

    //Simpan tiap 1 detik
    setInterval(function() {
      localStorage.setItem('inputValue', currencyInput.value);
    }, 1000);
  </script>
  @endpush
</x-layout.admin-layout>