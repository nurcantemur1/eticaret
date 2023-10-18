<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
class Category extends Model
{
    use Sluggable;
    protected $fillable=[
        'name',
        'image',
        'description',
        'slug',
        'sub_category'
    ];
    public function items(){
        return $this->hasMany(Product::class,'categoryId','id');
    }
    public function categoryitems(){
        $total = $this->items()->count();
        return $total;
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
