$(document).ready(function() {
    $('#dataTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": 'apps/service/store-service.php',
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "duration" },
            { "data": "price" },
            { "data": "id" },
        ],
        "rowCallback": function(row, data) {
            s = ''
            s += '<a href="#" class="btn btn-success btn-circle">'
            s += '<i class="far fa-edit"></i>'
            s += '</a>'
            s += '<a href="#" class="btn btn-info btn-circle">'
            s += '<i class="fas fa-search-plus"></i>'
            s += '</a>'
            s += '<a href="#" class="btn btn-warning btn-circle">'
                // เปลี่ยน icon 
            s += '<i class="far fa-trash-alt"></i>'
            s += '</a>'
            $("td", row).eq(4).html(s);


        }
    })
});

$('#btn-add-service').on("click", function() {
    $('#modal-service').modal("show")
})

$('#close-modal').click(function() {
    $('#modal-service').modal('toggle')
})

$(document).on("click", "#btn-save", function() {
    let ser_id = $('#ser_id').val()
    let ser_name = $('#ser_name').val()
    let ser_duration = $('#ser_duration').val()
    let ser_price = $('#ser_price').val()
    let ser_home = $('#ser_home').val()


    $.ajax({
        url: 'apps/service/action-add-service.php',
        dataType: 'json',
        type: 'POST',
        data: {
            ser_id: ser_id,
            ser_name: ser_name,
            ser_duration: ser_duration,
            ser_price: ser_price,
            ser_home: ser_home
        },
        success: function(data) {

        }
    })
})