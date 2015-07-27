<?php
/**
 * Created by PhpStorm.
 * User: Guga
 * Date: 27/07/2015
 * Time: 11:55
 */

namespace CrmResult\Repositories;


use CrmResult\Interfaces\EmployeeRepositoryInterface;
use CrmResult\Models\Employee;
use Prettus\Repository\Eloquent\BaseRepository;

class EmployeeRepositoryEloquent extends BaseRepository implements EmployeeRepositoryInterface {

    public function model(){
        return Employee::class;
    }

}