<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employer extends Model
{
  use SoftDeletes;
  protected $table = 'employers';

     public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
