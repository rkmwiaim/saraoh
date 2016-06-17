<form class="navbar-form navbar-left" id="<?=$header?>customer-search-bar" action="/index.php/register/customer" method="post">
  <div class="form-group">
  <div class="radio customer-select-radio">
    <label>
      <input type="radio" name="customer-search-select" id="search-select-phone" value="phone_number" checked>
      전화번호
    </label>
  </div>
  <div class="radio customer-select-radio">
    <label>
      <input type="radio" name="customer-search-select" id="search-select-name" value="name">
      성명
    </label>
  </div>
  <div class="radio customer-select-radio">
    <label>
      <input type="radio" name="customer-search-select" id="search-select-etc" value="memo">
      참고
    </label>
  </div>
  <?php
    if(isset($from) && ($from == "work")) {
      echo form_hidden("from","work");
    }
   ?>
  <input type="text" name="customer-search-query" class="form-control" style="margin-left:10px; margin-right:20px;" onkeydown="searchOnInPage(event)">
  <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>검색</button>
  <button type="button" class="btn btn-default" onclick="window.location.href='/index.php/register/customer';"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>신규고객</button>
  <button type="button" class="btn btn-default"><span class="glyphicon glyphicon-triangle-right button-triangle" aria-hidden="true"></span>손님</button>
  <button type="button" class="btn btn-default" style="visibility:hidden; margin-right:400px;"></button>
  <input type="text" style="visibility:hidden" value="search" name="class">
  </div>
</form>
