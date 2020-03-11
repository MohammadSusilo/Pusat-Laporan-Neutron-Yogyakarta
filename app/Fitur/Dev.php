<?php

namespace App\Fitur;

use Illuminate\Database\Eloquent\Model;

class Dev extends Model
{
    protected $table = 'dev_changelogs';
	protected $fillable = ['id', 'id_user', 'versi', 'tgl', 'desc']; 
	public $primarykey='id';
}
