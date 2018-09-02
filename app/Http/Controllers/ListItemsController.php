<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ListItem;

//These will never return anything to the user, rather, these will likely just be called from ajax requests.
class ListItemsController extends Controller
{

    //Need auth to access anything from this controlelr
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //this might actually be what homecontroller should call.
        //Should this return an view, or just all the data?
    }

    /**
     * Show the form for creating a new resource.
     * Probably not going to use this because im going to ajax request everything, meaning no create page
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Should not be accessable in usual operation.
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'priority' => 'nullable',
            'item_desc' => 'required'
        ]);

        $listItem = new ListItem();
        $listItem->priority = $request->input('priority');
        $listItem->item_desc = $request->input('item_desc');
        $listItem->user_id = auth()->user()->id;
        $listItem->save();

        return redirect('/home')->with('success', 'Item Added.');
        // return json_encode(array('status' => 'success', 'message' => 'Item Added.'));

    }

    // public function retrieveAll(){

    // }

    /**
     * Display the specified resource.
     * 
     * Returns a response to AJAX.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Should not be accessable
    }

    /**
     * Show the form for editing the specified resource.
     * 
     * Returns a response to AJAX
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    } 

    /**
     * Update the specified resource in storage.
     * 
     * Returns a response to AJAX.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'priority' => 'nullable',
            'item_desc' => 'required'
        ]);

        $listItem = ListItem::find($id);

        if(auth()->user()->id !== $listItem->user_id){
            return json_encode(array('status' => 'error', 'message' => 'Unauthorized Request'));
        }

        $listItem->priority = $request->input('priority');
        $listItem->item_desc = $request->input('item_desc');
        $listItem->save();

        return redirect('/home')->with('success', 'Item Updated.');

        // return json_encode(array('status' => 'success', 'message' => 'Updated Item.'));

    }

    /**
     * Remove the specified resource from storage.
     * 
     * Returns a response to AJAX
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $listItem = ListItem::find($id);

        if(auth()->user()->id !== $listItem->user_id){
            return json_encode(array('status' => 'error', 'message' => 'Unauthorized Request'));
        }

        $listItem->delete();

        return redirect('/home')->with('success', 'Item Removed');

        // return json_encode(array('status' => 'success', 'message' => 'Item Deleted.'));
    }
}
