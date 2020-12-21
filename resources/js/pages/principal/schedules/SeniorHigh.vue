<template>
    <div class="container-fluid mt-3">
        <p>
            TODO: Add sched crud here 
            <em class="text-info">
                (Senior High)
            </em>
        </p>
    </div>
</template>

<script>
export default {
    name: 'SeniorHigh',

    created() {
        this.$Progress.start();
    },

    mounted() {
        this.$Progress.finish();
    }
}
</script>
