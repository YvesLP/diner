<?php
// src/UtilBundle/Form/RegistrationType.php
/**
 * Created by PhpStorm.
 * User: charlie
 * Date: 09/05/16
 * Time: 16:40
 */
namespace UtilBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('gouts');
        $builder->add('allergies');
        $builder->add('photoUtil');
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x

    public function getGouts()
    {
        return $this->getBlockPrefix();
    }

    public function getAllergies()
    {
        return $this->getBlockPrefix();
    }

    public function getPhotoUtil()
    {
        return $this->getBlockPrefix();
    }
}
