<?php
/**
 * Created by PhpStorm.
 * User: helmy
 * Date: 04/12/15
 * Time: 18:07
 */

namespace App\Domain\Contracts;

/**
 * Interface Searchable
 *
 * @package App\Domain\Contracts
 */
interface Searchable
{
    /**
     * @param $query
     * @param int $page
     *
     * @return mixed
     */
    public function search($query, $page = 1);

}