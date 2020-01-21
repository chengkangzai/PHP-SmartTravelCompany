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
function showFirstPanel() {
    a.hide();
    Z.show().attr("id", "activePanel");
    Z1.hide().removeAttr("id"); Z2.hide().removeAttr("id"); Z3.hide().removeAttr("id"); Z4.hide().removeAttr("id"); Z5.hide().removeAttr("id"); Z6.hide().removeAttr("id"); Z7.hide().removeAttr("id"); Z8.hide().removeAttr("id");
}

function showSecondPanel() {
    a.hide();
    Z1.show().attr("id", "activePanel");
    Z.hide().removeAttr("id"); Z2.hide().removeAttr("id"); Z3.hide().removeAttr("id"); Z4.hide().removeAttr("id"); Z5.hide().removeAttr("id"); Z6.hide().removeAttr("id"); Z7.hide().removeAttr("id"); Z8.hide().removeAttr("id");
}

function showThirdPanel() {
    a.hide();
    Z2.show().attr("id", "activePanel");
    Z.hide().removeAttr("id"); Z1.hide().removeAttr("id"); Z3.hide().removeAttr("id"); Z4.hide().removeAttr("id"); Z5.hide().removeAttr("id"); Z6.hide().removeAttr("id"); Z7.hide().removeAttr("id"); Z8.hide().removeAttr("id");
}

function showForthPanel() {
    a.hide();
    Z3.show().attr("id", "activePanel");
    Z.hide().removeAttr("id"); Z1.hide().removeAttr("id"); Z2.hide().removeAttr("id"); Z4.hide().removeAttr("id"); Z5.hide().removeAttr("id"); Z6.hide().removeAttr("id"); Z7.hide().removeAttr("id"); Z8.hide().removeAttr("id");
}

function showFifthPanel() {
    a.hide();
    Z4.hide().attr("id", "activePanel");
    Z.hide().removeAttr("id"); Z1.hide().removeAttr("id"); Z2.hide().removeAttr("id"); Z3.hide().removeAttr("id"); Z5.hide().removeAttr("id"); Z6.hide().removeAttr("id"); Z7.hide().removeAttr("id"); Z8.hide().removeAttr("id");
}

function showSixthPanel() {
    a.hide();
    Z5.show().attr("id", "activePanel");
    Z.hide().removeAttr("id"); Z1.hide().removeAttr("id"); Z2.hide().removeAttr("id"); Z3.hide().removeAttr("id"); Z4.hide().removeAttr("id"); Z6.hide().removeAttr("id"); Z7.hide().removeAttr("id"); Z8.hide().removeAttr("id");
}

function showSeventhPanel() {
    a.hide();
    Z6.show().attr("id", "activePanel");
    Z.hide().removeAttr("id"); Z1.hide().removeAttr("id"); Z2.hide().removeAttr("id"); Z3.hide().removeAttr("id"); Z4.hide().removeAttr("id"); Z5.hide().removeAttr("id"); Z7.hide().removeAttr("id"); Z8.hide().removeAttr("id");
}

function showEighthPanel() {
    a.hide();
    Z7.show().attr("id", "activePanel");
    Z.hide().removeAttr("id"); Z1.hide().removeAttr("id"); Z2.hide().removeAttr("id"); Z3.hide().removeAttr("id"); Z4.hide().removeAttr("id"); Z5.hide().removeAttr("id"); Z7.hide().removeAttr("id"); Z8.hide().removeAttr("id");
}

function showNinthPanel() {
    a.hide();
    Z8.show().attr("id", "activePanel");
    Z.hide().removeAttr("id"); Z1.hide().removeAttr("id"); Z2.hide().removeAttr("id"); Z3.hide().removeAttr("id"); Z4.hide().removeAttr("id"); Z5.hide().removeAttr("id"); Z7.hide().removeAttr("id");
}
//Trigger content panel END

//Side Panel On and off section start
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
//Side Panel On and off section END

//Managed Trip Section Start
function makeUpdate(id) {
    hideSidePanel();
    const target = $(`#customerPhone${id}`);
    const button = $(`#btn_${id}`);
    const username = $(`#customerPhone${id}`).attr('data-id');
    button.removeClass("btn-primary").addClass("btn-danger");
    button.removeAttr("onclick").attr("onclick", `sendUpdate("${id}")`);
    var dom = `
    <td id="customerPhone${id}" data-id="${username}">
        <input type="text" value="${target.text()}" name="phoneNumber" id="phoneNumber${id}">
    </td>
    `;
    target.replaceWith(dom);
}

