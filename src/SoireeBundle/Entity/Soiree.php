<?php

namespace SoireeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Soiree
 */
class Soiree
{

    public $phsoiree;

    public function __toString()
    {
        return $this->getNom();
    }

    protected function getUploadDir()
    {
        return 'uploads/photosdesoirees';
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }

    public function getWebPath()
    {
        return null === $this->photoSoiree ? null : $this->getUploadDir().'/'.$this->photoSoiree;
    }

    public function getAbsolutePath()
    {
        return null === $this->photoSoiree ? null : $this->getUploadRootDir().'/'.$this->photoSoiree;
    }

    /**
     * @ORM\PrePersist
     */
    public function preUpload()
    {
        if (null !== $this->phsoiree) {
            // do whatever you want to generate a unique name
            $this->photoSoiree = uniqid().'.'.$this->phsoiree->guessExtension();
        }
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        // Add your code here
    }

    /**
     * @ORM\PrePersist
     */
    public function setExpiresAtValue()
    {
        // Add your code here
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        // Add your code here
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        // Add your code here
    }

    /**
     * @ORM\PostPersist
     */
    public function upload()
    {
        // Add your code here
        if (null === $this->phsoiree) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->phsoiree->move($this->getUploadRootDir(), $this->photoSoiree);

        unset($this->phsoiree);
    }

    /**
     * @ORM\PostRemove
     */
    public function removeUpload()
    {
        // Add your code here
        if ($phsoiree = $this->getAbsolutePath()) {
            unlink($phsoiree);
        }
    }

    // GENERATED CODE
    
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
     * @var \PlatBundle\Entity\Plat
     */
    private $plat_id;


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
