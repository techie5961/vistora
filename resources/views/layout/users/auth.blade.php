<!DOCTYPE html>
<html lang="en">
<head>
    {{-- include meta tags --}}
   @include('components.utilities',[
    'meta_tags' => true
   ])
{{-- include favicon --}}
@include('components.utilities',[
    'favicon' => true
])
{{-- include vite css --}}
@include('components.utilities',[
    'vite_css' => true
])
{{-- include vite js --}}
@include('components.utilities',[
    'vite_js' => true
  ])
{{-- yield css --}}
     @yield('css')
    <title>{{ config('app.name') }} || Users || @yield('title') </title>
    <style>
        main{
            display:flex;
            flex-direction:column;
            align-items:center;
            justify-content:center;
            padding:20px;
            background:radial-gradient(circle,var(--primary-05),var(--bg));
            background-size:cover;
            background-position:center;
        }
        form,.form{
            background:hsl(var(--primary-hsl),30%,10%);
            padding:0;
            border-radius:10px;
            display:flex;
            flex-direction: column;
            gap:0px;
            align-items:center;
            justify-content: center;
            border:1.5px solid var(--primary-01);
            background:transparent;
            backdrop-filter: blur(100px);
            -webkit-backdrop-filter: blur(100px);
            background:rgba(0,0,0,0.6);
            max-width:500px;
            
        }
        form input[type=checkbox],.form input[type=checkbox]{
            transform: scale(0.7)
        }
        .cont{
            border-radius:7px;
            background:rgba(0,0,0,0.7);
            padding:10px !important;
            height:40px;
        }
       
      
        .tab-bar{
            width:100%;
            display:grid;
            grid-template-columns: 1fr 1fr;
            place-items: center;
            
        }
        .tab{
            font-size: 1rem;
            border-bottom:1px solid var(--rgt-01);
            width:100%;
            padding:15px;
            display:flex;
            flex-direction:column;;
            align-items: center;
            position: relative;
            cursor:pointer;
            text-transform: uppercase;
            font-weight:900;
        }
        .tab.active:after{
            content: '';
            width:100%;
            bottom:0;
            background:var(--primary);
            height:4px;
            position: absolute;
        }
        button.post{
            background:linear-gradient(to bottom,var(--primary),var(--primary-darker));
            color:white;
            border:1px solid var(--primary-light)
        }
       
       
        
    </style>
</head>
<body>
    {{-- include action loader for post requests,get requests and spa loading --}}
    @include('components.utilities',[
        'action_loader' => true
    ])
    <header>

    </header>
    <main>
        {{-- yield main --}}
        @yield('main')
    </main>
    <footer>

    </footer>
  
  {{-- yield js --}}
    @yield('js')
</body>
</html>