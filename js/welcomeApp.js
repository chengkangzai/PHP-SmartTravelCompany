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
    Z1.hide().removeAttr("id");
    Z2.hide().removeAttr("id");
    Z3.hide().removeAttr("id");
    Z4.hide().removeAttr("id");
    Z5.hide().removeAttr("id");
    Z6.hide().removeAttr("id");
    Z7.hide().removeAttr("id");
    Z8.hide().removeAttr("id");
}

function showSecondPanel() {
    a.hide();
    Z1.show().attr("id", "activePanel");
    Z.hide().removeAttr("id");
    Z2.hide().removeAttr("id");
    Z3.hide().removeAttr("id");
    Z4.hide().removeAttr("id");
    Z5.hide().removeAttr("id");
    Z6.hide().removeAttr("id");
    Z7.hide().removeAttr("id");
    Z8.hide().removeAttr("id");
}

function showThirdPanel() {
    a.hide();
    Z2.show().attr("id", "activePanel");
    Z.hide().removeAttr("id");
    Z1.hide().removeAttr("id");
    Z3.hide().removeAttr("id");
    Z4.hide().removeAttr("id");
    Z5.hide().removeAttr("id");
    Z6.hide().removeAttr("id");
    Z7.hide().removeAttr("id");
    Z8.hide().removeAttr("id");
}

function showForthPanel() {
    a.hide();
    Z3.show().attr("id", "activePanel");
    Z.hide().removeAttr("id");
    Z1.hide().removeAttr("id");
    Z2.hide().removeAttr("id");
    Z4.hide().removeAttr("id");
    Z5.hide().removeAttr("id");
    Z6.hide().removeAttr("id");
    Z7.hide().removeAttr("id");
    Z8.hide().removeAttr("id");
}

function showFifthPanel() {
    a.hide();
    Z4.show().attr("id", "activePanel");
    Z.hide().removeAttr("id");
    Z1.hide().removeAttr("id");
    Z2.hide().removeAttr("id");
    Z3.hide().removeAttr("id");
    Z5.hide().removeAttr("id");
    Z6.hide().removeAttr("id");
    Z7.hide().removeAttr("id");
    Z8.hide().removeAttr("id");
}

function showSixthPanel() {
    a.hide();
    Z5.show().attr("id", "activePanel");
    Z.hide().removeAttr("id");
    Z1.hide().removeAttr("id");
    Z2.hide().removeAttr("id");
    Z3.hide().removeAttr("id");
    Z4.hide().removeAttr("id");
    Z6.hide().removeAttr("id");
    Z7.hide().removeAttr("id");
    Z8.hide().removeAttr("id");
}

function showSeventhPanel() {
    a.hide();
    Z6.show().attr("id", "activePanel");
    Z.hide().removeAttr("id");
    Z1.hide().removeAttr("id");
    Z2.hide().removeAttr("id");
    Z3.hide().removeAttr("id");
    Z4.hide().removeAttr("id");
    Z5.hide().removeAttr("id");
    Z7.hide().removeAttr("id");
    Z8.hide().removeAttr("id");
}

function showEighthPanel() {
    a.hide();
    Z7.show().attr("id", "activePanel");
    Z.hide().removeAttr("id");
    Z1.hide().removeAttr("id");
    Z2.hide().removeAttr("id");
    Z3.hide().removeAttr("id");
    Z4.hide().removeAttr("id");
    Z5.hide().removeAttr("id");
    Z7.hide().removeAttr("id");
    Z8.hide().removeAttr("id");
}

