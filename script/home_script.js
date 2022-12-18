function getHightlights() {
    $.get("./api/get-highlight.php", function (data, status) {

        data.data.forEach(hightlight => {
            let col = document.createElement("div");
            col.classList.add("col-sm-4");

            let hight_light = document.createElement("div");
            hight_light.classList.add("highlights")
            col.appendChild(hight_light);

            let card = document.createElement("div");
            card.classList.add("card");
            hight_light.appendChild(card);

            let img = `<img src="img/highlights/` + hightlight.image + `" class="card-img-top"></img>`;
            card.innerHTML = img;

            let card_body = document.createElement('div');
            card_body.classList.add("card-body");
            card.appendChild(card_body);

            const name = `<h5 class="card-title">` + hightlight.flight_name + `</h5>`;
            const date = `<p class="card-text">Ngày đi: ` + hightlight.date + `</p>`;
            const des = `<p class="card-text">` + hightlight.description + `</p>`;
            const price = `<h5 class = "text-danger font-weight-bold">Giá chỉ từ: ` + hightlight.price + `</h5>`
            const a = `<a href="#" class="btnHover btn mt-3">Tìm hiểu thêm</a>`;
            card_body.innerHTML = name + date + des + price + a;

            let h3_hl = document.getElementById("h3_hl");
            $(col).insertAfter(h3_hl)
        })
    }, "json");
}

function getStart() {
    $.get("./api/get-start_place.php", function (data, status) {
        let select = document.getElementById("start");
        data.data.forEach(start => {
            var option = document.createElement("option");
            option.id = start.id_start
            option.value = start.name_start
            option.text = start.name_start;
            select.add(option);
        })
    }, "json");
}

function getDestination() {
    $.get("./api/get-destination.php", function (data, status) {
        let select = document.getElementById("destination");
        data.data.forEach(des => {
            var option = document.createElement("option");
            option.id = des.id_des;
            option.value = des.name_des;
            option.text = des.name_des;
            select.add(option);
        })
    }, "json");
}

$(document).ready(function () {
    getHightlights()
    getStart()
    getDestination()

    $('.radio-btn-1').on('change', function () {
        let ngayVe = document.getElementById("ngayVe");
        if ($(this).is(':checked')) {
            ngayVe.setAttribute("required", "")
        } else {
            ngayVe.removeAttribute("required")
        }
    })

})


