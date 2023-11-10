    require(['jquery'], function($) {
        $(document).ready(function() {
            // Function to toggle the visibility of the "experience" class
            function toggleExperienceVisibility() {
                var areYouFresher = $("input[name='fresher']:checked").val();
                if (areYouFresher === 'yes') {
                    $('.experience').hide();
                } else {
                    $('.experience').show();
                }
            }

            // Initial toggle based on the default value
            toggleExperienceVisibility();

            // Event listener for radio button change
            $("input[name='fresher']").change(function() {
                toggleExperienceVisibility();
            });
        });
    });
