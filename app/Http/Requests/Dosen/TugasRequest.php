<?php

namespace App\Http\Requests\Dosen;

use Illuminate\Routing\Route;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class TugasRequest extends FormRequest
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
        info($this);
        if (request('tipe') == 'file') {
            if (request()->is("tugas/$this->id/edit")) {
                if (request('file_or_link')) {
                    $condition = 'file|mimes:jpg,jpeg,png,bmp,gif,svg,webp,pdf,docx,xls,xlsx,zip,rar,ppt,pptx,mp4,doc,csv|max:100000';
                } else {
                    $condition = '';
                }
            } else {
                $condition = 'file|mimes:jpg,jpeg,png,bmp,gif,svg,webp,pdf,docx,xls,xlsx,zip,rar,ppt,pptx,mp4,doc,csv|max:100000';
            }
        } else {
            $condition = 'required';
        }

        return [
            'judul' => 'required',
            'tipe' => 'required',
            'file_or_link' => $condition,
            'pertemuan' => 'required',
            'deskripsi' => 'required',
            'pengumpulan' => 'required',
        ];
    }
}
