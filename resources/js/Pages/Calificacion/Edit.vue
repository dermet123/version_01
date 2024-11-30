<script setup>
import { useForm } from "@inertiajs/vue3"; // Asegúrate de importar useForm
import AppLayout from "@/Layouts/AppLayout.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps(["calificacion", "errors"]);

// Usar useForm para manejar el formulario
const form = useForm({
    nombre: props.calificacion.nombre,
    descripcion: props.calificacion.descripcion,
    escala_avance: props.calificacion.escala_avance,
    estandar_logro: props.calificacion.estandar_logro,
    _method: "PUT",
});

// const submit = () => {
//     form.put(route("user.update", { user: props.user.id }));
// };

const submit = () => {
    form.post(
        route("calificacion.update", { calificacion: props.calificacion.id })
    );
};
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Calificacion
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
                                    value="Nombre del Criterio: "
                                />
                                <input-error :message="errors.nombre" />
                                <TextInput
                                    id="nombre"
                                    v-model="form.nombre"
                                    type="text"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="nombre"
                                    placeholder="Nombre"
                                />
                            </div>
                            <div class="mt-4">
                                <InputLabel
                                    for="descripcion"
                                    value="Descripcion de la Calificacion"
                                />
                                <input-error :message="errors.descripcion" />
                                <textarea
                                    id="descripcion"
                                    v-model="form.descripcion"
                                    type="text"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="descripcion"
                                    placeholder="descripcion"
                                ></textarea>
                            </div>
                            <div class="mt-4">
                                <InputLabel
                                    for="escala_avance"
                                    value="Escala de Avance"
                                />
                                <input-error :message="errors.escala_avance" />
                                <TextInput
                                    id="escala_avance"
                                    v-model="form.escala_avance"
                                    type="number"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="off"
                                    placeholder="off"
                                />
                            </div>
                            <div class="mt-4">
                                <InputLabel
                                    for="estandar_logro"
                                    value="Estandar Logro"
                                />
                                <input-error :message="errors.estandar_logro" />
                                <TextInput
                                    id="estandar_logro"
                                    v-model="form.estandar_logro"
                                    type="number"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="off"
                                    placeholder="off"
                                />
                            </div>
                            <!-- <small>{{form.errors.name}}</small> -->
                            <hr class="my-4" />
                            <PrimaryButton
                                type="submit"
                                :disabled="form.processing"
                                class="mt-5"
                            >
                                Enviar
                            </PrimaryButton>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
