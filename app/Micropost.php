<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable = ['content'];
    /**
     * この投稿を所有するユーザ。（ Userモデルとの関係を定義）
     */
     public function user()
     {
         return $this->belongsTo(User::class);
     }
     
     public function favorite_users()
     {
         return $this->belongsToMany(User::class, 'favorites', 'microposts_id', 'user_id')->withTimestamps();
         
     }
     
     
}
