<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = Customer::all();
        return view('index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $storeData = $request->validate([
            'company' => 'required|max:255',
            'last_name' => 'required|max:255',
            'first_name'=> 'required|max:255',
            'email_address' => 'required|max:255',
            'job_title',
            'business_phone' => 'required|numeric',
            'home_phone',
            'mobile_phone',
            'fax_number',
            'address',
            'city',
            'state_province',
            'zip_postal_code',
            'country_region',
            'web_page',
            'notes',
            'attachments'
        ]);
        $customer = Customer::create($storeData);
        return redirect('/customers')->with('ourMessage', 'Klant is opgeslagen!');
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
        $customer = Customer::findOrFail($id);
        return view('edit', compact('customer'));
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
        $updateData = $request->validate([
        'company' => 'required|max:255',
        'last_name' => 'required|max:255',
        'first_name'=> 'required|max:255',
        'email_address' => 'required|max:255',
        'job_title',
        'business_phone' => 'required|numeric',
        'home_phone',
        'mobile_phone',
        'fax_number',
        'address',
        'city',
        'state_province',
        'zip_postal_code',
        'country_region',
        'web_page',
        'notes',
        'attachments'
    ]);
    Customer::whereId($id)->update($updateData);
    return redirect('/customers')->with('ourMessage', 'Klant is geupdated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect('/customers')->with('ourMessage', 'Klant is verwijderd');
    }
}