<div>
    <!-- You must be the change you wish to see in the world. - Mahatma Gandhi -->
    
    <header class="w-full">
        
        <h1 class="text-3xl bg-blue-400 text-white font-bold text-center p-4">
           CRUD SYSTEM
        </h1>
        <div>
            <ul class="bg-black flex text-white gap-x-5 ">
                <li>
                    <a href="{{ route('students.index') }}" class="hover:bg-gray-500 block p-2">Home</a>
                </li>
                <li>
                    <a href="{{ route('students.create') }}" class="hover:bg-gray-500 block p-2">Add Student</a>
                </li>
                {{-- <li>
                    <a href="#" class="hover:bg-gray-500 block p-2">Update Student</a>
                </li>
                <li>
                    <a href="#" class="hover:bg-gray-500 block p-2">Delete Student</a>
                </li> --}}
            </ul>
        </div>
    </header>
</div>
