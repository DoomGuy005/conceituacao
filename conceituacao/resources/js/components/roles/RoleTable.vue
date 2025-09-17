<script setup lang="ts">

import { Link } from '@inertiajs/vue3';
import { show } from '@/routes/roles';
import { destroy } from '@/actions/App/Http/Controllers/Roles/RoleController';
import { Role } from '@/types/roles/Role';
import { convertDateToBrFormat } from '@/lib/utils';
import Table from '../ui/table/Table.vue';
import TableCell from '../ui/table/TableCell.vue';
import TableHeader from '../ui/table/TableHeader.vue';
import Button from '../ui/button/Button.vue';

const props = defineProps({
    roles: Array<Role>,
})

const headers = [
    "Nome do Perfil",
    "Descrição do Perfil",
    "Data de Criação",
    "Data de Atualização",
    "Ações"
];

</script>

<template>
    <Table>
        <template #header>
            <TableHeader v-for="header in headers">
                {{ header }}
            </TableHeader>
        </template>
        <template #body>
            <tr v-for="role in roles">
                <TableCell>
                    {{ role.name }}
                </TableCell>
                <TableCell>
                    {{ role.description }}
                </TableCell>
                <TableCell>
                    {{ convertDateToBrFormat(role.created_at) }}
                </TableCell>
                <TableCell>
                    {{ convertDateToBrFormat(role.updated_at) }}
                </TableCell>
                <TableCell>
                    <Link :href="show(role.id)" :as="Button">
                        Editar
                    </Link>
                </TableCell>
                <TableCell>
                    <Link :href="destroy.form(role.id).action" method="delete">
                        Apagar
                    </Link>
                </TableCell>
            </tr>
        </template>
    </Table>
</template>