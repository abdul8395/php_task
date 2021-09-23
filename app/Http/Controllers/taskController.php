<?php

namespace App\Http\Controllers;
use Auth;
use DB;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class taskController extends Controller
{
    public  function user(){

        $q1 = DB::select("select * from public.products;");
                return view('tables.user', ['tbldata' => $q1]);
    } 
    public  function admin(){
        $q1 = DB::select("select * from public.products;");
                return view('tables.admin', ['tbldata' => $q1]);

    } 
    public  function super(){
        $q1 = DB::select("select * from public.products;");
        return view('tables.super', ['tbldata' => $q1]);
    } 

    public  function store_address(Request $request){
        $request->validate([
            'addres1' => ['string'],
            'addres1' => ['string']
        ]);
        // return $request->all();
        
    //  DB::insert('INSERT INTO public.tbl_address(
    //         id, address1, city1, state1, zipcode1, country1, address2, city2, state2, zipcode2, country2, user_id)
    //         VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);');

        $utb = new Address();
        $utb->address1 = $request->addres1;
        $utb->city1 = $request->city1;
        $utb->state1 = $request->state1;
        $utb->zipcode1 =$request->zipcode1;
        $utb->country1 =$request->country1;
        $utb->address2 = $request->addres2;
        $utb->city2 = $request->city2;
        $utb->state2 = $request->state2;
        $utb->zipcode2 =$request->zipcode2;
        $utb->country2 =$request->country2;
        $utb->user_id =auth()->user()->id;
        $utb->save();
        return back()->with('success', 'data inserted succesfuly.');
        // return redirect()->route('/');
    } 
    
}
