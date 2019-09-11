function js_form_validation(form_id, validation_rules, validation_messages=null) {
    document.querySelector("#"+form_id).addEventListener("submit",function(e) {
        
        if(validation_messages === null) {
            validation_messages = {};
        }
        
        let field_name;
        let rules;
        let rule_index;
        let errors = new Array();
        

        if(typeof validation_rules !== 'undefined') {
            for(field_name in validation_rules)
            {
                document.getElementsByClassName(field_name+"_error")[0].innerHTML = "";
                rules = validation_rules[field_name];
                for(rule_index in rules)
                {
                    if(errors[field_name] == null) {
                        if(rule_name(rules[rule_index]) == 'required') {
                            if (!validation_required(field_name)) {
                                errors[field_name] = ['required'];
                            }
                        }
                        if(rule_name(rules[rule_index]) == 'email') {
                            if (!validation_email(field_name)) {
                                errors[field_name] = ['email'];
                            }
                        }
                        if(rule_name(rules[rule_index]) == 'url') {
                            if (!validation_url(field_name)) {
                                errors[field_name] = ['url'];
                            }
                        }
                        if(rule_name(rules[rule_index]) == 'min') {
                            let min_val = rule_value(rules[rule_index]);
                            if (!validation_string_min(field_name, min_val)) {
                                errors[field_name] = ['min', min_val];
                            }
                        }
                        if(rule_name(rules[rule_index]) == 'max') {
                            let max_val = rule_value(rules[rule_index]);
                            if (!validation_string_max(field_name, max_val)) {
                                errors[field_name] = ['max', max_val];
                            }
                        }
                        if(rule_name(rules[rule_index]) == 'same') {
                            let same_column = rule_value(rules[rule_index]);
                            if (!validation_same_field(field_name, same_column)) {
                                errors[field_name] = ['same', same_column];
                            }
                        }
                        if(rule_name(rules[rule_index]) == 'required_if') {
                            let required_if_column_name = rule_another_column_name(rules[rule_index]);
                            let required_if_column_value = rule_another_column_name_value(rules[rule_index]);
                            if (!validation_required_if(field_name, required_if_column_name, required_if_column_value)) {
                                errors[field_name] = ['required_if', required_if_column_name, required_if_column_value];
                            }
                        }
                    }
                }
            }
        }
        let error_field_full_rules = '';
        for(field_name in errors) {
            if(errors[field_name][0] == 'required') {
                error_field_full_rules = field_name+".required";
                if(typeof validation_messages !== 'undefined') {
                    if(error_field_full_rules in validation_messages) {
                        document.getElementsByClassName(field_name+"_error")[0].innerHTML = validation_messages[error_field_full_rules];
                    } else {
                        document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" is required";
                    }
                } else {
                    document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" is required";
                }
            }
            if(errors[field_name][0] == 'email') {
                error_field_full_rules = field_name+".email";
                if(typeof validation_messages !== 'undefined') {
                    if(error_field_full_rules in validation_messages) {
                        document.getElementsByClassName(field_name+"_error")[0].innerHTML = validation_messages[error_field_full_rules];
                    } else {
                        document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" should be a valid email";
                    }
                } else {
                    document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" should be a valid email";
                }
            }
            if(errors[field_name][0] == 'url') {
                error_field_full_rules = field_name+".url";
                if(typeof validation_messages !== 'undefined') {
                    if(error_field_full_rules in validation_messages) {
                        document.getElementsByClassName(field_name+"_error")[0].innerHTML = validation_messages[error_field_full_rules];
                    } else {
                        document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" should be a valid url";
                    }
                } else {
                    document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" should be a valid url";
                }
            }
            if(errors[field_name][0] == 'min') {
                error_field_full_rules = field_name+".min";
                if(typeof validation_messages !== 'undefined') {
                    if(error_field_full_rules in validation_messages) {
                        document.getElementsByClassName(field_name+"_error")[0].innerHTML = validation_messages[error_field_full_rules];
                    } else {
                        document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" should be greater then "+errors[field_name][1]+" character";
                    }
                } else {
                    document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" should be greater then "+errors[field_name][1]+" character";
                }
            }
            if(errors[field_name][0] == 'max') {
                error_field_full_rules = field_name+".max";
                if(typeof validation_messages !== 'undefined') {
                    if(error_field_full_rules in validation_messages) {
                        document.getElementsByClassName(field_name+"_error")[0].innerHTML = validation_messages[error_field_full_rules];
                    } else {
                        document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" should be less then or equal "+errors[field_name][1]+" character";
                    }
                } else {
                    document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" should be less then or equal "+errors[field_name][1]+" character";
                }
            }
            if(errors[field_name][0] == 'same') {
                error_field_full_rules = field_name+".same";
                if(typeof validation_messages !== 'undefined') {
                    if(error_field_full_rules in validation_messages) {
                        document.getElementsByClassName(field_name+"_error")[0].innerHTML = validation_messages[error_field_full_rules];
                    } else {
                        document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" should be same as " + titleCase(errors[field_name][1]);
                    }
                } else {
                    document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" should be same as " + titleCase(errors[field_name][1]);
                }
            }
            if(errors[field_name][0] == 'required_if') {
                error_field_full_rules = field_name+".required_if";
                if(typeof validation_messages !== 'undefined') {
                    if(error_field_full_rules in validation_messages) {
                        document.getElementsByClassName(field_name+"_error")[0].innerHTML = validation_messages[error_field_full_rules];
                    } else {
                        document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" is required if " + titleCase(errors[field_name][1]) + " value is " + errors[field_name][2];
                    }
                } else {
                    document.getElementsByClassName(field_name+"_error")[0].innerHTML = titleCase(field_name)+" is required if " + titleCase(errors[field_name][1]) + " value is " + errors[field_name][2];
                }
            }
            
        }

        if(Object.keys(errors).length === 0) {
            return true;
        } else {
            e.preventDefault();
            return false;
        }
        

    });

    function validation_required(element) {
        if(document.getElementById(element).value.length > 0) {
            return true;
        } else {
            return false;
        }
        return false;
    }

    function validation_required_if(field_name, required_if_column_name, required_if_column_value) {
        let required_if_input_column_value  = '';
        let required_if_input_column_type = document.getElementById(required_if_column_name).type;
        if((required_if_input_column_type == 'checkbox') || (required_if_input_column_type == 'radio')){
            if(document.getElementById(required_if_column_name).checked == true) {
                required_if_input_column_value = document.getElementById(required_if_column_name).value;
            } else {
                required_if_input_column_value = '';
            }
        } else {
            required_if_input_column_value = document.getElementById(required_if_column_name).value;
        }

        if(required_if_input_column_value == required_if_column_value) {
            if(document.getElementById(field_name).value.length > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    }
}

function validateEmail(email) {
    var email_regx = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return email_regx.test(email);
}

function validateUrl(email) {
    var url_regx = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;
    return url_regx.test(email);
}

function validation_email(element) {
    var email = document.getElementById(element).value;
    if (validateEmail(email)) {
        return true;
    } else {
        return false;
    }
    return false;
}

function validation_url(element) {
    var url = document.getElementById(element).value;
    if (validateUrl(url)) {
        return true;
    } else {
        return false;
    }
    return false;
}

function validation_string_min(element, length) {
    if(document.getElementById(element).value.length >= length) {
        return true;
    } else {
        return false;
    }
    return false;
}

function validation_string_max(element, length) {
    if(document.getElementById(element).value.length <= length) {
        return true;
    } else {
        return false;
    }
    return false;
}

function validation_same_field(field_1, field_2) {
    let field_1_val = document.getElementById(field_1).value;
    let field_2_val = document.getElementById(field_2).value;
    if(field_1_val === field_2_val) {
        return true;
    } else {
        return false;
    }
}

function titleCase(str) {
    var splitStr = str.toLowerCase().split('-').join(' ').split('_').join(' ').split(' ');
    for (var i = 0; i < splitStr.length; i++) {
        splitStr[i] = splitStr[i].charAt(0).toUpperCase() + splitStr[i].substring(1);     
    }
    return splitStr.join(' '); 
}

function rule_name(full_rule) {
    return full_rule.split(':')[0];
}
function rule_value(full_rule) {
    return full_rule.split(':')[1];
}
function rule_another_column_name(full_rule) {
    return full_rule.split(':')[1].split(',')[0];
}
function rule_another_column_name_value(full_rule) {
    return full_rule.split(':')[1].split(',')[1];
}
