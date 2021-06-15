<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(User $user)
    {
        return [
            'username' => 'sometimes', Rule::unique('profiles')->ignore($user),
            'about'    => 'sometimes|required|string|min:5|max:255',
            'image'    => 'sometimes|image|mimes:png,jpg,jpeg',
            'age'      => 'sometimes|numeric|min:18|max:65',
            'gender'   => 'sometimes|required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return arraye
     */
    public function messages()
    {
        return [
            'username.unique' => 'اسم المستخدم موجود بالفعل',
            'username.alpha_dash' => 'اسم المستخدم يجب ان يحتوي على حروف وارقام بدون مسافات',
            'about.min'    => 'نبذه عني يجب ان تكون اكثر من 5 اخرف على الاقل',
            'about.max'    => 'نبذه عني يجب ان تكون اقل من 255 اخرف ',
            'age.numeric'      => 'حقل العمر يجب ان يحتوي على ارقام فقط ',
            'age.min'      => 'حقل العمر يجب ان لا يقل عن 18 عام   ',
            'age.max'      => 'حقل العمر يجب ان لا يزيد عن 65 عام ',
        ];
    }
}
