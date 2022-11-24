// Retreiving Required Elements
const acm_id = document.getElementById('acm_id')
const reg_no = document.getElementById('reg_no');
const college = document.getElementById('college');
const name = document.getElementById('name');
const email = document.getElementById('email');
const ph_no = document.getElementById('ph_no');
const dept = document.getElementById('dept');
const event = document.getElementById('event');
const male = document.getElementById('male').checked;
const section = document.getElementById('section');

// Required Variables
const reg_no_regex = /^[0-9]{5}[aA][0-9a-zA-Z]{4}$/


// Function to display error messages(Bootstrap Alert)
function alert(msg) {
    const div = document.createElement('div');
    div.className = `alert alert-dismissible alert-warning mt-3`;
    div.appendChild(document.createTextNode(msg));
    const card = document.querySelector('.card-body');
    card.appendChild(div);

    setTimeout(() => {
        document.querySelector('.alert').remove();
    }, 3000);
}

// On Submitting the form
document.forms[0].addEventListener('submit', (e) => {
    e.preventDefault();
    errors = [];

    // Checking for Empty Fields
    // Registration Number
    if (reg_no.value.trim().length === 0) {
        errors.push({
            name: "reg_no",
            msg: "Registration Number is Required"
        });
    };
    // Name
    if (name.value.trim().length === 0) {
        errors.push({
            name: "name",
            msg: "Name is Required"
        });
    };
    // Email
    if (email.value.trim().length === 0) {
        errors.push({
            name: "email",
            msg: "Email is Required"
        });
    };
    // Contact Number
    if (ph_no.value.trim().length === 0) {
        errors.push({
            name: "ph_no",
            msg: "Contact Number is Required"
        });
    };
    // Department
    if (dept.value.trim().length === 0) {
        errors.push({
            name: "dept",
            msg: "Branch is Required"
        });
    };

    // Addon Registration Number Validation
    // checking if JNTU number belongs to GMRIT(starts with 1834)
    if (/^[1-2][7890]34$/.test(reg_no.value.trim().substr(0, 4))) {
        // Checking for Valid JNTU Number
        if ((reg_no.value.trim().length !== 10) || (!reg_no_regex.test(reg_no.value.trim()))) {
            errors.push({
                name: "reg_no",
                msg: "Invalid JNTU Number"
            });
        };
    };

    // Addon Contact Number Validation
    if (ph_no.value.trim().length !== 10) {
        errors.push({
            name: "ph_no",
            msg: "Invalid Contact Number"
        })
    }


    // Displaying Errors
    errors.forEach(error => {
        alert(error.msg)
    });

    if (errors.length === 0) {
        document.forms[0].submit();
        console.log('end');
    };

});