<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Error</title>
    @vite('resources/css/app.css')

</head>
<body>
    <div class="container shadow-lg bg-white rounded-lg mb-16 h-auto w-96 sm:w-3/4 xl:w-2/4 2xl:w-2/5 flex flex-col text-center mx-auto  mt-28">
        <div class=" text-center    mx-auto w-auto text-2xl   my-24 mb-17">
            <div class="mb-4 ">

                @if ($message == 'Petición inválida')
                <img class=" w-28 md:w-32 mx-auto mt-4 "
                src="{{ asset ('images/x.gif') }}">
                @else
                    <img class=" w-28 md:w-32 mx-auto mt-4 animate-bounce animate-infinite animate-ease-linear animate-normal animate-fill-forwards "
                src="{{ asset ('images/waring.gif') }}">
                @endif                
            </div>
            <div class="mb-7">
                <p class="mx-16 mt-10 text-lg sm:text-3xl font-semibold text-neutral-600  mb-26   px-9 rounded-lg py-1 ">
                    {{ $message }}                                     
                </p>
            </div>
        </div>
    </div>
</body>
</html>