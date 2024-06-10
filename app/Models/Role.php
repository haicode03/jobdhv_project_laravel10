<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $dataFormat = 'h:m:s';

    protected $fillable = [
        'name',
        'description'
    ];
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
