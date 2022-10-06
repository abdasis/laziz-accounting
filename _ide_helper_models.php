<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Account
 *
 * @property int $id
 * @property int $account_category_id
 * @property int $code
 * @property string $name
 * @property string|null $description
 * @property int|null $parent_id
 * @property string $account_type
 * @property string $default_balance
 * @property string $lock_status
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Account newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Account newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Account query()
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereAccountCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereAccountType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereDefaultBalance($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereLockStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $report_type
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\JournalDetail[] $journals
 * @property-read int|null $journals_count
 * @method static \Illuminate\Database\Eloquent\Builder|Account whereReportType($value)
 */
	class Account extends \Eloquent {}
}

namespace App\Models{
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
	class AccountCategory extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Aset
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\AsetFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Aset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Aset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Aset query()
 * @method static \Illuminate\Database\Eloquent\Builder|Aset whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aset whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Aset whereUpdatedAt($value)
 */
	class Aset extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read \App\Models\Account|null $hutang
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Journal[] $journals
 * @property-read int|null $journals_count
 * @property-read \App\Models\Account|null $piutang
 */
	class Contact extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Cost
 *
 * @property int $id
 * @property int|null $contact_id
 * @property string $code
 * @property string $name
 * @property string $transaction_date
 * @property string $description
 * @property string|null $notes
 * @property string|null $payment_method
 * @property string $total
 * @property string $status
 * @property string|null $no_reference
 * @property int|null $created_by
 * @property int $updated_by
 * @property int|null $deleted_by
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $creator
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CostDetail[] $details
 * @property-read int|null $details_count
 * @property-read \App\Models\Journal|null $journal
 * @method static \Database\Factories\CostFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cost newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cost query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereNoReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereTransactionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cost whereUpdatedBy($value)
 */
	class Cost extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\CostDetail
 *
 * @property int $id
 * @property int $cost_id
 * @property string $name
 * @property string|null $description
 * @property string $amount
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\CostDetailFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|CostDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CostDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CostDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|CostDetail whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CostDetail whereCostId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CostDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CostDetail whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CostDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CostDetail whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CostDetail whereUpdatedAt($value)
 */
	class CostDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Customer
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Customer query()
 * @mixin \Eloquent
 */
	class Customer extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Employee
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Employee query()
 * @mixin \Eloquent
 */
	class Employee extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Journal
 *
 * @property int $id
 * @property int|null $contact_id
 * @property string $code
 * @property string|null $unit
 * @property string $name
 * @property string $transaction_date
 * @property string $description
 * @property string|null $notes
 * @property string $total
 * @property string $status
 * @property string|null $no_reference
 * @property string|null $type penjualan
 * @property int|null $created_by
 * @property int $updated_by
 * @property int|null $deleted_by
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Contact|null $contact
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\JournalDetail[] $details
 * @property-read int|null $details_count
 * @method static \Database\Factories\JournalFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Journal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Journal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereNoReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereTransactionDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereUnit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Journal whereUpdatedBy($value)
 */
	class Journal extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\JournalDetail
 *
 * @property int $id
 * @property int $journal_id
 * @property int $account_id
 * @property int|null $contact_id
 * @property string $debit
 * @property string $credit
 * @property string|null $memo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Account|null $account
 * @property-read \App\Models\Journal|null $journal
 * @method static \Database\Factories\JournalDetailFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|JournalDetail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JournalDetail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JournalDetail query()
 * @method static \Illuminate\Database\Eloquent\Builder|JournalDetail whereAccountId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JournalDetail whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JournalDetail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JournalDetail whereCredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JournalDetail whereDebit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JournalDetail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JournalDetail whereJournalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JournalDetail whereMemo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JournalDetail whereUpdatedAt($value)
 */
	class JournalDetail extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Payment
 *
 * @property int $id
 * @property int $paymentable_id
 * @property string $paymentable_type
 * @property string|null $payment_method
 * @property string $payment_date
 * @property string $amount
 * @property string|null $notes
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $deleted_by
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PaymentFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePaymentDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePaymentMethod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePaymentableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePaymentableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedBy($value)
 */
	class Payment extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $code
 * @property string $name
 * @property string|null $description
 * @property string $price
 * @property int|null $tax
 * @property int|null $sale_account
 * @property int|null $purchase_account
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ProductFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePurchaseAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSaleAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTax($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $sales_price
 * @property string|null $purchase_price
 * @property-read \App\Models\Account|null $purchaseAccount
 * @property-read \App\Models\Account|null $saleAccount
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePurchasePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereSalesPrice($value)
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
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
 * @property-read \App\Models\Journal|null $journal
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
 */
	class Purchase extends \Eloquent {}
}

namespace App\Models{
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
 * @property int $product_id
 * @method static \Illuminate\Database\Eloquent\Builder|PurchaseDetails whereProductId($value)
 */
	class PurchaseDetails extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Report
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ReportFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Report newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Report newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Report query()
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Report whereUpdatedAt($value)
 */
	class Report extends \Eloquent {}
}

namespace App\Models{
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
 * @property string|null $pph_account
 * @property string|null $total_ppn
 * @property-read \App\Models\Contact $contact
 * @property-read \App\Models\Journal|null $journal
 * @method static \Illuminate\Database\Eloquent\Builder|Sales wherePphAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Sales whereTotalPpn($value)
 */
	class Sales extends \Eloquent {}
}

namespace App\Models{
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
 * @property int $product_id
 * @property int|null $contact_id
 * @property int|null $day
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesDetails whereProductId($value)
 */
	class SalesDetails extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Staff
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\StaffFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Staff newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Staff query()
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Staff whereUpdatedAt($value)
 */
	class Staff extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Supplier
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Supplier query()
 * @mixin \Eloquent
 */
	class Supplier extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class User extends \Eloquent {}
}

