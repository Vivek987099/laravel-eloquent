@vite(['resources/css/app.css'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
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
                    <th class="p-2">User Name</th>
                    <th class="p-2">User Email</th>
                    <th class="p-2">Role</th>
                    <th class="p-2">Delete</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($users as $user)

                    <tr class="text-center text-gray-600 dark:text-white odd:bg-gray-100 even:bg-gray-50 dark:even:bg-gray-600 dark:hover:bg-gray-700 dark:odd:bg-gray-500 hover:bg-gray-200">
                        <td class="p-2">{{ $user -> name }}</td>
                        <td class="p-2">{{ $user -> email }}</td>
                        <td class="p-2">
                            @foreach ($user -> role as $role)
                                <span> {{ $role -> name }} , </span>
                            @endforeach
                        </td>
                        <td>
                            <form action="{{ route('users.destroy',$user -> id) }}" method="POST">
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
