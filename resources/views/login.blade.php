@vite(['resources/css/app.css'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User || Login</title>
</head>
<body class="bg-linear-to-r from-[#FBE8CE] to-[#C3CC9B] dark:bg-gray-900">
        @session('status')
         <h1 class="bg-red-200 text-red-700 outline-1 outline-red-700 p-4 rounded-2xl text-lg w-100 mt-2 fixed top-5 right-5 "> {{ session('status') }} </h1>   
        @endsession
    <div class="w-[80%] mx-auto my-40">

        {{-- login form --}}
        <div class="bg-white dark:bg-gray-800 dark:text-white  px-5 py-10 rounded shadow-xl w-full max-w-120  mx-auto">
            <h1 class="text-2xl font-semibold text-center text-gray-600 dark:text-white uppercase">Login Form</h1>
            
            <form action="{{ route('login-process') }}" method="POST" enctype="multipart/form-data"
            class="pt-5"
            >
                @csrf
              
                {{-- user email --}}
                <div class="my-3">
                    <label for="">Email : </label>
                    <input 
                    type="email" 
                    placeholder="example@gmail.com"   
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full mt-1 outline-2 p-1.5 rounded outline-gray-400 focus:outline-blue-400"
                    >
                    <span class="text-red-500">
                        @error('email') {{ $message }} @enderror
                    </span>
                </div>

                {{-- user password --}}
                <div class="my-8">
                    <label for="">Password : </label>
                    <input 
                    type="password"
                    placeholder="Enter password" 
                    name="password"
                    value="{{ old('password') }}"
                    class="w-full mt-1 outline-2 p-1.5 rounded outline-gray-400 focus:outline-blue-400"
                    >
                    <span class="text-red-500">
                        @error('password') {{ $message }} @enderror
                    </span>
                </div>

                {{-- login button --}}
                <div class="flex justify-center items-center mt-10">
                    <button type="submit" class="bg-blue-400 text-white px-6 py-2 rounded cursor-pointer ">Login</button>
                </div>
            </form>
        </div>
       

    </div>
</body>
</html>
