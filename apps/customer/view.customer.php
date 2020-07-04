<!-- DataTales Example -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
                <h6 class="m-0 font-weight-bold">ข้อมูลลูกค้า</h6>
        </div>
        <div class="row">
            <div class="col-md-12 btn-add">
                <a href="#" class="btn btn-info btn-icon-split" id="btn-add-customer">
                    <span class="icon text-white-50">
                      <i class="fas fa-plus-square"></i>
                    </span>
                    <span class="text">เพิ่มข้อมูลลูกค้า</span>
                </a>
            </div>
        </div>
    </div>

    <!-- หัวตาราง -->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <!-- <th>ลำดับ</th> -->
                        <th>รหัส</th>
                        <th>ชื่อ</th>
                        <!-- <th>นามสกุล</th> -->
                        <th>ประเภท</th>
                        <th>เบอร์โทร</th>
                        <th>สถานะ</th>
                        <th>การกระทำ</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Add Customer -->
<div class="modal fade" id="modal-customer">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มข้อมูลลูกค้า</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <table width="100%" class="tbl-choose-type">
            <tr>
              <td width="70%" class="text-right"><label>ประเภทลูกค้า: </label></td>
              <td width="30%"><select class="form-control" id="select-type-customer">
                  <option value="บุคคลธรรมดา">บุคคลธรรมดา</option>
                  <option value="นิติบุคคล">นิติบุคคล</option>
              </td>
            </tr>
          </table>

          <!-- บุคคลธรรมดา -->
          <table width="100%" id="type-person">
            
                <?php

                //  RUN ID
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
                
                  $sql1 = "SELECT max(cus_id) as Maxid  FROM customer";
                  $result1 = mysqli_query($conn, $sql1);
                  $row_mem = mysqli_fetch_assoc($result1);
                  
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
                  $ab = sprintf("CM");
                  $a = sprintf("%03d", $t);
                  $cus_id = $tmp1 . $ab . $sub_date . $a;

                ?>
            <tr class="tr-row">
              <td width="40%" class="text-right"><label>รหัส: </label></td>
              <td width="60%"><input type="text" class="form-control input-custom" value="<?php echo $cus_id ?>" id="cus-id" readonly></td>
            </tr>
            <tr class="tr-row">
              <td width="40%" class="text-right"><label>ชื่อ: </label></td>
              <td width="60%"><input type="text" class="form-control input-custom" id="cus-name"></td>
            </tr>
            <tr class="tr-row">
              <td width="40%" class="text-right"><label>นามสกุล: </label></td>
              <td width="60%"><input type="text" class="form-control input-custom" id="cus-lastname"></td>
            </tr>
            <tr class="tr-row">
              <td width="40%" class="text-right"><label>เบอร์โทรศัพท์: </label></td>
              <td width="60%"><input type="text" class="form-control input-custom" id="cus-tel"></td>
            </tr>
            <tr class="tr-row">
              <td width="40%" class="text-right"><label>อีเมลล์: </label></td>
              <td width="60%"><input type="text" class="form-control input-custom" id="cus-mail"></td>
            </tr>
          </table>

          <!-- นิติบุคคล -->
          <table width="100%" id="type-company">
            <tr class="tr-row">
              <td width="40%" class="text-right"><label>รหัส: </label></td>
              <td width="60%"><input type="text" class="form-control input-custom" id="cus-id" value="<?php echo $cus_id ?>" readonly></td>
            </tr>
            <tr class="tr-row">
              <td width="40%" class="text-right"><label>ชื่อลูกค้า: </label></td>
              <td width="60%"><input type="text" class="form-control input-custom" id="cus-name"></td>
            </tr>
            <tr class="tr-row">
              <td width="40%" class="text-right"><label>เบอร์โทร: </label></td>
              <td width="60%"><input type="text" class="form-control input-custom" id="cus-tel"></td>
            </tr>
            <tr class="tr-row">
              <td width="40%" class="text-right"><label>อีเมลล์: </label></td>
              <td width="60%"><input type="text" class="form-control input-custom" id="cus-mail"></td>
            </tr>
          </table>

          <!-- ที่อยู่ -->
          <table width="100%" class="top-margin-address">
            <tr>
              <td class="pad-address" colspan="5"><b><h5>ข้อมูลที่อยู่ปัจจุบัน</h5></b></td>
            </tr>
            <tr class="tr-row">
              <td width="15%" class="text-right"><label>บ้านเลขที่: </label></td>
              <td width="30%"><input type="text" class="form-control" id="cus-num-home"></td>
              <td width="15%" class="text-right"><label>หมู่ที่: </label></td>
              <td width="30%"><input type="text" class="form-control" id="cus-muu"></td>
              <td width="10%"></td>
            </tr>
            <tr class="tr-row">
              <td class="text-right"><label>ซอย: </label></td>
              <td><input type="text" class="form-control" id="cus-soi"></td>
              <td class="text-right"><label>ถนน: </label></td>
              <td><input type="text" class="form-control" id="cus-road"></td>
            </tr>
            <tr class="tr-row">
              <td class="text-right"><label>จังหวัด: </label></td>
              <td>
                <select class="form-control" id="cus-province">
                </select>
              </td>
              <td class="text-right"><label>เขต/อำเภอ: </label></td>
              <td>
                <select class="form-control" id="cus-amphoe">
                </select>
              </td>
            </tr>
            <tr class="tr-row">
              <td class="text-right"><label>แขวง/ตำบล: </label></td>
              <td>
                <select class="form-control" id="cus-district">
                </select>
              </td>
              <td class="text-right"><label>รหัสไปรษณีย์: </label></td>
              <td><input type="text" class="form-control" id="cus-zipcode" readonly></td>
            </tr>
          </table>

        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <div class="row">
          <a href="javascript:void(0)" id="btn-save" class="btn btn-success btn-icon-split btn-save">
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
<!-- End Modal Add -->


