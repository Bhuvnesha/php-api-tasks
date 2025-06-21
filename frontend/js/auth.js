$(document).ready(function () {
    $("#loginForm").submit(function (e) {
        e.preventDefault();

        $.ajax({
            url: "../api/auth/login.php",  // adjust path as needed
            method: "POST",
            contentType: "application/json",
            data: JSON.stringify({
                username: $("#username").val(),
                password: $("#password").val()
            }),
            xhrFields: {
                withCredentials: true // allow PHP sessions across requests
            },
            success: function (response) {
                if (response.message === "Login successful.") {
                    $("#message").css("color", "green").text("Login successful! Redirecting...");
                    setTimeout(() => {
                        window.location.href = "dashboard.html";
                    }, 1000);
                } else {
                    $("#message").text(response.message);
                }
            },
            error: function () {
                $("#message").text("Something went wrong. Try again.");
            }
        });
    });
});
