<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Log;

class ContainsCalculus implements Rule
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
        $choiceContainsCalculus = false;

        foreach ($value as $choice) {
            if (strtolower($choice) == 'calculus') {
                $choiceContainsCalculus = true;
            }
        }

        return $choiceContainsCalculus;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Choices must contain Calculus';
    }
}
