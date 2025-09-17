<script setup lang="ts">

import RoleCard from '@/components/roles/RoleCard.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { list } from '@/routes/roles';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import RoleTable from '@/components/roles/RoleTable.vue';

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
                <RoleTable :roles="roles"/>
        </div>
    </AppLayout>
</template>
