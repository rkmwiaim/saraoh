<div class="col-md-5">
    <span class="glyphicon glyphicon-play-circle work-item-icon" aria-hidden="true"></span>
    1차 디자인 등록
    <form action="/index.php/register/design" method="post" name="register-design1-form" id="register-design1-form">
      <table class="table">
        <tr>
          <td class="register-design-table-head">
            1차<br />디자인명
          </td>

          <?php
          if(is_null($this->input->post('design1-id'))) {
              echo '<td class="register-design-table-body"><input type="text" class="form-control" name="name"></td>';
          } else {
             $design1_checked = FALSE;
              foreach ($design1s as $key => $value) {
                if($value->id === $this->input->post('design1-id')) {
                    echo '<td class="register-design-table-body"><input type="text" class="form-control" name="name" value="'.$value->name.'"></td>';
                    $design1_checked = TRUE;
                }
              }
              if(!$design1_checked) {
                  echo '<td class="register-design-table-body"><input type="text" class="form-control" name="name"></td>';
              }
          }
          ?>
          <td rowspan="3" class="register-design-table-body" style="width:10%;vertical-align:middle">
            <?php
            if ($this->input->post("class") == "select-design1" || $this->input->post('class') == "update-design1"){
              echo '<button type="button" class="btn btn-default" onclick="updateDesign1('.$this->input->post("design1-id").')"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>수정</button>';
              echo '<button type="button" class="btn btn-default" onclick="deleteDesign1('.$this->input->post("design1-id").')"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>삭제</button>';
            } else {
              echo '<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>등록</button>';
            }
            ?>
          </td>
        </tr>
      </table>
      <input type="text" class="form-control" style="display:none" name="class" value="register-design1" id='design1-class-input'>
      <input type="text" class="form-control" style="display:none" name="design1-id" value="<?=$this->input->post('design1-id')?>" id='design1-id-input'>
    </form>
    <?php
    echo '<select class="form-control" multiple data-width="100%" title="항목을 선택 후 사용하세요" id="mySel" form="register-design1-form" name="design1" size="'.count($design1s).'">';
    foreach ($design1s as $key => $value) {
      echo "<option onclick='selectDesign1(".$value->id.")' value=".$value->id.">".$value->name."</option>";
    }
   ?>
    </select>
  </div>
  <?php
  ?>
  <div class="col-md-7">
      <span class="glyphicon glyphicon-play-circle work-item-icon" aria-hidden="true"></span>
      2차 디자인 등록
      <form action="/index.php/register/design" method="post" name="register-design2-form">
        <table class="table">
          <tr>
            <td class="register-design-table-head">
              2차 디자인명
            </td>
            <td class="register-design-table-body" style="width:25%"><input type="text" class="form-control" value="<?=$design2_name?>" name="design2-name"></td>
            <td class="register-design-table-head" style="width:10%">
              디자인 가격
            </td>
            <td class="register-design-table-body" style="width:20%"><input type="text" class="form-control" value="<?=$design2_price?>" name="design2-price"></td>
            <td class="register-design-table-body">
              <div class="btn-toolbar">
                <?php
                if(isset($design2s)) {
                  if($design2_id == "") {
                    echo '<button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>등록</button>';
                  } else {
                    echo '<button type="button" class="btn btn-default" onclick="updateDesign2('.$design2_id.')"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>수정</button>';
                    echo '<button type="button" class="btn btn-default" onclick="deleteDesign2('.$design2_id.')"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>삭제</button>';
                  }
                }
                ?>
              </div>
            </td>
          </tr>
        </table>
        <input type="text" class="form-control" style="display:none" name="class" value="select-design1">
        <input type="text" class="form-control" style="display:none" name="design1-id" value="<?=$this->input->post('design1-id')?>">
        <input type="text" class="form-control" style="display:none" name="design2-class" value="register-design2" id='design2-class-input'>
        <input type="text" class="form-control" style="display:none" name="design2-id" value="" id='design2-id-input'>
      </form>
      <table class="table table-bordered" id="design2-table">
        <tr>
          <th class="register-design-table-head"></th>
          <th class="register-design-table-head">2차 디자인명</th>
          <th class="register-design-table-head">디자인가격</th>
          <th class="register-design-table-head">정렬순서</th>
        </tr>
        <?php
        $dd = 1;
        if(isset($design2s)) {
          foreach($design2s as $key => $value) {
            echo '
              <tr onclick="selectDesign2('.$value->id.')">
                <td class="design2-table-radio-column">
                  <input type="radio" name="design2-radio" value="'.$value->id.'" '.((!is_null($design2_id) && $design2_id == $value->id) ? 'checked' : '').'>
                </td>
                <td>'.$value->name.'</td>
                <td>'.$value->price.'</td>
                <td></td>
              </tr>
            ';
          }
        }
        ?>
      </table>
  </div>
