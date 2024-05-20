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
        <img class="h-[5.5rem] w-[5.5rem] ml-8 my-2" src="/images/Logo only.png">
        <div class = " py-3 w-4/5 ml-5 flex flex-col mt-2">
            <h1 class="text-[35px] font-katibeh mt-0 -mb-2 text-gold">
                PAMANTASAN NG LUNGSOD NG MAYNILA
            </h1>
            <h2 class="-mt-0 text-[15px] font-inter text-black-200">
                UNIVERSITY OF THE CITY OF MANILA
            </h2>
        </div>
        
     <!--BUTTONS-->
     <div class="flex flex-row -ml-[4rem]">
    <button 
      onclick="window.location.href='/alumni'" 
      class="hover:bg-blue-hover duration-150 hover:border-blue-hover font-inter text-center text-16 whitespace-nowrap text-white-10 my-6 px-14 bg-blue rounded border-[1px] border-blue">
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

              
                <div class="relative flex flex-row" x-data="{ open: false }" @click.away="open = false">
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
                <div class="relative flex flex-row" x-data="{ open: false }" @click.away="open = false">
                    <div>
                        <a href="#" onclick="window.location.href='{{ url('') }}'" class ="hover:text-gold">
                            ALUMNI EVENTS
                        </a>
                    </div>
                    <svg class="dropdown flex flex-col" width="18" height="18" viewBox="0 0 18 18" fill="none"
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
<div class="h-screen w-screen flex flex-col">

    <!--BACKGROUND PHOTO-->
    <div class="w-screen flex flex-col">
        <img class="relative drop-shadow-[0px_0px_3px_rgba(0,0,0,2)]" src="/img/MainPageBanner.png">
            <div class="absolute flex flex-col ml-[50rem] ">
                <span class="mt-20 -bottom-3 text-center font-inter font-bold text-white-10 text-[60px]">
                    WELCOME BACK, 
                </span>
                <span class=" -mt-5 text-center font-inter font-bold text-white-10 text-[60px]"> 
                    DEAR HARIBON!
                </span>
                <span class="font-inter text-right text-white-10 text-[15px] pr-28 mr-20"> 
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor 
                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis 
                    nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu 
                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in 
                    culpa qui officia deserunt mollit anim id est laborum.
                </span>
            </div>
            </div>

    <!--OUR SERVICES-->
    <div class="w-screen py-28 text-center">
        <div class="text-blue text-[64px] font-bold font-inter">
            OUR SERVICES
        </div>
        <div class="opacity-60 pl-[10rem] ml-[20rem] mt-4 text-center w-1/2 text-[20px] text-blue font-inter">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
            tempor incididunt ut labore et dolore magna aliqua. 
        </div>
        </div>

    
    <!-- PHOTOS-->
    <div class="w-screen pb-14 bg-blue">
        <div class="flex flex-row place-content-evenly place-content-center">
            <img src="/img/ReqDocu.png">
            <img src="/img/JobOpp.png">
            <img src="/img/Networking.png">
            <img src="/img/AlumniEvents.png">
        </div>
     </div>

    <!--NEWS AND UPDATES-->
    <div class="w-screen py-32 mt-4 text-center">
    <div class=" text-blue text-[64px] font-bold font-inter">
        NEWS AND UPDATES
    </div>
    <div class="opacity-60 pl-[10rem] ml-[20rem] pt-[2rem] pb-[3rem] text-center w-1/2 text-[20px] text-blue font-inter">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
        tempor incididunt ut labore et dolore magna aliqua. 
    </div>
    <div class="mt-4 flex flex-row">
        <div class="mt-[9rem]">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-left" width="150px" height="150px" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M15 6l-6 6l6 6" />
            </svg>
        </div>
        
    <div class="border border-blue rounded-[1.75rem]">
        <div class="flex flex-row">
            <img class="w-[697px] h-[150px]" src="/images/Group 8686.png">
            <div class="flex flex-col">
            <span class=" mx-[3rem] pr-[3rem] mt-[3.5rem] whitespace-pre-line text-[24px] font-inter font-bold text-blue-pressed ">
                LOREM IPSUM DOLOR SIT AMET, 
                CONSECTETUR ADISPISCING ELIT   
            </span>
            <span class="mx-[3rem] pr-[3rem] mt-[2rem] text-[20px] font-inter font-bold text-black-300 ">
                BY Office of Public Affairs 
            </span>
            <span class="mx-[3rem] pr-[3rem] text-[18px] font-inter font-bold text-black-300 ">
                November 13, 2023
            </span>
            <span class="mx-[3rem] pr-[3rem] whitespace-pre-line text-[18px] text-left font-medium font-inter text-black-200">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco 
                laboris nisi ut aliquip ex ea commodo consequat. 
                <a href="#" href="#" onclick="window.location.href='/resources/views/News.html'" class="font-bold font-inter dark:text-blue hover:underline ">
                    View More
                </a> 
            </span> 
        </div>     
    </div>    
    </div>
    <div class="mt-[9rem]">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevron-right" width="150px" height="150px" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M9 6l6 6l-6 6" />
        </svg>
        </div>
    </div>

    <!--Search & Year-->
    <div class="pt-[2rem] text-left flex flex-row"> 
        <div class="ml-[7rem] text-[1.2rem] font-medium">
            Search by Article Title
        </div>
        <div class="ml-[1rem] w-1/2 h-[31px] bg-white bg-opacity-60 rounded-[10px] shadow-inner border border-slate-500">
            <div class="relative mb-3" x-data="{ search: '' }">
                <input type="search" 
                  class="text-[1.2rem] peer block w-full rounded border-0 bg-transparent landing-[1rem] px-3 pb-[2rem] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" 
                  id="NewsSearch"
                  x-model="search"
                  x-on:focus="placeholder = 'Searching...'"
                  x-on:blur="placeholder = 'Type query'" />
               </div>
        </div>
        <div class="ml-[1rem] text-[1.2rem] font-medium">
            Year
        </div>
        <div class="ml-[1rem] -mr-[20rem] h-[31px] bg-white bg-opacity-60 rounded-[10px] shadow-inner border border-slate-500">
            <div class="relative mb-3" x-data="{ search: '' }">
                <input type="search" 
                  class="text-[1.2rem] peer block w-full rounded border-0 bg-transparent landing-[1rem] px-3 pb-[2rem] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0" 
                  id="NewsSearch"
                  x-model="search"
                  x-on:focus="placeholder = 'Searching...'"
                  x-on:blur="placeholder = 'Type query'" />
               </div>
        </div>
    </div>
    
      <!--MORE CONTENT-->
      <div class="mt-12 px-[7rem] flex flex-row place-content-evenly">
        <!--NEWS 1-->
        <div class="pr-[1rem] flex flex-col bg-white-10 border-r-2 border-black">
            <div class="flex flex-row font-inter font-bold text-blue">
                <span class="ml-[1.5rem] text-[1.5rem] py-3">
                    TITLE
                </span>
            </div>
            <div class="font-inter font-light text-[1.2rem]">
                <div class="py-4">
                    <span>LOREM IPSUM DOLOR SIT AMET,
                        CONSECTETUR ADIPISCING ELIT </span>
                </div>
                <div class="ml-[1.5rem] font-inter text-black flex flex-row pb-8">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alarm" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M12 10l0 3l2 0" /><path d="M7 4l-2.75 2" /><path d="M17 4l2.75 2" /></svg>
                    <span class="ml-2">
                        Location
                    </span>
                    <a href="#" href="#" onclick="window.location.href='/resources/views/mainpage.html'" class="text-blue-hover pl-28 font-inter dark:text-blue hover:underline text-[18px]">
                        View More
                    </a>
                </div>
            </div>  
        </div>

       <!--NEWS 2-->
       <div class="pr-[1rem] flex flex-col bg-white-10 border-r-2 border-black">
        <div class="flex flex-row font-inter font-bold text-blue">
            <span class="ml-[1.5rem] text-[1.5rem] py-3">
                TITLE
            </span>
        </div>
        <div class="font-inter font-light text-[1.2rem]">
            <div class="py-4">
                <span>LOREM IPSUM DOLOR SIT AMET,
                    CONSECTETUR ADIPISCING ELIT </span>
            </div>
            <div class="ml-[1.5rem] font-inter text-black flex flex-row pb-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alarm" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M12 10l0 3l2 0" /><path d="M7 4l-2.75 2" /><path d="M17 4l2.75 2" /></svg>
                <span class="ml-2">
                    Location
                </span>
                <a href="#" href="#" onclick="window.location.href='/resources/views/mainpage.html'" class="text-blue-hover pl-28 font-inter dark:text-blue hover:underline text-[18px]">
                    View More
                </a>
            </div>
        </div>  
    </div>

 <!--NEWS 3-->
 <div class="pr-[1rem]  flex flex-col bg-white-10 border-r-2 border-black">
    <div class="flex flex-row font-inter font-bold text-blue">
        <span class="ml-[1.5rem] text-[1.5rem] py-3">
            TITLE
        </span>
    </div>
    <div class="font-inter font-light text-[1.2rem]">
        <div class="py-4">
            <span>LOREM IPSUM DOLOR SIT AMET,
                CONSECTETUR ADIPISCING ELIT </span>
        </div>
        <div class="ml-[1.5rem] font-inter text-black flex flex-row pb-8">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alarm" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M12 10l0 3l2 0" /><path d="M7 4l-2.75 2" /><path d="M17 4l2.75 2" /></svg>
            <span class="ml-2">
                Location
            </span>
            <a href="#" href="#" onclick="window.location.href='/resources/views/mainpage.html'" class="text-blue-hover pl-28 font-inter dark:text-blue hover:underline text-[18px]">
                View More
            </a>
        </div>
    </div>  
