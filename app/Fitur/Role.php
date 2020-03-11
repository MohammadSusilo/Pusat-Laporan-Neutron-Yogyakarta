<?php

namespace App\Fitur;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'jdw_role';
	protected $fillable = ['id', 'kode', 'name', 'status']; 
	public $primarykey='id, kode';
}
