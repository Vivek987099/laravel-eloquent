<div>
    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
    
    <header class="w-full">
        
        <h1 class="text-3xl bg-blue-400 text-white font-bold text-center p-4 uppercase">
           student and course management
        </h1>
        <div class="bg-black flex items-center justify-between text-white gap-x-5 ">
            <ul class="flex">
                <li>
                    <a href="{{ route('students.index') }}" class="hover:bg-gray-500 block p-2">Home</a>
                </li>
                <li>
                    <a href="{{ route('students.create') }}" class="hover:bg-gray-500 block p-2">Add Student</a>
                </li>
                @if(auth() -> user() -> role -> contains('name','admin'))
                 <li>
                    <a href="{{ route('courses.index') }}" class="hover:bg-gray-500 block p-2">Course</a>
                </li>
                <li>
                    <a href="{{ route('courses.create') }}" class="hover:bg-gray-500 block p-2">Add Course</a>
                </li>
                <li>
                    <a href="{{ route('users.index') }}" class="hover:bg-gray-500 block p-2">User</a>
                </li>
                <li>
                    <a href="{{ route('users.create') }}" class="hover:bg-gray-500 block p-2">Add User</a>
                </li>
                @endif
                 <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="hover:bg-gray-500 block p-2 cursor-pointer"> Logout</button>
                    </form>
                </li>
                {{--
                <li>
                    <a href="#" class="hover:bg-gray-500 block p-2">Delete Student</a>
                </li> --}}
            </ul>
            <div class="pr-5" >
                <h4>Hello : {{ auth() -> user() -> email }} </h4>
            </div>
        </div>
    </header>
</div>
