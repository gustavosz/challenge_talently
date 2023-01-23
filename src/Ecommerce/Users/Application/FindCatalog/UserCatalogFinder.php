<?php

namespace Core\Ecommerce\Users\Application\FindCatalog;

use Core\Ecommerce\Users\Domain\UserRepository;

class UserCatalogFinder
{
    private UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(array|null $filter): array
    {
        return $this->repository->listCatalogs($filter);
    }
}
