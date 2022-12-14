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
    public $table = 'tiket';

    //filed must type date yy-mm-dd
    protected $dates = [
        'created_at',
        'update_at',
        'deleted_at',
    ];

    //declare filliable
    protected $fillable = [
        'event_id',
        'nama_event',
        'user_id',
        'jenistiket_id',
        'status',
        'created_at',
        'update_at',
        'deleted_at',
    ];

    //one to many
    public function event()
    {
        // 3 parameter (path model, field foreign key, field primary key from table hasMany/hasOne)
        return $this->belongsTo('App\Models\Operational\Event', 'event_id', 'id');
    }

    public function jenistiket()
    {
        // 3 parameter (path model, field foreign key, field primary key from table hasMany/hasOne)
        return $this->belongsTo('App\Models\MasterData\JenisTiket', 'jenistiket_id', 'id');
    }

    public function user()
    {
        // 3 parameter (path model, field foreign key, field primary key from table hasMany/hasOne)
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    // one to many
    public function transaction()
    {
        // 2 parameter (path model, field foreign key)
        return $this->hasOne('App\Models\Operational\Transaction', 'ticket_id');
    }


}
