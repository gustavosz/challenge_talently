<?php

namespace Core\Ecommerce\Users\Domain;

interface UserRepository
{
    public function listCatalogs(): array;
}
