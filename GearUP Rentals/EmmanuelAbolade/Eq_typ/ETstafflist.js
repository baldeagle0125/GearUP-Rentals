//Name: Emmanuel Abolade
//Student number: c00288657
//Date: 12/02/2024
//Project: c2p-equiphire

//validation of hire



function selectstaff() {
    var select = document.getElementById('staff');
    var input = document.getElementById('staffInput');
    var selectedValue = select.value;
    var inputValue = input.value;
    
    // If the user selected a staff from the dropdown
    if (selectedValue !== "") {
        input.value = ''; // Clear the input field
        // user picks any of the selected supplier ID (selectedValue)
        console.log('Selected staff ID:', selectedValue);
    }
    // If the user typed in a supplier name
    else if (inputValue.trim() !== "") {
        select.value = ''; // Reset the select dropdown
        // user may type the supplier name (inputValue)
        console.log('Typed supplier name:', inputValue);
    } else {
        // Show an error message or handle the case where neither option is selected
        console.error('Please select a supplier or enter a supplier name.');
    }
}


function selectcustomer() {
    var select = document.getElementById('customer');
    var input = document.getElementById('customerInput');
    var selectedValue = select.value;
    var inputValue = input.value;
    
    // If the user selected a staff from the dropdown
    if (selectedValue !== "") {
        input.value = ''; // Clear the input field
        // user picks any of the selected supplier ID (selectedValue)
        console.log('Selected customer ID:', selectedValue);
    }
    // If the user typed in a supplier name
    else if (inputValue.trim() !== "") {
        select.value = ''; // Reset the select dropdown
        // user may type the supplier name (inputValue)
        console.log('Typed customer name:', inputValue);
    } else {
        // Show an error message or handle the case where neither option is selected
        console.error('Please select a customer or enter a customer name.');
    }
}



function selectdescription() {
    var select = document.getElementById('equipment_type');
    var input = document.getElementById('equipment_typeInput');
    var selectedValue = select.value;
    var inputValue = input.value;
    
    // If the user selected a staff from the dropdown
    if (selectedValue !== "") {
        input.value = ''; // Clear the input field
        // user picks any of the selected supplier ID (selectedValue)
        console.log('Selected equipment type description:', selectedValue);
    }
    // If the user typed in a supplier name
    else if (inputValue.trim() !== "") {
        select.value = ''; // Reset the select dropdown
        // user may type the supplier name (inputValue)
        console.log('Typed equipment type description:', inputValue);
    } else {
        // Show an error message or handle the case where neither option is selected
        console.error('Please select an equipment type or enter a description.');
    }
}
function validateHireForm() {
	
    return confirm('Are you sure you want to continue (Y/N) ?');
}

function validateForm() {
	return confirm('Are you sure you want to continue (Y/N) ?);
}