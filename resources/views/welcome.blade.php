<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="{{asset('css/front/output.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
</head>
<body class="text-black font-poppins ">
    <div id="hero-section" class="pt-10 mx-auto w-full flex flex-col gap-10 pb-[50px] bg-center bg-no-repeat bg-cover  overflow-hidden" style="background-image: url('{{ asset('images/front/background/Hero-Banner.png') }}');">
        <nav class="flex justify-between items-center pt-6 px-[50px]">
            <a href="">
                <img src="{{asset('images/front/logo/logo.svg')}}" alt="logo">
            </a>
            <div class="flex gap-[10px] items-center">
                <a href="{{route('register')}}" class="text-white font-semibold rounded-[30px] p-[16px_32px] ring-1 ring-white transition-all duration-300 hover:ring-2 hover:ring-[#FF6129]">Sign Up</a>
                <a href="{{route('login')}}" class="text-white font-semibold rounded-[30px] p-[16px_32px] bg-[#FF6129] transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980]">Sign In</a>
            </div>
        </nav>
        <div class="flex flex-col items-center pb-[50px] pt-[70px] gap-[70px]">
            
            <div class="flex flex-col gap-[70px]">
                <h1 class="font-semibold text-[80px] leading-[82px] text-center text-white ">Take a Mental Health Test.</h1>
                <p class="text-center text-xl leading-[36px] text-[#F5F8FA]">Online screening is one of the easiest and quickest way<br> to determine your mental health condition.<br></p>
            </div>
            <div class="flex gap-6 w-fit">
                <a href="{{route('login')}}"  class="text-white font-semibold rounded-[30px] p-[16px_32px] bg-[#FF6129] transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980]">Test My Mental Health Now</a>
               
            </div>
        </div>
        <div class="flex gap-[70px] pb-[50px] items-center justify-center">
            <div>
                <img src="{{asset('images/front/icon/logo-55.svg')}}" alt="icon">
            </div>
            <div>
                <img src="{{asset('images/front/icon/logo.svg')}}" alt="icon">
            </div>
            <div>
                <img src="{{asset('images/front/icon/logo-54.svg')}}" alt="icon">
            </div>
            <div>
                <img src="{{asset('images/front/icon/logo.svg')}}" alt="icon">
            </div>
            <div>
                <img src="{{asset('images/front/icon/logo-52.svg')}}" alt="icon">
            </div>
        </div>
    </div>
    
    <section id="Top-Categories" class="max-w-[1200px] mx-auto flex flex-col p-[70px_50px] gap-[30px]">
        <div class="flex flex-col gap-[30px]">
            <div class="flex flex-col">
                <h2 class="font-bold text-[40px] leading-[60px]">Browse Mental Health Test</h2>
                <p class="text-[#6D7786] text-lg -tracking-[2%]">Online screening is one of the easiest and quickest way to determine your mental health condition.</p>
            </div>
        </div>
        <div class="grid grid-cols-3 gap-[30px]">
            <a href="{{ route('onlineTest.visitor.test', ['test' => 1, 'question' => 'visitor' ]) }}" class="card flex items-center p-4 gap-3 ring-1 ring-[#DADEE4] rounded-2xl hover:ring-2 hover:ring-[#FF6129] transition-all duration-300">
                <div class="w-[70px] h-[70px] flex shrink-0">
                    <img src="{{asset('images/front/icon/phq9.svg')}}" class="object-contain" alt="icon">
                </div>
                <p class="font-bold text-lg">Depresi</p>
                <p class="">| PHQ-9 Test</p>
            </a>
            <a href="{{ route('onlineTest.visitor.test', ['test' => 2, 'question' => 'visitor' ]) }}" class="card flex items-center p-4 gap-3 ring-1 ring-[#DADEE4] rounded-2xl hover:ring-2 hover:ring-[#FF6129] transition-all duration-300">
                <div class="w-[70px] h-[70px] flex shrink-0">
                    <img src="{{asset('images/front/icon/gad7.svg')}}" class="object-contain" alt="icon">
                </div>
                <p class="font-bold text-lg">Kecemasan</p>
                <p class="">| GAD-7 Test</p>
            </a>
            <a href="{{ route('onlineTest.visitor.test', ['test' => 3, 'question' => 'visitor' ]) }}" class="card flex items-center p-4 gap-3 ring-1 ring-[#DADEE4] rounded-2xl hover:ring-2 hover:ring-[#FF6129] transition-all duration-300">
                <div class="w-[70px] h-[70px] flex shrink-0">
                    <img src="{{asset('images/front/icon/pss.svg')}}" class="object-contain" alt="icon">
                </div>
                <p class="font-bold text-lg">Stress</p>
                <p class="">| PSS Test</p>
            </a>
        </div>
    </section>
    <section id="Pricing" class="max-w-[1200px] mx-auto flex justify-between items-center p-[70px_100px]">
        <div class="relative">
            <div class="w-[355px] h-[488px]">
                <img src="{{asset('images/front/background/benefit_illustration.png')}}" alt="icon">
            </div>
            <div class="absolute w-[230px] transform -translate-y-1/2 top-1/2 left-[214px] bg-white z-10 rounded-[20px] gap-4 p-4 flex flex-col shadow-[0_17px_30px_0_#0D051D0A]">
                <p class="font-semibold">Category Test</p>
                <div class="flex gap-2 items-center">
                    <div>
                        <img src="{{asset('images/front/icon/3dcube.svg')}}" alt="icon">
                    </div>
                    <p class="font-medium">PSS</p>
                </div>
                <div class="flex gap-2 items-center">
                    <div>
                        <img src="{{asset('images/front/icon/3dcube.svg')}}" alt="icon">
                    </div>
                    <p class="font-medium">GAD-7</p>
                </div>
                <div class="flex gap-2 items-center">
                    <div>
                        <img src="{{asset('images/front/icon/3dcube.svg')}}" alt="icon">
                    </div>
                    <p class="font-medium">PHQ-9</p>
                </div>
            </div>
        </div>
        <div class="flex flex-col text-left gap-[30px]">
            <h2 class="font-bold text-[36px] leading-[52px]">Take a test From <br>Anywhere Anytime <br>You Want</h2>
            <p class="text-[#475466] text-lg leading-[34px]">We value your privacy. Your information is kept <br>confidential with top security standards. We are<br> committed to protecting your data and ensuring<br> transparency, so you can feel safe using our <br>services.</p>
            <a href="{{route('login')}}" class="text-white font-semibold rounded-[30px] p-[16px_32px] bg-[#FF6129] transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980] w-fit">Take Test</a>
        </div>
    </section>
    <section id="FAQ" class="bg-[#F5F8FA]">
        <section class="max-w-[1200px] mx-auto flex flex-col py-[70px] px-[100px] ">
            <div class="flex justify-between items-center">
                <div class="flex flex-col gap-[30px]">
                    
                    <div class="flex flex-col">
                        <h2 class="font-bold text-[36px] leading-[52px]">Get Your Answers</h2>
                        <p class="text-lg text-[#475466]">We're here to help answer your questions.</p>
                    </div>
                    <a href="" class="text-white font-semibold rounded-[30px] p-[16px_32px] bg-[#FF6129] transition-all duration-300 hover:shadow-[0_10px_20px_0_#FF612980] w-fit">Contact Us</a>
                </div>
                <div class="flex flex-col gap-[30px] w-[552px] shrink-0">
                    <div class="flex flex-col p-5 rounded-2xl bg-[#FFF8F4] has-[.hide]:bg-transparent border-t-4 border-[#FF6129] has-[.hide]:border-0 w-full">
                        <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-1">
                            <span class="font-semibold text-lg text-left">How can mental health test help me?</span>
                            <div class="arrow w-9 h-9 flex shrink-0">
                                <img src="{{asset('images/front/icon/add.svg')}}" alt="icon">
                            </div>
                        </button>
                        <div id="accordion-faq-1" class="accordion-content hide">
                            <p class="leading-[30px] text-[#475466] pt-[10px]">Taking a mental health test online is a great way to keep tabs on your mental health. It can help give you a sense of what’s going on.</p>
                        </div>
                    </div>
                    <div class="flex flex-col p-5 rounded-2xl bg-[#FFF8F4] has-[.hide]:bg-transparent border-t-4 border-[#FF6129] has-[.hide]:border-0 w-full">
                        <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-2">
                            <span class="font-semibold text-lg text-left">How does the online test work?</span>
                            <div class="arrow w-9 h-9 flex shrink-0">
                                <img src="{{asset('images/front/icon/add.svg')}}" alt="icon">
                            </div>
                        </button>
                        <div id="accordion-faq-2" class="accordion-content hide">
                            <p class="leading-[30px] text-[#475466] pt-[10px]">Online screening tools are meant to be a quick review of your mental health. We try to give focused question regarding the mental health such as depression, anxiety, and stress.</p>
                        </div>
                    </div>
                    <div class="flex flex-col p-5 rounded-2xl bg-[#FFF8F4] has-[.hide]:bg-transparent border-t-4 border-[#FF6129] has-[.hide]:border-0 w-full">
                        <button class="accordion-button flex justify-between gap-1 items-center" data-accordion="accordion-faq-3">
                            <span class="font-semibold text-lg text-left">Privacy of data?</span>
                            <div class="arrow w-9 h-9 flex shrink-0">
                                <img src="{{asset('images/front/icon/add.svg')}}" alt="icon">
                            </div>
                        </button>
                        <div id="accordion-faq-3" class="accordion-content hide">
                            <p class="leading-[30px] text-[#475466] pt-[10px]">We understand your concerns regarding your data. We kept your data stored anonymously for analysis purposes only.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
        crossorigin="anonymous"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    <script src="{{asset('js/main.js')}}"></script>
    
</body>
</html>