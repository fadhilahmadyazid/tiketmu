<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailUser extends Model
{
    use SoftDeletes;

    //declare table
    public $table = 'detail_user';

    //filed must type date yy-mm-dd
    protected $dates =[
        'created_at',
        'update_at',
        'deleted_at',
    ];

    //declare filliable
    protected $fillable =[
        'user_id',
        'type_user_id',
        'contact',
        'photo',
        'gender',
        'created_at',
        'update_at',
        'deleted_at',
    ];

     // one to many
     public function type_user()
     {
         // 3 parameter (path model, field foreign key, field primary key from table hasMany/hasOne)
         return $this->belongsTo('App\Models\MasterData\TypeUser', 'type_user_id', 'id');
     }

     public function user()
     {
         // 3 parameter (path model, field foreign key, field primary key from table hasMany/hasOne)
         return $this->belongsTo('App\Models\User', 'user_id', 'id');
     }
}
