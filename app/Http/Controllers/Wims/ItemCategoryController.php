<?php

namespace App\Http\Controllers\Wims;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ItemCategoryRequest;

use App\Http\Controllers\Controller;

use Datatables;

use App\ItemCategory;

class ItemCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('wims.item_categories.index');
    }

    public function loadData()
    {
        return Datatables::of(ItemCategory::select('*')->get())->make(true);
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
    public function store(ItemCategoryRequest $request)
    {
        //dd($request);
        $itemCategory = new ItemCategory([

            'code' => $request->get('code'),
            'name' => $request->get('name'),
            'description' => $request->get('description') 
        ]);

        $itemCategory->save();

        return redirect('/wims/items/category')->with('saved', 'Success! New Category Item Saved!');
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
        //
    }
}
