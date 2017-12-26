<?php

namespace App\Observers;

use App\Models\Topic;
use App\Handlers\SlugTranslateHandler;

// creating, created, updating, updated, saving,
// saved,  deleting, deleted, restoring, restored

class TopicObserver
{
    public function creating(Topic $topic)
    {
        //
    }

    public function updating(Topic $topic)
    {
        //
    }

    public function saving(Topic $topic)
    {//make_excerpt自定义的辅助函数，在helpers.php中定义
        $topic->excerpt = make_excerpt($topic->body);

        //过滤数据，防止xss攻击
         $topic->body = clean($topic->body, 'user_topic_body');

         //生成slug
         if (! $topic->slug) {
             $topic->slug = app(SlugTranslateHandler::class)->translate($topic->title);
         }
    }
}
