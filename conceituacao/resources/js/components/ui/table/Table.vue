<script setup lang="ts">
</script>

<template>
    <table class="flex table w-full border-2">
        <thead>
            <tr class="p-4">
                <slot name="header"/>
            </tr>
        </thead>
        <tbody class="border-1">
            <slot name="body"/>
        </tbody>
    </table>
</template>