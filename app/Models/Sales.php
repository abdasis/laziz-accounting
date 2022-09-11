<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Sales
 *
 * @property int $id
 * @property int $contact_id
 * @property string $code
 * @property string $transaction_date
 * @property string $due_date
 * @property int $no_transaction
 * @property string|null $no_refrence
 * @property string|null $income_tax_type
 * @property string|null $income_tax in percentage
 * @property string $status
 * @property string|null $remarks
 * @property string|null $internal_notes
 * @property int $created_by
 * @property int $updated_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Contact $customer
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SalesDetails[] $details
 * @property-read int|null $details_count
 * @property-read mixed $total
 * @method static \Database\Factories\SalesFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sales newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Sales query()
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereIncomeTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereIncomeTaxType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereInternalNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereNoRefrence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereNoTransaction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereTransactionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Sales extends Model
{
    use HasFactory;
    protected $guarded  = [];

    public function details()
    {
        return $this->hasMany(SalesDetails::class, 'sale_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(Contact::class, 'contact_id', 'id');
    }

    public function contact()
    {
        return  $this->belongsTo(Contact::class,'contact_id', 'id');
    }

    public function journal()
    {
        return $this->belongsTo(Journal::class, 'code', 'no_reference')->withDefault();
    }

    public function getTotalAttribute()
    {
        return $this->details->sum('total');
    }
}
