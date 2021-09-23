<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()) {       
            $role=auth()->user()->role;
            if($role==1){
                // return view('kn1');
                // Route::redirect('switch_layre/', '{{"area_b_demolitions"}}');
                return redirect()->route('super');
            }elseif($role==2){
                return redirect()->route('admin');
            }elseif($role==3){
                return redirect()->route('user');
            }else{
                return view('welcome');
            }
        }
        // return view('home');
    }
}
