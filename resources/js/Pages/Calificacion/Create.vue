<script setup>
import { useForm } from "@inertiajs/vue3"; // Asegúrate de importar useForm
import AppLayout from "@/Layouts/AppLayout.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { ref } from "vue";

const form1 = ref({
    escala_avance: "", // Almacenará la opción seleccionada
});

const form2 = ref({
    estandar_logro: "", // Almacenará la opción seleccionada
});

const opcionEstandar = [
    { value: 1, label: "No Logrado" },
    { value: 2, label: "Logrado" },
    { value: 3, label: "Plenamente Logrado" },
];

const opcionesEscala = [
    { value: 1, label: "Contextualización" },
    { value: 2, label: "Desarrollo Inicial" },
    { value: 3, label: "Desarrollo Medio" },
    { value: 4, label: "Desarrollo Avanzado" },
    { value: 5, label: "Finalización Inicial" },
    { value: 6, label: "Finalización Media" },
    { value: 7, label: "Finalización Avanzada" },
    { value: 8, label: "Finalización Completa" },
];

const props = defineProps(["errors", "calificacion"]); // Recibir la lista de escuelas

// Usar useForm para manejar el formulario
const form = useForm({
    nombre: null,
    descripcion: null,
    escala_avance: null,
    estandar_logro: null,
});

const submit = () => {
    form.post(route("calificacion.store"));
};

const cleanForm = () => {
    form.nombre = "";
    form.descripcion = "";
    form.escala_avance = "";
    form.estandar_logro = "";
};
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Crear Calificacion
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
                                    value="Nombre de la Calificacion"
                                />
                                <InputError :message="errors.nombre" />
                                <TextInput
                                    id="nombre"
                                    v-model="form.nombre"
                                    type="text"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="estandar"
                                    placeholder="estandar 1"
                                />
                            </div>

                            <div class="mt-4">
                                <InputLabel
                                    for="descripcion"
                                    value="Descripcion de la Calificacion"
                                />
                                <InputError :message="errors.descripcion" />

                                <textarea
                                    id="descripcion"
                                    v-model="form.descripcion"
                                    type="text"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="descripcion"
                                    placeholder="Describe esto"
                                >
                                </textarea>
                            </div>

                            <!-- Escala de Avance -->
                            <div class="mt-4">
                                <InputLabel
                                    for="escala_avance"
                                    value="Escala de Avance"
                                />
                                <InputError :message="errors.escala_avance" />
                                <select
                                    id="escala_avance"
                                    v-model="form.escala_avance"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                >
                                    <option disabled value="">
                                        Seleccione una opción
                                    </option>
                                    <option
                                        v-for="option in opcionesEscala"
                                        :key="option.value"
                                        :value="option.value"
                                    >
                                        {{ option.label }}
                                    </option>
                                </select>
                            </div>

                            <!-- Logro del Estandar -->
                            <div class="mt-4">
                                <InputLabel
                                    for="estandar_logro"
                                    value="Logro del Estandar"
                                />
                                <InputError :message="errors.estandar_logro" />
                                <select
                                    id="estandar_logro"
                                    v-model="form.estandar_logro"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                >
                                    <option disabled value="">
                                        Seleccione una opción
                                    </option>
                                    <option
                                        v-for="option in opcionEstandar"
                                        :key="option.value"
                                        :value="option.value"
                                    >
                                        {{ option.label }}
                                    </option>
                                </select>
                            </div>

                            <PrimaryButton class="mt-4">Enviar</PrimaryButton>
                            <NavLink
                                class="mt-4 float-right cursor-pointer"
                                href="#"
                                @click="cleanForm"
                                preserve-scroll
                            >
                                Limpiar
                            </NavLink>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
