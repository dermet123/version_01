<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

import InputLabel from "@/Components/InputLabel.vue";

const props = defineProps(["auditorium"]);
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Auditoria
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
                                        'Nombre de la Auditoria: ' +
                                        auditorium.nombre
                                    "
                                />
                            </div>
                            <div class="mt-4">
                                <InputLabel
                                    for="observacion"
                                    :value="
                                        'Observacion de la Auditoria: ' +
                                        auditorium.observacion
                                    "
                                />
                            </div>
                            <div class="mt-4">
                                <InputLabel
                                    for="cantidad_estandar"
                                    :value="
                                        'Descrpcion de la Auditoria: ' +
                                        auditorium.descripcion
                                    "
                                />
                            </div>

                            <div class="mt-4">
                                <InputLabel
                                    for="fecha_vigencia"
                                    :value="
                                        '% de la Auditoria: ' +
                                        auditorium.porcentaje_auditoria +
                                        '%'
                                    "
                                />
                                <div
                                    class="w-full bg-gray-200 rounded h-4 mt-2"
                                >
                                    <div
                                        class="bg-blue-500 h-4 rounded"
                                        :style="{
                                            width:
                                                auditorium.porcentaje_auditoria +
                                                '%',
                                        }"
                                    ></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
