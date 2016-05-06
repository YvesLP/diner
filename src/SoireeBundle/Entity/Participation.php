<?php

namespace SoireeBundle\Entity;

/**
 * Participation
 */
class Participation
{
    /**
     * @var int
     */
    private $id;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @var \UtilBundle\Entity\User
     */
    private $user;

    /**
     * @var \SoireeBundle\Entity\Soiree
     */
    private $party;


    /**
     * Set user
     *
     * @param \UtilBundle\Entity\User $user
     *
     * @return Participation
     */
    public function setUser(\UtilBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \UtilBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set party
     *
     * @param \SoireeBundle\Entity\Soiree $party
     *
     * @return Participation
     */
    public function setParty(\SoireeBundle\Entity\Soiree $party = null)
    {
        $this->party = $party;

        return $this;
    }

    /**
     * Get party
     *
     * @return \SoireeBundle\Entity\Soiree
     */
    public function getParty()
    {
        return $this->party;
    }
}
