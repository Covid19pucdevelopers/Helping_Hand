<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Category::all()->where('is_delete','=',0);
        return view('category.show')->with(['datas'=>$datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'name' => 'required|string|max:255|unique:categories',
            'status' => 'required',
        ]);
        $data=[
            'name' => $request->name,
            'is_nid' => $request->is_nid,
            'is_phone' => $request->is_phone,
            'status' => $request->status,
            'created_by' => Session::get('userid'),
        ];
        Category::create($data);
        return redirect()->back()->with('message','Save Successful.');
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
        //$data = Category::find($id)->where('is_delete','=',0);
        $data = DB::table('categories')
                ->select('*')
                ->where('id','=',$id)
                ->where('is_delete','=',0)->get();
        return view('category.edit')->with(['data'=>$data->first()]);
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
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'status' => 'required',
        ]);
        $data=[
            'name' => $request->name,
            'is_nid' => $request->is_nid,
            'is_phone' => $request->is_phone,
            'status' => $request->status,
            'updated_by' => Session::get('userid'),
        ];

        $affected = DB::table('categories')
              ->where('id', $id)->where('is_delete','=',0)
              ->update($data);

        return redirect()->to('category')->with('message','Save Successful.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->update(['is_delete'=>1]);
        return redirect()->to('category')->with('message','Delete Successful');
    }
}
