<?php namespace Ns\DeclarationForm\Models;

use Model;
use October\Rain\Database\Traits\Validation;

/**
 * BillTypeModel Model
 *
 */
class BillDeclarationTypeModel extends Model
{
    use Validation;

    /**
     * @var string table name
     */
    public $table = 'bill_declaration_type';

    /**
     * @var array rules for validation
     */
    public $rules = [
        'name' => 'required|string',
    ];

    /**
     * @var array fillable fields
     */
    protected $fillable = [
        'name',
    ];

    /**
     * @var array Relations
     */
    public $hasMany = [
        'bill_declaration' => ['Ns\DeclarationForm\Models\DeclarationModel'],
    ];
}
