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
    <title>Terms of service - {{ config('app.name') }} </title>
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
  <h1>Terms of Service</h1>
<p class="updated">Last updated: September 10, 2026</p>
<strong class="subtitle">1. Acceptance of Terms</strong>
<p>
    By accessing or using Vistora's services, you agree to be bound by these Terms
    of Service. If you do not agree to these terms, you may not use our platform.
    These terms constitute a legally binding agreement between you and Vistora.
</p>
<strong class="subtitle">2. Account Registration</strong>
<p>
    To use Vistora, you must create an account and provide accurate, complete,
    and up-to-date information. You are responsible for maintaining the security
    of your account credentials and for all activities carried out through your account.
</p>
<p>
    You must not share your account credentials with other individuals or allow
    another person to use your account. You must notify Vistora if you become aware
    of any unauthorized access or suspicious activity involving your account.
</p>
<strong class="subtitle">3. Use of Services</strong>
<p>
    Vistora provides users with access to tasks, entertainment, rewards, referrals,
    and other online opportunities. You agree to use the platform only for lawful
    purposes and in compliance with applicable Nigerian laws and regulations.
</p>
<p>You must not:</p>
<ul>
    <li>Use Vistora for fraudulent, unlawful, or abusive activities.</li>
    <li>Create multiple or fake accounts to obtain additional rewards.</li>
    <li>Use bots, scripts, automation, or unauthorized software to complete activities.</li>
    <li>Attempt to manipulate tasks, rewards, referrals, withdrawals, or other platform features.</li>
    <li>Attempt to bypass or interfere with Vistora's security systems.</li>
    <li>Exploit bugs, errors, or vulnerabilities on the platform.</li>
    <li>Interfere with the normal operation of Vistora or its services.</li>
</ul>
<strong class="subtitle">4. Tasks and Rewards</strong>
<p>
    Vistora may provide various tasks and activities through the platform that
    may qualify users for rewards. Available tasks, reward amounts, requirements,
    and eligibility may change at any time.
</p>
<p>
    Users are expected to complete tasks honestly and according to the instructions
    provided. Vistora reserves the right to review, reject, reverse, or withhold
    rewards where there is evidence of fraud, manipulation, abuse, or violation
    of these terms.
</p>
<p>
    Participation in tasks or other activities does not guarantee a specific amount
    of earnings.
</p>
<strong class="subtitle">5. Withdrawals and Payments</strong>
<p>
    Where withdrawal services are available, users may request withdrawals from
    their eligible balance subject to applicable requirements, minimum withdrawal
    limits, processing procedures, verification requirements, and fees displayed
    on the platform.
</p>
<p>
    Vistora may delay, review, restrict, or reject a withdrawal where additional
    verification is required or where a transaction appears to involve fraudulent,
    unauthorized, or prohibited activity.
</p>
<p>
    Users are responsible for providing correct payment and banking information.
    Vistora is not responsible for losses resulting from incorrect information
    supplied by a user.
</p>
<strong class="subtitle">6. Referrals</strong>
<p>
    Vistora may provide a referral programme that allows users to earn rewards
    by inviting eligible users to the platform.
</p>
<p>
    Referral rewards are subject to the applicable referral rules and requirements.
    Users must not create fake accounts, use self-referrals, manipulate referral
    activity, or use misleading information to obtain referral rewards.
</p>
<p>
    Vistora reserves the right to cancel or reverse referral rewards obtained
    through prohibited or fraudulent activities.
</p>
<strong class="subtitle">7. Entertainment and Music Services</strong>
<p>
    Vistora may provide access to entertainment, music streaming activities,
    and other digital content or opportunities. Some features may involve
    third-party platforms or services.
</p>
<p>
    Availability of specific content, streaming activities, or third-party
    services may change without notice. Users may also be subject to the terms
    and policies of the relevant third-party service providers.
</p>
<strong class="subtitle">8. Financial and Loan Opportunities</strong>
<p>
    Vistora may provide information about or access to available loan opportunities
    and other financial features. Eligibility, loan amounts, approval, interest
    rates, repayment periods, fees, and other conditions may vary depending on
    the applicable service or provider.
</p>
<p>
    The availability of a loan opportunity does not guarantee approval. Users
    should carefully review the applicable terms and conditions before accepting
    any financial offer.
</p>
<strong class="subtitle">9. Privacy</strong>
<p>
    Your privacy is important to us. Our collection, use, storage, and protection
    of personal information are governed by our Privacy Policy, which forms part
    of these Terms of Service.
</p>
<p>
    By using Vistora, you acknowledge and consent to the processing of your
    information in accordance with our Privacy Policy and applicable laws.
</p>
<strong class="subtitle">10. Platform Availability</strong>
<p>
    We aim to provide a reliable and accessible service, but we do not guarantee
    that Vistora will always be available, uninterrupted, or error-free.
</p>
<p>
    The platform may occasionally be unavailable due to maintenance, updates,
    technical issues, network failures, security measures, or circumstances
    beyond our reasonable control.
</p>
<strong class="subtitle">11. Limitation of Liability</strong>
<p>
    To the extent permitted by applicable law, Vistora shall not be liable for
    indirect, incidental, special, or consequential losses arising from or
    relating to your use of the platform.
</p>
<p>
    We do not guarantee that the platform will always operate without interruptions,
    delays, errors, or technical problems.
</p>
<strong class="subtitle">12. Account Suspension and Termination</strong>
<p>
    Vistora may suspend, restrict, or terminate an account if a user violates
    these Terms of Service, engages in fraudulent or abusive activity, attempts
    to manipulate the platform, or creates a risk to the security or integrity
    of Vistora or its users.
</p>
<p>
    Upon suspension or termination, access to certain features, rewards, or
    account functions may be restricted while the account is reviewed.
</p>
<strong class="subtitle">13. Changes to These Terms</strong>
<p>
    Vistora reserves the right to modify these Terms of Service from time to time.
    Updated terms may be published on the platform, and the updated date will
    be changed accordingly.
</p>
<p>
    Your continued use of Vistora after changes to these terms means that you
    accept the revised Terms of Service.
</p>
<strong class="subtitle">14. Governing Law</strong>
<p>
    These Terms of Service shall be governed by and construed in accordance
    with the laws of the Federal Republic of Nigeria.
</p>
<p>
    Any disputes arising from or relating to these terms shall be handled in
    accordance with applicable Nigerian laws and the jurisdiction of the
    appropriate courts in Nigeria.
</p>
<div class="w-full text-align-center border-width-1px m-top-20px border-style-solid border-color-rgt-01 bg-rgt-005 p-15px br-15px">
    If you have questions, concerns, or require assistance regarding these
    Terms of Service, please contact Vistora through the official support
    channels provided on the platform.
</div>

</main>
<footer class="text-align-center pc-x-padding p-20px m-top-20px w-full border-top-width-1px border-top-style-solid border-top-color-rgt-01">
    © 2026 Vistora. All rights reserved.
 
</footer>
  
 
  {{-- yield js --}}
    @yield('js')
</body>
</html>