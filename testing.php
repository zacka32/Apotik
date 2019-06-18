<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script src="https://select2.github.io/select2-bootstrap-theme/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>

<link href="https://select2.github.io/select2-bootstrap-theme/css/select2-bootstrap.css" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" rel="stylesheet"/>

<form action="" method="post" name="booking_form" class="booking" style="width: auto">
    <select id="customer_name" name="customer_name" class="select2">
        <option value="">Click to select your school</option>
        <option value="1">school1, city1</option>
        <option value="23">school21, city1</option>
    </select>
    <input type="text" name="customer_address">
    <input type="text" name="customer_city">
    <input type="text" name="customer_state">
    <input type="text" name="customer_zip">
</form>

<script>
$(document).ready(function() {
var SchoolInfo = {
    "1": {
        "id": 1,
            "name": "The Academy",
            "phone": "555-512-5555",
            "address": "123 street",
            "city": "Miami",
            "state": "FL",
            "zip": 54321,
            "notes": "notes1"
    },
        "23": {
        "id": 23,
            "name": "ABC School",
            "phone": "555-513-5313",
            "address": "123 street",
            "city": "Atlanta",
            "state": "Ga",
            "zip": 12345,
            "notes": "notes2"
    }
};

$("#customer_name").change(function () {
    var sid = $(this).val();
    $("input[name='customer_address']").val(SchoolInfo[sid].address);
    $("input[name='customer_city']").val(SchoolInfo[sid].city);
    $("input[name='customer_state']").val(SchoolInfo[sid].state);
    $("input[name='customer_zip']").val(SchoolInfo[sid].zip);
});

 $('.select2').select2();
});
</script>