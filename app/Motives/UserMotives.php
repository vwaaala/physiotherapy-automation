<?php

namespace App\Motives;
use Illuminate\Support\Facades\App;
use Session;
use Carbon\Carbon;
use App\Executes\UserExecutions;
use App\Motives\ActivityMotives;

class UserMotives
{
    /**
     * @model
     * User
     */
    public function create($data)
    {
        return App::make(UserExecutions::class)->create($data);
    }
    public function get($id){
        return App::make(UserExecutions::class)->get($id);
    }
    public function update($id, $data){
        $action = App::make(UserExecutions::class)->update($id, $data);
        if($action){
            return ['status'=> true, 'message'=> 'Success'];
        }else{
            return ['status'=> false, 'message'=> 'Failed'];
        }
    }

    /**
     * @model
     * EmployeeBankInformation
     */
    public function create_bank_information($data)
    {
        $action = App::make(UserExecutions::class)->create_bank_information($data);
        if($action){
            return ['status'=> true, 'message'=> 'Success'];
        }else{
            return ['status'=> false, 'message'=> 'Failed'];
        }
    }
    public function get_bank_information($user_id)
    {
        $action = App::make(UserExecutions::class)->get_bank_information($user_id);
        if($action){
            return ['status'=> true, 'data'=> $action];
        }else{
            return ['status'=> false, 'message'=> 'Failed'];
        }
    }
    public function update_bank_information($user_id, $data)
    {
        $action = App::make(UserExecutions::class)->update_bank_information($user_id, $data);
        if($action){
            return ['status'=> true, 'message'=> 'Success'];
        }else{
            return ['status'=> false, 'message'=> 'Failed'];
        }
    }

    /**
     * @model
     * EmployeeEducationInformation
     */
    public function create_education_information($data)
    {
        $action = App::make(UserExecutions::class)->create_education_information($data);
        if($action){
            return ['status'=> true, 'message'=> 'Success'];
        }else{
            return ['status'=> false, 'message'=> 'Failed'];
        }
    }
    public function get_education_information($user_id)
    {
        $action = App::make(UserExecutions::class)->get_education_information($user_id);
        if($action){
            return ['status'=> true, 'message'=> 'Success'];
        }else{
            return ['status'=> false, 'message'=> 'Failed'];
        }
    }
    public function update_education_information($user_id, $data)
    {
        $action = App::make(UserExecutions::class)->update_education_information($user_id, $data);
        if($action){
            return ['status'=> true, 'message'=> 'Success'];
        }else{
            return ['status'=> false, 'message'=> 'Failed'];
        }
    }

    /**
     * @model
     * EmployeeEmergencyContact
     */
    public function create_emergency_contact($data)
    {
        $action = App::make(UserExecutions::class)->create_emergency_contact($data);
        if($action){
            return ['status'=> true, 'message'=> 'Success'];
        }else{
            return ['status'=> false, 'message'=> 'Failed'];
        }
    }
    public function get_emergency_contact($user_id)
    {
        $action = App::make(UserExecutions::class)->get_emergency_contact($user_id);
        if($action){
            return ['status'=> true, 'message'=> 'Success'];
        }else{
            return ['status'=> false, 'message'=> 'Failed'];
        }
    }
    public function update_emergency_contact($user_id, $data)
    {
        $action = App::make(UserExecutions::class)->update_emergency_contact($user_id, $data);
        if($action){
            return ['status'=> true, 'message'=> 'Success'];
        }else{
            return ['status'=> false, 'message'=> 'Failed'];
        }
    }

    /**
     * @model
     * EmployeeExperienceInformation
     */
    public function create_experience_information($data)
    {
        $action = App::make(UserExecutions::class)->create_experience_information($data);
        if($action){
            return ['status'=> true, 'message'=> 'Success'];
        }else{
            return ['status'=> false, 'message'=> 'Failed'];
        }
    }
    public function get_experience_information($user_id)
    {
        $action = App::make(UserExecutions::class)->get_experience_information($user_id);
        if($action){
            return ['status'=> true, 'message'=> 'Success'];
        }else{
            return ['status'=> false, 'message'=> 'Failed'];
        }
    }
    public function update_experience_information($user_id,$data)
    {
        $action = App::make(UserExecutions::class)->update_experience_information($user_id, $data);
        if($action){
            return ['status'=> true, 'message'=> 'Success'];
        }else{
            return ['status'=> false, 'message'=> 'Failed'];
        }
    }

    /**
     * @model
     * EmployeePersonalInformation
     */
    public function create_personal_information($data)
    {
        $action = App::make(UserExecutions::class)->create_experience_information($data);
        if($action){
            return ['status'=> true, 'message'=> 'Success'];
        }else{
            return ['status'=> false, 'message'=> 'Failed'];
        }
    }
    public function get_personal_information($user_id)
    {
        $action = App::make(UserExecutions::class)->get_personal_information($user_id);
        if($action){
            return ['status'=> true, 'data'=> $action];
        }else{
            return ['status'=> false, 'message'=> 'Failed'];
        }
    }
    public function update_personal_information($user_id, $data)
    {
        $action = App::make(UserExecutions::class)->update_personal_information($user_id, $data);
        if($action){
            return ['status'=> true, 'message'=> 'Success'];
        }else{
            return ['status'=> false, 'message'=> 'Failed'];
        }
    }
    /**
     * @model
     * EmployeeReferenceInformation
     */
    public function create_reference_information($data)
    {
        $action = App::make(UserExecutions::class)->create_reference_information($data);
        if($action){
            return ['status'=> true, 'message'=> 'Success'];
        }else{
            return ['status'=> false, 'message'=> 'Failed'];
        }
    }
    public function get_reference_information($user_id)
    {
        $action = App::make(UserExecutions::class)->get_reference_information($user_id);
        if($action){
            return ['status'=> true, 'message'=> 'Success'];
        }else{
            return ['status'=> false, 'message'=> 'Failed'];
        }
    }
    public function update_reference_information($user_id, $data)
    {
        $action = App::make(UserExecutions::class)->update_reference_information($user_id, $data);
        if($action){
            return ['status'=> true, 'message'=> 'Success'];
        }else{
            return ['status'=> false, 'message'=> 'Failed'];
        }
    }
}