<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calificar ticket</title>
    @vite('resources/css/app.css')
</head>

<style>
    .active_excelente {
        background-color: rgb(220 252 231);
        border: solid 2px rgb(187 247 208);
    }

    .active_aceptable {
        background-color: rgb(224 242 254);
        border: solid 2px rgb(219 234 254);
    }

    .active_regular {
        background-color: rgb(252 231 243);
        border: solid 2px rgb(251 207 232);
    }

    .noactive {
        background-color: rgb(249 250 251);
        border: none;
    }
</style>

<body class="bg-gray-100">

    <form action="{{ route('feedback.store') }}" method="post">

        @csrf

        <input type="hidden" name="encrypted" value="{{ $tokenEncrypted }}">
      
        <div
            class="container shadow-lg bg-white rounded-lg   w-96 sm:w-3/4 xl:w-2/4 2xl:w-2/5 flex flex-col text-center mx-auto mb-10 mt-10">
            <div class=" text-center mx-auto w-auto text-2xl  mb-5 mt-9 ">
                <p class="mx-16  font-semibold   ">
                    ¿Cómo calificas la atención que te hemos brindado en la solución del caso

                    <span class="text-pink-700">#{{ $ticket_number }}?</span>

                </p>
            </div>
            <div class=" sm:mx-auto mx-auto mb-1 ">
                <div class="grid grid-cols-1 md:grid-cols-3 md:flex mx-3  sm:mx-auto sm:mt-9">
                    <li class="list-none">
                        <input type="radio" name="rating" id="excelente" value="3"
                            class="hidden btn excelente peer">
                        <label for="excelente" id="excelente_label"
                            class="excelente {{ $ticket_rating == 3 ? 'active_excelente' : '' }} flex flex-col  select-none cursor-pointer  mb-4 peer-checked:border-solid peer-checked:border-2 peer-checked:border-green-200  peer-checked:bg-green-100 rounded-lg  w-28 sm:w-28 lg:w-34 xl:w-36 sm:mx-4 md:w-32 h-24 lg:h-28 md:mx-5 lg:mx-4 bg-gray-50 hover:bg-green-100 ">
                            <p class="text-xl mt-2">
                                ¡Excelente!
                            </p>
                            <img class="w-18 h-18 mt-1 mx-9 "src="{{ asset('images/excelente.gif') }}">
                        </label>
                    </li>
                    <li class="list-none">
                        <input type="radio" name="rating" id="aceptable" value="2"
                            class="hidden peer btn aceptable">
                        <label for="aceptable" id="aceptable_label"
                            class=" flex flex-col select-none {{ $ticket_rating == 2 ? 'active_aceptable' : '' }} peer-checked:border-solid peer-checked:border-2 peer-checked:border-blue-100 peer-checked:bg-sky-100 cursor-pointer mb-4  rounded-lg  w-28 sm:w-28 lg:w-34 xl:w-36 sm:mx-4 md:w-32 h-24 lg:h-28 md:mx-5 lg:mx-4 bg-gray-50 hover:bg-blue-50">
                            <p class="text-xl mt-2">
                                Aceptable
                            </p>
                            <img class="w-18 h-18 mt-1 mx-9 " src="{{ asset('images/aceptable2.gif') }}">
                        </label>
                    </li>
                    <li class="list-none">
                        <input type="radio" name="rating" id="regular" value="1"
                            class="hidden btn regular peer">
                        <label for="regular" id="regular_label"
                            class=" flex flex-col select-none {{ $ticket_rating == 1 ? 'active_regular' : '' }} peer-checked:border-solid peer-checked:border-2 peer-checked:border-pink-200 peer-checked:bg-pink-100 cursor-pointer mb-4  rounded-lg  w-28 sm:w-28 lg:w-34 xl:w-36 sm:mx-4 md:w-32 h-24 lg:h-28 md:mx-5 lg:mx-4 bg-gray-50 hover:bg-pink-100">
                            <p class="text-xl mt-2">
                                Regular
                            </p>
                            <img class="w-18 h-18 mt-1 mx-9 " src="{{ asset('images/triste.gif') }}">
                        </label>
                    </li>
                </div>
            </div>
            <div class=" text-center mx-auto w-auto text-2xl  mb-5 mt-9 ">
                <p class="mx-16 text-xl   text-gray-500 ">
                    ¿Te gustaría compartirnos algún comentario
                    o sugerencia?
                </p>
            </div>
            <div>
                <textarea class="border border-gray-300 rounded-lg mb-5 w-60 md:w-auto mx-2" name="comments" cols="70"
                    rows="5"></textarea>
            </div>
            <div>
                <button type="submit" id="submitButton" value="Submit" onclick="submitForm(this);"
                    class=" py-1 px-4 mb-9 font-bold text-md sm:text-lg transition ease-in-out delay-150 hover:-translate-y-1 hover:scale-110  duration-300  bg-pink-800 hover:bg-pink-700 active:bg-pink-700 focus:outline-none focus:ring focus:ring-violet-300 text-white rounded-2xl h-10 w-28 text-center">
                    Enviar
                </button>
            </div>
    </form>
    </div>
    <script>
        function submitForm(btn) {
            // disable the button
            btn.disabled = true;
            // submit the form    
            btn.form.submit();
        }

        function change() {

            document.getElementById("aceptable_label").classList.add("noactive");
            document.getElementById("regular_label").classList.add("noactive");
            document.getElementById("excelente_label").classList.add("active_excelente");
        }
        document.getElementById('excelente').onclick = function() {
            change();
        }

        function change2() {
            document.getElementById("excelente_label").classList.add("noactive");
            document.getElementById("regular_label").classList.add("noactive");
            document.getElementById("aceptable_label").classList.add("active_aceptable");
        }

        document.getElementById('aceptable').onclick = function() {
            change2();
        }

        function change3() {
            document.getElementById("aceptable_label").classList.add("noactive");
            document.getElementById("regular_label").classList.add("active_regular");
            document.getElementById("excelente_label").classList.add("noactive");
        }

        document.getElementById('regular').onclick = function() {
            change3();
        }

        history.forward()
    </script>
</body>
</html>
