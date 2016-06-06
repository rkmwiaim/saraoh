<?php
  if($this->session->userdata('customer')){
?>
<div class="row work-row">
  <span class="glyphicon glyphicon-play-circle work-item-icon" aria-hidden="true"></span>
  시술등록
  <form action="/index.php" method="post" name="register_work_form" onsubmit="return confirm('제출하시겠습니까?');">
    <table>
      <tr>
        <td style="width:40%">
          <table class="table table-bordered" id="work-register-table">
            <tbody>
              <tr>
                <th style="width:10%">구분</th>
                <th style="width:10%">디자인</th>
                <th style="width:10%">담당자</th>
                <th style="width:10%">가격</th>
              </tr>
              <?php
                if(isset($workbundle)) {
                  foreach($workbundle as $key => $work) {
                    $this->load->view('register_work_bar', array("design1s_array"=>$design1s_array, "staffs_array"=>$staffs_array, "work"=>$work));
                  }
                } else {
                  for($i = 0; $i < 2; $i++) {
                    $this->load->view('register_work_bar', array("design1s_array"=>$design1s_array, "staffs_array"=>$staffs_array));
                  }
                }
               ?>
            </tbody>
          </table>
        </td>
        <td valign=top>
          <table class="table table-bordered" id="work-register-table2" style="margin-left:5px">
            <tbody>
              <tr>
                <th style="width:15%">결제금액</th>
                <th>시술일시</th>
              </tr>
              <tr>
                <td><input type="text" class="form-control" id="work-total-price-input" value=0></td>
                <td><input type="text" class="form-control" name="date" value="<?=(isset($workbundle))?$workbundle[0]->date:date('Y-m-d H:i:s')?>"></td>
              </tr>
              <tr>
                <th rowspan="2">메모</th>
                <td colspan=2>
                  <div class="form-inline">
                    <input type="text" class="form-control" name = "memo" style="width:460px" value="<?=(isset($workbundle))?$workbundle[0]->memo:''?>"></textarea>
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>시술입력</button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
      </tr>
    </td>
    </table>
    <?php
      if(isset($workbundle)) {
    ?>
    <div class="text-center">
      <button type="button" class="btn btn-default" onclick="deleteWork()"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>삭제</button>
      <button type="button" class="btn btn-default" onclick="window.close()"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>닫기</button>
    </div>
    <?php
    }
    ?>
    <?php
      if(!is_null($customer)) {
          echo form_hidden("customer_id",$customer["id"]);
      }
    ?>
    <input type="hidden" name="type" id="work_type_input" value="<?=(isset($workbundle))?'modify':'insert'?>">
    <?php
      if(isset($workbundle)) {
        echo form_hidden("bundle-id", $workbundle[0]->bundle_id);
      }
    ?>
  </form>
</div>
<?php
  }
 ?>
