<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\PurchaseDetails
 *
 * @property int $id
 * @property int $purchase_id
 * @property string $product
 * @property string $description
 * @property int $quantity
 * @property string|null $unit
 * @property string $tax
 * @property string|null $discount
 * @property string $price
 * @property string $total
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PurchaseDetailsFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails query()
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails whereProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails wherePurchaseId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class PurchaseDetails extends Model
{
    use HasFactory;

    protected $guarded  = [];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
