@extends('layouts.app',['title' => 'Post'])
@section('content')

    <h1 class="h3 mb-2 text-gray-800">Posts</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Post Table</h6>
            <a href="{{ route('post.create') }}" class="btn btn-primary btn-sm">Add Post</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $post->user ? $post->user->name : '-' }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->content }}</td>
                                <td>{{ $post->date }}</td>
                                <td class="d-flex">
                                    <a href="{{ route('post.edit',$post->id) }}" class="btn btn-warning btn-sm mr-1" title="edit ?"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('post.destroy',$post->id) }}" method="post">@method("DELETE")@csrf
                                        <button type="submit" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ini ?')" class="btn btn-danger btn-sm" title="Delete ?"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection