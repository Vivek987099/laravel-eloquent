@vite(['resources/css/app.css'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User || Add New User</title>
</head>
<body class="bg-gray-50 dark:bg-gray-900">
    <div class="w-[80%] mx-auto my-20">
        {{-- header --}}
        @include('header')

        {{-- add user form --}}
        <div class="bg-white dark:bg-gray-800 dark:text-white mt-5 p-4 rounded shadow-xl w-full max-w-150 m-auto">
            <h1 class="text-2xl font-semibold text-center text-gray-600 dark:text-white uppercase">add new User</h1>
            
            <form action="{{ route('users.store') }}" method="POST"  >
                @csrf

                {{-- user name --}}
                <div class="my-3">
                    <label for="">User Name : </label>
                    <input 
                    type="text"
                    placeholder="Enter name" 
                    name="name"
                    class="w-full mt-1 outline-2 p-1.5 rounded outline-gray-400 focus:outline-blue-400"
                    >
                    <span class="text-red-500">
                        @error('name') {{ $message }} @enderror
                    </span>
                </div>
              
                {{-- user email --}}
                <div class="my-3">
                    <label for="">User Email : </label>
                    <input 
                    type="email" 
                    placeholder="example@gmail.com"   
                    name="email"
                    class="w-full mt-1 outline-2 p-1.5 rounded outline-gray-400 focus:outline-blue-400"
                    >
                    <span class="text-red-500">
                        @error('email') {{ $message }} @enderror
                    </span>
                </div>

                {{-- user password --}}
                <div class="my-3">
                    <label for="">Password : </label>
                    <input name="password"
                    type="password"
                    placeholder="enter password"
                    class="w-full mt-1 outline-2 p-1.5 rounded outline-gray-400 focus:outline-blue-400"
                    >
                    <span class="text-red-500">
                        @error('password') {{ $message }} @enderror
                    </span>
                </div>

                {{-- user confirm password --}}
                <div class="my-3">
                    <label for="">Confirm Password : </label>
                    <input name="password_confirmation"
                    type="password"
                    placeholder="confirm password"
                    class="w-full mt-1 outline-2 p-1.5 rounded outline-gray-400 focus:outline-blue-400"
                    >
                    <span class="text-red-500">
                        @error('password_confirmation') {{ $message }} @enderror
                    </span>
                </div>

                {{--  user role  --}}
                <div class="my-3">
                    <h5 >Assign One or More Role : </h5> 
                    @foreach ($roles as $role)
                    <div class="flex">
                        <input 
                        type="checkbox"
                        name="role[]" 
                        id="role{{  $role -> id }}"
                        value="{{ $role -> id }}"
                        class="block m-2"
                        >
                        <label for="role{{ $role -> id }}">{{ $role -> name }}</label>
                    </div> 
                   
                    @endforeach
                    <span class="text-red-500">
                        @error('role') {{ $message }} @enderror
                    </span>
                </div>

                {{-- submit button --}}
                <div class="flex justify-center items-center mt-10">
                    <button type="submit" class="bg-blue-400 text-white px-6 py-2 rounded cursor-pointer ">submit</button>
                </div>
            </form>
        </div>
       

    </div>
</body>
</html>

