// Fetch equipment types from server
   fetch('fetch_equipment_types.php')
      .then(response => response.json())
      .then(data => populateEquipmentTypes(data))
      .catch(error => console.error('Error fetching equipment types:', error));

// Function to populate equipment types in select box
   function populateEquipmentTypes(types) {
   const selectBox = document.getElementById('equipmentType');
   types.forEach(equipment_type => {
         const option = document.createElement('option');
         option.value = equipment_type.id;
         option.textContent = equipment_type.description;
         selectBox.appendChild(option);
      });
  }

// Form submission event listener
        document.getElementById('deleteETForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission
            const typeId = document.getElementById('equipmentType').value;
            fetch(`check_hire_status.php?id=${typeId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.is_hired) {
                        alert("Cannot delete this equipment type as it has items currently on hire.");
                    } else {
                        const confirmation = confirm("Are you sure you wish to delete this equipment type? (Y/N)");
                        if (confirmation) {
                            fetch('delete_equipment_type.php', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/x-www-form-urlencoded'
                                },
                                body: `id=${typeId}`
                            })
                            .then(response => response.text())
                            .then(message => {
                                alert(message);
                                // Refresh page after deletion
                                location.reload();
                            })
                            .catch(error => console.error('Error deleting equipment type:', error));
                        }
                    }
                })
                .catch(error => console.error('Error checking hire status:', error));
        });
   
