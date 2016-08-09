<div class="modal fade" id="editAccount_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Account Information</h4>
      </div>
      <div class="modal-body">

        <form id="update-user" class="" method="POST" action="update/user/{{ $user->id }}">
          {{ csrf_field() }}
          <div class="form-group">
            <label for="name">Update Name</label>
            <input name="name" type="text" id="update-name" class="form-control" placeholder="{{ $user->name }}">
          </div>
          <div class="form-group">
            <label for="nick">Update Nick</label>
            <input name="nick" type="text" id="update-nick" class="form-control" placeholder="{{ '@'.$user->nick }}">
          </div>
          <div class="form-group">
            <label for="email">Update Email</label>
            <input name="email" type="email" id="update-email" class="form-control" placeholder="{{ $user->email }}">
          </div>
          <div class="form-group">
            <label for="email">Re-enter Email</label>
            <input name="2-email" type="2-email" id="update-email-valid" class="form-control" placeholder="Re-enter email">
          </div>
      </div>
      <div class="modal-footer">
        <button id="account-info_submit" type="submit" class="btn btn-default">Save Changes</button>
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>