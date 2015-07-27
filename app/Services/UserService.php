<?php
/**
 * Created by PhpStorm.
 * User: Guga
 * Date: 27/07/2015
 * Time: 11:47
 */

namespace CrmResult\Services;


use CrmResult\Interfaces\EmployeeRepositoryInterface;
use CrmResult\Interfaces\UserRepositoryInterface;
use CrmResult\Validators\EmployeeValidator;
use CrmResult\Validators\UserValidator;
use Prettus\Validator\Exceptions\ValidatorException;

class UserService {

    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;
    /**
     * @var EmployeeRepositoryInterface
     */
    private $employeeRepository;
    /**
     * @var UserValidator
     */
    private $userValidator;
    /**
     * @var EmployeeValidator
     */
    private $employeeValidator;

    /**
     * @param UserRepositoryInterface $userRepository
     * @param EmployeeRepositoryInterface $employeeRepository
     * @param UserValidator $userValidator
     * @param EmployeeValidator $employeeValidator
     */
    public function __construct(UserRepositoryInterface $userRepository, EmployeeRepositoryInterface $employeeRepository, UserValidator $userValidator, EmployeeValidator $employeeValidator){
        $this->userRepository = $userRepository;
        $this->employeeRepository = $employeeRepository;
        $this->userValidator = $userValidator;
        $this->employeeValidator = $employeeValidator;
    }

    /**
     * @param array $data
     * @return array|mixed
     */
    public function create(array $data){
        try{
            $this->userValidator->with($data)->passesOrFail();
            $this->employeeValidator->with($data)->passesOrFail();
            $user = $data;
            $userCreate = $this->userRepository->create($user);
            if($userCreate && !empty($data['employee'])){
                $employee = $data['employee'];
                $employee['user_id'] = $userCreate->id;
                return $this->employeeRepository->create($employee);
            }
            return $userCreate;
        } catch (ValidatorException $e){
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    /**
     * @param array $data
     * @param $id
     * @return array|mixed
     */
    public function update(array $data, $id){
        try{
            $this->userValidator->with($data)->passesOrFail();
            $this->employeeValidator->with($data)->passesOrFail();
            $user = $data;
            $userCreate = $this->userRepository->update($user, $id);
            if($userCreate && !empty($data['employee'])){
                $employee= $data['employee'];
                return $this->employeeRepository->where('user_id', $id)->update($employee, $employee['id']);
            }
            return $userCreate;
        } catch(ValidatorException $e){
            return [
                'error' => true,
                'message' => $e->getMessageBag()
            ];
        }
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function destroy(array $data){
        if($data['inactive'] == "0"){
            $data['inactive'] = "1";
        }else{
            $data['inactive'] = "0";
        }
        return $this->userRepository->update($data, $data['id']);
    }

}