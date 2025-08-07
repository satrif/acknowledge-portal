<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpasiboJournal extends Model
{
    //
    use HasFactory;

    protected $table = 'spasibo-journal';

    protected $fillable = [
        'uid_send',
        'uid_to',
        'date_send',
        'v_id',
        'n_id',
        'description',
        'nom_description'
    ];

    protected $dates = [
        'date_send'
    ];

    // Связи (если нужны)
    public function sender()
    {
        return $this->belongsTo(User::class, 'pid_send');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'pid_to');
    }
}
