<?php

namespace App\Http\Controllers\Fitur;
use App\Http\Controllers\Controller;

use App\Fitur\User;
use App\Fitur\UserImport;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class UserC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = DB::table('jdw_role')->get();
        $bagians = DB::table('jdw_bagian')->get();
        $users = DB::table('users')->get();
        return view('master.users.index')->with(compact('roles', 'bagians', 'users'));
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
        $data = new user();

        $data->id_bagian = $request->bagian;
        $data->id_role = $request->role;
        $data->nik = $request->nik;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;
        $data->permission = $request->permission;
        $data->homedir = $request->homedir;
        $data->status = $request->status;
        $data->color = $request->color;

        if($request->password == $request->repassword){
            $data->password = bcrypt($request->password);
        }else{
            return redirect()->back()->with('pwd-same', 'Password tidak sama');
        }

        $data->save();

        if($data){ 
            return redirect()->back()->with('save-success', 'Data User telah ditambah');
        }else{
            return redirect()->back()->with('save-gagal', 'Data User tidak dapat ditambah');
        }
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
        $data['id_bagian'] = $request->bagian;
        $data['id_role'] = $request->role;
        $data['nik'] = $request->nik;
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['username']=$request->username;
        $data['permission']=$request->permission;
        $data['homedir']=$request->homedir;
        $data['status']=$request->status;
        $data['color']=$request->color;
        

        if($request->password == $request->repassword){
            $data['password'] = bcrypt($request->password);
        }else{
            return redirect()->back()->with('pwd-same', 'Password tidak sama');
        }
        
        $cek=DB::table('users')->where('id',$id)->update($data);
        
        if($cek){ 
            return redirect()->back()->with('edit-success', 'Data User telah diubah');
        }else{
            return redirect()->back()->with('edit-gagal', 'Data User tidak dapat diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = DB::table('users')->where('id', $id)->delete();
        if($data){ 
            return redirect()->back()->with('delete-success', 'Data User telah dihapus');
        }else{
            return redirect()->back()->with('delete-gagal', 'Data User tidak dapat dihapus');
        }
    }
}
