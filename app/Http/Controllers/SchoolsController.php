<?php

namespace App\Http\Controllers;

use App\SchoolModel;
use Illuminate\Http\Request;

class SchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('schoolsHome');

        /* $items = Item::orderBy('id','DESC')->paginate(5);
         return view('ItemCRUD.index',compact('items'))
             ->with('i', ($request->input('page', 1) - 1) * 5);
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schools.Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation:
        $this->validate($request, [
            'SchoolName' => 'required',
            'Address' => 'required',
            'Phone' => 'required' | 'numeric',
            'StrongPoint' => 'required',
        ]);
        //Company is from Model where we have *** extends Model
        Company::create($request->all());
        redirect()->route(schoolsHome)
            ->with('success', 'New School Registered Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return view('schools.Show', compact('schools'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('schools.Edit', compact('schools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'SchoolName' => 'required',
            'Address' => 'required',
            'Phone' => 'required' | 'numeric',
            'StrongPoint' => 'required',
        ]);
        SchoolModel::find($id)->update($request->all());
        return redirect()->route('schoolsHome')
            ->with('success', 'School Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SchoolModel::find($id)->delete();
        return redirect()->route('schoolsHome')
            ->width('success', 'School Deleted Properly');
    }
}
