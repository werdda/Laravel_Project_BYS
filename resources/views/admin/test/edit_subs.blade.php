<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="{{asset('css/output.css')}}" rel="stylesheet">
    <title>People Details - BeYourSelf</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
</head>
<body class="font-poppins text-[#0A090B]">
    <section id="content" class="flex">
        <div id="sidebar" class="w-[270px] flex flex-col shrink-0 min-h-screen justify-between p-[30px] border-r border-[#EEEEEE] bg-[#FBFBFB]">
            <div class="w-full flex flex-col gap-[30px]">
                <a href="index.html" class="flex items-center justify-center">
                    <img src="{{asset('images/logo/logo.svg')}}" alt="logo">
                </a>
                <ul class="flex flex-col gap-3">
                    <li>
                        <h3 class="font-bold text-xs text-[#A5ABB2]">DAILY USE</h3>
                    </li>
                    <li>
                        <a href="{{route('dashboard')}}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                            <div>
                                <img src="{{asset('/images/icons/home-hashtag.svg')}}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 hover:text-white">Dashboard</p>
                        </a>
                    </li>
                   
                    <li>
                        <a href="{{route('dashboard.test.index')}}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                            <div>
                                <img src="{{asset('/images/icons/note-favorite-1.svg')}}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 hover:text-white">Health Test</p>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('dashboard.premium.index')}}" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 bg-[#2B82FE] transition-all duration-300 hover:bg-[#2B82FE]">
                            <div>
                                <img src="{{asset('/images/front/icon/profile-2user1.svg')}}" alt="icon">
                            </div>
                            <p class="font-semibold text-white transition-all duration-300 hover:text-white">Active Premium</p>
                        </a>
                    </li>

                    
                </ul>
                <ul class="flex flex-col gap-3">
                    <li>
                        <h3 class="font-bold text-xs text-[#A5ABB2]">OTHERS</h3>
                    </li>
                    <li>
                        <a href="" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                            <div>
                                <img src="{{asset('/images/icons/setting-2.svg')}}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 hover:text-white">Settings</p>
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <button type="submit" class="w-full p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                                <div>
                                    <img src="{{asset('images/icons/security-safe.svg')}}" alt="icon">
                                </div>
                                <p class="font-semibold transition-all duration-300 hover:text-white">Logout</p>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
            
        </div>
        <div id="menu-content" class="flex flex-col w-full pb-[30px]">
            <div class="nav flex justify-between p-5 border-b border-[#EEEEEE]">
                <form class="search flex items-center w-[400px] h-[52px] p-[10px_16px] rounded-full border border-[#EEEEEE]">
                    <input type="text" class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none" placeholder="Search by report, health test, etc" name="search">
                    <button type="submit" class="ml-[10px] w-8 h-8 flex items-center justify-center">
                        <img src="{{asset('images/icons/search.svg')}}" alt="icon">
                    </button>
                </form>
                <div class="flex items-center gap-[30px]">
                    <div class="flex gap-[14px]">
                        <a href="" class="w-[46px] h-[46px] flex shrink-0 items-center justify-center rounded-full border border-[#EEEEEE]">
                            <img src="{{asset('images/icons/receipt-text.svg')}}" alt="icon">
                        </a>
                        <a href="" class="w-[46px] h-[46px] flex shrink-0 items-center justify-center rounded-full border border-[#EEEEEE]">
                            <img src="{{asset('images/icons/notification.svg')}}" alt="icon">
                        </a>
                    </div>
                    <div class="h-[46px] w-[1px] flex shrink-0 border border-[#EEEEEE]"></div>
                    <div class="flex gap-3 items-center">
                        <div class="flex flex-col text-right">
                            <p class="text-sm text-[#7F8190]">Howdy</p>
                            <p class="font-semibold">{{Auth::user()->name}}</p>
                        </div>
                        <div class="w-[46px] h-[46px]">
                            <img src="{{asset('images/photos/default-photo.svg')}}" alt="photo">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-10 px-5 mt-5">
                <div class="breadcrumb flex items-center gap-[30px]">
                    <a  class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Home</a>
                    <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
                    <a href="{{route('dashboard.premium.index')}}" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Manage Premium</a>
                    <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
                    <a class="text-[#7F8190] last:text-[#0A090B] last:font-semibold ">People Details</a>
                </div>
            </div>
            <div class="header ml-[70px] pr-[70px] w-[940px] flex items-center justify-between mt-10">
                <div class="flex gap-6 items-center">
                    <div class="w-[150px] h-[150px] flex shrink-0 relative overflow-hidden">
                        <img src="{{asset('images/photos/default-photo.svg')}}" class="w-full h-full object-contain" alt="icon"> 
                    </div>
                    <div class="flex flex-col gap-5">
                        <h1 class="font-extrabold text-[30px] leading-[45px]">{{ $userPremium->user->name }}</h1>
                        <div class="flex items-center gap-5">
                            <div class="flex gap-[10px] items-center">
                                <div class="w-6 h-6 flex shrink-0">
                                    <img src="{{asset('images/icons/calendar-add.svg')}}" alt="icon">
                                </div>
                                <p class="font-semibold">{{ \Carbon\Carbon::parse($userPremium->created_at)->format('F j, Y') }}</p>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            @if($errors->any())
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li class="py-5 px-5 bg-red-700 text-white">
                            {{ $error }}
                        </li>
                            
                        @endforeach
                    </ul>
                @endif
            <form method="POST" action="{{route('dashboard.premium.update', $userPremium->id)}}" class="mx-[70px] mt-[30px] flex flex-col gap-5">
                @csrf
                @method('PUT')
                <h2 class="font-bold text-2xl">Check Payment</h2>
                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold">Proof Picture</p>
                    
                    <div class="w-[450px] h-[450px] flex shrink-0 relative overflow-hidden">
                        <img src="{{Storage::url($userPremium->proof)}}"" class="w-full h-full object-contain" alt="icon"> 
                    </div>
                </div>
                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold">Submit Date</p>
                    <p class="text-[#7F8190]"><p class="text-[#7F8190]">{{ \Carbon\Carbon::parse($userPremium->created_at)->format('F j, Y H:i') }}</p>
                    
                </div>
                <button type="submit" class="w-[500px] h-[52px] p-[14px_20px] bg-[#5EC1F9] rounded-full font-bold text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#5EC1F9] text-center">Approve Premium</button>
            </form>
        </div>
    </section>
    
</body>
</html>