<div class="card">
    <div class="px-3 pt-4 pb-2">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:50px" class="me-2 avatar-sm rounded-circle"
                    src="{{ $idea->user->getImageURL() }}" alt="{{ $idea->user->name }}">
                <div>
                    <h5 class="card-title mb-0"><a href="{{ route('users.show',$idea->user->id) }}"> {{ $idea->user->name }}
                        </a></h5>
                </div>
            </div>
            <div>
                <form method="POST" action="{{ route('idea.destroy',$idea->id) }}" >
                    @csrf
                    @method('delete')
                    @auth
                        <a href="{{ route('idea.edit',$idea->id) }}" style="margin-right:10px">Edit</a>
                        <a href="{{ route('idea.show',$idea->id) }}" style="margin-right:10px">View</a>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    @endauth
                    @guest
                        <a href="{{ route('idea.show',$idea->id) }}" style="margin-right:10px">View</a>
                    @endguest
                </form>

            </div>
        </div>
    </div>
    <div class="card-body">
        @if ($editing ?? false)
            <form action="{{route('idea.update', $idea->id)}}" method="POST">
                @csrf
                @method('put')
                <div class="mb-3">
                    <textarea name="content" class="form-control" id="content" rows="3">{{$idea->content}}</textarea>
                    @error('content')
                        <span class="fs-6 text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="">
                    <button class="btn btn-dark"> Share </button>
                </div>
            </form>
        @else
            <p class="fs-6 fw-light text-muted">
                {{ $idea->content }}
            </p>
        @endif
        <div class="d-flex justify-content-between">
            @include('ideas.shared.like-button')
            <div>
                <span class="fs-6 fw-light text-muted"> <span class="fas fa-clock"> </span>
                    3-5-2023 </span>
            </div>
        </div>
        @include('shared.comment-box')
    </div>
</div>
