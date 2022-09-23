<?php

namespace App\Traits;

use App\Models\Tag;

trait Taggable
{
    public function tags(){
        return $this->morphMany(Tag::class, 'taggable');
    }
}
