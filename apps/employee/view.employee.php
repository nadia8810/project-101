<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
                <h6 class="m-0 font-weight-bold">ข้อมูลพนักงาน</h6>
        </div>
        <div class="row">
            <div class="col-md-12 btn-add">
                <a href="#" class="btn btn-info btn-icon-split" id="btn-add-employee">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus-square"></i>
                    </span>
                    <span class="text">เพิ่มข้อมูลพนักงาน</span>
                </a>
            </div>
        </div>
    </div>
          <!--หัวตาราง-->
          <div class="card shadow mb-4">
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <!-- <th>ลำดับ</th> -->
                        <th>รหัส</th>
                        <th>ชื่อ</th>
                        <!-- <th>นามสกุล</th> -->
                        <th>เบอร์โทร</th>
                        <th>สถานะ</th>
                        <th>การกระทำ</th>
                    </tr>
                  </thead>
                </table>
              </div>
            </div>
          </div>

   
</div>

<!-- Modal Add employee -->
<div class="modal fade" id="modal-employee">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มข้อมูลพนักงาน</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8">
            <table width="100%" id="type-person">
              <tr class="tr-row">
                <td width="40%" class="text-right"><label>เลขบัตรประชาชน: </label></td>
                <td width="60%"><input type="text" class="form-control" id="emp-citizen"></td>
              <?php
                //Run id
                $host = "localhost";
                $username = "root";
                $password = "root1234";
                $dbname = "project101"; //ชื่อฐานข้อมูล
                
                //การเชื่อมต่อฐานข้อมูล
                $conn = mysqli_connect($host, $username, $password, $dbname);
                
                //กำหนด charset ให้ฐานข้อมุลอ่านภาษาไทยได้
                mysqli_query($conn, 'set names utf8');
                date_default_timezone_set("Asia/Bangkok");
                $datenow = strtotime(date("Y-m-d"));
                $d = date('Y', $datenow) + 543;
                $M = date('m', $datenow);

                $sqlm = "SELECT max(emp_id) as Maxid  FROM employee";
                $result = mysqli_query($conn, $sqlm);
                $row_mem = mysqli_fetch_assoc($result);
                
                $mem_old = $row_mem['Maxid'];
                //M003
                $tmp1 = substr($mem_old, 0, 0); 
                $tmp2 = substr($mem_old, 6, 7);
                $Month = substr($mem_old, 4, 2);
                if ($M != $Month) {
                    $tmp2 = 0;
                }
                $t = $tmp2 + 1;
                $sub_date = substr($d . $M, 2, 5);
                $ab = sprintf("EM");
                $a = sprintf("%03d", $t);
                $emp_id = $tmp1 . $ab . $sub_date . $a;

              ?>
              <input type="hidden" id="emp-id" value="<?php echo $emp_id ?>">
              </tr>
              <tr class="tr-row">
                <td width="40%" class="text-right"><label>ชื่อ: </label></td>
                <td width="60%"><input type="text" class="form-control" id="emp-name"></td>
              </tr>
              <tr class="tr-row">
                <td width="40%" class="text-right"><label>นามสกุล: </label></td>
                <td width="60%"><input type="text" class="form-control" id="emp-lastname"></td>
              </tr>
              <tr class="tr-row">
                <td width="40%" class="text-right"><label>เบอร์โทรศัพท์: </label></td>
                <td width="60%"><input type="text" class="form-control" id="emp-tel"></td>
              </tr>
              <tr class="tr-row">
                <td width="40%" class="text-right"><label>อีเมลล์: </label></td>
                <td width="60%"><input type="text" class="form-control" id="emp-email"></td>
              </tr>
            </table>
          </div>
          <div class="col-md-4">

          </div>
        </div>

        <div class="row">
          <!-- ที่อยู่ -->
          <table width="100%" class="top-margin-address">
            <tr>
              <td class="pad-address" colspan="5"><b><h5>ข้อมูลที่อยู่ปัจจุบัน</h5></b></td>
            </tr>
            <tr class="tr-row">
              <td width="15%" class="text-right"><label>บ้านเลขที่: </label></td>
              <td width="30%"><input type="text" class="form-control" id="emp-num-home"></td>
              <td width="15%" class="text-right"><label>หมู่ที่: </label></td>
              <td width="30%"><input type="text" class="form-control" id="emp-muu"></td>
              <td width="10%"></td>
            </tr>
            <tr class="tr-row">
              <td class="text-right"><label>ซอย: </label></td>
              <td><input type="text" class="form-control" id="emp-soi"></td>
              <td class="text-right"><label>ถนน: </label></td>
              <td><input type="text" class="form-control" id="emp-road"></td>
            </tr>
            <tr class="tr-row">
              <td class="text-right"><label>จังหวัด: </label></td>
              <td><select class="form-control" id="emp-province"></td>
              <td class="text-right"><label>เขต/อำเภอ: </label></td>
              <td><select class="form-control" id="emp-amphoe"></td>
            </tr>
            <tr class="tr-row">
              <td class="text-right"><label>แขวง/ตำบล: </label></td>
              <td><select class="form-control" id="emp-district"></td>
              <td class="text-right"><label>รหัสไปรษณีย์: </label></td>
              <td><input type="text" class="form-control" id="emp-zipcode" readonly></td>
            </tr>
          </table>
        </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <div class="row">
          <a href="#" class="btn btn-success btn-icon-split btn-save" id="btn-save">
            <span class="icon text-white-50">
              <i class="fas fa-check"></i>
            </span>
            <span class="text">บันทึก</span>
          </a>
          <a href="#" class="btn btn-danger btn-icon-split" id="close-modal">
            <span class="icon text-white-50">
              <i class="fas fa-times"></i>
            </span>
            <span class="text">ยกเลิก</span>
          </a>
        </div>
      </div>

    </div>
  </div>
