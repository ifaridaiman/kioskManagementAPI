<?php

namespace App\Interfaces\Menu;

interface MenuCategoryInterface
{
    public function create($request);

    public function get();
}
