<?php

namespace App\Http\Controllers;

use App\Domain\Repositories\BarangRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\BarangRequest;
use Illuminate\Http\Request;
use App\Http\Requests;

/**
 * Class DeposisiController
 * @package App\Http\Controllers
 */
class BarangController extends Controller
{

    /**
     * @var DisposisiRepository
     */
    protected $barang;

    /**
     * DeposisiController constructor.
     * @param DisposisiRepository $Alamat_organisasi
     */
    public function __construct(BarangRepository $barang)
    {
        $this->barang= $barang;
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Pagination\Paginator|mixed
     */
    public function index(Request $request)
    {
        return $this->barang->getByPage(10, $request->input('page'), $column = ['*'], $key = '', $request->input('term'));
    }

    /**
     * @param disposisiRequest $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(BarangRequest $request)
    {
        return $this->barang->create($request->all());
//        return $request->all();
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        return $this->barang->find($id);
    }

    /**
     * @param DisposisiRequest $request
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(barangRequest $request, $id)
    {
        return $this->barang->update($id, $request->all());
    }

    /**
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy($id)
    {
        return $this->barang->delete($id);
    }
    public function getList()
    {
        return $this->barang->getList();
    }
}