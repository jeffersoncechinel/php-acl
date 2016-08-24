<?php

namespace JC\Acl\Interfaces;

/**
 * Interface UserAcl
 * @package JC\Acl\Interfaces
 */
interface UserAcl
{
    /**
     * @return array
     */
    public function getRole();

    /**
     * @return int
     */
    public function getId();
}