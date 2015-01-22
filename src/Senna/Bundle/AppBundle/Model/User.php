<?php

namespace Senna\Bundle\AppBundle\Model;

use Polymorph\Component\User\Model\User as BaseUser;

class User extends BaseUser
{
    const ROLE_DEFAULT = 'ROLE_USER';

    protected $slug;
    protected $token;
    protected $locale;

    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return mixed
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param mixed $locale
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;
    }
    protected $createdAt;
    protected $updatedAt;
    protected $deletedAt;


    public function getSlug()
    {
        return $this->slug;
    }

}