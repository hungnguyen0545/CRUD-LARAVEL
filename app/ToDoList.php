<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ToDoList extends Model
{
    protected $table = 'to_do_lists';
    protected $fillable = ['id','content','created_at','updated_at','deleted_at','completed'];
    use SoftDeletes;

    public function User()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
