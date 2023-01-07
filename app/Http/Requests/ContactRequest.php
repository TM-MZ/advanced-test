<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\postcode;

class ContactRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'familyname'=>'required',
            'firstname'=>'required',
            'email'=>'required|email|max:255|unique:App\Models\Contact,email',
            'postcode'=>['required','min:8','max:8',new postcode],
            'address'=>'required|max:255',
            'building_name'=>'max:255|nullable',
            'opinion'=>'required|max:120'
        ];
    }

    public function message(){
        return [
            'familyname.required'=>'苗字を入力してください',
            'firstname'=>'名前を入力してください',
            'email.required'=>'メールアドレスを入力してください',
            'email.email'=>'メールアドレスの形式で入力してください',
            'postcode.required'=>'郵便番号を入力してください',
            'postcode.min'=>'ハイフンを入れて8文字で入力してください',
            'postcode.max' => 'ハイフンを入れて8文字で入力してください',
            'opinion'=>'ご意見を入力してください',
        ];
    }
}
