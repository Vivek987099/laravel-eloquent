<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css'])
    <title>Student || Single Student</title>
</head>
<body>


        <div class="w-[80%] mx-auto my-20">
        {{-- header --}}
        @include('header')

        {{-- student details --}}
        <div class="bg-white dark:bg-gray-800 dark:text-white mt-5 p-4 rounded shadow-xl w-full max-w-150 m-auto">
            <h1 class="text-2xl font-semibold text-center text-gray-600 dark:text-white uppercase">student details</h1>
            
            <div>
                {{-- student profile photo --}}
                <div class="my-3 ">
                    <img src="{{ asset('/storage/'.$student -> file) }}" 
                    id="profile"
                    class="h-30 w-30 rounded-full object-cover outline-4 outline-green-500 mx-auto mt-7"
                    alt="profile">
                </div>

                {{-- student name --}}
                <div class="my-3">
                    <label for="">Student Name : </label>
                    <input 
                    type="text"
                    readonly
                    value="{{ $student -> name }}"
                    class="w-full mt-1 outline-2 p-1.5 rounded outline-gray-400 "
                    >
                </div>
              
                {{-- student age --}}
                <div class="my-3">
                    <label for="">Student Email : </label>
                    <input 
                    type="text"
                    readonly 
                    value="{{ $student -> email }}"
                    class="w-full mt-1 outline-2 p-1.5 rounded outline-gray-400 "
                    >
                </div>

                <div class="my-3">
                    <label for="">Student Age : </label>
                    <input 
                    type="text"
                    readonly 
                    value="{{ $student -> age }}"
                    class="w-full mt-1 outline-2 p-1.5 rounded outline-gray-400"
                    >
                </div>

                {{-- student age --}}
                <div class="my-3">
                    <label for="">Student Course : </label>
                    <input 
                    type="text"
                    readonly 
                    value="{{ $student -> course -> name }}"
                    class="w-full mt-1 outline-2 p-1.5 rounded outline-gray-400 "
                    >
                </div>
            </div>
        </div>
       

    </div>
    
</body>
</html>
