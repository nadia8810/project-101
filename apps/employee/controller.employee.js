$(document).ready(function() {
    $('#dataTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": 'apps/employee/store-employee.php',
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "phone" },
            { "data": "status" },
            { "data": "id" },
        ],
        "rowCallback": function(row, data) {
            s = ''
            s += '<a href="#" class="btn btn-success btn-circle" data-index="' + data.id + '" id="edit-employee">'
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

            a = ''
            a += data.name + ' ' + data.lastname
                // console.log(a)
            $("td", row).eq(1).html(a);
        }
    })
});

$.ajax({
    url: "apps/customer/action-get-provinces.php",
    type: "POST",
    dataType: "json",
    success: function(data) {
        var el = ''
        el += '<option value="">โปรดเลือกจังหวัด</option>'
        for (let i = 0; i < data.length; i++) {
            const t = data[i];
            el += '<option value=" ' + t.id + ' ">' + t.name_th + '</option>'
        }
        $('#emp-province, #edit-emp-province').append(el)
    }
})

$('#emp-province, #edit-emp-province').change(function() {
    $('#emp-amphoe').empty()
    let province = $(this).val()
    $.ajax({
        url: "apps/customer/action-get-amphures.php",
        type: "POST",
        dataType: "json",
        data: {
            id: province
        },
        success: function(data) {
            var el = ''
            el += '<option value="">โปรดเลือกเขต/อำเภอ</option>'
            for (let i = 0; i < data.length; i++) {
                const t = data[i];
                el += '<option value=" ' + t.id + ' ">' + t.name_th + '</option>'
            }
            $('#emp-amphoe,#edit-emp-amphoe').append(el)
        }
    })
})

$('#emp-amphoe,#edit-emp-amphoe').change(function() {
    $('#emp-district').empty()
    let amphoe = $(this).val()
    $.ajax({
        url: "apps/customer/action-get-districts.php",
        type: "POST",
        dataType: "json",
        data: {
            id: amphoe
        },
        success: function(data) {
            var el = ''
            el += '<option value="">โปรดเลือกแขวง/ตำบล</option>'
            for (let i = 0; i < data.length; i++) {
                const t = data[i];
                el += '<option value=" ' + t.id + ' ">' + t.name_th + '</option>'
            }
            $('#emp-district,#edit-emp-district').append(el)
        }
    })
})

$('#emp-district,#edit-emp-district').change(function() {
    let amphoe = $(this).val()
    $.ajax({
        url: "apps/customer/action-get-zipcode.php",
        type: "POST",
        dataType: "json",
        data: {
            id: amphoe
        },
        success: function(data) {
            $('#emp-zipcode,#edit-emp-zipcode').val(data.zip_code)
        }
    })
})


$('#type-company').hide()

$('#btn-add-employee').on("click", function() {
    $('#modal-employee').modal("show")
})

$('#close-modal').click(function() {
    $('#modal-employee').modal('toggle')
    $('#emp-id').val("")
    $('#emp-citizen-id').val("")
})

$('#select-type-employee').change(function() {
    let type = $('#select-type-employee').val()
    if (type == 0) {
        $('#type-person').show()
        $('#type-company').hide()
    } else {
        $('#type-person').hide()
        $('#type-company').show()
    }
})

