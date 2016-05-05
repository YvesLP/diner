<?php

namespace SoireeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Soiree
 */
class Soiree
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var \DateTime
     */
    private $dateSoiree;

    /**
     * @var string
     */
    private $photoSoiree;


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
     * Set nom
     *
     * @param string $nom
     * @return Soiree
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set dateSoiree
     *
     * @param \DateTime $dateSoiree
     * @return Soiree
     */
    public function setDateSoiree($dateSoiree)
    {
        $this->dateSoiree = $dateSoiree;

        return $this;
    }

    /**
     * Get dateSoiree
     *
     * @return \DateTime 
     */
    public function getDateSoiree()
    {
        return $this->dateSoiree;
    }

    /**
     * Set photoSoiree
     *
     * @param string $photoSoiree
     * @return Soiree
     */
    public function setPhotoSoiree($photoSoiree)
    {
        $this->photoSoiree = $photoSoiree;

        return $this;
    }

    /**
     * Get photoSoiree
     *
     * @return string 
     */
    public function getPhotoSoiree()
    {
        return $this->photoSoiree;
    }
    /**
     * @var \PlatBundle\Entity\Plat
     */
    private $plat_id;


    /**
     * Set plat_id
     *
     * @param \PlatBundle\Entity\Plat $platId
     * @return Soiree
     */
    public function setPlatId(\PlatBundle\Entity\Plat $platId = null)
    {
        $this->plat_id = $platId;

        return $this;
    }

    /**
     * Get plat_id
     *
     * @return \PlatBundle\Entity\Plat 
     */
    public function getPlatId()
    {
        return $this->plat_id;
    }
}
