<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;
use Spatie\Activitylog\Models\Activity as SpatieActivity;

class Activity extends SpatieActivity
{
    public function subject(): MorphTo
    {
        return $this->morphTo();
    }

    public function org()
    {
        return $this->subject()->where('subject_type', Org::class);
    }
}