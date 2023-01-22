<?php

namespace Core\Backoffice\Auth\Domain;

interface AuthRepository
{
    public function save(AuthUser $auth): void;

    public function authenticate(AuthUser $auth): AuthToken;

    public function searchByEmail(AuthEmail $email): ?AuthUser;

    public function sendWelcomeEmail(AuthUser $auth): void;
}
