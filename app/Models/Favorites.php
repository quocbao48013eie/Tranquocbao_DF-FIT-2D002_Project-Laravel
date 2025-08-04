<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
   protected $table = 'favorites';

     public function job(){
        return $this->belongsTo(PostJob::class, 'job_id');
    }
    public function candidate(){
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }
}
