<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    use HasFactory;

    protected $fillable = [
        'id',
        'name'
    ];

    public function getCategories(string $search = null) {
       
        $categories = $this->where(function ($query) use ($search)
        {
            if($search) {
                $query->where('name', 'LIKE', "%{$search}%");
            }
        })->paginate(4);
        
        return $categories;
    }
    public function products()
    {
        return $this->belongsTo(Product::class);
    }

}
