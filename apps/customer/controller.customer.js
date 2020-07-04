$(document).ready(function() {
    $('#dataTable').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": 'apps/customer/store-customer.php',
        "columns": [
            { "data": "id" },
            { "data": "name" },
            { "data": "type" },
            { "data": "phone" },
            { "data": "status" },
            { "data": "id" },
        ],
        "rowCallback": function(row, data) {
                a = ''
            if(data.status == 1){
                a += '<label class="switch">'
                a += '<input type="checkbox" class="primary" id="check-status" data-index="'+ data.id +'" value="0" checked>'
                a += '<span class="slider round"></span>'
                a += '</label>'
            }else if (data.status == 0) {
                a += '<label class="switch">'
                a += '<input type="checkbox" class="primary" id="check-status" data-index="'+ data.id +'" value="1">'
                a += '<span class="slider round"></span>'
                a += '</label>'
            }
            
            $("td", row).eq(4).html(a);

            s = ''
            s += '<a href="#" class="btn btn-success btn-circle" data-index="' + data.id + '" id="edit-customer">'
            s += '<i class="far fa-edit"></i>'
            s += '</a>'
            s += '<a href="#" class="btn btn-info btn-circle" id="detail-customer">'
            s += '<i class="fas fa-search-plus"></i>'
            s += '</a>'
            $("td", row).eq(5).html(s);

            a = ''
            a += data.name + ' ' + data.lastname
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
        $('#cus-province, #edit-cus-province').append(el)
    }
})

$('#cus-province, #edit-cus-province').change(function() {
    $('#cus-amphoe').empty()
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
            $('#cus-amphoe, #edit-cus-amphoe').append(el)
        }
    })
})

$('#cus-amphoe, #edit-cus-amphoe').change(function() {
    $('#cus-district').empty()
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
            $('#cus-district, #edit-cus-district').append(el)
        }
    })
})

$('#cus-district, #edit-cus-district').change(function() {
    let amphoe = $(this).val()
    $.ajax({
        url: "apps/customer/action-get-zipcode.php",
        type: "POST",
        dataType: "json",
        data: {
            id: amphoe
        },
        success: function(data) {
            $('#cus-zipcode, #edit-cus-zipcode').val(data.zip_code)
        }
    })
})



$('#type-company').hide()

$('#btn-add-customer').on("click", function() {
    $('#modal-customer').modal("show")
})

$('#close-modal').click(function() {
    $('#modal-customer').modal('toggle')
    $('#cus-id').val("")
    $('#cus-citizen-id').val("")
})

$('#select-type-customer').change(function() {
    let type = $('#select-type-customer').val()
    if (type == 0) {
        $('#type-person').show()
        $('#type-company').hide()
    } else {
        $('#type-person').hide()
        $('#type-company').show()
    }
})


//  ส่งค่าไปเป็น
$(document).on("click", "#btn-save", function() {
    let cus_id = $('#cus-id').val()
    let cus_name = $('#cus-name').val()
    let cus_lastname = $('#cus-lastname').val()
    let cus_tel = $('#cus-tel').val()
    let cus_mail = $('#cus-mail').val()
    let cus_type = $('#select-type-customer').val()
    let cus_num_home = $('#cus-num-home').val()
    let cus_muu = $('#cus-muu').val()
    let cus_soi = $('#cus-soi').val()
    let cus_road = $('#cus-road').val()
    let d = document.getElementById("cus-district");
    let cus_district = d.options[d.selectedIndex].text
    let a = document.getElementById("cus-amphoe");
    let cus_amphoe = a.options[a.selectedIndex].text
    let p = document.getElementById("cus-province");
    let cus_province = p.options[p.selectedIndex].text
    let cus_zipcode = $('#cus-zipcode').val()

    //  ใส่ดักค่า
    $.ajax({
        url: 'apps/customer/action-add-customer.php',
        type: 'POST',
        dataType: 'json',
        data: {
            cus_id: cus_id,
            cus_name: cus_name,
            cus_lastname: cus_lastname,
            cus_tel: cus_tel,
            cus_mail: cus_mail,
            cus_type: cus_type,
            cus_num_home: cus_num_home,
            cus_muu: cus_muu,
            cus_soi: cus_soi,
            cus_road: cus_road,
            cus_district: cus_district,
            cus_amphoe: cus_amphoe,
            cus_province: cus_province,
            cus_zipcode: cus_zipcode
        },
        success: function(data) {
            console.log(data)
            swal({
                text: "บันทึกข้อมูลเรียบร้อย",
                icon: "success",
                button: false,
            })
            setTimeout(function() {
                location.reload()
            }, 3000);
        }
    })
})

