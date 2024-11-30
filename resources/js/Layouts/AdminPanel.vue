<script setup>
import { ref } from "vue";
import { Head, Link } from "@inertiajs/vue3";
import ApplicationMark from "@/Components/ApplicationMark.vue";
import NavLink from "@/Components/NavLink.vue";
const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    router.put(
        route("current-team.update"),
        {
            team_id: team.id,
        },
        {
            preserveState: false,
        }
    );
};

const logout = () => {
    router.post(route("logout"));
};
const isOpen = ref(false);
</script>
<template>
    <div class="flex h-screen bg-gray-50">
        <!-- Sidebar -->
        <div
            class="flex flex-col w-64 h-screen bg-gradient-to-b from-indigo-700 to-purple-800"
        >
            <!-- Logo Area -->
            <div class="flex justify-center p-8 border-b border-indigo-500/30">
                <ApplicationMark class="w-12 h-12 text-white" />
            </div>

            <!-- Navigation Links - Now in a container with max-height -->
            <div class="flex flex-col flex-1 overflow-hidden">
                <nav class="flex-1 px-4 py-12 space-y-6 overflow-y-auto">
                    <!-- Dashboard -->
                    <NavLink
                        :href="route('dashboard')"
                        :active="route().current('dashboard')"
                        class="block w-full px-4 py-2 transition-all duration-300 rounded-lg group hover:bg-white/15"
                        :class="{ 'bg-white/20': route().current('dashboard') }"
                    >
                        <div class="flex items-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-6 h-6 mr-4 text-indigo-200 transition-colors group-hover:text-white"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"
                                />
                            </svg>
                            <span class="text-lg font-medium text-white">
                                Dashboard
                            </span>
                        </div>
                    </NavLink>

                    <!-- Users -->
                    <NavLink
                        :href="route('user.index')"
                        :active="route().current('user.index')"
                        class="block w-full px-4 py-2 transition-all duration-300 rounded-lg group hover:bg-white/15"
                        :class="{
                            'bg-white/20': route().current('user.index'),
                        }"
                    >
                        <div class="flex items-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="w-6 h-6 mr-4 text-indigo-200 transition-colors group-hover:text-white"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"
                                />
                            </svg>
                            <span class="text-lg font-medium text-white">
                                Usuarios
                            </span>
                        </div>
                    </NavLink>

                    <!-- ESTANDAR DINAMICO -->
                    <NavLink
                        :href="route('dinamico.index')"
                        :active="route().current('dinamico.index')"
                        class="block w-full px-4 py-2 transition-all duration-300 rounded-lg group hover:bg-white/15"
                        :class="{
                            'bg-white/20': route().current('dinamico.index'),
                        }"
                    >
                        <div class="flex items-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6 mr-4 text-indigo-200 transition-colors group-hover:text-white"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z"
                                />
                            </svg>

                            <span class="text-lg font-medium text-white">
                                Est Dinamico
                            </span>
                        </div>
                    </NavLink>
                    <!-- Tipo de Dato -->
                    <NavLink
                        :href="route('campo.index')"
                        :active="route().current('campo.index')"
                        class="block w-full px-4 py-2 transition-all duration-300 rounded-lg group hover:bg-white/15"
                        :class="{
                            'bg-white/20': route().current('campo.index'),
                        }"
                    >
                        <div class="flex items-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6 mr-4 text-indigo-200 transition-colors group-hover:text-white"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M20.25 6.375c0 2.278-3.694 4.125-8.25 4.125S3.75 8.653 3.75 6.375m16.5 0c0-2.278-3.694-4.125-8.25-4.125S3.75 4.097 3.75 6.375m16.5 0v11.25c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125V6.375m16.5 0v3.75m-16.5-3.75v3.75m16.5 0v3.75C20.25 16.153 16.556 18 12 18s-8.25-1.847-8.25-4.125v-3.75m16.5 0c0 2.278-3.694 4.125-8.25 4.125s-8.25-1.847-8.25-4.125"
                                />
                            </svg>

                            <span class="text-lg font-medium text-white">
                                Tipo de Dato
                            </span>
                        </div>
                    </NavLink>

                    <!-- Calificacion -->
                    <NavLink
                        :href="route('calificacion.index')"
                        :active="route().current('calificacion.index')"
                        class="block w-full px-4 py-2 transition-all duration-300 rounded-lg group hover:bg-white/15"
                        :class="{
                            'bg-white/20':
                                route().current('calificacion.index'),
                        }"
                    >
                        <div class="flex items-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6 mr-4 text-indigo-200 transition-colors group-hover:text-white"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75"
                                />
                            </svg>

                            <span class="text-lg font-medium text-white">
                                Calificacion
                            </span>
                        </div>
                    </NavLink>
                    <!-- CRITERIO -->
                    <NavLink
                        :href="route('criterio.index')"
                        :active="route().current('criterio.index')"
                        class="block w-full px-4 py-2 transition-all duration-300 rounded-lg group hover:bg-white/15"
                        :class="{
                            'bg-white/20': route().current('criterio.index'),
                        }"
                    >
                        <div class="flex items-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6 mr-4 text-indigo-200 transition-colors group-hover:text-white"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15.666 3.888A2.25 2.25 0 0 0 13.5 2.25h-3c-1.03 0-1.9.693-2.166 1.638m7.332 0c.055.194.084.4.084.612v0a.75.75 0 0 1-.75.75H9a.75.75 0 0 1-.75-.75v0c0-.212.03-.418.084-.612m7.332 0c.646.049 1.288.11 1.927.184 1.1.128 1.907 1.077 1.907 2.185V19.5a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 19.5V6.257c0-1.108.806-2.057 1.907-2.185a48.208 48.208 0 0 1 1.927-.184"
                                />
                            </svg>

                            <span class="text-lg font-medium text-white">
                                Criterio
                            </span>
                        </div>
                    </NavLink>
                    <!-- ESTANDAR AUDITORIA -->

                    <NavLink
                        :href="route('auditoria.index')"
                        :active="route().current('auditoria.index')"
                        class="block w-full px-4 py-2 transition-all duration-300 rounded-lg group hover:bg-white/15"
                        :class="{
                            'bg-white/20': route().current('auditoria.index'),
                        }"
                    >
                        <div class="flex items-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6 mr-4 text-indigo-200 transition-colors group-hover:text-white"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M15.75 5.25a3 3 0 0 1 3 3m3 0a6 6 0 0 1-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1 1 21.75 8.25Z"
                                />
                            </svg>

                            <span class="text-lg font-medium text-white">
                                Auditoria
                            </span>
                        </div>
                    </NavLink>
                    <!-- ESTANDAR MODELO -->
                    <NavLink
                        :href="route('modelo.index')"
                        :active="route().current('modelo.index')"
                        class="block w-full px-4 py-2 transition-all duration-300 rounded-lg group hover:bg-white/15"
                        :class="{
                            'bg-white/20': route().current('modelo.index'),
                        }"
                    >
                        <div class="flex items-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6 mr-4 text-indigo-200 transition-colors group-hover:text-white"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z"
                                />
                            </svg>

                            <span class="text-lg font-medium text-white">
                                Modelo
                            </span>
                        </div>
                    </NavLink>
                    <!-- ESTANDAR MODULO -->
                    <NavLink
                        :href="route('modulo.index')"
                        :active="route().current('modulo.index')"
                        class="block w-full px-4 py-2 transition-all duration-300 rounded-lg group hover:bg-white/15"
                        :class="{
                            'bg-white/20': route().current('modulo.index'),
                        }"
                    >
                        <div class="flex items-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6 mr-4 text-indigo-200 transition-colors group-hover:text-white"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M3 8.25V18a2.25 2.25 0 0 0 2.25 2.25h13.5A2.25 2.25 0 0 0 21 18V8.25m-18 0V6a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 6v2.25m-18 0h18M5.25 6h.008v.008H5.25V6ZM7.5 6h.008v.008H7.5V6Zm2.25 0h.008v.008H9.75V6Z"
                                />
                            </svg>

                            <span class="text-lg font-medium text-white">
                                Modulo
                            </span>
                        </div>
                    </NavLink>

                    <div class="mt-4">
                        <div class="relative mt-2">
                            <button
                                @click="isOpen = !isOpen"
                                class="flex items-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="w-6 h-6 mr-4 text-indigo-200 transition-colors group-hover:text-white"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5"
                                    />
                                </svg>

                                Carreras
                                <svg
                                    class="w-5 h-5 ml-2 -mr-1 text-gray-500"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                    fill="currentColor"
                                    aria-hidden="true"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"
                                    />
                                </svg>
                            </button>

                            <div
                                v-if="isOpen"
                                class="absolute left-0 z-20 w-full mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5"
                            >
                                <div
                                    class="py-1"
                                    role="menu"
                                    aria-orientation="vertical"
                                >
                                    <NavLink
                                        :href="route('facultad.index')"
                                        :active="
                                            route().current('facultad.index')
                                        "
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                        role="menuitem"
                                    >
                                        Facultades
                                    </NavLink>
                                    <NavLink
                                        :href="route('escuela.index')"
                                        :active="
                                            route().current('escuela.index')
                                        "
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-gray-900"
                                        role="menuitem"
                                    >
                                        Programa de Estudios
                                    </NavLink>
                                </div>
                            </div>
                        </div>
                    </div>
                    <NavLink
                        :href="route('roles.index')"
                        :active="route().current('roles.index')"
                        class="block w-full px-4 py-2 transition-all duration-300 rounded-lg group hover:bg-white/15"
                        :class="{
                            'bg-white/20': route().current('roles.index'),
                        }"
                    >
                        <div class="flex items-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6 mr-4 text-indigo-200 transition-colors group-hover:text-white"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 0 0 .75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 0 0-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0 1 12 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 0 1-.673-.38m0 0A2.18 2.18 0 0 1 3 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 0 1 3.413-.387m7.5 0V5.25A2.25 2.25 0 0 0 13.5 3h-3a2.25 2.25 0 0 0-2.25 2.25v.894m7.5 0a48.667 48.667 0 0 0-7.5 0M12 12.75h.008v.008H12v-.008Z"
                                />
                            </svg>

                            <span class="text-lg font-medium text-white">
                                Roles
                            </span>
                        </div>
                    </NavLink>
                    <NavLink
                        :href="route('estandar.index')"
                        :active="route().current('estandar.index')"
                        class="block w-full px-4 py-2 transition-all duration-300 rounded-lg group hover:bg-white/15"
                        :class="{
                            'bg-white/20': route().current('estandar.index'),
                        }"
                    >
                        <div class="flex items-center">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="w-6 h-6 mr-4 text-indigo-200 transition-colors group-hover:text-white"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M9 4.5v15m6-15v15m-10.875 0h15.75c.621 0 1.125-.504 1.125-1.125V5.625c0-.621-.504-1.125-1.125-1.125H4.125C3.504 4.5 3 5.004 3 5.625v12.75c0 .621.504 1.125 1.125 1.125Z"
                                />
                            </svg>

                            <span class="text-lg font-medium text-white">
                                Estandar
                            </span>
                        </div>
                    </NavLink>
                </nav>
            </div>
            <!-- User Profile at Bottom -->
            <div
                class="w-full p-4 bg-gradient-to-r from-purple-900/50 to-indigo-900/50"
            >
                <div
                    class="flex items-center p-3 space-x-3 transition-colors rounded-lg cursor-pointer hover:bg-white/10"
                >
                    <div
                        class="flex items-center justify-center w-10 h-10 bg-purple-400 rounded-full"
                    >
                        <span class="text-lg font-bold text-white">
                            {{
                                $page.props.auth.user.name
                                    .charAt(0)
                                    .toUpperCase()
                            }}
                        </span>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm font-medium text-white truncate">
                            {{ $page.props.auth.user.name }}
                        </p>
                        <p class="text-xs text-indigo-200 truncate">
                            {{ $page.props.auth.user.email }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 p-8 bg-gray-50">
            <slot></slot>
        </div>
    </div>
</template>
