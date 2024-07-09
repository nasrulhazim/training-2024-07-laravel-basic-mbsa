<ol>
    {{-- {{ $users->links() }} --}}
    @foreach ($users as $user)
        <li>{{ $user->name }}</li>
    @endforeach
</ol>
