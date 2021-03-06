<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        //
        // Tienen que figurar todas las columnas del formulario, sino las graba como null
        //
        return [
            'razonsocial' => ['required','between:3,100'],
            'contacto' => ['required','alpha_num','between:3,100'],
            'correo' => ['required','email','unique:clientes,correo'],
            'cuit' => ['nullable','digits_between:10,11'],
            'iva_id' => ['nullable','digits:1'],
            // 'telefono1' => ['nullable','alpha_num','between:5,15'],
            'telefono1' => ['nullable','string','between:5,15'],
            'telefono2' => ['nullable','string','between:5,15'],
            'calle_nombre' => ['nullable','string','between:3,100'],
            'calle_numero' => ['nullable','digits_between:1,5'],
            'codigo_postal' => ['nullable','alpha_num','between:4,20'],
            'barrio_id' => ['nullable','digits_between:1,5'],
            'localidad_id' => ['nullable','digits_between:1,5'],
            'provincia_id' => ['nullable','digits_between:1,2'],
            // 'fecha_alta' => ['nullable','date_format:dd/mm/Y'],
            'fecha_alta' => ['nullable','date'],
            'observaciones' => ['nullable'],
        ];
    }
    /**
 * Get the error messages for the defined validation rules.
 *
 * @return array
 */
public function messages()
{
    return [
        'razonsocial.required' => 'Debe ingresar la Razon Socialx',
    //     'razonsocial.between' => 'La Razon Social debe tener al menos 3 letras',
    //     'telefono1.required' => 'Debe ingresar el Nro. de Telefono',
    //     'telefono1.digits_between' => 'El Nro. de Tel??fono debe tener mas de 6 d??gitos',
    ];

    // return [
    //     // 'required' => 'The :attribute es requeridisimo.',
    //     'email' => 'El :attribute no es una direccion validaaaaaaaaa',
    //     // 'between' => 'The :attribute value :input debe estar entre :min - :max.',
    // ];

    // $messages = [
    //     'razonsocial.required' => 'Debe ingresar la Razon Socialxxxxxxxxxxxxxxxxxxxx',
    //     // 'razonsocial.between' => 'La Razon Social debe tener al menos 3 letras',
    //     // 'telefono1.required' => 'Debe ingresar el Nro. de Telefono',
    //     'telefono1.digits_between' => 'El Nro. de Tel??fono debe tener mas de 6 d??gitos',
    // ];

    // $attributes = [
    //     // 'required' => 'The :attribute es requeridisimo.',
    //     'email' => 'El :attribute no es una direccion validaaaaaaaaa',
    //     // 'between' => 'The :attribute value :input debe estar entre :min - :max.',
    // ];

    // return ([$messages, $attributes]);

}

public function attributes()
{
//         // the attributes method replaces the :attribute placeholder on the validation messages
//         // with given attribute names

//         // You can use the trans(...) helper function here to get your 'localized' from
//         // resources/lang/{language}/{file}

//         // set your default and fallback locale in the config/app.php file
//         // I will assume you are using English ('en')
    return [
        'calle_nombre' => 'Nombre de la calle',
        'calle_numero' => 'Numero del domicilio',
    ];
}

// $request->validate(
//     [
//         'name' => 'required|string|max:20',
//         'email' => 'required|email|unique:users,email',
//         'phone' => 'required|numeric|min:10',
//         'password' => 'required|alpha_num|min:6',
//         'confirmPassword' => 'required|same:password',
//         'gender' => 'required',
//         'address' => 'required'
//     ],
//     [
//         'name.required' => 'Please enter your name',
//         'name.max' => 'Name must not be more than 20 chars',
//         'email.required' => 'Please enter your email',
//         'email.email' => 'Email must be a valid email address',
//         'phone.required' => 'Please enter the phone number',
//         'phone.numeric' => 'Phone number must be a number',
//         'password.required' => 'Please enter the password',
//         'password.alpha_num' => 'Password must be alpha numeric chars',
//         'password.min' => 'Password should be minium 6 chars',
//         'confirmPassword.required' => 'Please re-enter the password',
//         'confirmPassword.same' => 'Password must be same',
//         'gender.required' => 'Please select the gender',
//         'address.required' => 'Please enter the address',
//     ]
// );

}
