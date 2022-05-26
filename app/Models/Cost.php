<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function details()
    {
        return $this->hasMany(CostDetail::class );
    }

    public function creator()
    {
        return $this->belongsTo(User::class,'created_by', 'id')->withDefault();
    }
}
