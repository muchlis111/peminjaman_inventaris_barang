<?php
/**
 * Created by PhpStorm.
 * User: helmy
 * Date: 04/12/15
 * Time: 18:07
 */

namespace App\Domain\Contracts;


/**
 * Interface Repository
 * @package app\Domain\Contracts
 */
interface Repository
{
    /**
     * @return mixed
     */
    public function all();

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function  getManyBy($key, $value);

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function getFirstBy($key, $value);

    /**
     * @param array $attributes
     * @return mixed
     */
    public function  instance(array $attributes = []);


}
