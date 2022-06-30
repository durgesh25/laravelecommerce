@extends('layouts.adminapp')
@section('content')
<div class="main-panel">
        <div class="content-wrapper">
         <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Product</h4>
                  <p class="card-description">
                   <a href="{{route('products.create')}}">Add Product</a>
                  </p>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>Products</th>
                          <th>Category</th>
                          <th>Image</th>
                          <th>Price</th>
                          <th>Discount Price</th>
                          <th>Created</th>
                          <th>Status</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($products as $pr)
                      
                        <tr>
                          <td>{{$pr->name}}</td>
                          <td>{{$pr->category->name}}</td>
                          <td><img src="{{asset('/uploads/')}}/{{$pr->image}}"></td>
                          <td>{{$pr->price}}</td>
                          <td>{{$pr->discount_price}}</td>
                          <td>{{$pr->created_at}}</td>
                          <td> @if($pr->status==1) <label class="badge badge-success">Active</label> @else <label class="badge badge-danger">InActive</label> @endif</td>
                        </tr>
                        @endforeach
                      
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
         
        
@endsection