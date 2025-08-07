<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpasiboLike extends Model
{
    //
    use HasFactory;

    protected $table = 'spasibo-likes';

    protected $fillable = [
        'a_id',
        'pid_send',
        'date_send'
    ];

    protected $dates = [
        'date_send'
    ];

    // Связи
    public function assignment()
    {
        return $this->belongsTo(SpasiboItem::class, 'a_id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'pid_send');
    }
}
