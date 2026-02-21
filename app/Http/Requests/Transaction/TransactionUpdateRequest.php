<?php

namespace App\Http\Requests\Transaction;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Vinkla\Hashids\Facades\Hashids;

class TransactionUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'transaction' => Hashids::decode($this->transaction)[0] ?? null,
            'nominal' => str_replace('.', '', $this->nominal)
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'transaction' => ['required', 'integer', 'exists:transactions,id'],
            'category' => ['required', 'string', 'exists:categories,slug'],
            'nominal' => ['required', 'integer'],
            'notes' => ['nullable', 'string', 'max:1000'],
            'date' => ['required', 'date']
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => $validator->errors()->first()
        ], 422));
    }
}
