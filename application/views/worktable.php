<div class="row work-row">
  <span class="glyphicon glyphicon-play-circle work-item-icon" aria-hidden="true"></span>
  시술영업내역
  <!-- <div  style="height:250px; overflow:auto"> -->
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
      <tbody id="work-table-body">
        <?php
          if(isset($works)) {
            foreach($works as $key => $work) {
              echo "<tr>";
              echo "<td>".$work->date."</td>";
              echo "<td>".$design1s_array[$work->design1_id]['name']."</td>";
              echo "<td>".$design2s_array[$work->design2_id]['name']."</td>";
              // echo "<td>".$work->staff."</td>";
              echo "<td></td>";
              echo "<td>".$work->price."</td>";
              echo "<td>".$work->memo."</td>";
              echo "</tr>";
            }
          }
         ?>
      </tbody>
    </table>
      <div class="text-center">
        <ul class="pagination" id="myPager"></ul>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>영업입력</button>
        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>닫기</button>
      </div>
  </div>

</div>
