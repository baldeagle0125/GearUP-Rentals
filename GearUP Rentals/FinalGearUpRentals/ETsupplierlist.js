//Name: Emmanuel Abolade
//Student number: c00288657
//Date: 12/02/2024
//Project: c2p-equiphire

function selectsupplier() {
    var select = document.getElementById('supplier');
    var input = document.getElementById('supplierInput');
    var selectedValue = select.value;
    var inputValue = input.value;
    
    // If the user selected a supplier from the dropdown
    if (selectedValue !== "") {
        input.value = ''; // Clear the input field
        // user picks any of the selected supplier ID (selectedValue)
        console.log('Selected supplier ID:', selectedValue);
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
