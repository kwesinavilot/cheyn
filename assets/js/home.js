// This jQuery file controls the homepage

$(document).ready(function(){
    //var signupShowing, loginShowing;

    //When the Sign Up link is clicked, the sign up content shows up
    $('#signup').click(
        function(clickEvent){
            clickEvent.preventDefault();    //Prevent link from going through

            $('#signup-content').css("left", "43%");
            $('#signup-content').css("visibility", "visible");
        }
    );

    //When this button is clicked, the Sign In content is hiddent
    $('#close-signup').click(
        function () {
            $('#signup-content').css("left", "105%");
            $('#signup-content').css("visibility", "hidden");
        }
    );

    //When this button is clicked, the Sign In content is hidden and the login content is shown
    $('#signup-to-login').click(
        function (clickEvent) {
            clickEvent.preventDefault();    //Prevent link from going through

            //Hide sign up content
            $('#signup-content').css("left", "105%");
            $('#signup-content').css("visibility", "hidden");

            //Show log in content
            $('#login-content').css("left", "43%");
            $('#login-content').css("visibility", "visible");
        }
    );

    //When the Login link is clicked, the login content will show up
    $('#login').click(
        function(clickEvent){
            clickEvent.preventDefault();    //Prevent link from going through

            $('#login-content').css("left", "43%");
            $('#login-content').css("visibility", "visible");
        }
    );

    //When this button is clicked, the Sign In content is hiddent
    $('#close-login').click(
        function () {
            $('#login-content').css("left", "105%");
            $('#login-content').css("visibility", "hidden");
        }
    );

    //When this button is clicked, the log in content is hidden and the sign up content is shown
    $('#login-to-signup').click(
        function (clickEvent) {
            clickEvent.preventDefault();    //Prevent link from going through

            //Hide the login content
            $('#login-content').css("left", "105%");
            $('#login-content').css("visibility", "hidden");

            //Show the sign up content
            $('#signup-content').css("left", "43%");
            $('#signup-content').css("visibility", "visible");
        }
    );

    //When this button is clicked, the Reset content is hidden
    $('#close-reset').click(
        function () {
            $('#reset-content').css("left", "105%");
            $('#reset-content').css("visibility", "hidden");
        }
    );

    //When this button is clicked, the log in content is hidden and the reset content is shown
    $('#login-to-reset' || '#back-to-reset').click(
        function (clickEvent) {
            clickEvent.preventDefault();    //Prevent link from going through

            //Hide the login content
            $('#login-content').css("left", "105%");
            $('#login-content').css("visibility", "hidden");

            //Show the sign up content
            $('#reset-content').css("left", "43%");
            $('#reset-content').css("visibility", "visible");
        }
    );

    //When this button is clicked, the reset content is hidden and the login content is shown
    $('#reset-to-login').click(
        function (clickEvent) {
            clickEvent.preventDefault();    //Prevent link from going through

            //Hide reset content
            $('#reset-content').css("left", "105%");
            $('#reset-content').css("visibility", "hidden");

            //Show log in content
            $('#login-content').css("left", "43%");
            $('#login-content').css("visibility", "visible");
        }
    );

    //When this button is clicked, the reset content is hidden and the sign up content is shown
    $('#reset-to-signup').click(
        function (clickEvent) {
            clickEvent.preventDefault();    //Prevent link from going through

            //Hide the reset content
            $('#reset-content').css("left", "105%");
            $('#reset-content').css("visibility", "hidden");

            //Show the sign up content
            $('#signup-content').css("left", "43%");
            $('#signup-content').css("visibility", "visible");
        }
    );

    $('#showCreate').click(
        function () {
            showPassword('create-password');
        }
    );

    $('#showConfirm').click(
        function () {
            showPassword('confirm-password');
        }
    );

    $('#showPass').click(
        function () {
            showPassword('password');
        }
    );

    // This function is for making the entered password visible
// @param element is the current password section we want to make visible
    function showPassword(element) {
        var passedElement = element;
        var inputElement = document.getElementById(passedElement);
        if (inputElement.type === "password") {
            inputElement.type = "text";
        } else {
            inputElement.type = "password";
        }
    }

});