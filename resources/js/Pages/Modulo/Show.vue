<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

import InputLabel from "@/Components/InputLabel.vue";

const props = defineProps(["modulo"]);
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Modulo
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
                                        'Nombre del Modulo: ' + modulo.nombre
                                    "
                                />
                            </div>
                            <!-- <div class="mt-4">
                                <InputLabel
                                    for="nombre"
                                    :value="'Campo: ' + modulo.id_campo"
                                />
                            </div>
                            <div class="mt-4">
                                <InputLabel
                                    for="nombre"
                                    :value="'Modelo: ' + modulo.id_modelo"
                                />
                            </div>
                            <div class="mt-4">
                                <InputLabel
                                    for="nombre"
                                    :value="
                                        'Estandar Dinamico: ' +
                                        modulo.id_dinamico
                                    "
                                />
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
