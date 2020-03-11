<?php

namespace App\Http\Controllers\Fitur;
use App\Http\Controllers\Controller;

use App\Fitur\Dev;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class Changelogs extends Controller
{

    public function index()
    {
        if(Session::get('id_role') == 'ADM'){
            $getdev = DB::table('users')->where('id_role', "ADM")->get();
            $develop = DB::table('users')->where('id_role', "ADM")->get();
            $user = DB::table('users')->get();
            $developer = DB::table('dev_changelogs')->orderBy('id', 'DESC')->get();
            $dev = DB::select(DB::raw('select * from dev_changelogs where id = (select max(`id`) from dev_changelogs)'));
            return view('changelogs.index')->with(compact('develop', 'getdev', 'developer', 'dev', 'user'));
         }else{
            $user = DB::table('users')->get();
            $developer = DB::table('dev_changelogs')->get();
            $dev = DB::select(DB::raw('select * from dev_changelogs where id = (select max(`id`) from dev_changelogs)'));
            return view('changelogs.show')->with(compact('developer', 'dev', 'user'));
         }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {       
        $data = new Dev();
        $data->id_user = $request->user;
        $data->versi = $request->ver;
        $data->tgl = $request->tgl;
        $data->desc = $request->desc;

        $data->save();

        if($data){ 
              return redirect()->back()->with('save-success', 'Data Changelogs telah ditambah');
        }else{
              return redirect()->back()->with('save-gagal', 'Data Changelogs tidak dapat ditambah');
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $cek = Dev::get();
         
        $data['id_user']=$request->user;
        $data['versi']=$request->versi;
        $data['tgl']=$request->tgl;
        $data['desc']=$request->desc;
        
        $cek=Dev::where('id',$id)->update($data);
        
        if($cek){ 
              return redirect()->back()->with('edit-success', 'Data Changelogs telah diubah');
        }else{
              return redirect()->back()->with('edit-gagal', 'Data Changelogs tidak dapat diubah');
        }
    }

    public function destroy($id)
    {
        $data = Dev::where('id', $id)->delete();
        if($data){ 
              return redirect()->back()->with('delete-success', 'Data Changelogs telah dihapus');
        }else{
              return redirect()->back()->with('delete-gagal', 'Data Changelogs tidak dapat dihapus');
        }
    }
}
