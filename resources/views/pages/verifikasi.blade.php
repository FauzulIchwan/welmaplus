<x-layout.admin-layout>
  <div class="container px-4 h-full flex flex-col" style="background-image: url('{{asset('assets/verifikasi.png')}}') ; background-size: cover;">
    <div class="lg:min-h-10 min-h-12"></div>
    <div class="lg:min-h-10 min-h-12">
      <a href="{{route('obligasi.index')}}" class="block h-full w-full bg-transparent text-black text-center"></a>
    </div>
    <div class="min-h-16"></div>
    <div class="flex-grow overflow-auto no-scrollbar">
      <div class="grid grid-cols-12 mb-5">
        <div class="col-span-12 mb-10">
          <center>
            <img src="{{asset('assets/lock.png')}}" alt="" width="36px" srcset="">
          </center>
        </div>
        <div class="col-span-12">
          <div class="text-primary font-bold text-center">PIN TRANSAKSI</div>
        </div>
        <div class="col-span-12">
          <div class="text-center">Silahkan Masukkan PIN Anda</div>
        </div>
      </div>
      <div class="grid grid-cols-12">
        <div class="col-span-12 mx-auto">
          <form id="pinForm" method="POST" action="{{ route('check.pin') }}">
            @csrf
            <input type="hidden" class="nominal" name="nominal" value="">
            <input type="hidden" class="pembelian" name="pembelian" value="">
            <input type="hidden" class="idObligasi" name="idObligasi" value="{{$obligasi->id}}">
            <input type="hidden" class="kupon" name="kupon" value="{{$obligasi->kupon}}">
            <div class="pinContainer" class="flex space-x-2 justify-center">
              <input type="password" maxlength="1" name="pin[]" class="pin-input w-12 h-12 text-center text-xl border-2 border-gray-300 rounded-md focus:outline-none focus:border-blue-500" />
              <input type="password" maxlength="1" name="pin[]" class="pin-input w-12 h-12 text-center text-xl border-2 border-gray-300 rounded-md focus:outline-none focus:border-blue-500" />
              <input type="password" maxlength="1" name="pin[]" class="pin-input w-12 h-12 text-center text-xl border-2 border-gray-300 rounded-md focus:outline-none focus:border-blue-500" />
              <input type="password" maxlength="1" name="pin[]" class="pin-input w-12 h-12 text-center text-xl border-2 border-gray-300 rounded-md focus:outline-none focus:border-blue-500" />
              <input type="password" maxlength="1" name="pin[]" class="pin-input w-12 h-12 text-center text-xl border-2 border-gray-300 rounded-md focus:outline-none focus:border-blue-500" />
              <input type="password" maxlength="1" name="pin[]" class="pin-input w-12 h-12 text-center text-xl border-2 border-gray-300 rounded-md focus:outline-none focus:border-blue-500" />
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="h-8"></div>
  </div>
  @push('down-scripts')
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const pinInputs = document.querySelectorAll('.pinContainer .pin-input');
      const nominal = localStorage.getItem('totalNominal');
      document.querySelector('.nominal').value = nominal;
      const pembelian = parseFloat(localStorage.getItem('inputValue').replace(/\./g, '').replace(',', '.'));
      document.querySelector('.pembelian').value = pembelian;
      pinInputs.forEach((input, index) => {
          input.addEventListener('input', () => {
            console.log(`Input ${index + 1}: ${input.value}`); // Debug: Log setiap input
            console.log(`Index: ${index}, Inputs Length: ${pinInputs.length}`);
              if (input.value.length === 1 && index < pinInputs.length - 1) {
                  pinInputs[index + 1].focus();
              } else if (input.value.length === 1 && index === pinInputs.length - 1) {
                  // Mengirimkan form ketika karakter terakhir diisi
                  console.log('All inputs filled, submitting form...');
                  document.getElementById('pinForm').submit();
              }
          });
      });
    });
  </script>
  @endpush
</x-layout.admin-layout>