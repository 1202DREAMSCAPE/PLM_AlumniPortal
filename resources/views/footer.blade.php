  <!--Footer-->
  <footer class="absolute w-screen h-50">
    <img class="w-screen h-screen absolute" src="/images/Footer.png" />
    <div class="absolute justify-center flex flex-row items-center inline-flex">
        <!--PLM SIDE-->
        <div class="pt-[7rem] flex flex-col">
            <div class="flex flex row">
                <img class="w-[6rem] h-[6rem] ml-[5rem] mt-5" src="/images/Logo only.png" />
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
</footer>