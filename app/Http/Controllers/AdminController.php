<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admins;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.login-admin');
    }

    public function authAdm(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:55',
            'password' => ['required', 'max:55', 'min:8'],
        ]);

        if (Auth::attempt($credentials)) {
            dd('Logou');
        } else {
            dd('Não logou');
        }

    }

    public function createAdm()
    {
        return view('admin.create-loginadm');
    }
    public function saveAdm(Request $request)
    {
        $request->validate([
          'email'=>'required|email',
          'password'=>'required|min:5|max:30s',
        ]);
        $admins = new Admins;
        $admins->email = $request->email;
        $admins->password = Hash::make($request->password);
        $save = $admins->save();
        if($save){
            return back()->with('sucess', 'success to create your login');
        }else{
            return back()->with('fail', 'Error');
        }
        // $request->validate([
        //     'email' => 'required|email|max:55',
        //     'password' => 'required|max:55|min:8',
        // ]);
        // Admins::create($request->all());
        // return $request->input();
        // // dd($request);
        // // return redirect('admin.login')->withErrors(['email'=>"fill de requiered"]);
    }
    public function checkLogin(Request $request) 
    {

        $request->validate([
            'email' => 'required|email|max:55',
            'password' => 'required|min:5|max:55',
        ]);

        
        if(Auth::guard('admins')->attempt($request->only(['email', 'password']))){
            return redirect()->route('list.product');
        }else{
            return back()->with('fail', 'Error');
        }
        
    }
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }

    
    /*public function saveAdmLogin(Request $requet)
    {
        $requet->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        Admins::create($request->all());
        dd('$request');
        return redirect()->route('loginadm.sucess');
    }*/
}
