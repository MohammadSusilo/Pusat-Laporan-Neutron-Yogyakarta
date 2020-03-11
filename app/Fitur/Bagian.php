<?php

namespace App\Fitur;

use Illuminate\Database\Eloquent\Model;

class Bagian extends Model
{
    protected $table = 'jdw_bagian';
	protected $fillable = ['id', 'kode', 'name', 'status']; 
	public $primarykey='id, kode';
}