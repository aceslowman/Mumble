<div class="modal fade" id="editAvailable_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Availability</h4>
      </div>
      <div class="modal-body">
          <form id="update-availability" class="form-inline" method="POST" action="/update/user/{{ $user->id }}">
            {{ csrf_field() }}
            
              <label for="status">Availability</label>
              <div class="checkbox">            
                  <input name="available" type="hidden" value="0">
                  <input name="available" type="checkbox" value="1" id="update-availability" class="form-control"
                    @if($user->available == 1)
                      checked
                    @endif
                  >                
              </div>
              <div class="form-group">
                <input name="status" type="text" id="update-status" class="form-control" placeholder="{{$user->status}}">
              </div>
      </div>
      <div class="modal-footer">
        <button id="update-availability-submit" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
        <button type="submit" form="update-availability" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>