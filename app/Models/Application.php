<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $table = 'applications';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $dataFormat = 'h:m:s';

    protected $fillable = ['user_id','job_id','cover_letter'];

    
    public function job() {
        return $this->belongsTo(Job::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}