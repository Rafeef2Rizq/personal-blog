<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tables - Windmill Dashboard</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('./assets/css/tailwind.output.css')}}" />
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="{{asset('./assets/js/init-alpine.js')}}"></script>
  </head>
  <body>
 {{-- side Bar --}}
    <x-dashboard.slide-bar/>
     {{-- header --}}
     <x-dashboard.header/>
    {{-- main tag --}}
 <main class="h-full pb-16 overflow-y-auto">
    <div class="container px-4 py-3  mx-auto grid">
    <h4
    class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
  >
    Edit tag
  </h4>
  <div
    class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
  >
  @if ($errors->any())
  <div class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg  ">
      <ul>
          @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
          @endforeach
      </ul>
  </div>
@endif
  <form action="{{ route('tags.store') }}" method="post"  enctype="multipart/form-data">
    @csrf
    
    <label class="block text-sm">
      <span class="text-gray-700 dark:text-gray-400">tag name</span>
      <input type="text" name="name" 
        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
        placeholder="tag name"
      />
    </label>

   
    <div class="py-2 px-2">
      <button type="submit"
        class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
      >
        Submit
      
      </button>
    </div>
  </form>

  
  </div>
 </main>
  </body>
</html>
