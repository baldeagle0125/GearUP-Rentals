document.addEventListener("DOMContentLoaded", function() {
    // Add event listeners to menu items
    document.getElementById("hire").addEventListener("click", function(event) {
        event.preventDefault(); // Prevent default link behavior
        // Handle hiring of equipment
        console.log("Hiring of Equipment clicked");
    });

    document.getElementById("return").addEventListener("click", function(event) {
        event.preventDefault();
        // Handle returning of equipment
        console.log("Return of Equipment clicked");
    });

    document.getElementById("payment").addEventListener("click", function(event) {
        event.preventDefault();
        // Handle making a payment
        console.log("Make a Payment clicked");
    });

    document.getElementById("stock").addEventListener("click", function(event) {
        event.preventDefault();
        // Handle stock control menu
        console.log("Stock Control Menu clicked");
    });

    document.getElementById("file").addEventListener("click", function(event) {
        event.preventDefault();
        // Handle file maintenance menu
        console.log("File Maintenance Menu clicked");
    });

    document.getElementById("reports").addEventListener("click", function(event) {
        event.preventDefault();
        // Handle reports menu
        console.log("Reports Menu clicked");
    });

 //   document.getElementById("quit").addEventListener("click", function(event) {
   //     event.preventDefault();
        // Handle quit option
//        console.log("Quit clicked");
 //   });
//});


document.addEventListener("DOMContentLoaded", function() {
    // Function to fetch staff data
    function fetchStaff() {
        // Send AJAX request to fetch staff data
        // Example using fetch API
        fetch('fetch_staff.php')
            .then(response => response.json())
            .then(data => {
                // Populate staff select box with fetched data
                const staffSelect = document.getElementById('staff');
                staffSelect.innerHTML = ''; // Clear previous options
                data.forEach(staff => {
                    const option = document.createElement('option');
                    option.value = staff.id;
                    option.textContent = staff.surname + ', ' + staff.name + ' (ID: ' + staff.id + ')';
                    staffSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching staff:', error));
    }

    // Function to fetch customer data
    function fetchCustomers() {
        // Send AJAX request to fetch customer data
        // Example using fetch API
        fetch('fetch_customers.php')
            .then(response => response.json())
            .then(data => {
                // Populate customer select box with fetched data
                const customerSelect = document.getElementById('customer');
                customerSelect.innerHTML = ''; // Clear previous options
                data.forEach(customer => {
                    const option = document.createElement('option');
                    option.value = customer.id;
                    option.textContent = customer.surname + ', ' + customer.name + ' (ID: ' + customer.id + ')';
                    customerSelect.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching customers:', error));
    }

    // Call functions to fetch staff and customer data when the page loads
    fetchStaff();
    fetchCustomers();

    // Function to update equipment information based on selected equipment type
    document.getElementById('equipment_type').addEventListener('change', function() {
        const selectedType = this.value;
        // Send AJAX request to fetch equipment information based on selected type
        // Update equipment information fields accordingly
    });

    // Function to calculate due date based on number of days selected
    document.getElementById('num_days').addEventListener('change', function() {
        const numDays = parseInt(this.value);
        // Calculate due date based on the current date and number of days
        const currentDate = new Date();
        const dueDate = new Date(currentDate.getTime() + numDays * 24 * 60 * 60 * 1000);
        // Update due date display
        document.getElementById('due_date').textContent = dueDate.toDateString();
    });

    // Function to display confirmation prompt before submitting form
    document.querySelector('form').addEventListener('submit', function(event) {
        // Prevent form submission
        event.preventDefault();
        // Display confirmation prompt
        const confirmed = confirm('Are you sure you want to add these hire details?');
        if (confirmed) {
            // If confirmed, submit the form
            this.submit();
        } else {
            // If not confirmed, do nothing
            return;
        }
    });
});
