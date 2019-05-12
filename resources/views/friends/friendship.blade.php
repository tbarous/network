@if(auth()->check())
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                @if(!auth()->user()->isFriendWith($user))
                    <form method="post" action="/friend/connect">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <button class="btn btn-primary btn-outline-primary " type="submit">
                            <i class="fa fa-plus"></i>
                            Connect
                        </button>
                    </form>
                @else
                    <div class="text-muted">
                        <form method="post" action="/friend/disconnect">
                            {{csrf_field()}}
                            <input type="hidden" name="id" value="{{$user->id}}">
                            <button class="btn btn-danger btn-outline-danger " type="submit">Disconnect
                            </button>
                        </form>
                    </div>
                @endif

                <form method="post" action="friend/block">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$user->id}}">
                    <button class="btn btn-danger btn-outline-danger" type="submit">
                        <i class="fa fa-ban"></i>
                        Block
                    </button>
                </form>
            </div>
        </div>
    </div>
@endif
