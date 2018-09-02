<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListItem extends Model
{
    public $primaryKey = 'id';
    public $table = 'ListItems';

    protected function user(){
        return $this->belongsTo('App\User');
    }
}
