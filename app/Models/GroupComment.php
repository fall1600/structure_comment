<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class GroupComment extends Model
{
    use HasFactory;

    use NodeTrait;

    protected $guarded = ['id'];

    protected function getScopeAttributes()
    {
        return [
            'feed_id',
        ];
    }
}
