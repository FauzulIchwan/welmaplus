<x-layout.admin-layout>
  <div class="container px-4 h-full flex flex-col" style="background-image: url('assets/obligasi.png') ; background-size: cover;">
    <div class="min-h-12"></div>
    <div class="min-h-12">
      <a href="{{route('menu.index')}}" class="block h-full w-full bg-transparent text-black text-center"></a>
    </div>
    <div class="min-h-40"></div>
    <div class="flex-grow overflow-auto no-scrollbar">
      @foreach ($obligasi as $item)
      @php
        \Carbon\Carbon::setLocale('id');
        $formattedDate = \Carbon\Carbon::parse($item->tanggal_jatuh_tempo)->translatedFormat('d M Y');
      @endphp
      <div class="grid grid-cols-12">
        <div class="col-span-12">
          <div class="text-primary font-bold">{{$item->nama_obligasi}} Seri {{$item->kode_obligasi}} ({{$item->kupon}})</div>
        </div>
        <div class="col-span-8">
          <div class="text-gray-500 text-xs mb-3">Jatuh Tempo {{$formattedDate}}</div>
          <div class="grid grid-cols-2">
            <div>
              <div class="text-xs text-primary">Yield to Maturity</div>
              <div class="text-cyan-500 text-xs font-bold">{{$item->yield}}</div>
            </div>
            <div>
              <div class="text-xs text-primary">Harga Beli</div>
              <div class="text-cyan-500 text-xs font-bold">{{$item->harga_beli}}%</div>
            </div>
          </div>
        </div>
        <div class="col-span-4 flex flex-col justify-between">
          <a href="/obligasi/{{$item->id}}" class="btn btn-xs btn-primary text-white btn-block {{$item->stok !== 0 ? 'invisible' : ''}}">
            Order
          </a>
          <a href="" class="btn btn-xs btn-primary text-white btn-block {{$item->stok == 0 ? 'btn-disabled' : ''}}">
            Beli
          </a>
        </div>
        <div class="col-span-12">
          <div class="divider my-2"></div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="h-8"></div>
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