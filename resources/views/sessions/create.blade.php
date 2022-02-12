<x-layout>

    <section class="px-6 py-8 mt-10">
        
        <main class="max-w-lg mx-auto">
            <x-panel>
            <h1 class="text-center font-bold text-xl">Login!</h1>

            <form method="post" action="/login" class="mt-10">

                @csrf

                <x-form.input name="email" type="email" autocomplete="username" />

                <x-form.input name="password" type="password" autocomplete="new-password" />

                <x-form.field>
                <x-form.button>Log In</x-form.button>
                </x-form.field>
            </form>
        </x-panel>
        </main>
        
    </section>
</x-layout>