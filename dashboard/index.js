let btnnavbtn = document.querySelectorAll("#bottom_navbar div button.clickablebt");

btnnavbtn.forEach((li) => {
    // li.classList.remove("nb_tab_active");
    li.addEventListener("click", (e) => {
        e.preventDefault();
        // li.classList.add("nb_tab_active");
        var litarget = li.getAttribute("nav_target") + "_section";
        document.querySelectorAll(".nb_colsection").forEach((colsection) => {
            colsection.style.display = "none";
        });
        document.getElementById(litarget).style.display = "block";
        liattributr = li.getAttribute("formtarget");
        // console.log(liattributr);
        if (liattributr === "true") {
            document.getElementById("addfrombtn").setAttribute("btnform_target", litarget);
        }
        else {
            document.getElementById("addfrombtn").setAttribute("btnform_target", " ");

        }
    });
});
let nb_nepali_cal = document.querySelectorAll('.nb_nepali_cal');
nb_nepali_cal.forEach(cal => {
    cal.nepaliDatePicker();
});

document.getElementById("addfrombtn").addEventListener("click", (e) => {
    e.preventDefault();
    var attvalue = document.getElementById("addfrombtn").getAttribute("btnform_target");
    if (attvalue.length > 2) {
        var att = "#" + attvalue + "_form_cover"
        // console.log(att);
        // document.getElementById(att).style.display = "block";
        // $(att).show();
        $(att).fadeIn("fast");
        blurback(att);
    }
});
document.getElementById("debitbtnbox").addEventListener("click", (e) => {
    e.preventDefault();
    $("#lend_section").hide();
    $("#lend_section").addClass('nb_hidden');
    $("#debet_section").show();
    $("#debet_section").removeClass('nb_hidden');
    $("#lendbtnbox").removeClass('lendbtnactive');
    $("#debitbtnbox").addClass('lendbtnactive');
})
document.getElementById("lendbtnbox").addEventListener("click", (e) => {
    e.preventDefault();
    $("#lend_section").show();
    $("#lend_section").removeClass('nb_hidden');
    $("#debet_section").hide();
    $("#debet_section").addClass('nb_hidden');
    $("#lendbtnbox").addClass('lendbtnactive');
    $("#debitbtnbox").removeClass('lendbtnactive');
});

$(document).ready(function () {
    $('.creaditdebit_box .nb_col_9').each(function () {
        var subElement = $(this).find('p:first sub');
        // console.log(subElement.text());

        if (subElement.text().trim().toLowerCase() !== 'clear') {
            // If the text is 'clear', change the color to red
            subElement.css('color', '#CC2936');
            subElement.css('font-weight', 'bold');
        } else {
            // Otherwise, change the color to green
            subElement.css('color', '#216869');
        }
    });
});
$(document).ready(function () {
    $("#profile_btn").click(function () {
        $("#profile_div_section").slideToggle("fast");
    });
});
$(document).ready(function () {
    var profileElement = $('#profile_div_section .profile_section_wapper div div .nb_col_10');

    profileElement.each(function () {
        $(this).click(function (e) {
            e.preventDefault();
            $('.nb_colsection').hide();

            var targetdiv = '#' + $(this).attr("tarsection");
            var formtarget = $(this).attr("formtarget");
            // var formtargetdiv = targetdiv + ;
            // console.log(formtarget);
            if (formtarget == "true") {
                $('#addfrombtn').attr('btnform_target', $(this).attr("tarsection"));
            } else {
                $('#addfrombtn').attr('btnform_target', ' ');

            }
            // console.log(targetdiv);

            // Show the target div or perform any other actions
            $(targetdiv).show();
            $("#profile_div_section").slideToggle("fast");
        });
    });
});

function requiredtick() {
    let requiredp = $('.requiredbox_section_wapper .nb_row .nb_col_9 .nb_row p.rename');

    requiredp.each(function (index, element) {
        var attrval = $(element).attr('status');
        var iTag = $(element).find('i');
        if (attrval == 'true') {
            iTag.addClass('nb_tick');
        } else {
            iTag.addClass('nb_crossb');
        }
        // console.log();
    });
}
function rostat() {
    let rentsub = $('.room_section_box .nb_row .nb_col_9 .nb_row .room_month_rent sub');
    rentsub.each(function (index, sub) {
        var subtext = parseFloat($(sub).text());
        var subi = $(sub).find('i');
        var subspan = $(sub).find('span'); // Change here
        // console.log(subspan);
        var postsub = Math.abs(subtext);
        // console.log(postsub);
        if (subtext > 0) {
            // console.log("number is positive");
            $(sub).css('color', 'crimson');
            $(sub).css('font-weight', 'bold');
            subi.addClass('downred');
            subi.removeClass('upgreen');
            subi.addClass('nb_play31');
        } else {
            // console.log("number is negative");
            $(sub).css('color', 'green');
            subi.removeClass('downred');
            subi.addClass('upgreen');
            subi.addClass('nb_play31');
            $(subspan).text(postsub);
        }
    });
}

