<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

import InputLabel from "@/Components/InputLabel.vue";

const props = defineProps(["criterio"]);
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Criterio
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg"
                >
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div class="mt-4">
                                <InputLabel
                                    for="nombre"
                                    :value="
                                        'Nombre del Criterio: ' +
                                        criterio.nombre
                                    "
                                />
                            </div>
                            <div class="mt-4">
                                <InputLabel
                                    for="detalle"
                                    :value="
                                        'Detalle del Criterio: ' +
                                        criterio.detalle
                                    "
                                />
                            </div>
                            <div class="mt-4">
                                <InputLabel
                                    for="descripcion"
                                    :value="
                                        'Descrpcion del Criterio: ' +
                                        criterio.descripcion
                                    "
                                />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
