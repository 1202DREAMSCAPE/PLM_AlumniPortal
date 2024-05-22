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
        <button 
            onclick="window.location.href='/alumni'" 
            class="hover:bg-blue-hover duration-150 hover:border-blue-hover font-inter text-center text-16 whitespace-nowrap text-white-10 my-6 px-14 py-2 bg-blue rounded border-[1px] border-blue">
            LOG IN
        </button>
    </div>
</div>

<!--NAVBAR-->
<div class="bg-blue h-1/5 w-screen">
    <navbar class="text-bold text-white-30 text-paragraph3 py-[0.5rem] place-content-evenly font-inter w-screen flex flex-row">
        <div>
            <a href="{{ url('applypartnership') }}" class="hover:text-gold">APPLY PARTNERSHIP</a>
        </div>
        <div>
            <a href="#" onclick="window.location.href='{{ url('news1') }}'" class="hover:text-gold">NEWS AND UPDATES</a>
        </div>
        <div class="relative flex flex-row" x-data="{ open: false }" @click.away="open = false">
            <div>
                <a href="#" onclick="window.location.href='{{ url('/gallery1') }}'" class="hover:text-gold">ALUMNI EVENT GALLERY</a>
            </div>
        </div>
    </navbar>
</div>

<!--MAIN PAGE-->
<div class="flex flex-col">
    <!-- Display Success Message -->
    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <!--Apply Partnership-->
    <div class="flex flex-row">
        <img src="/images/Image w overlay blue.png">
        <div class="pt-7 w-screen text-center flex flex-col">
            <span class="mt-2 text-[60px] font-inter font-bold text-blue">BE OUR PARTNER</span>
            <span class="text-[17px] w-[700px] h-[63px] ml-[5rem] mt-1 font-inter font-light opacity-60 text-blue-hover whitespace-pre-line">
                Explore boundless possibilities for innovation and talent collaboration by joining forces with our esteemed university, cultivating a dynamic partnership.
            </span>

            <!-- FORMS -->
            <form action="{{ route('submit-partnership') }}" method="POST" class="mt-4">
                @csrf
                <!-- Company Name -->
                <div class="mx-[8.2rem] mt-[2rem] h-[3rem] bg-white rounded-[14px] py-2 border border-blue">
                    <input class="font-inter text-center px-[2rem] focus:outline-none" type="text" name="ComName" placeholder="Company Name *" required>
                </div>

                <!-- Email Address -->
                <div class="mx-[8.2rem] mt-[1.5rem] h-[3rem] bg-white rounded-[14px] py-2 border border-blue">
                    <input class="font-inter text-center px-[2rem] focus:outline-none" type="email" name="EmailAdd" placeholder="Company Email Address *" required>
                </div>

                <!-- Company Address -->
                <div class="mx-[8.2rem] mt-[1.5rem] h-[3rem] bg-white rounded-[14px] py-2 border border-blue">
                    <input class="font-inter text-center px-[2rem] focus:outline-none" type="text" name="Address" placeholder="Company Address *" required>
                </div>

                <!-- Primary Contact Person -->
                <div class="mx-[8.2rem] mt-[1.5rem] h-[3rem] bg-white rounded-[14px] py-2 border border-blue">
                    <input class="font-inter text-center px-[2rem] focus:outline-none" type="text" name="CPerson" placeholder="Primary Contact Person *" required>
                </div>

                <!-- Type of Partnership -->
                <div class="relative mx-[8.2rem] mt-[1.5rem] h-[3rem] bg-white rounded-[14px] py-2 border border-blue">
    <select class="font-inter text-center appearance-none  h-full bg-transparent text-black px-4" name="PartType" required>
        <option value="" disabled selected class="text-gray-500">Type of Partnership</option>
        <option value="General Partnership">General Partnership</option>
        <option value="Limited Partnership">Limited Partnership</option>
        <option value="Limited Liability Partnership">Limited Liability Partnership</option>
    </select>
    <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none">
        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </div>
</div>


                <!-- Start & End Date -->
                <div class="mx-[8.2rem] mt-[1.5rem] flex flex-row justify-self-center">
                    <div class="mr-[2rem] h-[3rem] w-1/2 bg-white rounded-[14px] py-2 border border-blue">
                        <input class="font-inter text-center px-[4rem] focus:outline-none" type="date" name="StartDate" placeholder="Start Date *" required>
                    </div>
                    <div class="h-[3rem] w-1/2 bg-white rounded-[14px] py-2 border border-blue">
                        <input class="font-inter text-center px-[4rem] focus:outline-none" type="date" name="EndDate" placeholder="End Date *" required>
                    </div>
                </div>

                <!-- SUBMIT BUTTON -->
                <div class="w-full py-35 mt-4 flex justify-center">
                    <button class="hover:bg-blue-hover duration-150 hover:border-blue-hover font-inter text-center text-16 whitespace-nowrap text-white-10 my-6 px-14 py-3 bg-blue rounded border-[1px] border-blue">
                        SUBMIT
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
