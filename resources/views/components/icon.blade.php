@php
    $icons = [
        'home' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
            stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 
            1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 
            1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 
            1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/></svg>',

        'dollar' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
            stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M12 
            6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 
            12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 
            4.006 0l.415.33M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" /></svg>',

        'phone' => '<path fill-rule="evenodd" d="M1.5 4.5a3 3 0 0 1 3-3h1.372c.86 
            0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 0 1-.694 
            1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 0 0 6.697 
            6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 0 1 1.955-.694l4.423 
            1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 0 1-3 3h-2.25C8.552 22.5 1.5 
            15.448 1.5 6.75V4.5Z" clip-rule="evenodd" />',

        'user' => '<path stroke-linecap="round" stroke-linejoin="round"
            d="M15.75 6a3.75 3.75 0 11-7.5 
            0 3.75 3.75 0 017.5 0zM4.501 
            20.118a7.5 7.5 0 0114.998 0A17.933 
            17.933 0 0112 21.75c-2.676 
            0-5.216-.584-7.499-1.632z"/>',
            
        'login' => '<path stroke-linecap="round" stroke-linejoin="round" 
            d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 
            2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 
            1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />',

        'question' => '<svg xmlns="http://www.w3.org/2000/svg" fill="none" 
            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 
            3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 
            3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 
            9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" /></svg>'
    ];
@endphp

<svg xmlns="http://www.w3.org/2000/svg" fill="none"
     viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
     {{ $attributes->merge(['class' => 'w-5 h-5']) }}>
    {!! $icons[$name] ?? '' !!}
</svg>