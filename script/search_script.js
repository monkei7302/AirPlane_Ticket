function getFlight(detail) {
    $.get("./api/get-flight.php", function (data, status) {
        let start_selected = document.getElementById("start");
        var start = start_selected.options[start_selected.selectedIndex].text;
        let des_selected = document.getElementById("des")
        var des = des_selected.options[des_selected.selectedIndex].text;
        let card_container = document.getElementById("card-container-start");
        let hasFlight = false;
        let price = "";
        let date = "";
        let seat = ""
        if (data) {
            data.data.forEach(flight => {
                if (flight.from_location == start && flight.to_location == des) {
                    let datetime_start = flight.departure_time.split(' ');
                    let datetime_des = flight.arrival_time.split(' ');
                    detail.forEach(d => {
                        if (d.flight_id == flight.flight_id) {
                            price = d.price;
                            date = d.flight_departure_date;
                            seat = d.available_seats;
                        }
                    })
                    hasFlight = true;
                    let card = document.createElement("div");
                    card.classList.add("card");
                    let category = "";
                    card_container.setAttribute("plane", flight.airline_id.substring(0, 2))
                    card_container.setAttribute("cate", flight.flight_id.substring(0, 2))
                    if (flight.flight_id.substring(0, 2) == "PT") {
                        category = "Phổ thông";
                    }
                    else if (flight.flight_id.substring(0, 2) == "TG") {
                        category = "Thương gia";
                    }
                    let card_body = `
                    <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="flight-route">
                                <div id="route-start" style="margin-right: 50px;">
                                    <span style="font-weight: bold;">`+ flight.departure_time + `</span><br>
                                    <span>`+ flight.from_location + `</span>
                                </div> 
                                <div>
                                    <span class="fa">&#xf041;</span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="fa fa-plane"></span><br>
                                    <span style="margin-left: 30px;">`+ flight.duration + `</span>
                                </div>
                                <div id="route-end" style="margin-left: 50px;">
                                    <span style="font-weight: bold;">`+ flight.arrival_time + `</span><br>
                                    <span>`+ flight.to_location + `</span>
                                </div> 
                            </div>
                        </li>
                        <li class="list-group-item">
                            <span>`+ category + `</span>
                            <span style="font-weight: bold;margin-left: 75px;">`+ price + `VNĐ</span>
                            <button class="btn-seedel-ticket" data-bs-toggle="modal" data-bs-target="#seedetail`+ flight.flight_id + `">Xem chi tiết</button>
                            <a href="signedluggage.html" class="btn-book-ticket">Chọn vé</a>
                        </li>
                    </ul>
                    <div class="modal" id="seedetail`+ flight.flight_id + `">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">`+ flight.from_location + ` - ` + flight.to_location + `</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div id="modal-body" class="modal-body">
                                    Chuyến bay: <b>`+ flight.flight_id + `</b> <br>
                                    Khởi hành: <b>Ngày `+ datetime_start[0] + `, Vào lúc ` + datetime_start[1] + `, ` + flight.from_location + `</b> <br>
                                    Đến: <b>Ngày `+ datetime_des[0] + `, Vào lúc ` + datetime_des[1] + `, ` + flight.to_location + ` </b> <br>
                                    Hạng: <b>`+ category + `</b> <br>     
                                    Thời gian: <b>`+ flight.duration + `</b>  <br>    
                                    Máy bay: <b>`+ flight.airline_name + `</b>  <br>   
                                    Số ghế trống: <b>`+ seat + `</b>  <br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <a href="signedluggage.html" class="btn-book-ticket">Chọn vé</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;
                    card.innerHTML = card_body;
                    card_container.appendChild(card);
                }
            })

        }
        if (!hasFlight) {
            card_container.innerHTML = `<h5>Không tìm thấy chuyến bay</h5>`;
        }
    }, "json");
}

function getDetail() {
    $.ajax({
        url: "./api/get-flight_detail.php",
        type: 'get',
        dataType: 'html',
        async: false,
        success: function (data, status) {
            result = data;
            json = JSON.parse(data);
            getFlight(json.data)
            getReturn(json.data);
        }
    });
}

function getReturn(detail) {
    $.get("./api/get-flight.php", function (data, status) {
        let start_selected = document.getElementById("start");
        var start = start_selected.options[start_selected.selectedIndex].text;
        let des_selected = document.getElementById("des")
        var des = des_selected.options[des_selected.selectedIndex].text;
        let card_container_des = document.getElementById("card-container-des");
        let hasFlight = false;
        let price = "";
        let seat = ""
        if (data) {
            data.data.forEach(flight => {
                if (flight.from_location == des && flight.to_location == start) {
                    let datetime_start = flight.departure_time.split(' ');
                    let datetime_des = flight.arrival_time.split(' ');
                    detail.forEach(d => {
                        if (d.flight_id == flight.flight_id) {
                            price = d.price;
                            seat = d.available_seats;
                            return;
                        }
                    })
                    hasFlight = true;
                    let card_des = document.createElement("div");
                    card_des.classList.add("card");
                    let category = "";

                    if (flight.flight_id.substring(0, 2) == "PT") {
                        category = "Phổ thông";
                    }
                    else if (flight.flight_id.substring(0, 2) == "TG") {
                        category = "Thương gia";
                    }
                    let card_body = `
                    <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="flight-route">
                                <div id="route-start" style="margin-right: 50px;">
                                    <span style="font-weight: bold;">`+ flight.departure_time + `</span><br>
                                    <span>`+ flight.from_location + `</span>
                                </div> 
                                <div>
                                    <span class="fa">&#xf041;</span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="dot"></span>
                                    <span class="fa fa-plane"></span><br>
                                    <span style="margin-left: 30px;">`+ flight.duration + `</span>
                                </div>
                                <div id="route-end" style="margin-left: 50px;">
                                    <span style="font-weight: bold;">`+ flight.arrival_time + `</span><br>
                                    <span>`+ flight.to_location + `</span>
                                </div> 
                            </div>
                        </li>
                        <li class="list-group-item">
                            <span>`+ category + `</span>
                            <span style="font-weight: bold;margin-left: 75px;">`+ price + `VNĐ</span>
                            <button class="btn-seedel-ticket" data-bs-toggle="modal" data-bs-target="#seedetail`+ flight.flight_id + `">Xem chi tiết</button>
                            <a href="signedluggage.html" class="btn-book-ticket">Chọn vé</a>
                        </li>
                    </ul>
                    <div class="modal" id="seedetail`+ flight.flight_id + `">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">`+ flight.from_location + ` - ` + flight.to_location + `</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div id="modal-body" class="modal-body">
                                    Chuyến bay: <b>`+ flight.flight_id + `</b> <br>
                                    Khởi hành: <b>Ngày `+ datetime_start[0] + `, Vào lúc ` + datetime_start[1] + `, ` + flight.from_location + `</b> <br>
                                    Đến: <b>Ngày `+ datetime_des[0] + `, Vào lúc ` + datetime_des[1] + `, ` + flight.to_location + ` </b> <br>
                                    Hạng: <b>`+ category + `</b> <br>     
                                    Thời gian: <b>`+ flight.duration + `</b>  <br>    
                                    Máy bay: <b>`+ flight.airline_id + `</b>  <br>   
                                    Số ghế trống: <b>`+ seat + `</b>  <br>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    <a href="signedluggage.html" class="btn-book-ticket">Chọn vé</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>`;
                    card_des.innerHTML = card_body;
                    card_container_des.appendChild(card_des);

                    hasFlight = true;
                }
            })
        }
        if (!hasFlight) {
            card_container_des.innerHTML = `<h5>Không tìm thấy chuyến bay</h5>`;
        }
    }, "json");
}

$(document).ready(function () {
    getDetail();
    $('.check-btn-1').on('change', function () {
        var filter_list = [];
        $('#filters-1 :input:checked').each(function () {
            var category = $(this).val();
            filter_list.push(category);
        });
        console.log(filter_list)
        if (filter_list.length == 0)
            $('#card-container-start').fadeIn();
        else {
            $('#card-container-start').each(function () {
                var plane = $(this).attr('plane');
                var cate = $(this).attr('cate');
                if ((jQuery.inArray(cate, filter_list) > -1) || (jQuery.inArray(plane, filter_list) > -1))
                    $(this).fadeIn('slow');
                else
                    $(this).hide();
            });
        }
    });

    $('.check-btn-2').on('change', function () {
        var filter_list_2 = [];
        $('#filters-2 :input:checked').each(function () {
            var category_2 = $(this).val();
            filter_list_2.push(category_2);
        });
        if (filter_list_2.length == 0)
            $('#card-container-des').fadeIn();
        else {
            $('#card-container-des').each(function () {
                var plane = $(this).attr('plane');
                var cate = $(this).attr('cate');
                if ((jQuery.inArray(cate, filter_list_2) > -1) || (jQuery.inArray(plane, filter_list_2) > -1))
                    $(this).fadeIn('slow');
                else
                    $(this).hide();
            });
        }
    });

})