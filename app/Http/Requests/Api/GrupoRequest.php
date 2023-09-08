<?php

namespace App\Http\Requests\Api;
use Illuminate\Foundation\Http\FormRequest;

class GrupoRequest  extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return Bool
     */
    public function authorize(): Bool
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
            'nome'  => ['required'],

            ];
        }

}
