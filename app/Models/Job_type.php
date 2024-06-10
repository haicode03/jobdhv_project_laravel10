<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job_type extends Model
{
    use HasFactory;
    protected $table = 'job_types';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $dataFormat = 'h:m:s';

    protected $fillable = [
        'type_name'
    ];


    public function job() {
        return $this->hasMany(Job::class);
    }
}