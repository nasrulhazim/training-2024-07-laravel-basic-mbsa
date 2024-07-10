<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Details') }}
        </h2>
    </x-slot>

    <div>
        <div class="bg-white max-w-7xl mt-10 mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <ol class="my-4">
                    <li>{{ $user->name }}</li>
                    <li>{{ $user->email }}</li>
                </ol>

                <a class="text-sm  hover:bg-gray-100 rounded-md  px-4 py-2  border-slate-300 border-2"
                    href="{{ route('users.index') }}">Back</a>
            </div>
        </div>
    </div>
</x-app-layout>
