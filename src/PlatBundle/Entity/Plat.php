<?php

namespace PlatBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Plat
 */
class Plat
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
