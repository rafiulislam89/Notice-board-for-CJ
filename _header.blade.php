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
            <div style="width: 100%;">
                <!-- Notice Board -->
                <div class="notice-board">
                    <div class="notice-content">
                        @foreach(getLatestNotices() as $notice)
                            <a class="notice-item" onclick="openModal(); return false;"
                               style="color: {{ $notice->priority == 'important' ? 'orange' : 'black' }}">
                                <span>{{ $notice->title }}</span>
                            </a>
                            <span class="text-white-50">|</span>
                        @endforeach
                    </div>
                </div>
            </div>
            {{-- Here,I Included the Notice List Modal --}}
            @include('notice_boards.partials._notice_list')
            @include('layout.partials.extras._topbar')
    </div>
</div>
{{-- CSS Styling --}}
<style>
    .notice-board {
        height: 40px;
        overflow: hidden;
        position: relative;
        background-color: rgba(0, 0, 0, 0);
        padding: 5px;
        margin-left: 10px;
        font-size: 18px;
    }

    .notice-content {
        display: inline-block;
        white-space: nowrap;
        position: absolute;
        animation: scroll-left 30s linear infinite; /* Define default duration */
        font-weight: 600;
    }

    .notice-content .notice-item {
        text-decoration: none;
        margin-left: 15px;
        margin-right: 15px;
        cursor: pointer;
    }

    .notice-content .notice-item:hover {
        color: #ddd;
        text-decoration: underline;
    }

    @keyframes scroll-left {
        from {
            transform: translateX(100%); /* Start from the right edge */
        }
        to {
            transform: translateX(-100%); /* Move to the left edge */
        }
    }

    /* Media query for mobile devices */
    @media (max-width: 768px) {
        .notice-board {
            overflow: hidden;
            white-space: nowrap;
            background-color: rgba(0, 0, 0, 0);
            color: black;
            margin-left: 0px;
        }
        .notice-content {
            color: black;
        }
        .notice-content .notice-item {
            color: black;
            margin-left: 15px;
            margin-right: 15px;
        }
        .header {
            background-image: linear-gradient(to right, #109e81, #24c58a);
        }
    }

</style>
