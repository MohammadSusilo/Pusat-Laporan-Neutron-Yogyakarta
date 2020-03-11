<?php

namespace App\Http\Controllers\Fitur;
use App\Http\Controllers\Controller;

use App\Fitur\auth;
use App\Fitur\dev;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthC extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    //HALAMAN DASHBOARD
    public function padmin()
    {
        if(Session::get('id_role') == 'KA' OR Session::get('id_role') == 'WKA' OR Session::get('id_role') == 'KASUB')
        {
            $bagians = DB::table('jdw_bagian')->get();
            $user = DB::table('users')->where('id_bagian', Session::get('id_bagian'))->count();
            $laporan = DB::table('jdw_kuisioner')->where('id_bagian', Session::get('id_bagian'))->count();
            return view('dashboard.kabag')->with(compact('bagians', 'user', 'laporan'));
        }
        elseif(Session::get('id_role') == 'STA')
        {
            $bagians = DB::table('jdw_bagian')->get();
            $user = DB::table('users')->where('id_bagian', Session::get('id_bagian'))->count();
            $laporan = DB::table('jdw_kuisioner')->where('id_bagian', Session::get('id_bagian'))->count();
            return view('dashboard.staff')->with(compact('bagians', 'user', 'laporan'));
        }
        else
        {
            $bagian = DB::table('jdw_bagian')->count();
            $user = DB::table('users')->count();
            $laporan = DB::table('jdw_kuisioner')->count();
            return view('dashboard.admin')->with(compact('bagian', 'user', 'laporan'));
        }
    }

    //HALAMAN CEK LOGIN
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|min:4',
            'password' => 'required'
        ]);

        $username = $request->input('username');
        $password =$request->input('password');

        if($username ==''){
           return redirect()->back()->with('username-kosong','Harap isi Username dengan benar');
        }elseif($password==''){
           return redirect()->back()->with('password-kosong','Harap isi Password');
        }
        elseif($username !=''){
            $cek = DB::table('users')->where(['username'=>$username])->first();
            if(!(empty($cek))){
                if(!Hash::check($password, $cek->password)){
                    return redirect()->back()->with('password-gagal','Password salah');
                }else{
                    Session::put('id',$cek->id);
                    Session::put('id_bagian',$cek->id_bagian);
                    Session::put('id_role',$cek->id_role);
                    Session::put('name',$cek->name);
                    Session::put('email',$cek->email);
                    Session::put('color',$cek->color);
                    Session::put('login',TRUE);
                    return redirect('padmin');
                }
            }else{
               return redirect()->back()->with('username-gagal','Username belum terdaftar');
            }
        }else{
           return redirect()->back()->with('login-gagal','Harap login dengan data yang benar');
        }
    }

    //HALAMAN LOGOUT
    public function logout(){
        Session::flush();
       return redirect('/login')->with('logout','Anda Sudah Logout');
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
        //
    }

    public function destroy($id)
    {
        //
    }
}
