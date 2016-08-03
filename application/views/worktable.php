<div class="row work-row">
  <span class="glyphicon glyphicon-play-circle work-item-icon" aria-hidden="true"></span>
  시술영업내역
  <div>
    <table class="table table-bordered" id="last-works-table">
      <thead>
        <th>날짜</th>
        <th>구분</th>
        <th>디자인</th>
        <th>담당자</th>
        <th>결제금액</th>
        <th>메모</th>
      </thead>
      <form action="/index.php/work" method="post" name="modify_work_form">
        <tbody id="work-table-body">
          <?php
            if(isset($works)) {
              foreach($works as $key => $work) {
                echo "<tr onclick=selectWork(".$work->bundle_id.")>";
                echo "<td>".date("Y-m-d", strtotime($work->date))."</td>";
                echo "<td>".$design1s_array[$work->design1_id]['name']."</td>";
                echo "<td>".$design2s_array[$work->design2_id]['name']."</td>";
                $staff_id = $work->staff_id;
                echo "<td>".$staffs_array[$staff_id]["name"]."</td>";
                echo "<td>".$work->price."</td>";
                echo "<td>".$work->memo."</td>";
                echo "</tr>";
              }
            }
           ?>
        </tbody>
        <input type="hidden" name="bundle-id" id="bundle-id-input">
        <?= form_hidden("type", "select")?>
      </form>
    </table>
      <div class="text-center">
        <ul class="pagination" id="myPager"></ul>
      </div>
      <?php
        if(!isset($from)) {
      ?>
      <div class="text-center">
        <button type="button" class="btn btn-default" onclick="backToWork()"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>영업입력</button>
        <button type="button" class="btn btn-default" onclick="window.close()"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>닫기</button>
      </div>
      <?php  } ?>
  </div>

</div>
