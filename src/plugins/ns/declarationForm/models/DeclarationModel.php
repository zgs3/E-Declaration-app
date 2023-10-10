<?php namespace Ns\DeclarationForm\Models;

use Model;
use October\Rain\Database\Traits\Validation;

/**
 * Declaration Model
 *
 */
class DeclarationModel extends Model
{
    use Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'bill_declaration';

    /**
     * @var array rules for validation
     */
    public $rules = [
        'user_id' => 'required|integer|exists:users,id',
        'bill_type_id' => 'required|integer|exists:bill_declaration_type,id',
        'previous_indication' => 'required|numeric',
        'new_indication' => 'required|numeric',
        'image_path' => 'file|image',
    ];

    /**
     * @var array fillable fields
     */
    protected $fillable = [
        'user_id',
        'bill_type_id',
        'previous_indication',
        'new_indication',
    ];

    /**
     * @var array Relations
     */
    public $belongsTo = [
        'user' => ['RainLab\User\Models\User'],
        'bill_declaration_type' => ['Ns\DeclarationForm\Models\BillDeclarationTypeModel'],
    ];

    /**
     * @var array Relations
     */
    public $attachOne = [
        'image' => ['System\Models\File']
    ];
}
