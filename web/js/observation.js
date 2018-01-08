$(document).ready(function() {

    $('#location').locationpicker({
        location: {
            latitude: 46.15242437752303,
            longitude: 2.7470703125
        },
        radius: 300,
        inputBinding: {
            latitudeInput: $('#location-lat'),
            longitudeInput: $('#location-lon'),
            radiusInput: $('#location-radius'),
            locationNameInput: $('#location-address')
        },
        enableAutocomplete: true
    });
    $('#location-dialog').on('shown.bs.modal', function () {
        $('#location').locationpicker('autosize');
    });
});