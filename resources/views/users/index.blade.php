<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl bg-white rounder shadow mt-10 mx-auto py-10 sm:px-6 lg:px-8 rounded-md">
            <div class="mt-5 md:mt-0 md:col-span-2">
                @can('create', \App\Models\User::class)
                    <div class="flex justify-end pb-4">
                        <a class="text-sm bg-indigo-700 hover:bg-indigo-500 rounded-md text-white px-4 py-2"
                            href="{{ route('users.create') }}">Create New User</a>
                    </div>
                @endcan
                <div class="flex justify-end">
                    {{ $users->links() }}
                </div>
                <ol>
                    @foreach ($users as $user)
                        <li class="py-4">
                            <div class="flex justify-between">
                                <span class="px-4">{{ $user->name }} </span>
                                <div class="flex justify-between gap-x-2">
                                    <a class="text-sm  hover:bg-green-100 rounded-md  px-4 py-2  border-slate-300 border-2"
                                        href="{{ route('users.show', $user->id) }}">View</a>

                                    @can('update', $user)
                                        <a class="text-sm  hover:bg-orange-100 rounded-md  px-4 py-2  border-slate-300 border-2"
                                            href="{{ route('users.edit', $user->id) }}">Update</a>
                                    @endcan

                                    @can('delete', $user)
                                        <div>
                                            <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                                                @csrf @method('DELETE')

                                                <div class="px-1 cursor-pointer text-sm  hover:bg-red-100 rounded-md  px-4 py-2  border-slate-300 border-2"
                                                    onclick="if(confirm('Are you sure want to delete {{ $user->name }}?')) {
                                                    this.parentElement.submit()
                                                }">
                                                    🗑️
                                                </div>
                                            </form>
                                        </div>
                                    @endcan
                                </div>
                            </div>
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
