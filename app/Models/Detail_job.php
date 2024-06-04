<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detail_job extends Model
{
    use HasFactory;
    protected $table = 'detail_jobs';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['job_id','responsibility','level','job_summery'];
    
    public function job() {
        return $this->hasOne(Job::class);
    }
}