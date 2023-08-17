<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'avatar' => 'image',
            'nik' => 'required|unique:members,nik,' . ($this->member ? $this->member->id : ''),
            'full_name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'deposit_balance' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'nik.unique' => 'The NIK is already taken.',
            // Tambahkan pesan kustom lainnya jika diperlukan
        ];
    }
}
