<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App,Illuminate\Support\Facades\Auth;

class Question extends Model
{

public function user(){
	return $this->belongsTo(User::class);
}
public function answers(){
    return $this->hasMany(Answer::class);
}
    protected $fillable = [
        'question','user_id '
    ];

 }
