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
}
