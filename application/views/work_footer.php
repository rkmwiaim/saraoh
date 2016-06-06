
    <table>
      <tbody style="display:none" id="hidden-tbody">
        <?php $this->load->view('register_work_bar', array("design1s_array"=>$design1s_array, "staffs_array"=>$staffs_array, "work"=>NULL));?>
      </tbody>
    </table>
    </div>
     <script src="/static/lib/jquery.min.js"></script>
     <script src="/static/lib/bootstrap/js/bootstrap.min.js"></script>
     <script src="/static/lib/bootstrap-select/bootstrap-select.min.js"></script>
     <script src="/static/js/pagination.js"></script>
     <script>
     var deleteCustomer = function() {
       if(confirm("정말 삭제하시겠습니까?")) {
         document.getElementById('register-class-input').value="delete";
         document.forms["register-customer-form"].submit();
       }
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
       var row = $(selected).parent().parent();
       var design2_selector = $("#design2_selector", row).get(0);
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
        for (var design2_id in selected_design2s) {
          var design2 = selected_design2s[design2_id];
          var op = document.createElement("option");
          design2_selector.appendChild(op);
          op.value = design2_id;
          op.appendChild(document.createTextNode(design2['name']));
        }
     }
     var selectDesign2 = function(selected) {
       var tr = $(selected).parent().parent();
       if(tr.parent().children().length - 1 == tr.index()) {
         var hiddenDiv = $("#hidden-tbody");
         var hiddenRow = $("tr", hiddenDiv).get(0).cloneNode(true);
         tr.after(hiddenRow);
       }
       var row = $(selected).parent().parent();
       var design1_selector = $("#design1_selector", row).get(0);
       var design1_id = design1_selector.options[design1_selector.selectedIndex].value;
       var inputElem = $("#work-price-input", row).get(0);
       var currentPrice = design2s[design1_id][selected.value]["price"] * 1;
       inputElem.value = currentPrice;
       var totalPriceElem = $("#work-total-price-input")
       var totalPrice = totalPriceElem.val() * 1;
       totalPriceElem.val(totalPrice + currentPrice);
     }

     $(document).ready(function(){
       $('#work-table-body').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:5});
     });

     var selectWork = function(bundle_id) {
        var inputElem = document.getElementById("bundle-id-input");
        inputElem.value = bundle_id;
        var bundleForm = document.modify_work_form;
       window.open('','bundleView','width=1400,height=500,menu=0,status=0');

       bundleForm.target="bundleView";
       bundleForm.bundle_id = bundle_id;
       bundleForm.submit();
     }

     var bundle_text = '<?= (isset($workbundle)) ? json_encode($workbundle) : "" ?>';
     var workbundle;
     if(bundle_text.length > 0) {
        workbundle = JSON.parse(bundle_text);
     }

     if(workbundle) {
       var trs = document.getElementsByClassName('register_work_bar');
       for(var i = 0; i < workbundle.length; i++) {
         var tr = $(trs[i]);
         var design1_selector = $("#design1_selector", tr);
         design1_selector.val(workbundle[i]["design1_id"]);
         design1_selector.change();

         var design2_selector = $("#design2_selector", tr);
         design2_selector.val(workbundle[i]["design2_id"]);
         design2_selector.change();

         var staff_selector = $("#staff_selector", tr);
         staff_selector.val(workbundle[i]["staff_id"]);
         staff_selector.change();
       }
     }

     var deleteWork = function() {
       if(confirm("정말 삭제하시겠습니까?") == true) {
         var inputElem = document.getElementById("work_type_input");
         inputElem.value = "delete";
         document.register_work_form.submit();
       }
     }
     <?php
      if(isset($reload)) {
        $this->session->set_flashdata('message', NULL);
        echo 'window.opener.location.reload();';
      }
      if(isset($close)) {
        echo 'window.close()';
      }
     ?>

     </script>
   </body>
</html>
