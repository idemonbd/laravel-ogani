<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    protected $casts = [
        'active' => 'boolean',
    ];

    public function menus()
    {
        return $this->belongsToMany(Menu::class);
    }
}
