$(document).ready(function () {
    $("#registerForm").submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "../api/auth/register.php", // adjust path based on your project
            method: "POST",
            contentType: "application/json",
            data: JSON.stringify({
                username: $("#username").val(),
                password: $("#password").val()
            }),
            success: function (response) {
                if (response.message === "User registered successfully.") {
                    $("#message").css("color", "green").text("Registration successful! Redirecting to login...");
                    setTimeout(() => {
                        window.location.href = "login.html";
                    }, 1500);
                } else {
                    $("#message").css("color", "red").text(response.message);
                }
            },
            error: function () {
                $("#message").text("Something went wrong. Try again.");
            }
        });
    });
});
