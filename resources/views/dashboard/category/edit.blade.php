@extends('layouts.master')
@section('content')
    <h2 class="mb-3">Add Category</h2>
    <div class="row">
        <div class="card p-3 col-md-6">
        <form class="row g-3" method="post" action="/category-dashboard/{{$Categories->id}}">
            @method('put')
            @csrf
            <div class="col-md-12">
              <label for="inputEmail4" class="form-label">Category Name</label>
              <input type="text" class="form-control @error('nama') is-invalid @enderror" id="inputEmail4" name="nama"
              style="background-color: rgb(240, 240, 244)" 
              value="{{$Categories->nama}}">
              @error('nama')
                  <div class="text-danger">
                      {{$message}}
                  </div>
              @enderror
            </div>
            <div class="d-flex align-items-end justify-content-end">
              <button type="submit" class="btn btn-primary">Add Category</button>
            <a href="{{url('category-dashboard')}}" class="btn btn-secondary ms-3">Back</a>
            </div>
          </form>
        </div>
    </div>
@endsection
