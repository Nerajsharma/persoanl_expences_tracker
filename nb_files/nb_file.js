
if (document.getElementsByClassName("nb_hamburger").length > 0) {
    document.getElementsByClassName("nb_hamburger")[0].addEventListener("click", (e) => {
        e.preventDefault();

        const hamburger = document.getElementsByClassName("nb_hamburger")[0];
        const target = hamburger.getAttribute("nb_target");
        const navbar = document.querySelector(target);
        // console.log(navbar);

        navbar.style.display = (navbar.style.display === "none" || navbar.style.display === "") ? "block" : "none";
        hamburger.classList.toggle("nb_cross_hamburger");
    })
}
let liclick = document.querySelectorAll(".nb_vertical_navbar div li");

liclick.forEach((li) => {
    li.classList.remove("nb_tab_active");
    li.addEventListener("click", (e) => {
        e.preventDefault();
        liclick.forEach((item) => {
            item.classList.remove("nb_tab_active");
        });
        var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
        // console.log(screenWidth);
        if (screenWidth < 769) {
            document.getElementsByClassName("nb_hamburger")[0].click();
        }
        li.classList.add("nb_tab_active");
        var litarget = li.getAttribute("nb_data") + "_section";
        document.querySelectorAll(".nb_colsection").forEach((colsection) => {
            colsection.style.display = "none";
        });
        document.getElementById(litarget).style.display = "block";
    });
});

// animation
function animation(message) {
    var notifiWrapper = document.getElementById("nb_notifaction");
    notifiWrapper.classList.add("nb_animation");
    notifiWrapper.textContent = message;

    var type;
    if (message.indexOf("Error") !== -1 || message.indexOf("incorrect") !== -1) {
        type = "nb_danger";
    } else {
        type = "nb_success";
    }
    notifiWrapper.classList.add(type);
}
// disable background and load data
// to remove use document.body.removeChild(overlay);

function blurback(formname) {
    var overlay = document.createElement('div');
    overlay.id = 'overlay';

    // Set the overlay styles
    overlay.style.position = 'fixed';
    overlay.style.top = '0';
    overlay.style.left = '0';
    overlay.style.width = '100%';
    overlay.style.height = '100%';
    overlay.style.background = 'rgba(0, 0, 0, 0.5)';
    overlay.style.zIndex = '1000';
    overlay.style.backdropFilter = 'blur(3px)';
    overlay.style.transition = '0.2s';

    document.querySelector(formname).style.position = 'fixed';
    document.querySelector(formname).style.zIndex = '1001';
    document.querySelector(formname).style.top = '10%';
    document.querySelector(formname).style.left = '5%';
    // document.querySelector(formname).style.transform = 'translate(-50%, -50%)'; // Centering trick
    document.body.appendChild(overlay);

    overlay.addEventListener('click', function (e) {
        e.preventDefault();
    });
}


// password hide and show
document.addEventListener("DOMContentLoaded", function () {
    var eyes = document.querySelector(".nb_input_type i.nb_eye");
    if (eyes != null) {
        eyes.addEventListener("click", function () {
            var passid = eyes.getAttribute("showpass");
            var pass = document.getElementById(passid);

            eyes.classList.toggle('nb_eye_slace'); // Toggle the eye icon class

            if (pass.type === "password") {
                pass.type = "text";
            } else {
                pass.type = "password";
            }
        })
    }
});
// hidding form
let formcancelbtns = document.querySelectorAll('form .nb_btn_group .nb_cancle_btn');
if (formcancelbtns.length > 0) {
    formcancelbtns.forEach(cancelbtn => {
        cancelbtn.addEventListener("click", (e) => {
            e.preventDefault();
            var formtarget = cancelbtn.getAttribute("frmtarget");
            document.getElementById(formtarget).style.display = "none";
            // document.getElementById(formtarget).remove();
            document.body.removeChild(overlay);
        });
    });
}



