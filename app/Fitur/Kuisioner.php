<?php

namespace App\Fitur;

use Illuminate\Database\Eloquent\Model;

class Kuisioner extends Model
{
    protected $table = 'jdw_kuisioner';
	protected $fillable = ['id', 'id_bagian', 'judul', 'desc',  'link']; 
	public $primarykey='id';
}
