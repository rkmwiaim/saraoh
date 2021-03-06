<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	 <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">

	 <link href="/static/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	 <link rel="stylesheet" href="/static/lib/bootstrap-select/bootstrap-select.min.css">
   <link href="/static/css/style.css" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="col-md-10">
		<div class="container-fluid">
	    <div class="row" style="margin-top:20px;margin-bottom:20px">
	      <span class="glyphicon glyphicon-play-circle work-item-icon" aria-hidden="true"></span>
	      고객종합정보
	      <table class="table table-bordered">
	        <tr>
	          <th>성명</th>
	          <th>전화번호</th>
	          <th>총영업금액</th>
	          <th>방문주기</th>
	        </tr>
	        <tr>
	          <td><?=$customer['name']?></td>
	          <td><?=$customer['phone_number']?></td>
	          <td>총영업금액</td>
	          <td>방문주기</td>
	        </tr>
	      </table>
	    </div>
    	<?php $this->load->view('worktable', array('works'=>$works, "design1s_array"=>$design1s_array, "design2s_array"=>$design2s_array, "staffs_array"=>$staffs_array)) ?>
		</div>
  </div>
   <script src="/static/lib/jquery.min.js"></script>
   <script src="/static/lib/bootstrap/js/bootstrap.min.js"></script>
   <script src="/static/lib/bootstrap-select/bootstrap-select.min.js"></script>
   <script src="/static/js/pagination.js"></script>
   <script>
   $(document).ready(function(){
     $('#work-table-body').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:15});
   });
   var backToWork = function() {
     var parent_window = window.opener;
     if (parent_window && !parent_window.closed) {
       parent_window.location.href="/"
       window.close();
     }
   }
	 var selectWork = function(bundle_id) {
			var inputElem = document.getElementById("bundle-id-input");
			inputElem.value = bundle_id;
			var bundleForm = document.modify_work_form;
		 window.open('','bundleView','width=1400,height=500,menu=0,status=0');

		 bundleForm.target="bundleView";
		 bundleForm.bundle_id = bundle_id;
		 bundleForm.submit();
	 }
   </script>
</body>
</html>
