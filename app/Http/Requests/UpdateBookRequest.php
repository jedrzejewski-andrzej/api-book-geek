<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['string','min:3','max:100','unique:books,title'],
            'isbn' => ['string','min:3','max:100','unique:books,isbn'],
            'authors' => ['array','min:1'],
            'authors.*.id' => ['int','exists:authors,id'],
            'category_id' => ['int','exists:categories,id'],
            'prize_id' => ['int','exists:prizes,id'],
        ];
    }
}
