<div>
    <form action="{{ route('ideas.like',$idea->id) }}" method="post">
    @csrf
    <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
        </span> {{$idea->likes()->count()}} </button>
    </form>

    <form action="{{ route('ideas.unlike',$idea->id) }}" method="post">
    @csrf
    <button type="submit" class="fw-light nav-link fs-6"> <span class="fas fa-heart me-1">
        </span> {{$idea->likes()->count()}} </button>
    </form>
</div>
