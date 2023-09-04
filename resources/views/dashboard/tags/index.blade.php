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
    {{-- main article --}}
    <main>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <div class="px-4 py-3">
                  <a href="{{route('tags.create')}}">
                    <button
                      class="px-5 py-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                    >
                      Create new tag
                    </button>
                  </a>
                  
                  </div>
                  @if(session('success'))

                  <div class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white duration-150 border border-transparent rounded-lg
                  " style="background-color: green;">
                    {{session('success')}}
                </div>
                  @endif
            
              <table class="w-full whitespace-no-wrap">
                <thead>
                  <tr
                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                  >
                    
                    <th class="px-4 py-3">Tags</th>
                   
                    <th class="px-4 py-3">Actions</th>
                  </tr>
                </thead>
                <tbody
                  class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                >
                  @foreach ($tags as $tag)
                  <tr class="text-gray-700 dark:text-gray-400">
                 
                  
                    <td class="px-4 py-3 text-xs">
                        <div>
                            <p class="font-semibold">{{$tag->name}}</p>
                              
                            </div>
                    </td>
                  
                
                    
                    
                    <td class="px-4 py-3">
                      <div class="flex items-center space-x-4 text-sm">
                       
                                  
                    <form action="{{route('tags.destroy',$tag->id)}}" method="post">
                      @csrf
                @method('delete')



                      <button
                      class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                      aria-label="Delete"
                    >
                      <svg
                        class="w-5 h-5"
                        aria-hidden="true"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                      >
                        <path
                          fill-rule="evenodd"
                          d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                          clip-rule="evenodd"
                        ></path>
                      </svg>
                    </button>
                    </form>
                      </div>
                    </td>
                  </tr>
                  @endforeach

           
                </tbody>
              </table>
            </div>
            <div
              class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800"
            >
              
              <!-- Pagination -->
              {{ $tags->links() }}
            </div>
    </main>
      </div>
    </div>
  </body>
</html>
