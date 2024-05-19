<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Job Searching</title>
    <link rel="stylesheet" href="/dist/app.css">
    <link rel="stylesheet" href="/dist/output.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Katibeh:wght@400&display=swap" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
</head>

<body>

    <body class="bg-white-10 flex flex-col flex-nowrap">

        <!--HEADER-->
        <div class="flex flex-row bg-white border border-black w-screen"></div>
        <div class="flex flex-row">

            <!--PLM HEADER-->
            <img class="h-[5.5rem] w-[5.5rem] ml-8 my-2" src="/images/Logo only.png">
            <div class = " py-3 w-4/5 ml-5 flex flex-col">
                <h1 class="text-[35px] font-katibeh mt-0 -mb-2 text-gold">
                    PAMANTASAN NG LUNGSOD NG MAYNILA
                </h1>
                <h2 class="-mt-0 text-[15px] font-inter text-black-200">
                    UNIVERSITY OF THE CITY OF MANILA
                </h2>
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
                        <a href="#" onclick="window.location.href='/resources/views/services.html'"
                            class ="hover:text-gold">
                            SERVICES
                        </a>
                    </div>
                    <svg class="dropdown flex flex-col" width="18" height="18" viewBox="0 0 18 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg" @click="open = !open">
                        <path :d="open ? 'M13.5 11.25L9 6.75L4.5 11.25' : 'M13.5 6.75L9 11.25L4.5 6.75'" stroke="white"
                            class="hover:fill-current hover:text-gold" />
                    </svg>
                    <div class="bg-blue dropdown-menu absolute top-full mt-2 z-10 text-left px-[1.15rem] whitespace-nowrap"
                        :class="{ 'scale-100': open, 'scale-0': !open }" x-show="open" id="dropdownMenu">
                        <div @click="navigate('/resources/views/mainlogin.html')"
                            class="dropdown-menu-item hover:text-gold duration-150">Request For Documents</div>
                        <div @click="navigate('/resources/views/mainlogin.html')"
                            class="dropdown-menu-item hover:text-gold duration-150">Print Resume</div>
                        <div @click="navigate('/resources/views/mainlogin.html')"
                            class="dropdown-menu-item hover:text-gold duration-150">Networking</div>
                    </div>
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
                        <div onclick="window.location.href='{{ url('bookevent') }}'"
                            class="dropdown-menu-item hover:text-gold duration-150">Book an Event</div>
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
        <img class="h-70 w-screen" src="/images/image bg.png">
        <span class="absolute pt-[10rem] pl-[28rem] text-center font-inter font-bold text-[50px] text-blue">
            JOB OPPORTUNITIES
        </span>
        <span class="absolute top-[17rem] pl-[28rem] text-center font-inter font-medium text-[18px] text-black-100">
            Navigate your path to a career with your university degree
        </span>

        <div class="top-[25rem] pl-[28rem] absolute text-center">
            <div
                class="ml-[1rem] w-[30rem] h-[31px] bg-white bg-opacity-60 rounded-[10px] shadow-inner border border-blue">
                <div class="relative mb-3" x-data="{ search: '' }">
                    <form class="form-inline" action="<?php echo url('jobsearching2'); ?>" method="GET">
                        <input type="search"
                               class="text-[1.2rem] peer block w-full rounded border-0 bg-transparent landing-[1rem] px-3 pb-[2rem] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[te-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:peer-focus:text-primary [&:not([data-te-input-placeholder-active])]:placeholder:opacity-0"
                               id="NewsSearch"  x-model="search" 
                               x-on:focus="placeholder = 'Searching...'" 
                               x-on:blur="placeholder = 'Type query'" name="query" 
                               placeholder="Search...">
                        <button type="submit" class="btn btn-primary"></button>
                    </form> 
                </div>
            </div>
        </div>

        <!--GALLERY-->
        <div class=" absolute mx-auto lg:px-32 lg:pt-12 top-[30rem] ml-20">
            <div class=" flex flex-nowrap md:-m-2">
                <div class="flex w-1/3 flex-wrap">
                    <div class="w-full p-1 md:p-2">
                        <img class="w-[315px] h-[313px]  object-cover object-center"
                            src="/images/Rectangle 4355.png" />
                        <img class="w-[304px] h-[200px] top-[47px] object-cover absolute "
                            src="/images/Image Rec.png" />
                        <span
                            class="text-blue text-[24px] font-bold font-['Inter'] absolute top-[254px] pl-4 ">COMPANY</span>
                        <span
                            class="text-blue text-[20px] font-bold font-['Inter'] absolute top-[285px] pl-4 ">Location</span>
                    </div>
                </div>

                <div class="flex w-1/3 flex-wrap">
                    <div class="w-full p-1 md:p-2">
                        <img class="w-[315px] h-[313px]  object-cover object-center"
                            src="/images/Rectangle 4355.png" />
                        <img class="w-[304px] h-[200px] top-[47px] object-cover object-center absolute "
                            src="/images/Image Rec.png" />
                        <span
                            class="text-blue text-[24px] font-bold font-['Inter'] absolute top-[254px] pl-4 ">COMPANY</span>
                        <span
                            class="text-blue text-[20px] font-bold font-['Inter'] absolute top-[285px] pl-4 ">Location</span>
                    </div>
                </div>

                <div class="flex w-1/3 flex-wrap">
                    <div class="w-full p-1 md:p-2">
                        <img class="w-[315px] h-[313px]  object-cover object-center"
                            src="/images/Rectangle 4355.png" />
                        <img class="w-[304px] h-[200px] top-[47px] object-cover object-center absolute "
                            src="/images/Image Rec.png" />
                        <span
                            class="text-blue text-[24px] font-bold font-['Inter'] absolute top-[254px] pl-4 ">COMPANY</span>
                        <span
                            class="text-blue text-[20px] font-bold font-['Inter'] absolute top-[285px] pl-4 ">Location</span>
                    </div>
                </div>

            </div>
        </div>

        <img class=" absolute h-[70rem] w-screen mt-[9rem]" src="/images/Rectangle 4428.png" />

        <img class="absolute w-[500px] h-[20rem] top-[28rem] ml-[28rem] " src="/images/Rectangle 4355.png" />
        <img class="absolute w-[50px] h-[50px] ml-[31rem] top-[29rem]" src="/images/Rectangle 4363.png" />
        <span class="text-blue text-[24px] font-bold font-['Inter'] absolute top-[29rem] left-[35rem]">Company
            Name</span>
        <span class="text-black-200 text-[15px] font-medium font-['Inter'] absolute top-[31rem] left-[35rem] ">Manila
            City</span>
        <span class="text-blue text-[30px] font-bold font-['Inter'] absolute top-[33rem] left-[31rem]">Cybersecurity
            Analyst</span>
        <span class="text-black-200 text-[20px] font-medium font-['Inter'] absolute top-[35rem] left-[31rem] ">P120,000
            - P200,000</span>
        <span class="text-black-200 text-[20px] font-normal font-['Inter'] absolute top-[39rem] left-[31rem] ">Job
            Description</span>
        <button class="text-blue-pressed text-[18px] font-medium font-['Inter'] absolute top-[45rem] left-[55rem] ">
            <a href="#" href="#" onclick="window.location.href='{{ url('') }}'" class ="hover:text-gold hover:underline ">
                                        Apply
            </a>
        </button>


        <!--Footer-->
        <div class=" w-screen h-screen relative">
            <img class="w-screen h-[50rem] absolute" src="/images/Footer.png" />
            <div class="absolute justify-center flex flex-row items-center inline-flex">
                <!--PLM SIDE-->
                <div class="pt-[7rem] flex flex-col">
                    <div class="flex flex row">
                        <img class="w-[6rem] h-[6rem] ml-[5rem]" src="/images/Logo only.png" />
                        <div class=" py-3 ml-6 flex flex-col">
                            <h1 class="text-[30px] font-katibeh mt-0 -mb-2 text-white-10">
                                PAMANTASAN NG LUNGSOD NG MAYNILA
                            </h1>
                            <h2 class="-mt-1 text-[13px] text-light font-inter text-white-10">
                                UNIVERSITY OF THE CITY OF MANILA
                            </h2>
                        </div>
                    </div>
                    <div class="ml-[5rem] py-[5rem] flex flex-col text-white-10">
                        <span class="text-[20px] text-bold font-inter ">
                            Get in Touch
                        </span>
                        <span class="pt-4 text-light text-left text-[20px]">
                            Gen. Luna corner Muralla St., Intramuros Manila,
                        </span>
                        <span class="text-light text-left text-[20px]">
                            Philippines 1002
                        </span>
                    </div>
                </div>
            </div>

            <!--GOT A QUESTION?-->
            <div class="absolute justify-center flex flex-col items-center inline-flex">
                <div class="flex flex-row pt-[7rem] pl-[35rem] w-3/4 flex flex-col">
                    <h1 class="pb-[3rem] text-center font-inter font-bold text-white-10 text-[55px]">
                        GOT A QUESTION?
                    </h1>
                    <span class="text-center font-inter opacity-60 leading-7 text-white-10 text-[18px]">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                        incididunt ut labore et dolore magna aliqua.
                    </span>

                    <!--Name And Student Number-->
                    <div class="mt-[2rem] flex flex-row justify-center ">
                        <div class="mr-[2rem] h-[3rem] bg-white-10 rounded-[14px] py-2 border border-white-10"
                            x-data="{ name: '' }">
                            <input class="font-inter text-left px-[2rem] focus:outline-none" type="text"
                                x-model="name" placeholder="Name (LN, FN, MI.)">
                        </div>
                        <div class="h-[3rem] bg-white-10 rounded-[14px] py-2 border border-white-10"
                            x-data="{ name: '' }">
                            <input class="font-inter text-left px-[2rem] focus:outline-none" type="text"
                                x-model="name" placeholder="Student Number">
                        </div>
                    </div>
                </div>

                <!--Email And Year-->
                <div class="mt-[1rem] ml-[35rem] flex flex-row justify-center ">
                    <div class="mr-[2rem] h-[3rem] bg-white-10 rounded-[14px] py-2 border border-white-10"
                        x-data="{ name: '' }">
                        <input class="font-inter text-left px-[2rem] focus:outline-none" type="text"
                            x-model="name" placeholder="Email of Graduation">
                    </div>
                    <div class="h-[3rem] bg-white-10 rounded-[14px] py-2 border border-white-10"
                        x-data="{ name: '' }">
                        <input class="font-inter text-left px-[2rem] focus:outline-none" type="text"
                            x-model="name" placeholder="Year of Graduation">
                    </div>
                </div>

                <!--MESSAGE-->
                <div class="mt-[1rem] ml-[35rem] flex flex-row justify-center ">
                    <div class="mx-[2rem] h-[6rem] w-[37rem] bg-white-10 rounded-[14px] py-3 border border-white-10"
                        x-data="{ name: '' }">
                        <input class="font-inter text-left px-[2rem] focus:outline-none" type="text"
                            x-model="name" placeholder="Mesage">
                    </div>
                </div>

                <!--SUBMIT-->
                <div class="mt-[1rem] ml-[35rem] flex flex-row justify-center ">
                    <button
                        class="font-inter text-center text-10 whitespace-nowrap text-blue py-4 my-5 px-14 bg-white-10 rounded-[1rem] border-[1px] border-blue">
                        <a href="#" href="#" onclick="window.location.href='{{ url('') }}'"
                            class="hover:underline hover:text-gold ">
                            SUBMIT
                        </a>
                    </button>
                </div>

                <!--CREDITS-->
                <div class="mt-[5rem] text-[20px] text-center font-inter text-white-10">
                    © 1967 - 2024 Pamantasan ng Lungsod ng Maynila. All Rights Reserved
                </div>
            </div>

    </body>

</html>
