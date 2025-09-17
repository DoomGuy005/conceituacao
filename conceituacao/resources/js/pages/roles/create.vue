<script setup lang="ts">

import { store } from '@/actions/App/Http/Controllers/Roles/RoleController';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Form, Head } from '@inertiajs/vue3';
import Input from '@/components/ui/input/Input.vue';
import InputError from '@/components/InputError.vue';
import Button from '@/components/ui/button/Button.vue';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'Cadastro de Perfis',
        href: '',
    },
];

</script>

<template>
    <Head title="Cadastro de Perfis" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex- gap-4 overflow-x-auto rounded-xl p-4">
            <Form
                v-bind="store.form()"
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
                        />
                        <InputError :message="errors.description" />
                    </div>
                    <Button class="mt-4 w-full" :tabindex="4" :disabled="processing">
                        <LoaderCircle v-if="processing" class="h-4 w-4 animate-spin" />
                        Cadastrar Perfil
                    </Button>
                </div>
            </Form>
        </div>
    </AppLayout>
</template>
