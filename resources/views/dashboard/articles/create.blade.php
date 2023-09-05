<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create article</title>
    <link rel="stylesheet" href="{{asset('/amsify/amsify.suggestags.css')}}">
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
    {{-- main category --}}
 <main class="h-full pb-16 overflow-y-auto">
    <div class="container px-4 py-3  mx-auto grid">
    <h4
    class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300"
  >
    Create Article
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
  <form action="{{route('articles.store')}}" method="post"  enctype="multipart/form-data">
    @csrf
    
    <label class="block text-sm">
      <span class="text-gray-700 dark:text-gray-400">Article Title</span>
      <input type="text" name="title"
        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
        placeholder="article title"
      />
    </label>
    <label class="block text-sm">
      <span class="text-gray-700 dark:text-gray-400">Article Excerpt</span>
      <input type="text" name="excerpt"
        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
        placeholder="Article excerpt"
      />
    </label>
      <label class="block text-sm">
      <span class="text-gray-700 dark:text-gray-400">Tags</span>
      <input type="text" name="tags"  
        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
        placeholder="tags"
      />

    </label>
    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">
        Category
      </span>
      <select
        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
         name="category_id"
      >
      <option value="" >No category</option>

      @foreach (App\Models\Category::all() as $category)
      <option value="{{$category->id}}" >{{$category->name}}</option>

      @endforeach
       
      </select>
    </label>
    
   <label class="block text-sm">
      <span class="text-gray-700 dark:text-gray-400">Article Image</span>
      <input type="file" name="image"
        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
        placeholder="category name"
      />
    </label>

    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">Article Content</span>
      <textarea name="content"
        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
        rows="3"
        placeholder="Enter content"
      ></textarea>
    </label>
        <div class="mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                Status
                </span>
                <div class="mt-2">
                  <label
                    class="inline-flex items-center text-gray-600 dark:text-gray-400"
                  >
                    <input
                      type="radio"
                      class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      name="status"
                      value="published"
                    />
                    <span class="ml-2">Published</span>
                  </label>
                  <label
                    class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400"
                  >
                    <input
                      type="radio"
                      class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                      name="status"
                      value="draft"
                    />
                    <span class="ml-2">Draft</span>
                  </label>
                  <label
                  class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400"
                >
                  <input
                    type="radio"
                    class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                    name="status"
                    value="scheduled"
                  />
                  <span class="ml-2">Approved</span>
                </label>
                </div>
              </div>
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
 <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('./amsify/jquery.amsify.suggestags.js')}}"></script>
 <script>
 $('input[name="tags"]').amsifySuggestags();

 </script>
  </body>
</html>
