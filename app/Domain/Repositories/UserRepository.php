<?php

namespace App\Domain\Repositories;

use App\Domain\Contracts\Cacheable;
use App\Domain\Contracts\Crudable;
use App\Domain\Contracts\Paginable;
use App\Domain\Entities\user;
use App\Domain\Repositories\AbstractRepository;
use Illuminate\Support\Facades\Log;

/**
 * Class PemdaRepository
 * @package App\Domain\Repositories\Wilayah
 */
class UserRepository extends AbstractRepository implements Paginable, Crudable

{

    protected $cache;

    public function __construct(User $user, Cacheable $cache)
    {
        $this->model = $user;
        $this->cache = $cache;
    }

    /**
     * FindOne record with columns
     *
     * @param int $id
     * @param array $columns
     *
     * @return \Illuminate\Database\Eloquent\Model
     */

    public function find($id, array $columns = ['*'])
    {
        // set key
        $key = 'user-find' . $id;

        // has section and key
        if ($this->cache->has(User::$tags, $key)) {
            return $this->cache->get(User::$tags, $key);
        }
        // query to sql
        $user = parent::find($id, $columns);

        // store to cache
        $this->cache->put(User::$tags, $key, $user, 10);

        return $user;
    }

    /**
     * cache
     */

    public function create(array $data)
    {
        try {
            $user = parent::create(
                [
                    'nama'     => e($data['nama']),
                    'email'    => e($data['email']),
                    'password' => e($data['password']),
                    'no_hp'    => e($data['no_hp']),
                ]
            );
            // flush cache with tags
            $this->cache->flush(User::$tags);
            return $user;
        } catch (\Exception $e) {
            // store errors to log
            Log::error('class : ' . UserRepository::class . ' method : create | ' . $e);

            return $this->createError();
        }
    }

    /**
     * Update a Record
     * @param       $id
     * @param array $data
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update($id, array $data)
    {
        try {
            $user = parent::update($id, [
//                'organisasi_id' => e($data['organisasi_id']),
                'nama'     => e($data['nama']),
                'email'    => e($data['email']),
                'password' => e($data['password']),
                'no_hp'    => e($data['no_hp']),
            ]);
            // flush cache with tags
            $this->cache->flush(User::$tags);
            return $user;

        } catch (\Exception $e) {

            // store errors to log

            Log::error('class : ' . UserRepository::class . ' method : update | ' . $e);

            return $this->createError();
        }
    }

    /**
     * delete a record
     *
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function delete($id)
    {
        try {
            $user = parent::delete($id);
            // flush cache with tags
            $this->cache->flush(User::$tags);
            return $user;
        } catch (\Exception $e) {
            // store errors to log

            Log::error('class : ' . UserRepository::class . ' method : delete | ' . $e);

            return $this->createError();
        }
    }

    /**
     * @param int $page
     * @param int $limit
     * @param array $column
     *
     * @return \Illuminate\Pagination\Paginator|mixed
     */

    public function getByPage($limit = 10, $page = 1, array $column = ['*'], $field, $search = '')
    {
        // set key
        $key = 'user-get-by-page' . $limit . $page . $search;

        // has section and key
        if ($this->cache->has(User::$tags, $key)) {
            return $this->cache->get(User::$tags, $key);
        }

        // query to sql
        $user = parent::getByPage($limit, $page, $column, 'nama', $search);

        // store to cache
        $this->cache->put(User::$tags, $key, $user, 10);

        return $user;

    }

    public function getList()
    {
        // set key
        $key = 'user-get-list';

        // has section and key
        if ($this->cache->has(User::$tags, $key)) {
            return $this->cache->get(User::$tags, $key);
        }

        // query to sql
        $user = $this->model->get();

        // store to cache
        $this->cache->put(User::$tags, $key, $user, 10);

        return $user;

    }

}