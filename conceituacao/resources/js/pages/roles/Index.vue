<script setup lang="ts">

import AppLayout from '@/layouts/AppLayout.vue';
import { list, create } from '@/routes/roles';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/vue3';
import RoleTable from '@/components/roles/RoleTable.vue';
import RoleController from '@/actions/App/Http/Controllers/Roles/RoleController';
import Button from '@/components/ui/button/Button.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Perfis',
        href: list().url,
    },
];

const props = defineProps({
    roles: Array<any>
})

</script>

<template>
    <Head title="Lista de Perfis" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="overflow-x-auto rounded-xl p-4">
            <Link :href="create().url" class="mt-4 w-full" :as="Button">
                Cadastrar novo Perfil
            </Link>
            <RoleTable :roles="roles"/>
        </div>
    </AppLayout>
</template>
