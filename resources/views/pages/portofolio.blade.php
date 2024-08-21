<x-layout.admin-layout>
  @php
    \Carbon\Carbon::setLocale('id');
    $todayDate = \Carbon\Carbon::now()->translatedFormat('d M Y');
    $nextWeekDate = \Carbon\Carbon::now()->addDays(7)->translatedFormat('d M Y');
  @endphp
  <div class="container px-4 h-full flex flex-col" style="background-image: url('assets/portofolio.png') ; background-size: cover;">
    <div class="min-h-12"></div>
    <div class="min-h-12">
      <a href="{{route('menu.index')}}" class="block h-full w-full bg-transparent text-black text-center"></a>
    </div>
    <div class="min-h-52 lg:min-h-56"></div>
    <div class="text-center mb-8">Transaksi {{$todayDate}} - {{$nextWeekDate}} </div>
    <div class="flex-grow overflow-auto no-scrollbar">
      @foreach ($portofolio as $item)
      <a href="order/{{$item->id}}">
        <div class="grid grid-cols-12">
          <div class="col-span-12">
            <div class="text-primary font-bold">{{$item->nama_obligasi}} Seri {{$item->kode_obligasi}}</div>
          </div>
          <div class="col-span-8 mb-2">
              <div>Pembelian</div>
              <div class="text-cyan-500 font-bold">IDR {{ number_format($item->nominal_transaksi, 2, ',', '.') }}</div>
          </div>
          <div class="col-span-4 flex flex-col justify-between">
            @php
                $badgeClass = '';
                if ($item->id_status == '1') {
                    $badgeClass = 'badge-info';
                } elseif ($item->id_status == '2') {
                    $badgeClass = 'badge-success';
                } else {
                    $badgeClass = 'badge-error';
                };
                \Carbon\Carbon::setLocale('id');
                $date = $item->created_at; // Ganti dengan variabel tanggal yang sesuai
                $formattedDate = \Carbon\Carbon::parse($date)->translatedFormat('d M Y');
            @endphp
            <div class="badge {{$badgeClass}}">{{$item->nama_status}}</div>
          </div>
          <div class="col-span-12 flex gap-4">
              <div class="flex gap-1 align-middle">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#004d93" class="bi bi-calendar" viewBox="0 0 16 16">
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                  </svg>
                </span>
                {{$formattedDate}}
              </div>
              <div class="flex gap-1">
                <span>
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#004d93" class="bi bi-phone" viewBox="0 0 16 16">
                    <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                    <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
                  </svg>
                </span>
                {{$item->tipe}}
              </div>
          </div>
        </div>
      </a>
      <div class="divider"></div>
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