<?php
/**
 * @package Newscoop\SendFeedbackBundle
 * @author Rafał Muszyński <rafal.muszynski@sourcefabric.org>
 * @copyright 2013 Sourcefabric o.p.s.
 * @license http://www.gnu.org/licenses/gpl-3.0.txt
 */

namespace Newscoop\SendFeedbackBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class SendFeedbackType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('first_name', 'text', array(
            'label' => 'plugin.feedback.label.first_name',
            'error_bubbling' => 'true',
            'required' => true,
            'constraints' => array(
                new NotBlank(),
            )
        ))
        ->add('last_name', 'text', array(
            'label' => 'plugin.feedback.label.last_name',
            'error_bubbling' => 'true',
            'required' => true,
            'constraints' => array(
                new NotBlank(),
            )
        ))
        ->add('email', 'email', array(
            'label' => 'plugin.feedback.label.email',
            'error_bubbling' => 'true',
            'required' => true,
            'constraints' => array(
                new NotBlank(),
            )
        ))
        ->add('subject', null, array(
            'label' => 'plugin.feedback.label.subject',
            'error_bubbling' => true,
            'required' => true,
            'constraints' => array(
                new NotBlank(),
            )
        ))
        ->add('message', 'textarea', array(
            'label' => 'plugin.feedback.label.message',
            'error_bubbling' => true,
            'required' => true,
            'constraints' => array(
                new NotBlank(),
            )
        ))
        ->add('attachment', 'file', array(
            'label' => 'plugin.feedback.label.attachment',
            'required' => false
        ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'csrf_protection' => false
        ));
    }

    public function getName()
    {
        return 'sendFeedbackForm';
    }
}
