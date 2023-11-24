<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;
    protected $table = 'authors';
    protected $fillable = ['full_name', 'birth_date', 'country'];

    /**
     * Get the profile associated with the Author
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class);
    }

    
    public function books()
    {
        return $this->belongsToMany(Book::class);
    }

    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }

    public function note(){
        return $this->morphMany(Note::class, 'noteable');
    }

    public function users(){
        return $this->morphToMany(User::class, 'userable');
    }
}
