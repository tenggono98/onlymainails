<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}


    <div class="flex justify-between p-2 lg:p-5">
        <div class="">
            {{-- <h1 class="uppercase lg:text-2xl">Only Mai Nails</h1> --}}
        </div>
        <div class="lg:justify-center">
            <ul class="flex justify-center gap-4">
                <li>Already Member?</li>
                <li>Login</li>
                <li>Sign Up</li>
            </ul>

        </div>


    </div>

    <section id="nav-dekstop" class="bg-[#fadde1] p-5">


        <div class="flex justify-between w-full ">

            {{-- Logo --}}
            <div class="">
                <img src="{{ asset('img/transparant-logo.png') }}" class="h-28" alt="">
            </div>
            {{-- Logo --}}

            {{-- Menu --}}
            <div class="flex items-center justify-center ">
                <ul class="flex justify-center gap-5 uppercase list-none">
                    <li><a href="{{ Route('home') }}">Home</a></li>
                    <li><a href="">Our Services</a></li>
                    <li><a href="">Contact Us</a></li>
                    <li><a href="{{ Route('book') }}">Book</a></li>
                </ul>
            </div>
            {{-- Menu --}}

        </div>

    </section>



</div>
