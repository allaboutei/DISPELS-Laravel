@if (session('status'))
    <div id="alert-box"
        class="flex items-center w-1/2 my-5 justify-between px-4 py-3 rounded relative
    @if (session('status') == 'success') bg-green-500 text-white
    @elseif(session('status') == 'error') bg-red-500 text-white
    @elseif(session('status') == 'warning') bg-yellow-500 text-black @endif">
        <div>
            <strong class="font-bold">
                @if (session('status') == 'success')
                    Success!
                @elseif(session('status') == 'error')
                    Error!
                @elseif(session('status') == 'warning')
                    Warning!
                @endif
            </strong>
            <span class="block sm:inline">{{ session('message') }}</span>
        </div>
        <button onclick="document.getElementById('alert-box').remove()" class="ml-4 text-xl font-bold">&times;</button>
    </div>
@endif
