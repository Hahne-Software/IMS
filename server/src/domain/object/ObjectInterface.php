<?php

namespace HahneSoftware\IMS\Server\Domain\Object;

use HahneSoftware\IMS\Server\Domain\Cache\ObjectCacheInformation;

interface ObjectInterface
{
    public function getUuid(): string;

    public function getHeader(): ObjectHeader;

    public function getCacheInformation(): ObjectCacheInformation;

    public function getApiEndpoint(): string;

    public function getRelations(): array;
}