<script setup>
import { useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import InputError from "@/Components/InputError.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
const props = defineProps(["estandar", "errors"]);

const form = useForm({
    dimension: props.estandar.dimension,
    factor: props.estandar.factor,
    estandar: props.estandar.estandar,
    escala_avance: props.estandar.escala_avance,
    contextualizacion: props.estandar.contextualizacion,
    identificacion_brechas: props.estandar.identificacion_brechas,
    actividades: props.estandar.actividades,
    otros_estandares: props.estandar.otros_estandares,
    avance: props.estandar.avance,
    sustentacion: props.estandar.sustentacion,
    comentario: props.estandar.comentario,
    recomendacion: props.estandar.recomendacion,
    _method: "PUT",
});

const submit = () => {
    form.post(route("estandar.update", { estandar: props.estandar.id }));
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
                                <InputLabel for="dimension" value="dimension" />
                                <input-error :message="errors.dimension" />
                                <TextInput
                                    id="dimension"
                                    v-model="form.dimension"
                                    type="text"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="dimension"
                                    placeholder="Dimension"
                                />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="factor" value="factor" />
                                <input-error :message="errors.factor" />
                                <TextInput
                                    id="factor"
                                    v-model="form.factor"
                                    type="text"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="factor"
                                    placeholder="Factor"
                                />
                            </div>

                            <div class="mt-4">
                                <InputLabel for="estandar" value="estandar" />
                                <input-error :message="errors.estandar" />
                                <TextInput
                                    id="estandar"
                                    v-model="form.estandar"
                                    type="text"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="estandar"
                                    placeholder="Estandar"
                                />
                            </div>

                            <div class="mt-4">
                                <InputLabel
                                    for="escala_avance"
                                    value="escala_avance"
                                />
                                <input-error :message="errors.escala_avance" />
                                <TextInput
                                    id="escala_avance"
                                    v-model="form.escala_avance"
                                    type="text"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="escala_avance"
                                    placeholder="Escala Avances"
                                />
                            </div>

                            <div class="mt-4">
                                <InputLabel
                                    for="contextualizacion"
                                    value="contextualizacion"
                                />
                                <input-error
                                    :message="errors.contextualizacion"
                                />
                                <textarea
                                    id="contextualizacion"
                                    v-model="form.contextualizacion"
                                    type="text"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="contextualizacion"
                                    placeholder="Contexto"
                                >
                                </textarea>
                            </div>

                            <div class="mt-4">
                                <InputLabel
                                    for="identificacion_brechas"
                                    value="identificacion_brechas"
                                />
                                <input-error
                                    :message="errors.identificacion_brechas"
                                />
                                <textarea
                                    id="identificacion_brechas"
                                    v-model="form.identificacion_brechas"
                                    type="text"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="identificacion_brechas"
                                    placeholder="identificacion Brechas"
                                >
                                </textarea>
                            </div>

                            <div class="mt-4">
                                <InputLabel
                                    for="actividades"
                                    value="Actividades:"
                                />
                                <input-error :message="errors.actividades" />
                                <input
                                    id="actividades"
                                    @input="
                                        form.actividades = Array.from(
                                            $event.target.files
                                        )
                                    "
                                    type="file"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    autocomplete="actividades"
                                    multiple
                                    accept=".pdf,.doc,.docx,.xls,.xlsx"
                                />
                            </div>

                            <div class="mt-4">
                                <InputLabel
                                    for="otros_estandares"
                                    value="Relacion con Estandares"
                                />
                                <input-error
                                    :message="errors.otros_estandares"
                                />
                                <textarea
                                    id="otros_estandares"
                                    v-model="form.otros_estandares"
                                    type="text"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="otros_estandares"
                                    placeholder="Relación Con estandares"
                                >
                                </textarea>
                            </div>

                            <div class="mt-4">
                                <InputLabel for="avance" value="Avances:" />
                                <input-error :message="errors.avance" />
                                <input
                                    id="avance"
                                    @input="
                                        form.avance = Array.from(
                                            $event.target.files
                                        )
                                    "
                                    type="file"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    autocomplete="avance"
                                    multiple
                                    accept=".pdf,.doc,.docx,.xls,.xlsx"
                                />
                            </div>

                            <div class="mt-4">
                                <InputLabel
                                    for="sustentacion"
                                    value="Sustentar Avance"
                                />
                                <input-error :message="errors.sustentacion" />
                                <textarea
                                    id="sustentacion"
                                    v-model="form.sustentacion"
                                    type="text"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="sustentacion"
                                    placeholder="Explique su Avance"
                                >
                                </textarea>
                            </div>

                            <div class="mt-4">
                                <InputLabel
                                    for="comentario"
                                    value="Comentario"
                                />
                                <input-error :message="errors.comentario" />
                                <textarea
                                    id="comentario"
                                    v-model="form.comentario"
                                    type="text"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="comentario"
                                    placeholder="Comentario acerca del Estandar"
                                >
                                </textarea>
                            </div>

                            <div class="mt-4">
                                <InputLabel
                                    for="recomendacion"
                                    value="recomendacion"
                                />
                                <input-error :message="errors.recomendacion" />
                                <textarea
                                    id="recomendacion"
                                    v-model="form.recomendacion"
                                    type="text"
                                    class="appearance-none rounded-none relative mt-1 block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    required
                                    autocomplete="recomendacion"
                                    placeholder="Recomendacion Del Estandar"
                                >
                                </textarea>
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
