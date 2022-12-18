function getFlight() {
    $.get("./api/get-flight.php", function (data, status) {
        let start_selected = document.getElementById("start");
        var start = start_selected.options[start_selected.selectedIndex].text;
        let des_selected = document.getElementById("des")
        var des = des_selected.options[des_selected.selectedIndex].text;
        let card = document.getElementById("card-start");
        let card_container = document.getElementById("card-container-start");
        let hasFlight = false;
        const clone = card.cloneNode(true);
        // card.style.display = "None"
        if (data) {
            data.data.forEach(flight => {
                if (flight.from_location == start && flight.to_location == des) {
                    hasFlight = true;

                    let routeStart = clone.querySelector("#route-start");
                    routeStart.querySelector(":nth-child(1)").textContent = flight.departure_time;
                    routeStart.querySelector(":nth-child(3)").textContent = flight.from_location;

                    let routeEnd = clone.querySelector("#route-end");
                    routeEnd.querySelector(":nth-child(1)").textContent = flight.arrival_time;
                    routeEnd.querySelector(":nth-child(3)").textContent = flight.to_locations;

                    clone.querySelector("#durration").textContent = flight.duration;
                    let modal = `Chuyến bay: <b>` + flight.flight_id + `</b> <br>
                    Khởi hành: <b>Ngày, `+ flight.departure_time + `, ` + flight.from_location + `</b> <br>
                    Đến: <b>Ngày, `+ flight.arrival_time + `, ` + flight.to_location + ` </b> <br>
                    Hạng: <b>Phổ thông</b> <br>     
                    Thời gian: <b>1h30m</b>  <br>    
                    Máy bay: <b>mã máy bay</b>  <br>   
                    Số ghê: <b>100 (còn 15)</b>  <br>`
                    clone.querySelector(".modal-body").textContent = "ok"

                    card_container.appendChild(clone);
                }
            })

        }
        if (!hasFlight) {
            card_container.innerHTML = `<h5>Không tìm thấy chuyến bay</h5>`;
        }
    }, "json");
}

function getReturn() {
    $.get("./api/get-flight.php", function (data, status) {
        let start_selected = document.getElementById("start");
        var start = start_selected.options[start_selected.selectedIndex].text;
        let des_selected = document.getElementById("des")
        var des = des_selected.options[des_selected.selectedIndex].text;
        let card_des = document.getElementById("card-des");
        let card_container_des = document.getElementById("card-container-des");
        let hasFlight = false;
        if (data) {
            data.data.forEach(flight => {
                if (flight.from_location == des && flight.to_location == start) {
                    const clone = card_des.cloneNode(true);
                    card_container_des.appendChild(clone);

                    hasFlight = true;
                }
            })
        }
        if (!hasFlight) {
            card_des.style.display = "None"
            card_container_des.innerHTML = `<h5>Không tìm thấy chuyến bay</h5>`;
        }
    }, "json");
}

$(document).ready(function () {
    getFlight();
    getReturn()
    $('.check-btn-1').on('change', function () {
        var filter_list = [];
        $('#filters-1 :input:checked').each(function () {
            var category = $(this).val();
            filter_list.push(category);
        });

        if (filter_list.length == 0)
            $('#card-container-start').fadeIn();
        else {
            $('#card-container-start').each(function () {
                var item = $(this).attr('data-tag');
                if (jQuery.inArray(item, filter_list) > -1)
                    $(this).fadeIn('slow');
                else
                    $(this).hide();
            });
        }
    });
})