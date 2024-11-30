<script setup>
import { Head, Link } from "@inertiajs/vue3";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});

function handleImageError() {
    document.getElementById("screenshot-container")?.classList.add("!hidden");
    document.getElementById("docs-card")?.classList.add("!row-span-1");
    document.getElementById("docs-card-content")?.classList.add("!flex-row");
    document.getElementById("background")?.classList.add("!hidden");
}
</script>

<template>
    <Head title="Welcome" />
    <div
        class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50 min-h-screen flex flex-col"
    >
        <img
            id="background"
            class="absolute -left-30 top-0 max-w-[564px] z-0"
            src="https://cdn.pixabay.com/photo/2023/09/30/21/16/river-8286407_640.png"
        />
        <div
            class="relative flex-grow flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white z-10"
        >
            <div class="w-full max-w-2xl px-6 lg:max-w-7xl">
                <header
                    class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3"
                >
                    <div class="flex lg:justify-center lg:col-start-2">
                        <!-- Logo o título aquí -->
                    </div>
                    <nav v-if="canLogin" class="-mx-3 flex flex-1 justify-end">
                        <Link
                            v-if="$page.props.auth.user"
                            :href="route('dashboard')"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Dashboard
                        </Link>

                        <template v-else>
                            <Link
                                :href="route('login')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Log in
                            </Link>

                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </Link>
                        </template>
                    </nav>
                </header>

                <main class="mt-6">
                    <div class="bg-white w-full p-8 rounded-lg shadow-md">
                        <h1 class="text-3xl font-bold mb-4 text-gray-800">
                            Bienvenido a la OGC
                        </h1>
                        <p class="text-lg text-gray-600">
                            Oficina de Gestión de Calidad de la Universidad
                            Nacional del Altiplano Puno
                        </p>
                    </div>
                </main>
            </div>
        </div>
        <footer class="bg-gray-800 text-white py-8 mt-auto">
            <div class="container mx-auto text-center">
                <p>
                    &copy; {{ new Date().getFullYear() }} Universidad Nacional
                    del Altiplano Puno. Todos los derechos reservados.
                </p>
                <p class="mt-2">
                    Versión de Laravel: {{ laravelVersion }} | Versión de PHP:
                    {{ phpVersion }}
                </p>
            </div>
        </footer>
    </div>
</template>
