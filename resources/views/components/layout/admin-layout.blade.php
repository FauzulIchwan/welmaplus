<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBCA</title>
    @vite('resources/css/app.css')
    </head>
    <body class=" min-h-[929px] justify-items-center bg-gray-200" style="background-image: url('{{asset('assets/bg.jpg')}}') ; background-size: cover;">
			<div class="md:w-[425px] w-full mx-auto lg:border-2 lg:border-primary">
        <div class="flex flex-col min-h-[929px] align-middle place-content-center">
            <div class="grid grid-cols-12">
                <div class="col-span-12 min-h-[929px]">
                {{ $slot }}
                </div>
            </div>
        </div>
			</div>
    @stack('down-scripts')
    </body>
</html>