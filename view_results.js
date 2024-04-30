$(document).ready(function() {
    // Fetch test results for the logged-in user
    $.ajax({
        url: 'get_test_results.php',
        type: 'GET',
        success: function(response) {
            $('#testResults').html(response);
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            $('#testResults').html('<p>Error fetching test results</p>');
        }
    });
});
