<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\Email;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $users = User::paginate(10);
        return view('admin.usermanagement.user-list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.usermanagement.create-user');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        $request->validate([
           'name' => 'required',
           'email' => 'required',
           'role' => 'required',
        ]);

        $password = Str::random(8);
        $mailTo = $request->email;
        $name = $request->name;
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
            'role' => $request->role,
            'active' => true
        ]);
        $this->sendEmail($mailTo, $name, $password);
        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function searchUser(Request $request){
        $search = $request->input('search');
        $role = $request->input('role');
        $users = User::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->where('role', 'LIKE', "%{$role}%")
            ->get();
        return view('admin.usermanagement.user-list', compact('users'));
    }

    public function sendEmail($mailTo, $username, $paswd)
    {
        $mailData = [
            'title' => 'Se te ha dado de alta en la plataforma',
            'name' => $username,
            'password' => $paswd,
            'email' => $mailTo
        ];

        Mail::to($mailTo)->send(new Email($mailData));
    }

    public function changeUserStatus($id){
        $selectedUser = User::query()->where('id', $id)->first();
        if($selectedUser->active == 1){
            User::where('id', $selectedUser->id)->update(['active'=>0]);
        }else{
            User::where('id', $selectedUser->id)->update(['active'=>1]);
        }
        return redirect('admin/usuarios');
    }
}
