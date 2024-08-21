<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyBCA</title>
  @vite('resources/css/app.css')
</head>
<body class="flex flex-col min-h-screen justify-items-center">
  <div class="h-full hidden lg:block" style="background-image: url('{{asset('assets/bg.jpg')}}') ; background-size: cover;">
    <div class="flex flex-col min-h-screen align-middle place-content-center">
      <div class="grid grid-cols-12">
        <div class="lg:col-span-4 flex justify-center col-span-12">
          <div class="mockup-phone">
            <div class="camera"></div>
            <div class="display">
              <div class="artboard artboard-demo phone-4 h-100 bg-gray-100">
                {{ $slot }}
              </div>
            </div>
          </div>
        </div>
        <div class="lg:col-span-8 col-span-12">
          <div class="text-7xl font-bold text-primary mb-10">WELMA+</div>
          <div class="text-3xl text-blue-500">Prototipe fitur order obligasi melalui MyBCA</div>
        </div>
      </div>
    </div>
  </div>
  <div class="block lg:hidden min-h-screen">
    <div class="flex flex-col min-h-screen align-middle place-content-center">
      <div class="grid grid-cols-12">
        <div class="col-span-12 h-screen">
          {{ $slot }}
        </div>
      </div>
    </div>
  </div>
  @stack('down-scripts')
</body>
</html>