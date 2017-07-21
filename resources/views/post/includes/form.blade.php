<section>
    <div class="col-md-8">
        <div class="row">
            <h1>@if($post->id == "") Create Post @else Edit Form @endif</h1>
        </div>
        <form id="frmPost" method="post" @if($post->id == "") action="{{route('posts.store')}}" @else action="{{route('posts.update',['id'=>$post->id])}}" @endif>
            {{csrf_field()}}
        @if($post->id == "")
        @else
            <input type="hidden" name="_method" value="put">
        @endif

            <input type="hidden" id="user_id" name="user_id" value="1" class="form-control" >

            <div class="form-group">
                <label for="pwd">Title:</label>
                <input type="text" id="title" name="title"  class="form-control" value="{{$post->title}}" >
            </div>


            <div class="form-group">
                <label class="col-xs-5 control-label asterisk">Category:</label>
                <select id="category" name="category" class="form-control">
                    <option value="">Select Category</option>
                    @foreach(category_drop_down() as $Categories)
                        <option value="{{$Categories->name}}" >{{$Categories->name}}</option>
                    @endforeach

                </select>
                <span id="error_category" class="field-validation-msg"></span>
            </div>


            <div class="form-group">
                <label for="pwd">Image:</label>
                <input id="postPhoto" name="photo" type="file" class="file-loading btn black" accept="image/*">
            </div>

            <div class="form-group">
                <label for="pwd">Description:</label>
                <textarea class="form-control" name="description" id="description" rows="5" placeholder="Your Description">{{$post->description}}</textarea>
            </div>

            <div class="form-group">
                <input type="submit" id="btnSave" name="btnSave" class="btn black"  value="Save Post">
            </div>
        </form>
    </div>
</section>