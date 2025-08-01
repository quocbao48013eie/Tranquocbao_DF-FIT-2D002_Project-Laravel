<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
  protected $table = 'employers';

     public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
