<?php
/**
 * Created by PhpStorm.
 * User: helmy
 * Date: 04/12/15
 * Time: 18:06
 */

namespace App\Domain\Contracts;


/**
 * Interface Crudable
 *
 * @package app\Domain\Contracts
 */
interface Crudable
{
    /**
     * @param $id
     * @param array $columns
     *
     * @return mixed
     */
    public function find($id, array $columns = []);

    /**
     * @param array $data
     *
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param $id
     * @param array $data
     *
     * @return mixed
     */
    public function update($id, array $data);

    /**
     * @param $id
     *
     * @return mixed
     */
    public function delete($id);

}