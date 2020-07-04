<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <div class="row">
            <h6 class="m-0 font-weight-bold">ข้อมูลอุปกรณ์</h6>
        </div>
        <div class="row">
            <div class="col-md-12 btn-add">
                <a href="#" class="btn btn-info btn-icon-split" id="btn-add-equipment">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus-square"></i>
                    </span>
                    <span class="text">เพิ่มข้อมูลอุปกรณ์</span>
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
                        <th>รหัสอุปกรณ์</th>
                        <th>ชื่ออุปกรณ์</th>
                        <th>ประเภทน้ำยา</th>
                        <th>ปริมาตร</th>
                        <th>หน่วยนับ</th>
                        <th>การกระทำ</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Add service -->
<div class="modal fade" id="modal-equipment">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">เพิ่มข้อมูลอุปกรณ์ </h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="row"t5>
                    <table width="100%" class="tbl-choose-type">
                        <tr class="tr-row">
                        <?php
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
                      
                        $sqlm = "SELECT max(equ_id) as Maxid  FROM Equipment";
                        $result = mysqli_query($conn, $sqlm);
                        $row_mem = mysqli_fetch_assoc($result);
                        $mem_old = $row_mem['Maxid'];
                        print_r($row_mem);
                        //M003
                        $tmp1 = substr($mem_old, 0, 0); 
                        $tmp2 = substr($mem_old, 6, 7);
                        $Month = substr($mem_old, 4, 2);
                        if ($M != $Month) {
                            $tmp2 = 0;
                        }
                        $t = $tmp2 + 1;
                        $sub_date = substr($d . $M, 2, 5);
                        $ab = sprintf("EQ");
                        $a = sprintf("%03d", $t);
                        $equ_id = $tmp1 . $ab . $sub_date . $a;
                      
                        ?>
                        <input type="hidden" id="equ_id" value="<?php echo $equ_id ?>">
                            <td width="40%" class="text-right"><label>ประเภทน้ำยา: </label></td>
                            <td width="60%">
                                <select class="form-control input-custom" id="select_type" name="select_type">
                                    <option value="">โปรดเลือก</option>
                                    <option value="อิมิดาโคลพริด (imidachlorpid)">อิมิดาโคลพริด (imidachlorpid)</option>
                                    <option value="TERMATRIX">TERMATRIX</option>
                                    <option value="อื่นๆ">อื่นๆ</option>
                                </select>
                            </td>
                        </tr>
                        <tr class="tr-row">
                            <td width="40%" class="text-right"><label>ชื่ออุปกรณ์: </label></td>
                            <td width="60%">
                                <select class="form-control input-custom" id="equ_name" name="eqname">
                                    <option value="">โปรดเลือก</option>
                                    <option value="แบบวางท่อ">แบบวางท่อ</option>
                                    <option value="แบบเคมี">แบบเคมี</option>
                                    <option value="แบบเหยื่อล่อ">แบบเหยื่อล่อ</option>
                                </select>
                            </td>
                        </tr>

                        <tr class="tr-row">
                            <td width="40%" class="text-right"><label>ปริมาตร/หน่วย: </label></td>
                            <td width="60%"><input type="text" class="form-control input-custom" id="equ_volume"></td>
                        </tr>
                        <tr class="tr-row">
                            <td width="40%" class="text-right"><label>หน่วย: </label></td>
                            <td width="60%">
                                <select class="form-control input-custom" id="select_unit" name="select_unit">
                                    <option value="">โปรดเลือก</option>
                                    <option value="ขวด">ขวด</option>
                                    <option value="แกลอน">แกลอน</option>
                                </select>
                            </td>
                        </tr>
                    </table>
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