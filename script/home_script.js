
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
    getStart()
    getDestination()

    // Xử lí sự kiện chọn vé khứ hồi / một chiều
    //Vé khứ hồi bắt buộc phải chọn ngày về
    $('.radio-btn-1').on('change', function () {
        let ngayVe = document.getElementById("ngayVe");
        if ($(this).is(':checked')) {
            ngayVe.setAttribute("required", "")
        } else {
            ngayVe.removeAttribute("required")
        }
    })

})


