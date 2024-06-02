<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Upcoming Event</title>
    <link rel="stylesheet" href="/dist/app.css">
    <link rel="stylesheet" href="/dist/output.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Katibeh:wght@400&display=swap" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.13.3/dist/cdn.min.js"></script>
</head>


<body>

    <body class="bg-white-10 flex flex-col flex-nowrap">

        <!--HEADER-->
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
        <div class="h-screen w-screen flex flex-col">

            <div class="pt-8 w-screen ml-20 flex flex-col">
                <span class="ml-[12rem] my-[3rem] text-[60px] font-inter font-bold text-blue">
                    NEWS AND UPDATES
                </span>
                <div class="flex flex-row ml-[8rem] pb-[5rem]">
                    <img class="w-[697px] h-[486px]" src="/images/Group 8686.png">
                    <span class="absolute ml-[3rem] mt-[27rem] text-[24px] font-inter font-semibold text-white-10">
                        LOREM IPSUM DOLOR SIT AMET
                    </span>
                    <div class="flex flex-col">
                        <span
                            class=" mx-[3rem] pr-[3rem] mt-[3.5rem] whitespace-pre-line text-[24px] font-inter font-bold text-blue-pressed ">
                            LOREM IPSUM DOLOR SIT AMET,
                            CONSECTETUR ADISPISCING ELIT
                        </span>
                        <span class="mx-[3rem] pr-[3rem] mt-[2rem] text-[20px] font-inter font-bold text-black-300 ">
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
                        </span>
                    </div>

                </div>
            </div>
        </div>

    </body>

</html>
