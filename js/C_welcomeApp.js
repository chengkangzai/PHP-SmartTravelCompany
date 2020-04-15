//Button
var y = $('#profile-btn');
var y1 = $('#manage-trip-btn');
var y2 = $('#update-trip-btn');
var y3 = $('#delete-trip-btn');


//Hiiden 
var Z = $('#contentPanel1');
var Z1 = $('#contentPanel2');
var Z2 = $('#contentPanel3');
var Z3 = $('#contentPanel4');


//Welcome Page
var a = $('#welcome');

//Trigger content panel Start
function showFirstPanel() {
    console.log("test");
    a.hide();
    Z.show().attr("id", "activePanel");
    Z1.hide().removeAttr("id");
    Z2.hide().removeAttr("id");
    Z3.hide().removeAttr("id");
}

function showSecondPanel() {
    a.hide();
    Z1.show().attr("id", "activePanel");
    Z.hide().removeAttr("id");
    Z2.hide().removeAttr("id");
    Z3.hide().removeAttr("id");
}

function showThirdPanel() {
    a.hide();
    Z2.show().attr("id", "activePanel");
    Z.hide().removeAttr("id");
    Z1.hide().removeAttr("id");
    Z3.hide().removeAttr("id");
}

function showForthPanel() {
    a.hide();
    Z3.show().attr("id", "activePanel");
    Z.hide().removeAttr("id");
    Z1.hide().removeAttr("id");
    Z2.hide().removeAttr("id");
}


//Trigger content panel END

//Side Panel On and off section start
function hideSidePanel() {
    if ($("#sidePanel").css("display") !== "none") {
        const sidePanel = $("#sidePanel");
        const activePanel = $("#activePanel");
        const sidePanelBtn = $("#hideShowSideBtn");
        sidePanel.addClass("d-none").removeClass("col-lg-2");
        activePanel.addClass("col-lg-11").removeClass("col-lg-10").addClass("mx-auto");
        sidePanelBtn.removeClass("col-lg-2").css("position", "fixed").attr("onclick", "toggleSidePanel()");
        //var dom = `
        //<a class="btn btn-info text-white btnToggleSidePanel" role="button" onclick="toggleSidePanel()">ToggleSide Panel</a>
        //`;
        //var heading = $(".welcomeText");
        //heading.parent().append(dom);
    }
}

function toggleSidePanel() {
    const sidePanel = $("#sidePanel");
    const activePanel = $("#activePanel");
    const sidePanelBtn = $("#hideShowSideBtn");

    sidePanel.removeClass("d-none").addClass("col-lg-2");
    activePanel.removeClass("col-lg-11").addClass("col-lg-10").removeClass("mx-auto");
    //const btnSidePanel = $(".btnToggleSidePanel");
    //btnSidePanel.replaceWith();
    sidePanelBtn.attr('onclick', 'hideSidePanel()').css("position", "relative");
}
//Side Panel On and off section END


//Profile section Start

function showChangeProfilePasswordForm() {
    const formPassword = $('#changeProfilePasswordForm');
    const formInfo = $("#changeProfileInfoForm");
    const btn = $("#btnToggleProfilePasswordForm");
    if (formInfo.css("display") !== "none") {
        hideChangeProfileInfoForm();
    }
    formPassword.show();
    btn.removeAttr("onclick").attr("onclick", "hideChangeProfilePasswordForm()").removeClass("btn-primary").addClass("btn-info");
}

function hideChangeProfilePasswordForm() {
    const form = $('#changeProfilePasswordForm');
    const btn = $("#btnToggleProfilePasswordForm");
    if (form.css("display") == "block") {
        form.hide();
        btn.removeAttr("onclick").attr("onclick", "showChangeProfilePasswordForm()").removeClass("btn-info").addClass("btn-primary");
    }
}

function showChangeProfileInfoForm() {
    const formPassword = $('#changeProfilePasswordForm');
    const formInfo = $("#changeProfileInfoForm");
    const btn = $("#btnToggleProfileInfoForm");
    if (formPassword.css("display") !== "none") {
        hideChangeProfilePasswordForm();
    }
    formInfo.show();
    btn.removeAttr("onclick").attr("onclick", "hideChangeProfileInfoForm()").removeClass("btn-primary").addClass("btn-info");
}

function hideChangeProfileInfoForm() {
    const form = $("#changeProfileInfoForm");
    const btn = $("#btnToggleProfileInfoForm");
    if (form.css("display") == "block") {
        form.hide();
        btn.removeAttr("onclick").attr("onclick", "showChangeProfileInfoForm()").removeClass("btn-info").addClass("btn-primary");
    }
}

function showAuthenticateEditEmployeeProfile() {
    const form = $("#authenticateEditEmployeeProfile");
    form.show();
}

function hideAuthenticateEditEmployeeProfile() {
    const form = $("#authenticateEditEmployeeProfile");
    form.hide();
}
//Profile section END


//Main Argument
$(document).ready(function() {
    //Hide the Panel
    Z.hide();
    Z1.hide();
    Z2.hide();
    Z3.hide();
    dataT();

    function dataT() {
        $("#BookedTrip").DataTable({
            dom: 'Bfrtip',
            lengthMenu: [
                [10, 5, 25, -1],
                ['10rows', '5 rows', '25 rows', 'Show all']
            ],
            buttons: [
                'colvis', 'pageLength',
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
                }, {
                    extend: 'collection',
                    text: 'Report',
                    buttons: ['copy', 'csv', 'excel', 'pdf']
                }
            ]
        });
        $("#PassBookedTrip").DataTable({
            dom: 'Bfrtip',
            lengthMenu: [
                [5, 10, 25, -1],
                ['5 rows', '10 rows', '25 rows', 'Show all']
            ],
            buttons: [
                'colvis', 'pageLength',
                {
                    extend: 'print',
                    exportOptions: {
                        columns: ':visible'
                    }
                }, {
                    extend: 'collection',
                    text: 'Report',
                    buttons: ['copy', 'csv', 'excel', 'pdf']
                }
            ]
        });
    }
});