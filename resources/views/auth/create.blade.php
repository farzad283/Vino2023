<!DOCTYPE html>
<html>
<head>
    <title>Registration Page</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-200">
    <div class="relative h-screen flex flex-col justify-end">
        <img src="{{ asset('img/page4.jpg') }}" alt="Background" class="absolute inset-0 object-cover w-full h-full" style="object-position: 50% 35%;" />
        <div class="absolute top-0 left-0 right-10 flex justify-center lg:left-0 lg:justify-start lg:right-auto">
            <svg class="mx-auto mt-16"  version="1.0" xmlns="http://www.w3.org/2000/svg"
            width="300pt" height="195pt"  viewBox="0 0 610.000000 409.000000" preserveAspectRatio="xMidYMid meet">
                <g transform="translate(0.000000,409.000000) scale(0.100000,-0.100000)"
                fill="#9B0739" stroke="none">
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
        <div class="max-w-3xl mx-auto mb-16 bg-white bg-opacity-60 rounded-lg shadow-md p-8 relative w-full lg:max-w-md lg:w-5/6 lg:mb-36 lg:mt-auto lg:px-8 lg:py-1 z-10 overflow-hidden" style="min-height:52%;">

            <h1 class="text-5xl font-bold mb-18 text-center p-6 lg:mb-2 lg:p-0 lg:text-3xl">Registration</h1>
            <form method="POST">
            @csrf

            <div class="mb-6 lg:mb-4">
                @error('first_name')
                <div class="text-red-500 text-3xl lg:text-sm">{{ $message }}</div>
                @enderror
                <label for="first_name" class="sr-only">Prénom</label>
                <input id="first_name" type="text" name="first_name" value="{{ old('first_name') }}" required autofocus class="text-4xl shadow appearance-none border-gray-300 rounded-md w-full py-6 px-6 leading-tight focus:outline-none focus:shadow-outline lg:px-2 lg:py-2 lg:text-xl" placeholder="Prénom">
            </div>
            

            <div class="mb-6 lg:mb-4">
                @error('last_name')
                <div class="text-red-500 text-3xl lg:text-sm">{{ $message }}</div>
                @enderror
                <label for="last_name" class="sr-only">Nom de famille</label>
                <input id="last_name" type="text" name="last_name" value="{{ old('last_name') }}" required class="text-4xl shadow appearance-none border-gray-300 rounded-md w-full py-6 px-6 leading-tight focus:outline-none focus:shadow-outline lg:px-2 lg:py-2 lg:text-xl"placeholder="Nom de famille">
            </div>

            <div class="mb-6 lg:mb-4">
                @error('email')
                <div class="text-red-500 text-3xl lg:text-sm">{{ $message }}</div>
                @enderror
                <label for="email" class="sr-only">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required class="text-4xl shadow appearance-none border-gray-300 rounded-md w-full py-6 px-6 leading-tight focus:outline-none focus:shadow-outline lg:px-2 lg:py-2 lg:text-xl" placeholder="Courriel">
            </div>

            <div class="mb-6 lg:mb-4">
                @error('password')
                <div class="text-red-500 text-3xl lg:text-sm">{{ $message }}</div>
                @enderror
                <label for="password" class="sr-only">Mot de passe</label>
                <input id="password" type="password" name="password" required class="text-4xl shadow appearance-none border-gray-300 rounded-md w-full py-6 px-6 leading-tight focus:outline-none focus:shadow-outline lg:px-2 lg:py-2 lg:text-xl" placeholder="Mot de passe">
            </div>

            <div class="mb-6 lg:mb-4">
                <label for="password_confirmation" class="sr-only">Confirmation du mot de passe</label>
                <input id="password_confirmation" type="password" name="password_confirmation" required class="text-4xl shadow appearance-none border-gray-300 rounded-md w-full py-6 px-6 leading-tight focus:outline-none focus:shadow-outline lg:px-2 lg:py-2 lg:text-xl"placeholder="Confirmation de mot de passe">
            </div>

            <div class="flex justify-between items-center mb-6">
                <button type="submit" class="bg-red hover:bg-blue-700 text-white font-bold py-8 px-18 rounded text-4xl focus:outline-none focus:shadow-outline w-64 lg:px-2 lg:py-2 lg:text-xl lg:w-40">S'inscrire</button>
                <a href="{{ route('login') }}" class="text-red text-4xl lg:text-2xl">Se connecter</a>
            </div>

        </form>
    </div>   
</body>
</html>
