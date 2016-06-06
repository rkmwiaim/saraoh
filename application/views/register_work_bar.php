<tr class="register_work_bar">
  <td>
    <select class="form-control" name="design1_id[]" id="design1_selector" onchange="selectDesign1(this)" value="<?=(isset($work)) ? $work->design1_id : '' ?>" >
      <option class="placeholder" selected disabled value="">---------</option>
      <?php
        foreach($design1s_array as $key => $value) {
          echo "<option value=".$key.">".$value['name']."</option>";
        }
      ?>
    </select>
  </td>
  <td>
    <select class="form-control" name="design2_id[]" value="" onchange="selectDesign2(this)" id="design2_selector">
      <option class="placeholder" selected disabled value="">---------</option>
    </select>
  </td>
  <td>
    <select class="form-control" name="staff_id[]" id="staff_selector">
    <?php
      foreach($staffs_array as $key => $staff) {
        if($this->session->userdata('customer') && isset($customer['staff_id']) && $customer['staff_id'] == $staff['id']){
            echo '<option selected value="'.$staff['id'].'">'.$staff['name'].'</option>';
        } else {
            echo '<option value="'.$staff['id'].'">'.$staff['name'].'</option>';
        }
      }
     ?>
    </select>
  </td>
  <td><input type="text" class="form-control" name="price[]" id="work-price-input"></td>
  <?=(isset($work)) ? form_hidden("id[]", $work->id) : '' ?>
</tr>
