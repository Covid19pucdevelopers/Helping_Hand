<?php

namespace App\Http\Controllers;

use App\User;
use App\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = UserType::all()->where('is_delete','=',0)->where('status','=','On');
        $datas = DB::table('users')
                ->join('user_types','users.tbl_user_types_id','user_types.id')
                ->select('users.*','user_types.name as type')
                ->where('users.is_delete','=',0)->get();
        return view('user.show')->with(['datas'=>$datas,'types'=>$types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = UserType::all()->where('is_delete','=',0)->where('status','=','On');
        return view('user.create')->with(['types'=>$types]);
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
            'name' => 'required|string|max:255',
            'email' => 'required|email:rfc,dns|unique:users',
            'password'=>'required|alpha_num|min:5',
            'confirm_password' => 'required_with:password|same:password|min:5',                       
            'phone' => 'required|numeric|min:11',
            'type' => 'required',
            'status' => 'required',
            'nid' => 'required|numeric|min:10',
            'birth_date'=> 'required', 
            'address' => 'required',
        ]);

        if($request->hasFile('image'))
        {           
            $path = $request->image->store('images', 'public');
            $data = [
                'name' => $request->name,
                'email' => strtolower($request->email),
                'password' => $request->password,
                'tbl_user_types_id' => $request->type,
                'phone' => $request->phone,
                'status' => $request->status,
                'nid' => $request->nid,
                'birth_date' => $request->birth_date,
                'address' => $request->address,
                'created_by' =>Session::get('userid'),
                'image' => $path,
            ];
        }

        else
        {
            $data = [
                'name' => $request->name,
                'email' => strtolower($request->email),
                'password' => $request->password,
                'tbl_user_types_id' => $request->type,
                'phone' => $request->phone,
                'status' => $request->status,
                'nid' => $request->nid,
                'birth_date' => $request->birth_date,
                'address' => $request->address,
                'created_by' => Session::get('userid'),
                'image' => 'images/default.jpg',
            ];
        }
        User::create($data);
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
        $types = UserType::all()->where('is_delete','=',0)->where('status','=','On');
        
        $data = DB::table('users')
                    ->select('*')
                    ->where('id','=',$id)
                    ->where('is_delete','=',0)->get();

        return view('user.edit')->with(['data'=>$data->first(),'types'=>$types]);
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
            'email' => 'required|email:rfc,dns',                     
            'phone' => 'required|numeric|min:11',
            'type' => 'required',
            'status' => 'required',
            'nid' => 'required|numeric|min:10',
            'birth_date'=> 'required', 
            'address' => 'required',
        ]);

        if($request->hasFile('avater'))
        {
            $path = $request->avater->store('images', 'public');
            $data = [
                'name' => $request->name,
                'email' => strtolower($request->email),
                'tbl_user_types_id' => $request->type,
                'phone' => $request->phone,
                'status' => $request->status,
                'nid' => $request->nid,
                'birth_date' => $request->birth_date,
                'address' => $request->address,
                'updated_by' => Session::get('userid'),
                'image' => $path,
            ];
        }

        else
        {
            $data = [
                'name' => $request->name,
                'email' => strtolower($request->email),
                'tbl_user_types_id' => $request->type,
                'phone' => $request->phone,
                'status' => $request->status,
                'nid' => $request->nid,
                'birth_date' => $request->birth_date,
                'address' => $request->address,
                'updated_by' => Session::get('userid'),
                'image' =>$request->image,
            ];
        }

        $affected = DB::table('users')
              ->where('id', $id)->where('is_delete','=',0)
              ->update($data);
        return redirect()->to('user')->with('message','Update Successful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->update(['is_delete' => 1]);
        return redirect()->back()->with('message','Delete Successful.!');
    }
}
