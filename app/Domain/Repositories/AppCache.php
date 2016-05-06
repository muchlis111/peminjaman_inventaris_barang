<?php

namespace App\Domain\Repositories;

use App\Domain\Contracts\Cacheable;
use Illuminate\Cache\RedisStore;

/**
 * Class AppSimCache
 *
 * @package App\Domain\Repositories
 */
class AppCache implements Cacheable
{

    /**
     * @var RedisStore
     */
    protected $cache;

    /**
     * @param RedisStore $cache
     */
    public function __construct(RedisStore $cache)
    {
        $this->cache = $cache;
    }

    /**
     * @param $tags
     * @param $key
     *
     * @return mixed
     */
    public function get($tags, $key)
    {
        return $this->cache->tags($tags)->get($key);
    }

    /**
     * @param $tags
     * @param $key
     * @param $value
     * @param $minutes
     *
     * @return mixed
     */
    public function put($tags, $key, $value, $minutes)
    {
        if (is_null($minutes)) {
            $minutes = $this->minutes;
        }

        return $this->cache->tags($tags)->put($key, $value, $minutes);
    }

    /**
     * @param $tags
     * @param $key
     *
     * @return mixed
     */
    public function has($tags, $key)
    {
        return $this->cache->tags($tags)->has($key);
    }

    /**
     * @param $tags
     *
     * @return void
     */
    public function flush($tags)
    {
        return $this->cache->tags($tags)->flush();
    }

}