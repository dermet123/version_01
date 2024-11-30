<template>
    <div>
        <h2>Gestión de Roles y Permisos</h2>
        <form @submit.prevent="saveRole">
            <input v-model="newRole" placeholder="Nombre del Rol" required />
            <button type="submit">Crear Rol</button>
        </form>

        <div v-for="role in roles" :key="role.id">
            <h3>{{ role.name }}</h3>
            <button @click="togglePermissions(role)">Asignar Permisos</button>
            <div v-if="selectedRole === role.id">
                <label v-for="permission in permissions" :key="permission.id">
                    <input
                        type="checkbox"
                        :value="permission.name"
                        v-model="rolePermissions[role.id]"
                    />
                    {{ permission.name }}
                </label>
                <button @click="assignPermissions(role.id)">
                    Guardar Permisos
                </button>
            </div>
        </div>

        <!-- Lista de permisos existentes -->
        <h3>Permisos Existentes</h3>
        <form @submit.prevent="savePermission">
            <input
                v-model="newPermission"
                placeholder="Nombre del Permiso"
                required
            />
            <button type="submit">Crear Permiso</button>
        </form>

        <div v-for="permission in permissions" :key="permission.id">
            <h4>{{ permission.name }}</h4>
            <button @click="deletePermission(permission.id)">
                Eliminar Permiso
            </button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            newRole: "",
            newPermission: "",
            roles: [],
            permissions: [],
            rolePermissions: {},
            selectedRole: null,
        };
    },
    methods: {
        async fetchRoles() {
            const response = await axios.get("/roles");
            this.roles = response.data.roles;
        },
        async fetchPermissions() {
            const response = await axios.get("/permissions");
            this.permissions = response.data.permissions;
        },
        async saveRole() {
            await axios.post("/roles", { name: this.newRole });
            this.newRole = "";
            await this.fetchRoles(); // Refresca la lista de roles
        },
        async savePermission() {
            await axios.post("/permissions", { name: this.newPermission });
            this.newPermission = "";
            await this.fetchPermissions(); // Refresca la lista de permisos
        },
        togglePermissions(roleId) {
            this.selectedRole = this.selectedRole === roleId ? null : roleId;
        },
        async assignPermissions(roleId) {
            await axios.post(`/roles/${roleId}/permissions`, {
                permissions: this.rolePermissions[roleId],
            });
            this.selectedRole = null; // Cierra el menú de permisos
        },
        async deletePermission(permissionId) {
            await axios.delete(`/permissions/${permissionId}`);
            await this.fetchPermissions(); // Refresca la lista de permisos
        },
    },
    mounted() {
        this.fetchRoles();
        this.fetchPermissions();
    },
};
</script>
