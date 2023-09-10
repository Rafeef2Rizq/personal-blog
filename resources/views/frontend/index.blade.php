
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tailwind Blog Template</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }
    </style>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</head>
<body class="bg-white font-family-karla">

    <!-- Top Bar Nav -->
    <x-top-bar/>

    <!-- Text Header -->
    <x-text-header/>

    <!-- Topic Nav -->
   <x-topic-nav/>


    <div class="container mx-auto flex flex-wrap py-6">

        <!-- Posts Section -->
        <section class="w-full md:w-2/3 flex flex-col items-center px-3">
        @foreach ($articles as $article)
        <article class="flex flex-col shadow my-4">
            <!-- Article Image -->
            <a href="#" class="hover:opacity-75">
                <img src="{{ asset('storage/'. $article->image) }}">
            </a>
            <div class="bg-white flex flex-col justify-start p-6">
                <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">
                    {{ optional($article->category)->name }}</a>
                <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{$article->title}}</a>
                <p href="#" class="text-sm pb-3">
                    By <a href="#" class="font-semibold hover:text-gray-800">
                        {{ $article->user->name  ??" " }}</a>,
                         Published on {{ \Carbon\Carbon::parse($article->created_at)->isoFormat('MMMM Do, YYYY') }}

                </p>
                <a href="#" class="pb-6">{{$article->excerpt}}</a>

                <a href="#" class="pb-6">{{$article->content}}</a>
                <a href="{{route('frontend.article',$article->id)}}" class="uppercase text-gray-800 hover:text-black">Continue Reading <i class="fas fa-arrow-right"></i></a>
            </div>
        </article>

        @endforeach
        
        

            <!-- Pagination -->
           {{$articles->links()}}

        </section>

        <!-- Sidebar Section -->
       <x-sidebar/>

    </div>

   <x-footer/>

    <script>
        function getCarouselData() {
            return {
                currentIndex: 0,
                images: [
                    'https://source.unsplash.com/collection/1346951/800x800?sig=1',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=2',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=3',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=4',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=5',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=6',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=7',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=8',
                    'https://source.unsplash.com/collection/1346951/800x800?sig=9',
                ],
                increment() {
                    this.currentIndex = this.currentIndex === this.images.length - 6 ? 0 : this.currentIndex + 1;
                },
                decrement() {
                    this.currentIndex = this.currentIndex === this.images.length - 6 ? 0 : this.currentIndex - 1;
                },
            }
        }
    </script>

</body>
</html>