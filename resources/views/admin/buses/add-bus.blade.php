
{{-- we will copy this modal and make some changes for the bus modal --}}
{{-- it's just a simple bootstrap modal okay  --}}
<!-- Modal -->
<div class="modal fade" id="exampleModalCenteraddbus" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle" align="center">
            <i class="glyphicon glyphicon-log-in">Add New Bus</i></h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post"
         action="{{ route('bus.store') }}" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      <fieldset>
                      <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                                <!-- <label for="exampleInputPassword1">Seat No</label> -->
                                <select name="operator_id"  class="form-control">
                                    <option readonly>Select Operator</option>
                                    @foreach ($operators as $data)
                                      <option value="{{$data->id}}">               {{$data->operator_name}}
                                      </option>
                                    @endforeach
                                </select>
                          </div>
                        </div>
                      <div class="col-md-6">
                          <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                                <input name="bus_name"  class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Bus Name" type="text">
                          </div>
                          </div>
                          <div class="col-md-6">
                          <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                                <input name="bus_code"  class="form-control" aria-describedby="emailHelp" 
                                placeholder="Enter Bus Code" type="text">
                          </div>
                          </div>
                          </div>
                          <div class="form-group">
                                <!-- <label for="exampleInputEmail1">Bus Name</label> -->
                                <input name="total_seats"  class="form-control" aria-describedby="emailHelp"
                                 placeholder="Enter Total Seat" type="number">
                          </div>

                          <!-- <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox"  
                                      name="status" >Active
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                          </div> -->

                          <div class="row mt-4">
                            <div class="col-md-12">
                                    <label class="control-label">Image</label>
                                    <input type="file" name="imagefile" required>
                            </div>
                          </div>
                          
                                   
                         
                      </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Register Bus</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  
  
  