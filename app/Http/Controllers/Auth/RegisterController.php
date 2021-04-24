<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct(){
        $this->middleware(['guest']);
    }
    
        
    public function index()
    {
        return view('auth/register');
    }
    public function store(Request $request)
    {
         $this->validate($request, 
        ['name' => 'required|max:50',
        'username' => 'required|max:50',
        'email' => 'required',
        'password' => 'required|confirmed|min:5']); 
 
        User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        auth()->attempt($request->only('email', 'password'));
        
        return redirect()->route('dashboard'); 
        }
}
