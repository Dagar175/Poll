<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Poll;


class Option extends Model
{
    use HasFactory;
    protected $guraded =[];
    protected $fillable = [
        'content'
    ];
    /**
     * Get the polls that owns the Option
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function polls(): BelongsTo
    {
        return $this->belongsTo(Poll::class, 'poll_id', 'id');
    }
}
