<?php

namespace App\Fitur;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'jdw_agenda';
	protected $fillable = ['id', 'id_user', 'id_bagian', 'title', 'ruang', 'desc', 'solusi', 'start', 'end', 'timestart', 'timefinish', 'status', 'team', 'created_at', 'updated_at']; 
	public $primarykey='id';
}
