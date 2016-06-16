  <div class="col-md-9">
    <div class="container-fluid">
      <div class="row work-row">
        <span class="glyphicon glyphicon-play-circle" aria-hidden="true" style="color:#DD7688"></span>
        영업 > 시술입력
        <div class="horizontal-seperator">
        </div>
        <?php $this->load->view('search_customer_bar', array("header"=>$header, "from"=>"work")); ?>
      </div>
      <div class="row">
        <span class="glyphicon glyphicon-play-circle work-item-icon" aria-hidden="true"></span>
        고객정보
        <table class="table table-bordered" id="customer-info-table">
          <?php
          $customer = $this->session->userdata('customer');
          ?>
          <tr>
            <td class="customer-info-table-head">성명</td>
            <td><?= $customer["name"];?></td>
            <td class="customer-info-table-head">전화번호</td>
            <td class="phone_number"><?= $customer["phone_number"];?></td>
            <?php
              if(!is_null($customer) && array_key_exists("membership", $customer) && $customer["membership"] == 1) {
                echo '<td class="customer-info-table-head emphasis-cell">회원권</td>';
                echo '<td class="emphasis-cell"><span class="glyphicon glyphicon-ok"></span></td>';
              } else {
                echo '<td class="customer-info-table-head">회원권</td>';
                echo '<td></td>';
              }
            ?>

          </tr>
          <tr>
            <td class="customer-info-table-head">최초방문</td>
            <td><?= (!is_null($customer) && array_key_exists("first_visit_date", $customer)) ? $customer["first_visit_date"] : "" ?></td>
            <td class="customer-info-table-head">최종방문</td>
            <td><?= (!is_null($customer) && array_key_exists("last_visit_date", $customer)) ? $customer["last_visit_date"] : "" ?></td>
            <td class="customer-info-table-head">방문횟수</td>
            <td></td>
          </tr>
          <tr>
            <td class="customer-info-table-head">담당자</td>
            <td>
              <?php
                if(isset($customer['staff_id'])) {
                  echo $staffs_array[$customer['staff_id']]['name'];
                }
               ?>
            </td>
            <td class="customer-info-table-head">참고사항</td>
            <td colspan="5"><?= $customer["memo"]?></td>
          </tr>
        </table>
      </div>
      <div class="row col-md-offset-3 work-row">
        <form action="/index.php/register/customer" method="post" name="register-customer-form">
        <?php
        	if($this->session->userdata('customer')){
        ?>
          <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>고객정보수정</button>
          <button type="button" class="btn btn-default" onclick="javascript:window.open('/index.php/work/works','popupwindow','width=1000,height=1000,menu=0,status=0');"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>총방문내역</button>
          <button type="button" class="btn btn-default" onclick="deleteCustomer()"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>삭제</button>
          <input type="hidden" name="class" value="select" id="register-class-input">
        <?php
            foreach($customer as $key => $value) {
                echo form_hidden($key, $value);
            }
            echo form_hidden("postclass", "work");
          } else {
        ?>
          <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>신규고객</button>
        <?php
          }
         ?>
         </form>
      </div>
      <?php
        $this->load->view('modify_work_bar', array('customer'=>$customer, "design1s_array"=>$design1s_array, "staffs_array"=>$staffs_array));
       ?>
      <?php
        if(!is_null($customer)) {
            $this->load->view('worktable', array('works'=>$works, "design1s_array"=>$design1s_array, "design2s_array"=>$design2s_array, "from"=>"work", "staffs_array"=>$staffs_array));
        }
      ?>
    </div>
  </div>
</div>
