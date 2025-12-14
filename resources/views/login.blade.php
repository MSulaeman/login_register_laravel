<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Login</title>
</head>
<body class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="w-full max-w-md mx-auto p-6">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-2xl font-semibold text-gray-800 mb-4">Login</h1>

            @if(session('error'))
                <div class="mb-4 text-sm text-red-700 bg-red-100 border border-red-200 px-4 py-2 rounded">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-4 text-sm text-red-700 bg-red-100 border border-red-200 px-4 py-2 rounded">
                    <ul class="list-disc pl-5">
                        @foreach($errors->all() as $err)
                            <li>{{ $err }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form id="loginForm" method="POST" action="/login" class="space-y-4">
                @csrf

                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" value="{{ old('email') }}" required
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="email@perusahaan.com">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Kata Sandi</label>
                    <div class="mt-1 relative">
                        <input id="password" name="password" type="password" required
                            class="block w-full pr-10 px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Masukkan kata sandi">
                        <button type="button" id="togglePassword" aria-label="Tampilkan kata sandi"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500">
                        </button>
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="remember" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                    </label>

                    <a href="#" class="text-sm text-indigo-600 hover:underline">Lupa kata sandi?</a>
                </div>

                <div>
                    <button type="submit" class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">Masuk</button>
                </div>

                <p class="text-center text-sm text-gray-600">Belum punya akun? <a href="/register" class="text-indigo-600 hover:underline">Daftar</a></p>
            </form>
        </div>

        <p class="text-center text-xs text-gray-500 mt-4">Hak akses hanya untuk karyawan perusahaan. Gunakan email perusahaan Anda.</p>
    </div>

    <script>
        // Toggle password visibility
        (function() {
            const toggle = document.getElementById('togglePassword');
            const pwd = document.getElementById('password');
            if (!toggle || !pwd) return;

            toggle.addEventListener('click', function() {
                const type = pwd.getAttribute('type') === 'password' ? 'text' : 'password';
                pwd.setAttribute('type', type);
                // change icon / aria-label
                this.setAttribute('aria-label', type === 'password' ? 'Tampilkan kata sandi' : 'Sembunyikan kata sandi');
            });

            // basic client-side validation to give quick feedback
            const form = document.getElementById('loginForm');
            form.addEventListener('submit', function(e) {
                const email = document.getElementById('email').value.trim();
                const password = pwd.value.trim();
                if (!email || !password) {
                    e.preventDefault();
                    alert('Mohon lengkapi email dan kata sandi.');
                }
            });
        })();
    </script>
</body>
</html>
