$(document).ready(function() {
    $('#dataTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": 'apps/equipment/store-equipment.php',
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "type" },
            { "data": "volume" },
            { "data": "unit" },
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
            $("td", row).eq(5).html(s);

        }
    })
});


$('#btn-add-equipment').on("click", function() {
    $('#modal-equipment').modal("show")
})

$('#close-modal').click(function() {
    $('#modal-equipment').modal('toggle')
})

$(document).on("click", "#btn-save", function() {
    let equ_id = $('#equ_id').val()
    let equ_type = $('#select_type').val()
    let equ_name = $('#equ_name').val()
    let equ_volume = $('#equ_volume').val()
    let equ_unit = $('#select_unit').val()

    $.ajax({
        url: 'apps/equipment/action-add-equipment.php',
        dataType: 'json',
        type: 'POST',
        data: {
            equ_id: equ_id,
            equ_type: equ_type,
            equ_name: equ_name,
            equ_volume: equ_volume,
            equ_unit: equ_unit

        },
        success: function(data) {
            location.reload()
            swal({
                text: "บันทึกข้อมูลเรียบร้อย",
                icon: "success",
                button: false,
            });
            setTimeout(function() {

                location.reload()
            }, 3000);
        }
    })
})