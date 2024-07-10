<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <div>
        <div class="bg-white max-w-7xl mt-10 mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <div class="flex justify-end">
                    {{ $users->links() }}
                </div>
                <ol>
                    @foreach ($users as $user)
                        <li class="py-4">
                            <span class="px-4">{{ $user->name }} </span>
                            <a class="text-sm bg-indigo-700 hover:bg-indigo-500 rounded-md text-white px-4 py-2"
                                href="{{ route('users.show', $user->id) }}">View</a>
                        </li>
                    @endforeach
                </ol>
                <div class="flex justify-end">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
