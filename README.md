Object id provisioning/ticket server for Symfony2 using (by default) [predis](https://github.com/nrk/predis)/[SncPredisBundle](https://github.com/snc/SncRedisBundle)

## Usage

Really simple. The ORM listener watches the Doctrine prePersist event for objects implementing `ProvisionableInterface` (which requires a `setId()` method), then uses the configured provisioner (a redis provisioner is provided by default) to generate a unique key for it.

## Configuration

To use the redis provisioner with SNCRedisBundle:

```
app/config/config.yml
```
```
problematic_provisioner:
    redis:
        client: snc_redis.default_client
```

## Todo

* Support other provisioners besides redis
* Make things more configurable in general