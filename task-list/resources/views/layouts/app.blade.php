<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Task List App')</title>

  <script src="https://cdn.tailwindcss.com"></script>
  <script src="//unpkg.com/alpinejs" defer></script>

  <style type="text/tailwindcss">
    .btn {
      @apply inline-block rounded-md px-4 py-2 text-center font-medium text-white bg-pink-500 hover:bg-pink-600 shadow;
    }

    .link {
      @apply font-medium text-pink-600 hover:underline;
    }

    label {
      @apply block text-sm font-semibold text-gray-700 uppercase mb-2;
    }

    input,
    textarea {
      @apply shadow-sm border border-gray-300 w-full py-2 px-3 rounded-md text-gray-700 focus:outline-none focus:ring-2 focus:ring-pink-500;
    }

    .error {
      @apply text-sm text-red-500 mt-1;
    }
  </style>

  @yield('styles')
</head>

<body class="bg-gray-100 text-gray-900">
  <div class="container mx-auto max-w-2xl mt-12 px-4">
    <h1 class="mb-10 text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-gray-700 via-gray-900 to-black tracking-tight drop-shadow-md">@yield('title')</h1>

    <div x-data="{ flash: true }">
      @if (session()->has('success'))
        <div x-show="flash"
          class="relative mb-6 rounded border border-green-400 bg-green-100 px-4 py-3 text-green-700"
          role="alert">
          <strong class="font-bold">Success!</strong>
          <div>{{ session('success') }}</div>

          <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
              stroke-width="1.5" @click="flash = false"
              stroke="currentColor" class="h-6 w-6 cursor-pointer">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </span>
        </div>
      @endif

      @yield('content')
    </div>
  </div>
</body>

</html>
