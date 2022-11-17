<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
     // use HasFactory;
     use SoftDeletes;

     // declare table
     public $table = 'event';

     // this field must type date yyyy-mm-dd hh:mm:ss
     protected $dates = [
         'created_at',
         'updated_at',
         'deleted_at',
     ];

     // declare fillable
     protected $fillable = [
         'ticket_id',
         'name',
         'price',
         'cover',
         'description',
         'location',
         'updated_at',
         'deleted_at',
     ];

     public function ticket()
     {
         // 2 parameter (path model, field foreign key)
         return $this->hasMany('App\Models\Operational\Ticket', 'event_id');
     }
 }

