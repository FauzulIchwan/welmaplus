<x-layout.admin-layout>
  <div class="relative h-full w-full">
    <div class="container px-4 h-full" style="background-image: url('assets/login.png') ; background-size: cover;">
      <div class="lg:h-52 h-60"></div>
      <div>
        <form action="{{ route('login.auth') }}" method="POST">
          @csrf
          <label class="form-control w-full">
            <div class="label">
              <span class="label-text text-primary font-bold">BCA ID</span>
            </div>
            <input type="text" name="username" value="andhikapratama" placeholder="Type here" class="input input-bordered input-sm w-full" />
          </label>
          <label class="form-control w-full mb-5">
            <div class="label">
              <span class="label-text text-primary font-bold">Password</span>
            </div>
            <input type="password" name="password" placeholder="Type here" value="bcabca" class="input input-bordered w-full input-sm" />
          </label>
          <div class="flex justify-between mb-6">
            <div class="text-cyan-500 text-xs">Lupa BCA ID</div>
            <div class="text-cyan-500 text-xs">Lupa password</div>
          </div>
          <button type="submit" class="btn btn-block btn-primary rounded-3xl">Masuk</button>
        </form>
      </div>
    </div>
  </div>
</x-layout.admin-layout>