<?php

  if($_POST["flty"]=="Media"){ ?>
                       <div class="form-group">
                          <label for="exampleFormControlSelect1">Sub - Categ</label>
                          <select class="form-control" id="subcatg" name="subcatg" tabindex="12">
                            <option value="">--Select--</option>
                            
                            <option value="Narration"> Narration </option>
                            <option value="News"> News </option>
                            <option value="Podcast"> Podcast </option>
                            <option value="Trailers"> Trailers </option>
                            <option value="Conference"> Conference </option>
                            <option value="Others"> Others </option>
                          </select>
                        </div>
    <?php 
  }elseif($_POST["flty"]=="Customer_Care"){ ?>
                    <div class="form-group">
                          <label for="exampleFormControlSelect1">Sub - Categ</label>
                          <select class="form-control" id="subcatg" name="subcatg" tabindex="12">
                            <option value="">--Select--</option>
                            <option value="Insurance"> Insurance </option>
                            <option value="Callback Appointment"> Callback Appointment </option>
                            <option value="Others"> Others </option>
                            <option value="Education"> Education </option>
                            <option value="Car"> Car </option>
                          </select>
                    </div>
  <?php }elseif($_POST["flty"]=="Prison_Conversation"){ ?>
                       <div class="form-group">
                          <label for="exampleFormControlSelect1">Sub - Categ</label>
                          <select class="form-control" id="subcatg" name="subcatg" tabindex="12">
                          <option value="0">--Select--</option>
                          <option value="Prison_Conversation"> Prison_Conversation </option>
                          <option value="Prison TTS"> Prison TTS </option>
                          </select>
                        </div>
  <?php }elseif($_POST["flty"]=="Short Files"){ ?>
                    <div class="form-group">
                          <label for="exampleFormControlSelect1">Sub - Categ</label>
                          <select class="form-control" id="subcatg" name="subcatg" tabindex="12"> 
                           <option value="">--Select--</option>                      
                            <option value="Test Files"> Test Files </option>
                            <option value="Digit Files"> Digit Files </option>
                          </select>
                    </div>
  <?php }elseif($_POST["flty"]=="Other"){ ?>
                      <div class="form-group">
                          <label for="exampleFormControlSelect1">Sub - Categ</label>
                          <select class="form-control" id="subcatg" name="subcatg" tabindex="12">
                            <option value="">--Select--</option>
                            <option value="Court Conversation"> Court Conversation </option>
                            <option value="Others"> Others </option>
                          </select>
                      </div>
                        
<?php } else{
    echo "1";
  }
?>

