<?php

namespace App\Http\Requests;

use App\Debtor;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreDebtorRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('debtor_create');
    }

    public function rules()
    {
        return [
            'file_number'         => [
                'string',
                'required',
                'unique:debtors',
            ],
            'name'                => [
                'string',
                'required',
            ],
            'id_number'           => [
                'string',
                'required',
                'unique:debtors',
            ],
            'address'             => [
                'string',
                'required',
            ],
            'phone'               => [
                'string',
                'nullable',
            ],
            'email'               => [
                'string',
                'nullable',
            ],
            'employer'            => [
                'string',
                'nullable',
            ],
            'employer_address'    => [
                'string',
                'nullable',
            ],
            'debt_type_id'        => [
                'required',
                'integer',
            ],
            'creditor'            => [
                'string',
                'required',
            ],
            'arrear_period_start' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'arrear_period_end'   => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'payments'            => [
                'required',
            ],
            'outstanding'         => [
                'required',
            ],
            'correspondence'      => [
                'string',
                'nullable',
            ],
            'date'                => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'notes'               => [
                'string',
                'nullable',
            ],
            'status_id'           => [
                'required',
                'integer',
            ],
        ];
    }
}
