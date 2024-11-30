<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";

const props = defineProps(["facultad"]); // Recibiendo la facultad como prop
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Facultad: {{ facultad.nombre }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg"
                >
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <div class="mt-4">
                            <InputLabel
                                for="nombre"
                                value="Nombre de la Facultad:"
                            />
                            <p class="text-gray-800 dark:text-gray-300">
                                {{ facultad.nombre }}
                            </p>
                        </div>

                        <div class="mt-4">
                            <InputLabel
                                for="escuelas"
                                value="Escuelas Asociadas:"
                            />
                            <ul class="list-disc ml-5 mt-1">
                                <li v-if="facultad.escuelas.length">
                                    <template
                                        v-for="escuela in facultad.escuelas"
                                        :key="escuela.id"
                                    >
                                        {{ escuela.nombre
                                        }}<span v-if="!$last">, </span>
                                    </template>
                                </li>
                                <li v-else>No hay escuelas asignadas</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
