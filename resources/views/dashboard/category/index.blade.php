@extends('layouts.master')
@section('content')
    <h3 style="font-weight: bold;letter-spacing: .5px;" class="mb-3">Halaman Category</h3>
    <a href="{{url('category-dashboard')}}/create" class="btn btn-primary btn-sm mb-3"><i class="fa-solid fa-plus me-1"></i> Add Category</a>
    <div class="card "  style="background-color: rgb(240, 240, 244) ;box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;">
        <table class="table table-bordered border-white text-center">
        <thead class="table-dark " >
            <th>No</th>
            <th>Nama</th>
            <th>Update at</th>
            <th>Update</th>
            <th>Delete</th>
        </thead>
        @foreach ($category as $item)
        <tbody >
            <th>{{$loop->iteration}}</th>
            <td>{{$item->nama}}</td>
            <td>{{$item->updated_at}}</td>
            <td>
                <a href="/category-dashboard/{{$item->id}}/edit" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen"></i></a>
            </td>
            <td>
                <form action="/category-dashboard/{{$item->id}}" method="post">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Delete Data ?')" type="submit"><i class="fa-solid fa-trash"></i></button>
                </form>
            </td>
        </tbody>
        @endforeach
        </table>
        <div class="d-flex justify-content-end me-3">
            {!! $category->links('pagination::simple-bootstrap-5') !!}
        </div>

    </div>
    @endsection