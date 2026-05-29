@vite(['resources/css/app.css'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student || Add New Student</title>
</head>
<body class="bg-gray-50 dark:bg-gray-900">
    <div class="w-[80%] mx-auto my-20">
        {{-- header --}}
        @include('header')

        {{-- new student form --}}
        <div class="bg-white dark:bg-gray-800 dark:text-white mt-5 p-4 rounded shadow-xl w-full max-w-150 m-auto">
            <h1 class="text-2xl font-semibold text-center text-gray-600 dark:text-white uppercase">Registration Form</h1>
            
            <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" >
                @csrf

                {{-- student name --}}
                <div class="my-3">
                    <label for="">Name : </label>
                    <input 
                    type="text"
                    placeholder="Enter name" 
                    name="name"
                    value="{{ old('name') }}"
                    class="w-full mt-1 outline-2 p-1.5 rounded outline-gray-400 focus:outline-blue-400"
                    >
                    <span class="text-red-500">
                        @error('name') {{ $message }} @enderror
                    </span>
                </div>
              
                {{-- student email --}}
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

                {{-- student age --}}
                <div class="my-3">
                    <label for="">Age : </label>
                    <input 
                    type="number" 
                    placeholder="enter age"   
                    name="age"
                    value="{{ old('age') }}"
                    class="w-full mt-1 outline-2 p-1.5 rounded outline-gray-400 focus:outline-blue-400"
                    >
                    <span class="text-red-500">
                        @error('age') {{ $message }} @enderror
                    </span>
                </div>

                {{-- student course --}}
                 <div class="my-3">
                    <label for="course">Course : </label>
                    <select 
                    name="course" 
                    id="course"
                    class="w-full mt-1 outline-2 p-1.5 rounded outline-gray-400 focus:outline-blue-400 dark:bg-gray-700"
                    >
                        <option value="">Select Course</option>
                        @foreach ($courses as $course)
                            <option value="{{ $course -> id }}"> {{ $course -> name }} </option>
                        @endforeach
                    </select>
                    <span class="text-red-500">
                        @error('course') {{ $message }} @enderror
                    </span>
                </div>

                {{-- student profile photo --}}
                <div class="my-6 "> 
                    <label for="uploadfile" class="outline-2 rounded p-1.5 w-full text-center block text-black cursor-pointer  bg-gray-400">UPLOAD FILE</label>
                    <input 
                    type="file" 
                    placeholder="enter course"   
                    name="file"
                    id="uploadfile"
                    accept="image/*"
                    class="w-full mt-1  outline-2 p-1.5 rounded outline-gray-400 focus:outline-blue-400"
                    >
                    <span class="text-red-500">
                        @error('file') {{ $message }} @enderror
                    </span>
                </div>

                {{-- submit button --}}
                <div class="flex justify-center items-center mt-10">
                    <button type="submit" class="bg-blue-400 text-white px-6 py-2 rounded cursor-pointer uppercase">submit</button>
                </div>
            </form>
        </div>
       

    </div>
</body>
</html>