function sendUpdate(id) {
    function sendUpdateToPHP() {
        const phoneNumber = $(`#phoneNumber${id}`).val();
        const username = $(`#customerPhone${id}`).attr("data-id");

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

//Managed Trip Section Started
function makeTripUpdate(id) {
    hideSidePanel();
    const tripId = $(`#TripID_${id}`);
    const DeptTime = $(`#DeptTime_${id}`);
    const Fee = $(`#Fee_${id}`);
    const Airline = $(`#Airline_${id}`);
    const btn_update = $(`#btn_TripUpdate${id}`);
    const btn_danger = $(`#btn_TripDelete${id}`);

    const tripIddom = `
    <td id="TripID_${id}">
        <input value="${tripId.text()}" type="text" name="TripID" id="TripIDinput_${id}">
    </td>`;
    tripId.replaceWith(tripIddom);

    const DeptTimedom = `
    <td id="DeptTime_${id}">
        <input value="${DeptTime.text()}" type="date" name="DeptTime" id="DeptTimeinput_${id}">
    </td>`;
    DeptTime.replaceWith(DeptTimedom);

    const Feedom = `
    <td id="Fee_${id}">
        <input value="${Fee.text()}" type="number" name="Fee" id="Feeinput_${id}">
    </td>
    `;
    Fee.replaceWith(Feedom);

    $.ajax({
        type: 'POST',
        url: 'php_common/list_all_flight.php',
        data: {
            id: id,
            Airline: Airline.text()
        },
        success: function (response) {
            alert
            if (response !== "") {
                Airline.replaceWith(response);
            } else {
                alert("Error!" + response);
            }
        },
    })

    btn_update.removeClass("btn-primary").addClass("btn-danger").removeAttr("onclick").attr("onclick", `sendTripUpdate('${id}')`);
    btn_danger.removeClass("btn-danger").addClass("btn-secondary").attr("disabled", "disabled").attr("onclick", "alert('You want to update or delete ar?')");

    /*
    TODO 
        1. GET All information --> Change it to <input>
        1.1 trip Id
        1.2 Dep_time
        1.3 Airline
        2. Make Button red and change button attr and add a function
        3. 
    */
}

function sendTripUpdate(id) {
    const tripId = $(`#TripIDinput_${id}`);
    const DeptTime = $(`#DeptTimeinput_${id}`);
    const Fee = $(`#Feeinput_${id}`);
    const Airline = $(`#Airline_${id}`);
    const btn_update = $(`#btn_TripUpdate${id}`);
    const btn_danger = $(`#btn_TripDelete${id}`);

    var s = $(`#selectAirline${id}`).children('option:selected').attr('value');

    function sendTripUpdateToPHP() {
        $.ajax({
            type: 'POST',
            url: 'php_common/edit_trip.php',
            data: {
                Trip_ID: tripId.val(),
                Departure_date: DeptTime.val(),
                Fee: Fee.val(),
                Airline: s
            },
            success: function (response) {
                alert
                if (response == "Success") {
                    replaceValue();
                } else {
                    alert("Error!" + response);
                }
            },
        })
    }

    function replaceValue() {
        tripId.replaceWith(tripId.val());
        DeptTime.replaceWith(DeptTime.val());
        Fee.replaceWith(Fee.val());
        AirlineDom=`<td id="Airline_${id}"> ${s}</td>`
        Airline.replaceWith(AirlineDom);

        btn_update.removeClass("btn-danger").addClass("btn-primary").removeAttr("onclick").attr("onclick",`makeTripUpdate(\'${id}\')`);
        btn_danger.removeClass("btn-secondary").addClass("btn-danger").removeAttr("disabled").removeClass("onclick").attr("onclick",`sendTripDelete(\'${id}\')`);
    }
    sendTripUpdateToPHP();
    /*
    TODO
    1. GET input value 
    2. AJAX
    3. Change the value to the latest value 
    4. Change back the button and the input back to td
    */
}

function sendTripDelete(trip_id,rowId) {
    const tr=$(`#tr_${rowId}`);
    function SendTripDeleteToPHP() {
        $.ajax({
            type: 'POST',
            url: 'php_common/delete_trip.php',
            data: {
                Trip_ID: trip_id,
            },
            success: function (response) {
                alert(response);
                if (response == "Success") {
                    replaceValue();
                } else if( response =="Error") {
                    alert(response);
                }else {
                    alert(response);
                }
            },
        })
    }
    function replaceValue() {
        tr.hide();
    }
    SendTripDeleteToPHP();
    /*
    TODO
    1. Get the id of the record (tr)
    2. Send to PHP
    3. hide the row
    */
}
//Managed Trip Section Ended