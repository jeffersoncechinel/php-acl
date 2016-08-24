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
    protected $roldeId;
    /**
     * @var array
     */
    protected $permissions;

    /**
     * Role constructor.
     * @param string|null $roldeId
     */
    public function __construct($roldeId = null)
    {
        $this->roldeId = $roldeId;
        $this->permissions = [];
    }

    /**
     * @return int
     */
    public function getRoleId()
    {
        return $this->roldeId;
    }

    /**
     * @param int $roldeId
     * @return Role
     */
    public function setRoleId($roldeId)
    {
        $this->roldeId = $roldeId;
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