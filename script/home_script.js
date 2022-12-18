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


