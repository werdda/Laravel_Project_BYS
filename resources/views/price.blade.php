<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Price</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{asset('css/front/output.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"
    />
</head>
<body class="text-black font-poppins">
    @if(session('error'))
        <script>
            // Menampilkan notifikasi popup menggunakan JavaScript
            alert("{{ session('error') }}");
        </script>
    @endif
    <div id="hero-section" style="background-image: url('{{ asset('images/front/background/Hero-Banner.png') }}');" class=" mx-auto w-full h-[536px] flex flex-col gap-10 pb-[50px] bg-center bg-no-repeat bg-cover overflow-hidden relative">
        <nav class="flex justify-between items-center pt-6 px-[50px]">
            <a href="index.html">
                <img src="{{asset('images/front/logo/logo.svg')}}" alt="logo">
            </a>
            <ul class="flex items-center gap-[30px] text-white">
                
                <li>
                    @if (Auth::user()->role == 'admin')
                    <a href="{{route('dashboard') }}" class="font-semibold">Dashboard</a>
                    @else
                    <a href="{{route('user.dashboard') }}" class="font-semibold">Dashboard</a>
                @endif
                </li>
                <li>
                    <a href="" class="font-semibold">Price</a>
                </li>
            </ul>
               
           
            <div class="flex gap-[10px] items-center">
                <div class="flex flex-col items-end justify-center">
                    <p class="font-semibold text-white">Hi, {{Auth::user()->name}}</p>
                </div>
                <div class="w-[56px] h-[56px] overflow-hidden rounded-full flex shrink-0">
                    <img src="{{asset('images/photos/default-photo.svg')}}" class="w-full h-full object-cover" alt="photo">
                </div>
            </div>
        </nav>
    </div>
    <section class="max-w-[1100px] w-full mx-auto absolute -translate-x-1/2 left-1/2 top-[170px]">
        <div class="flex flex-col gap-[30px] items-center">
            <div class="flex flex-col text-white text-center">
                <h2 class="font-bold text-[40px] leading-[60px]">See Full Analysis of Your Condition</h2>
                <p class="text-lg -tracking-[2%]">Full Analysis of your condition based on scientific journals and professionals reports</p>
            </div>
            <div class="max-w-[1000px] w-full flex gap-[30px]">
                <div class="flex flex-col mx-auto  rounded-3xl p-8 gap-[30px] bg-white h-fit">
                    <div class="flex flex-col gap-5">
                        <div class="flex flex-col gap-4">
                            <p class="font-semibold text-4xl leading-[54px]">Premium</p>
                            <p class="text-[#475466] text-lg">All access to more than 1,000 analysis reports about mental health </p>
                        </div>
                        <div class="flex flex-col gap-1">
                            <p class="font-semibold text-4xl leading-[54px]">Rp 10.000</p>
                            <p class="text-[#475466] text-lg">Lifetime</p>
                        </div>
                        <div class="flex flex-col gap-4">
                            <div class="flex gap-3">
                                <div class="w-6 h-6 flex shrink-0">
                                    <img src="{{asset('images/front/icon/tick-circle.svg')}}" class="w-full h-full object-cover" alt="icon">
                                </div>
                                <p class="text-[#475466]">In Depth Analysis of your mental health</p>
                            </div>
                            <div class="flex gap-3">
                                <div class="w-6 h-6 flex shrink-0">
                                    <img src="{{asset('images/front/icon/tick-circle.svg')}}" class="w-full h-full object-cover" alt="icon">
                                </div>
                                <p class="text-[#475466]">Access All Material Analysis</p>
                            </div>
                            <div class="flex gap-3">
                                <div class="w-6 h-6 flex shrink-0">
                                    <img src="{{asset('images/front/icon/tick-circle.svg')}}" class="w-full h-full object-cover" alt="icon">
                                </div>
                                <p class="text-[#475466]">Newsletter & Journals</p>
                            </div>
                            <div class="flex gap-3">
                                <div class="w-6 h-6 flex shrink-0">
                                    <img src="{{asset('images/front/icon/tick-circle.svg')}}" class="w-full h-full object-cover" alt="icon">
                                </div>
                                <p class="text-[#475466]">Report Details</p>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('checkout')}}" class="p-[20px_32px] bg-[#FF6129] text-white rounded-full text-center font-semibold text-xl transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980]">Subscribe Now</a>
                </div>
            </div>
        </div>
    </section>
    <section  class="bg-[#F5F8FA] h-[250px] ">
    </section>
    <footer class=" mx-auto flex flex-col pt-[70px] pb-[50px] px-[100px] gap-[50px] bg-[#F5F8FA]">
        <div class="w-full h-[51px] flex items-end border-t border-[#aab2b7]">
            <p class="mx-auto text-sm text-[#6D7786] -tracking-[2%]">All Rights Reserved BeYourSelf 2024</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script
        src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
        crossorigin="anonymous">
    </script>

    <script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>  

    <script src="{{asset('js/main.js')}}"></script>
    </body>
</html>