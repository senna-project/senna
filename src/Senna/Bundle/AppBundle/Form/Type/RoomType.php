<?php

namespace Senna\Bundle\AppBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class RoomType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, array(
            ))
            ->add('description')
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'room';
    }
}