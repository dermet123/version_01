<script setup>
import { ref, onMounted } from "vue";
import { useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps(["errors"]);

const form = useForm({
    dimension: "",
    factor: "",
    estandar: "",
});

const factorRef = ref(null);
const estandarRef = ref(null);

const applyFormat = (command, value = null) => {
    document.execCommand(command, false, value);
};

const updateFormField = (event, field) => {
    form[field] = event.target.innerHTML;
};

const submit = () => {
    form.factor = factorRef.value.innerHTML;
    form.estandar = estandarRef.value.innerHTML;
    form.post(route("estandar.store"));
};

const cleanForm = () => {
    form.dimension = "";
    form.factor = "";
    form.estandar = "";
    if (factorRef.value) factorRef.value.innerHTML = "";
    if (estandarRef.value) estandarRef.value.innerHTML = "";
};

onMounted(() => {
    // Establecer el contenido inicial si existe
    if (form.factor) factorRef.value.innerHTML = form.factor;
    if (form.estandar) estandarRef.value.innerHTML = form.estandar;
});
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Estandar
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
                                <InputLabel for="dimension" value="Dimension" />
                                <InputError :message="errors.dimension" />
                                <TextInput
                                    id="dimension"
                                    v-model="form.dimension"
                                    type="text"
                                    class="mt-1 block w-full"
                                    required
                                    autocomplete="dimension"
                                    placeholder="GESTION"
                                />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="factor" value="Factor" />
                                <InputError :message="errors.factor" />
                                <div
                                    class="border border-gray-300 rounded-md p-2"
                                >
                                    <div class="flex flex-wrap space-x-2 mb-2">
                                        <button
                                            type="button"
                                            @click="() => applyFormat('bold')"
                                            class="px-2 py-1 bg-gray-200 rounded"
                                        >
                                            B
                                        </button>
                                        <button
                                            type="button"
                                            @click="() => applyFormat('italic')"
                                            class="px-2 py-1 bg-gray-200 rounded"
                                        >
                                            I
                                        </button>
                                        <button
                                            type="button"
                                            @click="
                                                () => applyFormat('underline')
                                            "
                                            class="px-2 py-1 bg-gray-200 rounded"
                                        >
                                            U
                                        </button>
                                        <button
                                            type="button"
                                            @click="
                                                () =>
                                                    applyFormat(
                                                        'insertUnorderedList'
                                                    )
                                            "
                                            class="px-2 py-1 bg-gray-200 rounded"
                                        >
                                            •
                                        </button>
                                        <button
                                            type="button"
                                            @click="
                                                () =>
                                                    applyFormat(
                                                        'insertOrderedList'
                                                    )
                                            "
                                            class="px-2 py-1 bg-gray-200 rounded"
                                        >
                                            1.
                                        </button>
                                        <select
                                            @change="
                                                (e) =>
                                                    applyFormat(
                                                        'fontSize',
                                                        e.target.value
                                                    )
                                            "
                                            class="px-2 py-1 bg-gray-200 rounded"
                                        >
                                            <option value="3">Normal</option>
                                            <option value="5">Grande</option>
                                            <option value="7">
                                                Muy grande
                                            </option>
                                        </select>
                                    </div>
                                    <div
                                        ref="factorRef"
                                        contenteditable="true"
                                        class="editor-content"
                                        @input="
                                            (event) =>
                                                updateFormField(event, 'factor')
                                        "
                                    ></div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <InputLabel for="estandar" value="Estandar" />
                                <InputError :message="errors.estandar" />
                                <div
                                    class="border border-gray-300 rounded-md p-2"
                                >
                                    <div class="flex flex-wrap space-x-2 mb-2">
                                        <button
                                            type="button"
                                            @click="() => applyFormat('bold')"
                                            class="px-2 py-1 bg-gray-200 rounded"
                                        >
                                            B
                                        </button>
                                        <button
                                            type="button"
                                            @click="() => applyFormat('italic')"
                                            class="px-2 py-1 bg-gray-200 rounded"
                                        >
                                            I
                                        </button>
                                        <button
                                            type="button"
                                            @click="
                                                () => applyFormat('underline')
                                            "
                                            class="px-2 py-1 bg-gray-200 rounded"
                                        >
                                            U
                                        </button>
                                        <button
                                            type="button"
                                            @click="
                                                () =>
                                                    applyFormat(
                                                        'insertUnorderedList'
                                                    )
                                            "
                                            class="px-2 py-1 bg-gray-200 rounded"
                                        >
                                            •
                                        </button>
                                        <button
                                            type="button"
                                            @click="
                                                () =>
                                                    applyFormat(
                                                        'insertOrderedList'
                                                    )
                                            "
                                            class="px-2 py-1 bg-gray-200 rounded"
                                        >
                                            1.
                                        </button>
                                        <select
                                            @change="
                                                (e) =>
                                                    applyFormat(
                                                        'fontSize',
                                                        e.target.value
                                                    )
                                            "
                                            class="px-2 py-1 bg-gray-200 rounded"
                                        >
                                            <option value="3">Normal</option>
                                            <option value="5">Grande</option>
                                            <option value="7">
                                                Muy grande
                                            </option>
                                        </select>
                                    </div>
                                    <div
                                        ref="estandarRef"
                                        contenteditable="true"
                                        class="editor-content"
                                        @input="
                                            (event) =>
                                                updateFormField(
                                                    event,
                                                    'estandar'
                                                )
                                        "
                                    ></div>
                                </div>
                            </div>

                            <PrimaryButton class="mt-4">Enviar</PrimaryButton>
                            <button
                                type="button"
                                @click="cleanForm"
                                class="mt-4 float-right cursor-pointer"
                            >
                                Limpiar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>
.editor-content {
    min-height: 100px;
    padding: 0.5rem;
    border: 1px solid #e2e8f0;
    border-radius: 0.375rem;
    text-align: left;
    direction: ltr;
}
.editor-content:focus {
    outline: none;
    border-color: #4f46e5;
    box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.1);
}
</style>

<!-- <script setup>
import { useForm } from "@inertiajs/vue3"; // Asegúrate de importar useForm
import AppLayout from "@/Layouts/AppLayout.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

const props = defineProps(["errors"]);

// Usar useForm para manejar el formulario
const form = useForm({
    dimension: null,
    factor: null,
    estandar: null,
});

const submit = () => {
    form.post(route("estandar.store"));
};

const cleanForm = () => {
    form.dimension = "";
    form.factor = "";
    form.estandar = "";
};
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Estandar
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
                                <InputLabel for="dimension" value="Dimension" />
                                <input-error :message="errors.dimension" />
                                <TextInput
                                    id="dimension"
                                    v-model="form.dimension"
                                    type="text"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="dimension"
                                    placeholder="GESTION"
                                />
                            </div>

                            <!-- <small>{{form.errors.name}}</small> -->
<!-- <div class="mt-4">
                                <InputLabel for="factor" value="Factor" />
                                <input-error :message="errors.factor" />
                                <TextInput
                                    id="factor"
                                    v-model="form.factor"
                                    type="text"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autofocus
                                    autocomplete="factor"
                                    placeholder="Planificación"
                                />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="estandar" value="Estandar" />
                                <input-error :message="errors.estandar" />
                                <TextInput
                                    id="estandar"
                                    v-model="form.estandar"
                                    type="text"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="estandar"
                                    placeholder="Propositos"
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
</template> -->
