<script setup lang="ts">
import { usePage } from '@inertiajs/vue3';
import { Head } from '@inertiajs/vue3';

const page = usePage();
const message = page.props.message ?? null;
const status = page.props.status ?? null;

</script>

<template>
    <div class="v-full w-full bc-red">
        <h1>
            ACESSO NEGADO
        </h1>
        <Link href="">
            {{ message }}
        </Link>
    </div>
</template>

