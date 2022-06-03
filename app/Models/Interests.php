<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interests extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'default'];

    public $timestamps = false;

    public function synonyms()
    {
        return $this->hasMany(InterestsSynonyms::class)->select('id', 'synonym');;
    }
}
