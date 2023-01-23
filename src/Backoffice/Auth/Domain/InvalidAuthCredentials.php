<?php

namespace Core\Backoffice\Auth\Domain;

use RuntimeException;

final class InvalidAuthCredentials extends RuntimeException
{
    public function __construct(AuthEmail $email)
    {
        parent::__construct(sprintf('The credentials for <%s> are invalid', $email->value()));
    }
}
