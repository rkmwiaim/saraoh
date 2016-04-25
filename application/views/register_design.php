<div class="col-md-7">
  <div class="row">
    <div class="col-md-5">
        <span class="glyphicon glyphicon-play-circle work-item-icon" aria-hidden="true"></span>
        1차 디자인 등록
        <table class="table">
          <tr>
            <td class="register-design-table-head">
              1차<br />디자인명
            </td>
            <td class="register-design-table-body"><input type="text" class="form-control"></td>
            <td rowspan="3" class="register-design-table-body" style="width:10%;vertical-align:middle">
              <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>수정</button>
              <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>삭제</button>
            </td>
          </tr>
          <tr>
            <td class="register-design-table-head">
              방문주기
            </td>
            <td class="register-design-table-body">
              <div class="form-inline">
                <input type="text" class="form-control" style="width:40px">일~<input type="text" class="form-control" style="width:40px">일
              </div>
            </td>
          </tr>
          <tr>
            <td class="register-design-table-head">
              포인트</br>적용여부
            </td>
            <td class="register-design-table-body">
              <div class="form-inline" style="padding-top:10px;">
                <div class="radio">
                  <label>
                    <input type="radio" name="design1-point-select" value="1" id="design1-point-true" checked>
                    적용
                  </label>
                </div>
                <div class="radio">
                  <label>
                    <input type="radio" name="design1-point-select" value="2" id="design1-point-false">
                    미적용
                  </label>
                </div>
              </div>
            </td>
          </tr>
        </table>
        <select class="selectpicker" data-width="100%" title="항목을 선택 후 사용하세요" id="mySel">
          <option>컷</option>
          <option>펌</option>
          <option>열펌</option>
        </select>
      </div>
      <div class="col-md-7">
          <span class="glyphicon glyphicon-play-circle work-item-icon" aria-hidden="true"></span>
          2차 디자인 등록
          <table class="table">
            <tr>
              <td class="register-design-table-head">
                2차 디자인명
              </td>
              <td class="register-design-table-body" style="width:25%"><input type="text" class="form-control"></td>
              <td class="register-design-table-head" style="width:10%">
                디자인 가격
              </td>
              <td class="register-design-table-body" style="width:20%"><input type="text" class="form-control"></td>
              <td class="register-design-table-body">
                <div class="btn-toolbar">
                  <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>수정</button>
                  <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>삭제</button>
                </div>
              </td>
            </tr>
          </table>
          <table class="table table-bordered" id="design2-table">
            <tr>
              <th class="register-design-table-head"></th>
              <th class="register-design-table-head">2차 디자인명</th>
              <th class="register-design-table-head">디자인가격</th>
              <th class="register-design-table-head">정렬순서</th>
            </tr>
            <tr>
              <td class="design2-table-radio-column">
                <input type="radio" name="design2-radio" value="1">
              </td>
              <td>컷</td>
              <td>0원</td>
              <td></td>
            </tr>
            <tr>
              <td class="design2-table-radio-column">
                <input type="radio" name="design2-radio" value="2">
              </td>
              <td>컷</td>
              <td>0원</td>
              <td></td>
            </tr>
            <tr>
              <td class="design2-table-radio-column">
                <input type="radio" name="design2-radio" value="3">
              </td>
              <td>컷</td>
              <td>0원</td>
              <td></td>
            </tr>
      </div>
    </div>
</div>