</div>

    <!--NEWS 4-->
    <div class="pr-[1rem] flex flex-col bg-white-10 border-black">
        <div class="flex flex-row font-inter font-bold text-blue">
            <span class="ml-[1.5rem] text-[1.5rem] py-3">
                TITLE
            </span>
        </div>
        <div class="font-inter font-light text-[1.2rem]">
            <div class="py-4">
            <span>LOREM IPSUM DOLOR SIT AMET,
                    CONSECTETUR ADIPISCING ELIT </span>
            </div>
            <div class="ml-[1.5rem] font-inter text-black flex flex-row pb-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alarm" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 13m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" /><path d="M12 10l0 3l2 0" /><path d="M7 4l-2.75 2" /><path d="M17 4l2.75 2" /></svg>
                <span class="ml-2">
                    Location
                </span>
                <a href="#" href="#" onclick="window.location.href='/resources/views/mainpage.html'" class="text-blue-hover pl-28 font-inter dark:text-blue hover:underline text-[18px]">
                    View More
                </a>
            </div>
        </div>  
        </div>
        </div>
    </div>

    <!--ALUMNI EVENTS-->
    <div class="w-screen py-32 text-center">
        <div class=" text-blue text-[64px] font-bold font-inter">
            ALUMNI EVENTS
        </div>
        <div class="opacity-60 pl-[10rem] ml-[20rem] mt-4 text-center w-1/2 text-[20px] text-blue font-inter">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
            tempor incididunt ut labore et dolore magna aliqua. 
        </div>
        </div>

    <!-- BANNER -->
    <div class="w-screen flex flex-grow">
            <img src="/img/AlumniEventsBanner.png">
    </div>

    <!--CALENDAR-->
    <div class="mt-12 flex flex-row place-content-evenly">
        <!--SCHED 1-->
        <div class="flex flex-col bg-white-10 drop-shadow-[0px_0px_3px_rgba(0,0,0,0.3)]">
            <div class="px-10 flex flex-row bg-blue font-inter font-bold text-white-10">
                <span class="text-[34px] px-5 py-3">
                    25
                </span>
                <span class="text-[34px] bg-blue px-5 py-3">
                    December
                </span>
            </div>
            <div class="ml-6 font-inter font-light text-[20px]">
                <div class="py-4 text-blue-hover">
                    <span>LOREM IPSUM DOLOR SIT</span>
                </div>
                <div class="font-inter text-black flex flex-row pb-8">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" /></svg>
                    <span class="ml-2">
                        Location
                    </span>
                    <a href="#" href="#" onclick="window.location.href='/resources/views/mainpage.html'" class="ml-20 pl-28 text-blue-hover pl-28 font-inter dark:text-blue hover:underline text-[18px]">
                        View More
                    </a>
                </div>
            </div>  
        </div>

       <!--SCHED 2-->
       <div class="flex flex-col bg-white-10 drop-shadow-[0px_0px_3px_rgba(0,0,0,0.3)]">
        <div class="px-10 flex flex-row bg-blue font-inter font-bold text-white-10">
            <span class="text-[34px] px-5 py-3">
                25
            </span>
            <span class="text-[34px] bg-blue px-5 py-3">
                December
            </span>
        </div>
        <div class="ml-6 font-inter font-light text-[20px]">
            <div class="py-4 text-blue-hover">
                <span>LOREM IPSUM DOLOR SIT</span>
            </div>
            <div class="font-inter text-black flex flex-row pb-8">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" /></svg>
                <span class="ml-2">
                    Location
                </span>
                <a href="#" href="#" onclick="window.location.href='/resources/views/mainpage.html'" class="ml-20 pl-28 text-blue-hover pl-28 font-inter dark:text-blue hover:underline text-[18px]">
                    View More
                </a>
            </div>
        </div>  
    </div>

 <!--SCHED 3-->
 <div class="flex flex-col bg-white-10 drop-shadow-[0px_0px_3px_rgba(0,0,0,0.3)]">
    <div class="px-10 flex flex-row bg-blue font-inter font-bold text-white-10">
        <span class="text-[34px] px-5 py-3">
            25
        </span>
        <span class="text-[34px] bg-blue px-5 py-3">
            December
        </span>
    </div>
    <div class="ml-6 font-inter font-light text-[20px]">
        <div class="py-4 text-blue-hover">
            <span>LOREM IPSUM DOLOR SIT</span>
        </div>
        <div class="font-inter text-black flex flex-row pb-8">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" /><path d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" /></svg>
            <span class="ml-2">
                Location
            </span>
            <a href="#" href="#" onclick="window.location.href='/resources/views/mainpage'" class="text-blue-hover ml-20 pl-28 font-inter dark:text-blue hover:underline text-[18px]">
                View More
            </a>
        </div>
    </div>  
    </div>
