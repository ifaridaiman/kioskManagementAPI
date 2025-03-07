<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use SoftDeletes, HasUuids;

    protected $fillable = [
        'menu_category_id',
        'title',
        'description',
        'price'
    ];

    public function menuInventory()
    {
        return $this->hasMany(MenuInventory::class);
    }

    public function menuCategory()
    {
        return $this->belongsTo(MenuCategory::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($menu) {
            $menu->menuInventory()->delete(); // Soft delete child records
        });
    }
}
