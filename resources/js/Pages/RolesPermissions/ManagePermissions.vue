<template>
    <div>
        <h2 class="text-xl font-semibold">Gestionar Permisos</h2>

        <!-- Formulario para crear un nuevo permiso -->
        <form @submit.prevent="createPermission" class="mb-4">
            <input
                v-model="permissionName"
                placeholder="Nombre del permiso"
                class="border p-2 mr-2"
            />
            <button type="submit" class="bg-blue-500 text-white p-2">
                Crear Permiso
            </button>
        </form>

        <!-- Listado de permisos -->
        <ul>
            <li
                v-for="permission in permissions"
                :key="permission.id"
                class="flex justify-between items-center"
            >
                <span>{{ permission.name }}</span>
                <button
                    @click="deletePermission(permission.id)"
                    class="bg-red-500 text-white p-1 ml-2"
                >
                    Eliminar
                </button>
            </li>
        </ul>
    </div>
</template>

<script setup>
import { ref, onMounted } from "vue";
import axios from "axios";

// State variables
const permissions = ref([]);
const permissionName = ref("");

// Fetch existing permissions
const fetchPermissions = async () => {
    try {
        const response = await axios.get("/dashboard/permissions");
        permissions.value = response.data;
    } catch (error) {
        console.error("Error al obtener los permisos:", error);
    }
};

// Create a new permission
const createPermission = async () => {
    if (!permissionName.value.trim()) {
        alert("El nombre del permiso no puede estar vacío.");
        return;
    }

    try {
        await axios.post("/dashboard/permissions", {
            name: permissionName.value,
        });
        permissionName.value = "";
        fetchPermissions(); // Refetch permissions after creating a new one
    } catch (error) {
        console.error("Error al crear el permiso:", error);
    }
};

// Delete a permission
const deletePermission = async (id) => {
    try {
        await axios.delete(`/dashboard/permissions/${id}`);
        fetchPermissions(); // Refetch permissions after deleting one
    } catch (error) {
        console.error("Error al eliminar el permiso:", error);
    }
};

// Fetch permissions when component is mounted
onMounted(fetchPermissions);
</script>

<style scoped>
/* Estilos opcionales */
.mb-4 {
    margin-bottom: 1rem;
}

.bg-blue-500 {
    background-color: #3b82f6;
}

.bg-red-500 {
    background-color: #ef4444;
}

.text-white {
    color: white;
}

.border {
    border: 1px solid #d1d5db;
}

.p-2 {
    padding: 0.5rem;
}
</style>