</div>

    <!-- VIEW EVENTS BUTTON-->
    <div class="w-full py-36 flex justify-center">
        <button onclick="window.location.href='/resources/views/AlumniEvents.html'" class=" hover:bg-blue-hover duration-150 hover:border-blue-hover font-inter text-center text-10 whitespace-nowrap text-white-10 py-4 my-5 px-8 bg-blue rounded border-[1px] border-blue">
    VIEW ALL EVENTS
       </button>
       </div>

       <!--FOLLOW US-->
      <div class="w-screen py-32 text-center bg-blue-hover">
        <div class="text-white-10 text-[64px] font-bold font-inter">
            FOLLOW US ON SOCIAL MEDIA
        </div>
        <div class="opacity-60 pl-[10rem] ml-[20rem] mt-4 text-center w-1/2 text-[20px] text-white-10 font-inter">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod 
            tempor incididunt ut labore et dolore magna aliqua. 
        </div>
        </div>
    
    <!-- PHOTOS-->
    <div class="w-screen px-[14rem] pb-[9rem] bg-blue-hover">
        <div class="flex flex-row place-content-evenly place-content-center">
            <img src="/img/Facebook.png">
            <img src="/img/Twitter.png">
            <img src="/img/Instagram.png">
            <img src="/img/Linkedin.png">
        </div>
        </div>

    </div>
</body>