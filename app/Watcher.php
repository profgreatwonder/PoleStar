<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Watcher extends Model
{

    protected $fillable = [
        'conversation_id', 'user_id'
    ];

    public function user() {

        return $this->belongsTo('App\User');
    }

    public function conversation() {

        return $this->belongsTo('App\Conversation');
    }
}
