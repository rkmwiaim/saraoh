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
            <td><?= $customer["phone_number"];?></td>
            <td class="customer-info-table-head emphasis-cell">회원권</td>
            <td class="emphasis-cell"><?= (!is_null($customer) && array_key_exists("membership", $customer)) ? $customer["membership"] : "" ?></td>
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
            <td class="customer-info-table-head">참고사항</td>
            <td colspan="5"></td>
          </tr>
        </table>
      </div>
      <div class="row col-md-offset-3 work-row">
        <form action="/index.php/register/customer" method="post" name="register-customer-form">
        <?php
        	if($this->session->userdata('customer')){
        ?>
          <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>고객정보수정</button>
          <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>총방문내역</button>
          <button type="submit" class="btn btn-default" onclick="deleteCustomer()"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>삭제</button>
          <input type="hidden" name="class" value="select" id="register-class-input">
        <?php
            foreach($customer as $key => $value) {
                echo form_hidden($key, $value);
            }
            echo form_hidden("postclass", "");
          } else {
        ?>
          <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>신규고객</button>
        <?php
          }
         ?>
         </form>
      </div>
      <div class="row work-row">
        <span class="glyphicon glyphicon-play-circle work-item-icon" aria-hidden="true"></span>
        시술등록
        <form action="/index.php" method="post" name="register-work-form">
          <table class="table table-bordered" id="customer-info-table">
            <thead>
              <tr id="work-register-table-head">
                <th style="width:10%">구분</th>
                <th style="width:10%">디자인</th>
                <th style="width:10%">담당자</th>
                <th style="width:10%">결제금액</th>
                <th style="width:20%">시술일시</th>
              </tr>
            </thead>
            <tbody>

              <tr>
                <td>
                  <select class="form-control" name="design1_id" onchange="selectDesign1(this)" id="design1_selector">
                    <option class="placeholder" selected disabled value="">선택하세요</option>
                    <?php
                      foreach($design1s_array as $key => $value) {
                        $design1_function = 'selectDesign1('.$key.')';
                        echo "<option value=".$key.">".$value['name']."</option>";
                      }
                    ?>
                  </select>
                </td>
                <td>
                  <select class="form-control" name="design2_id" value="" onchange="selectDesign2(this)" id="design2_selector">
                    <option class="placeholder" selected disabled value="">선택하세요</option>
                  </select>
                </td>
                <td>
                </td>
                <td><input type="text" class="form-control" name="price" id="work-price-input"></td>
                <td><input type="text" class="form-control" name="date" value="<?= date('Y-m-d')?>"></td>
              </tr>
              <tr>
                <th valign="center" id="work-register-table-head">메모</th>
                <td colspan="5">
                  <div class="form-inline">
                    <input type="text" class="form-control" style="margin-right:10px; width:600px" name = "memo">
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>시술입력</button>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <?php
            if(!is_null($customer)) {
                echo form_hidden("customer_id",$customer["id"]);
            }
          ?>
        </form>
      </div>
      <?php
        if(!is_null($customer)) {
            $this->load->view('worktable', array('works'=>$works, "design1s_array"=>$design1s_array, "design2s_array"=>$design2s_array));
        }
      ?>
    </div>
  </div>
</div>
