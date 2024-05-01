document.addEventListener("DOMContentLoaded", function() {
    // Function to fetch equipment types from the server
    function fetchEquipmentTypes() {
        // Make an AJAX request to fetch equipment types from the server
        // Replace 'fetch_equipment_types.php' with the actual endpoint to fetch equipment types
        fetch('fetch_equipment_types.php')
            .then(response => response.json())
            .then(data => {
                // Populate the select dropdown with equipment types
                const select = document.getElementById('equipmentType');
                select.innerHTML = ''; // Clear previous options
                data.forEach(equipmentType => {
                    const option = document.createElement('option');
                    option.value = equipmentType.id;
                    option.textContent = equipmentType.description;
                    select.appendChild(option);
                });
            })
            .catch(error => console.error('Error fetching equipment types:', error));
    }

    // Function to fetch and display equipment details
    function displayEquipmentDetails(equipmentTypeId) {
        // Make an AJAX request to fetch equipment details from the server
        // Replace 'fetch_equipment_details.php' with the actual endpoint to fetch equipment details
        fetch('fetch_equipment_details.php?equipment_type_id=' + equipmentTypeId)
            .then(response => response.json())
            .then(data => {
                // Display equipment details in the div
                const detailsDiv = document.getElementById('equipmentDetails');
                detailsDiv.innerHTML = ''; // Clear previous details
                const heading = document.createElement('h3');
                heading.textContent = 'Equipment Type Details';
                detailsDiv.appendChild(heading);
                const ul = document.createElement('ul');
                Object.entries(data).forEach(([key, value]) => {
                    const li = document.createElement('li');
                    li.textContent = `${key}: ${value}`;
                    ul.appendChild(li);
                });
                detailsDiv.appendChild(ul);
                detailsDiv.classList.remove('hidden');
            })
            .catch(error => console.error('Error fetching equipment details:', error));
    }

    // Fetch equipment types when the page loads
    fetchEquipmentTypes();

    // Event listener for equipment type selection
    const select = document.getElementById('equipmentType');
    select.addEventListener('change', function() {
        const selectedEquipmentTypeId = this.value;
        if (selectedEquipmentTypeId) {
            displayEquipmentDetails(selectedEquipmentTypeId);
        } else {
            const detailsDiv = document.getElementById('equipmentDetails');
            detailsDiv.classList.add('hidden');
        }
    });
});
