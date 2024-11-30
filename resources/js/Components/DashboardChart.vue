<template>
    <div>
        <Bar :chart-data="chartData" :options="chartOptions" />
    </div>
</template>

<script setup>
import { ref } from "vue";
import { Bar } from "vue-chartjs";
import {
    Chart as ChartJS,
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale,
} from "chart.js";

// Registrar los componentes necesarios
ChartJS.register(
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale
);

// Define tus datos del gráfico
const chartData = ref({
    labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo"],
    datasets: [
        {
            label: "Ventas",
            backgroundColor: "#42A5F5",
            data: [40, 20, 30, 50, 60],
        },
    ],
});

// Opciones del gráfico (opcional)
const chartOptions = ref({
    responsive: true,
});
</script>

<style scoped>
/* Estilos opcionales para el gráfico */
</style>
