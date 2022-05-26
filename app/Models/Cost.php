<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function details()
    {
        return $this->hasMany(CostDetail::class, 'cost_id', 'id');
    }

    public function creator()
    {
        return $this->belongsTo(User::class,'created_by', 'id')->withDefault();
    }

    public function journal()
    {
        return $this->belongsTo(Journal::class, 'no_reference', 'code');
    }
}
