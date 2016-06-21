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
    <div class="container">
          <div class="col-md-4">
              <form action="<?=base_url()?>index.php/login" method="post">
                  <div class="form-group">
                      <label for="input-id">ID</label>
                      <input type="text" class="form-control" id="input-id" placeholder="id" name="id">
                  </div>
                  <div class="form-group">
                      <label for="input-password">password</label>
                      <input type="password" class="form-control" id="input-password" placeholder="password" name="password">
                  </div>
                  <div class="text-center">
                      <button type="submit" class="btn btn-default">제출</button>
                  </div>
              </form>
          </div>
      </div>

   <script src="/static/lib/jquery.min.js"></script>
   <script src="/static/lib/bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
