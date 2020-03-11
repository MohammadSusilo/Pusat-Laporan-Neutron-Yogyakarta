<?php

namespace App\Http\Controllers\Fitur;
use App\Http\Controllers\Controller;

use App\Fitur\Jadwal;
use App\Fitur\JadwalImport;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Redirect,Response;

class JadwalC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            if(request()->ajax())
            {
                $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
                $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');

                $data = DB::table('jdw_agenda')->whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id', 'id_bagian', 'id_user', 'title', 'start', 'end', 'desc', 'solusi', 'ruang', 'color']);
                return Response::json($data);
            }

            $bagians = DB::table('jdw_bagian')->get();
            $personils = DB::table('users')->get();
            return view('jadwal.index')->with(compact('bagians', 'personils'));
        

        // $bagians = DB::table('jdw_bagian')->get();
        // $personils = DB::table('users')->get();
        // return view('jadwal.index')->with(compact('bagians', 'personils'));
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
        if(Session::get('id_role') == "KA" OR Session::get('id_role') == "WKA" OR Session::get('id_role') == "KASUB" OR Session::get('id_role') == "STA"){
            $color = Session::get('color');
            $bagian = Session::get('id_bagian');
        }else{
            $color = $request->color;
            $bagian = $request->bagian;
        }
        // if($bagian != null){
        //     foreach($request->description as $value){
        //         $insertArr = [
        //             'id_user' => Session::get('id'),
        //             'team' => $request->karyawan[$value],
        //             'id_bagian' => $bagian,
        //             'title' => $request->title,
        //             'timestart' => $request->jam,
        //             'timefinish' => $request->jam_selesai,
        //             'ruang' => $request->tempat,
        //             'desc' => $request->description,
        //             'solusi' => $request->tindakan_solusi,
        //             'start' => $request->start,
        //             'end' => $request->end
        //         ];

        //             $event = Jadwal::insert($insertArr);
        //     }
        // }

        // $insertArr = [ 
        //         'id_user' => Session::get('id'),
        //         'id_bagian' => $bagian,
        //         'title' => $request->title,
        //         'timestart' => $request->jam,
        //         'timefinish' => $request->jam_selesai,
        //         'ruang' => $request->tempat,
        //         'desc' => $request->description,
        //         'solusi' => $request->tindakan_solusi,
        //         'start' => $request->start,
        //         'end' => $request->end

        //     ];
        // $arr1 = Jadwal::insert($insertArr);

        $data1 = new Jadwal();  
        $data1->id_user = Session::get('id');
        $data1->id_bagian = $bagian;
        $data1->title = $request->title;
        $data1->timestart = $request->jam;
        $data1->timefinish = $request->jam_selesai;
        $data1->ruang  = $request->tempat;
        $data1->desc  = $request->description;
        $data1->solusi  = $request->tindakan_solusi;
        $data1->start  = $request->start;
        $data1->end   = $request->end;

        if( $data1->save()){
            $id_get=$data1->id;
            foreach($request->karyawan as $key=>$v){
                $data = array(
                    'id_agenda' =>$id_get,
                    'team' => $request->karyawan[$key]
                );
                    $event = DB::table('jdw_agenda_team')->insert($data);
            }
        }

        // return Response::json($event);
        return response()->json($event, 201);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
