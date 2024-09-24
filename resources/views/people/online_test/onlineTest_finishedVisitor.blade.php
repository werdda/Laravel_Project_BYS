<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <title>{{$test->name}} Finished</title>
  <link href="{{asset('css/output.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
</head>
<body class="font-poppins text-[#0A090B]">
    <section id="content">
        <div class="border-b border-[#EEEEEE]">
            <div class="nav flex items-center w-full h-[92px] max-w-[1280px] mx-auto justify-between p-5">
                <div class="flex items-center gap-4">
                    <div class="w-[50px] h-[50px] flex shrink-0 overflow-hidden rounded-full">
                    @if ($test->category->slug == 'phq-9')
                            <img src="{{asset('images/front/icon/phq9.svg')}}" class="object-cover" alt="thumbnail">
                        @elseif ($test->category->slug == 'gad-7')  
                            <img src="{{asset('images/front/icon/gad7.svg')}}" class="object-cover" alt="thumbnail">
                        @else
                            <img src="{{asset('images/front/icon/pss.svg')}}" class="object-cover" alt="thumbnail">
                        @endif
                    </div>
                    <div class="flex flex-col gap-[2px]">
                        <p class="font-bold text-lg">{{$test->name}}</p>
                        <p class="text-[#7F8190] text-sm">{{$test->category->name}}</p>
                    </div>
                </div>
                <div class="flex gap-3 items-center">
                    <div class="flex flex-col text-right">
                        <p class="text-sm text-[#7F8190]">Howdy</p>
                        <p class="font-semibold">Visitor</p>
                    </div>
                    <div class="w-[46px] h-[46px]">
                        <img src="{{asset('images/photos/default-photo.svg')}}" alt="photo">
                    </div>
                </div>
            </div>
        </div>
        <div class="finished flex flex-col gap-[40px] items-center justify-center mt-[120px] mb-[30px] w-full">
            <div class="w-[200px] h-[200px] flex shrink-0 overflow-hidden">
                @if ($test->category->slug == 'phq-9')
                            <img src="{{asset('images/front/icon/phq9.svg')}}" class="object-contain" alt="icon">
                        @elseif ($test->category->slug == 'gad-7')  
                            <img src="{{asset('images/front/icon/gad7.svg')}}" class="object-contain" alt="icon">
                        @else
                            <img src="{{asset('images/front/icon/pss.svg')}}" class="object-contain" alt="icon">
                        @endif
            </div>
            <div class="flex flex-col gap-[6px] justify-center text-center">
            @if($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                    <li class="py-5 px-5 bg-red-700 text-white">
                        {{ $error }}
                    </li>
                        
                    @endforeach
                </ul>
            @endif
             <h1 class="font-bold text-2xl">You Have Finished {{$test->name}}</h1>
                 @foreach ($analisis as $item)
                <p class="text-[#7F8190] w-[374px]">Hasil dari test anda, {{ $item->title }}</p>
                 @endforeach
            </div>
            <form method="POST" action="{{route('testAnswer.destroy', $test)}}">
                @csrf
                @method('DELETE')
                    <button  class="w-fit p-[14px_30px] bg-[#5EC1F9] rounded-full font-bold text-sm text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#5EC1F9] text-center align-middle">
                        <a>Back To Home</a>
                    </button>
            </form>
        </div>
    </section>

</body>
</html>