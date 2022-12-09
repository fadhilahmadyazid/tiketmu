<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PermissionRole extends Model
{
    use SoftDeletes;

    //declare table
    public $table = 'permission_role';

    //filed must type date yy-mm-dd
    protected $dates =[
        'created_at',
        'update_at',
        'deleted_at',
    ];

    //declare filliable
    protected $fillable =[
        'title',
        'permission_id',
        'role_id',
        'created_at',
        'update_at',
        'deleted_at',
    ];

     // one to many
     public function permission()
     {
         // 3 parameter (path model, field foreign key, field primary key from table hasMany/hasOne)
         return $this->belongsTo('App\Models\ManagementAccess\Permission', 'permission_id', 'id');
     }

     public function role()
     {
         // 3 parameter (path model, field foreign key, field primary key from table hasMany/hasOne)
         return $this->belongsTo('App\Models\ManagementAccess\Role', 'role_id', 'id');
     }
}
