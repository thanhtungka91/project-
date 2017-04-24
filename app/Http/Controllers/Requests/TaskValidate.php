<?php
namespace App\Http\Requests;

use Auth;
use Session;
use Lang;

class TaskValidate extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
//    public function authorize()
//    {
//        return true;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'task_name' => 'required'
        ];

        return $rules;
    }

}