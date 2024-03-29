<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Contact::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }
    // crete nam nece trebati -m jer sluzi da prikaze formu al forma nam ne treba

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Log::info(print_r($request->all(), true));
        // sa true vrati string, a inace vrati true

        // ako se polja u postmanu i tu ne zovu isto
        // Contact::create([
        //     'first_name' => $request->first_name,
        //     'last_name' => $request->last_name,
        //     'email' => $request->email,
        // ]); 

        // ako se sva polja isto zovu, mogu sve odjednom za pozovem
        Contact::create($request->all());

        //fali nam fillable. to dodati u modelu
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Contact::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }
    // edit nam nece trebati

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $contact->update($request->all());

        // update odmah radi save

        return $contact;
    }

    // public function update(Request $request, $id)
    // {
    //     $contact = Contact::findOrFail($id);

    //     $contact->update($trequest->all());

    //     $contact->update([
    //         'first_name' => $request->first_name
    //          ...
    //     ])
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Contact::destroy($id);
    }
}
