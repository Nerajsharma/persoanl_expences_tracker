
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
    setTimeout(function () {
        topnotification.slideToggle('slow');
    }, 4000)
};
const today = NepaliFunctions.GetCurrentBsDate().year + "-" + NepaliFunctions.GetCurrentBsDate().month + "-" + NepaliFunctions.GetCurrentBsDate().day;
$(document).ready(function () {
    // post income date 
    $('#income_form').submit(function (e) {
        e.preventDefault();
        var formdata = new FormData(this);
        $.ajax({
            url: '../dbfile/pushincome.php',
            method: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response === "true") {
                    topnotification("Record Successfully inserted", "sucess");
                    displayIncomeData();
                    blanceediting();
                    lenddata();
                    debitdata();
                    $("#income_section_form_cover").hide();
                    document.body.removeChild(overlay);
                } else {
                    topnotification("Error inserting record", "error");
                    console.log(response);
                }
            },
            error: function (error) {
                console.error(error);
            }
        });
    });
    // get income data
    function displayIncomeData() {
        $.ajax({
            url: '../dbfile/getincome.php',
            method: 'POST',
            // dataType: 'json',
            success: function (data) {
                $('#income_section_table').html(data);
            },
            error: function (error) {
                console.error(error);
            }
        });
    }
    //expance chart data
    function expancechart() {
        $.ajax({
            url: '../dbfile/chart.php',
            method: 'post',
            dataType: 'json',
            success: function (data) {
                // console.log(data);
                const chartdata = [data.Personal, data.education, data.room];
                // console.log(chartdata);

                const ctx = document.getElementById('myChart');
                new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: [
                            'Personal',
                            'Education',
                            'Room'
                        ], datasets: [{
                            label: 'Expenses',
                            data: chartdata,
                            hoverOffset: 4
                        }]
                    },
                });
            },
            error: function (error) {
                console.error(error);
            }
        });
    }

    //expance post data
    $('#expance_form').submit(function (e) {
        e.preventDefault();
        var balance = parseFloat($('#bankbalcmoney').text());
        var inputBalance = parseFloat($('#expance_amount').val());
        if (balance < inputBalance) {
            topnotification('Sorry..No more blance for expance..', 'error');
            // console.log(balance + "_" + inputBalance);
        } else {
            var formdata = new FormData(this);
            $.ajax({
                url: '../dbfile/pushexpance.php',
                method: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response === "true") {
                        topnotification("Record Successfully inserted", "sucess");
                        displayexpanceData();
                        blanceediting();
                        lenddata();
                        debitdata();
                        cleardebetform();

                        $("#expence_section_form_cover").hide();
                        document.body.removeChild(overlay);
                    } else {
                        topnotification("Error inserting record", "error");
                        console.log(response);
                    }
                },
                error: function (error) {
                    console.error(error);
                }
            })
        }
    });
    // get expance data
    function displayexpanceData() {
        $.ajax({
            url: '../dbfile/getexpance.php',
            method: 'GET',
            // dataType: 'json',
            success: function (data) {
                $('#expence_section_table').html(data);
            },
            error: function (error) {
                console.error(error);
            }
        });
    }
    // required post data
    $('#required-things_form').submit(function (e) {
        e.preventDefault();
        var formdata = new FormData(this);
        formdata.append('today', today);
        $.ajax({
            url: '../dbfile/pushrequiredthings.php',
            method: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response === "true") {
                    topnotification("Record Successfully inserted", "sucess");
                    displayrequireddata();
                    $("#required-things_form").hide();
                    document.body.removeChild(overlay);
                } else {
                    topnotification("Error inserting record", "error");
                    console.log(response);
                }
            },
            error: function (error) {
                console.error(error);
            }
        });
    });
    // get required data
    function displayrequireddata() {
        $.ajax({
            url: '../dbfile/getrequiredthings.php',
            method: 'post',
            // dataType: 'json',
            success: function (data) {
                $('#required_box_section').html(data);
                requiredtick();
                changestatus();
            },
            error: function (error) {
                console.error(error);
            }
        });
    }
    $('#requiredform_tick_btn').click(function (e) {
        e.preventDefault();
        var formdata = new FormData($('#required_form_check')[0]);
        $.ajax({
            url: '../dbfile/requireful.php',
            method: 'post',
            data: formdata,
            contentType: false,
            processData: false,
            success: function (responce) {
                if (responce == "true") {
                    displayrequireddata();
                    topnotification("Data has been successfuly change. ", "sucess");
                    $('#requireform_cross_btn').click();
                } else {
                    topnotification("Error on updating data", "error");
                }
            }
        })
    });
    // post room rent
    $('#roomrentadd_form').submit(function (e) {
        e.preventDefault();
        var formdata = new FormData(this);
        $.ajax({
            url: '../dbfile/pushroomrent.php',
            method: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response === "true") {
                    topnotification("Record Successfully inserted", "sucess");
                    displayrequireddata();
                    blanceediting();
                    displayroomrentd();
                    $("#roomdetaling_section_form_cover").hide();
                    document.body.removeChild(overlay);
                } else {
                    topnotification("Error inserting record", "error");
                    console.log(response);
                }
            },
            error: function (error) {
                console.error(error);
            }
        });
    });
    //display room rent 
    function displayroomrentd() {
        $.ajax({
            url: '../dbfile/getroomrentde.php',
            method: 'post',
            // dataType: 'json',
            success: function (data) {
                $('#roomrentdetailssd').html(data);
                // console.log(data);
                rostat();
                montrows();
            },
            error: function (error) {
                console.error(error);
            }
        });
    }
    // pay room rent
    $('#monthrentforms').submit(function (e) {
        e.preventDefault();
        var balance = parseFloat($('#bankbalcmoney').text());
        var inputBalance = parseFloat($('#monthrent_payment').val());
        if (balance < inputBalance) {
            topnotification('Sorry..No more blance..', 'error');
        } else {
            var formdata = new FormData(this);
            formdata.append('today', today)
            $.ajax({
                url: '../dbfile/pushmonthrent.php',
                method: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response === "true") {
                        topnotification("Room rent Successfully Updated", "sucess");
                        displayroomrentd();
                        displayexpanceData();
                        blanceediting();
                        $("#roomdetaling_section_form_coverrr").hide();
                        document.body.removeChild(overlay);
                    } else {
                        topnotification("Error inserting record", "error");
                        console.log(response);
                    }
                },
                error: function (error) {
                    console.error(error);
                }
            })
        }
    });
    // income ,expance,bank blance 
    function blanceediting() {
        $.ajax({
            url: '../dbfile/blanceediting.php',
            type: 'post',
            dataType: 'json',
            success: function (data) {
                // Now you can access the financial data in JavaScript
                $("#incomemoney").text(data.totalIncome);
                $("#expancemoney").text(data.totalExpense);
                $("#bankbalcmoney").text(data.netIncome);
                // console.log(data.totalIncome);
                // console.log(data.totalExpense);
                // console.log(data.netIncome);
            },
            error: function (error) {
                console.error('Error fetching financial data:', error);
            }
        });
    }
    // get lend data
    function lenddata() {
        $.ajax({
            url: '../dbfile/getlend_rows.php',
            type: 'POST',
            // dataType: 'json',
            success: function (data) {
                $('#lend_tablew').html(data);
                clearlendform();
                // console.log(data);
            },
            error: function (error) {
                console.error('Error fetching data:', error);
            }
        });
    };
    // get debit data
    function debitdata() {
        $.ajax({
            url: '../dbfile/getdebit.php',
            type: 'POST',
            // dataType: 'json',
            success: function (data) {
                $('#debit_table').html(data);
                cleardebetform();
                // console.log(data);
            },
            error: function (error) {
                console.error('Error fetching data:', error);
            }
        });
    };
    $('#logoutbtn').click(function (e) {
        e.preventDefault();
        $.ajax({
            url: '../dbfile/logout.php',
            success: function (data) {
                window.location.href = '../index.php';
                // window.location.reload();
                console.log(data);
            },
            error: function (error) {
                console.error(error);
            }
        });
    });
    // lend money pay
    $('#lend_form').submit(function (e) {
        e.preventDefault();
        var balance = parseFloat($('#bankbalcmoney').text());
        var inputBalance = parseFloat($('#lendpaying_amount').val());
        if (balance < inputBalance) {
            topnotification('Sorry..No more blance..', 'error');
        } else {
            var formdata = new FormData();

            formdata.append('lendername', $('#lendername').text());
            formdata.append('lendideclear', $('#lendideclear').val());
            formdata.append('lendpaying_amount', $('#lendpaying_amount').val());
            formdata.append('today', today);
            $.ajax({
                url: '../dbfile/paylendmoney.php',
                method: 'POST',
                data: formdata,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response === "true") {
                        topnotification("Lend Amount Successfully Updated", "sucess");
                        lenddata();
                        // expancechart();
                        displayexpanceData();
                        blanceediting();
                        $("#lend_clear_form").hide();
                        document.body.removeChild(overlay);
                    } else {
                        topnotification("Error inserting record", "error");
                        console.log(response);
                    }
                },
                error: function (error) {
                    console.error(error);
                }
            })
        }
    });
    // debet money pay
    $('#debet_form').submit(function (e) {
        e.preventDefault();
        // var balance = parseFloat($('#bankbalcmoney').text());
        // var inputBalance = parseFloat($('#debetpaying_amount').val());
        // if (balance < inputBalance) {
        //     topnotification('Sorry..No more blance..', 'error');
        // } else {
        var formdata = new FormData();

        formdata.append('debetername', $('#debetername').text());
        formdata.append('debetideclear', $('#debetideclear').val());
        formdata.append('debetpaying_amount', $('#debetpaying_amount').val());
        formdata.append('today', today);
        $.ajax({
            url: '../dbfile/paydebitmoney.php',
            method: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response === "true") {
                    topnotification("Debet Amount Successfully Updated", "sucess");
                    debitdata();
                    // expancechart();
                    displayIncomeData();
                    // displayexpanceData();
                    blanceediting();
                    $("#debet_clear_form").hide();
                    document.body.removeChild(overlay);
                } else {
                    topnotification("Error inserting record", "error");
                    console.log(response);
                }
            },
            error: function (error) {
                console.error(error);
            }
        })
        // }
    });
    // changepassword
    $('#changepassword_form').submit(function (e) {
        e.preventDefault();

        var newPassword = $('#newpassword').val();
        var confirmPassword = $('#repassword').val();

        // Check if the new password and confirm password match
        if (newPassword !== confirmPassword) {
            topnotification("New password and confirm password do not match", "error");
            return; // Stop 
        }

        var formdata = new FormData(this);
        formdata.append('today', today);

        $.ajax({
            url: '../dbfile/changepass.php',
            method: 'POST',
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response === "true") {
                    topnotification("Password has been updated successfully", "sucess");
                } else {
                    topnotification("Error updating password", "error");
                    console.log(response);
                }
            },
            error: function (error) {
                console.error(error);
            }
        });
    });
    //campus data push
    $('#campusdetaling_section_form').submit(function (e) {
        e.preventDefault();
        var formdata = new FormData(this);
        formdata.append('date', today);

        $.ajax({
            type: "POST",
            url: "../dbfile/pushcampus.php",
            data: formdata,
            contentType: false,
            processData: false,
            success: function (response) {
                topnotification("Bill has uploaded", "sucess");
                $('#campusdetaling_section_form .nb_cancle_btn').click();
                $('#campusdetaling_section_form')[0].reset();
                retrieveData();
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
    //get campus details
    function retrieveData() {
        $.ajax({
            type: "GET",
            url: "../dbfile/getcampus.php",
            success: function (data) {
                // console.log("Retrieved data:", data);
                $('#campusbill_section').html(data);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }
    retrieveData();
    debitdata();
    lenddata();
    displayrequireddata();
    displayexpanceData();
    displayIncomeData();
    requiredtick();
    displayroomrentd();
    blanceediting();
    lenddata();
    expancechart();

});
