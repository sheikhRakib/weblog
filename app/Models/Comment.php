<?php

namespace App\Models;

use App\Libraries\C_DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
    ];

    public function getLastUpdateAttribute() {
        return C_DateTime::timeAgo($this->updated_at);
    }
}
