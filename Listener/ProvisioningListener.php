<?php

namespace Problematic\ProvisionerBundle\Listener;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Problematic\ProvisionerBundle\Provisioner\ProvisionerInterface;
use Problematic\ProvisionerBundle\Provisioner\ProvisionableInterface;

class ProvisioningListener
{

    protected $provisioner;

    public function __construct(ProvisionerInterface $provisioner)
    {
        $this->provisioner = $provisioner;
    }

    public function prePersist(LifecycleEventArgs $args)
    {
        $entity = $args->getEntity();

        if ($entity instanceof ProvisionableInterface) {
            $this->provisioner->issue($entity);
        }
    }

}
