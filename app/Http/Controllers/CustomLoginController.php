<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class CustomLoginController extends Controller
{
    
    public function login(Request $request) {

    	$request->validate([
    		'email'    => 'required|email|exists:users,email',
    		'password' => 'required'
    	]);

    	if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {

    		if((int)auth()->user()->role_id == (int)$request->role_id){

    			return redirect()->route('dashboard');

    			/*if(auth()->user()->role_id == 1) {

    				return view('dashboard.teacher');
    			}
    			elseif (auth()->user()->role_id == 2) {
    				
    				return view('dashboard.student');
    			}*/
    		}
    		else{

    			auth()->logout();
    			return redirect()->back()->withErrors(['email', 'Credentials not matched']);
    		}
    	}
    	else{

    		return redirect()->back()->withErrors(['email', 'Credentials not matched']);
    	}

    }

    public function dashboard() {
    	
    	if(auth()->user()->role_id == 1) {

			return view('dashboard.teacher');
		}
		elseif (auth()->user()->role_id == 2) {
			
			return view('dashboard.student');
		}
    }
}
