<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    //declare table
    public $table = 'role';

    //filed must type date yy-mm-dd
    protected $dates =[
        'created_at',
        'update_at',
        'deleted_at',
    ];

    //declare filliable
    protected $fillable =[
        'title',
        'created_at',
        'update_at',
        'deleted_at',
    ];
     // many to many
     public function user()
     {
         return $this->belongsToMany(User::class);
     }

     public function permission()
     {
         return $this->belongsToMany('App\Models\ManagementAccess\Permission');
     }

     // one to many
     public function role_user()
     {
         // 2 parameter (path model, field foreign key)
         return $this->hasMany('App\Models\ManagementAccess\RoleUser', 'role_id');
     }

     public function permission_role()
     {
         // 2 parameter (path model, field foreign key)
         return $this->hasMany('App\Models\ManagementAccess\PermissionRole', 'role_id');
     }

}
