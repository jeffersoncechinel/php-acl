<?php

namespace JC\Acl;

use JC\Acl\Interfaces\UserAcl;
use JC\Acl\Entities\Role;
use JC\Acl\Entities\Resource;

/**
 * Class Acl
 * @package JC\Acl
 */
class Acl
{
    /**
     * @var array|Role
     */
    protected $roles;
    /**
     * @var
     */
    protected $user;
    /**
     * @var array
     */
    protected $resources;

    /**
     * Acl constructor.
     * @param array $roles
     * @param array $resources
     */
    public function __construct(array $roles, array $resources)
    {
        foreach ($roles as $role) {
            if (!$role instanceof Role) {
                throw new \InvalidArgumentException('Invalid Role');
            }
        }
        $this->roles = $roles;

        foreach ($resources as $resource) {
            if (!$resource instanceof Resource) {
                throw new \InvalidArgumentException('Invalid Resource');
            }
        }
        $this->resources = $resources;
    }

    /**
     * @param UserAcl $user
     * @return Acl
     */
    public function setUser(UserAcl $user)
    {
        $this->user = $user;
        return $this;
    }

    /**
     * @param string $role
     * @return bool
     */
    public function hasRole($role)
    {
        foreach ($this->roles as $r) {
            if ($r->getName() === $role) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param string $role
     * @param string $permission
     * @return bool
     */
    public function hasPermission($role, $permission)
    {
        foreach ($this->roles as $r) {
            if ($r->getName() === $role) {
                foreach ($r->getPermissions() as $p) {
                    if ($p->getName() === $permission) {
                        return true;
                    }
                }
            }
        }

        return false;
    }

    /**
     * @param string $permission
     * @param UserAcl|null $user
     * @return bool
     */
    public function can($permission, UserAcl $user = null)
    {
        if ($user) {
            $this->setUser($user);
            return $this->hasPermission($this->user->getRole(), $permission);
        }

        if ($this->user) {
            return $this->hasPermission($this->user->getRole(), $permission);
        }

        return false;
    }

    /**
     * @param string $permission
     * @param UserAcl|null $user
     * @return bool
     */
    public function cannot($permission, UserAcl $user = null)
    {
        return !$this->can($permission, $user);
    }

    /**
     * @param $resource
     * @param UserAcl|null $user
     * @return bool
     */
    public function isOwner($resource, UserAcl $user = null)
    {
        if ($user) {
            $this->setUser($user);
        }

        foreach ($this->resources as $r) {
            if (is_a($resource, $r->getName())) {
                if ($user) {
                    return $resource->{$r->getOwnerField()} () === $user->getId();
                }
                return $resource->{$r->getOwnerField()} () === $this->user->getId();
            }
        }

        return false;
    }
}