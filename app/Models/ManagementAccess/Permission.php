<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model
{
    use SoftDeletes;

    //declare table
    public $table = 'permission';

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
    public function role()
    {
        return $this->belongsToMany('App\Models\ManagementAccess\Role');
    }

    // one to many
    public function permission_role()
    {
        // 2 parameter (path model, field foreign key)
        return $this->hasMany('App\Models\ManagementAccess\PermissionRole', 'permission_id');
    }
}
