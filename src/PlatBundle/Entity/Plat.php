<?php

namespace PlatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plat
 */
class Plat
{
    public $phplat;

    public function __toString()
    {
        return $this->getNom();
    }

    protected function getUploadDir()
    {
        return 'uploads/photosdeplats';
    }

    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }

    public function getWebPath()
    {
        return null === $this->photoPlat ? null : $this->getUploadDir().'/'.$this->photoPlat;
    }

    public function getAbsolutePath()
    {
        return null === $this->photoPlat ? null : $this->getUploadRootDir().'/'.$this->photoPlat;
    }


    /**
     * @ORM\PrePersist
     */
    public function preUpload()
    {
        if (null !== $this->phplat) {
            // do whatever you want to generate a unique name
            $this->photoPlat = uniqid().'.'.$this->phplat->guessExtension();
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
        if (null === $this->phplat) {
            return;
        }

        // if there is an error when moving the file, an exception will
        // be automatically thrown by move(). This will properly prevent
        // the entity from being persisted to the database on error
        $this->phplat->move($this->getUploadRootDir(), $this->photoPlat);

        unset($this->phplat);
    }

    /**
     * @ORM\PostRemove
     */
    public function removeUpload()
    {
        // Add your code here
        if ($phplat = $this->getAbsolutePath()) {
            unlink($phplat);
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
     * @var string
     */
    private $ingredients;

    /**
     * @var string
     */
    private $recette;

    /**
     * @var string
     */
    private $photoPlat;


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
     * @return Plat
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
     * Set ingredients
     *
     * @param string $ingredients
     * @return Plat
     */
    public function setIngredients($ingredients)
    {
        $this->ingredients = $ingredients;

        return $this;
    }

    /**
     * Get ingredients
     *
     * @return string 
     */
    public function getIngredients()
    {
        return $this->ingredients;
    }

    /**
     * Set recette
     *
     * @param string $recette
     * @return Plat
     */
    public function setRecette($recette)
    {
        $this->recette = $recette;

        return $this;
    }

    /**
     * Get recette
     *
     * @return string 
     */
    public function getRecette()
    {
        return $this->recette;
    }

    /**
     * Set photoPlat
     *
     * @param string $photoPlat
     * @return Plat
     */
    public function setPhotoPlat($photoPlat)
    {
        $this->photoPlat = $photoPlat;

        return $this;
    }

    /**
     * Get photoPlat
     *
     * @return string 
     */
    public function getPhotoPlat()
    {
        return $this->photoPlat;
    }

}
