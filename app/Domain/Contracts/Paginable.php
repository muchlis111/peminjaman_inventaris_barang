<?php
/**
 * Created by PhpStorm.
 * User: helmy
 * Date: 04/12/15
 * Time: 18:07
 */
namespace App\Domain\Contracts;

/**
 * Interface Paginable
 *
 * @package App\Domain\Contracts
 */
interface Paginable
{
    /**
     * @param int    $page
     * @param int    $limit
     * @param array  $column
     * @param string $field
     * @param string $search
     *
     * @return mixed
     */
    public function getByPage($limit = 10, $page = 1, array $column, $field, $search = '');
}