$(document).on("change", "#check-status", function() {
    $.ajax({
        url: "apps/customer/action-status-customer.php",
        type: "POST",
        dataType: "json",
        data: {
            id: this.dataset.index,
            status: $(this).val()
        },
    })
});

$(document).on("click", '#edit-customer', function() {
    id = this.dataset.index
    $('#edit-modal-customer').modal("show")
    $.ajax({
        url: "apps/customer/action-get-customer.php",
        type: "POST",
        dataType: "json",
        data: {
            id: id
        },
        success: function(data) {
            if (data.cus_type == 'บุคคลธรรมดา') {
                $('#edit-type-person').show()
                $('#edit-type-company').hide()
                $('#edit-cus-id').val(data.cus_id)
                $('#edit-select-type-customer').val(data.cus_type)
                $('#edit-cus-name').val(data.cus_name)
                $('#edit-cus-lastname').val(data.cus_lastname)
                $('#edit-cus-tel').val(data.cus_phone)
                $('#edit-cus-mail').val(data.cus_email)
                $('#edit-cus-num-home').val(data.cus_num_home)
                $('#edit-cus-muu').val(data.cus_muu)
                $('#edit-cus-soi').val(data.cus_soi)
                $('#edit-cus-road').val(data.cus_road)
                $('#edit-cus-province').val(data.cus_province)
                $('#edit-cus-amphoe').val(data.cus_amphoe)
                $('#edit-cus-district').val(data.cus_district)
                $('#edit-cus-zipcode').val(data.cus_zipcode)
            } else if (data.cus_type == 'นิติบุคคล') {
                $('#edit-type-person').hide()
                $('#edit-type-company').show()
                $('#edit-cus-id2').val(data.cus_id)
                $('#edit-select-type-customer').val(data.cus_type)
                $('#edit-cus-name2').val(data.cus_name)
                $('#edit-cus-tel2').val(data.cus_phone)
                $('#edit-cus-mail2').val(data.cus_email)
                $('#edit-cus-num-home').val(data.cus_num_home)
                $('#edit-cus-muu').val(data.cus_muu)
                $('#edit-cus-soi').val(data.cus_soi)
                $('#edit-cus-road').val(data.cus_road)
                $('#edit-cus-province').val(data.cus_province)
                $('#edit-cus-amphoe').val(data.cus_amphoe)
                $('#edit-cus-district').val(data.cus_district)
                $('#edit-cus-zipcode').val(data.cus_zipcode)
            }
        }
    })
})

$(document).on("click", "#btn-save-edit", function() {
    let cus_id = $('#edit-cus-id').val()
    let cus_name = $('#edit-cus-name').val()
    let cus_id2 = $('#edit-cus-id2').val()
    let cus_tel2 = $('#edit-cus-tel2').val()
    let cus_mail2 = $('#edit-cus-mail2').val()
    let cus_name2 = $('#edit-cus-name2').val()
    let cus_lastname = $('#edit-cus-lastname').val()
    let cus_tel = $('#edit-cus-tel').val()
    let cus_mail = $('#edit-cus-mail').val()
    let cus_type = $('#edit-select-type-customer').val()
    let cus_num_home = $('#edit-cus-num-home').val()
    let cus_muu = $('#edit-cus-muu').val()
    let cus_soi = $('#edit-cus-soi').val()
    let cus_road = $('#edit-cus-road').val()
    let d = document.getElementById("edit-cus-district");
    let cus_district = d.options[d.selectedIndex].text
    let a = document.getElementById("edit-cus-amphoe");
    let cus_amphoe = a.options[a.selectedIndex].text
    let p = document.getElementById("edit-cus-province");
    let cus_province = p.options[p.selectedIndex].text
    let cus_zipcode = $('#edit-cus-zipcode').val()
        // alert('test');
        //  ใส่ดักค่า
    $.ajax({
        url: 'apps/customer/action-edit-customer.php',
        type: 'POST',
        dataType: 'json',
        data: {
            cus_id: cus_id,
            cus_name2: cus_name2,
            cus_tel2: cus_tel2,
            cus_mail2: cus_mail2,
            cus_id2: cus_id2,
            cus_name: cus_name,
            cus_lastname: cus_lastname,
            cus_tel: cus_tel,
            cus_mail: cus_mail,
            cus_type: cus_type,
            cus_num_home: cus_num_home,
            cus_muu: cus_muu,
            cus_soi: cus_soi,
            cus_road: cus_road,
            cus_district: cus_district,
            cus_amphoe: cus_amphoe,
            cus_province: cus_province,
            cus_zipcode: cus_zipcode
        },
        success: function(data) {
            // console.log(data)
            swal({
                text: "แก้ไขข้อข้อมูลเรียบร้อย",
                icon: "success",
                button: false,
            })
            setTimeout(function() {
                location.reload()
            }, 3000);
        }
    })
})