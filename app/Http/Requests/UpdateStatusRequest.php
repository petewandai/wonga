<?php

namespace App\Http\Requests;

use App\Status;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateStatusRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('status_edit');
    }

    public function rules()
    {
        return [
            'status' => [
                'string',
                'required',
                'unique:statuses,status,' . request()->route('status')->id,
            ],
        ];
    }
}
