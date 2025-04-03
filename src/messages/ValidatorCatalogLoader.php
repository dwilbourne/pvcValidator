<?php

declare(strict_types=1);

namespace pvc\validator\messages;

use pvc\msg\DomainCatalogFileLoaderPhp;
use pvc\msg\err\NonExistentDomainCatalogDirectoryException;

class ValidatorCatalogLoader extends DomainCatalogFileLoaderPhp
{
    /**
     * @throws NonExistentDomainCatalogDirectoryException
     */
    public function __construct()
    {
        $this->setDomainCatalogDirectory(__DIR__);
    }
}