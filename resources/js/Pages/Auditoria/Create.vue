<script setup>
import { useForm } from "@inertiajs/vue3"; // Asegúrate de importar useForm
import AppLayout from "@/Layouts/AppLayout.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps(["errors", "auditoria"]); // Recibir la lista de escuelas

// Usar useForm para manejar el formulario
const form = useForm({
    nombre: null,
    observacion: null,
    descripcion: null,
    porcentaje_auditoria: null,
});

const submit = () => {
    form.post(route("auditoria.store"));
};

const cleanForm = () => {
    form.nombre = "";
    form.observacion = "";
    form.descripcion = "";
    form.porcentaje_auditoria = "";
};
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Crear Auditoria
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
                                    value="Nombre de la Auditoria"
                                />
                                <InputError :message="errors.nombre" />
                                <TextInput
                                    id="nombre"
                                    v-model="form.nombre"
                                    type="text"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="auditoria"
                                    placeholder="Auditoria al internet"
                                />
                            </div>

                            <div class="mt-4">
                                <InputLabel
                                    for="observacion"
                                    value="Observacion de la Auditoria"
                                />
                                <InputError :message="errors.observacion" />

                                <textarea
                                    id="observacion"
                                    v-model="form.observacion"
                                    type="text"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="off"
                                    placeholder="Se necesita Datos"
                                >
                                </textarea>
                            </div>
                            <div class="mt-4">
                                <InputLabel
                                    for="descripcion"
                                    value="Descripcion de la Auditoria"
                                />
                                <InputError :message="errors.descripcion" />

                                <textarea
                                    id="descripcion"
                                    v-model="form.descripcion"
                                    type="text"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="off"
                                    placeholder="Esta Auditoria"
                                >
                                </textarea>
                            </div>
                            <div class="mt-4">
                                <InputLabel
                                    for="porcentaje_auditoria"
                                    value="% de validacion de Auditoria"
                                />
                                <InputError
                                    :message="errors.porcentaje_auditoria"
                                />

                                <TextInput
                                    id="porcentaje_auditoria"
                                    v-model="form.porcentaje_auditoria"
                                    type="number"
                                    min="0"
                                    max="100"
                                    step="1"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="off"
                                    placeholder="( 0 - 100 ) %"
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
