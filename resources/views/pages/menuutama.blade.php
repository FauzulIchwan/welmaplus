<x-layout.admin-layout>
  <div class="relative h-full w-full">
    <div class="container px-4 h-full" style="background-image: url('assets/menu.png') ; background-size: cover;">
      <div class="h-40"></div>
      <div class="h-12">
        <div class="text-primary font-bold">{{$namaUser}}</div>
      </div>
      <div class="px-5 py-4 lg:py-5">
        <div class="text-cyan-400 text-xs mb-2">Rekening: <span class="font-bold">025-999-6456  ></span></div>
        <div class="text-primary">IDR  <span class="font-bold">{{ number_format($saldo, 2, ',', '.') }}</span></div>
      </div>
      <div class="mt-14 h-16">
        <div class="grid grid-cols-4 gap-9 h-full">
          <div class="col-start-3 flex flex-col justify-items-center justify-center lg:justify-end">
            <a href="{{route('welma.index')}}">
              <center class="mb-1">
                <img src="{{asset('assets/icon w.png')}}" alt="" width="33px" srcset="" class="">
              </center>
              <div class="text-primary text-center text-xs font-bold lg:mb-1">Welma+</div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="absolute -bottom-1">
      <img src="{{asset('assets/footer.png')}}" alt="" width="100%" srcset="">
    </div>
  </div>
  @push('down-scripts')
  <script>
    window.onload = function() {
      localStorage.removeItem('inputValue');
      localStorage.removeItem('totalNominal');
    };
  </script>
  @endpush
</x-layout.admin-layout>