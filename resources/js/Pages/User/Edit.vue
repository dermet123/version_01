<script setup>
import { useForm } from "@inertiajs/vue3"; // Asegúrate de importar useForm
import AppLayout from "@/Layouts/AppLayout.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps(["user", "errors"]);

// Usar useForm para manejar el formulario
const form = useForm({
    name: props.user.name,
    email: props.user.email,
    avatar: "",
    password: "",
    _method: "PUT",
});

// const submit = () => {
//     form.put(route("user.update", { user: props.user.id }));
// };

const deleteAvatar = () => {
    form.delete(route("user.deleteAvatar", { user: props.user }));
};

const submit = () => {
    form.post(route("user.update", { user: props.user.id }));
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
                                <InputLabel for="password" value="Password: " />
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

                            <div class="mt-4" v-if="!user.profile_photo_path">
                                <InputLabel for="avatar" value="Avatar: " />
                                <input-error :message="errors.avatar" />
                                <TextInput
                                    id="avatar"
                                    @input="
                                        form.avatar = $event.target.files[0]
                                    "
                                    type="file"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    autocomplete="current-password"
                                    placeholder="Password"
                                />
                            </div>

                            <PrimaryButton
                                type="submit"
                                :disabled="form.processing"
                                class="mt-5"
                            >
                                Enviar
                            </PrimaryButton>

                            <div v-if="user.profile_photo_url">
                                <hr class="my-4" />
                                <img
                                    class="h-20 w-20 rounded-full border object-cover m-auto block"
                                    :src="user.profile_photo_url"
                                    :alt="user.name"
                                />
                                <NavLink
                                    v-if="user.profile_photo_path"
                                    class="block text-center text-red-600 text-xs font-bold m-0 cursor-pointer"
                                    href="#"
                                    @click="deleteAvatar"
                                >
                                    Eliminar
                                </NavLink>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
