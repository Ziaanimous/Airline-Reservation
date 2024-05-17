   // Function to open the confirmation popup
   function openPopup() {
    var formData = new FormData(document.getElementById('reservationForm'));
    var details = '<p><strong>First Name:</strong> ' + formData.get('first_name') + '</p>' +
                  '<p><strong>Last Name:</strong> ' + formData.get('last_name') + '</p>' +
                  '<p><strong>Phone Number:</strong> ' + formData.get('phone_number') + '</p>' +
                  '<p><strong>From Location:</strong> ' + formData.get('from_location') + '</p>' +
                  '<p><strong>To Location:</strong> ' + formData.get('to_location') + '</p>' +
                  '<p><strong>Departure Date:</strong> ' + formData.get('departure_date') + '</p>' +
                  '<p><strong>Return Date:</strong> ' + (formData.get('return_date') || 'Not specified') + '</p>';
    document.getElementById('confirmationDetails').innerHTML = details;
    document.getElementById('confirmationModal').style.display = 'block';
}

// Function to close the confirmation popup
function closePopup() {
    document.getElementById('confirmationModal').style.display = 'none';
}

// Function to submit the reservation form
function submitReservation() {
    var formData = new FormData(document.getElementById('reservationForm'));

    // Add additional validation if needed
    var firstName = formData.get('first_name');
    var lastName = formData.get('last_name');
    var phoneNumber = formData.get('phone_number');
    var fromLocation = formData.get('from_location');
    var toLocation = formData.get('to_location');
    var departureDate = formData.get('departure_date');

    if (!firstName || !lastName || !phoneNumber || !fromLocation || !toLocation || !departureDate) {
        alert('Please fill out all required fields.');
        return;
    }

    // Submit the form data via AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'reservation.php', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Reload the page after successful submission
            window.location.reload();
        } else {
            // Display an error message if something went wrong
            alert('Error: ' + xhr.responseText);
        }
    };
    xhr.send(formData);

    // Close the confirmation popup after form submission
    closePopup();
}

