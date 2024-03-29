<?php

namespace App;

use Auth;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{

    protected $fillable = [
        'content', 'user_id', 'conversation_id'];


    public function conversation() {

        return $this->belongsTo('App\Conversation');
    }


    public function user() {

        return $this->belongsTo('App\User');
    }

    public function likes() {

        return $this->hasMany('App\Like');
    }

    public function is_liked_by_auth_user() {

        $id = Auth::id();

        $likers = array();

        foreach($this->likes as $like):

        array_push($likers, $like->user_id);

        endforeach;


        if(in_array($id, $likers)) {

            return true;
        }

        else {

            return false;
        }

    }
}
