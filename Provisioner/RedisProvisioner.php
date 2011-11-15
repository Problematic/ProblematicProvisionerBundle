<?php

namespace Problematic\ProvisionerBundle\Provisioner;

use Predis\Client;

class RedisProvisioner implements ProvisionerInterface
{

    /**
     * @var \Predis\Client
     */
    protected $redis;
    protected $key;

    public function __construct(Client $redis = null, $key)
    {
        $this->redis = $redis;
        $this->key = $key;
    }

    public function issue($object)
    {
        $result = $this->redis->incr($this->key);

        if ($object instanceof ProvisionableInterface) {
            $object->setId($result);
        }

        return $result;
    }

}
