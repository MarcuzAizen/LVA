<template>
    <div class="container-fluid mt-3">
        <p>
            TODO: Add sched crud here 
            <em class="text-info">
                (Junior High)
            </em>
        </p>
    </div>
</template>

<script>
export default {
    name: 'JuniorHigh',

    created() {
        this.$Progress.start();
    },

    mounted() {
        this.$Progress.finish();
    }
}
</script>
