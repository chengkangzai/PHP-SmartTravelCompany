//Button
var y = document.getElementById('profile-btn');
var y1 = document.getElementById('manage-trip-btn');
var y2 = document.getElementById('update-trip-btn');
var y3 = document.getElementById('delete-trip-btn');
var y4 = document.getElementById('add-trip-btn');
var y5 = document.getElementById('add-tour-btn');
var y6 = document.getElementById('update-tour-btn');
var y7 = document.getElementById('delete-tour-btn');
var y8 = document.getElementById('feedback-btn');

//Hiiden 
var Z = document.getElementById('Profile');
var Z1 = document.getElementById('managed-trip');
var Z2 = document.getElementById('Update-Trip');
var Z3 = document.getElementById('Delete-Trip');
var Z4 = document.getElementById('Add-Trip');
var Z5 = document.getElementById('Add-Tour');
var Z6 = document.getElementById('Update-Tour');
var Z7 = document.getElementById('Delete-Tour');
var Z8 = document.getElementById('Feedback');


//Welcome Page
var a = document.getElementById('welcome');

function showprofile() {
    if (Z.style.display === 'none') {
        Z.classList.add("d-none");
        a.classList.add("d-block");

    } else {
        Z.classList.add("d-block");
        a.classList.remove("d-block");
        a.classList.add("d-none");
        //Others 
        Z1.classList.remove("d-block");
        Z2.classList.remove("d-block");
        Z3.classList.remove("d-block");
        Z4.classList.remove("d-block");
        Z5.classList.remove("d-block");
        Z6.classList.remove("d-block");
        Z7.classList.remove("d-block");
        Z8.classList.remove("d-block");

        //Make sure they go off
        Z1.classList.add("d-none");
        Z2.classList.add("d-none");
        Z3.classList.add("d-none");
        Z4.classList.add("d-none");
        Z5.classList.add("d-none");
        Z6.classList.add("d-none");
        Z7.classList.add("d-none");
        Z8.classList.add("d-none");
    }
}

function showManageTrip() {
    if (Z1.style.display === 'block') {
        Z1.classList.add("d-none");
        a.classList.add("d-block");

    } else {
        Z1.classList.add("d-block");
        a.classList.remove("d-block");
        a.classList.add("d-none");
        //Others 
        Z.classList.remove("d-block");
        Z2.classList.remove("d-block");
        Z3.classList.remove("d-block");
        Z4.classList.remove("d-block");
        Z5.classList.remove("d-block");
        Z6.classList.remove("d-block");
        Z7.classList.remove("d-block");
        Z8.classList.remove("d-block");

        //Make sure they go off
        Z.classList.add("d-none");
        Z2.classList.add("d-none");
        Z3.classList.add("d-none");
        Z4.classList.add("d-none");
        Z5.classList.add("d-none");
        Z6.classList.add("d-none");
        Z7.classList.add("d-none");
        Z8.classList.add("d-none");
    }
}

function showUpdateTrip() {
    if (Z2.style.display === 'block') {
        //hide the main shit
        Z2.classList.add("d-none");
        a.classList.add("d-block");

    } else {
        Z2.classList.add("d-block");
        a.classList.remove("d-block");
        a.classList.add("d-none");
        //Others 
        Z1.classList.remove("d-block");
        Z.classList.remove("d-block");
        Z3.classList.remove("d-block");
        Z4.classList.remove("d-block");
        Z5.classList.remove("d-block");
        Z6.classList.remove("d-block");
        Z7.classList.remove("d-block");
        Z8.classList.remove("d-block");

        //Make sure they fuck off
        Z1.classList.add("d-none");
        Z.classList.add("d-none");
        Z3.classList.add("d-none");
        Z4.classList.add("d-none");
        Z5.classList.add("d-none");
        Z6.classList.add("d-none");
        Z7.classList.add("d-none");
        Z8.classList.add("d-none");
    }
}

function showdeletetrip() {
    if (Z3.style.display === 'block') {
        //hide the main shit
        Z3.classList.add("d-none");
        a.classList.add("d-block");

    } else {
        Z3.classList.add("d-block");
        a.classList.remove("d-block");
        a.classList.add("d-none");
        //Others 
        Z1.classList.remove("d-block");
        Z.classList.remove("d-block");
        Z2.classList.remove("d-block");
        Z4.classList.remove("d-block");
        Z5.classList.remove("d-block");
        Z6.classList.remove("d-block");
        Z7.classList.remove("d-block");
        Z8.classList.remove("d-block");

        //Make sure they fuck off
        Z1.classList.add("d-none");
        Z.classList.add("d-none");
        Z2.classList.add("d-none");
        Z4.classList.add("d-none");
        Z5.classList.add("d-none");
        Z6.classList.add("d-none");
        Z7.classList.add("d-none");
        Z8.classList.add("d-none");
    }
}