function montrows() {
    let monthrent_rows = $('.room_section_box .nb_row .nb_col_9 .nb_row');
    let monthren_form = $('#roomdetaling_section_form_coverrr');

    monthrent_rows.each(function (index, row) {
        $(row).click(function (e) {
            e.preventDefault();
            $(monthren_form).show();
            blurback('#roomdetaling_section_form_coverrr');

            let rentId = $(this).closest('.nb_col_9').attr('rentid');
            // console.log("Rent ID: ", rentId);
            let monthName = $(this).find('.room_month_name').text().trim();
            // console.log("Month Name: ", monthName);

            $('#roomdetaling_section_form_coverrr #month_id').val(rentId);
            $('#roomdetaling_section_form_coverrr #Month_name_label').val(monthName);
        });
    });

}
//top to bottom animation
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
}
// animation("text", 'sucess');
function changestatus() {
    let required_rows = $('.requiredbox_section_wapper .nb_row .nb_col_9');
    let required_form = $('#required_complet_form');

    required_rows.each(function (index, row) {
        $(row).click(function (e) {
            e.preventDefault();
            $(required_form).show();
            var snvalue = $(this).find('.requiresnholderclas').val();
            $('#requiresnholder').val(snvalue);
            blurback('#required_complet_form');
        });
    });

    $('#requireform_cross_btn').click(function (e) {
        e.preventDefault();
        // Assuming 'overlay' is the id of the overlay element
        $('#overlay').remove();  // Use the correct id or selector
        $('#required_complet_form').hide();
    });

    // console.log("I am running up");
};
function clearlendform() {
    $("#lend_tablew .nb_col_9").each(function (index, row) {
        $(row).click(function (e) {
            e.preventDefault();
            var lendid = $(row).attr('lendid');
            var name = $(row).find('p:first').text().trim().replace(/[0-9]/g, '');
            var status = $(row).find('p:first sub').text().trim();
            var moneyText = $(row).find('p:last').text().trim();
            var money = parseFloat(moneyText.replace('Rs.', '').trim());
            $('#lendideclear').val(lendid);
            $('#lendername').text(name);
            console.log(name);
            $('#lended_amount').text(money);
            $('#lendstatus').text(status);

            $('#lend_clear_form').show();
            blurback('#lend_clear_form');

        });
    })
}
function cleardebetform() {
    $("#debit_table .nb_col_9").each(function (index, row) {
        $(row).click(function (e) {
            e.preventDefault();
            var debetid = $(row).attr('debetid');
            var name = $(row).find('p:first').text().trim().replace(/[0-9]/g, '');;
            var status = $(row).find('p:first sub').text().trim();
            var moneyText = $(row).find('p:last').text().trim();
            var money = parseFloat(moneyText.replace('Rs.', '').trim());
            $('#debetideclear').val(debetid);
            $('#debetername').text(name);
            $('#debeted_amount').text(money);
            $('#debetstatus').text(status);

            $('#debet_clear_form').show();
            blurback('#debet_clear_form');

        });
    })
}
function checkuser() {
}
$('#lower_icon_income_btn').click(
    function (e) {
        e.preventDefault();
        $('#bottom_navbar div button[nav_target="income"]').click();
    }
);
$('#lower_icon_expance_btn').click(
    function (e) {
        e.preventDefault();
        $('#bottom_navbar div button[nav_target="expence"]').click();
    }
);
$('#imageicon').click(
    function (e) {
        e.preventDefault()
        location.reload();
    }
)
// calculator
var cal_btn = $('.button_box table tr td');
cal_btn.each(function (index, btn) {
    $(btn).on("click", function (e) {
        e.preventDefault();
        var ipscr = $("#input_screen");
        var ansscr = $("#ans_screen");
        var text = $(btn).text();

        if (text === "=") {
            if (ansscr.text().length > 1) {
                ipscr.text(ansscr.text());
                ansscr.text("");
                console.log(ansscr.text().length);
            } else {
                ansscr.text(cal_eval(ipscr.text()));
            }
        } else if (text === "C") {
            ipscr.text('0');
            ansscr.text(" ")
        } else if (text === "") {
            var inscrleng = ipscr.text().length;
            if (inscrleng > 1) {
                ipscr.text(ipscr.text().slice(0, -1));
                ansscr.text(" ");
            } else {
                ipscr.text("0");
                ansscr.text(" ");
            }
        } else if (text === "+" || text === "-" || text === "*" || text === "/") {
            var screen_val = ipscr.text();
            if (screen_val.slice(-1) !== text) {
                ipscr.text(screen_val + text);
                // ansscr.text(cal_eval(ipscr.text()));
            }
        }
        else {
            if (ipscr.text() === '0') {
                ipscr.text(text);
            } else {
                var screen_val = ipscr.text() + text;
                ipscr.text(screen_val);
                ansscr.text(cal_eval(ipscr.text()));
            }
        }
    });
});
function cal_eval(input) {
    return eval(input); // Evaluate the input and return the result
}
$('#calculator_icon').click(function (e) {
    e.preventDefault();
    $('#calculator_section_wapper').toggle("slow");
    // $("#calculator_icon").draggable();
});





requiredtick();
