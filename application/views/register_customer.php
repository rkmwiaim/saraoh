<div class="row">
  <span class="glyphicon glyphicon-play-circle work-item-icon" aria-hidden="true"></span>
  고객검색
</div>
<div class="row" style="padding-bottom:20px;">
  <?php $this->load->view('search_customer_bar'); ?>
</div>

<?php
  if(!is_null($this->input->post('customer-search-select'))) {
    echo '<div class="row">
      <span class="glyphicon glyphicon-play-circle work-item-icon" aria-hidden="true"></span>
      검색된 고객명단
    </div>
    <div class="row">
      <table class="table table-bordered" id="register-customer-search-result-table">
        <thead>
          <tr>
            <td>성명</td>
            <td>담당자</td>
            <td>전화번호</td>
            <td>회원권</td>
            <td>최종디자인</td>
            <td>최초방문일</td>
            <td>최종방문일</td>
            <td>메모</td>
            <td></td>
          </tr>
        </thead>
        <tbody>
        ';
        if(isset($customers)) {
          if(count($customers) > 0) {
            foreach($customers as $key => $value) {
              $customerData = array(
                "id" => $value->id,
                "name" => $value->name,
                "phone_number" => $value->phone_number,
                "membership" => $value->membership,
                "last_design2" => $value->last_design2,
                "first_visit_date" => $value->first_visit_date,
                "last_visit_date" => $value->last_visit_date,
                "memo" => $value->memo,
              );
              echo '
              <form action="/index.php/register/customer" method="post" name="modify-customer-form'.$value->id.'">
                <tr onclick="selectCustomer('.$value->id.')">
                  <td>'.$value->name.'</td>
                  <td></td>
                  <td>'.$value->phone_number.'</td>
                  <td>'.$value->membership.'</td>
                  <td>'.$value->last_design2.'</td>
                  <td>'.$value->first_visit_date.'</td>
                  <td>'.$value->last_visit_date.'</td>
                  <td>'.$value->memo.'</td>
                  <td></td>
                  '.form_hidden($customerData).'
                  <input type="hidden" name="class" value="select" id="customer-select-input">
                </tr>
                </form>';
            }
          } else {
            echo '<tr><td colspan="9">검색된 고객이 없습니다.</td></tr>';
          }
        }
        echo '
        </tbody>
      </table>
    </div>';
  } else {
    $class = $this->input->post('class');
    $classValue = ($class == "modify" || $class == "select") ? "modify" : "register";
    $modifyOrRegister = ($class == "modify" || $class == "select") ? "수정" : "등록";
    $name = ($class == "register" || $class == "delete") ? "" : set_value("name");
    $phone_number = ($class == "register" || $class == "delete") ? "" : set_value("phone_number");
    $first_visit_date = ($class == "register" || $class == "" || $class == "delete") ? date("Y-m-d") : set_value("first_visit_date");

    $post_work_function = "modifyCustomer('work')";
    $post_register_function = "modifyCustomer('register')";

    echo '<div class="row"><span class="glyphicon glyphicon-play-circle work-item-icon" aria-hidden="true"></span>고객';
    echo $modifyOrRegister;
    echo '</div>
    <div class="row">
      <form action="/index.php/register/customer" method="post" name="register-customer-form">
        <table class="table table-bordered" id="customer-search-result">
          <tr>
            <th>성명</th>
            <td><input type="text" class="form-control" name="name" value="'.$name.'"></td>
            <th>전화번호</th>
            <td style="width:130px;color:grey;text-align:center"><input type="text" class="form-control" name="phone_number" value="'.$phone_number.'">(예:0102221111)</td>
            <th>최초방문일</th>
            <td style="width:160px;color:grey;text-align:center"><input type="text" class="form-control" name="first_visit_date" value="'.$first_visit_date.'"> (예:YYYY-MM-DD)</td>
            <th>담당자</th>
            <td><input type="text" class="form-control" name="staff"></td>
            <th>회원권</th>
            <td><div class="checkbox"><label><input type="checkbox" name="membership"></label></div></td>
          </tr>
          <tr>
            <th>참고사항</th>
            <td colspan="9"><input type="text" class="form-control"></td>
          </tr>
        </table>
        <div class="text-center">';
        if($class == "modify" || $class == "select") {
          echo '
          <div class="btn-group">
            <button type="button" class="btn btn-default" style="color:#C98B47"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
            <button type="submit" class="btn btn-default"><span style="color:#FF6C00">수정완료</span></button>
          </div>';
        }
        echo '
          <div class="btn-group" onclick="'.$post_work_function.'">
            <button type="button" class="btn btn-default" style="background-color:#FFFFE1; color:#FC7C0B"><span class="glyphicon glyphicon-plus"></span></button>
            <button type="button" class="btn btn-default" style="background-color:#FFFFE1">고객 '.$modifyOrRegister.' 후 <span style="color:#CE3C00">시술 영업입력</span></button>
          </div>
          <div class="btn-group" onclick="'.$post_register_function.'">
            <button type="button" class="btn btn-default" style="color:#58B7A4"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></button>
            <button type="button" class="btn btn-default">고객 '.$modifyOrRegister.' 후 <span style="color:#E4A623">추가 고객등록</span></button>
          </div>
        </div>
        <input type="hidden" name="postclass" value="'.$classValue.'" id="customer-modify-postclass-input">
        '.form_hidden("class", $classValue).'
        '.form_hidden("id", $this->input->post("id")).'
      </form>
    </div>';
  }
?>
