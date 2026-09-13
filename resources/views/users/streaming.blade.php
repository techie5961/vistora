@extends('layout.users.app')
@section('title')
    Music Streaming
@endsection
@section('main')
<section x-data="{ 
    TrackModal : false,
    RewardModal : false,
    Track : {
        ID : '',
        Banner : '',
        Audio : '',
        Name : '',
        Artist : '',
        Duration : 0,
        CurrentTime : 0,
        Reward : 0

    },
    Music : $persist(false),
    Play : 'false',
    AudioEnded : false

 }" x-init="
 $watch('Play', (value) => {
    if(value == 'false'){
       Music.pause()
    }else{
        Music.play();
    }

 });
 $watch('AudioEnded', (value) => {
    if(value){
        Play = 'false';
        TrackModal = false;
        RewardModal = true;
    }
 });

 document.addEventListener('vitecss:navigate',()=>{
if(Music &&  Music instanceof Audio){
    Music.pause();
}
 })
 " class="w-full column g-10px">

{{-- populate --}}
<section x-show="RewardModal" x-transition:enter-start="fade-enter" x-transition:enter-end="fade-enter-end" x-transition:leave-start="fade-leave" x-transition:leave-end="fade-leave-end" class="pos-fixed transition-all backdrop-blur-2px inset-0 bg-black-transparent z-index-4000 column align-center justify-center p-20px ">
    <form x-on:submit="PostRequest($event,$el,function(response){
                    let data=JSON.parse(response);
                    if(data.status == 'success'){
                        Redirect('{{ url()->current() }}')
                    }
                })" method="POST" action="{{ url('users/post/claim/streaming/reward/process') }}" class="column bg br-15px g-10px w-full border-width-1px border-style-solid border-color-primary-05 max-w-500px p-15px align-center">
        {{-- csrf token --}}
        <input type="hidden" class="inp input" name="_token" value="{{ @csrf_token() }}">
        {{-- track id --}}
        <input x-bind:value="Track.ID" type="hidden" class="inp bg input" name="id">
        <i class="c-primary font-size-2rem">
         ✨🎉✨
        </i>
         {{-- new row --}}
    <div class="w-full text-center">
        <strong style="font-family:Bricolage;" class="font-size-1-3rem c-primary font-weight-900">
            🎉Streamed Successfully🎉
        </strong>
      
    </div>
    {{-- new --}}
    <span class="opacity-07">You have earned rewards.</span>
    <strong style="font-family:Bricolage;" class="font-1-5 font-weight-900">{{ $currency }}<span x-text="Track.Reward"></span></strong>
    <button class="post">Claim Reward</button>
   
</form>
   
