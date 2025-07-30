<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostJob extends Model
{
     protected $table = 'job_posts';
     
     public function employer(){
        return $this->belongsTo(Employer::class, 'employer_id');
    }
    
}
