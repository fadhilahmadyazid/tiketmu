<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class DataType extends Model
{
    // use HasFactory;
    use SoftDeletes;
     //declare table
    public $table = 'type_user';

     //filed must type date yy-mm-dd
    protected $dates =[
         'created_at',
         'update_at',
         'deleted_at',
     ];

     //declare filliable
    protected $fillable =[
         'nama',
         'email',
         'password',
         'created_at',
         'update_at',
         'deleted_at',
     ];
}
