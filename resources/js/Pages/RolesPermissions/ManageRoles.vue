<template>
    <AppLayout title="Gestión de Roles">
        <template #header>
            <h2
                class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight"
            >
                Gestión de Roles y Permisos
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div
                    class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg"
                >
                    <!-- Sección de Permisos -->
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium mb-4">Permisos</h3>
                        <form
                            @submit.prevent="createPermission"
                            class="flex gap-4 mb-6"
                        >
                            <input
                                v-model="newPermissionName"
                                type="text"
                                class="border rounded px-3 py-2 flex-grow"
                                placeholder="Nombre del permiso"
                            />
                            <button
                                type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                            >
                                Crear Permiso
                            </button>
                        </form>

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Nombre
                                        </th>
                                        <th
                                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="bg-white divide-y divide-gray-200"
                                >
                                    <tr
                                        v-for="permission in permissions"
                                        :key="permission.id"
                                    >
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div
                                                v-if="
                                                    editingPermission ===
                                                    permission.id
                                                "
                                            >
                                                <input
                                                    v-model="
                                                        editedPermissionName
                                                    "
                                                    type="text"
                                                    class="border rounded px-2 py-1"
                                                    @keyup.enter="
                                                        updatePermission(
                                                            permission.id
                                                        )
                                                    "
                                                />
                                            </div>
                                            <div v-else>
                                                {{ permission.name }}
                                            </div>
                                        </td>
                                        <td
                                            class="px-6 py-4 text-right whitespace-nowrap"
                                        >
                                            <button
                                                v-if="
                                                    editingPermission ===
                                                    permission.id
                                                "
                                                @click="
                                                    updatePermission(
                                                        permission.id
                                                    )
                                                "
                                                class="text-green-600 hover:text-green-900 mr-3"
                                            >
                                                Guardar
                                            </button>
                                            <button
                                                v-else
                                                @click="
                                                    startEditingPermission(
                                                        permission
                                                    )
                                                "
                                                class="text-blue-600 hover:text-blue-900 mr-3"
                                            >
                                                Editar
                                            </button>
                                            <button
                                                @click="
                                                    deletePermission(
                                                        permission.id
                                                    )
                                                "
                                                class="text-red-600 hover:text-red-900"
                                            >
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Sección de Roles -->
                    <div class="p-6 border-b border-gray-200">
                        <h3 class="text-lg font-medium mb-4">Roles</h3>
                        <form
                            @submit.prevent="createRole"
                            class="flex gap-4 mb-6"
                        >
                            <input
                                v-model="newRoleName"
                                type="text"
                                class="border rounded px-3 py-2 flex-grow"
                                placeholder="Nombre del rol"
                            />
                            <button
                                type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                            >
                                Crear Rol
                            </button>
                        </form>

                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Nombre
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Permisos
                                        </th>
                                        <th
                                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Acciones
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="bg-white divide-y divide-gray-200"
                                >
                                    <tr v-for="role in roles" :key="role.id">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ role.name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex flex-wrap gap-2">
                                                <span
                                                    v-for="permission in role.permissions"
                                                    :key="permission.id"
                                                    class="bg-gray-100 px-2 py-1 rounded text-sm"
                                                >
                                                    {{ permission.name }}
                                                </span>
                                            </div>
                                        </td>
                                        <td
                                            class="px-6 py-4 text-right whitespace-nowrap"
                                        >
                                            <Link
                                                :href="`/dashboard/roles/${role.id}/edit`"
                                                class="text-blue-600 hover:text-blue-900 mr-3"
                                            >
                                                Editar
                                            </Link>
                                            <button
                                                @click="deleteRole(role.id)"
                                                class="text-red-600 hover:text-red-900"
                                            >
                                                Eliminar
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Sección de Usuarios y Asignación de Roles -->
                    <div class="p-6">
                        <h3 class="text-lg font-medium mb-4">
                            Asignación de Roles a Usuarios
                        </h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Usuario
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Roles Actuales
                                        </th>
                                        <th
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                        >
                                            Asignar Roles
                                        </th>
                                    </tr>
                                </thead>
                                <tbody
                                    class="bg-white divide-y divide-gray-200"
                                >
                                    <tr v-for="user in users" :key="user.id">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ user.name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex flex-wrap gap-2">
                                                <span
                                                    v-for="role in user.roles"
                                                    :key="role.id"
                                                    class="bg-blue-100 px-2 py-1 rounded text-sm"
                                                >
                                                    {{ role.name }}
                                                </span>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            <div
                                                class="flex items-center gap-2"
                                            >
                                                <select
                                                    v-model="userRoles[user.id]"
                                                    multiple
                                                    class="border rounded px-2 py-1"
                                                >
                                                    <option
                                                        v-for="role in roles"
                                                        :key="role.id"
                                                        :value="role.id"
                                                    >
                                                        {{ role.name }}
                                                    </option>
                                                </select>
                                                <button
                                                    @click="
                                                        assignRoles(user.id)
                                                    "
                                                    class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600"
                                                >
                                                    Asignar
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
<script setup>
import { ref, onMounted, onUnmounted, watch, computed } from "vue";
import { router } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    roles: Array,
    permissions: Array,
    users: Array,
});

const newRoleName = ref("");
const newPermissionName = ref("");
const userRoles = ref({});
const editingPermission = ref(null);
const editedPermissionName = ref("");
const isLoading = ref(false);
const errorMessage = ref(null); // Usar null para mejor manejo de errores
const selectedRolePermissions = ref({});
const searchQuery = ref("");
const currentPage = ref(1);
const itemsPerPage = ref(10);

