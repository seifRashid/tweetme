
<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form enctype="multipart/form-data" action="{{ route('users.update', $user->id) }}" method="post">
            @csrf
            @method('put')
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex align-items-center">
                    <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                        src="{{ $user->getImageURL() }}" alt="{{ $user->name }} Avatar">
                    <div>
                            <input name="name" value="{{ $user->name }}" type="text" class="form-control">
                            @error('name')
                                <span class="text-danger fs-6">{{ $message }}</span>
                            @enderror

                    </div>
                </div>
                <div>
                    @auth
                        @if (Auth::id() === $user->id)
                            <a href="{{ route('users.show', $user->id) }}">View</a>
                        @endif
                    @endauth
                </div>
            </div>
                <div class="mt-3">
                    <label>Profile Picture</label>
                    <input type="file" name="image" class="form-control">
                    @error('name')
                        <span class="text-danger fs-6">{{ $message }}</span>
                    @enderror
                </div>
            <div class="px-2 mt-4">
                <h5 class="fs-5"> Bio : </h5>
                    <div class="mb-3">
                        <textarea name="content" class="form-control" id="content" rows="3">{{ $user->bio }}</textarea>
                        @error('bio')
                            <span class="fs-6 text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm mb-3">Save</button>
                    <button type="reset" class="btn btn-secondary btn-sm mb-3">Reset</button>

                @include('users.shared.user-stats')
                {{-- @auth
                    @if (Auth::id() !== $user->id)
                        <div class="mt-3">
                            <button class="btn btn-primary btn-sm"> Follow </button>
                        </div>
                    @endif
                @endauth --}}
            </div>
        </form>
    </div>
</div>
