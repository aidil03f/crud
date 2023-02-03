@extends('layouts.app',['title' => 'Post Edit'])
@section('content')
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Edit Post</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            Edit Post
        </div>
        <div class="card-body">
            <form action="{{ route('post.update',$post) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Username</label>
                            <select name="user_id" id="user_id" class="form-control" required>
                                @foreach ($users as $user)
                                    <option {{ $post->user_id == $user->id ? 'selected':'' }} value="{{ $user->id }}">{{ $user->username }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" id="title" value="{{ $post->title }}" placeholder="Title" class="form-control">
                            @error('title')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Content</label>
                            <textarea name="content" id="content" class="form-control" placeholder="Content">{{ $post->content }}</textarea>
                            @error('content')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="date" id="date" value="{{ $post->date }}" class="form-control">
                            @error('date')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            
                <div style="float:right" class="mr-1">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Update</button>
                    <a href="{{ route('post.index') }}" class="btn btn-danger">Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection