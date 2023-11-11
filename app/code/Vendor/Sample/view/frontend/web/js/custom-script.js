define(['jquery'], function ($) {
    'use strict';

    return function (config) {
        $(document).ready(function () {
            // Assuming config is defined somewhere in your layout or template
            $('#country').change(function () {
                updateState();
            });

            function updateState() {
                var country = $('#country').val();
                var regionList = $('#state-list');
                var statesInput = $('.field.states');

                if (country) {
                    $.ajax({
                        url: 'mypage/mypage/country',
                        type: 'POST',
                        data: {country: country},
                        dataType: 'json',
                        success: function (response) {
                            if (response.success) {
                                regionList.html(response.value);
                                if (response.value === '') {
                                    statesInput.show();
                                } else {
                                    statesInput.hide();
                                }
                            } else {
                                console.error(response.message);
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error(error);
                        }
                    });
                } else {
                    regionList.html('');
                    statesInput.hide();
                }
            }
        });
    };
});
