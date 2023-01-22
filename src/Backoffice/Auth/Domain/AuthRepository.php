<?php

namespace Core\Backoffice\Auth\Domain;

use Core\Ecommerce\Shared\Domain\SupplierId;

interface AuthRepository
{
    public function save(AuthUser $auth): void;

    public function authenticate(AuthUser $auth): AuthToken;

    public function searchByEmail(AuthEmail $email): ?AuthUser;

    public function sendWelcomeEmail(AuthUser $auth): void;

    public function assignSupplier(AuthUser $user, SupplierId $supplierId): void;
}
