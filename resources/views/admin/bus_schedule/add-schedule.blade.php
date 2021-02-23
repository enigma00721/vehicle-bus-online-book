
{{-- we will copy this modal and make some changes for the bus modal --}}
{{-- it's just a simple bootstrap modal okay  --}}
<!-- Modal -->
<div class="modal fade" id="exampleModalCenteraddbus" tabindex="-1" role="dialog" 
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title" id="exampleModalLongTitle" align="center">
            <i class="glyphicon glyphicon-log-in">Add New Bus Schedule</i></h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <form method="post" action="{{ route('bus-schedule.store') }}" enctype="multipart/form-data">
                      @csrf
                      <fieldset>
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                  <!-- <label for="exampleInputPassword1">Seat No</label> -->
                                  <select name="from" class="form-control" required>
                                      <option readonly="readonly">Select Region From</option>
                                      @foreach ($regions as $data)
                                      <option value="{{$data->region_name}}">{{$data->region_name}}</option>
                                      @endforeach
                                  </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                                <div class="form-group">
                                  <!-- <label for="exampleInputPassword1">Seat No</label> -->
                                  <select required name="destination" class="form-control">
                                      <option readonly>Select Destination</option>
                                        @foreach ($regions as $data)
                                          <option value="{{$data->region_name}}">{{$data->region_name}}</option>
                                        @endforeach
                                  </select>
                                </div>
                          </div>
                        </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                <select required name="bus_id" class="form-control">
                                      <option value="">Select Bus Name</option>
                                        @foreach ($buses as $data)
                                          <option value="{{$data->id}}">{{$data->bus_name}}</option>
                                        @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                <select required name="operator_id" class="form-control">
                                      <option value="">Select Bus Operator</option>
                                        @foreach ($operators as $data)
                                          <option value="{{$data->id}}">{{$data->operator_name}}</option>
                                        @endforeach
                                  </select>
                              </div>
                          </div>
                        </div>


                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <input required class="form-control" type="text" name="pickup_address" placeholder="Enter Pickup Address">
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <input required class="form-control" type="text" name="dropoff_address" placeholder="Enter Dropoff Address">
                            </div>
                          </div>
                        </div>


                        <div class="row mt-4">
                          <div class="col-md-6">
                              <div class="form-group">
                                <label class="label-control">Departure DateTime</label>
                                <input required type="text" name="depart_date_time" class="form-control datetimepicker"  id="datetimepicker1"/>
                              </div>
                          </div>
                          <div class="col-md-6">
                             <div class="form-group">
                                <label class="label-control">Return DateTime</label>
                                <input required type="text" name="return_date_time" class="form-control datetimepicker"  id="datetimepicker2" />
                              </div>
                          </div>
                        
                        </div>

                        <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                                <input required type="number" name="price" class="form-control" placeholder="Ticket Price">
                          </div>
                        </div>
                        </div>
              </fieldset>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Register Schedule</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  
  
  
  