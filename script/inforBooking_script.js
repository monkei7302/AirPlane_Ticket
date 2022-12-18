function getProfile() {

    console.log()
    let data = {
        passenger_username: $('#passenger_username').val(),
    }

    $.post("./api/get-profile.php", data, function (data, status) {
        json = JSON.parse(data);
        console.log(json.data[0])
        $('#f_name').val(json.data[0].first_name)
        $('#l_name').val(json.data[0].last_name)
        $('#email').val(json.data[0].email)
        $('#phone').val(json.data[0].phone)
        if (json.data[0].gender == "male") {
            $('#male').prop('selected', true)
        }
        else if (json.data[0].gender == "female")
        {
            $('#female').prop('selected', true)
        }
    })
}

$(document).ready(function () {
    if ($('#passenger_username').val()) {
        getProfile()
    }
})