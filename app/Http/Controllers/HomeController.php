<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contacts = Contact::all();

        $subscribes = Subscribe::all();

        $nameContacts = null;
        if($request->has('nameContact')){
            $nameContacts = Contact::where('name','LIKE','%'.$request->nameContact.'%')->get();
        }
        return view('admin.home.index',compact('contacts','nameContacts','subscribes'));
    }


    // //hàm searchContact 
    // public function searchContact(Request $request){
    //     $nameContacts = null;
    //     if($request->has('nameContact')){
    //         $nameContacts = Contact::where('name','LIKE','%'.$request->nameContact.'%')->get();
    //     }
    //     return view('admin.home.index',compact('nameContacts'))->with('searchSuccess',true);
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect(route('admin.home.index'))->with('success','del post thành công!');
    }
}
