<template>
    <div class="card card-purple card-outline mt-3">
        <div class="card-body">
            <h2 class="text-center">
                {{ text }}
            </h2>
        </div>
        <div class="overlay dark">
            <i class="fas fa-2x fa-sync-alt fa-spin"></i>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Loading',

    props: {
        text: String
    }
}
</script>
