<?php

namespace App\Http\Controllers;

use App\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = UserType::all()->where('is_delete','=',0);
        return view('userType.show')->with(['datas'=>$datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('userType.create');
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
            'name' => 'required|string|max:255|unique:user_types',
            'status' => 'required|string',
        ]);

        $data = [
            'name' => $request->name,
            'status' => $request->status,
            'created_by' => Session::get('userid'),
        ];

        UserType::create($data);
        return redirect()->back()->with('message','Save Successful.!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('user_types')
                ->select('*')
                ->where('id','=',$id)
                ->where('is_delete','=',0)->get();
        return view('userType.edit')->with(['data'=>$data->first()]);
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
            'status' => 'required|string',
        ]);

        $data = [
            'name' => $request->name,
            'updated_by' => Session::get('userid'),
            'status' => $request->status,
        ];

        //UserType::find($id)->update($data);
        $affected = DB::table('user_types')
              ->where('id', $id)->where('is_delete','=',0)
              ->update($data);
        return redirect()->to('userType')->with('message','Update Successful.!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        UserType::find($id)->update(['is_delete'=>1]);
    }
}
