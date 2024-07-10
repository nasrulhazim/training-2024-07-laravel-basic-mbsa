<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update User') }}
        </h2>
    </x-slot>

    <div>
        <div class="bg-white max-w-7xl mt-10 mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                @if ($errors->any())
                    <div class="bg-red-300 rounded py-2 px-4 mb-4">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf @method('PUT')

                    <input type="text" name="name" id="name" placeholder="Enter your name..." value="{{ $user->name }}" />
                    <input type="text" name="email" id="email" placeholder="Enter your email..." value="{{ $user->email }}" />
                    <input type="password" name="password" id="password" placeholder="Enter your password..." />
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        placeholder="Reenter your password..." />

                    <button class="bg-indigo-700 text-white px-4 py-2 rounded-lg">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
