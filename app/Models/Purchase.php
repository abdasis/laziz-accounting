<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Utils;


class Purchase extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function details()
    {
        return $this->hasMany(PurchaseDetails::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Contact::class, 'contact_id');
    }

    public function getTotalPriceAttribute()
    {
        return $this->details->sum('total');
    }

    public function journal()
    {
        return $this->hasOne(Journal::class, 'no_reference', 'code');
    }


}
