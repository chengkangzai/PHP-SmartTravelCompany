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
var Z = $('#contentPanel1');
var Z1 = $('#contentPanel2');
var Z2 = $('#contentPanel3');
var Z3 = $('#contentPanel4');
var Z4 = $('#contentPanel5');
var Z5 = $('#contentPanel6');
var Z6 = $('#contentPanel7');
var Z7 = $('#contentPanel8');
var Z8 = $('#contentPanel9');


//Welcome Page
var a = $('#welcome');

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
    Z4.show().attr("id", "activePanel");
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
        const sidePanelbtn = $("#hideShowSideBtn");

        sidePanel.addClass("d-none").removeClass("col-lg-2");
        activePanel.addClass("col-lg-11").removeClass("col-lg-10").addClass("mx-auto");
        sidePanelbtn.removeClass("col-lg-2").css("position","fixed").css("z-index","1").attr("onclick","toggleSidePanel()");
        $('body').css("overflow","hidden");
        
        //var dom = `
        //<a class="btn btn-info text-white btnToggleSidePanel" role="button" onclick="toggleSidePanel()">Toggle Side Panel</a>
        //`;
        //var heading = $(".welcomeText");
        //heading.parent().append(dom);
    }
}

function toggleSidePanel() {
    const sidePanel = $("#sidePanel");
    const activePanel = $("#activePanel");
    const sidePanelbtn = $("#hideShowSideBtn");

    sidePanel.removeClass("d-none").addClass("col-lg-2");
    activePanel.removeClass("col-lg-11").addClass("col-lg-10").removeClass("mx-auto");
    //const btnSidePanel = $(".btnToggleSidePanel");
    //btnSidePanel.replaceWith();
    sidePanelbtn.attr('onclick', 'hideSidePanel()');
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
    const DeptTime = $(`#DeptTime_${id}`);
    const Fee = $(`#Fee_${id}`);
    const Airline = $(`#Airline_${id}`);
    const btn_update = $(`#btn_TripUpdate${id}`);
    const btn_danger = $(`#btn_TripDelete${id}`);

    const DeptTimedom = `
    <td id="DeptTime_${id}">
        <input value="${DeptTime.text()}" type="date" name="DeptTime" id="DeptTimeinput_${id}" class='form-control'>
    </td>`;
    DeptTime.replaceWith(DeptTimedom);

    const Feedom = `
    <td id="Fee_${id}">
        <input value="${Fee.text()}" type="number" name="Fee" id="Feeinput_${id}" class='form-control'>
    </td>
    `;
    Fee.replaceWith(Feedom);

    $.ajax({
        type: 'POST',
        url: 'php_common/list_all_flight.php',
        data: {
            id: id,
            Airline: Airline.text(),
            type: 'update'
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
    const tripId = $(`#TripID_${id}`);
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
                Trip_ID: tripId.text(),
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
        DeptTime.replaceWith(DeptTime.val());
        Fee.replaceWith(Fee.val());
        AirlineDom = `<td id="Airline_${id}"> ${s}</td>`
        Airline.replaceWith(AirlineDom);

        btn_update.removeClass("btn-danger").addClass("btn-primary").removeAttr("onclick").attr("onclick", `makeTripUpdate(\'${id}\')`);
        btn_danger.removeClass("btn-secondary").addClass("btn-danger").removeAttr("disabled").removeClass("onclick").attr("onclick", `sendTripDelete(\'${id}\')`);
    }
    var x = confirm("Are you sure the data is correct?");
    if (x == true) {
        sendTripUpdateToPHP();
    }else if (x == false){
        alert("Canceled liao");
    }
    
    /*
    TODO
    1. GET input value 
    2. AJAX
    3. Change the value to the latest value 
    4. Change back the button and the input back to td
    */
}

function sendTripDelete(trip_id, rowId) {
    const tr = $(`#tr_${rowId}`);

    function sendTripDeleteToPHP() {
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
                } else if (response == "Error") {
                    alert(response);
                } else {
                    alert(response);
                }
            },
        })
    }
    function replaceValue() {
        tr.hide();
    }

    var x = confirm('Are you sure you want to delete this document ?');
    if (x == true) {
        sendTripDeleteToPHP();
    } else if (x == false) {
        alert('Ok lar i cancel! Play play arh you think');
    }
    /*
    TODO
    1. Get the id of the record (tr)
    2. Send to PHP
    3. hide the row
    */
}

function addAirlineForTrip() {
    var airline = $("#selectAirline");
    var airlineDom = "<input type='text' required name='Airline' class='form-control' placeholder='Enter New Airline Name Here' id='inputAirline'> ";
    airline.replaceWith(airlineDom);

    $("#btn_AddTrip").removeAttr("onclick").attr("onclick", "changeAirlineForTrip()").text("Select Airline");

}

function changeAirlineForTrip() {
    var airline = $("#inputAirline");
    $.ajax({
        type: 'POST',
        url: 'php_common/list_all_flight.php',
        data: {
            type: 'add'
        },
        success: function (response) {
            if (response !== "") {
                airline.replaceWith(response);
                $("#btn_AddTrip").removeAttr("onclick").attr("onclick", "addAirlineForTrip()").text("Add Airline");
            } else {
                alert("Error!" + response);
            }
        },
    })
}

function showAddTripForm() {
    var TripForm = $("#addTripForm").hide();
    TripForm.show();
    document.body.addClass("d-none");
}

function hideAddTripForm() {
    var TripForm = $("#addTripForm").hide();
    TripForm.hide()

}

//Managed Trip Section Ended


//Main Argument
$(document).ready(function () {
    //Hide the Panel
    Z.hide(); Z1.hide(); Z2.hide(); Z3.hide(); Z4.hide(); Z5.hide(); Z6.hide(); Z7.hide(); Z8.hide();

    $("#managedTrip").DataTable({
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
    $('#TripTable').DataTable({
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
                text: 'Add',
                action: function () {
                    showAddTripForm();
                }
            }, {
                extend: 'collection',
                text: 'Report',
                buttons: ['copy', 'csv', 'excel', 'pdf']
            }
        ]
    });

});