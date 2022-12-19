//Lấy ra danh sách ghế đã được đặt
//và disable ghế đó ,không cho chọn
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

    let button = document.getElementById("btn-continue")
    button.addEventListener("click", submitData, false);
    var numOfPassenger = $('#adult').val();

    //Kiểm tra số ghế khi bấm nút tiếp tục
    function submitData(e) {
        var numberOfChecked = $('input:checkbox:checked').length;
        price = document.getElementById("price")
        console.log(numberOfChecked)
        console.log(numOfPassenger)
        if (numberOfChecked == numOfPassenger) {

            seat_price = 0
            seatid = []

            //Kiểm tra loại ghế được chọn là gì để tính giá tiền phù hợp
            $("input:checkbox[type=checkbox]:checked").each(function () {
                seatid.push($(this).attr("id"))
                if ($(this).attr("cate") == "1") {
                    seat_price += 300000;
                }
                if ($(this).attr("cate") == "2") {
                    seat_price += 150000
                }
                if ($(this).attr("cate") == "3") {
                    seat_price += 80000
                }
            });

            $("#seat_id").val(seatid)
            $("#seat_price").val(seat_price)


        }
        //Chọn chưa đủ số ghế
        else if (numberOfChecked < numOfPassenger) {
            alert("Vui lòng chọn đủ chỗ ngồi cho " + numOfPassenger + " hành khách")
            e.preventDefault();
        }
        //Chọn dư số ghế
        else {
            alert("Bạn đã chọn dư " + (numberOfChecked - numOfPassenger) + " ghế");
            e.preventDefault();
        }
    }
})