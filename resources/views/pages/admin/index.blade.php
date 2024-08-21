<x-layout.admin-layout>
  <div class="container px-4 h-full flex flex-col" style="background-image: url('assets/admin.png') ; background-size: cover;">
    <div class="lg:min-h-10 min-h-12"></div>
    <div class="lg:min-h-16 min-h-24"></div>
    <div class="lg:min-h-16 min-h-24">
      <div role="tablist" class="tabs tabs-boxed">
        <a role="tab" class="tab tab-active" data-tab="proses" id="tab-proses">Diproses</a>
        <a role="tab" class="tab" data-tab="selesai" id="tab-selesai">Selesai</a>
      </div>
    </div>
    <div class="flex-grow overflow-auto no-scrollbar">
      <div id="proses" class="tab-content block">
        @if($portofolio_proses && $portofolio_proses->isNotEmpty())
          @foreach($portofolio_proses as $item)
          <div>
            <div class="grid grid-cols-12">
              <div class="col-span-12">
                <div class="text-primary font-bold">{{$item->nama_obligasi}} Seri {{$item->kode_obligasi}}</div>
              </div>
              <div class="col-span-8 mb-2">
                  <div class="text-cyan-500 font-bold mb-2">{{ $item->username }}</div>
                  <div class="text-cyan-500 font-bold">IDR {{ number_format($item->nominal_transaksi, 2, ',', '.') }}</div>
              </div>
              <div class="col-span-4 flex flex-col justify-between">
                <form action="{{ route('changeStatus', [$item->id, 2]) }}" method="POST" class="d-inline">
                  @csrf
                  <button type="submit" class="btn btn-sm btn-success mb-3 btn-block">Approve</button>
                </form>
    
                <form action="{{ route('changeStatus', [$item->id, 3]) }}" method="POST" class="d-inline">
                  @csrf
                  <button type="submit" class="btn btn-sm btn-error btn-block">Reject</button>
                </form>
              </div>
              <div class="col-span-12 flex gap-4">
                  <div class="flex gap-1 align-middle">
                    <span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#004d93" class="bi bi-calendar" viewBox="0 0 16 16">
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                      </svg>
                    </span>
                    @php
                      \Carbon\Carbon::setLocale('id');
                      $date = $item->created_at; // Ganti dengan variabel tanggal yang sesuai
                      $formattedDate = \Carbon\Carbon::parse($date)->translatedFormat('d M Y');
                    @endphp
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
          </div>
          <div class="divider"></div>
          @endforeach
        @else
        <div class="text-center font-bold text-primary">Tidak ada data</div>
        @endif
      </div>
      <div id="selesai" class="tab-content hidden">
        @if($portofolio_selesai && $portofolio_selesai->isNotEmpty())
          @foreach($portofolio_selesai as $item)
          <div>
            <div class="grid grid-cols-12">
              <div class="col-span-12">
                <div class="text-primary font-bold">{{$item->nama_obligasi}} Seri {{$item->kode_obligasi}}</div>
              </div>
              <div class="col-span-8 mb-2">
                  <div class="text-cyan-500 font-bold mb-2">{{ $item->username }}</div>
                  <div class="text-cyan-500 font-bold">IDR {{ number_format($item->nominal_transaksi, 2, ',', '.') }}</div>
              </div>
              <div class="col-span-4 flex flex-col justify-between">
                @php
                    $badgeClass = '';
                    $namaStatus = '';
                    if ($item->id_status == '1') {
                        $badgeClass = 'badge-info';
                        $namaStatus = 'Diproses';
                    } elseif ($item->id_status == '2') {
                        $badgeClass = 'badge-success';
                        $namaStatus = 'Approved';
                    } else {
                        $badgeClass = 'badge-error';
                        $namaStatus = 'Reject';
                    };
                @endphp
                <div class="badge {{$badgeClass}} badge-lg w-full">{{$namaStatus}}</div>
              </div>
              <div class="col-span-12 flex gap-4">
                  <div class="flex gap-1 align-middle">
                    <span>
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#004d93" class="bi bi-calendar" viewBox="0 0 16 16">
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                      </svg>
                    </span>
                    @php
                      \Carbon\Carbon::setLocale('id');
                      $date = $item->created_at; // Ganti dengan variabel tanggal yang sesuai
                      $formattedDate = \Carbon\Carbon::parse($date)->translatedFormat('d M Y');
                    @endphp
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
          </div>
          <div class="divider"></div>
          @endforeach
        @else
          <div class="text-center font-bold text-primary">Tidak ada data</div>
        @endif
      </div>
    </div>
    <div class="lg:min-h-10 min-h-12"></div>
  </div>
  @push('down-scripts')
  <script>
    window.onload = function() {
      localStorage.removeItem('inputValue');
      localStorage.removeItem('totalNominal');
    };
    document.addEventListener("DOMContentLoaded", function() {
      const tabs = document.querySelectorAll("[role='tab']");
      const tabContents = document.querySelectorAll(".tab-content");

      tabs.forEach(tab => {
        tab.addEventListener("click", function() {
          // Remove active class from all tabs
          tabs.forEach(t => t.classList.remove("tab-active"));
          // Hide all tab contents
          tabContents.forEach(content => content.classList.add("hidden"));

          // Add active class to clicked tab
          tab.classList.add("tab-active");

          // Show corresponding tab content
          const activeTabContent = document.getElementById(tab.dataset.tab);
          if (activeTabContent) {
            activeTabContent.classList.remove("hidden");
            activeTabContent.classList.add("block");
          }
        });
      });
    });


  </script>
  @endpush
</x-layout.admin-layout>