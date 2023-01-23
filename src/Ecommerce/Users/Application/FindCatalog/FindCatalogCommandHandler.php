<?php

namespace Core\Ecommerce\Users\Application\FindCatalog;

class FindCatalogCommandHandler
{
    private UserCatalogFinder $finder;

    public function __construct(UserCatalogFinder $finder)
    {
        $this->finder = $finder;
    }

    public function __invoke(FindCatalogCommand $command): void
    {
        $catalogs = $this->finder->__invoke($command->filter());

        $command->setCatalogs($catalogs);
    }
}
