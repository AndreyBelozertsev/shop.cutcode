<?php

namespace App\Http\Requests\Auth;

use Illuminate\Validation\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;
use Worksome\RequestFactories\Concerns\HasFactory;

class SignUpFormRequest extends FormRequest
{

    use HasFactory;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->guest();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string','min:1','max:256'],
            'email' => ['required', 'email:dns','unique:users'],
            'password' => ['required','confirmed', Password::default()]
        ];
    }

    public function prepareForValidation(){
        $this->merge([
            'email'=> str(request('email'))
                        ->squish()
                        ->lower()
                        ->value()  
        ]);
    } 
}
