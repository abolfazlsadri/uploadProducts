<?php

namespace App\Services\API\V1\Interfaces;

interface UserInterface {

    public function checkUser(array $requset);
    
    public function createUser(array $requset);

    public function createAdmin(array $requset);
}