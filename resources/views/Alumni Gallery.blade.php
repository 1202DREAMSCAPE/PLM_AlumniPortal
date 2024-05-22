<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumni Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css">
    <link rel="stylesheet" href="/dist/app.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Katibeh:wght@400;700&display=swap');
        .scroll-container {
            display: flex;
            overflow-x: auto;
            white-space: nowrap;
        }
        .scroll-container::-webkit-scrollbar {
            display: none;
        }
    </style>
</head>

<body class="bg-white-10 h-screen flex flex-col flex-nowrap">

<!--HEADER-->
<div class="flex flex-row">
    <!--PLM HEADER-->
    <button onclick="window.location.href='/'">
        <img class="h-[4rem] w-[4rem] ml-8 my-2" src="/img/image-6.png">
    </button>
    <div class="py-3 w-4/5 ml-4 flex flex-col">
        <h1 class="text-[30px] font-katibeh mt-2 -mb-3 text-gold">
            PAMANTASAN NG LUNGSOD NG MAYNILA
        </h1>
        <h2 class="text-[15px] font-inter text-black-200">
            UNIVERSITY OF THE CITY OF MANILA
        </h2>
    </div>

    <!--BUTTONS-->
    <div class="flex flex-row -ml-[4rem]">
        <button onclick="window.location.href='/alumni'"
            class="hover:bg-blue-hover duration-150 hover:border-blue-hover font-inter text-center text-16 whitespace-nowrap text-white-10 my-6 px-14 py-2 bg-blue rounded border-[1px] border-blue">
            LOG IN
        </button>
    </div>
</div>

<!--NAVBAR-->
<div class="bg-blue h-1/5 w-screen">
    <navbar class="text-bold text-white-30 text-paragraph3 py-[0.5rem] place-content-evenly font-inter w-screen flex flex-row">
        <div>
            <a href="{{ url('applypartnership') }}" class="hover:text-gold">
                APPLY PARTNERSHIP
            </a>
        </div>
        <div>
            <a href="#" onclick="window.location.href='{{ url('news1') }}'" class="hover:text-gold">
                NEWS AND UPDATES
            </a>
        </div>
        <div class="relative flex flex-row" x-data="{ open: false }" @click.away="open = false">
            <div>
                <a href="#" onclick="window.location.href='{{ url('/gallery1') }}'" class="hover:text-gold">
                    ALUMNI EVENT GALLERY
                </a>
            </div>
        </div>
    </navbar>
</div>

<script>
    function toggleDropdown() {
        var dropdownMenu = document.getElementById("dropdownMenu");
        dropdownMenu.style.display = dropdownMenu.style.display === "none" ? "block" : "none";
    }

    function navigate(url) {
        window.location.href = url;
    }
</script>

<!--MAIN PAGE-->
<div class="h-screen w-screen flex flex-col items-center">
    <img class="w-screen h-[65rem] inset-0" src="/images/Background.jpg">

    <span class="absolute pt-8 text-center font-inter font-bold text-[64px] text-white-20">
        PLM ALUMNI EVENTS
    </span>
    <!--GALLERY-->
    <div class="absolute mx-auto lg:px-32 mr-2 lg:pt-12 mt-[150px]">
        @php
            $posts = DB::table('posts')
                ->leftJoin('media', 'posts.image_id', '=', 'media.id')
                ->select('posts.*', 'media.path as media_path')
                ->orderBy('published_at')
                ->get();

            $postsSet1 = $posts->slice(0, 6);
            $postsSet2 = $posts->slice(6, 12);
        @endphp

        <a href="{{ url('gallery2') }}" onclick="">
            <div class="scroll-container md:-m-2">
                @foreach ($postsSet1 as $post)
                    @php
                        $contentData = json_decode($post->content, true);
                        $contentText = isset($contentData[0]['data']['content'])
                            ? $contentData[0]['data']['content']
                            : '';
                    @endphp
                    <div class="flex-shrink-0 flex flex-wrap bg-blue rounded mr-2">
                        <div class="relative w-[315px] p-1 md:p-2">
                            <img class="w-[315px] h-[313px] opacity-80 hover:opacity-100 object-cover object-center"
                                src="{{ asset('storage/' . $post->media_path) }}" alt="Main Image" />
                            <span class="text-white bg-blue text-[20px] font-semibold font-['Inter'] absolute top-[254px] pl-4">
                                {{ $post->title }} <span class="text-blue"> .. </span>
                            </span>
                            <span class="text-white text-[16px] font-normal font-['Inter'] absolute top-[285px] pl-4">
                                {{ \Carbon\Carbon::parse($post->published_at)->format('F j, Y') }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="scroll-container md:-m-2 mt-4">
                @foreach ($postsSet2 as $post)
                    @php
                        $contentData = json_decode($post->content, true);
                        $contentText = isset($contentData[0]['data']['content'])
                            ? $contentData[0]['data']['content']
                            : '';
                    @endphp
                    <div class="flex-shrink-0 flex flex-wrap bg-blue rounded mr-2">
                        <div class="relative w-[315px] p-1 md:p-2">
                            <img class="w-[315px] h-[313px] opacity-80 hover:opacity-100 object-cover object-center"
                                src="{{ asset('storage/' . $post->media_path) }}" alt="Main Image" />
                            <span class="text-white bg-blue text-[20px] font-semibold font-['Inter'] absolute top-[254px] pl-4">
                                {{ $post->title }} <span class="text-blue"> .. </span>
                            </span>
                            <span class="text-white text-[16px] font-normal font-['Inter'] absolute top-[285px] pl-4">
                                {{ \Carbon\Carbon::parse($post->published_at)->format('F j, Y') }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </a>
    </div>
</div>
</body>
</html>
