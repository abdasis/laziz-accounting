<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SalesDetails
 *
 * @property int $id
 * @property int $sale_id
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
 * @property-read \App\Models\Sales $sale
 * @method static \Database\Factories\SalesDetailsFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails query()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereProduct($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereQuantity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereSaleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SalesDetails extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function sale()
    {
        return $this->belongsTo(Sales::class, 'sale_id');
    }
}
