
## About Javascript-Form-Validation

Javascript-From-Validation is a simple validation using only javascript.


## Installation

First download or clone this repository in your project folder. Link validation.oalid.js to your project. 

Wow, install successfully done.

## Uses

Just call js_form_validation() this method in script tag.
you need to place minimum 2 parameter in this. 
##### 1. Form Id 
##### 1. Validation Rules 
and optional parameter is :
##### Custom Validation Message 

## Example

    js_form_validation("form-id", {
        'input_name' : ['required'],
        'email' : ['required', 'email'],
        'website' : ['url'],
        'company_name' : ['required', 'min:3', 'max:20'],
        'mobile_number' : ['required_if:is_mobile,1'],
        'password' : ['required', 'min:6'],
        'confirm_password' : ['required', 'same:password'],
    }, {
        'name.required' : 'Name field must be required',
        'mobile_number.required_if' : 'Mobile Field is required',
    });
    

Here first parameter is form-id, second parameter is validation-rules, & third parameter is custom messages


You can place only first 2 parameter if you want to show default message for validation failed


## Available Validations

    required,
    email,
    url,
    min,
    max,
    same,
    required_if
    

##### required:  `required this field`
 `ex: 'input_name' : ['required'],`
 
##### email:  `valid email`
`ex: 'input_name' : ['email'],`

##### url:  `valid url`
`ex: 'input_name' : ['url'],`

##### min:  `minimum length of this input -> use min:value`
`ex: 'input_name' : ['min:5'],`

##### max:  `maximum length of this input -> use max:value`
`ex: 'input_name' : ['max:10'],`

##### same:  `for check this value is equal to another input field -> use same:previous_field`
`ex: 'input_name' : ['same:password'],`

##### required_if:  `required if another input value is equal to setter value, use -> required_if:another_input_field,value`
`ex: 'input_name' : ['required_if:is_mobile,1'],`




## License

The javascript-form-validation is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
