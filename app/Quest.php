<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quest extends Model {

    /**
     * Массово присваиваемые атрибуты.
     *
     * @var array
     */
    protected $fillable = ['title', 'short_description', 'description', 'photo', 'execution_time', 'author_id', 'rating', 'points', 'published', 'moderated', 'moderation_info', 'answer'];

    /**
     * Получить пользователя - владельца данной задачи
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function getRouteKeyName() {
        return 'title';
    }

    public function authorName() {
        $author = $this->belongsTo(User::class);
        return var_dump($author);
    }

}
