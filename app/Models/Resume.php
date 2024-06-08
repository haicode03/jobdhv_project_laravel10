<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resume extends Model
{
    use HasFactory;

    protected $table = 'resumes';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $dataFormat = 'h:m:s';

    protected $fillable = [
        'user_id',
        'file_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
