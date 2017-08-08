<?php

namespace App\Transformers;

class ReplyTransformer extends BaseTransformer
{
    protected $availableIncludes = ['user'];

    public function transformData($model)
    {
        return [
            "id" => $model->id,
            "user_id" => $model->user_id,
            "content" => $model->content,
            'created_at' => $model->created_at->toDateTimeString(),
            'updated_at'=> $model->updated_at->toDateTimeString(),
        ];
    }

    public function includeUser($model)
    {
        return $this->item($model->user, new UserTransformer());
    }
}
