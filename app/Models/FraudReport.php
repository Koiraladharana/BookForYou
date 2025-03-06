<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FraudReport extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'fraud_user_id', 'message'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function fraudUser()
    {
        return $this->belongsTo(User::class, 'fraud_user_id');
    }
}
