<div class="row">    
    <div class="col-md-12">
          <!-- Horizontal Form -->
          
          <div class="callout callout-danger hide">
            <h4>Warning!</h4>

            <p id="msg-error"></p>
          </div>
          
          <div class="callout callout-success hide">
            <h4>Success!</h4>

            <p id="msg-success"></p>
          </div>
          
          
          <div class="box box-info">
            
            <!-- .box-header -->
            <div class="box-header with-border">
              <h3 class="box-title">{FORM_TITLE}</h3>
            </div>
            <!-- /.box-header -->
            
            <form class="form-horizontal" id="{FORM_NAME_ID}">
                <!-- /begin ..box-body -->
                <div class="box-body">
                        {FORM_FIELDS}
                        <!-- begin::SHOW FIELDS -->
                        
                                {form_field}
                        
                        <!-- end::SHOW FIELDS -->    
                        
                        {/FORM_FIELDS}   
                </div>  
                <!-- /end ..box-body -->
            
                <!-- /begin ..box-footer -->
                <div class="box-footer">
                       <button type="submit" class="btn btn-default">Kembali</button>
                       <button type="submit" class="btn btn-info pull-right">Simpan</button>
                </div>
                <!-- /end ..box-footer -->
            
            </form>  
            
          </div>
    </div>  
</div>    