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
                <div class="box-body">
                        <!-- begin -->
                        {FORM_FIELDS}
                            
                                {form_field}
                            
                        {/FORM_FIELDS}
                        <!-- begin -->                        
                </div>  
                <!-- /.box-body -->
            
                <div class="box-footer">
                       <button type="submit" class="btn btn-default">Kembali</button>
                       <button type="submit" class="btn btn-info pull-right">Simpan</button>
                </div>
            </form>  
            
          </div>
    </div>  
</div>    