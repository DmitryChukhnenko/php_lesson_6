<?php

namespace App\Orchid\Resources;

use Orchid\Crud\Resource;
use Orchid\Crud\ResourceRequest;
use Orchid\Screen\TD;
use App\Models\Comment;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Fields\Input;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\Sight;

class CommentResource extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = Comment::class;

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array
    {
        return [
            Quill::make('text')->title('Text')->rows(5),
            Input::make('post_id')->title('Post ID'),
            Input::make('likes')->title('Likes'),
            Input::make('dislikes')->title('Dislikes')
        ];
    }

    /**
     * Get the columns displayed by the resource.
     *
     * @return TD[]
     */
    public function columns(): array
    {
        return [
            TD::make('id'),

            TD::make('created_at', 'Date of creation')
                ->render(function ($model) {
                    return $model->created_at->toDateTimeString();
                }),

            TD::make('updated_at', 'Update date')
                ->render(function ($model) {
                    return $model->updated_at->toDateTimeString();
                }),

            TD::make('text', 'Text')
                ->render(function ($model) {
                    return strip_tags($model->text);
                }),


            TD::make('post_id', 'Post ID'),

            TD::make('user_id', 'User ID'),

            TD::make('likes', 'Lises'),

            TD::make('dislikes', 'Dislises'),
        ];
    }

    /**
     * Get the sights displayed by the resource.
     *
     * @return Sight[]
     */
    public function legend(): array
    {
        return [
            Sight::make('id','Id'),
            Sight::make('created_at', 'Created')->render(function ($post) {
                return $post->created_at->format('M d Y h:m:s');
            }),
            Sight::make('updated_at', 'Updated')->render(function ($post) {
                return $post->updated_at->format('M d Y h:m:s');
            }),
            Sight::make('post_id', 'Post ID'),
            Sight::make('user_id', 'User ID'),
            Sight::make('likes', 'Lises'),
            Sight::make('dislikes', 'Dislises'),
        ];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(): array
    {
        return [];
    }

    public function save(ResourceRequest $request, Model $model) : void {
        $model->user_id = auth()->user()->id;

        parent::save($request, $model);
    }
}
