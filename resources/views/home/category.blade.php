

@extends('layouts.master')

@section('pageContent')
        <!-- Page Content -->
<div class="col-lg-8">
    <!-- Title -->
    <h1>Catagory</h1>
    <hr>
    <form id="frmPost" method="post" action="{{route('createcategory')}}">
        <div class="form-group">
            {{csrf_field()}}
            <label for="pwd">Catagory Name:</label>
            <input type="text" id="title" name="name"  class="form-control" >
            <input type="submit" id="title" name="submit"  class="form-control" value="Add Catagory">
        </div>
    </form>
</div>
@stop