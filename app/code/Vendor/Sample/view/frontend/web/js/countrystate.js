require(['jquery'], function($) {
    // Wrap your code in jQuery document ready function to ensure the DOM is fully loaded
$(document).ready(function ($) {
    $(document).on('change', '#country', function () {
        var param = 'country=' + $('#country').val();
        $.ajax({
            url: getCountryActionUrl(), // Call the function to get the URL
            data: param,
            type: "GET",
            dataType: 'json'
        }).done(function (data) {
            $('#state').empty();
            if (data.value == '') {
                $('.field.states.required').show();
                $('.field.region.required').hide();
            } else {
                $('#state').append(data.value);
                $('.field.states.required').hide();
                $('.field.region.required').show();
            }
        });
    });

    // Function to get the country action URL
    function getCountryActionUrl() {
        return $('#country-action-url').val(); // Assuming you have an element with id 'country-action-url' to store the URL
    }
});
});
