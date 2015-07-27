<?php
/**
 * Created by PhpStorm.
 * User: Guga
 * Date: 27/07/2015
 * Time: 11:47
 */

namespace CrmResult\Repositories;


use CrmResult\Interfaces\UserRepositoryInterface;
use CrmResult\Models\User;
use Prettus\Repository\Eloquent\BaseRepository;

class UserRepositoryEloquent extends BaseRepository implements UserRepositoryInterface {

    public function model(){
        return User::class;
    }

}