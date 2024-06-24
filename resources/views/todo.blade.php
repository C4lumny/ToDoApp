<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ToDo Master</title>
    @vite('resources/css/app.css')
    <link rel="icon" href="{{ asset('/icons/rocket.svg') }}" type="image/x-icon">
</head>

<body class="bg-[#1A1A1A] flex flex-col justify-center items-center">
    {{-- Header 🚀 --}}
    <div class="flex justify-center items-center bg-[#0D0D0D] h-52 font-black text-4xl w-full">
        <img src="{{ asset('icons/rocket.svg') }}" alt="">
        <span class="text-[#4EA8DE]">ToDo</span><span class="text-[#8284FA]">Master</span>
    </div>

    <form method="POST" action="{{ route('logout') }}" class="absolute right-0 top-0 mt-4 mr-4">
        @csrf
        <x-danger-button type="submit" class="text-red-500">
            {{ __('Logout') }}
        </x-danger-button>
    </form>

    {{-- Create a new task ✅ --}}
    <form
        class="mx-auto mt-12 flex gap-2 justify-center px-10 sm:px-0 items-center w-full max-w-md sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl"
        action="{{ route('todos.store') }}" method="POST">
        @csrf

        <input name="title" type="text" placeholder="Añada una nueva tarea"
            class="bg-[#262626] rounded-lg p-4 w-full border-none focus:outline-none">
        <button
            class="py-4 px-5 flex gap-2 items-center justify-center rounded-lg bg-[#1E6F9F] items-center hover:bg-[#4EA8DE]">
            <span>Crear</span>
            <img src="{{ asset('icons/plus.svg') }}" alt="">
        </button>
    </form>

    {{-- Success message ✅ --}}
    @if (session('success'))
        <div class="w-full flex justify-center items-center">
            <div class="mt-8 w-[46rem] text-green-700">
                {{ session('success') }}
            </div>
        </div>
    @endif

    {{-- Error message ❌ --}}
    @error('title')
        <div class="w-full flex justify-center items-center">
            <div class="mt-8 w-[46rem] text-red-700">
                {{ $message }}
            </div>
        </div>
    @enderror

    {{-- Tasks 📝 --}}
    <div
        class="w-screen items-center flex justify-center px-10 sm:px-0 max-w-md sm:max-w-md md:max-w-lg lg:max-w-xl xl:max-w-2xl">
        <div
            class="flex flex-col items-center justify-center {{ session('success') || session('errors') ? 'mt-2' : 'mt-12' }} w-[46rem]">
            <div class="flex justify-between w-full">
                <div class="flex items-center gap-2 ">
                    <span class="text-sm font-bold text-[#4EA8DE]">
                        Tareas creadas
                    </span>
                    <div class="rounded-full bg-[#333333] px-2 py-[2px]">
                        {{ count($todos) }}
                    </div>
                </div>
                <div class="flex items-center gap-2 ">
                    <span class="text-sm font-bold text-[#8284FA]">
                        Finalizadas
                    </span>
                    <div class="rounded-full bg-[#333333] px-2 py-[2px]">
                        {{ count($todos->where('status', true)) }} de {{ count($todos) }}
                    </div>
                </div>


            </div>
            {{-- ToDo card 🗃️ --}}
            <div class="w-full my-6 space-y-5">
                @if (count($todos) == 0)
                    <div class="flex flex-col justify-center items-center mt-4 text-center">
                        <img src="{{ asset('icons/Clipboard.svg') }}" alt="">

                        <span class="mt-5 text-[#808080] font-bold">¡Ops! Parece que aún no tienes tareas
                            registradas</span>
                        <span class="text-[#808080]">Crea tareas y organiza tus pendientes</span>
                    </div>
                @endif
                @foreach ($todos as $todo)
                    <div class="flex justify-between items-center bg-[#262626] p-4 rounded-lg">
                        <form action="{{ route('todos.update', $todo->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="checkbox" name="status" id="{{ $todo->id }}"
                                class=" rounded-full checked:border-[#5E60CE] checked:bg-[#5E60CE] bg-transparent border-[#4EA8DE] hover:bg-[#1E6F9F]"
                                @if ($todo->status) checked @endif onchange="this.form.submit()">
                            <label for="{{ $todo->id }}"
                                class="font-inter text-sm flex-grow mx-4 {{ $todo->status ? 'line-through' : '' }} ">{{ $todo->title }}</label>
                        </form>
                        <div class="flex gap-2">
                            <form action="{{ route('todos.destroy', $todo->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="size-4">
                                    <img src="{{ asset('icons/trash.svg') }}" alt="">
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
                <div class="mt-4">
                    {{ $todos->links() }}
                </div>
            </div>
        </div>
    </div>

</body>

</html>
