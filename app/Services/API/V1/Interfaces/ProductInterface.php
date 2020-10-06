<?php

namespace App\Services\API\V1\Interfaces;

interface ProductInterface {

    public function gets(array $requset);

    public function create(array $requset);
    
    public function update(array $request, int $id);

    public function delete(int $id);

}