</section>
{{-- main --}}
    <section class="w-full column g-10">
        <div class="row w-full align-center g-10px justify-center">
            <img src="{{ asset('photos/C4CC41AB-144D-42DE-85DA-E603CA4BA0CF.jpeg') }}" style="width:30%;" alt="" class="no-select no-pointer br-15px">
            <img src="{{ asset('photos/7595A2BA-7228-438E-8BFF-896B3CB732A6.jpeg') }}" style="width:40%;" alt="" class="no-select no-pointer br-15px">
            <img src="{{ asset('photos/CE4284A3-C043-4F19-970F-04C6F69AF0F0.jpeg') }}" style="width:30%;" alt="" class="no-select no-pointer br-15px">
        </div>
      
       @if ($tracks->isEmpty())
           @include('components.utilities',[
            'empty' => true,
            'text' => 'No Tracks available',
            'icon' => '<svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M18.7134 8.12811L18.4668 8.69379C18.2864 9.10792 17.7136 9.10792 17.5331 8.69379L17.2866 8.12811C16.8471 7.11947 16.0555 6.31641 15.0677 5.87708L14.308 5.53922C13.8973 5.35653 13.8973 4.75881 14.308 4.57612L15.0252 4.25714C16.0384 3.80651 16.8442 2.97373 17.2761 1.93083L17.5293 1.31953C17.7058 0.893489 18.2942 0.893489 18.4706 1.31953L18.7238 1.93083C19.1558 2.97373 19.9616 3.80651 20.9748 4.25714L21.6919 4.57612C22.1027 4.75881 22.1027 5.35653 21.6919 5.53922L20.9323 5.87708C19.9445 6.31641 19.1529 7.11947 18.7134 8.12811ZM7 3H12V5H9V17C9 19.2091 7.20914 21 5 21C2.79086 21 1 19.2091 1 17C1 14.7909 2.79086 13 5 13C5.72857 13 6.41165 13.1948 7 13.5351V3ZM18 13.5351V11H20V17C20 19.2091 18.2091 21 16 21C13.7909 21 12 19.2091 12 17C12 14.7909 13.7909 13 16 13C16.7286 13 17.4117 13.1948 18 13.5351ZM5 19C6.10457 19 7 18.1046 7 17C7 15.8954 6.10457 15 5 15C3.89543 15 3 15.8954 3 17C3 18.1046 3.89543 19 5 19ZM16 19C17.1046 19 18 18.1046 18 17C18 15.8954 17.1046 15 16 15C14.8954 15 14 15.8954 14 17C14 18.1046 14.8954 19 16 19Z"></path></svg>'
           ])
       @else
        {{-- new row --}}
       <div class="row w-full align-center g-10px">
        <strong style="font-family:Bricolage;" class="font-size-1-5rem font-weight-700">Hot & Trending🔥</strong>
       </div>
       

       <section class="grid w-full place-center g-10" style="grid-template-columns:repeat(auto-fit,minmax(200px,1fr))">
            @foreach ($tracks as $data)
            
               <div class="w-full br-1000px p-10px row align-center g-10px bg-rgt-01">
                    <img src="{{ asset('tracks/banners/'.$data->banner.'') }}" alt="" class="h-70px w-70px circle no-select no-pointer">
               {{-- new column --}}
               <div style="max-width:calc(100% - 130px);overflow:hidden" class="column m-right-auto">
             <strong style="font-family:Bricolage;" class="font-size-1rem ws-nowrap text-overflow-ellipsis">{{ $data->name }}</strong>
                <span class="opacity-07">{{ $data->artist }}</span>
                <strong class="c-primary font-size-09rem font-weight-900">+{{ $currency.number_format($data->reward,2) }}</strong>
               </div>
               {{-- new --}}
               <div class="border-element column align-center c-primary justify-center h-40px w-40px circle no-shrink no-select" x-on:click="
              if(Play == 'true'){
                Music.pause();
              }
              AudioEnded = false;
              Track.ID= '{{ $data->id }}';
              Track.Banner = '{{ asset('tracks/banners/'.$data->banner.'') }}';
               Track.Audio = '{{ asset('tracks/audios/'.$data->audio.'') }}';
               Track.Name = '{{ $data->name }}';
               Track.Artist = '{{ $data->artist }}';
               Track.Reward='{{ number_format($data->reward) }}';
               TrackModal = true;
               Play = 'loading';
                Music = await new Audio('{{ asset('tracks/audios/'.$data->audio.'') }}');
              Music.play();
              Music.addEventListener('loadedmetadata',()=>{
                 Track.Duration = Music.duration;

              });
              Music.addEventListener('timeupdate',()=>{
                Track.CurrentTime = Music.currentTime;
              });
              Music.addEventListener('ended',()=>{
                AudioEnded = true;
              });

               Play = 'true';
               " tonclick="PlayTrack('','','','',this,{{ $loop->index + 1 }},{{ $loop->index - 1 }},'{{ $currency.number_format($data->reward,2) }}','{{ $data->id }}')">
           <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 18 18">
  <g fill="currentColor">
    <path d="M12.031,10.08c.388-.227,.62-.63,.62-1.08s-.232-.853-.62-1.08c0,0,0,0,0,0l-3.651-2.129c-.387-.226-.866-.226-1.252-.004-.387,.223-.627,.638-.627,1.084v4.259c0,.446,.24,.861,.627,1.084,.192,.11,.407,.166,.623,.166,.218,0,.436-.057,.63-.169l3.651-2.13Z" fill="currentColor"></path>
    <path d="M9,1c-.414,0-.75,.336-.75,.75s.336,.75,.75,.75c3.584,0,6.5,2.916,6.5,6.5s-2.916,6.5-6.5,6.5c-.414,0-.75,.336-.75,.75s.336,.75,.75,.75c4.411,0,8-3.589,8-8S13.411,1,9,1Z" fill="currentColor"></path>
    <path d="M3.343,13.596c-.293,.293-.293,.768,0,1.061,.293,.293,.768,.293,1.061,0,.293-.293,.293-.768,0-1.061s-.768-.293-1.061,0Z" fill="currentColor"></path>
    <circle cx="1.75" cy="9" r=".75" fill="currentColor"></circle>
    <path d="M3.343,3.343c-.293,.293-.293,.768,0,1.061s.768,.293,1.061,0,.293-.768,0-1.061c-.293-.293-.768-.293-1.061,0Z" fill="currentColor"></path>
    <path d="M6.513,15.005c-.383-.158-.821,.023-.98,.406-.159,.383,.023,.821,.406,.98,.383,.158,.821-.023,.98-.406s-.023-.822-.406-.98Z" fill="currentColor"></path>
    <path d="M2.015,11.082c-.383,.158-.564,.597-.406,.98,.159,.383,.597,.564,.98,.406,.383-.158,.564-.597,.406-.98-.159-.383-.597-.564-.98-.406Z" fill="currentColor"></path>
    <path d="M2.589,5.533c-.383-.159-.821,.023-.98,.406-.159,.383,.023,.822,.406,.98,.383,.158,.821-.023,.98-.406,.159-.383-.023-.821-.406-.98Z" fill="currentColor"></path>
    <path d="M6.513,2.995c.383-.158,.564-.597,.406-.98-.159-.383-.597-.564-.98-.406-.383,.159-.564,.597-.406,.98s.597,.564,.98,.406Z" fill="currentColor"></path>
  </g>
