//Button
var y = $('#profile-btn');
var y1 = $('#manage-trip-btn');
var y2 = $('#update-trip-btn');
var y3 = $('#delete-trip-btn');
var y4 = $('#add-trip-btn');
var y5 = $('#add-tour-btn');
var y6 = $('#update-tour-btn');
var y7 = $('#delete-tour-btn');
var y8 = $('#feedback-btn');


//Hiiden 
var Z = $('#Profile');
var Z1 = $('#managed-trip');
var Z2 = $('#Update-Trip');
var Z3 = $('#Delete-Trip');
var Z4 = $('#Add-Trip');
var Z5 = $('#Add-Tour');
var Z6 = $('#Update-Tour');
var Z7 = $('#Delete-Tour');
var Z8 = $('#Feedback');

Z.hide(); Z1.hide(); Z2.hide(); Z3.hide(); Z4.hide(); Z5.hide(); Z6.hide(); Z7.hide(); Z8.hide();
//Welcome Page
var a = $('#welcome');
a.show();

//Trigger content panel Start
function showprofile() {
    a.hide();
    Z.show().attr("id", "activePanel");
    Z1.hide().removeAttr("id"); Z2.hide().removeAttr("id"); Z3.hide().removeAttr("id"); Z4.hide().removeAttr("id"); Z5.hide().removeAttr("id"); Z6.hide().removeAttr("id"); Z7.hide().removeAttr("id"); Z8.hide().removeAttr("id");
}

function showManageTrip() {
    a.hide();
    Z1.show().attr("id", "activePanel");
    Z.hide().removeAttr("id"); Z2.hide().removeAttr("id"); Z3.hide().removeAttr("id"); Z4.hide().removeAttr("id"); Z5.hide().removeAttr("id"); Z6.hide().removeAttr("id"); Z7.hide().removeAttr("id"); Z8.hide().removeAttr("id");
}

function showUpdateTrip() {
    a.hide();
    Z.show().attr("id", "activePanel");
    Z.hide().removeAttr("id"); Z1.hide().removeAttr("id"); Z3.hide().removeAttr("id"); Z4.hide().removeAttr("id"); Z5.hide().removeAttr("id"); Z6.hide().removeAttr("id"); Z7.hide().removeAttr("id"); Z8.hide().removeAttr("id");
}

function showdeletetrip() {
    a.hide();
    Z3.show().attr("id", "activePanel");
    Z.hide().removeAttr("id"); Z1.hide().removeAttr("id"); Z2.hide().removeAttr("id"); Z4.hide().removeAttr("id"); Z5.hide().removeAttr("id"); Z6.hide().removeAttr("id"); Z7.hide().removeAttr("id"); Z8.hide().removeAttr("id");
}

function showaddtrip() {
    a.hide();
    Z4.hide().attr("id", "activePanel");
    Z.hide().removeAttr("id"); Z1.hide().removeAttr("id"); Z2.hide().removeAttr("id"); Z3.hide().removeAttr("id"); Z5.hide().removeAttr("id"); Z6.hide().removeAttr("id"); Z7.hide().removeAttr("id"); Z8.hide().removeAttr("id");
}

function showAddTour() {
    a.hide();
    Z5.show().attr("id", "activePanel");
    Z.hide().removeAttr("id"); Z1.hide().removeAttr("id"); Z2.hide().removeAttr("id"); Z3.hide().removeAttr("id"); Z4.hide().removeAttr("id"); Z6.hide().removeAttr("id"); Z7.hide().removeAttr("id"); Z8.hide().removeAttr("id");
}

function showUpdateTour() {
    a.hide();
    Z6.show().attr("id", "activePanel");
    Z.hide().removeAttr("id"); Z1.hide().removeAttr("id"); Z2.hide().removeAttr("id"); Z3.hide().removeAttr("id"); Z4.hide().removeAttr("id"); Z5.hide().removeAttr("id"); Z7.hide().removeAttr("id"); Z8.hide().removeAttr("id");
}

function showDeleteTour() {
    a.hide();
    Z6.show().attr("id", "activePanel");
    Z.hide().removeAttr("id"); Z1.hide().removeAttr("id"); Z2.hide().removeAttr("id"); Z3.hide().removeAttr("id"); Z4.hide().removeAttr("id"); Z5.hide().removeAttr("id"); Z7.hide().removeAttr("id"); Z8.hide().removeAttr("id");
}

function showFeedback() {
    a.hide();
    Z8.show();
    Z.hide(); Z1.hide(); Z2.hide(); Z3.hide(); Z4.hide(); Z5.hide(); Z6.hide(); Z7.hide(); Z8.hide();
}
//Trigger content panel END

//Side Panel On and off section start
function hideSidePanel() {
    const sidePanel = $("#sidePanel");
    const activePanel = $("#activePanel");
    sidePanel.addClass("d-none").removeClass("col-lg-2");
    activePanel.addClass("col-lg-12").removeClass("col-lg-10");
    var dom = `
    <a class="btn btn-info text-white btnToggleSidePanel" role="button" onclick="toggleSidePanel()">Toggle Side Panel</a>
    `;
    var heading = $(".welcomeText");
    heading.append(dom);
}

function toggleSidePanel() {
    const sidePanel = $("#sidePanel");
    const activePanel = $("#activePanel");
    sidePanel.removeClass("d-none").addClass("col-lg-2");
    activePanel.removeClass("col-lg-12").addClass("col-lg-10");
    const btnSidePanel = $(".btnToggleSidePanel");
    btnSidePanel.replaceWith();
}
//Side Panel On and off section END

//Managed Trip Section Start
function makeUpdate(id) {
    alert(id);
    if ($("#sidePanel").css("display") !== "none") {
        hideSidePanel();
    }
    var target = $(`#customerPhone${id}`);
    var button = $(`#btn_${id}`);
    const username = $(`#customerPhone${id}`).attr('data-id');
    button.removeClass("btn-primary").addClass("btn-danger");
    button.removeAttr("onclick").attr("onclick", `sendUpdate("${id}")`);
    var dom = `
    <td id="customerPhone${id}" data-id="${username}">
        <form action="php_common/edit_customer_phoneNum.php" method="post" id="form_${id}" >
            <input type="text" value="${target.text()}" name="phoneNumber" id="phoneNumber${id}">
        </form>
    </td>
    `;
    target.replaceWith(dom);
}

function sendUpdate(id) {
    function sendUpdateToPHP() {
        const phoneNumber = $(`#phoneNumber${id}`).val();
        const username = $(`#customerPhone${id}`).attr("data-id");
        alert(phoneNumber);
        alert(username);
        //Send to change in db
        $.ajax({
            type: 'POST',
            url: 'php_common/edit_customer_phoneNum.php',
            data: {
                phoneNumber: phoneNumber,
                id: username,
                submit: 'submit'
            },
            success: function (response) {
                if (response == "success") {
                    //Change back to td
                    var target = $(`#customerPhone${id}`);
                    var dom = `<td id="customerPhone${id}" data-id="${username}">${phoneNumber}</td>`;
                    target.replaceWith(dom);
                    var button = $(`#btn_${id}`);
                    var btndom = `<a class="btn btn-primary text-white" role="button" onclick="makeUpdate('${id}')" id="btn_${id}">Update</a>`;
                    button.replaceWith(btndom);
                } else {
                    alert("Error!" + response);
                }
            },
        })
    }

    if (event.type == "click") {
        sendUpdateToPHP();
    } else if (event.type == "keydown") {
        var x = event.keyCode;
        if (x == 13) {
            //if the user hit enter
            sendUpdateToPHP();
        }
    }
}

//Manage Trip Section Ended