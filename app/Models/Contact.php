<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Contact
 *
 * @property int $id
 * @property string $nick_name
 * @property string $type_contact
 * @property string $contact_name
 * @property string $handphone
 * @property string|null $type_identity
 * @property string|null $identity_number
 * @property string $company_name
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $fax
 * @property string|null $npwp
 * @property string|null $purchase_address
 * @property string|null $shipping_address
 * @property string|null $bank_name
 * @property string|null $bank_account_number
 * @property string|null $branch_office
 * @property string|null $bank_account_name
 * @property int|null $akun_hutang
 * @property int|null $akun_piutang
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ContactFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereAkunHutang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereAkunPiutang($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereBankAccountName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereBankAccountNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereBankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereBranchOffice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCompanyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereContactName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereFax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereHandphone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereIdentityNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereNickName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereNpwp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact wherePurchaseAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereShippingAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereTypeContact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereTypeIdentity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Contact extends Model
{
    use HasFactory;

    protected $guarded = [];
}
