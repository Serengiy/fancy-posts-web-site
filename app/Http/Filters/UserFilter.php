<?php

namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class UserFilter extends AbstractFilter
{
    public const SORT = 'sort';

    protected function getCallbacks(): array
    {
        return [
            self::SORT => [$this, 'sort'],
        ];
    }

    public function sort(Builder $builder, $value)
    {
        if($value == 'likes'){
            $builder->with(['posts' => function ($q) {
                $q->withCount('likes')->orderby('likes_count', 'desc');
            }]);
        }

        if($value == 'comments'){
            $builder->where('tags', 'like', '%' . request('tag'). '%')->latest();
        }

        if($value == 'posts'){
            $builder->withCount('posts')->orderBy('posts_count', 'desc');
        }

        if($value == 'authors'){
            $builder->orderBy('first_name');
        }
    }


}

