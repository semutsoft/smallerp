<div class="row">    
    <div class="col-md-12">
          <!-- Horizontal Form -->
          <div class="box box-info">
            
            <!-- .box-header -->
            <div class="box-header with-border">
              <h3 class="box-title">{FORM_TITLE}</h3>
            </div>
            <!-- /.box-header -->
            
            <form class="form-horizontal">
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