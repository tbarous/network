@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>Dashboard</h2>

                    <form method="post" action="post/create">
                        {{csrf_field()}}
                        <div class="form-group">
                          <label for="comment">
                              Share a thought
                          </label>
                          <textarea name="content" class="form-control" rows="2" id="comment"></textarea>
                        </div>

                        <div class="form-group">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach($posts as $post)
                        <div class="card">
                            <div class="card-header">
                                {{$post->user->name}} posted  {{$post->created_at->diffForHumans()}}
                            </div>
                            <div class="card-body">
                                {{$post->content}}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection