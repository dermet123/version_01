<script setup>
import { ref } from "vue";
import AppLayout from "@/Layouts/AppLayout.vue";
// import AdminPanel from "@/Layouts/AdminPanel.vue";
import { Link, router } from "@inertiajs/vue3";
import DialogModal from "@/Components/DialogModal.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Paginator from "@/Components/Paginator.vue";
import TextInput from "@/Components/TextInput.vue";

const props = defineProps({
    users: {
        type: Array,
        required: true,
    },
    name: {
        type: String,
        required: true,
    },
});

// Crear una variable reactiva para controlar la visibilidad del modal

const modalOpen = ref(false);
const selectedUser = ref(null);

const form = ref({
    name: props.name,
});

const submit = () => {
    router.get(route("user.index", form.value));
};

const deleteUser = () => {
    // if (!confirm("¿Seguro que quieres elimnar el usuario: " + data.email + "?"))
    //     return;

    router.delete(route("user.destroy", { user: selectedUser.value.id }));
    modalOpen.value = false;
};

// Función para abrir el modal
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200"
            >
                User
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div
                    class="overflow-hidden bg-white shadow-xl dark:bg-gray-800 sm:rounded-lg"
                >
                    <div class="p-6 bg-white border-b border-gray-200 sm:px-20">
                        <Link
                            :href="route('user.create')"
                            class="inline-block btn btn-success"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="float-left size-6"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M12 4.5v15m7.5-7.5h-15"
                                />
                            </svg>

                            Crear Usuario</Link
                        >

                        <!-- <form
                            method="get"
                            class="flex mt-2"
                            :action="route('user.index')"
                        > -->
                        <form
                            method="get"
                            class="flex mt-2"
                            @submit.prevent="submit"
                        >
                            <NavLink
                                preserve-scroll
                                href="#"
                                class="mr-2 btn btn-primary"
                                @click="form.name = ''"
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
                                v-model="form.name"
                                class="w-full"
                                placeholder="Buscar por nombre de email..."
                                type="text"
                            ></TextInput>
                            <button type="submit" class="ml-2 btn btn-primary">
                                Buscar
                            </button>
                        </form>

                        <table class="w-full table-auto">
                            <thead>
                                <tr>
                                    <th class="p-3">Id</th>
                                    <th class="p-3">Nombre</th>
                                    <th class="p-3">Email</th>
                                    <th class="p-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="u in users.data" :key="u.id">
                                    <td class="p-3 border">{{ u.id }}</td>
                                    <td class="p-3 border">{{ u.name }}</td>
                                    <td class="p-3 border">{{ u.email }}</td>
                                    <td
                                        class="flex items-center justify-start p-3 space-x-2 border"
                                    >
                                        <Link
                                            class="inline-flex items-center btn btn-primary"
                                            :href="
                                                route('user.show', { user: u })
                                            "
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="w-6 h-6 mr-1"
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
                                            class="inline-flex items-center btn btn-primary"
                                            :href="
                                                route('user.edit', { user: u })
                                            "
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="w-6 h-6 mr-1"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.13-1.897L16.863 4.487Zm0 0L19.5 7.125"
                                                />
                                            </svg>
                                        </Link>

                                        <button
                                            class="inline-flex items-center btn btn-danger"
                                            @click="
                                                modalOpen = true;
                                                selectedUser = u;
                                            "
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="w-6 h-6 mr-1"
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
                        <paginator class="mt-3" :paginator="users" />
                    </div>
                </div>
            </div>
        </div>
        <dialog-modal :show="modalOpen">
            <template #title>
                <h1>Eliminar Usuario</h1>
            </template>
            <template v-slot:content>
                <p v-if="selectedUser">
                    ¿Seguro que quieres elimnar el usuario:
                    <strong>{{ selectedUser.email }}?</strong>
                </p>
            </template>
            <template #footer>
                <PrimaryButton
                    class="mr-20 bg-red-500 hover:bg-red-800"
                    @click="deleteUser()"
                    >Eliminar</PrimaryButton
                >
                <PrimaryButton @click="modalOpen = false">Cerrar</PrimaryButton>
            </template>
        </dialog-modal>
    </AppLayout>
</template>
