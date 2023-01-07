<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class postcode implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        // $pattern = "/^\d{3}-\d{4}$/";
        // if (!preg_match($pattern, $value)) {
        //     return true;
        // }

        // return false;
        return preg_match('/\A\d{3}[-]\d{4}\z/', $value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '郵便番号の形式を正しく入力してください。';
    }
}
