<div class="modal fade" id="editAccount_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Edit Account Information</h4>
      </div>
      <div class="modal-body">

        <form id="update-user" class="" method="POST" action="update/user/{{ $user->id }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="col-md-6">
            <img class="img-responsive" src="img/avatars/{{ $user->avatar_filename }}" alt="Profile Picture">
            <input type="file" name="user_avatar" class="user_avatar">
          </div>
          <div class="col-md-6">
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
              <input name="2-email" type="email" id="update-email-valid" class="form-control" placeholder="Re-enter email">
            </div>
          </div>
          <div class="clear"></div>
      </div>
      <div class="modal-footer">
        <button id="update-user-submit" type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </form>
        <button type="submit" form="update-user" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>