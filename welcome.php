<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Javascript Form Validation</title>

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            .container {
                margin-left: 50px;
                margin-top: 50px;
            }
            tr{
                line-height: 2;
            }
        </style>
    </head>
    <body>
        <div class="container">
             <form id="validation">
                <table>
                    <tr>
                        <td>Name</td>
                        <td> : </td>
                        <td>
                            <input type="text" name="name" id="name" placeholder="Enter Name">
                        </td>
                        <td>
                            <span class="name_error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td> : </td>
                        <td>
                            <input type="email" name="email" id="email" placeholder="Enter Email">
                        </td>
                        <td>
                            <span class="email_error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Website</td>
                        <td> : </td>
                        <td>
                            <input type="text" name="website" id="website" placeholder="Enter Website">
                        </td>
                        <td>
                            <span class="website_error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Password</td>
                        <td> : </td>
                        <td>
                            <input type="text" name="password" id="password" placeholder="Enter Password">
                        </td>
                        <td>
                            <span class="password_error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Confirm Password</td>
                        <td> : </td>
                        <td>
                            <input type="text" name="confirm_password" id="confirm_password" placeholder="Enter Password Again">
                        </td>
                        <td>
                            <span class="confirm_password_error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Have Mobile?</td>
                        <td> : </td>
                        <td>
                            <input type="checkbox" name="is_mobile" value="1" id="is_mobile">
                            <!-- <input type="text" name="is_mobile" value="1" id="is_mobile"> -->
                        </td>
                        <td>
                            <span class="is_mobile_error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Mobile Number</td>
                        <td> : </td>
                        <td>
                            <input type="text" name="mobile_number" id="mobile_number" placeholder="Enter Mobile Number">
                        </td>
                        <td>
                            <span class="mobile_number_error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td><input type="submit" id="submitBtn" value="SubmitForm"></td>
                        <td></td>
                    </tr>
                </table>
            </form>

        </div>

        <script src="./validation.oalid.js" type="text/javascript"></script>
        <script type="text/javascript">
            let validation_rules = {
                'name' : ['required', 'min:10', 'max:50'],
                'email' : ['required', 'email'],
                'website' : ['required', 'url'],
                'password' : ['required', 'min:6'],
                'confirm_password' : ['required', 'same:password'],
                'mobile_number' : ['required_if:is_mobile,1']
            };
            
            let validation_messages = {
                'name.required' : 'Name field is required',
                'name.min' : 'Minimum Character is 10',
                'confirm_password.same' : 'Confirm Password A=A',
                'mobile_number.required_if' : 'Mobile Number is required',
            };
            js_form_validation("validation", validation_rules, validation_messages);
            // document.getElementById("submit").addEventListener("click", function() {
                
            //     let validation_rules = {
            //         'name' : ['required', 'min:10', 'max:50'],
            //         'email' : ['required', 'email'],
            //         'website' : ['required', 'url'],
            //         'password' : ['required', 'min:6'],
            //         'confirm_password' : ['required', 'same:password'],
            //         'mobile_number' : ['required_if:is_mobile,1']
            //     };
            //     let validation_messages = {
            //         'name.required' : 'Name field is required',
            //         'name.min' : 'Minimum Character is 10',
            //         'confirm_password.same' : 'Confirm Password A=A',
            //         'mobile_number.required_if' : 'Mobile Number is required',
            //     };


            //     let field_name;
            //     let rules;
            //     let rule_index;
            //     let errors = new Array();

            //     if(typeof validation_rules !== 'undefined') {
            //         for(field_name in validation_rules)
            //         {
            //             document.getElementsByClassName(field_name+"_error")[0].innerHTML = "";
            //             rules = validation_rules[field_name];
            //             for(rule_index in rules)
            //             {
            //                 if(errors[field_name] == null) {
            //                     if(rule_name(rules[rule_index]) == 'required') {
            //                         if (!validation_required(field_name)) {
            //                             errors[field_name] = ['required'];
            //                         }
            //                     }
            //                     if(rule_name(rules[rule_index]) == 'email') {
            //                         if (!validation_email(field_name)) {
            //                             errors[field_name] = ['email'];
            //                         }
            //                     }
            //                     if(rule_name(rules[rule_index]) == 'url') {
            //                         if (!validation_url(field_name)) {
            //                             errors[field_name] = ['url'];
            //                         }
            //                     }
            //                     if(rule_name(rules[rule_index]) == 'min') {
            //                         let min_val = rule_value(rules[rule_index]);
            //                         if (!validation_string_min(field_name, min_val)) {
            //                             errors[field_name] = ['min', min_val];
            //                         }
            //                     }
            //                     if(rule_name(rules[rule_index]) == 'max') {
            //                         let max_val = rule_value(rules[rule_index]);
            //                         if (!validation_string_max(field_name, max_val)) {
            //                             errors[field_name] = ['max', max_val];
            //                         }
            //                     }
            //                     if(rule_name(rules[rule_index]) == 'same') {
            //                         let same_column = rule_value(rules[rule_index]);
            //                         if (!validation_same_field(field_name, same_column)) {
            //                             errors[field_name] = ['same', same_column];
            //                         }
            //                     }
            //                     if(rule_name(rules[rule_index]) == 'required_if') {
            //                         let required_if_column_name = rule_another_column_name(rules[rule_index]);
            //                         let required_if_column_value = rule_another_column_name_value(rules[rule_index]);
            //                         if (!validation_required_if(field_name, required_if_column_name, required_if_column_value)) {
            //                             errors[field_name] = ['required_if', required_if_column_name, required_if_column_value];
            //                         }
            //                     }
            //                 }
            //             }
            //         }
            //     }
            //     console.log(errors);
            //     let error_field_full_rules = '';
            //     for(field_name in errors) {
            //         if(errors[field_name][0] == 'required') {
            //             error_field_full_rules = field_name+".required";
            //             if(typeof validation_messages !== 'undefined') {
            //                 if(error_field_full_rules in validation_messages) {
            //                     document.getElementsByClassName(field_name+"_error")[0].innerHTML = validation_messages[error_field_full_rules];
            //                 } else {
            //                     document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" is required";
            //                 }
            //             } else {
            //                 document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" is required";
            //             }
            //         }
            //         if(errors[field_name][0] == 'email') {
            //             error_field_full_rules = field_name+".email";
            //             if(typeof validation_messages !== 'undefined') {
            //                 if(error_field_full_rules in validation_messages) {
            //                     document.getElementsByClassName(field_name+"_error")[0].innerHTML = validation_messages[error_field_full_rules];
            //                 } else {
            //                     document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" should be a valid email";
            //                 }
            //             } else {
            //                 document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" should be a valid email";
            //             }
            //         }
            //         if(errors[field_name][0] == 'url') {
            //             error_field_full_rules = field_name+".url";
            //             if(typeof validation_messages !== 'undefined') {
            //                 if(error_field_full_rules in validation_messages) {
            //                     document.getElementsByClassName(field_name+"_error")[0].innerHTML = validation_messages[error_field_full_rules];
            //                 } else {
            //                     document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" should be a valid url";
            //                 }
            //             } else {
            //                 document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" should be a valid url";
            //             }
            //         }
            //         if(errors[field_name][0] == 'min') {
            //             error_field_full_rules = field_name+".min";
            //             if(typeof validation_messages !== 'undefined') {
            //                 if(error_field_full_rules in validation_messages) {
            //                     document.getElementsByClassName(field_name+"_error")[0].innerHTML = validation_messages[error_field_full_rules];
            //                 } else {
            //                     document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" should be greater then "+errors[field_name][1]+" character";
            //                 }
            //             } else {
            //                 document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" should be greater then "+errors[field_name][1]+" character";
            //             }
            //         }
            //         if(errors[field_name][0] == 'max') {
            //             error_field_full_rules = field_name+".max";
            //             if(typeof validation_messages !== 'undefined') {
            //                 if(error_field_full_rules in validation_messages) {
            //                     document.getElementsByClassName(field_name+"_error")[0].innerHTML = validation_messages[error_field_full_rules];
            //                 } else {
            //                     document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" should be less then or equal "+errors[field_name][1]+" character";
            //                 }
            //             } else {
            //                 document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" should be less then or equal "+errors[field_name][1]+" character";
            //             }
            //         }
            //         if(errors[field_name][0] == 'same') {
            //             error_field_full_rules = field_name+".same";
            //             if(typeof validation_messages !== 'undefined') {
            //                 if(error_field_full_rules in validation_messages) {
            //                     document.getElementsByClassName(field_name+"_error")[0].innerHTML = validation_messages[error_field_full_rules];
            //                 } else {
            //                     document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" should be same as " + titleCase(errors[field_name][1]);
            //                 }
            //             } else {
            //                 document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" should be same as " + titleCase(errors[field_name][1]);
            //             }
            //         }
            //         if(errors[field_name][0] == 'required_if') {
            //             error_field_full_rules = field_name+".required_if";
            //             if(typeof validation_messages !== 'undefined') {
            //                 if(error_field_full_rules in validation_messages) {
            //                     document.getElementsByClassName(field_name+"_error")[0].innerHTML = validation_messages[error_field_full_rules];
            //                 } else {
            //                     document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" is required if " + titleCase(errors[field_name][1]) + " value is " + errors[field_name][2];
            //                 }
            //             } else {
            //                 document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" is required if " + titleCase(errors[field_name][1]) + " value is " + errors[field_name][2];
            //             }
            //         }
                    
            //     }
            //     return false;

            // });

            // function validation_required(element) {
            //     if(document.getElementById(element).value.length > 0) {
            //         return true;
            //     } else {
            //         return false;
            //     }
            //     return false;
            // }

            // function validation_required_if(field_name, required_if_column_name, required_if_column_value) {
            //     let required_if_input_column_value  = '';
            //     let required_if_input_column_type = document.getElementById(required_if_column_name).type;
            //     if((required_if_input_column_type == 'checkbox') || (required_if_input_column_type == 'radio')){
            //         if(document.getElementById(required_if_column_name).checked == true) {
            //             required_if_input_column_value = document.getElementById(required_if_column_name).value;
            //         } else {
            //             required_if_input_column_value = '';
            //         }
            //     } else {
            //         required_if_input_column_value = document.getElementById(required_if_column_name).value;
            //     }

            //     if(required_if_input_column_value == required_if_column_value) {
            //         if(document.getElementById(field_name).value.length > 0) {
            //             return true;
            //         } else {
            //             return false;
            //         }
            //     } else {
            //         return true;
            //     }
            // }

            // function validateEmail(email) {
            //     var email_regx = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            //     return email_regx.test(email);
            // }

            // function validateUrl(email) {
            //     var url_regx = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;
            //     return url_regx.test(email);
            // }

            // function validation_email(element) {
            //     var email = document.getElementById(element).value;
            //     if (validateEmail(email)) {
            //         return true;
            //     } else {
            //         return false;
            //     }
            //     return false;
            // }

            // function validation_url(element) {
            //     var url = document.getElementById(element).value;
            //     if (validateUrl(url)) {
            //         return true;
            //     } else {
            //         return false;
            //     }
            //     return false;
            // }

            // function validation_string_min(element, length) {
            //     if(document.getElementById(element).value.length >= length) {
            //         return true;
            //     } else {
            //         return false;
            //     }
            //     return false;
            // }

            // function validation_string_max(element, length) {
            //     if(document.getElementById(element).value.length <= length) {
            //         return true;
            //     } else {
            //         return false;
            //     }
            //     return false;
            // }

            // function validation_same_field(field_1, field_2) {
            //     let field_1_val = document.getElementById(field_1).value;
            //     let field_2_val = document.getElementById(field_2).value;
            //     if(field_1_val === field_2_val) {
            //         return true;
            //     } else {
            //         return false;
            //     }
            // }

            // function titleCase(str) {
            //     var splitStr = str.toLowerCase().split('-').join(' ').split('_').join(' ').split(' ');
            //     for (var i = 0; i < splitStr.length; i++) {
            //         splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);     
            //     }
            //     return splitStr.join(' '); 
            // }

            // function rule_name(full_rule) {
            //     return full_rule.split(':')[0];
            // }
            // function rule_value(full_rule) {
            //     return full_rule.split(':')[1];
            // }
            // function rule_another_column_name(full_rule) {
            //     return full_rule.split(':')[1].split(',')[0];
            // }
            // function rule_another_column_name_value(full_rule) {
            //     return full_rule.split(':')[1].split(',')[1];
            // }



        </script>
    </body>
</html>
