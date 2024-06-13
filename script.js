// script.js

document.addEventListener('DOMContentLoaded', function() {
    // Get the search form element
    var searchForm = document.querySelector('#search form');

    // Add event listener for form submission
    searchForm.addEventListener('submit', function(event) {
        // Prevent the default form submission
        event.preventDefault();

        // Get the search parameters
        var hospital = document.getElementById('hospital').value;
        var specialization = document.getElementById('specialization').value;
        var date = document.getElementById('date').value;

        // Create a new XMLHttpRequest object
        var xhr = new XMLHttpRequest();

        // Configure the request
        xhr.open('GET', 'search.php?hospital=' + hospital + '&specialization=' + specialization + '&date=' + date, true);

        // Define the callback function
        xhr.onload = function() {
            if (xhr.status >= 200 && xhr.status < 400) {
                // Update the search results section with the response
                document.getElementById('doctors').innerHTML = xhr.responseText;
            } else {
                console.error('Request failed: ' + xhr.status);
            }
        };

        // Send the request
        xhr.send();
    });
});

