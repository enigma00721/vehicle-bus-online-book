
{{-- we will copy this modal and make some changes for the bus modal --}}
{{-- it's just a simple bootstrap modal okay  --}}
<!-- Modal -->
<div class="modal fade" id="editBookingModal" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle" align="center">
            <i class="glyphicon glyphicon-log-in">Update Status</i></h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="get" name="updateBookingForm" id="updateBookingForm"
            enctype="multipart/form-data">
                      @csrf
                      <input type="hidden" name="id" id="id" >
                      <fieldset>

                          <div class="form-group mb-4">
                                <label for="status">Status</label>
                               
                                <select name="status" id="status" class="form-control">
                                    <option readonly>Select Status</option>
                                    <option value="0">Pending</option>
                                    <option value="1">Approved</option>
                                </select>
                          </div>

                        
                      </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Update</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  
  
  