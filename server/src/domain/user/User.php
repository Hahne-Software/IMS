<?php

namespace HahneSoftware\IMS\Server\Domain\user;

use HahneSoftware\IMS\Server\Domain\Cache\ObjectCacheInformation;
use HahneSoftware\IMS\Server\Domain\Object\ObjectHeader;
use HahneSoftware\IMS\Server\Domain\Object\ObjectInterface;

class User implements ObjectInterface
{
    private string $uuid;

    public function getUuid(): string
    {
        return $this->uuid;
    }

    public function getHeader(): ObjectHeader
    {
        // TODO: Implement getHeader() method.
    }

    public function getCacheInformation(): ObjectCacheInformation
    {
        // user data should be in cache for one day
        return new ObjectCacheInformation(60*60*24, true);
    }

    public function getApiEndpoint(): string
    {
        // TODO: Implement getApiEndpoint() method.
    }

    public function getRelations(): array
    {
        // TODO: Implement getRelations() method.
    }
}