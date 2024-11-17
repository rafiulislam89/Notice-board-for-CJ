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

        {{-- Notice Board --}}
        <div class="notice-board">
            <div class="notice-content">
                @foreach(getLatestNotices() as $index => $notice)
                    <a href="{{ route('notice_boards.index') }}" class="notice-item" style="color: {{ $notice->priority == 'important' ? 'Orange; ' : 'Black' }}">
                        <span>{{ $notice->title }}</span>
                    </a>
                    <span class="text-black-50">|</span>
                @endforeach
            </div>
        </div>

        @include('layout.partials.extras._topbar')
    </div>
</div>

{{-- CSS Styling --}}
<style>
    .notice-board {
        width: 80%;
        overflow: hidden;
        white-space: nowrap;
        background-color: rgba(0, 0, 0, 0);
        padding: 5px;
        margin-right: 20px;
        font-size: 18px;
        max-width: 100%;
    }

    .notice-content {
        display: inline-block;
        animation: scroll-left 30s linear infinite;
        font-weight: 600;
        color: white;
    }

    .notice-content .notice-item {
        text-decoration: none;
        margin-left: 15px;
        margin-right: 15px;
    }

    .notice-content .notice-item:hover {
        color: #ddd;
        text-decoration: underline;
    }

    @keyframes scroll-left {
        0% {
            transform: translateX(100%);
        }
        100% {
            transform: translateX(-100%);
        }
    }

    /* Media query for small mobile and tablet devices */
    /* Mobile-specific styling */
    @media (max-width: 768px) {
        .notice-board {
            width: 100%; /* Full-screen width on mobile */
            overflow: hidden;
            white-space: nowrap;
            background-color: rgba(0, 0, 0, 0);
        }

        .notice-content {
            color: black;
            width: 100%;
        }

        .notice-content .notice-item {
            color: black; /* Ensure normal text color is black */
        }

        .notice-content .notice-item.important {
            color: red; /* Important text color for all devices */
        }
    }
</style>
