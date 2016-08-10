<div class="modal fade" id="editTags_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
          <h4 class="modal-title" id="myModalLabel">Edit Tags</h4>
      </div>
      <div class="modal-body">


        <div class="modal-edit-tags modal-delete-tags">
            @foreach($user->tags as $tag)
                <ul class="tag-label tag-large">
                    <li>    
                        <button class="btn btn-primary btn-label"><span>x</span>{{$tag->name}}</button>
                    </li>        
                </ul>
            @endforeach
        </div>

        <div class="modal-edit-tags modal-add-tag">
          <ul class="tag-label tag-large">
              <li>    
                  <button class="btn btn-success btn-label"><span>+</span>Add tag</button>
              </li>
          </ul>
        </div>

        <div class="clearfix"></div>
        <p><small>Note: New tags won't appear until page refresh. Under development.</small></p>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>