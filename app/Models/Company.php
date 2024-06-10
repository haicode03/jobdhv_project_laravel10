<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $dataFormat = 'h:m:s';

    protected $fillable = [
        'name',
        'email',
        'website',
    ];
    public function job() {
        return $this->hasMany(Job::class);
    }
}