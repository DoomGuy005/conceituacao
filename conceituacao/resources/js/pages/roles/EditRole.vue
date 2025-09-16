<script setup lang="ts">

import RoleController from '@/actions/App/Http/Controllers/Roles/RoleController';
import RoleCard from '@/components/roles/RoleCard.vue';
import AppLayout from '@/layouts/AppLayout.vue';
import { show } from '@/routes/roles';
import { type BreadcrumbItem } from '@/types';
import { Form, Head } from '@inertiajs/vue3';
import Input from '@/components/ui/input/Input.vue';
import InputError from '@/components/InputError.vue';

const props = defineProps([
    'role'
])

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Edição de Perfis',
        href: '',
    },
];

</script>

<template>
    <Head title="Lista de Perfis" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex- gap-4 overflow-x-auto rounded-xl p-4">
            <Form
                v-bind="RoleController.update.form(role.id)"
                :reset-on-success="['password']"
                v-slot="{ errors, processing }"
                class="flex flex-col w-100 gap-6"
            >
                <div class="grid gap-6">
                    <div class="grid gap-2">
                        <Label for="name">Nome do Perfil</Label>
                        <Input
                            id="name"
                            type="input"
                            name="name"
                            required
                            autofocus
                            :tabindex="1"
                            autocomplete="role.name"
                            placeholder="Nome do Perfil"
                            :default-value="role.name"
                        />
                        <InputError :message="errors.name" />
                    </div>
                    <div class="grid gap-2">
                        <Label for="name">Descrição do Perfil</Label>
                        <Input
                            id="description"
                            type="input"
                            name="description"
                            required
                            autofocus
                            :tabindex="1"
                            autocomplete="description"
                            placeholder="Descrição do Perfil"
                            :default-value="role.description"
                        />
                        <InputError :message="errors.description" />
                    </div>
                    <Button type="submit" class="mt-4 w-full bg-color" :tabindex="4" :disabled="processing">
                        <LoaderCircle v-if="processing" class="h-4 w-4 animate-spin" />
                        Editar Perfil
                    </Button>
                </div>
            </Form>
        </div>
    </AppLayout>
</template>