function showNinthPanel() {
    a.hide();
    Z8.show().attr("id", "activePanel");
    Z.hide().removeAttr("id");
    Z1.hide().removeAttr("id");
    Z2.hide().removeAttr("id");
    Z3.hide().removeAttr("id");
    Z4.hide().removeAttr("id");
    Z5.hide().removeAttr("id");
    Z7.hide().removeAttr("id");
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
            success: function(response) {
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

    const DeptTimeDom = `
    <td id="DeptTime_${id}">
        <input value="${DeptTime.text()}" type="date" name="DeptTime" id="DeptTimeinput_${id}" class='form-control' required>
    </td>`;
    DeptTime.replaceWith(DeptTimeDom);

    const FeeDom = `
    <td id="Fee_${id}">
        <input value="${Fee.text()}" type="number" name="Fee" id="Feeinput_${id}" class='form-control' required>
    </td>
    `;
    Fee.replaceWith(FeeDom);

    $.ajax({
        type: 'POST',
        url: 'php_common/list_all_flight.php',
        data: {
            id: id,
            Airline: Airline.text(),
            type: 'update'
        },
        success: function(response) {
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

function showAddTripForm() {
    var TripForm = $("#addTripForm");
    TripForm.show();
}

function sendTripUpdate(id) {
    const tripId = $(`#TripID_${id}`);
    const DeptTime = $(`#DeptTimeinput_${id}`);
    const Fee = $(`#Feeinput_${id}`);
    const Airline = $(`#Airline_${id}`);
    const btn_update = $(`#btn_TripUpdate${id}`);
    const btn_danger = $(`#btn_TripDelete${id}`);
    var airlinee = $(`#selectAirline${id}`).children('option:selected').attr('value');

    function sendTripUpdateToPHP() {
        $.ajax({
            type: 'POST',
            url: 'php_common/edit_trip.php',
            data: {
                Trip_ID: tripId.text(),
                Departure_date: DeptTime.val(),
                Fee: Fee.val(),
                Airline: airlinee
            },
            success: function(response) {
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
        AirlineDom = `<td id="Airline_${id}"> ${airlinee}</td>`
        Airline.replaceWith(AirlineDom);

        btn_update.removeClass("btn-danger").addClass("btn-primary").removeAttr("onclick").attr("onclick", `makeTripUpdate(\'${id}\')`);
        btn_danger.removeClass("btn-secondary").addClass("btn-danger").removeAttr("disabled").removeClass("onclick").attr("onclick", `sendTripDelete(\'${id}\')`);
    }

    var x = confirm("Are you sure the data is correct?");
    if (x == true) {
        //dataValidation();
        sendTripUpdateToPHP();
    } else if (x == false) {
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
            success: function(response) {
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
    var airlineDom = "<input type='text' required name='Airline' class='form-control' placeholder='Enter New Airline Name Here' id='inputAirline' required> ";
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
        success: function(response) {
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
}

function hideAddTripForm() {
    var TripForm = $("#addTripForm").hide();
    TripForm.hide()
}

//Managed Trip Section Ended

//Manage Tour Section  START
function makeTourUpdate(id) {
    hideSidePanel();
    const TourName = $(`#TourName_${id}`);
    const btn_update = $(`#btn_TourUpdate${id}`);
    const btn_delete = $(`#btn_DeleteTour${id}`);

    const TourNameDom = `
    <td id="TourName_${id}">
        <input value="${TourName.text()}" type="text" name="TourName" id="TourNameInput_${id}" class='form-control' required>
    </td>`;
    TourName.replaceWith(TourNameDom);

    btn_update.removeClass("btn-primary").addClass("btn-danger").removeAttr("onclick").attr("onclick", `sendTourUpdate('${id}')`);
    btn_delete.removeClass("btn-danger").addClass("btn-secondary").attr("disabled", "disabled").attr("onclick", "alert('You want to update or delete ar?')");
}

function sendTourUpdate(id) {
    const TourCode = $(`#TourCode_${id}`);
    const TourName = $(`#TourNameInput_${id}`);

    $.ajax({
        type: "POST",
        url: "php_common/edit_tour.php?type=updateTourName",
        data: {
            TourName: TourName.val(),
            TourCode: TourCode.text()
        },
        success: function(response) {
            if (response == "success") {
                changeValue();
            } else {
                alert(response);
            }
        }
    });

    function changeValue() {
        const btn_update = $(`#btn_TourUpdate${id}`);
        const btn_delete = $(`#btn_DeleteTour${id}`);

        btn_update.removeClass("btn-danger").addClass("btn-primary").removeAttr("onclick").attr("onclick", `makeTourUpdate(${id})`);

        const dom = `
        ${TourName.val()}
        `;
        TourName.replaceWith(dom);

        btn_delete.removeClass("btn-secondary").addClass("btn-danger").removeAttr("disabled").removeAttr("onclick").attr(`onclick()`, `deleteTour(\"${id}\")`);
    }
}

function deleteTour(id) {
    const row = $(`#tr_${id}`);
    const TourCode = $(`#TourCode_${id}`).text();

    var x = confirm('Are you sure you want to delete this tour ?');
    if (x == true) {
        $.ajax({
            type: "POST",
            url: "php_common/add_tour_tourdes.php?type=deleteTour",
            data: {
                TourCode: TourCode
            },
            success: function(response) {
                if (response == "Success") {
                    row.replaceWith();
                } else {
                    alert(response);
                }
            }
        });
    } else if (x == false) {
        alert('Operation has been canceled');
    }

}

function showAddTourForm() {
    $('#addTourForm').show();
}

function hideAddTourForm() {
    $('#addTourForm').hide();
}

function addCategoryForTour() {
    const category = $("#categoryInAddTourForm");
    const categoryDom = "<input type='text' required name='Category' class='form-control' placeholder='Enter New Category Name Here' id='categoryInput' value='' required> ";
    category.replaceWith(categoryDom);

    $("#btnChangeCategory").removeClass("btn-primary").addClass("btn-info").removeAttr("onclick").attr("onclick", "changeCategoryForTour()").text("Select Category");
}

function changeCategoryForTour() {
    var category = $("#categoryInput");
    $.ajax({
        type: 'POST',
        url: 'php_common/add_tour_tourdes.php?type=echoCategorySelection',
        data: {
            type: 'add'
        },
        success: function(response) {
            if (response !== "") {
                category.replaceWith(response);
                $("#btnChangeCategory").removeClass("btn-info").addClass("btn-primary").removeAttr("onclick").attr("onclick", "addCategoryForTour()").text("Add Category");
            } else {
                alert("Error!" + response);
            }
        },
    })
}

function addDestinationForTour() {
    const destination = $("#destinationInAddTourForm");
    const destinationDom = "<input type='text' required name='Destination' class='form-control' placeholder='Enter New Destination Name Here' id='destinationInput' value='' required/> ";
    destination.replaceWith(destinationDom);

    $("#btnChangeDestination").removeClass("btn-primary").addClass("btn-info").removeAttr("onclick").attr("onclick", "changeDestinationForTour()").text("Select Destination");
}

function changeDestinationForTour() {
    var destination = $("#destinationInput");
    $.ajax({
        type: 'POST',
        url: 'php_common/add_tour_tourdes.php?type=echoDestinationSelection',
        data: {
            type: 'add'
        },
        success: function(response) {
            if (response !== "") {
                destination.replaceWith(response);
                $("#btnChangeDestination").removeClass("btn-info").addClass("btn-primary").removeAttr("onclick").attr("onclick", "addDestinationForTour()").text("Add Destination");
            } else {
                alert("Error!" + response);
            }
        },
    })
}
//Manage Tour Section END

//Manage Feedback Section STARTED
function deleteFeedback(id) {
    //Send to change in db
    $.ajax({
        type: 'POST',
        url: 'php_common/delete_feedback.php',
        data: {
            id: id
        },
        success: function(response) {
            if (response == "success") {
                $(`#${id}`).hide();
            } else {
                alert("Error!" + response);
            }
        },
    })
}

function markFeedbackAsFix(id) {
    $.ajax({
        type: 'POST',
        url: 'php_common/mark_feedback_as_fixed.php',
        data: {
            id: id
        },
        success: function(response) {
            if (response == "success") {
                $(`#${id}`).hide();
            } else {
                alert("Error!" + response);
            }
        },
    })
}
//Manage Feedback Section ENDED

function showTourReportInTableSection() {
    hideSidePanel();
    const btn = $("#btnShowTourReportInTableSection");
    const section = $("#TourReportTableInTableSection");
    const bar = $("#TourReportInBarSection");
    if (bar.css("display") == "block") {
        hideTourReportInBarSection();
    }
    btn.removeClass("btn-primary").addClass("btn-info").removeAttr("onclick").attr("onclick", "hideTourReportInTableSection()");
    section.show();
}

function hideTourReportInTableSection() {
    const btn = $("#btnShowTourReportInTableSection");
    const section = $("#TourReportTableInTableSection");

    btn.removeClass("btn-info").addClass("btn-primary").removeAttr("onclick").attr("onclick", "showTourReportInTableSection()");
    section.hide();
}

function showTourReportInBarSection() {
    hideSidePanel();
    const btn = $("#btnShowTourReportInBarSection");
    const section = $("#TourReportInBarSection");
    const table = $("#TourReportTableInTableSection");
    if (table.css("display") == "block") {
        hideTourReportInTableSection();
    }
    btn.removeClass("btn-primary").addClass("btn-info").removeAttr("onclick").attr("onclick", "hideTourReportInBarSection()");
    section.show();
}

function hideTourReportInBarSection() {
    const btn = $("#btnShowTourReportInBarSection");
    const section = $("#TourReportInBarSection");

    btn.removeClass("btn-info").addClass("btn-primary").removeAttr("onclick").attr("onclick", "showTourReportInBarSection()");
    section.hide();
}

//Main Argument
$(document).ready(function() {
    //Hide the Panel
    Z.hide();
    Z1.hide();
    Z2.hide();
    Z3.hide();
    Z4.hide();
    Z5.hide();
    Z6.hide();
    Z7.hide();
    Z8.hide();
    hideTourReportInBarSection();
    dataT();

    function dataT() {
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
                    action: function() {
                        showAddTripForm();
                    }
                }, {
                    extend: 'collection',
                    text: 'Report',
                    buttons: ['copy', 'csv', 'excel', 'pdf']
                }
            ],
            pagingType: "full_numbers"
        });
        $('#TourTable').DataTable({
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
                    action: function() {
                        showAddTourForm();
                    }
                }, {
                    extend: 'collection',
                    text: 'Report',
                    buttons: ['copy', 'csv', 'excel', 'pdf']
                }
            ]
        });
        $('#TableFeedback').DataTable({
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
        $('#TourReportInTable').DataTable({
            order: [
                [2, "desc"]
            ],
            dom: 'Bfrtip',
            lengthMenu: [
                [15, 10, 25, -1],
                ['15rows', '10 rows', '25 rows', 'Show all']
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