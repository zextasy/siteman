{!! Form::open(['method' => 'post', 'action' => 'MessagesController@sendMail']) !!}
<div class="form-group">
  <div class="col-md-2">
    <label for="multiple" class="control-label">To</label>
  </div>
  <div class="col-md-10">
    <select id="#" name="[]" class="form-group" multiple="" tabindex="-1" aria-hidden="true" style="width:100%; border:0px;">
      @foreach($human as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
      @endforeach
      </select>
  </div>
</div>

<br>

<div class="form-group">
  <div class="col-md-2">
    <label for="multiple" class="control-label">Subject</label>
  </div>
  <div class="col-md-10">
    <input type="text" name="title" id="title" class="form-control">
  </div>
</div>

<br>

<div class="form-group">
  <textarea type="text"  name="note" required id="note" class="form-control" placeholder="write here..." rows="9"></textarea>
</div>

<div class="col-md-6" >
    <button class="btn btn-primary"> Send </button>
</div>

{!! Form::close() !!}