{{-- Colors list for the lil project 🖌️
- Blue: #4EA8DE
- Dark blue: #1E6F9F
- Purple: #8284FA
- Purple-Dark: #5E60CE

--}}
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-[#1A1A1A] relative">
    {{-- Header 🚀 --}}
    <div class="flex justify-center items-center bg-[#0D0D0D] h-52 font-black text-4xl">
        <img src="{{ asset('icons/rocket.svg') }}" alt="">
        <span class="text-[#4EA8DE]">ToDo</span><span class="text-[#8284FA]">Master</span>
    </div>

    {{-- Create a new task ✅ --}}
    <div class="absolute top-44 left-1/2 transform -translate-x-1/2 flex gap-2 justify-center items-center">
        <input type="text" placeholder="Añada una nueva tarea"
            class="bg-[#262626] rounded-lg p-4 w-[39rem] border-none focus:outline-none">
        <button class="p-4 flex gap-2 rounded-lg bg-[#1E6F9F] items-center hover:bg-[#4EA8DE]">
            Crear
            <img src="{{ asset('icons/plus.svg') }}" alt="">
        </button>
    </div>

    {{-- Tasks 📝 --}}
    <div class="w-screen flex justify-center">
        <div class="flex flex-col items-center justify-center mt-16 w-1/2">
            <div class="flex justify-between w-full px-10">
                <div class="flex items-center gap-2 ">
                    <span class="text-sm font-bold text-[#4EA8DE]">
                        Tareas creadas
                    </span>
                    <div class="rounded-full bg-[#333333] px-2 py-[2px]">
                        0
                    </div>
                </div>
                <div class="flex items-center gap-2 ">
                    <span class="text-sm font-bold text-[#8284FA]">
                        Finalizadas
                    </span>
                    <div class="rounded-full bg-[#333333] px-2 py-[2px]">
                        0
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
