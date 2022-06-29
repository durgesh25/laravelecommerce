@extends('layouts.adminapp')
@section('content')
<div class="main-panel">
        <div class="content-wrapper">
         <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Category</h4>
                  <p class="card-description">
                   <a href="{{route('categories.create')}}">Add Category</a>
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Category</th>
                          <th>Products</th>
                          <th>Image</th>
                          <th>Created</th>
                          <th>Status</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($category as $cat)
                      
                        <tr>
                          <td>{{$cat->name}}</td>
                          <td>{{$cat->product()->count()}}</td>
                          <td><img src="{{asset('/uploads/')}}/{{$cat->image}}"></td>
                          <td>{{$cat->created_at}}</td>
                          <td> @if($cat->status==1) <label class="badge badge-success">Active</label> @else <label class="badge badge-danger">InActive</label> @endif</td>
                        </tr>
                        @endforeach
                      
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
         
        
@endsection