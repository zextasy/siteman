<div class="modal fade" id="messageShowModal-{{$notification->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modal-title">View Message</h4>
      </div>
{!! Form::open() !!}
        <div class="modal-body mx-3">
               <!--  <div class="md-form mb-5">
                  <label data-error="wrong" data-success="right" for="form34">Recipient</label>
                    <i class="fa fa-user prefix grey-text"></i>
                    <select type="text" name="user_id" id="form34" class="form-control validate">
                      <option selected >Select Recipient</option>
                      @foreach($users as $user)
                      <option value="{{$user->id}}">{{$user->name}}</option>
                      @endforeach
                    </select>
                </div>
 -->
                <div class="md-form mb-5">
                  <label data-error="wrong" data-success="right" for="form32">Subject</label>
                    <i class="fa fa-tag prefix grey-text"></i>
                    <input type="text" name="subject" id="form32" class="form-control validate" value="{{$notification->subject}}">
                </div>

                <div class="md-form">
                  <label data-error="wrong" data-success="right" for="form8">Message</label>
                    <i class="fa fa-pencil prefix grey-text"></i>
                    <textarea type="text" name="content" id="form8" class="md-textarea form-control" rows="4"> {{$notification->content}}</textarea>
                </div>

            </div>
            <!-- <div class="modal-footer d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Send<i class="fa fa-paper-plane-o ml-1"></i></button>
            </div> -->
{!! Form::close() !!}
    </div>
  </div>
  <p>&nbsp;</p>      <p>&nbsp;</p>
</div>