</div>
<!-- End Modal Add employee -->

<!-- Modal Edit employee -->
<div class="modal fade" id="edit-modal-employee">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มข้อมูลพนักงาน</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-md-8">
            <table width="100%" id="type-person">
              <tr class="tr-row">
                <td width="40%" class="text-right"><label>เลขบัตรประชาชน: </label></td>
                <td width="60%"><input type="text" class="form-control" id="edit-emp-citizen"></td>
              <?php
                //Run id
                $host = "localhost";
                $username = "root";
                $password = "root1234";
                $dbname = "project101"; //ชื่อฐานข้อมูล
                
                //การเชื่อมต่อฐานข้อมูล
                $conn = mysqli_connect($host, $username, $password, $dbname);
                
                //กำหนด charset ให้ฐานข้อมุลอ่านภาษาไทยได้
                mysqli_query($conn, 'set names utf8');
                date_default_timezone_set("Asia/Bangkok");
                $datenow = strtotime(date("Y-m-d"));
                $d = date('Y', $datenow) + 543;
                $M = date('m', $datenow);

                $sqlm = "SELECT max(emp_id) as Maxid  FROM employee";
                $result = mysqli_query($conn, $sqlm);
                $row_mem = mysqli_fetch_assoc($result);
                
                $mem_old = $row_mem['Maxid'];
                //M003
                $tmp1 = substr($mem_old, 0, 0); 
                $tmp2 = substr($mem_old, 6, 7);
                $Month = substr($mem_old, 4, 2);
                if ($M != $Month) {
                    $tmp2 = 0;
                }
                $t = $tmp2 + 1;
                $sub_date = substr($d . $M, 2, 5);
                $ab = sprintf("EM");
                $a = sprintf("%03d", $t);
                $emp_id = $tmp1 . $ab . $sub_date . $a;

              ?>
              <input type="hidden" id="edit-emp-id" value="<?php echo $emp_id ?>">
              </tr>
              <tr class="tr-row">
                <td width="40%" class="text-right"><label>ชื่อ: </label></td>
                <td width="60%"><input type="text" class="form-control" id="edit-emp-name"></td>
              </tr>
              <tr class="tr-row">
                <td width="40%" class="text-right"><label>นามสกุล: </label></td>
                <td width="60%"><input type="text" class="form-control" id="edit-emp-lastname"></td>
              </tr>
              <tr class="tr-row">
                <td width="40%" class="text-right"><label>เบอร์โทรศัพท์: </label></td>
                <td width="60%"><input type="text" class="form-control" id="edit-emp-tel"></td>
              </tr>
              <tr class="tr-row">
                <td width="40%" class="text-right"><label>อีเมลล์: </label></td>
                <td width="60%"><input type="text" class="form-control" id="edit-emp-email"></td>
              </tr>
            </table>
          </div>
          <div class="col-md-4">

          </div>
        </div>

        <div class="row">
          <!-- ที่อยู่ -->
          <table width="100%" class="top-margin-address">
            <tr>
              <td class="pad-address" colspan="5"><b><h5>ข้อมูลที่อยู่ปัจจุบัน</h5></b></td>
            </tr>
            <tr class="tr-row">
              <td width="15%" class="text-right"><label>บ้านเลขที่: </label></td>
              <td width="30%"><input type="text" class="form-control" id="edit-emp-num-home"></td>
              <td width="15%" class="text-right"><label>หมู่ที่: </label></td>
              <td width="30%"><input type="text" class="form-control" id="edit-emp-muu"></td>
              <td width="10%"></td>
            </tr>
            <tr class="tr-row">
              <td class="text-right"><label>ซอย: </label></td>
              <td><input type="text" class="form-control" id="edit-emp-soi"></td>
              <td class="text-right"><label>ถนน: </label></td>
              <td><input type="text" class="form-control" id="edit-emp-road"></td>
            </tr>
            <tr class="tr-row">
              <td class="text-right"><label>จังหวัด: </label></td>
              <td><select class="form-control" id="edit-emp-province"></td>
              <td class="text-right"><label>เขต/อำเภอ: </label></td>
              <td><select class="form-control" id="edit-emp-amphoe"></td>
            </tr>
            <tr class="tr-row">
              <td class="text-right"><label>แขวง/ตำบล: </label></td>
              <td><select class="form-control" id="edit-emp-district"></td>
              <td class="text-right"><label>รหัสไปรษณีย์: </label></td>
              <td><input type="text" class="form-control" id="edit-emp-zipcode" readonly></td>
            </tr>
          </table>
        </div>

      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <div class="row">
          <a href="#" class="btn btn-success btn-icon-split btn-save" id="btn-save-edit">
            <span class="icon text-white-50">
              <i class="fas fa-check"></i>
            </span>
            <span class="text">บันทึก</span>
          </a>
          <a href="#" class="btn btn-danger btn-icon-split" id="edit-close-modal">
            <span class="icon text-white-50">
              <i class="fas fa-times"></i>
            </span>
            <span class="text">ยกเลิก</span>
          </a>
        </div>
      </div>

    </div>
  </div>
</div>