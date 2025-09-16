<script setup lang="ts">

import RoleCard from '@/components/roles/RoleCard.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { list } from '@/routes/roles';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';

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
        <div class="flex h-full flex-1 flex- gap-4 overflow-x-auto rounded-xl p-4">
            <div class="grid gap-4 md:grid-cols-3">
                <div v-for="role in roles">
                    <RoleCard
                        :id=role.id
                        :name="role.name"
                        :description="role.description"
                    />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
