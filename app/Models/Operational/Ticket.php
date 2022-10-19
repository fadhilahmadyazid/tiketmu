<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ticket extends Model
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
         'email_user',
         'nama_tiket',
         'no_tiket',
         'jenis_tiket',
         'created_at',
         'update_at',
         'deleted_at',
     ];
}
