{{-- Error Message --}}

@if ($errors->any())
<div class="submission-fail-message items-center flex justify-between p-4 mb-8 text-sm font-semibold
            text-purple-100 bg-red-600 rounded-lg shadow-md focus:outline-none focus:shadow-outline-red">
    <div>
        <i class="fa-sharp fa-solid fa-circle-exclamation fa-lg mr-2" style="color: #ffffff;"></i>
            <span>Something went wrong. Please check and try again. </span>
        <ul>
            @foreach ($errors->all() as $error)
                <li class="p-1 text-sm font-semibold text-purple-100
                bg-red-600 rounded-lg  focus:outline-none focus:shadow-outline-red list-none"
                onclick="this.parentElement.style.display = 'none'";>
                {{ $error }}</li>
            @endforeach
        </ul>
    </div>
</div>
@endif
