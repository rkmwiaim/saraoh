<div class="row" style="margin-bottom:30px">
  <span class="glyphicon glyphicon-play-circle work-item-icon" aria-hidden="true"></span>
  직원등록
  <form action="/index.php/register/staff" method="post" name="register-staff-form">
    <table class="table table-bordered" id="register-staff-table">
      <tbody>
        <tr>
          <th>성명</th>
          <td  style="width:120px"><input type="text" class="form-control" name="name" value="<?= isset($staff)?$staff->name:''?>"></td>
          <th>전화번호</th>
          <td><input type="text" class="form-control" name="phone_number" value="<?= isset($staff)?$staff->phone_number:''?>"></td>
          <?php
          if(isset($staff)) {
            echo "<td>";
            echo '<button type="button" class="btn btn-default" onclick=modifyStaff('.$staff->id.')><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>수정</button>';
            echo '<button type="button" class="btn btn-default" onclick=deleteStaff('.$staff->id.')><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>삭제</button>';
            echo '</td>';
          } else {
              echo '<td><button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>등록</button></td>';
          }
           ?>
        </tr>
      </tbody>
    </table>
    <input type="hidden" name="id" id="register-staff-id-input">
    <input type="hidden" name="type" value="insert" id="staff-type-input">
  </form>
</div>
<div class="row">
  <span class="glyphicon glyphicon-play-circle work-item-icon" aria-hidden="true"></span>
  근무직원현황
  <table class="table table-bordered" id="staff-table">
    <thead>
      <tr>
        <th></th>
        <th>성명</th>
        <th>전화번호</th>
      </tr>
    </thead>
    <tbody align="center">
      <form action="/index.php/register/staff" method="post" name="staff-form">
        <?php
          if(!is_null($staffs)) {
            foreach($staffs as $cur) {
              echo "<tr onclick='selectStaff($cur->id)'>";
              if(isset($staff) && $staff->id == $cur->id) {
                echo '<td><input type="radio" checked></td>';
              } else {
                echo '<td><input type="radio"></td>';
              }
              echo "<td>".$cur->name."</td>";
              echo "<td>".$cur->phone_number."</td>";
              echo "</tr>";
            }
          }
         ?>
         <input type="hidden" name="id" id="staff-id-input">
         <?php echo form_hidden("type","select"); ?>
      </form>
    </tbody>
  </table>

</div>
