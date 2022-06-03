<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    use HasFactory;

    protected $table = 'user_info';

    public $fillable = ['name', 'from', 'to', 'long', 'about', 'interestings', 'hobbies', 'about', 'img'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtColumn() {
        return null;
    }
}
