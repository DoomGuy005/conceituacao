<script setup lang="ts">

import { Link } from '@inertiajs/vue3';
import Card from '../ui/card/Card.vue';
import CardAction from '../ui/card/CardAction.vue';
import CardHeader from '../ui/card/CardHeader.vue';
import CardTitle from '../ui/card/CardTitle.vue';
import { show } from '@/routes/roles';
import CardDescription from '../ui/card/CardDescription.vue';

const props = defineProps({
    id: Number,
    name: String,
    description: String
})

</script>

<template>
     <Card>
        <CardHeader>
            <CardTitle>
                {{ name }}
            </CardTitle>
        </CardHeader>
        <CardContent>
            <CardDescription>
                {{ description }}
            </CardDescription>
        </CardContent>
        <CardAction>
            <Link :href="show(id)" as="button" type="button">
                Editar Perfil
            </Link>
        </CardAction>
    </Card>
</template>