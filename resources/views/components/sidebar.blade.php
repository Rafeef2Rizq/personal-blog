<aside class="w-full md:w-1/3 flex flex-col items-center px-3">

           

    <div class="w-full bg-white shadow flex flex-col my-4 p-6">
        <p class="text-xl font-semibold pb-5">Tags</p>
        <div class="flex flex-wrap gap-2">
            @foreach (App\Models\Tag::all() as $tag)
            <a href="{{route('frontend.mainPage')}}" class="bg-blue-800 text-white font-semibold text-sm uppercase
             rounded px-2 py-1 hover:bg-blue-700">{{ $tag->name }}</a>
  
            @endforeach
           
            <!-- Add more tags here -->
        </div>
    </div>
    
    <div class="w-full bg-white shadow flex flex-col my-4 p-6">
        <p class="text-xl font-semibold pb-5">About Us</p>
        <p class="pb-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas mattis est eu odio sagittis tristique. Vestibulum ut finibus leo. In hac habitasse platea dictumst.</p>
        <a href="{{route('frontend.aboutAs')}}" class="w-full bg-blue-800 text-white font-bold text-sm uppercase rounded hover:bg-blue-700 flex items-center justify-center px-2 py-3 mt-4">
            Get to know us
        </a>
    </div>
</aside>