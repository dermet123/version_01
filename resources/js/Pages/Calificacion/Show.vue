<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import InputLabel from "@/Components/InputLabel.vue";
import { ref, onMounted } from "vue";
import {
    Chart,
    BarController,
    BarElement,
    CategoryScale,
    LinearScale,
    Title,
    Tooltip,
    Legend,
} from "chart.js";

Chart.register(
    BarController,
    BarElement,
    CategoryScale,
    LinearScale,
    Title,
    Tooltip,
    Legend
);

const props = defineProps(["calificacion"]);

const barChartData = ref(null);

onMounted(() => {
    const ctx = document.getElementById("barChart").getContext("2d");
    barChartData.value = new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Escala de Avance", "Logro de Estandar"],
            datasets: [
                {
                    label: "Puntuación",
                    data: [
                        props.calificacion.escala_avance,
                        props.calificacion.estandar_logro,
                    ],
                    backgroundColor: ["#4F46E5", "#10B981"],
                },
            ],
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                    position: "top",
                },
                title: {
                    display: true,
                    text: "Calificación en Escala de Avance y Logro de Estandar",
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    max: 10,
                },
            },
        },
    });
});
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Calificación
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg"
                >
                    <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                        <!-- Información textual -->
                        <form @submit.prevent="submit">
                            <div class="mt-4">
                                <InputLabel
                                    for="nombre"
                                    :value="
                                        'Nombre de la Calificación: ' +
                                        calificacion.nombre
                                    "
                                />
                            </div>
                            <div class="mt-4">
                                <InputLabel
                                    for="detalle"
                                    :value="
                                        'Detalle del Criterio: ' +
                                        calificacion.descripcion
                                    "
                                />
                            </div>
                            <div class="mt-4">
                                <InputLabel
                                    for="escala_avance"
                                    :value="
                                        'Escala Avance: ' +
                                        calificacion.escala_avance
                                    "
                                />
                            </div>
                            <div class="mt-4">
                                <InputLabel
                                    for="estandar_logro"
                                    :value="
                                        'Logro de Estandar: ' +
                                        calificacion.estandar_logro
                                    "
                                />
                            </div>
                        </form>

                        <!-- Gráfico de Barras -->
                        <div class="mt-8">
                            <h3
                                class="text-lg font-semibold text-gray-800 dark:text-gray-200"
                            >
                                Gráfico de Calificación
                            </h3>
                            <canvas
                                id="barChart"
                                width="400"
                                height="200"
                            ></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
