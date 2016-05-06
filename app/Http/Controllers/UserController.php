<?php

namespace App\Http\Controllers;

use App\Domain\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Http\Requests;


class UserController extends Controller
{


    protected $user;

    /**
     * DeposisiController constructor.
     * @param DisposisiRepository $Alamat_organisasi
     */
    public function __construct(UserRepository $user)
    {
        $this->user= $user;
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Pagination\Paginator|mixed
     */
    public function index(Request $request)
    {
        return $this->user->getByPage(10, $request->input('page'), $column = ['*'], $key = '', $request->input('term'));
    }

    /**
     * @param disposisiRequest $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(UserRequest $request)
    {
        return $this->user->create($request->all());
//        return $request->all();
    }

    /**
     * @param $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function show($id)
    {
        return $this->user->find($id);
    }

    /**
     * @param DisposisiRequest $request
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(UserRequest $request, $id)
    {
        return $this->user->update($id, $request->all());
    }

    /**
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function destroy($id)
    {
        return $this->user->delete($id);
    }
    public function getList()
    {
        return $this->user->getList();
    }
}