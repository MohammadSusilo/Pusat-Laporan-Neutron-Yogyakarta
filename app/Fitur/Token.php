<?php

namespace App\Fitur;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $table = 'jdw_token';
	protected $fillable = ['id', 'id_user', 'isi_token']; 
	public $primarykey='id';
}

