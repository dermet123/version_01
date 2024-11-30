<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";

import InputLabel from "@/Components/InputLabel.vue";

const props = defineProps(["estandar"]);
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Estandar
            </h2>
        </template>

        <div class="py-5">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg"
                >
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div class="w-full bg-blue-100 mt-4 pt-2 pl-2 pb-2">
                                <InputLabel
                                    for="dimension"
                                    :value="'Nombe de la Dimension: '"
                                />
                                <span class="text-gray-400">{{
                                    estandar.dimension
                                }}</span>
                            </div>
                            <!-- 'Nombre de la Dimension: ' + estandar.dimension -->
                            <div class="mt-4 w-full bg-blue-100 pt-2 pl-2 pb-2">
                                <InputLabel
                                    for="factor"
                                    :value="'Nombre del Factor: '"
                                />
                                <span class="text-gray-400">{{
                                    estandar.factor
                                }}</span>
                            </div>
                            <div class="mt-4 w-full bg-blue-100 pt-2 pl-2 pb-2">
                                <InputLabel
                                    for="estandar"
                                    :value="'Nombre del Estandar: '"
                                />
                                <span class="text-gray-400">{{
                                    estandar.estandar
                                }}</span>
                            </div>
                            <!-- Escala de Avance -->
                            <div class="mt-4 w-full bg-blue-100 pt-2 pl-2 pb-2">
                                <InputLabel
                                    for="escala_avance"
                                    :value="'Escala de Avance: '"
                                />
                                <span
                                    class="text-black-400 bg-green-300 p-1 rounded decoration-solid"
                                    >{{ estandar.escala_avance }}</span
                                >
                            </div>

                            <!-- Contexto -->
                            <div class="mt-4 w-full bg-blue-100 pt-2 pl-2 pb-2">
                                <InputLabel
                                    for="contextualizacion"
                                    :value="'Contextualizacion del Estandar: '"
                                />
                                <span class="text-gray-400">{{
                                    estandar.contextualizacion
                                }}</span>
                            </div>
                            <div class="mt-4 w-full bg-blue-100 pt-2 pl-2 pb-2">
                                <InputLabel
                                    for="identificacion_brechas"
                                    :value="'Nombre de la Brecha: '"
                                />
                                <span class="text-gray-400">{{
                                    estandar.identificacion_brechas
                                }}</span>
                            </div>

                            <div class="mt-4 w-full bg-blue-100 pt-2 pl-2 pb-2">
                                <InputLabel
                                    for="actividades"
                                    :value="'Actividades: '"
                                />
                                <span
                                    class="text-gray-400 bg-orange-200 p-1 rounded"
                                    >{{ estandar.actividades }}</span
                                >
                            </div>

                            <div class="mt-4 w-full bg-blue-100 pt-2 pl-2 pb-2">
                                <InputLabel
                                    for="otros_estandares"
                                    :value="'Vinculacion de otros Estandares: '"
                                />
                                <span class="text-gray-400">{{
                                    estandar.otros_estandares
                                }}</span>
                            </div>
                            <div class="mt-4 w-full bg-blue-100 pt-2 pl-2 pb-2">
                                <InputLabel for="avance" :value="'Avances: '" />
                                <span
                                    class="text-gray-400 bg-orange-200 p-1 rounded"
                                    >{{ estandar.avance }}</span
                                >
                            </div>

                            <!-- <div class="mt-4 w-full bg-blue-100 pt-2 pl-2 pb-2">
                                <InputLabel
                                    for="logrado_estandar"
                                    :value="'Escala del logro del Estándar: '"
                                />
                                <span
                                    class="text-black-400 bg-green-300 p-1 rounded decoration-solid"
                                    >Ha logrado el Estandar</span
                                >
                            </div> -->

                            <div class="mt-4 w-full bg-blue-100 pt-2 pl-2 pb-2">
                                <InputLabel
                                    for="sustentacion"
                                    :value="'Criterios de la Sustentacion: '"
                                />
                                <span
                                    class="text-black-400 bg-green-300 p-1 rounded decoration-solid"
                                    >{{ estandar.sustentacion }}</span
                                >
                            </div>
                            <div class="mt-4 w-full bg-blue-100 pt-2 pl-2 pb-2">
                                <InputLabel
                                    for="comentario"
                                    :value="'Comentario: '"
                                />
                                <span class="text-gray-400">{{
                                    estandar.comentario
                                }}</span>
                            </div>
                            <div class="mt-4 w-full bg-blue-100 pt-2 pl-2 pb-2">
                                <InputLabel
                                    for="recomendacion"
                                    :value="'Recomendaciones: '"
                                />
                                <span class="text-gray-400">{{
                                    estandar.recomendacion
                                }}</span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
