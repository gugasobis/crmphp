<?php

namespace CrmResult\Http\Controllers;

use CrmResult\Interfaces\UserRepositoryInterface;
use CrmResult\Services\UserService;
use Illuminate\Http\Request;

use CrmResult\Http\Requests;
use CrmResult\Http\Controllers\Controller;

class UserController extends Controller
{

    /**
     * @var UserRepositoryInterface
     */
    private $repository;
    /**
     * @var UserService
     */
    private $service;

    /**
     * @param UserRepositoryInterface $repository
     * @param UserService $service
     */
    public function __construct(UserRepositoryInterface $repository, UserService $service){
        $this->repository = $repository;
        $this->service = $service;
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->repository->with('employee')->all();
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        return $this->service->create($request->all());
    }

    /**
     * @param $id
     */
    public function show($id)
    {
        return $this->repository->find($id)->with('employee')->find($id);
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function update(Request $request, $id)
    {
        return $this->service->update($request, $id);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function destroy(Request $request)
    {
        return $this->service->destroy($request->all());
    }
}
