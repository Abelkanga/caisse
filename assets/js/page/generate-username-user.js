$(document).ready(function () {
    $('#user_lastname, #user_firstname').on('input', function () {
        const firstName = $('#user_firstname').val().toLowerCase();
        const lastName = $('#user_lastname').val().toLowerCase();
        let prefix;
        if (!lastName) {
            prefix = `${firstName.split(' ')}`
        } else {
            prefix = `${firstName.split(' ')}_${lastName.split(' ')}`
        }
        let length = 8;
        let charset = "0123456789";
        let string = "";
        let i = 0, n = charset.length;

        for (; i < length; ++i) {
            string = charset.charAt(Math.floor(Math.random() * n));
        }
        string += prefix + charset.charAt(Math.floor(Math.random() * n));
        $("#user_username").val(string);
    })
})
