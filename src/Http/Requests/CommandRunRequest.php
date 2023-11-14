<?php

namespace Devertix\LaravelRemoteArtisan\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommandRunRequest extends FormRequest
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
    public function rules()
    {
        return [
            'command' => 'required|string',
            'params' => 'array',
        ];
    }
}
