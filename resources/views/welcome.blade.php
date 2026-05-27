@vite(['resources/css/app.css'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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
                    <th class="p-2">Profile</th>
                    <th class="p-2">Name</th>
                    <th class="p-2">Email</th>
                    <th class="p-2">Age</th>
                    <th class="p-2">Course</th>
                    <th class="p-2">View</th>
                    <th class="p-2">Edit</th>
                    <th class="p-2">Delete</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($students as $student)

                    <tr class="text-center text-gray-600 dark:text-white odd:bg-gray-100 even:bg-gray-50 dark:even:bg-gray-600 dark:hover:bg-gray-700 dark:odd:bg-gray-500 hover:bg-gray-200">
                        <td class="p-2">
                            <img src="{{ asset('/storage/'. $student -> file ) }}" class="w-10 h-10 rounded-full object-cover" alt="profile">
                        </td>
                        <td class="p-2">{{ $student -> name }}</td>
                        <td class="p-2">{{ $student -> email }}</td>
                        <td class="p-2">{{ $student -> age }}</td>
                        <td class="p-2">{{ $student -> course -> name }}</td>
                        <td class="p-2">
                            <a href="#" class="text-blue-400">View</a>
                        </td>
                        <td>
                            <a href="{{ route('students.edit',$student -> id) }}" class="text-green-500 cursor-pointer">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('students.destroy',$student -> id) }}" method="POST">
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
