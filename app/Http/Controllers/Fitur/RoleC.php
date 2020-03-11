<?php

namespace App\Http\Controllers\Fitur;
use App\Http\Controllers\Controller;

use App\Fitur\Role;
use App\Fitur\RoleImport;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class RoleC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = DB::table('jdw_role')->get();
        return view('master.role.index')->with(compact('role'));
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
        $data = new role();
        $data->kode = $request->kode;
        $data->name = $request->name;
        $data->status = $request->status;

        $data->save();

        if($data){ 
            return redirect()->back()->with('save-success', 'Data Role telah ditambah');
        }else{
            return redirect()->back()->with('save-gagal', 'Data Role tidak dapat ditambah');
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
        $data['kode']=$request->kode;
        $data['name']=$request->name;
        $data['status']=$request->status;
        
        $cek=DB::table('jdw_role')->where('id',$id)->update($data);
        
        if($cek){ 
            return redirect()->back()->with('edit-success', 'Data Role telah diubah');
        }else{
            return redirect()->back()->with('edit-gagal', 'Data Role tidak dapat diubah');
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
        $data = DB::table('jdw_role')->where('id', $id)->delete();
        if($data){ 
            return redirect()->back()->with('delete-success', 'Data Role telah dihapus');
        }else{
            return redirect()->back()->with('delete-gagal', 'Data Role tidak dapat dihapus');
        }
    }
}
