<header class="relative">
    <!-- Informations sur l'utilisateur  -->
    <div class="bg-red w-full justify-between text-white text-xs border-b border-lightgold border-opacity-50">
        <div class="flex items-center justify-between py-1">
            @auth
            <p class="ml-3">Bonjour {{ $user->first_name }}</p>
            <div class="flex">
                @if($user->role== 1)
                <a href="{{ route('admin-panel') }}" class="mr-3">
                    <div title="Administrateur du panneau">
                        <svg class="inline-block text-white h-5 w-5"  fill="currentColor"
                        enable-background="new 0 0 48 48" height="48px" id="Layer_3" version="1.1" viewBox="0 0 48 48" width="48px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g>
                                <path d="M23.999,22.863c-10.014,0-18.131,8.119-18.131,18.133v1.727v3.34v1.906h36.264v-1.906v-2.189v-2.877   C42.132,30.982,34.013,22.863,23.999,22.863z" />
                                <path d="M14.479,15.936l1.859-0.656c0.502,0.837,1.148,1.593,1.916,2.236l-0.898,1.877l4.033,1.928l0.896-1.877   c0.963,0.189,1.933,0.22,2.88,0.095l0.682,1.934l3.371-1.191l-0.674-1.904c0.864-0.507,1.636-1.168,2.298-1.957l1.875,0.897   l1.923-4.02L32.763,12.4c0.195-0.986,0.225-1.983,0.09-2.951l1.858-0.655l-1.19-3.371l-1.859,0.655   c-0.499-0.834-1.144-1.587-1.907-2.229l0.898-1.879l-4.051-1.938l-0.898,1.881c-1.001-0.195-2.016-0.224-2.997-0.079l-0.63-1.785   l-3.373,1.191l0.641,1.815c-0.812,0.493-1.548,1.124-2.176,1.872l-1.879-0.898l-1.935,4.046l1.88,0.898   c-0.193,0.98-0.221,1.972-0.086,2.936l-1.859,0.655L14.479,15.936z M24,7.562c1.657,0,3,1.343,3,3s-1.343,3-3,3   c-1.657,0-3-1.343-3-3S22.343,7.562,24,7.562z"  />
                            </g>
                        </svg>
                    </div>
                </a>
                @endif
                <div title="Déconnexion">
                    <svg class="mr-05 h-5 w-6 text-gray-300 cursor-pointer" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" wire:click="logout">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2" />
                        <path d="M7 12h14l-3 -3m0 6l3 -3" />
                    </svg>
                </div>
            </div>
            @endauth
        </div>
    </div>
    <!-- Logo (centré) -->
    <div class="flex justify-center items-center  bg-red ">
    <svg class=" mr-6 text-lightgold"  version="1.0" xmlns="http://www.w3.org/2000/svg"
    width="100pt" height="65pt"  viewBox="0 0 610.000000 409.000000"preserveAspectRatio="xMidYMid meet">
        <g transform="translate(0.000000,409.000000) scale(0.100000,-0.100000)"
        fill="#ffff" stroke="none">
            <path d="M1847 2708 c25 -79 122 -392 216 -697 l172 -553 250 0 250 1 17 53
            c9 29 46 148 81 263 186 599 300 966 317 1018 l19 57 -683 0 -683 0 44 -142z
            m233 0 c27 -61 311 -1035 308 -1057 -4 -36 -53 -43 -68 -9 -19 43 -310 1031
            -310 1053 0 28 8 35 37 35 15 0 27 -8 33 -22z"/>
            <path d="M5095 2603 c-116 -42 -184 -102 -239 -210 -43 -86 -60 -174 -59 -313
            0 -142 17 -229 62 -318 76 -151 244 -235 434 -217 167 16 275 88 342 230 45
            97 59 169 59 315 -1 252 -77 406 -242 487 -73 37 -81 38 -191 41 -91 2 -127
            -1 -166 -15z m200 -164 c107 -29 155 -138 155 -354 0 -168 -25 -258 -87 -317
            -56 -53 -130 -62 -203 -25 -86 43 -128 183 -117 392 7 132 25 198 70 250 50
            58 106 75 182 54z"/>
            <path d="M3307 2604 c-4 -4 -7 -240 -7 -524 l0 -517 60 -7 c33 -4 87 -4 120 0
            l60 7 -2 521 -3 521 -111 3 c-60 1 -113 -1 -117 -4z"/>
            <path d="M3813 2603 l-23 -4 0 -519 0 -519 54 -6 c29 -4 77 -3 105 2 l52 8 -1
            290 c0 160 -3 333 -6 385 -7 108 -1 109 39 5 15 -38 87 -207 160 -375 l134
            -305 73 -8 c39 -4 102 -4 139 0 l66 8 3 523 2 522 -74 0 c-65 0 -79 -3 -103
            -24 l-28 -24 0 -371 c0 -203 -3 -367 -6 -363 -3 4 -25 54 -48 112 -90 219
            -283 655 -294 662 -12 8 -205 9 -244 1z"/>
        </g>
    </svg>
    </div>
</header>