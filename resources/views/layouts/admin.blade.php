<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('admin.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @yield('script')
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>

    <main class="main-vh">

        <div
            class="d-flex flex-column justify-content-between flex-shrink-0 bg-side side-vh ms-3 mt-3 mb-3 radious side-sizes">
            {{-- <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
            <span class="fs-4">Sidebar</span></a>
            <hr> --}}

            <a href="{{ url('/') }}" class="ps-3 active" aria-current="page">
                <svg width="150" height="70" viewBox="0 0 214 62" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M11.2455 19.2126H11.7754H5.06287C2.66816 19.9814 1.87909 21.1273 1 23.8535V38.4903C2.0101 41.1065 3.12144 41.9704 5.76945 42.7743H13.7185C17.3391 42.9526 18.4511 44.1683 18.6646 48.4862L18.8413 56.3401C18.7226 58.6597 21.5776 60.3582 23.0808 60.8025C24.584 61.2468 37.2125 60.8025 37.2125 60.8025C41.1242 60.3814 42.1996 58.4413 42.1586 56.3401V35.6344C42.2152 32.6244 41.2765 31.6747 37.5658 31.5289H23.4341C19.485 31.5575 18.7444 30.0767 18.8413 25.9955V6.00376C19.0464 2.10172 20.1086 0.904682 24.1407 1.00583H37.3892C41.2944 0.928155 42.2248 2.17919 42.3353 6.00376L42.5119 14.5716C42.6749 18.1628 43.9788 18.8612 47.458 18.8556H55.5837C59.085 18.8776 60.0049 19.9409 59.9999 23.4965V38.8473C60.0111 41.9457 59.0297 42.8313 55.5837 42.9528H49.7544"
                        stroke="#58C1F9" stroke-width="2" />
                    <path
                        d="M71.8 30.2C71.2 30.2 70.5533 30.1733 69.86 30.12C69.18 30.0667 68.5133 30 67.86 29.92V15.48C68.4067 15.4133 68.9067 15.36 69.36 15.32C69.8133 15.28 70.2333 15.2533 70.62 15.24C71.02 15.2133 71.3933 15.2 71.74 15.2C73.7133 15.2 75.1933 15.5133 76.18 16.14C77.1667 16.7667 77.66 17.7 77.66 18.94C77.66 19.8067 77.42 20.52 76.94 21.08C76.4733 21.6267 75.7867 22 74.88 22.2V22.24C76.04 22.4267 76.9067 22.8267 77.48 23.44C78.0533 24.0533 78.34 24.88 78.34 25.92C78.34 27.36 77.7933 28.4333 76.7 29.14C75.62 29.8467 73.9867 30.2 71.8 30.2ZM68.88 28.54C69.36 28.6067 69.86 28.66 70.38 28.7C70.9 28.74 71.3933 28.76 71.86 28.76C73.5267 28.76 74.7467 28.52 75.52 28.04C76.3067 27.56 76.7 26.8067 76.7 25.78C76.7 24.8067 76.34 24.1 75.62 23.66C74.9 23.22 73.74 23 72.14 23H68.66V21.6H72.14C73.4733 21.6 74.46 21.4 75.1 21C75.74 20.6 76.06 19.9933 76.06 19.18C76.06 18.3267 75.7133 17.6933 75.02 17.28C74.3267 16.8533 73.2733 16.64 71.86 16.64C71.6467 16.64 71.4133 16.6467 71.16 16.66C70.92 16.6733 70.62 16.7 70.26 16.74C69.9 16.7667 69.4333 16.8067 68.86 16.86L69.46 15.94V29.46L68.88 28.54ZM88.7845 30.2C88.2779 30.2 87.7045 30.1733 87.0645 30.12C86.4379 30.08 85.7845 30.0133 85.1045 29.92V15.48C85.7845 15.3867 86.4379 15.32 87.0645 15.28C87.7045 15.2267 88.2779 15.2 88.7845 15.2C90.5045 15.2 91.9312 15.4733 93.0645 16.02C94.1979 16.5667 95.0445 17.3933 95.6045 18.5C96.1645 19.6067 96.4445 21.0067 96.4445 22.7C96.4445 24.3933 96.1645 25.7933 95.6045 26.9C95.0445 28.0067 94.1979 28.8333 93.0645 29.38C91.9312 29.9267 90.5045 30.2 88.7845 30.2ZM88.8645 28.74C90.2379 28.74 91.3579 28.5267 92.2245 28.1C93.1045 27.6733 93.7579 27.0133 94.1845 26.12C94.6112 25.2267 94.8245 24.0867 94.8245 22.7C94.8245 21.3133 94.6112 20.1733 94.1845 19.28C93.7579 18.3867 93.1045 17.7267 92.2245 17.3C91.3579 16.8733 90.2379 16.66 88.8645 16.66C88.4379 16.66 87.9779 16.68 87.4845 16.72C86.9912 16.76 86.4579 16.82 85.8845 16.9L86.7045 16.06V29.34L85.8845 28.5C86.4579 28.5667 86.9912 28.6267 87.4845 28.68C87.9779 28.72 88.4379 28.74 88.8645 28.74ZM110.08 30.2C108.587 30.2 107.274 29.8933 106.14 29.28C105.02 28.6533 104.154 27.78 103.54 26.66C102.927 25.5267 102.62 24.2067 102.62 22.7C102.62 21.18 102.927 19.86 103.54 18.74C104.154 17.62 105.02 16.7533 106.14 16.14C107.274 15.5133 108.587 15.2 110.08 15.2C111.6 15.2 112.914 15.5133 114.02 16.14C115.14 16.7533 116.007 17.62 116.62 18.74C117.247 19.86 117.56 21.18 117.56 22.7C117.56 24.2067 117.247 25.5267 116.62 26.66C116.007 27.78 115.14 28.6533 114.02 29.28C112.914 29.8933 111.6 30.2 110.08 30.2ZM110.08 28.74C111.267 28.74 112.294 28.4933 113.16 28C114.04 27.4933 114.72 26.7933 115.2 25.9C115.68 24.9933 115.92 23.9267 115.92 22.7C115.92 21.4733 115.68 20.4133 115.2 19.52C114.72 18.6133 114.04 17.9133 113.16 17.42C112.294 16.9133 111.267 16.66 110.08 16.66C108.907 16.66 107.88 16.9133 107 17.42C106.12 17.9133 105.44 18.6133 104.96 19.52C104.494 20.4133 104.26 21.4733 104.26 22.7C104.26 23.9267 104.494 24.9933 104.96 25.9C105.44 26.7933 106.12 27.4933 107 28C107.88 28.4933 108.907 28.74 110.08 28.74ZM131.252 30.2C129.719 30.2 128.386 29.9 127.252 29.3C126.119 28.6867 125.246 27.82 124.632 26.7C124.032 25.58 123.732 24.2467 123.732 22.7C123.732 21.1533 124.032 19.82 124.632 18.7C125.246 17.58 126.119 16.72 127.252 16.12C128.386 15.5067 129.719 15.2 131.252 15.2C133.039 15.2 134.619 15.6133 135.992 16.44L135.572 17.86C134.239 17.06 132.819 16.66 131.312 16.66C130.099 16.66 129.046 16.9067 128.152 17.4C127.272 17.8933 126.592 18.5933 126.112 19.5C125.632 20.3933 125.392 21.46 125.392 22.7C125.392 23.9267 125.632 24.9933 126.112 25.9C126.592 26.8067 127.272 27.5067 128.152 28C129.046 28.4933 130.099 28.74 131.312 28.74C132.792 28.74 134.212 28.34 135.572 27.54L135.992 28.96C134.619 29.7867 133.039 30.2 131.252 30.2ZM147.069 30V16.86H141.829V15.4H153.969V16.86H148.729V30H147.069ZM165.759 30.2C164.266 30.2 162.953 29.8933 161.819 29.28C160.699 28.6533 159.833 27.78 159.219 26.66C158.606 25.5267 158.299 24.2067 158.299 22.7C158.299 21.18 158.606 19.86 159.219 18.74C159.833 17.62 160.699 16.7533 161.819 16.14C162.953 15.5133 164.266 15.2 165.759 15.2C167.279 15.2 168.593 15.5133 169.699 16.14C170.819 16.7533 171.686 17.62 172.299 18.74C172.926 19.86 173.239 21.18 173.239 22.7C173.239 24.2067 172.926 25.5267 172.299 26.66C171.686 27.78 170.819 28.6533 169.699 29.28C168.593 29.8933 167.279 30.2 165.759 30.2ZM165.759 28.74C166.946 28.74 167.973 28.4933 168.839 28C169.719 27.4933 170.399 26.7933 170.879 25.9C171.359 24.9933 171.599 23.9267 171.599 22.7C171.599 21.4733 171.359 20.4133 170.879 19.52C170.399 18.6133 169.719 17.9133 168.839 17.42C167.973 16.9133 166.946 16.66 165.759 16.66C164.586 16.66 163.559 16.9133 162.679 17.42C161.799 17.9133 161.119 18.6133 160.639 19.52C160.173 20.4133 159.939 21.4733 159.939 22.7C159.939 23.9267 160.173 24.9933 160.639 25.9C161.119 26.7933 161.799 27.4933 162.679 28C163.559 28.4933 164.586 28.74 165.759 28.74ZM180.136 15.48C180.616 15.4267 181.096 15.38 181.576 15.34C182.056 15.3 182.529 15.2667 182.996 15.24C183.476 15.2133 183.916 15.2 184.316 15.2C186.436 15.2 187.982 15.5467 188.956 16.24C189.929 16.9333 190.416 18.0333 190.416 19.54C190.416 21.06 189.929 22.1667 188.956 22.86C187.982 23.5533 186.436 23.9 184.316 23.9C183.796 23.9 183.229 23.88 182.616 23.84C182.002 23.8 181.362 23.7467 180.696 23.68L180.976 22.22C181.722 22.3133 182.356 22.38 182.876 22.42C183.409 22.46 183.916 22.48 184.396 22.48C185.942 22.48 187.056 22.2533 187.736 21.8C188.429 21.3333 188.776 20.5933 188.776 19.58C188.776 18.5533 188.429 17.8133 187.736 17.36C187.056 16.8933 185.942 16.66 184.396 16.66C183.916 16.66 183.402 16.68 182.856 16.72C182.322 16.76 181.676 16.8333 180.916 16.94L181.736 16.06V30H180.136V15.48ZM188.996 30L180.916 22.98H182.996L191.136 30H188.996ZM201.875 30.2C200.995 30.2 200.108 30.1067 199.215 29.92C198.335 29.7333 197.588 29.48 196.975 29.16L197.415 27.72C197.828 27.92 198.288 28.1 198.795 28.26C199.315 28.4067 199.848 28.5267 200.395 28.62C200.942 28.7 201.468 28.74 201.975 28.74C203.148 28.74 204.048 28.5133 204.675 28.06C205.315 27.6067 205.635 26.9667 205.635 26.14C205.635 25.6733 205.535 25.2867 205.335 24.98C205.148 24.66 204.875 24.4 204.515 24.2C204.155 23.9867 203.722 23.8 203.215 23.64C202.722 23.48 202.182 23.32 201.595 23.16C200.955 22.9867 200.362 22.7933 199.815 22.58C199.268 22.3533 198.782 22.0867 198.355 21.78C197.942 21.46 197.615 21.08 197.375 20.64C197.148 20.1867 197.035 19.6467 197.035 19.02C197.035 17.7933 197.495 16.8533 198.415 16.2C199.335 15.5333 200.628 15.2 202.295 15.2C203.148 15.2 203.995 15.2867 204.835 15.46C205.688 15.62 206.402 15.84 206.975 16.12L206.535 17.56C205.975 17.2933 205.315 17.08 204.555 16.92C203.795 16.7467 203.035 16.66 202.275 16.66C201.115 16.66 200.228 16.8667 199.615 17.28C199.002 17.6933 198.695 18.28 198.695 19.04C198.695 19.48 198.788 19.8467 198.975 20.14C199.162 20.4333 199.422 20.68 199.755 20.88C200.102 21.08 200.502 21.26 200.955 21.42C201.422 21.5667 201.942 21.72 202.515 21.88C203.182 22.0667 203.802 22.2733 204.375 22.5C204.962 22.7133 205.468 22.98 205.895 23.3C206.335 23.62 206.682 24.0133 206.935 24.48C207.188 24.9333 207.315 25.4933 207.315 26.16C207.315 27.4267 206.835 28.42 205.875 29.14C204.928 29.8467 203.595 30.2 201.875 30.2Z"
                        fill="white" />
                    <path
                        d="M77.961 46.07C77.4103 46.07 76.9343 45.965 76.533 45.755C76.1363 45.545 75.8307 45.244 75.616 44.852C75.406 44.46 75.301 43.991 75.301 43.445C75.301 42.899 75.406 42.43 75.616 42.038C75.8307 41.646 76.1363 41.345 76.533 41.135C76.9343 40.925 77.4103 40.82 77.961 40.82C78.591 40.82 79.151 40.96 79.641 41.24L79.452 41.926C78.9807 41.6553 78.493 41.52 77.989 41.52C77.6017 41.52 77.2657 41.597 76.981 41.751C76.6963 41.905 76.477 42.1267 76.323 42.416C76.1737 42.7007 76.099 43.0437 76.099 43.445C76.099 43.8417 76.1737 44.1847 76.323 44.474C76.477 44.7633 76.6963 44.985 76.981 45.139C77.2657 45.293 77.6017 45.37 77.989 45.37C78.479 45.37 78.9667 45.2347 79.452 44.964L79.641 45.65C79.151 45.93 78.591 46.07 77.961 46.07ZM85.3138 46V40.89H86.0838V46H85.3138ZM82.1638 46V40.89H82.9338V46H82.1638ZM82.5488 43.676V42.976H85.6988V43.676H82.5488ZM91.0431 46.07C90.5111 46.07 90.0467 45.9627 89.6501 45.748C89.2581 45.5333 88.9547 45.23 88.7401 44.838C88.5254 44.4413 88.4181 43.977 88.4181 43.445C88.4181 42.9083 88.5254 42.444 88.7401 42.052C88.9547 41.66 89.2581 41.3567 89.6501 41.142C90.0467 40.9273 90.5111 40.82 91.0431 40.82C91.5797 40.82 92.0441 40.9273 92.4361 41.142C92.8281 41.3567 93.1314 41.66 93.3461 42.052C93.5607 42.444 93.6681 42.9083 93.6681 43.445C93.6681 43.977 93.5607 44.4413 93.3461 44.838C93.1314 45.23 92.8281 45.5333 92.4361 45.748C92.0441 45.9627 91.5797 46.07 91.0431 46.07ZM91.0431 45.37C91.4211 45.37 91.7477 45.293 92.0231 45.139C92.2984 44.9803 92.5084 44.7587 92.6531 44.474C92.8024 44.1847 92.8771 43.8417 92.8771 43.445C92.8771 43.0483 92.8024 42.7077 92.6531 42.423C92.5084 42.1337 92.2984 41.912 92.0231 41.758C91.7477 41.5993 91.4211 41.52 91.0431 41.52C90.6651 41.52 90.3384 41.5993 90.0631 41.758C89.7877 41.912 89.5754 42.1337 89.4261 42.423C89.2814 42.7077 89.2091 43.0483 89.2091 43.445C89.2091 43.8417 89.2814 44.1847 89.4261 44.474C89.5754 44.7587 89.7877 44.9803 90.0631 45.139C90.3384 45.293 90.6651 45.37 91.0431 45.37ZM98.398 46.07C97.866 46.07 97.4017 45.9627 97.005 45.748C96.613 45.5333 96.3097 45.23 96.095 44.838C95.8803 44.4413 95.773 43.977 95.773 43.445C95.773 42.9083 95.8803 42.444 96.095 42.052C96.3097 41.66 96.613 41.3567 97.005 41.142C97.4017 40.9273 97.866 40.82 98.398 40.82C98.9347 40.82 99.399 40.9273 99.791 41.142C100.183 41.3567 100.486 41.66 100.701 42.052C100.916 42.444 101.023 42.9083 101.023 43.445C101.023 43.977 100.916 44.4413 100.701 44.838C100.486 45.23 100.183 45.5333 99.791 45.748C99.399 45.9627 98.9347 46.07 98.398 46.07ZM98.398 45.37C98.776 45.37 99.1027 45.293 99.378 45.139C99.6533 44.9803 99.8633 44.7587 100.008 44.474C100.157 44.1847 100.232 43.8417 100.232 43.445C100.232 43.0483 100.157 42.7077 100.008 42.423C99.8633 42.1337 99.6533 41.912 99.378 41.758C99.1027 41.5993 98.776 41.52 98.398 41.52C98.02 41.52 97.6933 41.5993 97.418 41.758C97.1427 41.912 96.9303 42.1337 96.781 42.423C96.6363 42.7077 96.564 43.0483 96.564 43.445C96.564 43.8417 96.6363 44.1847 96.781 44.474C96.9303 44.7587 97.1427 44.9803 97.418 45.139C97.6933 45.293 98.02 45.37 98.398 45.37ZM104.853 46.07C104.527 46.07 104.202 46.035 103.88 45.965C103.563 45.895 103.295 45.8017 103.075 45.685L103.271 44.985C103.425 45.0597 103.593 45.1273 103.775 45.188C103.962 45.244 104.151 45.2883 104.342 45.321C104.538 45.3537 104.725 45.37 104.902 45.37C105.262 45.37 105.537 45.3047 105.728 45.174C105.924 45.0433 106.022 44.8567 106.022 44.614C106.022 44.4787 105.992 44.3667 105.931 44.278C105.871 44.1847 105.782 44.1053 105.665 44.04C105.553 43.9747 105.413 43.9163 105.245 43.865C105.077 43.809 104.888 43.753 104.678 43.697C104.445 43.6317 104.23 43.5593 104.034 43.48C103.843 43.396 103.675 43.2957 103.53 43.179C103.39 43.0623 103.281 42.9247 103.201 42.766C103.127 42.6027 103.089 42.4137 103.089 42.199C103.089 41.7557 103.257 41.415 103.593 41.177C103.929 40.939 104.403 40.82 105.014 40.82C105.322 40.82 105.628 40.8503 105.931 40.911C106.239 40.967 106.501 41.044 106.715 41.142L106.519 41.842C106.309 41.744 106.069 41.667 105.798 41.611C105.532 41.5503 105.269 41.52 105.007 41.52C104.643 41.52 104.366 41.5807 104.174 41.702C103.988 41.8187 103.894 41.9867 103.894 42.206C103.894 42.3367 103.922 42.4463 103.978 42.535C104.034 42.6237 104.116 42.7007 104.223 42.766C104.331 42.8267 104.461 42.8827 104.615 42.934C104.769 42.9853 104.947 43.039 105.147 43.095C105.399 43.165 105.628 43.242 105.833 43.326C106.039 43.41 106.214 43.5103 106.358 43.627C106.508 43.7437 106.622 43.8837 106.701 44.047C106.785 44.2057 106.827 44.397 106.827 44.621C106.827 45.0783 106.655 45.4353 106.309 45.692C105.964 45.944 105.479 46.07 104.853 46.07ZM109.246 46V40.89H112.606V41.576H110.016V42.99H112.466V43.662H110.016V45.314H112.606V46H109.246ZM119.914 46V44.082L117.968 40.89H118.85L120.306 43.389H120.32L121.776 40.89H122.658L120.712 44.082V46H119.914ZM126.655 46.07C126.123 46.07 125.659 45.9627 125.262 45.748C124.87 45.5333 124.567 45.23 124.352 44.838C124.137 44.4413 124.03 43.977 124.03 43.445C124.03 42.9083 124.137 42.444 124.352 42.052C124.567 41.66 124.87 41.3567 125.262 41.142C125.659 40.9273 126.123 40.82 126.655 40.82C127.192 40.82 127.656 40.9273 128.048 41.142C128.44 41.3567 128.743 41.66 128.958 42.052C129.173 42.444 129.28 42.9083 129.28 43.445C129.28 43.977 129.173 44.4413 128.958 44.838C128.743 45.23 128.44 45.5333 128.048 45.748C127.656 45.9627 127.192 46.07 126.655 46.07ZM126.655 45.37C127.033 45.37 127.36 45.293 127.635 45.139C127.91 44.9803 128.12 44.7587 128.265 44.474C128.414 44.1847 128.489 43.8417 128.489 43.445C128.489 43.0483 128.414 42.7077 128.265 42.423C128.12 42.1337 127.91 41.912 127.635 41.758C127.36 41.5993 127.033 41.52 126.655 41.52C126.277 41.52 125.95 41.5993 125.675 41.758C125.4 41.912 125.187 42.1337 125.038 42.423C124.893 42.7077 124.821 43.0483 124.821 43.445C124.821 43.8417 124.893 44.1847 125.038 44.474C125.187 44.7587 125.4 44.9803 125.675 45.139C125.95 45.293 126.277 45.37 126.655 45.37ZM133.585 46.07C132.894 46.07 132.383 45.8997 132.052 45.559C131.72 45.2137 131.555 44.684 131.555 43.97V40.89H132.325V43.83C132.325 44.208 132.364 44.509 132.444 44.733C132.528 44.957 132.661 45.1203 132.843 45.223C133.029 45.321 133.277 45.37 133.585 45.37C133.893 45.37 134.138 45.321 134.32 45.223C134.506 45.1203 134.639 44.957 134.719 44.733C134.803 44.509 134.845 44.208 134.845 43.83V40.89H135.615V43.97C135.615 44.684 135.449 45.2137 135.118 45.559C134.786 45.8997 134.275 46.07 133.585 46.07ZM138.186 40.918C138.35 40.8993 138.52 40.883 138.697 40.869C138.879 40.855 139.059 40.8433 139.236 40.834C139.418 40.8247 139.582 40.82 139.726 40.82C140.478 40.82 141.026 40.946 141.371 41.198C141.721 41.45 141.896 41.8513 141.896 42.402C141.896 42.9527 141.721 43.354 141.371 43.606C141.026 43.858 140.478 43.984 139.726 43.984C139.544 43.984 139.339 43.977 139.11 43.963C138.886 43.949 138.667 43.9327 138.452 43.914L138.585 43.221C138.847 43.2537 139.068 43.277 139.25 43.291C139.437 43.305 139.607 43.312 139.761 43.312C140.237 43.312 140.58 43.242 140.79 43.102C141.005 42.9573 141.112 42.7287 141.112 42.416C141.112 42.0987 141.005 41.87 140.79 41.73C140.58 41.59 140.237 41.52 139.761 41.52C139.607 41.52 139.437 41.527 139.25 41.541C139.068 41.555 138.847 41.5783 138.585 41.611L138.956 41.184V46H138.186V40.918ZM141.168 46L138.571 43.585H139.544L142.176 46H141.168ZM149.244 46.07C149.058 46.07 148.841 46.0607 148.593 46.042C148.346 46.028 148.096 46.0047 147.844 45.972V40.918C148.096 40.8853 148.346 40.862 148.593 40.848C148.841 40.8293 149.058 40.82 149.244 40.82C149.856 40.82 150.357 40.9133 150.749 41.1C151.141 41.2867 151.431 41.5737 151.617 41.961C151.809 42.3483 151.904 42.843 151.904 43.445C151.904 44.047 151.809 44.5417 151.617 44.929C151.431 45.3163 151.141 45.6033 150.749 45.79C150.357 45.9767 149.856 46.07 149.244 46.07ZM149.293 45.37C149.727 45.37 150.077 45.3047 150.343 45.174C150.614 45.0433 150.81 44.838 150.931 44.558C151.057 44.2733 151.12 43.9023 151.12 43.445C151.12 42.9877 151.057 42.619 150.931 42.339C150.81 42.0543 150.614 41.8467 150.343 41.716C150.077 41.5853 149.727 41.52 149.293 41.52C149.149 41.52 148.985 41.527 148.803 41.541C148.626 41.555 148.439 41.5737 148.243 41.597L148.614 41.184V45.706L148.243 45.293C148.439 45.3163 148.626 45.335 148.803 45.349C148.985 45.363 149.149 45.37 149.293 45.37ZM156.635 46.07C156.103 46.07 155.638 45.9627 155.242 45.748C154.85 45.5333 154.546 45.23 154.332 44.838C154.117 44.4413 154.01 43.977 154.01 43.445C154.01 42.9083 154.117 42.444 154.332 42.052C154.546 41.66 154.85 41.3567 155.242 41.142C155.638 40.9273 156.103 40.82 156.635 40.82C157.171 40.82 157.636 40.9273 158.028 41.142C158.42 41.3567 158.723 41.66 158.938 42.052C159.152 42.444 159.26 42.9083 159.26 43.445C159.26 43.977 159.152 44.4413 158.938 44.838C158.723 45.23 158.42 45.5333 158.028 45.748C157.636 45.9627 157.171 46.07 156.635 46.07ZM156.635 45.37C157.013 45.37 157.339 45.293 157.615 45.139C157.89 44.9803 158.1 44.7587 158.245 44.474C158.394 44.1847 158.469 43.8417 158.469 43.445C158.469 43.0483 158.394 42.7077 158.245 42.423C158.1 42.1337 157.89 41.912 157.615 41.758C157.339 41.5993 157.013 41.52 156.635 41.52C156.257 41.52 155.93 41.5993 155.655 41.758C155.379 41.912 155.167 42.1337 155.018 42.423C154.873 42.7077 154.801 43.0483 154.801 43.445C154.801 43.8417 154.873 44.1847 155.018 44.474C155.167 44.7587 155.379 44.9803 155.655 45.139C155.93 45.293 156.257 45.37 156.635 45.37ZM164.025 46.07C163.474 46.07 162.998 45.965 162.597 45.755C162.2 45.545 161.894 45.244 161.68 44.852C161.47 44.46 161.365 43.991 161.365 43.445C161.365 42.899 161.47 42.43 161.68 42.038C161.894 41.646 162.2 41.345 162.597 41.135C162.998 40.925 163.474 40.82 164.025 40.82C164.655 40.82 165.215 40.96 165.705 41.24L165.516 41.926C165.044 41.6553 164.557 41.52 164.053 41.52C163.665 41.52 163.329 41.597 163.045 41.751C162.76 41.905 162.541 42.1267 162.387 42.416C162.237 42.7007 162.163 43.0437 162.163 43.445C162.163 43.8417 162.237 44.1847 162.387 44.474C162.541 44.7633 162.76 44.985 163.045 45.139C163.329 45.293 163.665 45.37 164.053 45.37C164.543 45.37 165.03 45.2347 165.516 44.964L165.705 45.65C165.215 45.93 164.655 46.07 164.025 46.07ZM169.442 46V41.59H167.706V40.89H171.976V41.59H170.24V46H169.442ZM176.122 46.07C175.59 46.07 175.126 45.9627 174.729 45.748C174.337 45.5333 174.034 45.23 173.819 44.838C173.605 44.4413 173.497 43.977 173.497 43.445C173.497 42.9083 173.605 42.444 173.819 42.052C174.034 41.66 174.337 41.3567 174.729 41.142C175.126 40.9273 175.59 40.82 176.122 40.82C176.659 40.82 177.123 40.9273 177.515 41.142C177.907 41.3567 178.211 41.66 178.425 42.052C178.64 42.444 178.747 42.9083 178.747 43.445C178.747 43.977 178.64 44.4413 178.425 44.838C178.211 45.23 177.907 45.5333 177.515 45.748C177.123 45.9627 176.659 46.07 176.122 46.07ZM176.122 45.37C176.5 45.37 176.827 45.293 177.102 45.139C177.378 44.9803 177.588 44.7587 177.732 44.474C177.882 44.1847 177.956 43.8417 177.956 43.445C177.956 43.0483 177.882 42.7077 177.732 42.423C177.588 42.1337 177.378 41.912 177.102 41.758C176.827 41.5993 176.5 41.52 176.122 41.52C175.744 41.52 175.418 41.5993 175.142 41.758C174.867 41.912 174.655 42.1337 174.505 42.423C174.361 42.7077 174.288 43.0483 174.288 43.445C174.288 43.8417 174.361 44.1847 174.505 44.474C174.655 44.7587 174.867 44.9803 175.142 45.139C175.418 45.293 175.744 45.37 176.122 45.37ZM181.078 40.918C181.241 40.8993 181.412 40.883 181.589 40.869C181.771 40.855 181.951 40.8433 182.128 40.834C182.31 40.8247 182.473 40.82 182.618 40.82C183.369 40.82 183.918 40.946 184.263 41.198C184.613 41.45 184.788 41.8513 184.788 42.402C184.788 42.9527 184.613 43.354 184.263 43.606C183.918 43.858 183.369 43.984 182.618 43.984C182.436 43.984 182.231 43.977 182.002 43.963C181.778 43.949 181.559 43.9327 181.344 43.914L181.477 43.221C181.738 43.2537 181.96 43.277 182.142 43.291C182.329 43.305 182.499 43.312 182.653 43.312C183.129 43.312 183.472 43.242 183.682 43.102C183.897 42.9573 184.004 42.7287 184.004 42.416C184.004 42.0987 183.897 41.87 183.682 41.73C183.472 41.59 183.129 41.52 182.653 41.52C182.499 41.52 182.329 41.527 182.142 41.541C181.96 41.555 181.738 41.5783 181.477 41.611L181.848 41.184V46H181.078V40.918ZM184.06 46L181.463 43.585H182.436L185.068 46H184.06Z"
                        fill="white" />
                </svg>
            </a>

            <ul class="nav nav-pills flex-column lh-5 fs-side">
                <li class="nav-item">
                    <a href="{{ route('profile.index') }}" class="nav-link text-white" aria-current="page">
                        <i class="fa-solid fa-igloo p-1"></i>
                        Home
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profile.show') }}" class="nav-link  text-white" aria-current="page">
                        <i class="fa-solid fa-user-doctor p-1"></i>
                        Il tuo Profilo
                    </a>
                </li>

                <li>
                    <a href="{{ route('messages.index') }}" class="nav-link  text-white">
                        <i class="fa-solid fa-comment-medical p-1"></i>
                        Messaggi
                    </a>
                </li>
                <li>
                    <a href="/checkout" class="nav-link text-white">
                        <i class="fa-regular fa-star p-1"></i>
                        Piani di abbonamento
                    </a>
                </li>
                <li>
                    <a href="{{ route('profile.show') }}" class="nav-link text-white">
                        <i class="fa-solid fa-chart-line p-1"></i>
                        Le tue statistiche
                    </a>
                </li>
                <li>
                    <a href="{{ route('reviews.index') }}" class="nav-link text-white">
                        <i class="fa-solid fa-star-half-stroke p-1"></i>
                        Recensioni
                    </a>
                </li>
                <li>
                    <a href="{{ route('services.index') }}" class="nav-link text-white">
                        <i class="fa-solid fa-star-half-stroke p-1"></i>
                        Servizi
                    </a>
                </li>
            </ul>

            <div class="dropdown ps-3 pb-2">
                <hr>
                <a href="#" class="d-flex align-items-center text-white link-dark text-decoration-none dropdown-toggle"
                    id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="http://localhost:8000/storage/{{ Auth::user()->photo }}" alt="" width="32" height="32"
                        class="rounded-circle me-2">
                    <strong class="text-white text-capitalize"> Dr. {{ Auth::user()->firstname }}
                        {{ Auth::user()->lastname }} </strong>
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                    <li><a class="dropdown-item" href="{{ route('services.index') }}">Gestisci le tue
                            prestazioni</a></li>
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Modifica
                            profilo</a></li>
                    <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profilo</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();"> Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>

        </div>

        <div class="container-fluid m-3 p-3">
            {{-- COSE BLADE --}}
            @yield('content')
            {{-- PER QUI SOTTO --> Checkout.vue --}}
            <div id="app" class="py-3" style="width:100%">
                {{-- @yield('content') --}}
            </div>
        </div>
    </main>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script type="text/javascript">
    $('.show_confirm').click(function(event) {
        var form = $(this).closest("form");
        var name = $(this).data("name");
        event.preventDefault();
        swal({
                title: `Are you sure you want to delete this record?`,
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
    });
</script>

</html>