<!-- Modal Edit Customer -->
<div class="modal fade" id="edit-modal-customer">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มข้อมูลลูกค้า</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <table width="100%" class="tbl-choose-type">
            <tr>
              <td width="70%" class="text-right"><label>ประเภทลูกค้า: </label></td>
              <td width="30%"><select class="form-control" id="edit-select-type-customer">
                  <option value="บุคคลธรรมดา">บุคคลธรรมดา</option>
                  <option value="นิติบุคคล">นิติบุคคล</option>
              </td>
            </tr>
          </table>

          <!-- บุคคลธรรมดา -->
          <table width="100%" id="edit-type-person">
            <tr class="tr-row">
              <td width="40%" class="text-right"><label>รหัส: </label></td>
              <td width="60%"><input type="text" class="form-control input-custom" id="edit-cus-id" readonly></td>
            </tr>
            <tr class="tr-row">
              <td width="40%" class="text-right"><label>ชื่อ: </label></td>
              <td width="60%"><input type="text" class="form-control input-custom" id="edit-cus-name"></td>
            </tr>
            <tr class="tr-row">
              <td width="40%" class="text-right"><label>นามสกุล: </label></td>
              <td width="60%"><input type="text" class="form-control input-custom" id="edit-cus-lastname"></td>
            </tr>
            <tr class="tr-row">
              <td width="40%" class="text-right"><label>เบอร์โทรศัพท์: </label></td>
              <td width="60%"><input type="text" class="form-control input-custom" id="edit-cus-tel"></td>
            </tr>
            <tr class="tr-row">
              <td width="40%" class="text-right"><label>อีเมลล์: </label></td>
              <td width="60%"><input type="text" class="form-control input-custom" id="edit-cus-mail"></td>
            </tr>
          </table>

          <!-- นิติบุคคล -->
          <table width="100%" id="edit-type-company">
            <tr class="tr-row">
              <td width="40%" class="text-right"><label>รหัส: </label></td>
              <td width="60%"><input type="text" class="form-control input-custom" id="edit-cus-id2" readonly></td>
            </tr>
            <tr class="tr-row">
              <td width="40%" class="text-right"><label>ชื่อลูกค้า: </label></td>
              <td width="60%"><input type="text" class="form-control input-custom" id="edit-cus-name2"></td>
            </tr>
            <tr class="tr-row">
              <td width="40%" class="text-right"><label>เบอร์โทร: </label></td>
              <td width="60%"><input type="text" class="form-control input-custom" id="edit-cus-tel2"></td>
            </tr>
            <tr class="tr-row">
              <td width="40%" class="text-right"><label>อีเมลล์: </label></td>
              <td width="60%"><input type="text" class="form-control input-custom" id="edit-cus-mail2"></td>
            </tr>
          </table>

          <!-- ที่อยู่ -->
          <table width="100%" class="top-margin-address">
            <tr>
              <td class="pad-address" colspan="5"><b><h5>ข้อมูลที่อยู่ปัจจุบัน</h5></b></td>
            </tr>
            <tr class="tr-row">
              <td width="15%" class="text-right"><label>บ้านเลขที่: </label></td>
              <td width="30%"><input type="text" class="form-control" id="edit-cus-num-home"></td>
              <td width="15%" class="text-right"><label>หมู่ที่: </label></td>
              <td width="30%"><input type="text" class="form-control" id="edit-cus-muu"></td>
              <td width="10%"></td>
            </tr>
            <tr class="tr-row">
              <td class="text-right"><label>ซอย: </label></td>
              <td><input type="text" class="form-control" id="edit-cus-soi"></td>
              <td class="text-right"><label>ถนน: </label></td>
              <td><input type="text" class="form-control" id="edit-cus-road"></td>
            </tr>
            <tr class="tr-row">
              <td class="text-right"><label>จังหวัด: </label></td>
              <td>
                <select class="form-control" id="edit-cus-province">
                </select>
              </td>
              <td class="text-right"><label>เขต/อำเภอ: </label></td>
              <td>
                <select class="form-control" id="edit-cus-amphoe">
                </select>
              </td>
            </tr>
            <tr class="tr-row">
              <td class="text-right"><label>แขวง/ตำบล: </label></td>
              <td>
                <select class="form-control" id="edit-cus-district">
                </select>
              </td>
              <td class="text-right"><label>รหัสไปรษณีย์: </label></td>
              <td><input type="text" class="form-control" id="edit-cus-zipcode" readonly></td>
            </tr>
          </table>

        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <div class="row">
          <a href="javascript:void(0)" id="btn-save-edit" class="btn btn-success btn-icon-split btn-save">
            <span class="icon text-white-50">
              <i class="fas fa-check"></i>
            </span>
            <span class="text">บันทึก</span>
          </a>
          <a href="#" class="btn btn-danger btn-icon-split" id="close-modal-edit">
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
<!-- End Modal Edit -->