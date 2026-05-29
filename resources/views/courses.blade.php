@vite(['resources/css/app.css'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>
</head>
<body class="dark:bg-gray-900">
    <div class="w-[80%] mx-auto my-20 ">
        
        {{-- header --}}
        @include('header')

        @session('status')
         <h1 class="bg-green-200 text-green-700 outline-1 outline-green-700 p-4 rounded-2xl text-lg w-100 mt-2 fixed top-5 right-5 "> {{ session('status') }} </h1>   
        @endsession
        {{-- student table --}}
        <table class="w-full bg-gray-50 mt-10">
            <thead>
                <tr class="bg-gray-300 dark:bg-gray-800 dark:text-white">
                    <th class="p-2">Course Name</th>
                    <th class="p-2">Duration</th>
                    <th class="p-2">Description</th>
                    <th class="p-2">Totals Students</th>
                    <th class="p-2">Edit</th>
                    <th class="p-2">Delete</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($courses as $course)

                    <tr class="text-center text-gray-600 dark:text-white odd:bg-gray-100 even:bg-gray-50 dark:even:bg-gray-600 dark:hover:bg-gray-700 dark:odd:bg-gray-500 hover:bg-gray-200">
                        <td class="p-2">{{ $course -> name }}</td>
                        <td class="p-2">{{ $course -> duration }}</td>
                        <td class="p-2">{{ $course -> description }}</td>
                        <td class="p-2">{{ $course -> students_count }}</td>
                        <td>
                            <a href="{{ route('courses.edit',$course -> id) }}" class="text-green-500 cursor-pointer">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('courses.destroy',$course -> id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 cursor-pointer">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</body>
</html>
