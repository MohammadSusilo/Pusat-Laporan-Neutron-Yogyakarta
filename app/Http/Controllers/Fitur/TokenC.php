<?php

namespace App\Http\Controllers\Fitur;
use App\Http\Controllers\Controller;

use App\Fitur\Token;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;

class TokenC extends Controller
{
    public function index()
    {
        $last_token = DB::table('jdw_token')->select('isi_token')->orderBy('created_at', 'desc')->first();
        $tokens = DB::table('jdw_token')->orderBy('created_at', 'desc')->get();
        $users = DB::table('users')->get();
        return view('token.index')->with(compact('last_token', 'tokens', 'users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $randomid = mt_rand(1000,9999); 

        $data = new Token(); 
        $data->id_user = Session::get('id');
        $data->isi_token = $randomid;
        $data->save();
        
        if($data){ 
            return redirect()->back()->with('save-success', 'Data Token telah ditambah');
        }else{
            return redirect()->back()->with('save-gagal', 'Data Token tidak dapat ditambah');
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
        //
    }

    public function destroy($id)
    {
        $data = Token::where('id', $id);
        $data->delete();
        
        if($data){ 
            return redirect()->back()->with('delete-success', 'Data Token telah dihapus');
        }else{
            return redirect()->back()->with('delete-gagal', 'Data Token tidak dapat dihapus');
        }
    }
}
