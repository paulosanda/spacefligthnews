<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_id',
        'title',
        'url',
        'imageUrl',
        'summary',
        'publishedAt',
    ];

    public function launches()
    {
        $this->hasOne('App\Launche');
    }

    public function events()
    {
        $this->hasOne('App\Events');
    }
}
