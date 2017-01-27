<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Texto extends Model
{
	
	protected $table 		= 'texto_blog';
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'titulo', 'texto', 'palavra_chave','imagem'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    /*protected $hidden = [
    		'password', 'remember_token',
    ];*/
}
