<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use App\User;

class AdminController extends Controller
{
    
    public function login(Request $request){

    	if($request->isMethod('post')){
    		$data = $request->input();
    		//dd($data); die; // var_dump in Laravel
    		$this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        	]);
   
        if(auth()->attempt(array('email' => $data['email'], 'password' => $data['password'])))
        {
            if (auth()->user()->is_admin == 1) {
            	Session::put('adminSession',$data['email']);
                return redirect('/admin/dashboard')
                	->with('sucess','login successfully.');
            }else{
                return redirect()->route('home');
            }
        }else{
            return redirect('/admin')
                ->with('error','Email-Address And Password Are Wrong.');
        }
          
    }
    	
    	return view('admin.login');
    }
  public function dashboard(){
   		 if(Session::has('adminSession')){
   		 	// Perform all dashboard tasks 
   		 }else{
   		 	return redirect('/admin')
                ->with('error','login to access.');
   		 }
   		return view('admin.dashboard');
   }
  public function settings(){
    	
    	return view('admin.settings');
    }
  public function chkPassword(Request $request){
  		$data = $request->all();
  		$current_password = $data['current_password'];
  		$check_password = User::where(['is_admin' => '1'])->first();
  		if(Hash::check($current_password,$check_password->password)){
  			echo "true"; die;
  		}else{
  			echo "false"; die;
  		}
  }
  public function updatePassword(Request $request){
  	$data = $request->all();
  	$check_password = User::where(['email' => Auth::user()->email])->first();
  	$current_password = $data['current_password'];
  	if(Hash::check($current_password,$check_password->password)){
  		$password = bcrypt($data['new_password']);
  		User::where('id','1')->update(['password'=>$password]);
  		return redirect('/admin/settings')->with('success','Password update Successfully!');
  	}else{
  		return redirect('/admin/settings')->with('error','Incorrect current Password!');
  	}
  }
  public function logout(){
    	Session::flush();
    	return redirect('/admin')
                	->with('sucess','logout successfully.');
    }
}
