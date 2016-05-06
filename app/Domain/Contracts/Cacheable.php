<?php
/**
 * Created by PhpStorm.
 * User: helmy
 * Date: 04/12/15
 * Time: 18:06
 */


namespace App\Domain\Contracts;

/**
 * Interface Cacheable
 *
 * @package App\Domain\Contracts
 */
interface Cacheable
{
    /**
     * @param $tags
     * @param $key
     *
     * @return mixed
     */
    public function get($tags, $key);

    /**
     * @param $tags
     * @param $key
     * @param $value
     * @param $minutes
     *
     * @return mixed
     */
    public function put($tags, $key, $value, $minutes);

    /**
     * @param $tags
     * @param $key
     *
     * @return mixed
     */
    public function has($tags, $key);

    /**
     * @param $tags
     *
     * @return mixed
     */
    public function flush($tags);

}