{{-- Header --}}
<div id="kt_header" class="header {{ Metronic::printClasses('header', false) }}" {{ Metronic::printAttrs('header') }}>

    {{-- Container --}}
    <div class="container-fluid d-flex align-items-center justify-content-between">
        @if (config('layout.header.self.display'))

            @php
                $kt_logo_image = 'logo-light.png';
            @endphp

            @if (config('layout.header.self.theme') === 'light')
                @php $kt_logo_image = 'logo-dark.png' @endphp
            @elseif (config('layout.header.self.theme') === 'dark')
                @php $kt_logo_image = 'logo-light.png' @endphp
            @endif

            {{-- Header Menu --}}
            <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                @if(config('layout.aside.self.display') == false)
                    <div class="header-logo">
                        <a href="{{ url('/') }}">
                            <img alt="Logo" src="{{ asset('media/logos/'.$kt_logo_image) }}"/>
                            Chokrojan
                        </a>
                    </div>
                @endif
                @if (config('layout.header.menu.self.display'))
                    <div id="kt_header_menu"
                         class="header-menu header-menu-mobile {{ Metronic::printClasses('header_menu', false) }}" {{ Metronic::printAttrs('header_menu') }}>
                        <ul class="menu-nav {{ Metronic::printClasses('header_menu_nav', false) }}">
                            {{ Menu::renderHorMenu(config('menu_header.items')) }}
                        </ul>
                    </div>
                @endif
            </div>

        @else
            <div></div>
        @endif

            <div class="notice-board">
                <div class="notice-content">
                    <span>Your notice here. Update with the latest announcements!</span>
                    <span>New policies have been implemented. Please check the updates.</span>
                    <span>Next meeting scheduled for next Friday.</span>
                    <span>Remember to submit your reports by the end of the month.</span>
                </div>
            </div>

            @include('layout.partials.extras._topbar')

            <style>
                .notice-board {
                    overflow: hidden;
                    white-space: nowrap;
                    background-color: rgba(0, 0, 0, 0); /* Transparent background */
                    padding: 5px; /* Reduced padding for a smaller size */
                    margin-right: 20px; /* Space between notice board and top bar */
                    font-size: 14px; /* Smaller font size */
                    max-width: 1100px; /* Set a maximum width for the notice board */
                }

                .notice-content {
                    display: inline-block;
                    animation: scroll-left 20s linear infinite; /* Scroll animation */
                    font-weight: bold; /* Bold text */
                    color: white; /* White text color */
                }

                @keyframes scroll-left {
                    0% {
                        transform: translateX(100%); /* Start from the right */
                    }
                    100% {
                        transform: translateX(-100%); /* Move to the left */
                    }
                }

                /* Media query for mobile devices */
                @media (max-width: 768px) {
                    .notice-board {
                        overflow: hidden;
                        white-space: nowrap;
                        background-color: rgba(0, 0, 0, 0); /* Transparent background */
                        color: black; /* Black text color for mobile */
                    }

                    .notice-content {
                        color: black; /* Ensure text is black on mobile */
                    }
                }
            </style>





    </div>
</div>
