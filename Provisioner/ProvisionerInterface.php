<?php

namespace Problematic\ProvisionerBundle\Provisioner;

interface ProvisionerInterface
{

    /**
     * Takes an object to be persisted, creates an id, assigns it to the object if possible, and returns the id
     *
     * @param mixed $object to be issued an id
     * @return integer issued id
     */
    function issue($object);

}
