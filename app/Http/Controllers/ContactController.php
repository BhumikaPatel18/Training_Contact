<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $contacts = Contact::latest()->get();
            return DataTables::of($contacts)
                    ->addColumn('checkbox',function($row){
                        $delete = '<input type="checkbox" name="checkbox" class="delete" data-id="'.$row->id.'">';
                        return $delete;
                    })
                    ->addColumn('action', function($row){

                        //$btn = '<button>Hello</button>';

                        $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="edit btn btn-primary btn-sm editContact">Edit</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-id="'.$row->id.'" class="btn btn-primary btn-sm showContact">Show</a>';
                        $btn = $btn.' <a href="javascript:void(0)" data-id="'.$row->id.'"  class="btn btn-danger btn-sm deleteContact">Delete</a>';
                        return $btn;
                    })
                    ->rawColumns(['action','checkbox'])
                    ->make(true);

                }
        return view('contact.index');
    }

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
        //dd($request);
        $input = $request->all();
        Contact::create($input);
        return $input;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        $data = Contact::find($contact->id);
        // dd($contact);
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        return $contact;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $input = $request->all();
        $contact = Contact::find($id);
        $contact->fill($input);
        $contact->save();
        // dd($contact);
        return $contact;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        return $contact;
    }

    public function multipledelete(Request $request)
    {
        $allIds = $request->allIds;
        $allIds = Contact::whereIn('id',explode(",",$allIds))->delete();
        return $allIds;
    }

    public function multipleupdate(Request $request)
    {
        $input = $request->all();
        //dd($contact);
        $idsToUpdate = $request->all()['id'];
        $ids = explode(",",$idsToUpdate);
        //dd($ids);

        foreach($ids as $id)
        {
            $contact=Contact::find($id);
            $contact->fill($input);
            $contact->save();
        }

    }
}
