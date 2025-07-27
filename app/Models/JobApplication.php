<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    protected $table = 'applications';
    protected $guarded = [];

    public function candidate() {
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }

    public function job() {
        return $this->belongsTo(PostJob::class, 'job_post_id');
    }
}

