function renderPic() {
    var slide = $('#carousel-inner');
    for (let i = 1; i <= 5; i++) {
        if (i == 1) {
            var dom = `
            <div class=\"carousel-item active\" dataid=\"${i}\">
                <img src=\"http://chengkang.synology.me/test/php-assignment/trips/${i}.jpg\" 
                class=\"img-fluid \${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}\" >
            </div>
            `;
        } else {
            var dom = `
            <div class=\"carousel-item\" dataid=\"${i}\">
                <img src=\"http://chengkang.synology.me/test/php-assignment/trips/${i}.jpg\" 
                class=\"img-fluid \${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}\" >
            </div>
            `;
        }
        slide.append(dom);
    }
}

function changeToName() {
    //TODO 
    //1. Change input value to Name
    //2. Change type value to Name
    //3. Change trigger to...
    var dom = `    <form class="input-group my-3 p-3 input-group-lg col-lg-10 mx-auto" method="POST" action="https://chengkang.synology.me/test/php-assignment/trips/index.php?type=TourName" id="formID">
<div class="input-group-prepend">
    <span class="input-group-text bg-primary text-white" id="trigger" onclick="changeToCategory()" title='Click me to change search Method !'>Tour Name</span>
</div>
<input type="text" class="form-control" placeholder="Type specific Tour Name" required name="TourName" id="Input">
<div class="input-group-append">
    <input class="btn btn-light border" type="submit" id="button-addon2" value="Search">
</div>
</form>`;
    $("#formID").replaceWith(dom);
}

function changeToCategory() {
    var dom = `
    <form class="input-group my-3 p-3 input-group-lg col-lg-10 mx-auto" method="POST" action="https://chengkang.synology.me/test/php-assignment/trips/index.php?type=Category" id="formID">
        <div class="input-group-prepend">
            <span class="input-group-text bg-dark text-white" id="trigger" onclick="changeToTourCode()" title='Click me to change search Method !'>Tour Category</span>
        </div>
        <select required class='custom-select' id='selectCategory' name='Category'>
            <option disabled selected value=''>Select an Category</option>
            <option value='' disabled>---------------------------------- </option>
            <option value='Exotic'> Exotic </option>
            <option value='Asia'> Asia </option>
            <option value='Europe'> Europe </option>
        </select>
        <div class="input-group-append">
            <input class="btn btn-light border" type="submit" id="button-addon2" value="Search">
        </div>
    </form>`;
    $("#formID").replaceWith(dom);
}

function changeToTourCode() {
    var dom = `
    <form class="input-group my-3 p-3 input-group-lg col-lg-10 mx-auto " method="POST" action="https://chengkang.synology.me/test/php-assignment/trips/index.php?type=TourCode" id="formID">
        <div class="input-group-prepend">
            <span class="input-group-text bg-info text-white" id="trigger" onclick="changeToName()" title='Click me to change search Method !'>Tour Code</span>
        </div>
        <input type="text" class="form-control" placeholder="Type specific TourCode" required name="TourCode" id="Input">
        <div class="input-group-append">
            <input class="btn btn-light border" type="submit" id="button-addon2" value="Search">
        </div>
    </form>
    `;

    $("#formID").replaceWith(dom);
}

renderPic();