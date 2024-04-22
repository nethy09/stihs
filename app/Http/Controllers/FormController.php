<?php

namespace App\Http\Controllers;

use App\Models\form;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $form = Form::all();

        return view('form.index', compact('form'));
    }


    public function Form(Request $request)
    {
        // Validate the form data
        $validatedData = $request->validate([
            'item_name' => 'required',
            'quantity' => 'required|integer',
            // Add more validation rules as needed
        ]);

        // Create a new instance of the Form model
        $form = new Form();

        // Fill the model with the validated form data
        $form->item_name = $validatedData['item_name'];
        $form->quantity = $validatedData['quantity'];
        // Add more fields as needed

        // Save the form data to the database
        $form->save();

        // Redirect back to the form index page with a success message
        return redirect()->route('form.index')->with('success', 'Form submitted successfully!');
    }
}















