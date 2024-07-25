<?php

namespace App\Repositories\Interfaces;

interface IGalleryRepository
{

    public function get($id);

    public function all();

    public function delete($id);

    public function update($id, array $data);
}
