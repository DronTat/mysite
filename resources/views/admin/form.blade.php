<input type="hidden" id="id" value="{{$id}}">
<div class="form-group">
    <label for="title">Email:</label>
    <input type="text" class="form-control" id="title" disabled value="{{$email}}">
</div>

<div class="form-group">
    <label for="des">Commit</label>
    <textarea name="description" id="commit" cols="20" rows="5" class="form-control">{{$commit}}</textarea>
</div>