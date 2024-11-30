<script setup>
import { ref } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link, router } from "@inertiajs/vue3";
import DialogModal from "@/Components/DialogModal.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Paginator from "@/Components/Paginator.vue";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    calificaciones: {
        type: String,
        required: true,
    },
    nombre: {
        type: String,
        required: true,
    },
});

// Crear una variable reactiva para controlar la visibilidad del modal

const modalOpen = ref(false);
const selectedCalificacion = ref(null);

const form = ref({
    nombre: props.nombre,
});

const submit = () => {
    router.get(route("calificacion.index", form.value));
};

const deleteCalificacion = () => {
    // if (!confirm("¿Seguro que quieres elimnar el usuario: " + data.email + "?"))
    //     return;

    router.delete(
        route("calificacion.destroy", {
            calificacion: selectedCalificacion.value.id,
        })
    );
    modalOpen.value = false;
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
                        <Link
                            :href="route('calificacion.create')"
                            class="btn btn-success inline-block"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="size-6 float-left"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 4.5v15m7.5-7.5h-15"
                                />
                            </svg>

                            Crear Calificacion</Link
                        >
                        <form
                            method="get"
                            class="flex mt-2"
                            @submit.prevent="submit"
                        >
                            <NavLink
                                preserve-scroll
                                href="#"
                                class="btn btn-primary mr-2"
                                @click="form.nombre = ''"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke-width="1.5"
                                    stroke="currentColor"
                                    class="size-6"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 0 1-.659 1.591l-5.432 5.432a2.25 2.25 0 0 0-.659 1.591v2.927a2.25 2.25 0 0 1-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 0 0-.659-1.591L3.659 7.409A2.25 2.25 0 0 1 3 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0 1 12 3Z"
                                    />
                                </svg>
                            </NavLink>
                            <TextInput
                                v-model="form.nombre"
                                class="w-full"
                                placeholder="Buscar por nombre de email..."
                                type="text"
                            ></TextInput>
                            <button type="submit" class="ml-2 btn btn-primary">
                                Buscar
                            </button>
                        </form>

                        <table class="table-auto w-full">
                            <thead>
                                <tr>
                                    <th class="p-3">Id</th>
                                    <th class="p-3">Nombre</th>
                                    <th class="p-3">Descripcion</th>
                                    <th class="p-3">Escala de Avance</th>
                                    <th class="p-3">Estandar de Logro</th>
                                    <th class="p-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="ca in calificaciones.data"
                                    :key="ca.id"
                                >
                                    <td class="p-3 border">{{ ca.id }}</td>
                                    <td class="p-3 whitespace-normal">
                                        {{ ca.nombre }}
                                    </td>
                                    <td class="p-3 whitespace-normal">
                                        {{ ca.descripcion }}
                                    </td>
                                    <td class="p-3 whitespace-normal">
                                        {{ ca.escala_avance }}
                                    </td>
                                    <td class="p-3 whitespace-normal">
                                        {{ ca.estandar_logro }}
                                    </td>
                                    <td
                                        class="p-3 border flex justify-start items-center space-x-2"
                                    >
                                        <Link
                                            class="btn btn-primary mr-2 inline-block"
                                            :href="
                                                route('calificacion.show', {
                                                    calificacion: ca,
                                                })
                                            "
                                            ><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="size-6"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"
                                                />
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"
                                                />
                                            </svg>
                                        </Link>
                                        <Link
                                            class="btn btn-primary m-2 inline-block"
                                            :href="
                                                route('calificacion.edit', {
                                                    calificacion: ca,
                                                })
                                            "
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="size-6"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125"
                                                />
                                            </svg>
                                        </Link>
                                        <!-- <Link
                                            method="DELETE"
                                            :href="
                                                route('user.destroy', {
                                                    user: u,
                                                })
                                            "
                                            >Borrar</Link
                                        > -->
                                        <button
                                            class="btn btn-danger align-top"
                                            @click="
                                                modalOpen = true;
                                                selectedCalificacion = ca;
                                            "
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="size-6"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"
                                                />
                                            </svg>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <paginator class="mt-3" :paginator="calificaciones" />
                    </div>
                </div>
            </div>
        </div>
        <dialog-modal :show="modalOpen">
            <template #title>
                <h1>Eliminar Calificacion</h1>
            </template>
            <template v-slot:content>
                <p v-if="selectedCalificacion">
                    ¿Seguro que quieres eliminar la Calificacion:
                    <strong>{{ selectedCalificacion.nombre }}?</strong>
                </p>
            </template>
            <template #footer>
                <PrimaryButton
                    class="mr-20 bg-red-500 hover:bg-red-800"
                    @click="deleteCalificacion()"
                    >Eliminar</PrimaryButton
                >
                <PrimaryButton @click="modalOpen = false">Cerrar</PrimaryButton>
            </template>
        </dialog-modal>
    </AppLayout>
</template>
