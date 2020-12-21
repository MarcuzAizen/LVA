<template>
    <div class="container-fluid mt-3">
        <p>
            TODO: Add table here showing all schedules
        </p>
    </div>
</template>

<script>
export default {
    name: 'Home',

    created() {
        this.$Progress.start();
    },

    mounted() {
        this.$Progress.finish();
    }
}
</script>
