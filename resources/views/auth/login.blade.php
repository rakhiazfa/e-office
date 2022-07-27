<x-layout title="E Office | Login">
    <div class="min-h-screen">
        <div class="custom-wrapper min-h-screen flex justify-center items-center">
            <div class="border rounded-lg p-10">
                <h1 class="text-2xl lg:text-3xl font-medium mb-3">Login</h1>
                <p class="text-zinc-400 mb-5">Selamat datang kembali, silahkan masukan akun anda.</p>
                <form action="{{ route('login.store') }}" method="POST">
                    @csrf
                    <div class="mb-5">
                        <input type="text" class="field" name="email" placeholder="Enter your email">
                        @error('email')
                            <p class="invalid">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-5">
                        <input type="password" class="field" name="password" placeholder="Masukan password anda">
                        @error('password')
                            <p class="invalid">{{ $message }}</p>
                        @enderror
                    </div>
                    <button type="submit" class="button w-full bg-blue-500 text-white">Login</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>