$(document).ready(function() {
    $('#data-form').submit(function(event) {
        event.preventDefault();
        
        var today = $('#today').val();
        var description = CKEDITOR.instances.description.getData();
        
        // Validate form data
        if (today === '') {
            $('#error-message').text('Please fill in Today fields.');
            return;
        }

        if (description === '') {
            $('#error-message').text('Please fill in descritpion fields.');
            return;
        }
        
        // Create an object to hold the data
        var data = {
            today: today,
            description: description
        };
        
        $.ajax({
            url: 'api/upload.php',
            type: 'POST',
            data: data,
            success: function(response) {
                // Handle the success response
                $('#success-message').text('Data submitted successfully.');
                $('#error-message').text('');
                $('#data-form')[0].reset();
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Handle the error response
                $('#error-message').text('An error occurred. Please try again later.');
                $('#success-message').text('');
            }
        });
    });
});