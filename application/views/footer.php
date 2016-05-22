
    </div>
     <script src="/static/lib/jquery.min.js"></script>
     <script src="/static/lib/bootstrap/js/bootstrap.min.js"></script>
     <script src="/static/lib/bootstrap-select/bootstrap-select.min.js"></script>
     <script src="/static/js/pagination.js"></script>
     <script>
     //customer functions
       var registerCustomer = function() {
         document.forms["register-customer-form"].action = "/index.php/work";
         document.forms["register-customer-form"].submit();
       }

       var selectCustomer = function(customer_id) {
         document.forms["modify-customer-form" + customer_id].submit();
       }

       var modifyCustomer = function(postclass) {
         document.getElementById('customer-modify-postclass-input').value = postclass;
         document.forms["register-customer-form"].submit();
       }

       // design2 functions
        var selectDesign1 = function(design1_id) {
          document.getElementById('design1-class-input').value = "select-design1";
          document.getElementById('design1-id-input').value = design1_id;
          document.forms["register-design1-form"].submit();
        }

        var deleteDesign1 = function(design1_id) {
          document.getElementById('design1-class-input').value = "delete-design1";
          document.getElementById('design1-id-input').value = design1_id;
          document.forms["register-design1-form"].submit();
        }

        var updateDesign1 = function(design1_id) {
          document.getElementById('design1-class-input').value = "update-design1";
          document.getElementById('design1-id-input').value = design1_id;
          document.forms["register-design1-form"].submit();
        }



        // design2 functions
        var selectDesign2 = function(design2_id) {
          document.getElementById('design2-class-input').value = "select-design2";
          document.getElementById('design2-id-input').value = design2_id;
          document.forms["register-design2-form"].submit();
        }

        var deleteDesign2 = function(design2_id) {
          document.getElementById('design2-class-input').value = "delete-design2";
          document.getElementById('design2-id-input').value = design2_id;
          document.forms["register-design2-form"].submit();
        }

        var updateDesign2 = function(design2_id) {
          document.getElementById('design2-class-input').value = "update-design2";
          document.getElementById('design2-id-input').value = design2_id;
          document.forms["register-design2-form"].submit();
        }
     </script>
   </body>
</html>
