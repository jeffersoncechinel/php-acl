<?php

namespace JC\Acl\Tests;

use JC\Acl\Interfaces\UserAcl;

class User implements UserAcl
{
    protected $id;

    public function getRole()
    {
        return 'supervisor';
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
}