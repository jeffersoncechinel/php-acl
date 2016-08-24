<?php

namespace JC\Acl\Tests;

use JC\Acl\Interfaces\UserAcl;

class User implements UserAcl
{
    protected $id;

    public function getRole()
    {
        return ['id_role' => 0, 'is_admin' => 1];
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