$(document).on("click", "#btn-save", function() {
    let emp_id = $('#emp-id').val()
    let emp_name = $('#emp-name').val()
    let emp_lastname = $('#emp-lastname').val()
    let emp_tel = $('#emp-tel').val()
    let emp_mail = $('#emp-email').val()
    let emp_status = $('#emp-status').val()
    let emp_citizen = $('#emp-citizen').val()
        //  let emp_pic = $('#emp-pic').val()
    let emp_num_home = $('#emp-num-home').val()
    let emp_muu = $('#emp-muu').val()
    let emp_soi = $('#emp-soi').val()
    let emp_road = $('#emp-road').val()
    let emp_district = $('#emp-district').val()
    let emp_amphoe = $('#emp-amphoe').val()
    let emp_province = $('#emp-province').val()
    let emp_zipcode = $('#emp-zipcode').val()

    $.ajax({
        url: 'apps/employee/action-add-employee.php',
        dataType: 'json',
        type: 'POST',
        data: {
            'emp_id': emp_id,
            'emp_name': emp_name,
            'emp_lastname': emp_lastname,
            'emp_tel': emp_tel,
            'emp_mail': emp_mail,
            'emp_citizen': emp_citizen,
            // 'emp_pic': emp_pic,
            'emp_num_home': emp_num_home,
            'emp_muu': emp_muu,
            'emp_soi': emp_soi,
            'emp_road': emp_road,
            'emp_district': emp_district,
            'emp_amphoe': emp_amphoe,
            'emp_province': emp_province,
            'emp_zipcode': emp_zipcode

        },
        success: function(data) {
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

$(document).on("click", '#edit-employee', function() {
    id = this.dataset.index
    $('#edit-modal-employee').modal("show")
    $.ajax({
        url: "apps/employee/action-get-employee.php",
        type: "POST",
        dataType: "json",
        data: {
            id: id
        },
        success: function(data) {
            console.log(data)
            $('#edit-emp-id').val(data.emp_id)
            $('#edit-emp-name').val(data.emp_name)
            $('#edit-emp-lastname').val(data.emp_lastname)
            $('#edit-emp-tel').val(data.emp_phone)
            $('#edit-emp-email').val(data.emp_email)
            $('#edit-emp-status').val(data.emp_status)
            $('#edit-emp-citizen').val(data.emp_citizen)
            $('#edit-emp-num-home').val(data.emp_num_home)
            $('#edit-emp-muu').val(data.emp_muu)
            $('#edit-emp-soi').val(data.emp_soi)
            $('#edit-emp-road').val(data.emp_road)
            $('#edit-emp-district').val(data.emp_district)
            $('#edit-emp-amphoe').val(data.emp_amphoe)
            $('#edit-emp-province').val(data.emp_province)
            $('#edit-emp-zipcode').val(data.emp_zipcode)

        }
    })
})

$(document).on("click", "#btn-save", function() {
    let emp_id = $('#emp-id').val()
    let emp_name = $('#edit-emp-name').val()
    let emp_lastname = $('#edit-emp-lastname').val()
    let emp_tel = $('#edit-emp-tel').val()
    let emp_mail = $('#edit-emp-email').val()
        // let emp_citizen = $('#edit-emp-citizen').val()
        //  let emp_pic = $('#emp-pic').val()
    let emp_num_home = $('#edit-emp-num-home').val()
    let emp_muu = $('#edit-emp-muu').val()
    let emp_soi = $('#edit-emp-soi').val()
    let emp_road = $('#edit-emp-road').val()
    let emp_district = $('#edit-emp-district').val()
    let emp_amphoe = $('#edit-emp-amphoe').val()
    let emp_province = $('#edit-emp-province').val()
    let emp_zipcode = $('#edit-emp-zipcode').val()

    $.ajax({
        url: 'apps/employee/action-edit-employee.php',
        dataType: 'json',
        type: 'POST',
        data: {
            emp_id: emp_id,
            emp_name: emp_name,
            emp_lastname: emp_lastname,
            emp_tel: emp_tel,
            emp_mail: emp_mail,
            // emp_citizen: emp_citizen,
            // 'emp_pic': emp_pic,
            emp_num_home: emp_num_home,
            emp_muu: emp_muu,
            emp_soi: emp_soi,
            emp_road: emp_road,
            emp_district: emp_district,
            emp_amphoe: emp_amphoe,
            emp_province: emp_province,
            emp_zipcode: emp_zipcode

        },
        success: function(data) {
            // console.log(data)
            swal({
                text: "แก้ไขข้อมูลเรียบร้อย",
                icon: "success",
                button: false,
            })
            setTimeout(function() {
                location.reload()
            }, 3000);
        }
    })
})