const createRole = async () => {
    try {
        // Validación (puedes añadir más validaciones aquí)
        if (!newRoleName.value) {
            throw new Error("El nombre del rol es requerido.");
        }

        isLoading.value = true;
        await router.post("/dashboard/roles", {
            name: newRoleName.value,
            permissions: selectedRolePermissions.value,
        }); // Asegúrate de que la ruta sea correcta
        newRoleName.value = ""; // Limpiar el input después de crear el rol
        selectedRolePermissions.value = {}; // Limpiar las selecciones de permisos
        await loadData(); // Recargar los datos después de la creación
        showNotification("Rol creado exitosamente.");
    } catch (error) {
        errorMessage.value = error.message;
        showNotification(error.message, "error");
    } finally {
        isLoading.value = false;
    }
};

const deleteRole = async (roleId) => {
    if (confirm("¿Estás seguro de que deseas eliminar este rol?")) {
        try {
            isLoading.value = true;
            await router.delete(`/dashboard/roles/${roleId}`); // Asegúrate de que la ruta sea correcta
            await loadData(); // Recargar los datos después de la eliminación
            showNotification("Rol eliminado exitosamente.");
        } catch (error) {
            errorMessage.value = error.message;
            showNotification(error.message, "error");
        } finally {
            isLoading.value = false;
        }
    }
};

const assignRoles = async (userId) => {
    try {
        isLoading.value = true;
        await router.post(`/dashboard/users/${userId}/roles`, {
            roles: userRoles.value[userId],
        }); // Asegúrate de que la ruta sea correcta
        showNotification("Roles asignados correctamente.");
    } catch (error) {
        errorMessage.value = error.message;
        showNotification(error.message, "error");
    } finally {
        isLoading.value = false;
    }
};

const loadData = async () => {
    try {
        isLoading.value = true;
        const response = await router.get("/dashboard/roles");
        props.roles = response.props.roles || [];
        props.permissions = response.props.permissions || [];
        props.users = response.props.users || [];
        initializeUserRoles();
    } catch (error) {
        errorMessage.value = error.message;
        showNotification(error.message, "error");
    } finally {
        isLoading.value = false;
    }
};

// 4. Funciones de validación
const validateRoleName = (name) => {
    if (!name || name.trim().length < 3) {
        throw new Error("El nombre del rol debe tener al menos 3 caracteres");
    }
};

const validatePermissionName = (name) => {
    if (!name || name.trim().length < 3) {
        throw new Error(
            "El nombre del permiso debe tener al menos 3 caracteres"
        );
    }
};

// 5. Funciones de permisos (faltantes en el código original)
const startEditingPermission = (permission) => {
    editingPermission.value = permission.id;
    editedPermissionName.value = permission.name;
};

const updatePermission = async (permissionId) => {
    try {
        validatePermissionName(editedPermissionName.value);
        isLoading.value = true;
        await router.put(`/dashboard/permissions/${permissionId}`, {
            name: editedPermissionName.value,
        });
        editingPermission.value = null;
        showNotification("Permiso actualizado exitosamente");
        await loadData();
    } catch (error) {
        errorMessage.value = error.message;
        showNotification(error.message, "error");
    } finally {
        isLoading.value = false;
    }
};

const deletePermission = async (permissionId) => {
    if (confirm("¿Estás seguro de que deseas eliminar este permiso?")) {
        try {
            isLoading.value = true;
            await router.delete(`/dashboard/permissions/${permissionId}`);
            showNotification("Permiso eliminado exitosamente");
            await loadData();
        } catch (error) {
            errorMessage.value = error.message;
            showNotification(error.message, "error");
        } finally {
            isLoading.value = false;
        }
    }
};

// 6. Funciones de roles y permisos (faltantes)
const hasRole = (userId, roleId) => {
    const user = props.users.find((u) => u.id === userId);
    return user?.roles.some((r) => r.id === roleId);
};

const hasPermission = (roleId, permissionId) => {
    const role = props.roles.find((r) => r.id === roleId);
    return role?.permissions.some((p) => p.id === permissionId);
};

// 7. Inicialización de roles de usuario
const initializeUserRoles = () => {
    props.users.forEach((user) => {
        userRoles.value[user.id] = user.roles.map((role) => role.id);
    });
};

// 8. Computed properties
const filteredUsers = computed(() => {
    return props.users.filter(
        (user) =>
            user.name.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
            user.email.toLowerCase().includes(searchQuery.value.toLowerCase())
    );
});

const paginatedUsers = computed(() => {
    const start = (currentPage.value - 1) * itemsPerPage.value;
    const end = start + itemsPerPage.value;
    return filteredUsers.value.slice(start, end);
});

// 9. Sistema de notificaciones
const showNotification = (message, type = "success") => {
    console.log(`${type}: ${message}`);
    // Aquí puedes implementar tu sistema de notificaciones preferido
};

// 10. Lifecycle hooks
onMounted(async () => {
    await loadData();
    initializeUserRoles();
});

// 11. Cleanup
onUnmounted(() => {
    document.body.style.cursor = "default";
});

// 12. Watchers
watch(searchQuery, () => {
    currentPage.value = 1;
});

watch(isLoading, (newValue) => {
    document.body.style.cursor = newValue ? "wait" : "default";
});
</script>
