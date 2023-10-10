<?php namespace Ns\DeclarationForm\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Ns\DeclarationForm\Models\DeclarationModel;
use Validator;
use Redirect;
use Input;
use Flash;

/**
 * Declaration Backend Controller
 *
 */
class DeclarationController extends Controller
{
    public $implement = [
        \Backend\Behaviors\FormController::class,
        \Backend\Behaviors\ListController::class,
    ];

    public function index()
    {
        new ValidationException(['error' => 'Something went wrong!']);
        return $this->makeView('declaration');
    }

    public function store()
    {
        // Gather input
        $input = Input::all();

        // Define validation rules
        $rules = [
            'user_id' => 'required|integer|exists:users,id',
            'bill_type' => 'required|integer|exists:bill_declaration_type,id',
            'previous_indication' => 'required|numeric',
            'new_indication' => 'required|numeric',
            'image_path' => 'required|string',
        ];

        // Validate input
        $validator = Validator::make($input, $rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        // Store in database
        $declaration = new DeclarationModel;
        $declaration->fill($input);
        $declaration->save();

        // Provide feedback and redirect
        Flash::success('Declaration successfully created!');
        return Redirect::to('/declaration');
    }
}