</svg>
               </div>

                </div>
           @endforeach
          
           </section>
        
           <div class="column m-top-50px w-full g-10px p-15px br-15px border-element">
            <div class="row g-10">
                <svg class="h-40 w-40 c-primary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256" fill="CurrentColor" height="20" width="20"><path d="M161.36,130a40,40,0,1,0-66.72,0,28.35,28.35,0,0,0-4.52,4.51,27.86,27.86,0,0,0-5.42,23.67l12.75,56A27.87,27.87,0,0,0,124.77,236h6.46a27.87,27.87,0,0,0,27.32-21.79l12.75-56a27.86,27.86,0,0,0-5.42-23.67A28.35,28.35,0,0,0,161.36,130ZM128,92a16,16,0,1,1-16,16A16,16,0,0,1,128,92Zm19.89,60.88-12.74,56a4,4,0,0,1-3.92,3.12h-6.46a4,4,0,0,1-3.92-3.12l-12.74-56a3.92,3.92,0,0,1,.77-3.37A4,4,0,0,1,112,148H144a4,4,0,0,1,3.15,1.51A3.92,3.92,0,0,1,147.89,152.88ZM236,128a107.88,107.88,0,0,1-38,82.21A12,12,0,0,1,182.47,192a84,84,0,1,0-108.94,0A12,12,0,0,1,58,210.21,108,108,0,1,1,236,128Z"></path></svg>

               <div class="column g-5">
                 <strong style="font-family:Bricolage;" class="font-size-1rem font-weight-700">Sponsored Music Hour: Afrobeats weekly</strong>
                <span class="opacity-07">Earn real cash streaming on {{ config('app.name') }}</span>
               </div>
            </div>
            <div style="font-family:Bricolage;" class="p-10px c-primary w-fit br-10px border-element row align-center g-5px font-size-1rem font-weight-900">
               <svg viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg" height="20" width="20"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM10.6219 8.41459L15.5008 11.6672C15.6846 11.7897 15.7343 12.0381 15.6117 12.2219C15.5824 12.2658 15.5447 12.3035 15.5008 12.3328L10.6219 15.5854C10.4381 15.708 10.1897 15.6583 10.0672 15.4745C10.0234 15.4088 10 15.3316 10 15.2526V8.74741C10 8.52649 10.1791 8.34741 10.4 8.34741C10.479 8.34741 10.5562 8.37078 10.6219 8.41459Z"></path></svg>

                <span>Start Streaming</span>
            </div>

           </div>
       @endif
    </section>
    
    {{-- popup --}}
    <section x-show="TrackModal" x-transition:enter-start="fade-enter" x-transition:enter-end="fade-enter-end" x-transition:leave-start="fade-leave" x-transition:leave-end="fade-leave-end" class="pos-fixed transition-all inset-0 z-index-4000 backdrop-blur-2px bg-black-transparent p-20px column align-center justify-center">
        <div x-on:click.outside="TrackModal = false" x-transition:enter.duration.500ms x-transition:leave.duration.500ms onclick="event.stopPropagation()" class="w-full p-15px column bg br-20px max-w-500px g-10px">
            <img x-bind:src="Track.Banner" alt="Track Banner" class="w-full br-15px track-banner no-select no-pointer">
        {{-- new column --}}
        <div class="column w-full g-2">
                <div vitecss-marquee vitecss-marquee-check>
            <div>
                <strong class="font-1 track-name ws-nowrap font-weight-900"></strong>
            </div>
        </div>
         <div vitecss-marquee vitecss-marquee-check>
            <div>
                <strong class="font-size-09 ws-nowrap track-artist font-weight-600 opacity-05"></strong>
            </div>
        </div>
        </div>
        {{-- progress bar --}}
        <div style="background:var(--rgt-04);min-height:5px !important;" class="overflow-hidden w-full h-5 br-1000">
            <div x-bind:style="{
                'width' : (Track.CurrentTime / Track.Duration)*100 + '%'
            }" style="background:var(--rgt-10);width:0%;" class="h-full"></div>
        </div>
        {{-- controls --}}
        <div class="row w-full align-center justify-center g-10">
           
            <i>
       

