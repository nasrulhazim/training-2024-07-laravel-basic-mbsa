<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::where('id', $id)->firstOrFail();

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

        User::where('id', $id)->update($data);

        return redirect(
            route('users.show', $id)
        )->with('message', 'User has been successfully updated.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
