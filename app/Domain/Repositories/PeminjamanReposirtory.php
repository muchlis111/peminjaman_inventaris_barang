<?php

namespace App\Domain\Repositories;

use App\Domain\Contracts\Cacheable;
use App\Domain\Contracts\Crudable;
use App\Domain\Contracts\Paginable;
use App\Domain\Entities\Peminjaman;
use App\Domain\Repositories\AbstractRepository;
use Illuminate\Support\Facades\Log;

/**
 * Class BarangRepository
 * @package App\Domain\Repositories\Wilayah
 */
class PeminjamanRepository extends AbstractRepository implements Paginable, Crudable

{

    protected $cache;

    public function __construct(Peminjaman $peminjaman, Cacheable $cache)
    {
        $this->model = $peminjaman;
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
        $key = 'peminjaman-find' . $id;

        // has section and key
        if ($this->cache->has(Peminjaman::$tags, $key)) {
            return $this->cache->get(Peminjaman::$tags, $key);
        }
        // query to sql
        $peminjaman = parent::find($id, $columns);

        // store to cache
        $this->cache->put(Peminjaman::$tags, $key, $peminjaman, 10);

        return $peminjaman;
    }

    /**
     * cache
     */

    public function create(array $data)
    {
        try {
            $peminjaman = parent::create(
                [
                    'nama_peminjam' => e($data['nama_peminjam']),
                    'kelas'         => e($data['kelas']),
                    'jurusan'       => e($data['jurusan']),
                    'id_barang'     => e($data['id_barang']),
                    'tgl_pinjam'    => date('Y-m-d h:i:s'),
                    'status'        => 0,
                ]
            );
            // flush cache with tags
            $this->cache->flush(Peminjaman::$tags);
            return $peminjaman;
        } catch (\Exception $e) {
            // store errors to log
            Log::error('class : ' . PeminjamanRepository::class . ' method : create | ' . $e);

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
            $peminjaman = parent::update($id, [
                'nama_peminjam' => e($data['nama_peminjam']),
                'kelas'         => e($data['kelas']),
                'jurusan'       => e($data['jurusan']),
                'id_barang'     => e($data['id_barang']),
//                'tgl_pinjam'    => e($data['tgl_pinjam']),
//                'tgl_kembali'   => e($data['tgl_kembali']),
//                'status'        => e($data['status']),
            ]);

            // flush cache with tags
            $this->cache->flush(Peminjaman::$tags);
            return $peminjaman;

        } catch (\Exception $e) {

            // store errors to log

            Log::error('class : ' . PeminjamanRepository::class . ' method : update | ' . $e);

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
            $peminjaman = parent::delete($id);
            // flush cache with tags
            $this->cache->flush(Peminjaman::$tags);
            return $peminjaman;
        } catch (\Exception $e) {
            // store errors to log

            Log::error('class : ' . PeminjamanRepository::class . ' method : delete | ' . $e);

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
        $key = 'peminjaman-get-by-page' . $limit . $page . $search;

        // has section and key
        if ($this->cache->has(Peminjaman::$tags, $key)) {
            return $this->cache->get(Peminjaman::$tags, $key);
        }

        // query to sql
        $peminjaman = parent::getByPage($limit, $page, $column, 'nama_peminjam', $search);

        // store to cache
        $this->cache->put(Peminjaman::$tags, $key, $peminjaman, 10);

        return $peminjaman;

    }

    public function getList()
    {
        // set key
        $key = 'peminjaman-get-list';

        // has section and key
        if ($this->cache->has(Peminjaman::$tags, $key)) {
            return $this->cache->get(Peminjaman::$tags, $key);
        }

        // query to sql
        $peminjaman = $this->model->get();

        // store to cache
//        $this->cache->put(Peminjaman::$tags, $key, $peminjaman, 10);

        return $peminjaman;

    }

    public function Kembali($id)
    {
        try {
            $peminjaman = parent::update($id, [
                'tgl_kembali' => date('Y-m-d h:i:s'),
                'status'      => 1,
            ]);

            // flush cache with tags
            $this->cache->flush(Peminjaman::$tags);

            return $peminjaman;

        } catch (\Exception $e) {

            // store errors to log
            Log::error('class : ' . PeminjamanRepository::class . ' method : Kembali | ' . $e);
            return $this->createError();
        }
    }
}