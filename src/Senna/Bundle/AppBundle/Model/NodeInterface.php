<?php

namespace Senna\Bundle\AppBundle\Model;

interface NodeInterface
{
    public function getId();

    public function setName($name);

    public function getName();

    public function setCode($code);

    public function getCode();
}