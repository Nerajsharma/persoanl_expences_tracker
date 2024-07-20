<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (isset($_SESSION['userid'])) {
    header("Location: dashboard/index.php");
    exit();
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Aapna khalti</title>
    <link rel="stylesheet" href="nb_files/nb_file.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://nirajkumarsharma.com.np/icons/main.css" type="text/css" />

    <script src="nb_files/nb_file.js"></script>
    <style>
    .nb_submit_btn {
        background-color: #6193ff;
        color: white;
    }

    #topnotification {
        display: none;
        font-size: 16px;
        text-align: center;
        width: 60%;
        /* color: crimson; */
        position: fixed;
        top: 1em;
        left: 20%;
        padding: 5px 6px;
        border-radius: 4px;
        box-shadow: 0 0 5px black;
        z-index: 99999999;
        color: white;
    }

    #topnotification.errornoti {
        background-color: crimson;
    }

    #topnotification.sucessnoti {
        background-color: rgb(80, 202, 202);
    }
    </style>
</head>

<body>
    <div class="wapper">
        <div class="outer">
            <div class="cover">
                <div id="topnotification" class=""></div>
                <div class="nb_row nb_jcc nb_aic nb_m_2 nb_form_box_cover">
                    <div class="nb_sm_col_10 nb_col_4">
                        <div class="nb_form_box">
                            <p class="nb_form_header">Login</p>
                            <form id="login_form" method="get">
                                <div class="nb_input_type" title="Enter username or email">
                                    <i class="nb_envelop"></i><input type="text" placeholder="Username" id="username"
                                        required>
                                </div>
                                <div class="nb_input_type" title="Enter the password">
                                    <i class="nb_key"></i><input type="password" placeholder="Password" id="password"
                                        required><i class="nb_eye" showpass="password"></i>
                                </div>
                                <div class="nb_btn_group">
                                    <button class="nb_form_btn nb_submit_btn" id="loginbtn" type="submit">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function topnotification(text, sucess) {
        let topnotification = $('#topnotification');
        topnotification.slideToggle('slow');
        if (sucess == 'sucess') {
            topnotification.addClass('sucessnoti');
            topnotification.removeClass('errornoti');
        } else {
            topnotification.removeClass('sucessnoti');
            topnotification.addClass('errornoti');

        }
        topnotification.text(text);
        setTimeout(function() {
            topnotification.slideToggle('slow');
        }, 4000)
    };
    $(document).ready(function() {
        $('#login_form').submit(function(e) {
            e.preventDefault();
            // Get username and password values
            var username = $('#username').val();
            var password = $('#password').val();
            $.ajax({
                url: 'dbfile/login.php',
                method: 'POST',
                data: {
                    username: username,
                    password: password
                },
                success: function(response) {
                    // Handle success response from login.php
                    if (response.trim() === "sucessfully") {
                        topnotification("Login successfully", "success");
                        // window.location.href = 'dashboard/index.php';
                        window.location.href = "dashboard/index.php";
                        // window.location.reload();

                    } else {
                        topnotification(response, "error");
                    }
                    // You can redirect or perform other actions based on the response
                },
                error: function(xhr, status, error) {
                    // Handle error response
                    console.error(xhr.responseText);
                    topnotification("Error during login", "error");
                }
            });
        });
    });
    </script>
</body>

</html>