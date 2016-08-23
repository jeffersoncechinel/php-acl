<?php

namespace JC\Acl\Entities;

/**
 * Class Role
 * @package JC\Acl\Entities
 */
class Role
{
    /**
     * @var string
     */
    protected $name;
    /**
     * @var array
     */
    protected $permissions;

    /**
     * Role constructor.
     * @param string|null $name
     */
    public function __construct($name = null)
    {
        $this->name = $name;
        $this->permissions = [];
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Role
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * @param Permission $permission
     * @return Role
     */
    public function addPermission(Permission $permission)
    {
        $this->permissions[] = $permission;
        return $this;
    }
}