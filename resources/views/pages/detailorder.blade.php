<x-layout.admin-layout>
  <div class="container px-4 h-full flex flex-col" style="background-image: url('{{asset('assets/detailorder.png')}}') ; background-size: cover;">
    <div class="lg:min-h-10 min-h-12"></div>
    <center class="mb-16">
      @if($porto->id_status == 1)
        <img src="{{asset('assets/wait.png')}}" alt="" width="80px" srcset="" class="mb-4">
      @elseif($porto->id_status == 2)
        <img src="{{asset('assets/success.png')}}" alt="" width="80px" srcset="" class="mb-4">
      @else
        <img src="{{asset('assets/fail.png')}}" alt="" width="80px" srcset="" class="mb-4">
      @endif
      <div class="text-2xl {{($porto->id_status == 1) ? 'text-primary' : (($porto->id_status == 2) ? 'text-green-700' : 'text-red-700')}} font-bold">{{$porto->nama_status}}</div>
      <div class="text-lg text-black font-bold">{{$porto->nama_obligasi}} Seri {{$porto->kode_obligasi}}</div>
    </center>
    <div class="text-2xl font-bold">
      IDR {{ number_format($porto->nominal_akhir, 2, ',', '.') }}
    </div>
    <div class="divider"></div>
    <div class="flex-grow overflow-auto no-scrollbar">
      <div class="mb-4">
        <div class="text-xs text-gray-500">Biaya Admin</div>
        <div class="font-bold">IDR {{ number_format($porto->biaya_admin, 2, ',', '.') }}</div>
      </div>
      <div class="mb-4">
        <div class="text-xs text-gray-500">Kupon Berjalan</div>
        <div class="font-bold">IDR 0.00</div>
      </div>
      <div class="mb-4">
        <div class="text-xs text-gray-500">Nominal Total Transaksi</div>
        <div class="font-bold">IDR {{ number_format($porto->nominal_transaksi, 2, ',', '.') }}</div>
      </div>
      <div class="mb-4">
        <div class="text-xs text-gray-500">Rekening Sumber Dana</div>
        <div class="font-bold">025-999-6456</div>
      </div>
      <div class="mb-4">
        <div class="text-xs text-gray-500">No. Referensi</div>
        <div class="font-bold">M220111093520002</div>
      </div>
      <div class="mb-4">
        <div class="text-xs text-primary">Catatan</div>
        <article class="prose">
          <ul class="list-disc text-xs">
            <li>Transaksi pembelian Obligasi Pasar Sekunder akan menambah portofolio Anda dan terlihat di mutasi rekening setelah proses settlement berhasil. estimasi 2-3 hari kerja.</li>
          </ul>
        </article>
      </div>
    </div>
    <div class="mb-4">
      <div class="grid grid-cols-12 gap-2">
        <div class="col-span-6"><button class="btn btn-outline btn-block rounded-3xl btn-primary">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-share-fill" viewBox="0 0 16 16">
            <path d="M11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.5 2.5 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5"/>
            </svg>
          </span>BAGIKAN</button>
        </div>
        <div class="col-span-6"><button class="btn btn-outline btn-block rounded-3xl btn-primary">
          <span>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
            <path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5"/>
            <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708z"/>
            </svg>
          </span>SIMPAN</button>
        </div>
      </div>
    </div>
    <div class="mb-8">
      <a href="{{route('menu.index')}}" class="btn btn-block rounded-3xl btn-primary font-bold">SELESAI</a>
    </div>
    <!-- <div class="h-8"></div> -->
  </div>
  @push('down-scripts')
  <script>
    
  </script>
  @endpush
</x-layout.admin-layout>