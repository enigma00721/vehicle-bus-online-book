
{{-- we will copy this modal and make some changes for the bus modal --}}
{{-- it's just a simple bootstrap modal okay  --}}
<!-- Modal -->
<div class="modal fade" id="editModalRegion" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle" align="center">
            <i class="glyphicon glyphicon-log-in">Edit Region</i></h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" 
         enctype="multipart/form-data" name="updateRegionForm" id="updateRegionForm">
                      @csrf
                      <input type="hidden" name="id" id="id" >

                      <fieldset>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                                <input name="region_name" id="region_name"  class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Region Name" type="text">
                          </div>
                        </div>
                          <div class="col-md-6">
                            <div class="form-group">
                                  <input name="region_code" id="region_code"  class="form-control" aria-describedby="emailHelp" 
                                  placeholder="Enter Region Code" type="text">
                            </div>
                          </div>
                           <div class="mt-4 col-md-6 form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox"  
                                      name="status" checked>Active
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                          </div>
                      </div>
           </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update Region</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  
  
  