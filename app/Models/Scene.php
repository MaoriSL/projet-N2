<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scene extends Model
{
    protected $table = 'scenes';
    protected $fillable = ['nom', 'equipe','description','scene_text','image_link','vignette_link','exe_link','auteur_id','created_at'];
    public function auteur(){
        return $this->belongsTo('App\Models\User','auteur_id');
    }
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }
    public function notes(){
        return $this->belongsToMany(User::class, 'notes')
            ->withPivot('value')
            ->withTimestamps();
    }

    use HasFactory;
}
