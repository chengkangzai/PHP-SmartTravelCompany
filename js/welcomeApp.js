//Button
var ys = ["y", "y1", "y2", "y3", "y4", "y5", "y6", "y7", "y8"];
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
function showprofile() {
    a.hide();
    Z.show();
    Z1.hide(); Z2.hide(); Z3.hide(); Z4.hide(); Z5.hide(); Z6.hide(); Z7.hide(); Z8.hide();
}

function showManageTrip() {
    a.hide();
    Z1.show();
    Z.hide(); Z2.hide(); Z3.hide(); Z4.hide(); Z5.hide(); Z6.hide(); Z7.hide(); Z8.hide();
}

function showUpdateTrip() {
    a.hide();
    Z.show();
    Z.hide(); Z1.hide(); Z3.hide(); Z4.hide(); Z5.hide(); Z6.hide(); Z7.hide(); Z8.hide();
}

function showdeletetrip() {
    a.hide();
    Z3.show();
    Z.hide(); Z1.hide(); Z2.hide(); Z4.hide(); Z5.hide(); Z6.hide(); Z7.hide(); Z8.hide();
}

function showaddtrip() {
    a.hide();
    Z4.hide();
    Z.hide(); Z1.hide(); Z2.hide(); Z3.hide(); Z5.hide(); Z6.hide(); Z7.hide(); Z8.hide();
}

function showAddTour() {
    a.hide();
    Z5.show()
    Z.hide(); Z1.hide(); Z2.hide(); Z3.hide(); Z4.hide(); Z6.hide(); Z7.hide(); Z8.hide();
}

function showUpdateTour() {
    a.hide();
    Z6.show();
    Z.hide(); Z1.hide(); Z2.hide(); Z3.hide(); Z4.hide(); Z5.hide(); Z7.hide(); Z8.hide();
}

function showDeleteTour() {
    a.hide();
    Z6.show();
    Z.hide(); Z1.hide(); Z2.hide(); Z3.hide(); Z4.hide(); Z5.hide(); Z7.hide(); Z8.hide();
}

function showFeedback() {
    a.hide();
    Z8.show();
    Z.hide(); Z1.hide(); Z2.hide(); Z3.hide(); Z4.hide(); Z5.hide(); Z6.hide(); Z7.hide(); Z8.hide();
}

function makeUpdate(id) {
    var target = $(`#customerPhone${id}`);
    var button = $(`#btn_${id}`);
    const username=$(`#customerPhone${id}`).attr('data-id');
    button.removeClass("btn-primary").addClass("btn-danger");
    button.removeAttr("onclick").attr("onclick", `sendUpdate("${id}")`);
    var dom = `
    <td id="customerPhone${id}" data-id="${username}">
        <form action="php_common/edit_customer_phoneNum.php" method="post" id="form_${id}" >
            <input type="text" value="${target.text()}" name="phoneNumber" id="phoneNumber">
        </form>
    </td>
    `;
    target.replaceWith(dom);
}

function sendUpdate(id) {
    function sendUpdateToPHP() {
        const phoneNumber = $(`#phoneNumber`).val();
        const username=$(`#customerPhone${id}`).attr("data-id");
        //Send to change in db
        $.ajax({
            type: 'POST',
            url: 'php_common/edit_customer_phoneNum.php',
            data: {
                phoneNumber: phoneNumber,
                id: username
            },
            success: function (response) {
                if (response == "success") {
                    //Change back to td
                    var target = $(`#customerPhone${id}`);
                    var dom = `<td id="customerPhone${id}">${phoneNumber}</td>`;
                    target.replaceWith(dom);
                    var button = $(`#btn_${id}`);
                    button.removeClass("btn-danger").addClass("btn-primary");
                    button.removeAttr("onclick").attr("onclick", `makeUpdate(${id})`);
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