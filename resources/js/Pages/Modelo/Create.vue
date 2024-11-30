<script setup>
import { useForm } from "@inertiajs/vue3"; // Asegúrate de importar useForm
import AppLayout from "@/Layouts/AppLayout.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps(["errors", "modelos"]); // Recibir la lista de escuelas

// Usar useForm para manejar el formulario
const form = useForm({
    nombre: null,
    fecha_cracion: null,
    cantidad_estandar: null,
    fecha_vigencia: null,
});

const submit = () => {
    form.post(route("modelo.store"));
};

const cleanForm = () => {
    form.nombre = "";
    form.fecha_cracion = "";
    form.cantidad_estandar = "";
    form.fecha_vigencia = "";
};
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Crear Modelo
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
                                    value="Nombre del Modelo"
                                />
                                <InputError :message="errors.nombre" />
                                <TextInput
                                    id="nombre"
                                    v-model="form.nombre"
                                    type="text"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="modelo"
                                    placeholder="Modelo"
                                />
                            </div>

                            <div class="mt-4">
                                <InputLabel
                                    for="fecha_cracion"
                                    value="Fecha de Creacion"
                                />
                                <InputError :message="errors.fecha_cracion" />

                                <TextInput
                                    id="nombre"
                                    v-model="form.fecha_cracion"
                                    type="date"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="fecha_cracion"
                                    placeholder="12-11-2002"
                                />
                            </div>
                            <div class="mt-4">
                                <InputLabel
                                    for="cantidad_estandar"
                                    value="Numero de Estandar"
                                />
                                <InputError
                                    :message="errors.cantidad_estandar"
                                />

                                <TextInput
                                    id="nombre"
                                    v-model="form.cantidad_estandar"
                                    type="number"
                                    min="0"
                                    step="1"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="0"
                                    placeholder="0"
                                />
                            </div>
                            <div class="mt-4">
                                <InputLabel
                                    for="fecha_vigencia"
                                    value="Fecha Habilitado"
                                />
                                <InputError :message="errors.fecha_vigencia" />

                                <TextInput
                                    id="nombre"
                                    v-model="form.fecha_vigencia"
                                    type="date"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="fecha_vigencia"
                                    placeholder="12-11-2022"
                                />
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
