<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_profile extends Model
{
    use HasFactory;
    protected $table = 'user_profiles';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $dataFormat = 'h:m:s';

    protected $fillable = [
        'user_id',
        'phone_number',
        'address',
        'date_of_birth'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
