<div class="col-md-7">
    <div class="row work-row">
      <span class="glyphicon glyphicon-play-circle" aria-hidden="true" style="color:#DD7688"></span>
      영업 > 시술입력
      <div class="horizontal-seperator">
      </div>
      <form class="navbar-form navbar-left" id="customer-search-bar">
        <div class="form-group">
        <div class="radio customer-select-radio">
          <label>
            <input type="radio" name="customer-search-select" id="search-select-home" value="1">
            전화
          </label>
        </div>
        <div class="radio customer-select-radio">
          <label>
            <input type="radio" name="customer-search-select" id="search-select-name" value="2">
            성명
          </label>
        </div>
        <div class="radio customer-select-radio">
          <label>
            <input type="radio" name="customer-search-select" id="search-select-phone" value="3">
            휴대폰
          </label>
        </div>
        <div class="radio customer-select-radio">
          <label>
            <input type="radio" name="customer-search-select" id="search-select-etc" value="4">
            참고
          </label>
        </div>
        <input type="text" class="form-control" style="margin-left:10px; margin-right:20px;">
        <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>검색</button>
        <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>신규고객</button>
        <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>손님</button>
        <button type="button" class="btn btn-default" style="visibility:hidden; margin-right:200px;"></button>
        </div>
      </form>
    </div>
    <div class="row">
      <span class="glyphicon glyphicon-play-circle work-item-icon" aria-hidden="true"></span>
      고객정보
      <table class="table table-bordered" id="customer-info-table">
        <tr>
          <td class="customer-info-table-head">성명</td>
          <td></td>
          <td class="customer-info-table-head">전화번호</td>
          <td></td>
          <td class="customer-info-table-head emphasis-cell">회원권</td>
          <td class="emphasis-cell"></td>
        </tr>
        <tr>
          <td class="customer-info-table-head">최초방문</td>
          <td></td>
          <td class="customer-info-table-head">최종방문</td>
          <td></td>
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
      <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>고객정보수정</button>
      <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>대기고객등록</button>
      <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>총방문내역</button>
      <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>삭제</button>
    </div>
    <div class="row work-row">
      <span class="glyphicon glyphicon-play-circle work-item-icon" aria-hidden="true"></span>
      시술등록
      <table class="table table-bordered" id="customer-info-table">
        <thead>
          <tr id="work-register-table-head">
            <th style="width:10%">구분</th>
            <th style="width:10%">디자인</th>
            <th style="width:10%">담당자</th>
            <th style="width:10%">시술금액</th>
            <th style="width:10%">결제금액</th>
            <th style="width:20%">시술일시</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <select class="form-control" name="design1">
                <option value="0">컷</option>
                <option value="1">펌</option>
                <option value="2">열펌</option>
              </select>
            </td>
            <td>
              <select class="form-control" name="design2">
                <option value="0">컷</option>
                <option value="1">펌</option>
                <option value="2">열펌</option>
              </select>
            </td>
            <td>
              <select class="form-control" name="charger">
                <option value="0">사라오</option>
                <option value="1">영휘</option>
                <option value="2">광철</option>
              </select>
            </td>
            <td><input type="text" class="form-control"></td>
            <td><input type="text" class="form-control"></td>
            <td><input type="text" class="form-control"></td>
          </tr>
          <tr>
            <th valign="center" id="work-register-table-head">메모</th>
            <td colspan="5">
              <div class="form-inline">
                <input type="text" class="form-control" style="margin-right:10px;">
                <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>시술입력</button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="row work-row">
      <span class="glyphicon glyphicon-play-circle work-item-icon" aria-hidden="true"></span>
      최근 5회 시술영업내역
      <table class="table table-bordered" id="last-works-table">
        <thead>
          <th>날짜</th>
          <th>구분</th>
          <th>디자인</th>
          <th>담당자</th>
          <th>시술금액</th>
          <th>결제금액</th>
          <th>메모</th>
        </thead>
        <tbody>
        </tbody>
      </table>
    </div>
</div>
