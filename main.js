const add = document.getElementById('add-ev');
const remove = document.getElementById('recent-video');
const GoToGroup = document.getElementById('Group');

GoToGroup.addEventListener('click',() => {
    // Navigate to a new page by changing the URL
    window.location.href = 'https://chat.whatsapp.com/BTE5Ctb5LCv8d612JY54N2';
})

add.addEventListener('click', () => {
    // Navigate to a new page by changing the URL
    window.location.href = 'ev.php';
});

remove.addEventListener('click', () => {
    // Navigate to a new page by changing the URL
    window.location.href = 'del.php';
});

// Function to fetch the JSON data
async function fetchEventData() {
    try {
        const response = await fetch('ev-added.json');
        const eventData = await response.json();
        return eventData;
    } catch (error) {
        console.error('Error fetching JSON data:', error);
        return [];
    }
}

// Function to calculate the remaining days and time for an event
function calculateTimeRemaining(event) {
    const eventDate = new Date(event.time);
    const now = new Date();
    
    const timeRemaining = eventDate - now;
    
    const daysRemaining = Math.floor(timeRemaining / (1000 * 60 * 60 * 24));
    const hoursRemaining = Math.floor((timeRemaining % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    
    return { days: daysRemaining, hours: hoursRemaining };
}

//  (previous code)

// ... (previous code)

// Function to populate the table with event data and remaining time
async function populateTable() {
    const eventData = await fetchEventData();
    const now = new Date();

    eventData.forEach(event => {
        const cell = document.getElementById(event.id);
        if (cell) {
            const link = document.createElement('a');

            // Check if the event's time matches the current time
            if (now.getHours() == event.time) {
                link.href = event.url;
                link.textContent = event.title + ' (Join now)';
                link.classList.add('running-event');
            } else {
                link.href = '#';
                link.textContent = event.title;
            }

            cell.appendChild(link);
        }
    });
}

// ... (rest of the code)

// Call the populateTable function when the DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    populateTable();
});
