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
  </style>
</head>

<body class="bg-white-10 h-screen flex flex-col flex-nowrap">

<!--HEADER-->
<div class="flex flex-row">

  <!--PLM HEADER-->
    <button onclick="window.location.href='/'">
    <img class="h-[4rem] w-[4rem] ml-8 my-2" src="/img/image-6.png">
    </button>
    <div class = "py-3 w-4/5 ml-4 flex flex-col">
     <h1 class="text-[30px] font-katibeh mt-2 -mb-3 text-gold">
        PAMANTASAN NG LUNGSOD NG MAYNILA
     </h1>
     <h2 class=" text-[15px] font-inter text-black-200">
        UNIVERSITY OF THE CITY OF MANILA
     </h2>
     </div>  

     <!--BUTTONS-->
     <div class="flex flex-row -ml-[4rem]">
    <button 
      onclick="window.location.href='/alumni'" 
      class="hover:bg-blue-hover duration-150 hover:border-blue-hover font-inter text-center text-16 whitespace-nowrap text-white-10 my-6 px-14 py-2 bg-blue rounded border-[1px] border-blue">
      LOG IN
    </button>
  </div>
</div>


<!--NAVBAR-->
        <div class="bg-blue  h-1/5 w-screen">
            <navbar
                class="text-bold text-white-30 text-paragraph3 py-[0.5rem] place-content-evenly font-inter w-screen flex flex-row">
                <div>
                    <a href="{{ url('applypartnership') }}" onclick="" class ="hover:text-gold">
                        APPLY PARTNERSHIP
                    </a>
                </div>

                <div>
                    <a href="#" onclick="window.location.href='{{ url('news1') }}'" class ="hover:text-gold">
                        NEWS AND UPDATES
                    </a>
                </div>

              
                <!-- <div class="relative flex flex-row" x-data="{ open: false }" @click.away="open = false">
                    <div>
                        <a href="#" onclick="window.location.href='/resources/views/careers.html'"
                            class ="hover:text-gold">
                            CAREERS
                        </a>
                    </div>
                    <svg class="dropdown flex flex-col" width="18" height="18" viewBox="0 0 18 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg" @click="open = !open">
                        <path :d="open ? 'M13.5 11.25L9 6.75L4.5 11.25' : 'M13.5 6.75L9 11.25L4.5 6.75'" stroke="white"
                            class="hover:fill-current hover:text-gold" />
                    </svg>
                    <div class="bg-blue dropdown-menu absolute top-full mt-2 z-10 text-left px-[1.15rem] whitespace-nowrap"
                        :class="{ 'scale-100': open, 'scale-0': !open }" x-show="open" id="dropdownMenu">
                        <div onclick="window.location.href='{{ url('jobsearching1') }}'"
                            class="dropdown-menu-item hover:text-gold duration-150">Job Searching</div>
                        <div onclick="window.location.href='{{ url('jobposting') }}'"
                            class="dropdown-menu-item hover:text-gold duration-150">Job Posting</div>
                    </div>
                </div>
             -->

                <div class="relative flex flex-row" x-data="{ open: false }" @click.away="open = false">
                    <div>
                        <a href="#" onclick="window.location.href='{{ url('/gallery1') }}'" class ="hover:text-gold">
                            ALUMNI EVENT GALLERY
                        </a>
                    </div>
                    <!-- <svg class="dropdown flex flex-col" width="18" height="18" viewBox="0 0 18 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg" @click="open = !open">
                        <path :d="open ? 'M13.5 11.25L9 6.75L4.5 11.25' : 'M13.5 6.75L9 11.25L4.5 6.75'" stroke="white"
                            class="hover:fill-current hover:text-gold" />
                    </svg>
                    <div class="bg-blue dropdown-menu absolute top-full mt-2 z-10 text-left pl-[1rem] pr-[2.25rem] whitespace-nowrap"
                        :class="{ 'scale-100': open, 'scale-0': !open }" x-show="open" id="dropdownMenu">
                        <div onclick="window.location.href='{{ url('gallery1') }}'"
                            class="dropdown-menu-item hover:text-gold duration-150">Gallery</div>
                        <div onclick="window.location.href='{{ url('event1') }}'"
                            class="dropdown-menu-item hover:text-gold duration-150">Upcoming Events</div>
                    </div> -->
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
        <div class="h-screen w-screen flex flex-col font-inter">
            <span class="ml-[10rem] mb-[1rem] mt-[3rem] text-[60px] font-inter font-bold text-blue">
                NEWS AND UPDATES
            </span>
            <div class="flex flex-row">
                <div class="mt-[9rem]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left"
                        width="150px" height="150px" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M15 6l-6 6l6 6" />
                    </svg>
                </div>

                <div class="border border-blue rounded-[1.75rem]">
                    <div class="flex flex-row">
                        <img class="w-[697px] h-[500px]" src="/images/Group 8686.png">
                        <div class="flex flex-col">
                            <span
                                class=" mx-[3rem] pr-[3rem] mt-[5rem] whitespace-pre-line text-[24px] font-inter font-bold text-blue-pressed ">
                                LOREM IPSUM DOLOR SIT AMET,
                                CONSECTETUR ADISPISCING ELIT
                            </span>
                            <span
                                class="mx-[3rem] pr-[3rem] mt-[2rem] text-[20px] font-inter font-bold text-black-300 ">
                                BY Office of Public Affairs
                            </span>
                            <span class="mx-[3rem] pr-[3rem] text-[18px] font-inter font-bold text-black-300 ">
                                November 13, 2023
                            </span>
                            <span
                                class="mx-[3rem] pr-[3rem] whitespace-pre-line text-[18px] text-left font-medium font-inter text-black-200">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua.
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco
                                laboris nisi ut aliquip ex ea commodo consequat.
                                <a href="#" href="#" onclick="window.location.href='{{ url('news2') }}'"
                                    class="font-bold font-inter dark:text-blue hover:underline hover:text-gold ">
                                    View More
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="mt-[9rem]">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right"
                        width="150px" height="150px" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 6l6 6l-6 6" />
                    </svg>
                </div>
            </div>

            <!--Search & Year-->
            <div class="pt-[2rem] text-left flex flex-row">
                <div class="ml-[7rem] text-[1.2rem] font-medium">
                    Search by Article Title
                </div>
                <div
                    class="ml-[1rem] w-1/2 h-[31px] bg-white bg-opacity-60 rounded-[10px] shadow-inner border border-slate-500">
                    <div class="relative mb-3" x-data="{ search: '' }">
                        <input type="search"
                            class="text-[1.2rem] peer block w-full rounded border-0 bg-transparent landing-[1rem] px-3 pb-[2rem] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="NewsSearch" x-model="search" x-on:focus="placeholder = 'Searching...'"
                            x-on:blur="placeholder = 'Type query'" />
                    </div>
                </div>
                <div class="ml-[1rem] text-[1.2rem] font-medium">
                    Year
                </div>
                <div
                    class="ml-[1rem] -mr-[20rem] h-[31px] bg-white bg-opacity-60 rounded-[10px] shadow-inner border border-slate-500">
                    <div class="relative mb-3" x-data="{ search: '' }">
                        <input type="search"
                            class="text-[1.2rem] peer block w-full rounded border-0 bg-transparent landing-[1rem] px-3 pb-[2rem] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                            id="NewsSearch" x-model="search" x-on:focus="placeholder = 'Searching...'"
                            x-on:blur="placeholder = 'Type query'" />
                    </div>
                </div>
            </div>

            <!--MORE CONTENT-->
            <div class="mt-12 px-[7.25rem] top-3 flex flex-row place-content-evenly">
                <!--NEWS 1-->
                <div class=" flex flex-col bg-white-10 border-r-2 border-black">
                    <div class=" flex flex-row font-inter font-bold text-blue">
                        <span class="ml-[1.5rem] text-[1.5rem] py-3">
                            TITLE
                        </span>
                    </div>
                    <div class="ml-[1.5rem] font-inter font-light text-[1.2rem]">
                        <div class="py-4">
                            <span>LOREM IPSUM DOLOR SIT AMET,
                                CONSECTETUR ADIPISCING ELIT </span>
                        </div>
                        <div class="font-inter text-black flex flex-row pb-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alarm"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                <path d="M12 10l0 3l2 0" />
                                <path d="M7 4l-2.75 2" />
                                <path d="M17 4l2.75 2" />
                            </svg>
                            <span class="ml-2  text-[16px]">
                                Date Posted
                            </span>
                            <a href="#" href="#" onclick="window.location.href='{{ url('news2') }}'"
                                class="text-blue-hover pl-28 font-inter dark:text-blue hover:underline text-[18px] hover:text-gold">
                                View More
                            </a>
                        </div>
                    </div>
                </div>

                <!--NEWS 2-->
                <div class=" flex flex-col bg-white-10 border-r-2 border-black">
                    <div class=" flex flex-row font-inter font-bold text-blue">
                        <span class="ml-[1.5rem] text-[1.5rem] py-3">
                            TITLE
                        </span>
                    </div>
                    <div class="ml-[1.5rem] font-inter font-light text-[1.2rem]">
                        <div class="py-4">
                            <span>LOREM IPSUM DOLOR SIT AMET,
                                CONSECTETUR ADIPISCING ELIT </span>
                        </div>
                        <div class="font-inter text-black flex flex-row pb-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alarm"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                <path d="M12 10l0 3l2 0" />
                                <path d="M7 4l-2.75 2" />
                                <path d="M17 4l2.75 2" />
                            </svg>
                            <span class="ml-2  text-[16px]">
                                Date Posted
                            </span>
                            <a href="#" href="#" onclick="window.location.href='{{ url('news2') }}'"
                                class="text-blue-hover pl-28 font-inter dark:text-blue hover:underline text-[18px] hover:text-gold">
                                View More
                            </a>
                        </div>
                    </div>
                </div>

                <!--NEWS 3-->
                <div class=" flex flex-col bg-white-10 border-r-2 border-black">
                    <div class="flex flex-row font-inter font-bold text-blue">
                        <span class="ml-[1.5rem] text-[1.5rem] py-3">
                            TITLE
                        </span>
                    </div>
                    <div class="ml-[1.5rem] font-inter font-light text-[1.2rem]">
                        <div class="py-4">
                            <span>LOREM IPSUM DOLOR SIT AMET,
                                CONSECTETUR ADIPISCING ELIT </span>
                        </div>
                        <div class="font-inter text-black flex flex-row pb-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alarm"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                <path d="M12 10l0 3l2 0" />
                                <path d="M7 4l-2.75 2" />
                                <path d="M17 4l2.75 2" />
                            </svg>
                            <span class="ml-2  text-[16px]">
                                Date Posted
                            </span>
                            <a href="#" href="#" onclick="window.location.href='{{ url('news2') }}'"
                                class="text-blue-hover pl-28 font-inter dark:text-blue hover:underline text-[18px] hover:text-gold">
                                View More
                            </a>
                        </div>
                    </div>
                </div>

                <!--NEW 4-->
                <div class=" flex flex-col bg-white-10 border-black">
                    <div class="flex flex-row font-inter font-bold text-blue">
                        <span class="ml-[1.5rem] text-[1.5rem] py-3">
                            TITLE
                        </span>
                    </div>
                    <div class="ml-[1.5rem] font-inter font-light text-[1.2rem]">
                        <div class="py-4">
                            <span>LOREM IPSUM DOLOR SIT AMET,
                                CONSECTETUR ADIPISCING ELIT </span>
                        </div>
                        <div class="font-inter text-black flex flex-row pb-8">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alarm"
                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                                <path d="M12 10l0 3l2 0" />
                                <path d="M7 4l-2.75 2" />
                                <path d="M17 4l2.75 2" />
                            </svg>
                            <span class="ml-2  text-[16px]">
                                Date Posted
                            </span>
                            <a href="#" href="#" onclick="window.location.href='{{ url('news2') }}'"
                                class="text-blue-hover pl-28 font-inter dark:text-blue hover:underline text-[18px] hover:text-gold">
                                View More
                            </a>
                        </div>
                    </div>
                </div>
            </div>

    </body>

</html>
