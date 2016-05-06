<?php

namespace App\Domain\Repositories;

use App\Domain\Contracts\Cacheable;
use App\Domain\Contracts\Crudable;
use App\Domain\Contracts\Paginable;
use App\Domain\Entities\Barang;
use App\Domain\Repositories\AbstractRepository;
use Illuminate\Support\Facades\Log;

/**
 * Class BarangRepository
 * @package App\Domain\Repositories\Wilayah
 */
class BarangRepository extends AbstractRepository implements Paginable, Crudable

{

    protected $cache;

    public function __construct(Barang $barang, Cacheable $cache)
    {
        $this->model = $barang;
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
        $key = 'barang-find' . $id;

        // has section and key
        if ($this->cache->has(Barang::$tags, $key)) {
            return $this->cache->get(Barang::$tags, $key);
        }
        // query to sql
        $barang = parent::find($id, $columns);

        // store to cache
        $this->cache->put(Barang::$tags, $key, $barang, 10);

        return $barang;
    }

    /**
     * cache
     */

    public function create(array $data)
    {
        try {
            $barang = parent::create(
                [
                    'nama_barang' => e($data['nama_barang']),
                    'jumlah'      => e($data['jumlah']),
                    'status'      => e($data['status']),
                ]
            );
            // flush cache with tags
            $this->cache->flush(Barang::$tags);
            return $barang;
        } catch (\Exception $e) {
            // store errors to log
            Log::error('class : ' . BarangRepository::class . ' method : create | ' . $e);

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
            $barang = parent::update($id, [
                'nama_barang' => e($data['nama_barang']),
                'jumlah'      => e($data['jumlah']),
                'status'      => e($data['status']),
            ]);
            // flush cache with tags
            $this->cache->flush(Barang::$tags);
            return $barang;

        } catch (\Exception $e) {

            // store errors to log

            Log::error('class : ' . BarangRepository::class . ' method : update | ' . $e);

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
            $barang = parent::delete($id);
            // flush cache with tags
            $this->cache->flush(Barang::$tags);
            return $barang;
        } catch (\Exception $e) {
            // store errors to log

            Log::error('class : ' . BarangRepository::class . ' method : delete | ' . $e);

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
        $key = 'barang-get-by-page' . $limit . $page . $search;

        // has section and key
        if ($this->cache->has(Barang::$tags, $key)) {
            return $this->cache->get(Barang::$tags, $key);
        }

        // query to sql
        $barang = parent::getByPage($limit, $page, $column, 'nama_barang', $search);

        // store to cache
        $this->cache->put(Barang::$tags, $key, $barang, 10);

        return $barang;

    }
    public function getList()
    {
        // set key
        $key = 'peminjaman-get-list';

        // has section and key
        if ($this->cache->has(Barang::$tags, $key)) {
            return $this->cache->get(Barang::$tags, $key);
        }

        // query to sql
        $barang = $this->model->get();

        // store to cache
//        $this->cache->put(Peminjaman::$tags, $key, $peminjaman, 10);

        return $barang;

    }

}


