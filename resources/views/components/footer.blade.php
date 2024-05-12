<!--Footer-->
<div class="relative w-screen h-screen flex justify-center items-center">
    <img class="absolute inset-0 w-full h-full object-cover z-0" src="/images/Footer.png" alt="Footer Background" />
    <div class="absolute inset-0 flex justify-center items-center">

        <!--PLM SIDE-->
        <div class="pt-12 flex flex-col text-white">
            <div class="flex items-center">
                <img class="w-24 h-24 ml-4" src="/images/Logo only.png" alt="University Logo">
                <div class="ml-4">
                    <h1 class="text-2xl font-bold">
                        PAMANTASAN NG LUNGSOD NG MAYNILA
                    </h1>
                    <h2 class="text-sm">
                        UNIVERSITY OF THE CITY OF MANILA
                    </h2>
                </div>
            </div>
            <div style="height: 3cm"></div>
            <div class="ml-4 pt-6">
                <span class="block text-2xl font-bold">
                    Get in Touch
                </span>
                <span class="block mt-2">
                    Gen. Luna corner Muralla St., Intramuros Manila,
                </span>
                <span class="block">
                    Philippines 1002
                </span>
            </div>
        </div>

        <!--GOT A QUESTION?-->
        <div style="height: 1inch"></div>
        <div style="width: 2cm"></div>

        <div class="pl-40 w-3/4 flex flex-col text-white">
            <h1 class="pb-8 text-center font-bold text-3xl">
                GOT A QUESTION?
            </h1>
            <div style="height: cm"></div>
            <p class="text-center opacity-75 leading-7">
                Fill out our form and let us assist you promptly. Your queries matter to us!</p>

            <!--Name And Student Number-->
            <div class="mt-6 flex flex-col sm:flex-row sm:space-x-4 justify-center">
                <input class="w-full sm:w-[calc(50%-0.5rem)] h-12 bg-gray-100 rounded-md px-4 focus:outline-none mb-4 sm:mb-0" type="text" placeholder="Name (LN, FN, MI.)">
                <div style="width: 1cm"></div>
                <input class="w-full sm:w-[calc(50%-0.5rem)] h-12 bg-gray-100 rounded-md px-4 focus:outline-none" type="text" placeholder="Student Number">
            </div>

            <!--Email And Year-->
            <div class="mt-4 flex flex-col sm:flex-row sm:space-x-4 justify-center">
                <input class="w-full sm:w-[calc(50%-0.5rem)] h-12 bg-gray-100 rounded-md px-4 focus:outline-none mb-4 sm:mb-0" type="text" placeholder="Email of Graduation">
                <div style="width: 1cm"></div>
                <input class="w-full sm:w-[calc(50%-0.5rem)] h-12 bg-gray-100 rounded-md px-4 focus:outline-none" type="text" placeholder="Year of Graduation">
            </div>

            <!--MESSAGE-->
            <div class="mt-4 flex justify-center">
                <input class="w-full h-24 bg-gray-100 rounded-md px-4 focus:outline-none" type="text" placeholder="Message">
            </div>

            <!--Submit Button-->
            <div class="mt-4 flex justify-center">
                <button class="whitespace-nowrap py-4 px-4 bg-white rounded-lg text-primary-500 hover:bg-blue-600">
                    <a href="#" onclick="window.location.href='{{ url('') }}'" class="hover:underline">
                        SUBMIT
                    </a>
                </button>
            </div>
 
            <div style="height: 3cm"></div>
            <!--CREDITS-->
            <div class="mt-12 text-lg text-center opacity-75 pr-2">
                © 1967 - 2024 Pamantasan ng Lungsod ng Maynila. All Rights Reserved               
            </div>
        </div>
    </div>
</div>
