<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PannelTypeValidator implements Rule
{

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        \Log::info(['validation'=>(app('pannel_type') == 'multi_store') && $value]);
        return (app('pannel_type') == 'multi_store') && $value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return admin('Store is required');
    }
}
