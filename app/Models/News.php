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
        'newsSite',
        'summary',
        'publishedAt',
        'updatedAt',
        'featured'
    ];
    
    /**
     * launches
     *
     * @return void
     */
    public function launches()
    {
        return $this->hasOne(Launche::class);
    }
    
    /**
     * events
     *
     * @return void
     */
    public function events()
    {
        return $this->hasOne(Event::class);
    }
}
