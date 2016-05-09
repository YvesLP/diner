<?php
/**
 * Created by PhpStorm.
 * User: yves
 * Date: 04/05/16
 * Time: 15:12
 */

// src/UtilBundle/Entity/User.php

namespace UtilBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    public function __toString()
    {
        return $this->getUsername();
    }

    // GENERATED CODE

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    /**
     * @var string
     */
    private $allergies;

    /**
     * @var string
     */
    private $gouts;

    /**
     * @var string
     */
    private $photoUtil;


    /**
     * Set allergies
     *
     * @param string $allergies
     * @return User
     */
    public function setAllergies($allergies)
    {
        $this->allergies = $allergies;

        return $this;
    }

    /**
     * Get allergies
     *
     * @return string 
     */
    public function getAllergies()
    {
        return $this->allergies;
    }

    /**
     * Set gouts
     *
     * @param string $gouts
     * @return User
     */
    public function setGouts($gouts)
    {
        $this->gouts = $gouts;

        return $this;
    }

    /**
     * Get gouts
     *
     * @return string 
     */
    public function getGouts()
    {
        return $this->gouts;
    }

    /**
     * Set photoUtil
     *
     * @param string $photoUtil
     * @return User
     */
    public function setPhotoUtil($photoUtil)
    {
        $this->photoUtil = $photoUtil;

        return $this;
    }

    /**
     * Get photoUtil
     *
     * @return string 
     */
    public function getPhotoUtil()
    {
        return $this->photoUtil;
    }
}
