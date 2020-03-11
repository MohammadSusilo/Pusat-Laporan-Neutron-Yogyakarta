<?php

namespace App\Http\Controllers\Fitur;
use App\Http\Controllers\Controller;

use App\Fitur\Kuisioner;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class KuisionerC extends Controller
{
    public function index()
    {
        if(Session::get('id_role')=="ADM"){
            $getbags = DB::table('jdw_bagian')->get();
            $editgetbags = DB::table('jdw_bagian')->get();
            $kuisioners = DB::table('jdw_kuisioner')->get();
            $last_token = DB::table('jdw_token')->select('isi_token')->orderBy('created_at', 'desc')->first();
            return view('kuisioner.index')->with(compact('getbags', 'editgetbags', 'kuisioners', 'last_token'));
        }else{
            $getbags = DB::table('jdw_bagian')->get();
            $kuisioners = DB::table('jdw_kuisioner')->where('id_bagian', Session::get('id_bagian'))->get();
            $last_token = DB::table('jdw_token')->select('isi_token')->orderBy('created_at', 'desc')->first();
            return view('kuisioner.index')->with(compact('getbags', 'kuisioners', 'last_token'));
        }
    }
    
    public function getkuisionerbagian()
    {
        return view('kuisioner.token');
    }
    
    public function cektoken(Request $request)
    {
        if($request->token == null){
            return redirect()->back()->with('token-kosong', 'Token kuisioner harus diisi');
        }else{
            $cektoken = DB::table('jdw_token')->select('isi_token')->orderBy('created_at', 'desc')->first();
            if($request->token == $cektoken->isi_token){
                Session::put('token',$cektoken->isi_token);
                return redirect('/DashboardLaporan');
            }else{
                return redirect()->back()->with('token-salah', 'Token kuisioner salah');
            }
        }
    }

    public function getbagianALL()
    {
        return view('kuisioner.bagian');
    }

    public function getbagianSK()
    {
        $getbag = DB::table('jdw_kuisioner')->where('id_bagian', "SK")->get();
        return view('kuisioner.list.SK')->with(compact('getbag'));
    }

    public function getbagianINV()
    {
        $getbag = DB::table('jdw_kuisioner')->where('id_bagian', "INV")->get();
        return view('kuisioner.list.INV')->with(compact('getbag'));
    }

    public function getbagianPK()
    {
        $getbag = DB::table('jdw_kuisioner')->where('id_bagian', "PK")->get();
        return view('kuisioner.list.PK')->with(compact('getbag'));
    }

    public function getbagianKU()
    {
        $getbag = DB::table('jdw_kuisioner')->where('id_bagian', "KU")->get();
        return view('kuisioner.list.KU')->with(compact('getbag'));
    }

    public function getbagianPG()
    {
        $getbag = DB::table('jdw_kuisioner')->where('id_bagian', "PG")->get();
        return view('kuisioner.list.PG')->with(compact('getbag'));
    }

    public function getbagianDT()
    {
        $getbag = DB::table('jdw_kuisioner')->where('id_bagian', "DT")->get();
        return view('kuisioner.list.DT')->with(compact('getbag'));
    }

    public function getbagianPS()
    {
        $getbag = DB::table('jdw_kuisioner')->where('id_bagian', "PS")->get();
        return view('kuisioner.list.PS')->with(compact('getbag'));
    }

    // public function getbagianPM()
    // {
    //     $getbag = DB::table('jdw_kuisioner')->where('id_bagian', "PM")->get();
    //     return view('kuisioner.list.PM')->with(compact('getbag'));
    // }

    public function getbagianACC_PJK()
    {
        $getbag = DB::table('jdw_kuisioner')->where('id_bagian', "ACC_PJK")->get();
        return view('kuisioner.list.ACC_PJK')->with(compact('getbag'));
    }

    public function getbagianKP_MM()
    {
        $getbag = DB::table('jdw_kuisioner')->where('id_bagian', "KP_MM")->get();
        return view('kuisioner.list.KP_MM')->with(compact('getbag'));
    }

    public function getbagianPD()
    {
        $getbag = DB::table('jdw_kuisioner')->where('id_bagian', "PD")->where('id_bagian', "PM")->get();
        return view('kuisioner.list.PD')->with(compact('getbag'));
    }

    public function getbagianMK()
    {
        $getbag = DB::table('jdw_kuisioner')->where('id_bagian', "MK")->get();
        return view('kuisioner.list.MK')->with(compact('getbag'));
    }

    // public function getbagianLO()
    // {
    //     $getbag = DB::table('jdw_kuisioner')->where('id_bagian', "LO")->get();
    //     return view('kuisioner.list.LO')->with(compact('getbag'));
    // }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $data = new Kuisioner();
        if(Session::get('id_role') == "ADM"){
            $data->id_bagian = $request->bagian;
        }else{
            $data->id_bagian = Session::get('id_bagian');
        }

        $data->judul = $request->judul;
        $data->desc = $request->description;
        $data->link = $request->linkform;
        $data->save();

        if($data){ 
            return redirect()->back()->with('save-success', 'Data Kuisioner telah ditambah');
        }else{
            return redirect()->back()->with('save-gagal', 'Data Kuisioner tidak dapat ditambah');
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
        if(Session::get('id_role') == "ADM"){
            $data['id_bagian'] = $request->bagian;
        }

        $data['judul']=$request->judul;
        $data['desc']=$request->description;
        $data['link']=$request->linkform;
        
        $cek=DB::table('jdw_kuisioner')->where('id',$id)->update($data);
        
        if($cek){ 
            return redirect()->back()->with('edit-success', 'Data Kuisioner telah diubah');
        }else{
            return redirect()->back()->with('edit-gagal', 'Data Kuisioner tidak dapat diubah');
        }
    }

    public function destroy($id)
    {
        $data = DB::table('jdw_kuisioner')->where('id', $id)->delete();
        if($data){ 
            return redirect()->back()->with('delete-success', 'Data Kuisioner telah dihapus');
        }else{
            return redirect()->back()->with('delete-gagal', 'Data Kuisioner tidak dapat dihapus');
        }
    }
}
