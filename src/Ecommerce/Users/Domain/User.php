<?php

namespace Core\Ecommerce\Users\Domain;

class User
{
    private UserId $id;
    private UserEmail $email;

    public function __construct(UserId $id, UserEmail $email)
    {
        $this->id = $id;
        $this->email = $email;
    }

    public static function create(UserId $id, UserEmail $email): self
    {
        return new self($id, $email);
    }

    public function id(): UserId
    {
        return $this->id;
    }

    public function email(): UserEmail
    {
        return $this->email;
    }
}
