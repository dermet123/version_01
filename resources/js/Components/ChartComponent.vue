<template>
    <Bar id="my-chart-id" :options="chartOptions" :data="chartData" />
</template>

<script>
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

ChartJS.register(
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale
);

export default {
    name: "BarChart",
    components: { Bar },
    data() {
        return {
            chartData: {
                labels: ["January", "February", "March"],
                datasets: [{ data: [40, 20, 12] }],
            },
            chartOptions: {
                responsive: true,
            },
        };
    },
};
</script>

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

ChartJS.register(
    Title,
    Tooltip,
    Legend,
    BarElement,
    CategoryScale,
    LinearScale
);

const chartData = ref({
    labels: ["January", "February", "March", "April", "May", "June"],
    datasets: [
        {
            label: "Sales",
            backgroundColor: "#42A5F5",
            data: [40, 20, 12, 39, 10, 40],
        },
    ],
});

const chartOptions = ref({
    responsive: true,
    maintainAspectRatio: false,
});

const BarChart = Bar;
</script>

<style scoped>
div {
    height: 400px;
}
</style>
