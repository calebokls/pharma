<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    use HasFactory;

    public $fillable = [
         'name',
         'price',
         'description',
         'image'
    ];

    public function getSlug():string
    {
        return Str::slug($this->name);
    }

    public function imageUrl():string
    {
        return Storage::disk('public')->url($this->image);
    }
}
