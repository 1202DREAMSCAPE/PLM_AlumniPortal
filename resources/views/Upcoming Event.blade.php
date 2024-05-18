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
        <div class="h-screen w-screen flex flex-col">

            <div class="flex flex-row">
                <img class= " w-[411.5px] h-[965px]" src="/images/EVENT IMAGE.png">
                <div class="pt-7  w-screen ml-[50px] flex flex-col">
                    <span class="text-[50px] font-inter font-bold text-blue ml-[2rem] ">
                        ALUMNI EVENTS
                    </span>


                    <!--Event-->
                    <div class=" mt-[5rem] w-[23rem] bg-white-10 drop-shadow-[0px_0px_3px_rgba(0,0,0,0.3)] ml-[2rem]">
                        <div class="flex flex-row bg-blue font-inter font-bold text-white-10">
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
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin"
                                    width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                    <path
                                        d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                                </svg>
                                <span class="ml-2 text-[18px]">
                                    Location
                                </span>
                                <span
                                    class="text-blue-hover pl-28 font-inter dark:text-blue hover:underline text-[18px] ">
                                    <a href="#" href="#"
                                        onclick="window.location.href='{{ url('event2') }}'" class ="hover:text-gold hover:underline ">
                                        View More
                                    </a>
                                </span>
                            </div>
                        </div>
                    </div>

                    <!--Footer-->
                    <div class=" w-screen h-screen relative top-[41rem] right-[28rem]">
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
                                        <input class="font-inter text-left px-[2rem] focus:outline-none"
                                            type="text" x-model="name" placeholder="Name (LN, FN, MI.)">
                                    </div>
                                    <div class="h-[3rem] bg-white-10 rounded-[14px] py-2 border border-white-10"
                                        x-data="{ name: '' }">
                                        <input class="font-inter text-left px-[2rem] focus:outline-none"
                                            type="text" x-model="name" placeholder="Student Number">
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
                                    <a href="#" href="#"
                                        onclick="window.location.href='{{ url('') }}'"
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
