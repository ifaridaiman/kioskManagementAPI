<?php

namespace App\Interfaces\Menu;

interface MenuInterface
{
    public function create($request);

    public function get($request);

    public function find($id);

    public function update($request, $id);

    public function delete($id);
}
