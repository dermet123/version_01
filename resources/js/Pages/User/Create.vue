<script setup>
import { useForm } from "@inertiajs/vue3"; // Asegúrate de importar useForm
import AppLayout from "@/Layouts/AppLayout.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps(["errors"]);

// Usar useForm para manejar el formulario
const form = useForm({
    name: null,
    email: null,
    password: null,
});

const submit = () => {
    form.post(route("user.store"), {
        onError: () => form.reset("password"),
    });
};

const cleanForm = () => {
    form.name = "";
    form.email = "";
    form.password = "";
};
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                User
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
                                <InputLabel for="name" value="name" />
                                <input-error :message="errors.name" />
                                <TextInput
                                    id="name"
                                    v-model="form.name"
                                    type="text"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="user"
                                    placeholder="Example"
                                />
                            </div>

                            <!-- <small>{{form.errors.name}}</small> -->
                            <div class="mt-4">
                                <InputLabel for="email" value="Email" />
                                <input-error :message="errors.email" />
                                <TextInput
                                    id="email"
                                    v-model="form.email"
                                    type="email"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autofocus
                                    autocomplete="username"
                                    placeholder="Email address"
                                />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="password" value="Password" />
                                <input-error :message="errors.password" />
                                <TextInput
                                    id="password"
                                    v-model="form.password"
                                    type="password"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="current-password"
                                    placeholder="Password"
                                />
                            </div>

                            <PrimaryButton class="mt-4"> Enviar </PrimaryButton>
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
