<div class="row">
  <div class="col-md-2">
    <img src="/static/img/logo.png" alt="이미지를 찾을 수 없습니다." class="img-thumbnail">
  </div>
  <div class="col-md-10">
      <div class="row">
          <form class="navbar-form navbar-left" role="search" action="/index.php/register/customer" method="post">
              <img src="/static/img/search.jpg" alt="이미지를 찾을 수 없습니다." class="img-circle" style="height:20px">
              <strong style="margin-right:4px">빠른검색</strong>
              <select class="form-control name-select" name="customer-search-select">
                <option value="name">성명</option>
                <option value="phone_number">전화번호</option>
                <option value="memo">참고</option>
              </select>
              <input type="text" class="form-control" name="customer-search-query" onkeydown="searchOn(event)">
              <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right bar-button-triangle" aria-hidden="true"></span>검색</button>
              <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right bar-button-triangle" aria-hidden="true"></span>손님</button>
              <?php
                $this->load->helper('form');
                echo form_hidden("class","search");
                echo form_hidden("from","fast-search");
              ?>
          </form>
      </div>
      <div class="row">
          <form class="navbar-form navbar-left <?php if(empty($class)) echo "blue-gradient"; else echo "green-gradient" ?>" id="menubar">
            <a class="navbar-brand" href="/">영업</a>
            <a class="navbar-brand" href="/index.php/register/customer">등록</a>
          </form>
      </div>
  </div>
</div>
