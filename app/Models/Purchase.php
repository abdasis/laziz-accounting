<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Utils;

/**
 * App\Models\Purchase
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\PurchaseDetails[] $details
 * @property-read int|null $details_count
 * @property-read mixed $total_price
 * @property-read \App\Models\Contact $supplier
 * @method static \Database\Factories\PurchaseFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase query()
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereDueDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereIncomeTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereIncomeTaxType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereInternalNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereNoRefrence($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereNoTransaction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereRemarks($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereTransactionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Purchase whereUpdatedBy($value)
 * @mixin \Eloquent
 */
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


}
