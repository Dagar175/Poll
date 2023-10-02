<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Poll extends Model
{
    use HasFactory;
        protected $fillable = [
            'title',
            'description',
        ];

        public function user(): BelongsTo
        {
            return $this->belongsTo(User::class, 'user_id', 'id');
        }

        /**
         * Get all of the options for the Poll
         *
         * @return \Illuminate\Database\Eloquent\Relations\HasMany
         */
        public function options(): HasMany
        {
            return $this->hasMany(Option::class, 'poll_id', 'id');
        }
      /**
       * Get all of the Votes for the Poll
       *
       * @return \Illuminate\Database\Eloquent\Relations\HasMany
       */
      public function votes(): HasMany
      {
          return $this->hasMany(Votes::class, 'poll_id', 'id');
      }
}
