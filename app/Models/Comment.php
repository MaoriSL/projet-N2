<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['titre','text','auteur_id','scene_id','created_at','updated_at'];
    public function auteur(){
        return $this->belongsTo('App\Models\User','auteur_id');
    }
    public function scene(){
        return $this->belongsTo('App\Models\Scene');
    }

    use HasFactory;
}
