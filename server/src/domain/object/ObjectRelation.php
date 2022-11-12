<?php

namespace HahneSoftware\IMS\Server\Domain\Object;

use HahneSoftware\IMS\Server\Domain\Systems\InformationSystem;

class ObjectRelation
{
    private ObjectInterface $leftObject;
    private InformationSystem $leftSystem;
    private ObjectInterface $rightObject;
    private InformationSystem $rightSystem;
}