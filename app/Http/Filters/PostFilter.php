<?php

namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    public const TITLE = 'title';
    public const CONTENT = 'content';
    public const TAG = 'tag';
    public const BY_LIKES = 'by-likes';
    public const BY_COMMENTS = 'by-comments';
    public const NEW_FIRST = 'new-first';
    public const OLD_FIRST = 'old-first';
    public const AUTHOR = 'author';


    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::CONTENT => [$this, 'content'],
            self::TAG => [$this, 'tag'],
            self::BY_LIKES => [$this, 'likes'],
            self::BY_COMMENTS => [$this, 'comments'],
            self::NEW_FIRST => [$this, 'newFirst'],
            self::OLD_FIRST => [$this, 'oldFirst'],
            self::AUTHOR => [$this, 'author'],

        ];
    }


    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function content(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function tag(Builder $builder, $value)
    {
        $builder->where('tags', 'like', '%' . $value. '%');
    }

    public function likes(Builder $builder)
    {
        $builder->withCount('likes')->orderBy('likes_count', 'desc');
    }

    public function comments(Builder $builder)
    {
        $builder->withCount('comments')->orderBy('comments_count', 'desc');
    }

    public function newFirst(Builder $builder)
    {
        $builder->orderBy('created_at', 'desc');
    }

    public function oldFirst(Builder $builder)
    {
        $builder->orderBy('created_at', 'asc');
    }

    public function author(Builder $builder, $value)
    {
        $builder->where('user_id', $value);
    }
}

