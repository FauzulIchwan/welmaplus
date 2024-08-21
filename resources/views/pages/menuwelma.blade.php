<x-layout.admin-layout>
  <div class="container px-4 h-full" style="background-image: url('assets/welma.png') ; background-size: cover;">
    <div class="lg:h-12 h-12"></div>
    <div class="lg:h-12 h-12">
      <a href="{{route('menu.index')}}" class="block h-full w-full bg-transparent text-black text-center"></a>
    </div>
    <div class="lg:h-40 h-36"></div>
    <div class="text-primary px-12 mb-10 mt-7 lg:mt-3">{{$SID}}</div>
    <div class="lg:h-60 h-56"></div>
    <div class=" h-32 mb-7">
      <a href="{{route('obligasi.index')}}" class="block h-full w-full bg-transparent text-black text-center"></a>
    </div>
    <div class="h-24 w-9/12">
      <a href="{{route('portofolio.index')}}" class="block h-full w-full bg-transparent text-black text-center"></a>
    </div>
  </div>
</x-layout.admin-layout>