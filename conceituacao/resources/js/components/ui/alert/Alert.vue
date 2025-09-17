<script setup lang="ts">

import { usePage } from '@inertiajs/vue3';

const page = usePage();
const message = page.props.message ?? null;
const status = page.props.status ?? null;
let show : boolean = true;

const color = status == "error" ? 'red' : 'green'

const hideEl = () => {
    show = false;
}

</script>

<template>
    <div v-if="status">
        <h1 @click="hideEl" v-if="show" class="bg-red-100 w-100 p-5 m-auto">
            {{ message }}
        </h1>
    </div>
</template>