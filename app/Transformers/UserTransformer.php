<?php

namespace App\Transformers;

use App\Models\User;

class UserTransformer extends BaseTransformer
{
    protected $defaultIncludes = [
//        'replies'
    ];

    protected $availableIncludes = [
        'replies',
        'name'
    ];
    public function transformData($model)
    {
        return [
            'id' => $model->id,
            'name' => $model->name,
            'topic_count' => $model->topic_count,
            'reply_count' => $model->reply_count,
            'notification_count' => $model->notification_count,
            'is_banned' => $model->is_banned,
            'twitter_account' => $model->twitter_account,
            'company' => $model->company,
            'city' => $model->city,
            'email' => $model->email,
            'introduction' => $model->introduction,
            'github_name' => $model->github_name,
            'github_url' => $model->github_url,
            'real_name' => $model->real_name,
            'personal_website' => $model->personal_website,
            'created_at' => $model->created_at->toDateTimeString(),
            'updated_at' => $model->updated_at->toDateTimeString(),
        ];
    }

    public function includeReplies($model)
    {
        return $this->collection($model->replies, new ReplyTransformer());
    }

    public  function  includeName()
    {
        return ['xzl' => 'xz'];
    }
}