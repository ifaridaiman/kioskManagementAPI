<?php

namespace App\Interfaces\Menu;

interface MenuCategoryInterface
{
    public function create($request);

    public function get();

    public function update($request, $id);

    public function delete($id);
}
