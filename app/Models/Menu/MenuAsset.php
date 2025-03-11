<?php

namespace App\Models\Menu;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuAsset extends Model
{
    use SoftDeletes, HasUuids;

    protected $fillable = [
        'menu_id',
        'asset_path'
    ];

    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}
