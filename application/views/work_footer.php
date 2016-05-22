
    </div>
     <script src="/static/lib/jquery.min.js"></script>
     <script src="/static/lib/bootstrap/js/bootstrap.min.js"></script>
     <script src="/static/lib/bootstrap-select/bootstrap-select.min.js"></script>
     <script src="/static/js/pagination.js"></script>
     <script>
     var deleteCustomer = function() {
       document.getElementById('register-class-input').value="delete";
       document.forms["register-customer-form"].submit();
     }

     <?php

     $temp = array();
      foreach($design2s as $key => $value) {
        $design1_id = $value->design1_id;
        if(!array_key_exists($design1_id,$temp)) {
          $temp[$design1_id] = array();
        }
        $temp[$design1_id][$value->id] = get_object_vars($value);
      }
      ?>

      var a = 1;
      var js_text = '<?php echo json_encode($temp); ?>';
      var design2s = JSON.parse(js_text);

     var selectDesign1 = function(selected) {
       var design2_selector = document.getElementById("design2_selector");
       while ( design2_selector.hasChildNodes() )
        {
             design2_selector.removeChild( design2_selector.firstChild );
        }
        var selected_design2s = design2s[selected.value];
        var defaultOp = document.createElement("option");
        design2_selector.appendChild(defaultOp);
        defaultOp.setAttribute("selected","");
        defaultOp.setAttribute("disabled","");
        defaultOp.setAttribute("value","");
        defaultOp.setAttribute("class","placeholder");
        defaultOp.appendChild(document.createTextNode("선택하세요"));
        // <option class="placeholder" selected="" disabled="" value="">선택하세요</option>
        for (var design2_id in selected_design2s) {
          var design2 = selected_design2s[design2_id];
          var op = document.createElement("option");
          design2_selector.appendChild(op);
          op.value = design2_id;
          op.appendChild(document.createTextNode(design2['name']));
        }

        document.getElementById('work-price-input').value = "";
     }

     var selectDesign2 = function(selected) {
       var design1_selector = document.getElementById("design1_selector");
       var design1_id = design1_selector.options[design1_selector.selectedIndex].value;
       document.getElementById('work-price-input').value = design2s[design1_id][selected.value]["price"];
     }

     </script>
   </body>
</html>
