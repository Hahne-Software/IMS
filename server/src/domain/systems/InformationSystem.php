<?php

namespace HahneSoftware\IMS\Server\Domain\Systems;

use HahneSoftware\IMS\Server\Domain\Object\ObjectCacheInformation;
use HahneSoftware\IMS\Server\Domain\Object\ObjectHeader;
use HahneSoftware\IMS\Server\Domain\Object\ObjectInterface;

class InformationSystem implements ObjectInterface
{
    private string $systemName;
    private string $systemUrl;
    private string $systemVersion;
    private string $systemDescription;
    private string $systemAuthor;

    public function getUuid(): string
    {
        // TODO: Implement getUuid() method.
    }

    public function getHeader(): ObjectHeader
    {
        // TODO: Implement getHeader() method.
    }

    public function getCacheInformation(): ObjectCacheInformation
    {
        // TODO: Implement getCacheInformation() method.
    }

    public function getApiEndpoint(): string
    {
        // TODO: Implement getApiEndpoint() method.
    }
}