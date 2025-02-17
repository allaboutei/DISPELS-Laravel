@auth
    @if (Auth::user()->likesBlog($blog))
    <form class="text-xl flex justify-center text-center items-center my-2" action="{{ route('blogs.unlike', $blog->id) }}"
        method="POST">
        @csrf
        <button type="submit">{{ $blog->likes()->count() }}
            <i class="fa-solid fa-heart"></i>
        </button>
    </form>
@else
    <form class="text-xl flex justify-center text-center items-center my-2" action="{{ route('blogs.like', $blog->id) }}"
        method="POST">
        @csrf
        <button type="submit">{{ $blog->likes()->count() }}
            <i class="fa-regular fa-heart"></i>
        </button>
    </form>
@endif
@endauth
@guest
<form class="text-xl flex justify-center text-center items-center my-2" action="{{ route('blogs.like', $blog->id) }}"
    method="POST">
    @csrf
    <button type="submit">{{ $blog->likes()->count() }}
        <i class="fa-regular fa-heart"></i>
    </button>
</form>
@endguest


