@vite(['resources/css/app.css'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Course || Update Course</title>
</head>
<body class="bg-gray-50 dark:bg-gray-900">
    <div class="w-[80%] mx-auto my-20">
        {{-- header --}}
        @include('header')

        {{-- update course form --}}
        <div class="bg-white dark:bg-gray-800 dark:text-white mt-5 p-4 rounded shadow-xl w-full max-w-150 m-auto">
            <h1 class="text-2xl font-semibold text-center text-gray-600 dark:text-white uppercase">Update course</h1>
            
            <form action="{{ route('courses.update',$course -> id) }}" method="POST"  >
                @csrf
                @method('PUT')
                {{-- course name --}}
                <div class="my-3">
                    <label for="">Course Name : </label>
                    <input 
                    type="text"
                    placeholder="Enter name" 
                    name="name"
                    value="{{ $course -> name }}"
                    class="w-full mt-1 outline-2 p-1.5 rounded outline-gray-400 focus:outline-blue-400"
                    >
                    <span class="text-red-500">
                        @error('name') {{ $message }} @enderror
                    </span>
                </div>
              
                {{-- course duration --}}
                <div class="my-3">
                    <label for="">Course Duration : </label>
                    <input 
                    type="number" 
                    placeholder="course duration"   
                    name="duration"
                    value="{{ $course -> duration }}"
                    class="w-full mt-1 outline-2 p-1.5 rounded outline-gray-400 focus:outline-blue-400"
                    >
                    <span class="text-red-500">
                        @error('email') {{ $message }} @enderror
                    </span>
                </div>

                {{-- course description --}}
                <div class="my-3">
                    <label for="">Description : </label>
                    <textarea name="description" id="" cols="30" rows="8"
                    placeholder="course description..."
                    class="w-full mt-1 outline-2 p-1.5 rounded outline-gray-400 focus:outline-blue-400"
                    >{{ $course -> description }}</textarea>
                    <span class="text-red-500">
                        @error('description') {{ $message }} @enderror
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

