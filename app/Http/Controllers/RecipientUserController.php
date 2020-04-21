<?php

namespace App\Http\Controllers;

use App\Category;
use App\RecipientUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class RecipientUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = DB::table('recipient_users')
                ->join('categories','recipient_users.tbl_category_id','recipient_users.id')
                ->select('recipient_users.*','categories.name as category')
                ->where('recipient_users.is_delete','=',0)->get();
        return view('recipientUser.show')->with(['datas'=>$datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all()->where('is_delete','=',0)->where('status','=','On');
        return view('recipientUser.create')->with(['categories'=>$category]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = Category::find($request->category);
        if($cat)
        {
            $this->validate($request,[
                'name' => 'required|string|max:255',
                'email' => 'required|unique:recipient_users',
                'password'=>'required|alpha_num|min:5',
                'confirm_password' => 'required_with:password|same:password|min:5', 
                'earner_person' => 'required|numeric',
                'family_member' => 'required|numeric',                 
                'status' => 'required',
                'phone' => $cat->is_phone.'',
                'nid' => $cat->is_nid.'',
                'address' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
        }
        else
        {
            $this->validate($request,[
                'category' => 'required',
            ]);
        }

        $path = $request->image->store('images', 'public');
        $data = [
            'name' => $request->name,
            'email' => strtolower($request->email),
            'password' => $request->password,
            'tbl_category_id' => $request->category,
            'phone' => $request->phone,
            'status' => $request->status,
            'nid' => $request->nid,
            'birth_date' => $request->birth_date,
            'address' => $request->address,
            'family_member' => $request->family_member,
            'earner_person' => $request->earner_person,
            'request_status' => 'Available',
            'created_by' =>Session::get('userid'),
            'image' => $path,
        ];

        RecipientUser::create($data);
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
        $data = DB::table('recipient_users')
                    ->select('*')
                    ->where('id','=',$id)
                    ->where('is_delete','=',0)->get();
        return view('recipientUser.edit')->with(['data'=>$data->first()]);
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
        $cat = Category::find($request->category);
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required',
            'password'=>'required|alpha_num|min:5',
            'confirm_password' => 'required_with:password|same:password|min:5',                       
            'category' => 'required',
            'status' => 'required',
            'phone' => $cat->is_phone.'numeric|min:11',
            'nid' => $cat->is_nid.'numeric|min:10',
            'birth_date'=> 'required', 
            'address' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
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

        $affected = DB::table('recipient_users')
              ->where('id', $id)->where('is_delete','=',0)
              ->update($data);

        return redirect()->to('recipientUser')->with('message','Update Successful.!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        RecipientUser::find($id)->update(['is_delete'=>1]);
        return redirect()->to('recipienUser')->with('message','Delete Successful');
    }
}
