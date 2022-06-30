@extends('layouts.adminapp')
@section('content')
<div class="main-panel">
<div class="content-wrapper">
<div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add Product</h4>
                 
                  <form class="forms-sample" method="post" action="{{route('products.store')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputName1">Name</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="name" value="{{ old('name') }}" placeholder="Name">
                           @error('name')
                           <div class="alert alert-danger">{{ $message }}</div>
                                
                                @enderror
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea1">Description</label>
                      <textarea name="description" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea1">Short Description</label>
                      <textarea name="short_description" class="form-control" id="exampleTextarea1" rows="4"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea1">Price</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="price" placeholder="Price">
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea1">Discount Price</label>
                      <input type="text" class="form-control" id="exampleInputName1" name="discount_price" placeholder="Discount Price">
                    </div>
                 
                <div class="form-group">
                      <label>File upload</label>
                      <input type="file" name="img" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                      </div>
                          @error('img')
                          <div class="alert alert-danger">{{ $message }}</div>
                               
                                @enderror
                    </div>

                    <div class="form-group">
                      <label for="exampleSelectGender">Category</label>
                        <select name="category" class="form-control" id="exampleSelectGender">
                            @foreach($category as $cat)
                          <option value="{{$cat->id}}">{{$cat->name}}</option>
                          @endforeach
                        </select>
                      </div>

                    <div class="form-group">
                      <label for="exampleSelectGender">Status</label>
                        <select name="status" class="form-control" id="exampleSelectGender">
                          <option value="0">Inactive</option>
                          <option value="1">Active</option>
                        </select>
                      </div>

                  <button type="submit" class="btn btn-primary me-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                  </form>
                </div>
              </div>
            </div>
@endsection