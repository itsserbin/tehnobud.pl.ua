<?php

namespace App\Http\Requests\Api\Admin\LiveBlog;

use App\Domain\ValueObject\LiveBlog\Description;
use App\Domain\ValueObject\LiveBlog\Video;
use App\Domain\ValueObject\Name;
use App\Services\Dto\LiveBlog\UpdateLiveBlogDto;
use DateTimeImmutable;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Ramsey\Uuid\Uuid;

class UpdateLiveBlogRequest extends FormRequest
{
    
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name'           => 'required|array',
            'name.ru'        => 'required|string',
            'name.ua'        => 'required|string',
            'description'    => 'required|array',
            'description.ru' => 'required|string',
            'description.ua' => 'required|string',
            'published_at'   => 'required|date',
            'building_id'    => [
                'required',
                'uuid',
                Rule::exists('buildings', 'id'),
            ],
            'videos'         => 'array',
            'videos.*'       => 'url',
            'images'         => 'nullable|array',
            'images.*'       => 'required|image',
        ];
    }
    
    /**
     * @return \App\Services\Dto\LiveBlog\UpdateLiveBlogDto
     * @throws \Exception
     */
    public function getDto(): UpdateLiveBlogDto
    {
        return new UpdateLiveBlogDto(
            Name::create($this->get('name')),
            Description::create($this->get('description')),
            new DateTimeImmutable(
                $this->get('published_at')
            ),
            Uuid::fromString($this->get('building_id')),
            Video::create($this->get('videos', [])),
            $this->file('images', []),
        );
    }
    
}
