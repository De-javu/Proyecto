<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index()
    {
      $user = User::latest()->get();
      return view('users.index', [
          'users' => $user
      ]);
    }

    public function store(Request $request) 
    {

      $request->validate([
        'name'      =>['required'],
        'email'     =>['required','email','unique:user'],
        'password'  =>['required','min:8'],
      ]);
         User::create([
             'name'      => $request->name,
             'email'     => $request->email,
             'password'  => bcrypt($request->password), 
         ]);
             return back();
    }
    
    /**resivimos un usraio ponemos una variable */
    public function destroy(User $user)
    { 
        /* ponemos la variable -- con la ligica de eliminar */
      $user->delete();
      /* con esta funcion retornamos*/
      return back();
    }
}
