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

    _method: "PUT",
});

// const submit = () => {
//     form.put(route("user.update", { user: props.user.id }));
// };

const submit = () => {
    form.post(route("dinamico.update", { dinamico: props.dinamico.id }));
};
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Estandar Dinamico
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
                                    autocomplete="estandar"
                                    placeholder="Estandar"
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
