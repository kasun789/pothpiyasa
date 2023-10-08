// Get the notification container and point elements
const notificationContainer = document.getElementById('notificationContainer');
const notificationPoint = document.getElementById('notificationPoint');
const notificationIcon = document.getElementById('notificationIcon');

document.addEventListener("click", (event) => {
  // Check if the click event occurred outside of the notification container
  if (event.target !== notificationIcon &&!notificationContainer.contains(event.target)) {
    // Hide the notification container
    notificationContainer.classList.remove('notificationContainerView');
    console.log('hri')
  }
});

// Display the notification UI and remove the notification number
function showNotification() {
  // Display the notification UI
  notificationContainer.classList.add('notificationContainerView');
 
  notificationPoint.classList.add('notificationPointView');
  

  // Send the AJAX request to remove the notification number
  const requestBody = { value: '1' };

  fetch('http://localhost/pothpiyasa/public/Notifications/removeNumber', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify(requestBody)
  })
    .then(res => res.json())
    .then(data => {
      console.log('Value updated successfully', data);
    })
    .catch(error => {
      console.error('Error updating value:', error);
    });
}



