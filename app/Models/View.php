<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class View extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'viewable_id', 'viewable_type'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function viewable()
    {
        return $this->morphTo();
    }
}
