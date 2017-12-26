<?php

namespace App\Observers;

use App\Models\Topic;

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
    }
}
