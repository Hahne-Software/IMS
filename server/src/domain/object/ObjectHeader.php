<?php

namespace HahneSoftware\IMS\Server\Domain\Object;

use HahneSoftware\IMS\Server\Domain\Systems\InformationSystem;

class ObjectHeader
{

    private string $title;

    private string $description;

    private string $language;

    private string $type;

    private InformationSystem $source;
}