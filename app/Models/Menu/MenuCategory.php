<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuCategory extends Model
{
    use SoftDeletes, HasUuids;

    protected $fillable = [
        'title',
        'description'
    ];

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
