
//Lấy thông tin từ database và tạo ra danh sách vé
function getFlight() {
    $.get("./api/get-flight.php", function (data, status) {
        let start_selected = document.getElementById("start");
        var start = start_selected.options[start_selected.selectedIndex].text;
        let des_selected = document.getElementById("des")
        var des = des_selected.options[des_selected.selectedIndex].text;
        let card_container = document.getElementById("card-container-start");
        let hasFlight = false;
        if (data) {
            data.data.forEach(flight => {
                let date_start = document.getElementById("ngayDi");
                let datetime_start = flight.departure_time.split(' ');
                date = datetime_start[0];
                datetime_des = flight.arrival_time.split(' ');
                if (flight.from_location == start && flight.to_location == des && date_start.value == date) {
                    price = flight.price;
                    seat = flight.totals_seats;
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
                    <form action="signedluggage.php" method="post">
                        <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="flight-route">
                                    <div id="route-start" style="margin-right: 50px;">
                                    <span style="font-weight: bold;">`+ formatTime(datetime_start[1]) + `</span><br>
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
                                        <span style="margin-left: 30px;">`+ formatTime(flight.duration) + `</span>
                                    </div>
                                    <div id="route-end" style="margin-left: 50px;">
                                    <span style="font-weight: bold;">`+ formatTime(datetime_des[1]) + `</span><br>
                                        <span>`+ flight.to_location + `</span>
                                    </div> 
                                </div>
                                <input type="hidden" name="start" value="`+ flight.from_location + `">
                                <input type="hidden" name="destination" value="`+ flight.to_location + `">
                                <input type="hidden" name="date" value="`+ datetime_start[0] + `">
                                <input type="hidden" name="price" value="`+ price + `">
                                <input type="hidden" name="flight_id" value="`+ flight.flight_id + `">
                            </li>
                            <li class="list-group-item">
                                <span>`+ category + `</span>
                                <span style="font-weight: bold;margin-left: 75px;">`+ formatNumber(price) + ` VNĐ</span>
                                <button type="button" class="btn-seedel-ticket" data-bs-toggle="modal" data-bs-target="#seedetail`+ flight.flight_id + `">Xem chi tiết</button>
                                <button type="submit" name="choose_ticket" value="choose" class="btn-book-ticket">Chọn vé</button>
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
                                        Khởi hành: <b>Ngày `+ formatDate(datetime_start[0]) + `, Vào lúc ` + formatTime(datetime_start[1]) + `, ` + flight.from_location + `</b> <br>
                                        Đến: <b>Ngày `+ formatDate(datetime_des[0]) + `, Vào lúc ` + formatTime(datetime_des[1]) + `, ` + flight.to_location + ` </b> <br>
                                        Hạng: <b>`+ category + `</b> <br>     
                                        Thời gian: <b>`+ formatTime(flight.duration) + `</b>  <br>    
                                        Máy bay: <b>`+ flight.airline_name + `</b>  <br>   
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>`;
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

//Lấy danh sách nơi xuất phát từ databse truyền vào thẻ select
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
//Lấy danh sách điểm đến từ databse truyền vào thẻ select
function getDestination() {
    $.get("./api/get-destination.php", function (data, status) {
        let select = document.getElementById("des");
        data.data.forEach(des => {
            var option = document.createElement("option");
            option.id = des.id_des;
            option.value = des.name_des;
            option.text = des.name_des;
            select.add(option);
        })
    }, "json");
}

//formatDate(2002-10-12) --> 12/10/202
function formatDate(date) {
    let ymd = date.split('-')
    return ymd[2] + "/" + ymd[1] + "/" + ymd[0];
}

//formatTime(01:00:00) --> 01:00
function formatTime(time) {
    let hms = time.split(":");
    return hms[0] + ":" + hms[1];
}

//formatNumber(30000) --> 30.000
function formatNumber(val) {
    var sign = 1;
    if (val < 0) {
        sign = -1;
        val = -val;
    }
    let num = val.toString().includes('.') ? val.toString().split('.')[0] : val.toString();
    let len = num.toString().length;
    let result = '';
    let count = 1;

    for (let i = len - 1; i >= 0; i--) {
        result = num.toString()[i] + result;
        if (count % 3 === 0 && count !== 0 && i !== 0) {
            result = ',' + result;
        }
        count++;
    }

    if (val.toString().includes('.')) {
        result = result + '.' + val.toString().split('.')[1];
    }
    return sign < 0 ? '-' + result : result;
}

$(document).ready(function () {
    getFlight();
    getReturn();
    getDestination();
    getStart();

    //Bắt sự kiện khi chọn checkbox trong bộ lọc vé
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
                var plane = $(this).attr('plane');
                var cate = $(this).attr('cate');
                if ((jQuery.inArray(cate, filter_list) > -1) || (jQuery.inArray(plane, filter_list) > -1))
                    $(this).fadeIn('slow');
                else
                    $(this).hide();
            });
        }
    });

})