<script setup>
import { useForm } from "@inertiajs/vue3"; // Asegúrate de importar useForm
import AppLayout from "@/Layouts/AppLayout.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps(["auditorium", "errors"]);

// Usar useForm para manejar el formulario
const form = useForm({
    nombre: props.auditorium.nombre,
    observacion: props.auditorium.observacion,
    descripcion: props.auditorium.descripcion,
    porcentaje_auditoria: props.auditorium.porcentaje_auditoria,
    _method: "PUT",
});

// const submit = () => {
//     form.put(route("user.update", { user: props.user.id }));
// };

const submit = () => {
    form.post(route("auditoria.update", { auditorium: props.auditorium.id }));
};
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
                                    value="Nombre de la Auditoria: "
                                />
                                <input-error :message="errors.nombre" />
                                <TextInput
                                    id="nombre"
                                    v-model="form.nombre"
                                    type="text"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="modelo"
                                    placeholder="Example"
                                />
                            </div>
                            <div class="mt-4">
                                <InputLabel
                                    for="observacion"
                                    value="observacion de la Auditoria"
                                />
                                <input-error :message="errors.observacion" />
                                <textarea
                                    id="observacion"
                                    v-model="form.observacion"
                                    type="text"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="off"
                                    placeholder="off"
                                ></textarea>
                            </div>
                            <div class="mt-4">
                                <InputLabel
                                    for="descripcion"
                                    value="Descripcion de la Auditoria"
                                />
                                <input-error :message="errors.descripcion" />
                                <textarea
                                    id="descripcion"
                                    v-model="form.descripcion"
                                    type="text"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="off"
                                    placeholder="off"
                                ></textarea>
                            </div>
                            <div class="mt-4">
                                <InputLabel
                                    for="porcentaje_auditoria"
                                    value="Porcentaje de la Auditoria"
                                />
                                <input-error
                                    :message="errors.porcentaje_auditoria"
                                />

                                <!-- Campo de entrada para porcentaje -->
                                <TextInput
                                    id="porcentaje_auditoria"
                                    v-model="form.porcentaje_auditoria"
                                    type="number"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="off"
                                    placeholder="0"
                                />

                                <!-- Barra de progreso que cambia de color según el porcentaje -->
                                <div
                                    class="w-full bg-gray-200 rounded h-4 mt-2"
                                >
                                    <div
                                        class="h-4 rounded"
                                        :class="{
                                            'bg-red-500':
                                                form.porcentaje_auditoria <= 25,
                                            'bg-yellow-500':
                                                form.porcentaje_auditoria >
                                                    25 &&
                                                form.porcentaje_auditoria <= 50,
                                            'bg-blue-500':
                                                form.porcentaje_auditoria >
                                                    50 &&
                                                form.porcentaje_auditoria <= 75,
                                            'bg-green-500':
                                                form.porcentaje_auditoria > 75,
                                        }"
                                        :style="{
                                            width:
                                                form.porcentaje_auditoria + '%',
                                        }"
                                    ></div>
                                </div>
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
