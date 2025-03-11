<?php

namespace App\Interfaces\Menu;

interface MenuInventoryInterface
{
    public function create($request, $id);

    public function update($request, $id);

    public function delete($id);
}
