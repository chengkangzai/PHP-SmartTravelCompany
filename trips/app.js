var slide = $('#carousel-inner');

function renderPic() {
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

document.ready(
    renderPic()
);