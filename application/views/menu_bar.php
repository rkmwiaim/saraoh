<div class="row">
  <div class="col-md-2">
    <img src="/static/img/logo.png" alt="이미지를 찾을 수 없습니다." class="img-thumbnail">
  </div>
  <div class="col-md-10">
      <div class="row">
          <form class="navbar-form navbar-left" role="search">
              <img src="/static/img/search.jpg" alt="이미지를 찾을 수 없습니다." class="img-circle" style="height:20px">
              <strong style="margin-right:4px">빠른검색</strong>
              <select class="form-control" name="category">
                <option value="0">전화</option>
                <option value="1">성명</option>
                <option value="2">휴대폰</option>
                <option value="3">휴대폰뒷</option>
                <option value="4">전화+휴대폰</option>
                <option value="5">참고</option>
                <option value="6">번호</option>
              </select>
              <input type="text" class="form-control">
              <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right bar-button-triangle" aria-hidden="true"></span>검색</button>
              <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right bar-button-triangle" aria-hidden="true"></span>손님</button>
          </form>
      </div>
      <div class="row">
          <form class="navbar-form navbar-left <?php if(empty($class)) echo "blue-gradient"; else echo "green-gradient" ?>" id="menubar">
            <a class="navbar-brand" href="">영업</a>
            <a class="navbar-brand" href="">등록</a>
          </form>
      </div>
  </div>
</div>
