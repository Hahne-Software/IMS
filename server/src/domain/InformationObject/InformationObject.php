<?php

namespace HahneSoftware\IMS\Server\Domain\InformationObject;


use HahneSoftware\IMS\Server\Domain\InformationClass\InformationClass;

class InformationObject
{

    private string $title;

    private string $description;

    private InformationClass $class;

    private array $content;
}