@auth()
<h4> Share yours ideas </h4>
<div class="row">
    <form method="post" action="{{route('idea.create')}}">
        @csrf
        <div class="mb-3">
            <textarea name="content" class="form-control" id="content" rows="3"></textarea>
            @error('content')
                <span class="fs-6 text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="">
            <button class="btn btn-dark"> Share </button>
        </div>
    </form>
</div>
@endauth
@guest
    <p class="text-center fs-2 fw-bold">Please login to share your Ideas</p>
@endguest
