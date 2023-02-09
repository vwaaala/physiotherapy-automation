<?php

namespace App\Executes;
use Illuminate\Support\Facades\App;
use App\Models\User;
use App\Models\EmployeeBankInformation;
use App\Models\EmployeeEducationInformation;
use App\Models\EmployeeEmergencyContact;
use App\Models\EmployeeExperienceInformation;
use App\Models\EmployeePersonalInformation;
use App\Models\EmployeeReferenceInformation;

class UserExecutions 
{
    /**
     * User table
     * @table
     * users
     */
    public function create($user){        
        return User::create($user);
    }

    public function get($id){
        return User::where('id', $id)->first();
    }

    public function update($id, $data){
        return User::where(['email' => $email])->update($data);
    }

    /**
     * Employee bank information
     * @table
     * employee_bank_information
     */
    public function create_bank_information($data){
        return EmployeeBankInformation::create($data);
    }

    public function get_bank_information($user_id){
        return EmployeeBankInformation::where('user_id', $user_id)->first();
    }

    public function update_bank_information($user_id, $data){
        return EmployeeBankInformation::where(['user_id' => $user_id])->update($data);
    }

    /**
     * Employee educational information
     * @table
     * employee_education_information
     */
    public function create_education_information($data){
        return EmployeeEducationInformation::create($data);
    }

    public function get_education_information($user_id){
        return EmployeeEducationInformation::where('user_id', $user_id)->all();
    }

    public function update_education_information($user_id, $data){
        return EmployeeEducationInformation::where(['user_id' => $user_id])->update($data);
    }

    /**
     * Employee emergency contact information
     * @table
     * employee_emergency_contact
     */
    public function create_emergency_contact($data){
        return EmployeeEmergencyContact::create($data);
    }

    public function get_emergency_contact($user_id){
        return EmployeeEmergencyContact::where('user_id', $user_id)->all();
    }

    public function update_emergency_contact($user_id, $data){
        return EmployeeEmergencyContact::where(['user_id' => $user_id])->update($data);
    }

    /**
     * Employee experience information
     * @table
     * employee_experience_information
     */
    public function create_experience_information($data){
        return EmployeeExperienceInformation::create($data);
    }

    public function get_experience_information($user_id){
        return EmployeeExperienceInformation::where('user_id', $user_id)->all();
    }

    public function update_experience_information($user_id, $data){
        return EmployeeExperienceInformation::where('user_id', $user_id)->update($data);
    }
    
    /**
     * Employee personal information
     * @table
     * employee_personal_information
     */
    public function create_personal_information($data){
        return EmployeePersonalInformation::create($data);
    }

    public function get_personal_information($user_id){
        return EmployeePersonalInformation::where('user_id', $user_id)->first();
    }

    public function update_personal_information($user_id, $data){
        return EmployeePersonalInformation::where('user_id', $user_id)->update($data);
    }

    /**
     * Employee reference information
     * @table
     * employee_reference_information
     */
    public function create_reference_information($data){
        return EmployeeReferenceInformation::create($data);
    }

    public function get_reference_information($user_id){
        return EmployeeReferenceInformation::where('user_id', $user_id)->all();
    }

    public function update_reference_information($user_id, $data){
        return EmployeeReferenceInformation::where('user_id', $user_id)->update($data);
    }
}