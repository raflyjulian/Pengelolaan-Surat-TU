<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\letter_type;
class letter extends Model
{
    use HasFactory;

    protected $fillable = [
        'letter_type_id',
        'letter_perihal',
        'recipients',
        'content',
        'attachment',
        'notulis',

    ];

    public function letterType(){
        return $this->belongsTo(letter_type::class, 'letter_type_id');
    }

    public function notulisUser()
    {
        return $this->belongsTo(User::class, 'notulis');
    }

}
