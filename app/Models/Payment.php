<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function paymentable()
    {
        return $this->morphTo();
    }

    public function journal()
    {
        return $this->belongsTo(Journal::class,'id', 'no_reference');
    }
}
