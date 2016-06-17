
    </div>
     <script src="/static/lib/jquery.min.js"></script>
     <script src="/static/lib/bootstrap/js/bootstrap.min.js"></script>
     <script src="/static/lib/bootstrap-select/bootstrap-select.min.js"></script>
     <script src="/static/js/pagination.js"></script>
     <script>
     var checkMembership = function(selected) {
       var value = $(selected).val();
       if(value == 1) {
          $(selected).val(0);
       } else {
         $(selected).val(1);
       }
     }

     var searchOn = function(event) {
       if(event.target.value === "") {
         var code = event.keyCode;
         if ((code >= 48 && code <= 57) || (code >= 96 && code <= 105)) {
           $(".name-select", event.target.parentNode).val("phone_number");
         } else {
           $(".name-select", event.target.parentNode).val("name");
         }
       }
     }

     var searchOnInPage = function(event) {
       if(event.target.value === "") {
         var phone_radio = document.getElementById("search-select-phone");
         var name_radio = document.getElementById("search-select-name");
         var etc_radio = document.getElementById("search-select-etc");
         var code = event.keyCode;
         if ((code >= 48 && code <= 57) || (code >= 96 && code <= 105)) {
           phone_radio.checked = true;
           name_radio.checked = false;
           etc_radio.checked = false;
         } else {
           phone_radio.checked = false;
           name_radio.checked = true;
           etc_radio.checked = false;
         }
         console.log(code);
     }
   }

     var phoneFormatter = function(rawString) {
       var number = rawString.replace(/[^\d]/g, '');
       if (number.length == 7) {
         number = number.replace(/(\d{3})(\d{4})/, "$1-$2");
       } else if (number.length == 10) {
         number = number.replace(/(\d{3})(\d{3})(\d{4})/, "$1-$2-$3");
       } else if (number.length == 11) {
         number = number.replace(/(\d{3})(\d{4})(\d{4})/, "$1-$2-$3");
       }
       return number;
     }

     var formatPhone = function() {
       var phoneNumbers = document.getElementsByClassName("phone_number");
       for(var i = 0; i < phoneNumbers.length; i++) {
         var original = phoneNumbers[i].innerText;
         phoneNumbers[i].innerText = phoneFormatter(original);
       }
     }
     formatPhone();

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

        //staff functions
        var selectStaff = function(staff_id) {
          document.getElementById('staff-id-input').value = staff_id;
          document.forms["staff-form"].submit();
        }

        var modifyStaff = function(staff_id) {
          document.getElementById('register-staff-id-input').value = staff_id;
          document.getElementById('staff-type-input').value = "modify";
          document.forms["register-staff-form"].submit();
        }

        var deleteStaff = function(staff_id) {
          document.getElementById('register-staff-id-input').value = staff_id;
          document.getElementById('staff-type-input').value = "delete";
          document.forms["register-staff-form"].submit();
        }
     </script>
   </body>
</html>
