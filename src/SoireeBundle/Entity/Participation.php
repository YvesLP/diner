<?php

namespace SoireeBundle\Entity;

/**
 * Participation
 */
class Participation
{

    // GENERATED CODE

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \UtilBundle\Entity\User
     */
    private $participant;

    /**
     * @var \SoireeBundle\Entity\Soiree
     */
    private $soiree;


    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set participant
     *
     * @param \UtilBundle\Entity\User $participant
     *
     * @return Participation
     */
    public function setParticipant(\UtilBundle\Entity\User $participant = null)
    {
        $this->participant = $participant;

        return $this;
    }

    /**
     * Get participant
     *
     * @return \UtilBundle\Entity\User
     */
    public function getParticipant()
    {
        return $this->participant;
    }

    /**
     * Set soiree
     *
     * @param \SoireeBundle\Entity\Soiree $soiree
     *
     * @return Participation
     */
    public function setSoiree(\SoireeBundle\Entity\Soiree $soiree = null)
    {
        $this->soiree = $soiree;

        return $this;
    }

    /**
     * Get soiree
     *
     * @return \SoireeBundle\Entity\Soiree
     */
    public function getSoiree()
    {
        return $this->soiree;
    }
}
