<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AccountCategory
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string|null $notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\AccountCategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AccountCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AccountCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|AccountCategory whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountCategory whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AccountCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AccountCategory extends Model
{

    use HasFactory;
    protected $guarded = [];
}
