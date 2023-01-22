<?php

namespace Core\Backoffice\Auth\Application\AssignSupplier;

use Core\Backoffice\Auth\Domain\AuthRepository;
use Core\Backoffice\Auth\Domain\AuthUser;
use Core\Ecommerce\Shared\Domain\SupplierId;

class UserSupplierAsignator
{
    public const SUPPLIER_ID_DEFAULT = '01cb035b-1a4d-3726-bdbe-fc840dd6881b';

    private AuthRepository $repository;

    public function __construct(AuthRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(AuthUser $user): void
    {
        $supplierId = new SupplierId(self::SUPPLIER_ID_DEFAULT);

        $this->repository->assignSupplier($user, $supplierId);
    }
}
