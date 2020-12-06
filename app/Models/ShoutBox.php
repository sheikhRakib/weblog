<?php

namespace App\Models;

use App\Libraries\C_DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoutBox extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'message',
    ];

    public function sender() {
        return $this->belongsTo(User::class, 'sender_id');
    }
}
