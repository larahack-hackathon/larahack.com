<?php

namespace App\Http\Requests;

use App\Models\EventType;
use Illuminate\Foundation\Http\FormRequest;

class EventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() && auth()->user()->hasRole('Administrator');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'event_type_id' => ['required', 'exists:'.EventType::class.',id'],
            'name' => ['required', 'string'],
            'start_at' => ['nullable', 'date'],
            'voting_start_at' => ['nullable', 'date'],
            'end_at' => ['nullable', 'date'],
            'theme' => ['nullable', 'string'],
            'description' => ['nullable', 'string'],
            'first_place_prize' => ['nullable', 'string'],
            'second_place_prize' => ['nullable', 'string'],
            'third_place_prize' => ['nullable', 'string'],
            'runner_up_prize' => ['nullable', 'string'],
            'runner_up_amount' => ['nullable', 'integer'],
            'active' => ['required', 'boolean'],
            'vote_category_ids' => ['required'],
        ];
    }
}
