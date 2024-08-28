<x-layout.admin-layout>
  <div class="container px-4 h-full flex flex-col" style="background-image: url('{{ asset('assets/admin.png') }}') ; background-size: cover;">
    <div class="min-h-12"></div>
    <div class="min-h-12 mb-4">
      <a href="{{route('menu.index')}}" class="block h-full w-full bg-transparent text-black text-center"></a>
    </div>
    <div class="flex-grow">
      <iframe src="https://docs.google.com/gview?url={{ asset('assets/Portofolio.pdf') }}&embedded=true&pli=1" width="100%" height="600px" class="rounded-lg mb-5"></iframe>
    </div>
     <center>
      <a href="{{ asset('assets/Portofolio.pdf') }}" download class="btn btn-block btn-primary mb-5">Download PDF</a>
     </center>
  </div>
</x-layout.admin-layout>