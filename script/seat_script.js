function getOccupiedSeat() {

    let data = {
        flight_id: $('#flight_id').val(),
    }
    $.post("./api/get-occupied-sheat-byId.php", data, function (data, status) {
        json = JSON.parse(data);
        if (json.data) {
            json.data.forEach(seat => {
                let seat_checkbox = document.getElementById(seat.seat_id)
                seat_checkbox.setAttribute("disabled", "");
            })
        }
    })
}
$(document).ready(function () {
    getOccupiedSeat()

    $(".btn-continue").click(function () {
        seat = document.querySelector('input[name="seat"]:checked');
        price = document.getElementById("price")
        totalprice = price.value
        if (seat == null) {
            alert("Vui lòng chọn chỗ ngồi")
        }
        else {
            if (seat.getAttribute("cate") == "1") {
                seat_price = 300000;
            }
            if (seat.getAttribute("cate") == "2") {
                seat_price = 150000
            }
            if (seat.getAttribute("cate") == "3") {
                seat_price = 80000
            }
            totalprice = parseInt(totalprice) + seat_price
            price.value = totalprice;
            $(".btn-continue").attr("href", "inforbooking.html")
        }


        console.log(totalprice)

    });
})