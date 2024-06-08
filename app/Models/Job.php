<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'jobs';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $dataFormat = 'h:m:s';

    protected $fillable = [
        'title',
        'wage',
        'description',
        'is_approved',
        'image_path',
        'category_id',
        'company_id',
        'location_id',
        'job_type_id'
    ];

    // protected $fillable = ['title', 'wage', 'description'];
    // //a job belongs to a category
    public function detail_job() {
        return $this->hasOne(Detail_job::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function company() {
        return $this->belongsTo(Company::class);
    }

    public function location() {
        return $this->belongsTo(Location::class);
    }

    public function job_type() {
        return $this->belongsTo(Job_type::class);
    }
}