<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'recipient_id',
        'body',
        'read_at',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function recipient()
    {
        return $this->belongsTo(User::class, 'recipient_id');
    }

    public function markAsReadForUser(int $userId)
    {
        if ($this->recipient_id === $userId && $this->read_at === null) {
            $this->read_at = Carbon::now();
            $this->save();
        }
    }

    public function scopeUnreadForUser($query, int $userId)
    {
        return $query->where('recipient_id', $userId)
                     ->whereNull('read_at');
    }
}