<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Vinkla\Hashids\Facades\Hashids;


class Transaction extends Model
{
    protected $hidden = [
        'id',
        'category_id',
        'user_id',
        'created_at',
        'updated_at',
    ];

    protected $fillable = [
        'user_id',
        'category_id',
        'nominal',
        'notes',
        'transaction_date'
    ];

    protected $casts = [
        'transaction_date' => 'datetime'
    ];

    public function getHashIdAttribute()
    {
        return Hashids::encode($this->id);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
