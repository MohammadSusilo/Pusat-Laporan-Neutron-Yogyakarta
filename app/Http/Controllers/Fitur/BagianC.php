<?php

namespace App\Http\Controllers\Fitur;
use App\Http\Controllers\Controller;

use App\Fitur\Bagian;
use App\Fitur\BagianImport;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class BagianC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bagian = DB::table('jdw_bagian')->get();
        return view('master.bagian.index')->with(compact('bagian'));
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
        $data = new bagian();
        $data->kode = $request->kode;
        $data->name = $request->name;
        $data->status = $request->status;

        $data->save();

        if($data){ 
            return redirect()->back()->with('save-success', 'Data Bagian telah ditambah');
        }else{
            return redirect()->back()->with('save-gagal', 'Data Bagian tidak dapat ditambah');
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
        
        $cek=DB::table('jdw_bagian')->where('id',$id)->update($data);
        
        if($cek){ 
            return redirect()->back()->with('edit-success', 'Data Bagian telah diubah');
        }else{
            return redirect()->back()->with('edit-gagal', 'Data Bagian tidak dapat diubah');
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
        $data = DB::table('jdw_bagian')->where('id', $id)->delete();
        if($data){ 
            return redirect()->back()->with('delete-success', 'Data Bagian telah dihapus');
        }else{
            return redirect()->back()->with('delete-gagal', 'Data Bagian tidak dapat dihapus');
        }
    }
}