function showaddtrip() {
    if (Z4.style.display === 'block') {
        //hide the main shit
        Z4.classList.add("d-none");
        a.classList.add("d-block");

    } else {
        Z4.classList.add("d-block");
        a.classList.remove("d-block");
        a.classList.add("d-none");
        //Others 
        Z.classList.remove("d-block");
        Z1.classList.remove("d-block");
        Z2.classList.remove("d-block");
        Z3.classList.remove("d-block");
        Z5.classList.remove("d-block");
        Z6.classList.remove("d-block");
        Z7.classList.remove("d-block");
        Z8.classList.remove("d-block");

        //Make sure they fuck off
        Z.classList.add("d-none");
        Z1.classList.add("d-none");
        Z2.classList.add("d-none");
        Z3.classList.add("d-none");
        Z5.classList.add("d-none");
        Z6.classList.add("d-none");
        Z7.classList.add("d-none");
        Z8.classList.add("d-none");
    }
}

function showAddTour() {
    if (Z5.style.display === 'block') {
        //hide the main shit
        Z5.classList.add("d-none");
        a.classList.add("d-block");

    } else {
        Z5.classList.add("d-block");
        a.classList.remove("d-block");
        a.classList.add("d-none");
        //Others 
        Z.classList.remove("d-block");
        Z1.classList.remove("d-block");
        Z2.classList.remove("d-block");
        Z3.classList.remove("d-block");
        Z4.classList.remove("d-block");
        Z6.classList.remove("d-block");
        Z7.classList.remove("d-block");
        Z8.classList.remove("d-block");

        //Make sure they fuck off
        Z.classList.add("d-none");
        Z1.classList.add("d-none");
        Z2.classList.add("d-none");
        Z3.classList.add("d-none");
        Z4.classList.add("d-none");
        Z6.classList.add("d-none");
        Z7.classList.add("d-none");
        Z8.classList.add("d-none");
    }
}

function showUpdateTour() {
    if (Z6.style.display === 'block') {
        //hide the main shit
        Z6.classList.add("d-none");
        a.classList.add("d-block");

    } else {
        Z6.classList.add("d-block");
        a.classList.remove("d-block");
        a.classList.add("d-none");
        //Others 
        Z.classList.remove("d-block");
        Z1.classList.remove("d-block");
        Z2.classList.remove("d-block");
        Z3.classList.remove("d-block");
        Z4.classList.remove("d-block");
        Z5.classList.remove("d-block");
        Z7.classList.remove("d-block");
        Z8.classList.remove("d-block");

        //Make sure they fuck off
        Z.classList.add("d-none");
        Z1.classList.add("d-none");
        Z2.classList.add("d-none");
        Z3.classList.add("d-none");
        Z4.classList.add("d-none");
        Z5.classList.add("d-none");
        Z7.classList.add("d-none");
        Z8.classList.add("d-none");
    }
}

function showDeleteTour() {
    if (Z7.style.display === 'block') {
        //hide the main shit
        Z7.classList.add("d-none");
        a.classList.add("d-block");

    } else {
        Z7.classList.add("d-block");
        a.classList.remove("d-block");
        a.classList.add("d-none");
        //Others 
        Z.classList.remove("d-block");
        Z1.classList.remove("d-block");
        Z2.classList.remove("d-block");
        Z3.classList.remove("d-block");
        Z4.classList.remove("d-block");
        Z5.classList.remove("d-block");
        Z6.classList.remove("d-block");
        Z8.classList.remove("d-block");

        //Make sure they fuck off
        Z.classList.add("d-none");
        Z1.classList.add("d-none");
        Z2.classList.add("d-none");
        Z3.classList.add("d-none");
        Z4.classList.add("d-none");
        Z5.classList.add("d-none");
        Z6.classList.add("d-none");
        Z8.classList.add("d-none");

    }

}

function showFeedback() {
    if (Z8.style.display === 'block') {
        Z.classList.add("d-none");
        a.classList.add("d-block");

    } else {
        Z8.classList.add("d-block");
        a.classList.remove("d-block");
        a.classList.add("d-none");
        //Others 
        Z1.classList.remove("d-block");
        Z.classList.remove("d-block");
        Z2.classList.remove("d-block");
        Z3.classList.remove("d-block");
        Z4.classList.remove("d-block");
        Z5.classList.remove("d-block");
        Z6.classList.remove("d-block");
        Z7.classList.remove("d-block");


        //Make sure they go off
        Z1.classList.add("d-none");
        Z.classList.add("d-none");
        Z2.classList.add("d-none");
        Z3.classList.add("d-none");
        Z4.classList.add("d-none");
        Z5.classList.add("d-none");
        Z6.classList.add("d-none");
        Z7.classList.add("d-none");
    }
}

function hideSidePanel() {
    if ($("#sidePanel").css("display") !== "none") {
        const sidePanel = $("#sidePanel");
        const activePanel = $("#activePanel");

        sidePanel.addClass("d-none").removeClass("col-lg-2");
        activePanel.addClass("col-lg-12").removeClass("col-lg-10");
        var dom = `
        <a class="btn btn-info text-white btnToggleSidePanel" role="button" onclick="toggleSidePanel()">Toggle Side Panel</a>
        `;
        var heading = $(".welcomeText");
        heading.parent().append(dom);
    }
}

function toggleSidePanel() {
    const sidePanel = $("#sidePanel");
    const activePanel = $("#activePanel");
    sidePanel.removeClass("d-none").addClass("col-lg-2");
    activePanel.removeClass("col-lg-12").addClass("col-lg-10");
    const btnSidePanel = $(".btnToggleSidePanel");
    btnSidePanel.replaceWith();
}