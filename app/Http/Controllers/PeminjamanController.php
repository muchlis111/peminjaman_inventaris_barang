<?php

namespace App\Http\Controllers;

use App\Domain\Repositories\PeminjamanRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\PeminjamanRequest;
use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Class DeposisiController
 * @package App\Http\Controllers
 */
class PeminjamanController extends Controller
{

    /**
     * @var DisposisiRepository
     */
    protected $peminjaman;

    /**
     * DeposisiController constructor.
     * @param DisposisiRepository $Alamat_organisasi
     */
    public function __construct(PeminjamanRepository $peminjaman)
    {
        $this->peminjaman = $peminjaman;
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Pagination\Paginator|mixed
     */
    public function index(Request $request)
    {
        return $this->peminjaman->getByPage(10, $request->input('page'), $column = ['*'], $key = '', $request->input('term'));
    }

    /**
     * @param disposisiRequest $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(PeminjamanRequest $request)
    {
        return $this->peminjaman->create($request->all());
//        return $request->all();
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        return $this->peminjaman->find($id);
    }

    /**
     * @param DisposisiRequest $request
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(PeminjamanRequest $request, $id)
    {
        return $this->peminjaman->update($id, $request->all());
    }

    /**
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy($id)
    {
        return $this->peminjaman->delete($id);
    }

    public function getList()
    {
        return $this->peminjaman->getList();
    }

    public function kembali($id)
    {
        return $this->peminjaman->Kembali($id);
    }
}