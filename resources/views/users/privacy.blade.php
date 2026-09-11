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
{{-- vite js --}}
 @include('components.utilities',[
    'vite_js' => true
  ])
{{-- yield css --}}
     @yield('css')
    <title>Privacy Policy - {{ config('app.name') }} </title>
  <style>
@font-face {
    font-family: 'Bricolage';
    src: url('{{ asset('vitecss/fonts/BricolageGrotesque-VariableFont_opsz,wdth,wght.ttf') }}') format('truetype');
    font-display: swap;
}
    body{
        position:relative;
        padding: 0 !important;
        background:#010a0c;

    }
    p,ul{
        opacity:0.7;
    }
    strong.subtitle{
        font-weight:700;
        font-family:Bricolage;
        font-size:1rem;
    }
    main{
        padding:15px;
    }
   
  </style>
</head>
<body x-data="{ 
    HeaderHeight : 0,
    MobileNav : false
 }">
    {{-- include general codes --}}
    @include('components.utilities',[
        'general_codes' => true
    ])
     {{-- include users only codes --}}
    @include('components.utilities',[
        'users_codes' => true
    ])
     {{-- include action loader for post requests,get requests and spa loading --}}
    @include('components.utilities',[
        'action_loader' => true
    ])
    {{-- header --}}
    <header class="w-full pc-x-padding p-15px border-bottom-width-1px border-bottom-style-solid border-bottom-color-primary-01 bg-primary-005 row align-center space-between g-10px">
   <div class="row align-center g-10px">
    <img src="{{ asset('logos/IMG_1596.png') }}" alt="" class="no-select no-pointer h-30px">
    <strong class="font-size-1rem fint-weight-900 no-select no-pointer">{{ config('app.name') }}</strong>
        </div>
        <div x-on:click="window.location.href='{{ url('/') }}'" class="row c-primary align-center g-10px">
            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 20 20">
  <g fill="currentColor">
    <line x1="17" y1="10" x2="3" y2="10" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></line>
    <polyline points="8 5 3 10 8 15" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></polyline>
  </g>
</svg>
            <span>Back to Dashboard</span>
        </div>
    </header>
   
    <main class="pc-x-padding">
  <h1>Privacy Policy</h1>

<p class="updated">Last updated: September 10, 2026</p>

<strong class="subtitle">1. Information We Collect</strong>

<p>
    When you create and use a Vistora account, we collect information that you
    provide directly to us. This may include your first name, last name, username,
    email address, phone number, referral information where applicable, and account
    authentication information.
</p>

<p>
    We may also collect information generated through your use of the platform,
    including task activity, reward activity, referral activity, withdrawal and
    transaction information, device information, IP address, browser information,
    and general usage data.
</p>

<strong class="subtitle">2. How We Use Your Information</strong>

<p>
    We use the information we collect to provide, operate, maintain, and improve
    Vistora and its services.
</p>

<p>Your information may be used to:</p>

<ul>
    <li>Create and manage your account.</li>
    <li>Provide access to tasks, rewards, entertainment, and other opportunities.</li>
    <li>Process withdrawals and account-related transactions.</li>
    <li>Verify account ownership and prevent unauthorized access.</li>
    <li>Detect and prevent fraud, abuse, and suspicious activity.</li>
    <li>Manage referral programmes and reward activities.</li>
    <li>Provide customer support and respond to your requests.</li>
    <li>Send important service-related notifications and updates.</li>
    <li>Improve the performance, security, and functionality of the platform.</li>
    <li>Comply with applicable legal and regulatory requirements.</li>
</ul>

<strong class="subtitle">3. Data Storage and Security</strong>

<p>
    We take reasonable measures to protect your personal information against
    unauthorized access, alteration, disclosure, misuse, or loss.
</p>

<p>
    Your account information is stored using appropriate technical and organizational
    security measures. Passwords are securely protected and are not stored in
    plain text.
</p>

<p>
    Although we take reasonable steps to protect your information, no online
    platform or method of electronic storage can be guaranteed to be completely
    secure.
</p>

<strong class="subtitle">4. Third-Party Services</strong>

<p>
    Vistora may work with trusted third-party service providers to support certain
    features and services, including payment processing, banking services, analytics,
    communications, security, and other platform functions.
</p>

<p>
    These providers may receive only the information reasonably necessary to
    perform their services and are expected to handle information in accordance
    with applicable privacy and security requirements.
</p>

<p>
    We do not sell your personal information to third parties.
</p>

<strong class="subtitle">5. Your Rights</strong>

<p>
    Depending on applicable law, you may have rights regarding your personal
    information, including the right to:
</p>

<ul>
    <li>Access your personal information.</li>
    <li>Request correction of inaccurate or incomplete information.</li>
    <li>Request deletion of your personal information, subject to applicable legal requirements.</li>
    <li>Request restriction of certain processing activities.</li>
    <li>Request a copy of certain information we hold about you.</li>
    <li>Withdraw consent where processing is based on consent.</li>
</ul>

<p>
    To exercise your applicable rights or ask questions about your personal
    information, please contact Vistora through our official support channels.
</p>

<strong class="subtitle">6. Cookies and Similar Technologies</strong>

<p>
    Vistora may use cookies and similar technologies to maintain your session,
    remember your preferences, improve platform functionality, understand how
    users interact with our services, and enhance security.
</p>

<p>
    Some cookies may be essential for the platform to function properly. You can
    manage or disable certain cookies through your browser settings, although
    doing so may affect some features of Vistora.
</p>

<strong class="subtitle">7. Data Retention</strong>

<p>
    We retain personal information for as long as reasonably necessary to provide
    our services, maintain your account, comply with legal obligations, resolve
    disputes, enforce our agreements, and protect the security and integrity of
    the platform.
</p>

<p>
    When information is no longer required, we may securely delete or anonymize
    it in accordance with applicable requirements.
</p>

<strong class="subtitle">8. Changes to This Privacy Policy</strong>

<p>
    We may update this Privacy Policy from time to time to reflect changes in
    our services, data practices, or applicable legal requirements.
</p>

<p>
    When significant changes are made, we may notify users through the platform,
    email, or other appropriate communication channels.
</p>

<p>
    Your continued use of Vistora after an updated Privacy Policy becomes
    effective means that you acknowledge the updated policy.
</p>

<div class="w-full text-align-center border-width-1px m-top-20px border-style-solid border-color-rgt-01 bg-rgt-005 p-15px br-15px">
   If you have questions, concerns, or requests regarding this Privacy Policy
    or how Vistora handles your information, please contact us through the
    support channels provided on the platform.
</div>

</main>
<footer class="text-align-center pc-x-padding p-20px m-top-20px w-full border-top-width-1px border-top-style-solid border-top-color-rgt-01">
    © 2026 Vistora. All rights reserved.
 
</footer>
  
 
  {{-- yield js --}}
    @yield('js')
</body>
</html>