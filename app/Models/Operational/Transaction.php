<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    use SoftDeletes;

     //declare table
     public $table = 'transaction';

     //filed must type date yy-mm-dd
    protected $dates =[
         'created_at',
         'update_at',
         'deleted_at',
     ];

     //declare filliable
    protected $fillable =[
         'ticket_id',
         'price_event',
         'pajak',
         'total',
         'created_at',
         'update_at',
         'deleted_at',
     ];

     // one to many
    public function ticket()
    {
        // 3 parameter (path model, field foreign key, field primary key from table hasMany/hasOne)
        return $this->belongsTo('App\Models\Operational\Ticket', 'tiket', 'id');
    }

}
