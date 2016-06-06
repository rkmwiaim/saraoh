<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>checker</title>
<link href="lib/bootstrap.min.css" rel="stylesheet">
</head>

<body id="check-body">
<div class="container" >
    <input type="text" class="form-control" id="target" style="width:300px">
    <button type="button" class="btn btn-default" onclick="check()">확인</button>
</div>
</body>
<script src="lib/jquery.min.js"></script>
<script src="lib/bootstrap.min.js"></script>
<script src="lib/spin.min.js"></script>
<script>
  var body = document.getElementById("check-body");
  var spinner = new Spinner()
	var check = function(selected) {
    spinner.spin(body);
    $.ajax({
            url:'./check_exec.php',
            type:'post',
            data:{"target" : $("#target").val()},
            success:function(data){
                spinner.stop();
                if(data == "eu") {
                  alert("이미 사용중입니다.");
                } else if(data == "e") {
                  alert("사용 가능합니다.")
                } else {
                  alert("존재하지 않는 번호입니다.")
                }

            },
            error : function(jqXHR, textStatus, errorThrown){
              alert(jqXHR, textStatus, errorThrown);
            }
        })
	}
</script>
</html>
