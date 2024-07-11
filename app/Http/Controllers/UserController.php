<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    use AuthorizesRequests;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', User::class);

        // query from database, in table users.
        // select * from users limit 15
        $users = User::paginate(); // default paginate to 15

        // view for displaying users
        return view('users.index', compact('users')); // pass data using compact()

        // return view('users.index', ['pengguna' => $users]); // pass data using array
        // return view('users.index')->with('pengguna', $users); // pass using with()
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', User::class);

        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', User::class);

        // validation form submission
        $request->validate([
            'name' => ['required', 'string', 'max:250'],
            'email' => ['required', 'email', 'max:250'],
            'password' => [
                'required',
                'string',
                'confirmed',
                Password::default()
                    ->symbols()
                    ->mixedCase()
                    ->max(12)
            ],
        ]);

        // get the data from inputs
        $data = $request->only('name', 'email', 'password');

        // encrypt the password
        $data['password'] = Hash::make($data['password']);

        // create user
        $user = User::create($data);

        // redirect to user details page
        return redirect(
            route('users.show', $user->id)
        )->with('message', 'User successfully created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::where('id', $id)->firstOrFail();

        $this->authorize('view', $user);

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id', $id)->firstOrFail();

        $this->authorize('update', $user);

        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = [
            'name' => ['required', 'string', 'max:250'],
            'email' => ['required', 'email', 'max:250'],
        ];

        $data = $request->only('name', 'email', 'password');

        if(! empty($data['password'])) {
            $rules['password'] = [
                'required',
                'string',
                'confirmed',
                Password::default()
                    ->symbols()
                    ->mixedCase()
                    ->max(12)
            ];
        }

        // validate
        $request->validate($rules);

        // encrypt the password if password is update
        if(! empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user = User::where('id', $id)->firstOrFail();

        $this->authorize('update', $user);

        $user->update($data);

        return redirect(
            route('users.show', $id)
        )->with('message', 'User has been successfully updated.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id', $id)->firstOrFail();

        $this->authorize('delete', $user);

        $user->delete();

        return redirect(
            route('users.index')
        )->with('message', 'User has been successfully deleted.');
    }
}
