<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hobbies extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'default'];

    public $timestamps = false;

    public function synonyms()
    {
        return $this->hasMany(HobbiesSynonyms::class)->select('id', 'synonym');
    }
}
