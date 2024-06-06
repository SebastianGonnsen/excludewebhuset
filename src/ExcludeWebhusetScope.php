<?php

namespace SebastianGonnsen\ExcludeWebhuset;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class ExcludeWebhusetScope implements Scope
{
    protected $excludedDomain;

    public function __construct($excludedDomain)
    {
        $this->excludedDomain = $excludedDomain;
    }

    public function apply(Builder $builder, Model $model)
    {
        $builder->where('email', 'NOT LIKE', $this->excludedDomain);
    }
}
