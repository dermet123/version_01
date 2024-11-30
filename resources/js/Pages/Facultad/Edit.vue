<script setup>
import { useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import { defineProps } from "vue";

const props = defineProps(["errors", "facultad", "escuelas"]);

// Usar useForm para manejar el formulario
const form = useForm({
    id: props.facultad.id, // Guardar el ID de la facultad
    nombre: props.facultad.nombre,
    escuelas: props.facultad.escuelas.map((escuela) => escuela.id), // Obtener IDs de las escuelas asociadas
});

const submit = () => {
    form.put(route("facultad.update", form.id)); // Usar PUT para actualizar
};

const cleanForm = () => {
    form.nombre = "";
    form.escuelas = [];
};
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Editar Facultad
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
                                    value="Nombre de la Facultad"
                                />
                                <InputError :message="errors.nombre" />
                                <TextInput
                                    id="nombre"
                                    v-model="form.nombre"
                                    type="text"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="facultad"
                                    placeholder="Facultad"
                                />
                            </div>

                            <div class="mt-4">
                                <InputLabel
                                    for="escuelas"
                                    value="Seleccione Las Escuelas"
                                />
                                <InputError :message="errors.escuelas" />

                                <div class="space-y-2">
                                    <div
                                        v-for="escuela in escuelas"
                                        :key="escuela.id"
                                    >
                                        <input
                                            type="checkbox"
                                            :id="'escuela-' + escuela.id"
                                            :value="escuela.id"
                                            v-model="form.escuelas"
                                        />
                                        <label :for="'escuela-' + escuela.id">{{
                                            escuela.nombre
                                        }}</label>
                                    </div>
                                </div>
                                <div class="mt-2 text-sm text-gray-600">
                                    Nota: Seleccione las escuelas que desea
                                    asociar con esta facultad.
                                </div>
                            </div>

                            <PrimaryButton class="mt-4"
                                >Actualizar</PrimaryButton
                            >
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
