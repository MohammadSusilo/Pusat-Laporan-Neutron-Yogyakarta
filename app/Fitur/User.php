<?php

namespace App\Fitur;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
	protected $fillable = ['id', 'id_role', 'id_bagian', 'color', 'nik', 'name', 'email', 'username', 'password', 'permission', 'homedir', 'usage', 'status']; 
	public $primarykey='id, nik';
}
