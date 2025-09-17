<script setup lang="ts">
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import Alert from '@/components/ui/alert/Alert.vue';
import type { BreadcrumbItemType } from '@/types';

interface Props {
    breadcrumbs?: BreadcrumbItemType[];
}

withDefaults(defineProps<Props>(), {
    breadcrumbs: () => [],
});
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <Alert/>
        <slot />
    </AppLayout>
</template>
