<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'link',
        'tag_id'
    ];

    public function getImage()
    {
        return asset('storage/' . $this->image);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }

    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
