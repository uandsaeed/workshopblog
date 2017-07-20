@extends('layouts.master')

@section('title') Posts Form @stop

@section('headAssets')
    <style>

    </style>
@stop

@section('pageContent')
    <section>

       <div class="col-md-8">
        <div class="row">
            <h1>Create Post</h1>
        </div>
        <form id="frmPost" method="post" action="{{route('createpost')}}">
            {{csrf_field()}}

            <input type="hidden" id="user_id" name="user_id" value="1" class="form-control" >

            <div class="form-group">
                <label for="pwd">Title:</label>
                <input type="text" id="title" name="title"  class="form-control" >
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
                <textarea class="form-control" name="description" id="description" rows="5" placeholder="Your Description"></textarea>
            </div>

            <div class="form-group">
                <input type="submit" id="btnSave" name="btnSave" class="btn black"  value="Save Post">
            </div>
        </form>
       </div>
    </section>

@stop


@section('footerAssets')@stop
@section('scripts')
    <script>

        //    tinymce.init({
        //        selector : "textarea",
        //        plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
        //        toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
        //    });
        //
        //    var description = document.getElementById("description");
        //    CKEDITOR.replace(description,{
        //        language:'en-gb'
        //    });
    </script>
@stop