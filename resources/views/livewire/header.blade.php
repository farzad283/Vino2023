<header class="relative">
    <!-- User Information (Top Right) -->
    <div class="bg-red  w-full justify-between text-white text-xs  border-b  border-white">
        <div class="flex items-center justify-between py-3">
            @auth
            <p class="ml-3">Bonjour {{ $user->first_name }}</p>

            <div class="flex">
                @if($user->role== 1)
                <a href="{{ route('admin-panel') }}" class="mr-3">
                    <svg class="inline-block text-white h-5 w-5"  fill="currentColor"
                    enable-background="new 0 0 48 48" height="48px" id="Layer_3" version="1.1" viewBox="0 0 48 48" width="48px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <g>
                            <path d="M23.999,22.863c-10.014,0-18.131,8.119-18.131,18.133v1.727v3.34v1.906h36.264v-1.906v-2.189v-2.877   C42.132,30.982,34.013,22.863,23.999,22.863z" />
                            <path d="M14.479,15.936l1.859-0.656c0.502,0.837,1.148,1.593,1.916,2.236l-0.898,1.877l4.033,1.928l0.896-1.877   c0.963,0.189,1.933,0.22,2.88,0.095l0.682,1.934l3.371-1.191l-0.674-1.904c0.864-0.507,1.636-1.168,2.298-1.957l1.875,0.897   l1.923-4.02L32.763,12.4c0.195-0.986,0.225-1.983,0.09-2.951l1.858-0.655l-1.19-3.371l-1.859,0.655   c-0.499-0.834-1.144-1.587-1.907-2.229l0.898-1.879l-4.051-1.938l-0.898,1.881c-1.001-0.195-2.016-0.224-2.997-0.079l-0.63-1.785   l-3.373,1.191l0.641,1.815c-0.812,0.493-1.548,1.124-2.176,1.872l-1.879-0.898l-1.935,4.046l1.88,0.898   c-0.193,0.98-0.221,1.972-0.086,2.936l-1.859,0.655L14.479,15.936z M24,7.562c1.657,0,3,1.343,3,3s-1.343,3-3,3   c-1.657,0-3-1.343-3-3S22.343,7.562,24,7.562z"  />
                        </g>
                    </svg>
                </a>
                @endif
                <svg class="mr-05 h-5 w-6 text-gray-300 cursor-pointer" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" wire:click="logout">
                    <path stroke="none" d="M0 0h24v24H0z" />
                    <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                    <path d="M7 12h14l-3 -3m0 6l3 -3" />
                </svg>
            </div>

            @endauth
        </div>
    </div>
    <!-- Logo (Centered) -->
    <div class="flex justify-center items-center  bg-red ">
        <svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" width="100pt" height="65pt" version="1.0" viewBox="0 0 610.000000 409.000000" preserveAspectRatio="xMidYMid meet">
            <defs>
                <filter id="f1" x="-20%" y="-20%" width="140%" height="140%">
                    <feOffset result="offOut" in="SourceAlpha" dx="5" dy="5" />
                    <feGaussianBlur result="blurOut" in="offOut" stdDeviation="10" />
                    <feBlend in="SourceGraphic" in2="blurOut" mode="normal" />
                </filter>
            </defs>
            <g transform="translate(0.000000,409.000000) scale(0.100000,-0.100000)" fill="#F0F0F0" stroke="none" filter="url(#f1)">
                <path d="M635 2768 c4 -13 98 -313 133 -428 124 -401 294 -944 298 -951 3 -5 116 -9 252 -9 l247 0 194 628 c107 345 205 660 217 700 l22 72 -683 0 c-543 0 -683 -3 -680 -12z" />
                <path d="M5158 2619 c-111 -16 -217 -84 -277 -177 -119 -185 -118 -539 1 -725 37 -59 113 -118 188 -147 112 -44 293 -35 401 21 92 46 168 155 205 290 24 89 25 308 1 399 -53 197 -173 314 -353 340 -78 11 -87 11 -166 -1z m173 -194 c41 -22 85 -86 100 -148 9 -32 14 -109 14 -197 0 -170 -15 -233 -70 -297 -42 -49 -90 -68 -153 -59 -116 16 -165 99 -178 306 -12 187 29 337 105 388 41 27 136 31 182 7z" />
                <path d="M2318 2604 c-27 -8 -48 -19 -48 -25 0 -6 21 -86 46 -177 25 -92 81 -297 125 -456 44 -160 87 -305 96 -323 29 -61 96 -80 246 -68 l94 7 21 76 c11 42 75 272 142 511 88 315 118 437 110 445 -6 6 -55 13 -110 14 -88 3 -99 2 -104 -15 -3 -10 -15 -58 -26 -108 -12 -49 -41 -171 -65 -270 -23 -99 -57 -242 -75 -317 -18 -76 -37 -138 -41 -138 -9 0 -15 19 -25 75 -25 147 -166 683 -192 727 -32 55 -103 70 -194 42z" />
                <path d="M4478 2608 c-48 -10 -75 -47 -84 -115 -7 -58 1 -478 13 -608 3 -43 2 -66 -4 -60 -5 6 -29 60 -53 120 -24 61 -98 234 -165 385 l-120 275 -100 3 c-55 2 -119 0 -142 -3 l-43 -6 0 -518 0 -518 38 -7 c48 -8 107 -7 156 1 l39 6 -6 311 c-4 171 -10 343 -13 381 -8 88 2 80 50 -40 19 -49 91 -216 159 -370 l123 -280 62 -9 c36 -5 96 -5 144 0 l83 9 3 514 c1 317 -1 518 -7 524 -12 12 -88 15 -133 5z" />
                <path d="M3307 2603 c-4 -3 -7 -239 -7 -523 l0 -517 38 -7 c47 -8 117 -8 165 0 l37 7 0 523 0 524 -113 0 c-63 0 -117 -3 -120 -7z" />
            </g>
        </svg>
    </div>
    <!-- Line under the logo -->
    <!-- <div class="border-b border-red w-5/6 mx-auto"></div> -->
</header>