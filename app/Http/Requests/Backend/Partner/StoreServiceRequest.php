<?php

namespace App\Http\Requests\Backend\Partner;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class ServiceRequest.
 */
class StoreServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->isPartner();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
}