<svg x-on:click="Play = 'true'" x-show="Play == 'false'" width="40" height="40" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M21.4086 9.35258C23.5305 10.5065 23.5305 13.4935 21.4086 14.6474L8.59662 21.6145C6.53435 22.736 4 21.2763 4 18.9671L4 5.0329C4 2.72368 6.53435 1.26402 8.59661 2.38548L21.4086 9.35258Z" fill="CurrentColor" "=""></path>
</svg>

<?xml version="1.0" encoding="utf-8"?><svg x-show="Play == 'loading'" height="30" width="30" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 2400 2400" xml:space="preserve"><g stroke-width="200" stroke-linecap="round" stroke="currentColor" fill="none" id="spinner"><line x1="1200" y1="600" x2="1200" y2="100"/><line opacity="0.5" x1="1200" y1="2300" x2="1200" y2="1800"/><line opacity="0.917" x1="900" y1="680.4" x2="650" y2="247.4"/><line opacity="0.417" x1="1750" y1="2152.6" x2="1500" y2="1719.6"/><line opacity="0.833" x1="680.4" y1="900" x2="247.4" y2="650"/><line opacity="0.333" x1="2152.6" y1="1750" x2="1719.6" y2="1500"/><line opacity="0.75" x1="600" y1="1200" x2="100" y2="1200"/><line opacity="0.25" x1="2300" y1="1200" x2="1800" y2="1200"/><line opacity="0.667" x1="680.4" y1="1500" x2="247.4" y2="1750"/><line opacity="0.167" x1="2152.6" y1="650" x2="1719.6" y2="900"/><line opacity="0.583" x1="900" y1="1719.6" x2="650" y2="2152.6"/><line opacity="0.083" x1="1750" y1="247.4" x2="1500" y2="680.4"/><animateTransform attributeName="transform" attributeType="XML" type="rotate" keyTimes="0;0.08333;0.16667;0.25;0.33333;0.41667;0.5;0.58333;0.66667;0.75;0.83333;0.91667" values="0 1199 1199;30 1199 1199;60 1199 1199;90 1199 1199;120 1199 1199;150 1199 1199;180 1199 1199;210 1199 1199;240 1199 1199;270 1199 1199;300 1199 1199;330 1199 1199" dur="0.83333s" begin="0s" repeatCount="indefinite" calcMode="discrete"/></g></svg>
<svg x-on:click="Play = 'false'" x-show="Play == 'true'" width="40" height="40" viewBox="0 0 24 24" fill="CurrentColor" xmlns="http://www.w3.org/2000/svg">
<path d="M2 6C2 4.11438 2 3.17157 2.58579 2.58579C3.17157 2 4.11438 2 6 2C7.88562 2 8.82843 2 9.41421 2.58579C10 3.17157 10 4.11438 10 6V18C10 19.8856 10 20.8284 9.41421 21.4142C8.82843 22 7.88562 22 6 22C4.11438 22 3.17157 22 2.58579 21.4142C2 20.8284 2 19.8856 2 18V6Z" fill="CurrentColor" "=""></path>
<path d="M14 6C14 4.11438 14 3.17157 14.5858 2.58579C15.1716 2 16.1144 2 18 2C19.8856 2 20.8284 2 21.4142 2.58579C22 3.17157 22 4.11438 22 6V18C22 19.8856 22 20.8284 21.4142 21.4142C20.8284 22 19.8856 22 18 22C16.1144 22 15.1716 22 14.5858 21.4142C14 20.8284 14 19.8856 14 18V6Z" fill="CurrentColor" "=""></path>
</svg>



            </i>
           
        </div>
        {{--new column  --}}
        <div class="column g-2 align-center w-full">
             <span class="row m-x-auto c-primary font-weight-700" style="font-family:Bricolage;">Streaming Reward : <span class="m-left-2px font-weight-900"> {{ $currency }}<span x-text="Track.Reward"></span></span></span>
       <small class="opacity-05">After Full Stream</small>
        </div>
        
        
        </div>
    </section>

   
</section>
@endsection